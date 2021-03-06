<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\ui\HTMLNode;
use webfiori\ui\Paragraph;
use webfiori\ui\UnorderedList;
use webfiori\apiParser\MethodParameter;
use webfiori\docs\apiParser\DocsWebPage;
/**
 * A class that is used to build a GUI blocks for function definition. 
 *
 * @author Ibrahim
 */
class FunctionDef {
    /**
     * 
     * @var DocsWebPage
     */
    private $ownerPage;
    /**
     * The name of the function (e.g. 'getNumber')
     * @var type 
     */
    private $fName;
    private $accessMofifier;
    private $funcParams;
    private $funcReturns;
    private $shortDescription;
    private $longDescription;
    private $pageUrl;
    private $ns;
    private $ownerClass;
    /**
     * 
     * @param array $options An array that holds method definition. The array 
     * can have the following indices:
     * <ul>
     * <li><b>name</b>: The name of the method or function.</li>
     * <li><b>params</b>: An array that holds methods parameters.</li>
     * <li><b>returns</b>: An array that holds method return types information.</li>
     * <li><b>access-modifier</b>: </li>
     * <li><b>summary</b>: </li>
     * <li><b>description</b>: </li>
     * </ul>
     */
    public function __construct(array $options = []) {
        if (isset($options['name'])) {
            $this->setName($options['name']);
        }
        $this->funcParams = [];
        if (isset($options['params']) && gettype($options['params']) == 'array') {
            
            foreach ($options['params'] as $name => $param) {
                if (gettype($param) == 'array') {
                    $p = new MethodParameter();
                    $p->setName($name);
                    $p->setDescription($param['description']);
                    $p->setTypeStr($param['type']);
                    $this->addFuncParam($p);
                } else {
                    $this->addFuncParam($param);
                }
            }
        }
        $this->funcReturns = array(
            'return-types'=>array(),
            'description'=>''
        );
        if (isset($options['returns'])) {
            if (isset($options['returns']['return-types']) && isset($options['returns']['description'])) {
                $this->funcReturns = $options['returns'];
            }
        }
        $this->accessMofifier = '';
        if (isset($options['access-modifier'])) {
            $this->accessMofifier = $options['access-modifier'];
        }
        if (isset($options['summary'])) {
            $this->setSummary($options['summary']);
        }
        if (isset($options['description'])) {
            $this->setDescription($options['description']);
        }
    }
    public function setOwnerPage(DocsWebPage $p) {
        $this->ownerPage = $p;
    }
    /**
     * 
     * @return DocsWebPage|null
     */
    public function getOwnerPage() {
        return $this->ownerPage;
    }
    public function getSummarySignatorNode($p) {
        $node = new HTMLNode('span');
        $node->text($this->getAccessModofier().' ');
        $node->addChild('a', [
            'href' => $this->getOwnerPage()->getCanonical(). '#'.$this->getName()
        ], false)->text(str_replace('&', '&amp;', $this->getName()));
        $node->text('(');
        $comma = '';
        foreach($this->getParameters() as $paramObj){
            if ($comma != '') {
                $node->text($comma);
            }
            $paramObj instanceof MethodParameter;
            $node->addChild($paramObj->getParametersNode($p));
            $node->text($paramObj->getName());
            
            $comma = ', ';
        }
        $node->text(')');
        return $node;
    }
    public function getDetailsSignatorNode($p) {
        $node = new HTMLNode('span');
        $node->text($this->getAccessModofier().' '. str_replace('&', '&amp;', $this->getName()).'(');
        $comma = '';
        foreach($this->getParameters() as $paramObj){
            if ($comma != '') {
                $node->text($comma);
            }
            $paramObj instanceof MethodParameter;
            $node->addChild($paramObj->getParametersNode($p));
            $node->text($paramObj->getName());
            
            
            $comma = ', ';
        }
        $node->text(')');
        return $node;
    }
    public function getMethodSignatorNode() {
        $retVal = new HTMLNode();
        $retVal->text($this->getAccessModofier().' ')
        ->addChild('a', [
            'href' => $this->getPageURL().'/'. 
                str_replace('\\', '/', trim($this->getOwnerClass()->getNameSpace(), '\\')).
                '/'.$this->getOwnerClass()->getName().'#'.str_replace('&', '', $this->getName())
        ], false)->text(str_replace('&', '&amp;', $this->getName()));
        $retVal->text('(');
        $comma = '';
        foreach ($this->getParameters() as $p) {
            $p instanceof MethodParameter;
            if (strlen($comma) != 0) {
                $retVal->text($comma);
            }
            $retVal->addChild('span', [
                'class' => 'datatype-name'
            ], false)->text($p->getType());
            $retVal->addChild('span', [
                'class' => 'attribute-name'
            ], false)->text(' '.$p->getName());
            $comma = ', ';
        }
        $retVal->text(')');
        $retVal->setClassName('method-signator');
        return $retVal;
    }
    /**
     * Returns a string that contains the names of return types of the method.
     * @return string|NULL If the method has return types, a string in the 
     * format 'Type_1|Type_2|Type_3' is returned. If the method has no return types, 
     * the method will return NULL.
     */
    public function getMethodReturnTypesStr() {
        $return = $this->getReturnTypes();
        $retCount = count($return['return-types']);
        if($retCount != 0){
            $retStr = '';
            for($x = 0 ; $x < $retCount ; $x++){
                if($x + 1 == $retCount){
                    $retStr .= $return['return-types'][$x];
                }
                else{
                    $retStr .= $return['return-types'][$x].'|';
                }
            }
            return $retStr;
        }
        else{
            return NULL;
        }
    }
    /**
     * Returns a string that contains the names of return types of the method.
     * @return string|NULL If the method has return types, a string in the 
     * format 'Type_1|Type_2|Type_3' is returned. If the method has no return types, 
     * the method will return NULL.
     */
    public function getMethodReturnTypesAsHTMLNode() {
        $return = $this->getReturnTypes();
        $retCount = count($return['return-types']);
        if($retCount != 0){
            $retVal = new HTMLNode('span');
            for($x = 0 ; $x < $retCount ; $x++){
                $type = $return['return-types'][$x];
                $type instanceof HTMLNode ? $retVal->addChild($type) : $retVal->text($type);
                if($x + 1 < $retCount){
                    $retVal->text('|');
                }
            }
            return $retVal;
        }
    }
    /**
     * Returns astring that represents the description of what does the method 
     * returns.
     * 
     * @return string|NULL If the method hasa return type(s), the method 
     * will return a string. If the method has no return type(s), the method 
     * will return NULL.
     */
    public function getMethodReturnDescription() {
        $return = $this->getReturnTypes();
        $retCount = count($return['return-types']);
        if($retCount != 0){
            return $return['description'];
        }
        else{
            return null;
        }
    }
    /**
     * Returns an object that holds the description of method return type(s).
     * 
     * This method is used by the method which is used to create the description 
     * of return type of the method on the theme.
     * 
     * @return HTmlNode|NULL If the method has a return type(s), the method 
     * will return an object. If the method has no return type(s), the method 
     * will return null.
     */
    public function getMethodReturnDescriptionAsHTMLNode() {
        $return = $this->getReturnTypes();
        $retCount = count($return['return-types']);
        if($retCount != 0){
            $retVal = new HTMLNode('span');
            $nodes = HTMLNode::fromHTMLText($return['description']);
            
            if (gettype($nodes) == 'array') {
                foreach ($nodes as $child) {
                    $retVal->addChild($child);
                }
            } else {
                $retVal->addChild($nodes);
            }
            return $retVal;
        }
        else{
            return null;
        }
    }
    public function setPageURL($url){
        $this->pageUrl = $url;
    }
    public function getPageURL(){
        return $this->pageUrl;
    }
    public function getParameters() {
        return $this->funcParams;
    }
    /**
     * Sets function access modifier.
     * @param string $mod Function access modifier (e.g. 'public', 'protected).
     */
    public function setAccessModifier($mod) {
        $this->accessMofifier = $mod;
    }
    /**
     * Returns function access modifier.
     * @return string function access modifier (e.g. 'public', 'protected).
     */
    public function getAccessModofier() {
        return $this->accessMofifier;
    }
    /**
     * Sets the description of the function.
     * @param string $desc The description of the function.
     */
    public function setDescription($desc) {
        $this->longDescription = $desc;
    }
    /**
     * Returns the description of the function.
     * @return string The description of the function.
     */
    public function getDescription() {
        return $this->longDescription;
    }
    public function getDescriptionAsHTMLNode() {
        $xNode = HTMLNode::fromHTMLText($this->getDescription());
        if (gettype($xNode) == 'array') {
            $toXAdd = new HTMLNode();
            foreach ($xNode as $ch) {
                $toXAdd->addChild($ch);
            }
        } else {
            $toXAdd = $xNode;
        }
        return $toXAdd;
    }
    /**
     * Sets the summary of the function.
     * @param string $desc The summary of the function.
     */
    public function setSummary($desc) {
        $this->shortDescription = $desc;
    }
    /**
     * Returns the summary of the function.
     * @return string The summary of the function.
     */
    public function getSummary() {
        return $this->shortDescription;
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
     * Sets the name of the function.
     * @param string $name The name of the function (e.g. 'getNumber').
     */
    public function setName($name) {
        $this->fName = $name;
    }
    /**
     * Returns the name of the function.
     * @return string The name of the function.
     */
    public function getName() {
        return $this->fName;
    }
    /**
     * 
     * @param MethodParameter $attr
     */
    public function addFuncParam(MethodParameter $attr) {
        $this->funcParams[] = $attr;
    }
    /**
     * Sets method return values and description.
     * @param type $ret
     */
    public function setReturns($ret) {
        if(gettype($ret) == 'array'){
            if(isset($ret['return-types'])){
                if(isset($ret['description'])){
                    $this->funcReturns = $ret;
                }
            }
        }
    }
    public function getNameSpace(){
        return $this->ns;
    }
    public function setNameSpace($ns){
        $this->ns = $ns;
    }
    /**
     * 
     * @return ClassAPI
     */
    public function getOwnerClass(){
        return $this->ownerClass;
    }
    public function setOwnerClass($cl) {
        if($cl instanceof ClassAPI){
            $this->ownerClass = $cl;
            $this->setNameSpace($cl->getNameSpace());
        }
    }
    public function getReturnTypes() {
        return $this->funcReturns;
    }
}
