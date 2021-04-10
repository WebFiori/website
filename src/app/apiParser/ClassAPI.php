<?php
namespace webfiori\apiParser;
use webfiori\entity\Util;
use WebFioriGUI;
use phpStructs\html\PNode;
use webfiori\ui\HTMLNode;
/**
 * A class that is used to construct a GUI to view class API.
 *
 * @author Ibrahim
 */
class ClassAPI {
    private $ns;
    /**
     * Class version number.
     * @var type 
     */
    private $version;
    /**
     * The name of the class.
     * @var type 
     */
    private $cName;
    /**
     * Long description of the class.
     * @var type 
     */
    private $desc;
    /**
     * Short description of the class.
     * @var type 
     */
    private $shortDesc;
    /**
     * An array that contains an objects of type 'AttributeDef'
     * @var type 
     */
    private $classAttributes;
    /**
     * An array that contains an objects of type 'FunctionDef'
     * @var type 
     */
    private $classMethods;
    /**
     * A link to currently requested page.
     * @var type 
     */
    private $baseUrl;
    /**
     * The package (or folder) that the class belongs to.
     * @var type 
     */
    private $package;
    /**
     * A name of a class that this class is extending.
     * @var type 
     */
    private $extends;
    /**
     * An array that contains all implemented interfaces.
     * @var type 
     */
    private $implements;
    /**
     *
     * @var type 
     */
    private $classType;
    /**
     * 
     * @param APIReader $classAPIReader An object of type 'APIReader' which has
     * all parsed class info.
     * @param array $linksArr An array that contains links to parsed classes and 
     * primitive data types. This array is used to add links for 'param' attribute 
     * of a doc-block or method return type.
     * @param array $options An associative array that contains options to customize 
     * the view that will be generated. Available options are:
     * <ul>
     * <li><b>inc-private-attrs</b>: A boolean. If set to true, the generated 
     * view will have documentation of private class attributes. Default is 
     * false.</li>
     * <li><b>inc-protected-attrs</b>: A boolean. If set to true, the generated 
     * view will have documentation of protected class attributes. Default is 
     * true.</li>
     * <li><b>inc-private-funcs</b>: A boolean. If set to true, the generated 
     * view will have documentation of private class methods. Default is false.</li>
     * <li><b>inc-protected-funcs</b>: A boolean. If set to true, the generated 
     * view will have documentation of private class attributes. Default 
     * is true.</li>
     * <li><b>base-url</b>: The base URL which is the view will be using 
     * for the node 'base' for the generated HTML.</li>
     * </ul>
     */
    public function __construct($classAPIReader,$linksArr=array(),$options=array(
        'inc-private-attrs'=>false,
        'inc-protected-attrs'=>true,
        'inc-private-funcs'=>false,
        'inc-protected-funcs'=>true,
        'base-url'=>''
    )) {
        $this->classMethods = [];
        $this->implements = [];
        $this->classAttributes = [];
        $this->cName = $classAPIReader->getClassName();
        $this->baseUrl = $options['base-url'];
        $this->setSummary($classAPIReader->getClassSummary());
        $this->setDescription($classAPIReader->getClassSummary().' '.$classAPIReader->getClassDescription());
        $this->setClassAccessModifier($classAPIReader->getParsedInfo()['class-def']['access-modifier']);
        $extendsClasses = $classAPIReader->getParsedInfo()['class-def']['extends'];
        if(count($extendsClasses) != 0){
            if(isset($linksArr[$extendsClasses[0]])){
                $this->extends = $linksArr[$extendsClasses[0]];
            }
            else{
                $this->extends = $extendsClasses[0];
            }
        }
        foreach ($classAPIReader->getParsedInfo()['class-def']['implements'] as $interfaceNm){
            if(isset($linksArr[$interfaceNm])){
                $this->implements[] = $linksArr[$interfaceNm];
            }
            else{
                $this->implements[] = $interfaceNm;
            }
        }
        foreach ($classAPIReader->getConstantsNames() as $name){
            $docBlock = $classAPIReader->getConstDocBlock($name);
            $api = new AttributeDef();
            $api->setName($name);
            $api->setAccessModifier($docBlock['access-modifier']);
            $accMod = $docBlock['access-modifier'];
            $accModSplit = explode(' ', $accMod);
            $attrType = 'public';
            foreach ($accModSplit as $subString){
                if($subString == 'private' || $subString == 'protected'){
                    $attrType = $subString;
                    break;
                }
            }
            if($attrType == 'public' || 
                    ($attrType == 'private' && isset($options['inc-private-attrs']) && $options['inc-private-attrs'] === TRUE) ||
                    ($attrType == 'protected' && isset($options['inc-protected-attrs']) && $options['inc-protected-attrs'] === TRUE)){
                if(isset($docBlock['summary'])){
                    $summary = $docBlock['summary'];
                }
                else{
                    $summary = '';
                }
                $api->setSummary($summary);
                if(isset($docBlock['description'])){
                    $desc = $docBlock['description'];
                }
                else{
                    $desc = '';
                }
                
                $api->setDescription($summary.' '.$desc);
                $this->addAttribute($api);
            }
            
        }
        foreach ($classAPIReader->getMethodsNames() as $name){
            $docBlock = $classAPIReader->getFunctionDocBlock($name);
            $api = new FunctionDef();
            $api->setName($name);
            $api->setAccessModifier($docBlock['access-modifier']);
            $accMod = $docBlock['access-modifier'];
            $accModSplit = explode(' ', $accMod);
            $funcType = 'public';
            foreach ($accModSplit as $subString){
                if($subString == 'private' || $subString == 'protected'){
                    $funcType = $subString;
                    break;
                }
            }
            if($funcType == 'public' || 
                    ($funcType == 'private' && isset($options['inc-private-funcs']) && $options['inc-private-funcs'] === TRUE) ||
                    ($funcType == 'protected' && isset($options['inc-protected-funcs']) && $options['inc-protected-funcs'] === TRUE)){
                $api->setAccessModifier($docBlock['access-modifier']);
                if(isset($docBlock['summary'])){
                    $summary = $docBlock['summary'];
                }
                else{
                    $summary = '';
                }
                $api->setSummary($summary);
                if(isset($docBlock['description'])){
                    $desc = $docBlock['description'];
                }
                else{
                    $desc = '';
                }
                if(isset($docBlock['@param'])){
                    foreach ($docBlock['@param'] as $param){
                        $typesNode = new ParameterType();
                        $isOptional = isset($param['is-optional']) ? $param['is-optional'] : FALSE;
                        if(isset($param['type'])){
                            $paramTypes = explode('|', $param['type']);
                            foreach ($paramTypes as $t){
                                if(isset($linksArr[$t])){
                                    $typesNode->add($linksArr[$t]);
                                }
                                else{
                                    $typesNode->add($t);
                                }
                            }
                        }
                        else{
                            $typesNode->text('unkown_type');
                        }
                        $description = isset($param['description']) ? $param['description'] : '';
                        $api->addFuncParam(new MethodParameter($param['name'], $typesNode, $description, $isOptional));
                    }
                }
                if(isset($docBlock['@return']) && gettype($docBlock['@return']['return-types']) == 'array'){
                    $retArr = array();
                    $retArr['description'] = $docBlock['@return']['description'];
                    $retArr['return-types'] = array();
                    foreach ($docBlock['@return']['return-types'] as $str){
                        if(isset($linksArr[$str])){
                            $retArr['return-types'][] = $linksArr[$str];
                        }
                        else{
                            $retArr['return-types'][] = $str;
                        }
                    }
                    $api->setReturns($retArr);
                }
                $api->setDescription($summary.' '.$desc);
                $this->addFunction($api);
            }
        }
        $this->ns = $classAPIReader->getNamespace();
        $this->setSummary($classAPIReader->getClassSummary());
    }
    
    /**
     * Sets the base URL.
     * The base URL is a URL which the view will be using 
     * for the node 'base' for the generated HTML. Usulally, used as a relative 
     * link for fetching page resources such as CSS files or JavaScript files.
     * @param string $url The base URL. Must be non-empty string.
     */
    public function setBaseURL($url) {
        if(strlen($url) > 0){
            $this->baseUrl = $url;
        }
    }
    /**
     * Returns the URL that takes the user to the view in a web browser.
     * @return string
     */
    public function getLink() {
        $retVal = trim($this->baseUrl,'/').'/'.$this->cName;
        if(strlen($this->package) > 0){
            $retVal = trim($this->baseUrl,'/').'/'.$this->package.'/'.$this->cName;
        }
        return $retVal;
    }
    /**
     * Sets the name of the class.
     * @param string $className The name of the class (e.g. 'SessionManager').
     */
    public function setName($className) {
        $this->cName = $className;
    }
     /**
     * Sets the type of the class.
     * @param string $mod Class type (e.g. 'class', 'interface', 'trait').
     */
    public function setClassAccessModifier($mod) {
        $this->classType = $mod;
    }
    public function getVersion() {
        return $this->version;
    }
    public function setVersion($vNum) {
        $this->version = $vNum;
    }
    /**
     * Returns The type of the class.
     * @return string Class type (e.g. 'class', 'interface').
     */
    public function getAccessModifier() {
        return $this->classType;
    }
    
    public function getInterfaces() {
        return $this->implements;
    }
    public function setNameSpace($ns) {
        $this->ns = $ns;
    }
    public function getNameSpace() {
        return $this->ns;
    }
    public function setPackage($package) {
        $this->package = $package;
    }
    public function getPackage() {
        return $this->package;
    }
    /**
     * Returns the name of the class.
     * @return string The name of the class.
     */
    public function getName() {
        return $this->cName;
    }
    /**
     * Adds new function definition object to the class.
     * @param FunctionDef $func
     */
    public function addFunction($func) {
        if($func instanceof FunctionDef){
            $func->setPageURL($this->baseUrl);
            $func->setOwnerClass($this);
            $this->classMethods[] = $func;
        }
    }
    /**
     * Adds new attribute definition object to the class.
     * @param AttributeDef $attr
     */
    public function addAttribute($attr) {
        if($attr instanceof AttributeDef){
            $attr->setPageURL($this->baseUrl);
            $attr->setOwnerClass($this);
            $this->classAttributes[] = $attr;
        }
    }
    public function getClassMethods() {
        return $this->classMethods;
    }
    public function getClassAttributes() {
        return $this->classAttributes;
    }
    /**
     * Returns the long name of the class (e.g. 
     * 'abstract class SessionManager implements JsonX').
     * @return string
     */
    public function getSignature() {
        $longNm = $this->getAccessModifier().' '.$this->getName();
        if(strlen($this->extends)){
            $longNm .= ' extends '.$this->extends;
        }
        $intrfaces = $this->getInterfaces();
        $count = count($intrfaces);
        if($count != 0){
            $interfacesStr = ' implements ';
            $index = 0;
            foreach ($intrfaces as $interfaceNm){
                if($index + 1 == $count){
                    $interfacesStr .= $interfaceNm;
                }
                else{
                    $interfacesStr .= $interfaceNm.', ';
                }
                $index++;
            }
            $longNm .= $interfacesStr;
        }
        return $longNm;
    }
    /**
     * Sets the description of the class.
     * @param string $desc The description of the class.
     */
    public function setSummary($desc) {
        $this->shortDesc = $desc;
    }
    public function getSummaryAsHTMLNode() {
        $node = HTMLNode::fromHTMLText($this->getSummary());
        if (gettype($node) == 'array') {
            $toAdd = new HTMLNode('span');
            foreach ($node as $ch) {
                $toAdd->addChild($ch);
            }
        } else {
            $toAdd = $node;
        }
        return $toAdd;
    }
    /**
     * Returns the description of the class.
     * @return string The description of the class.
     */
    public function getSummary() {
        return $this->shortDesc;
    }
    /**
     * Sets the description of the class.
     * @param string $desc The description of the class.
     */
    public function setDescription($desc) {
        $this->desc = $desc;
    }
    /**
     * Returns the description of the class.
     * @return string The description of the class.
     */
    public function getDescription() {
        return $this->desc;
    }
}
