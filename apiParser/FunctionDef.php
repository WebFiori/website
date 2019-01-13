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
            'return-types'=>'',
            'description'=>''
        );
        
        $this->accessMofifier = '';
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
     * Sets the return type description.
     * @param string $returnTypes A string that represents the return types 
     * of the function.
     * @param string $desc A string that describes the returned value.
     */
    public function setReturns($returnTypes, $desc) {
        $this->funcReturns = array(
            'return-types'=>$returnTypes,
            'description'=>$desc
        );
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
