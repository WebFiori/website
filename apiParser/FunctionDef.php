<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
/**
 * A class that is used to build a GUI blocks for function definition. 
 *
 * @author Ibrahim
 */
class FunctionDef {
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
    public function __construct() {
        $this->funcParams = array();
        $this->funcReturns = array(
            'return-types'=>array(),
            'description'=>''
        );
        
        $this->accessMofifier = '';
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
     * Returns astring that represents the description of what does the method 
     * returns.
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
            return NULL;
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
     * Adds new function parameter.
     * @param string $varName The name of the parameter.
     * @param string $varType Data type of the parameter.
     * @param string $description The description of the parameter.
     * @param boolean $isOptional A boolean value to indicate if the 
     * parameter is optional or not.
     */
    public function addFuncParam($varName,$varType,$description, $isOptional=false) {
        $paramNum = count($this->funcParams);
        $this->funcParams['param-'.$paramNum] = array(
            'var-name'=> str_replace('&', '&amp;', $varName),
            'var-type'=>$varType,
            'var-desc'=>$description,
            'is-optional'=>$isOptional
        );
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
