<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\entity\Util;
use WebFioriGUI;
use phpStructs\html\PNode;
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
     * @param APIReader $classAPIReader
     */
    public function __construct($classAPIReader,$linksArr=array(),$options=array(
        'inc-private-attrs'=>false,
        'inc-protected-attrs'=>true,
        'inc-private-funcs'=>false,
        'inc-protected-funcs'=>true,
        'base-url'=>''
    )) {
        $this->classMethods = array();
        $this->implements = array();
        $this->cName = $classAPIReader->getClassName();
        $this->baseUrl = $options['base-url'];
        $this->setSummary($classAPIReader->getClassSummary());
        $this->setDescription($classAPIReader->getClassDescription());
        $this->setClassType($classAPIReader->getParsedInfo()['class-def']['access-modifier']);
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
        foreach ($classAPIReader->getFunctionsNames() as $name){
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
                        $isOptional = isset($param['is-optional']) ? $param['is-optional'] : FALSE;
                        if(isset($param['type'])){
                            $paramTypes = explode('|', $param['type']);
                            $typesStr = '';
                            $index = 0;
                            $count = count($paramTypes);
                            foreach ($paramTypes as $t){
                                if(isset($linksArr[$t])){
                                    $tp = $linksArr[$t];
                                }
                                else{
                                    $tp = $t;
                                }
                                if($index + 1 == $count){
                                    $typesStr .= $tp;
                                }
                                else{
                                    $typesStr .= $tp.'|';
                                }
                                $index++;
                            }
                        }
                        else{
                            $typesStr = 'unkown_type';
                        }
                        $description = isset($param['description']) ? $param['description'] : '';
                        $api->addFuncParam($param['name'], $typesStr, $description, $isOptional);
                    }
                }
                $api->setDescription($summary.' '.$desc);
                $this->addFunction($api);
            }
        }
        $this->ns = $classAPIReader->getNamespace();
        $this->setSummary($classAPIReader->getClassSummary());
    }
    public function setBaseURL($url) {
        if(strlen($url) > 0){
            $this->baseUrl = $url;
        }
    }
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
     * @param string $mod Class type (e.g. 'class', 'interface').
     */
    public function setClassType($mod) {
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
    public function getClassType() {
        return $this->classType;
    }
    
    public function getInterfaces() {
        return $this->implements;
    }
    public function implementsInterface($interfaceName) {
        $this->implements[] = $interfaceName;
    }
    public function extendClass($className,$package='') {
        $this->extends = '<a href="'.$package.'/'.$className.'">'.$className.'</a>';
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
    private function createBox($boxTitle) {
        $summaryNode = WebFioriGUI::createRowNode();
        $summaryNode->setAttribute('style', 'border: 1px solid;');
        $titleNode = new PNode();
        $titleNode->setClassName('pa-ltr-col-4-nm-np summary-box-title');
        $titleNode->addText($boxTitle);
        $summaryNode->addChild($titleNode);
        return $summaryNode;
    }
    /**
     * Returns HTMLNode which contains all class functions summaries.
     * @return HTMLNode HTMLNode which contains all class functions summaries.
     */
    public function getFunctionsSummaryNode() {
        if(count($this->classMethods) != 0){
            $summaryNode = $this->createBox('Class Functions Summary');
            foreach ($this->classMethods as $method){
                $summaryNode->addChild($method->summaryHTMLNode());
            }
            return $summaryNode;
        }
    }
    public function getClassFunctions() {
        return $this->classMethods;
    }
    public function getClassAttributes() {
        return $this->classAttributes;
    }
    /**
     * Returns HTMLNode which contains all class functions details.
     * @return HTMLNode HTMLNode which contains all class functions details.
     */
    public function getFunctionsDetailsNode() {
        if(count($this->classMethods) != 0){
            $detailsNode = $this->createBox('Class Functions Details');
            foreach ($this->classMethods as $method){
                $detailsNode->addChild($method->asHTMLNode());
            }
            return $detailsNode;
        }
    }
    
    
    /**
     * Returns HTMLNode which contains all class attributes summaries.
     * @return HTMLNode HTMLNode which contains all class attributes summaries.
     */
    public function getAttributesSummaryNode() {
        if(count($this->classAttributes) != 0){
            $summaryNode = $this->createBox('Class Attributes Summary');
            foreach ($this->classAttributes as $attribute){
                $summaryNode->addChild($attribute->summaryHTMLNode());
            }
            return $summaryNode;
        }
    }
    /**
     * Returns HTMLNode which contains all class attributes details.
     * @return HTMLNode HTMLNode which contains all class attributes details.
     */
    public function getAttributesDetailsNode() {
        if(count($this->classAttributes) != 0){
            $detailsNode = $this->createBox('Class Attributes Details');
            foreach ($this->classAttributes as $attribute){
                $detailsNode->addChild($attribute->asHTMLNode());
            }
            return $detailsNode;
        }
    }
    /**
     * Returns the long name of the class (e.g. 
     * 'abstract class SessionManager implements JsonX').
     * @return string
     */
    public function getLongName() {
        $longNm = $this->getClassType().' '.$this->getName();
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
