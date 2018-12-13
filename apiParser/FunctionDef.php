<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use WebFioriGUI;
use phpStructs\html\PNode;
use phpStructs\html\HTMLNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
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
     * Sets the long description of the function.
     * @param string $desc The long description of the function.
     */
    public function setLongDescription($desc) {
        $this->longDescription = $desc;
    }
    /**
     * Returns the long description of the function.
     * @return string The long description of the function.
     */
    public function getLongDescription() {
        return $this->longDescription;
    }
    /**
     * Sets the short description of the function.
     * @param string $desc The short description of the function.
     */
    public function setShortDescription($desc) {
        $this->shortDescription = $desc;
    }
    /**
     * Returns the short description of the function.
     * @return string The short description of the function.
     */
    public function getShortDescription() {
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
    /**
     * Returns HTML node that contains the summary part of the function.
     * @return HTMLNode The node will contain function name and short description.
     */
    public function summaryHTMLNode() {
        $node = WebFioriGUI::createRowNode(TRUE, FALSE);
        $node->setAttribute('style', 'border: 1px solid;');
        $node->setClassName($node->getAttributeValue('class').' function-summary');
        $methNameNode = WebFioriGUI::createColNode(12, FALSE, FALSE);
        $methNameNode->setClassName('function-name');
        $nodeText = $this->getAccessModofier().' function <a class="function-name" href="'.$this->getPageURL().'/'. str_replace('\\', '/', trim($this->getOwnerClass()->getNameSpace(), '\\')).'/'.$this->getOwnerClass()->getName().'#'.str_replace('&', '', $this->getName()).'">'. str_replace('&', '&amp;', $this->getName()).'</a>(';
        $count = count($this->funcParams);
        for($x = 0 ; $x < $count ; $x++){
            $param = $this->funcParams['param-'.$x];
            if($x + 1 == $count){
                $nodeText .= $param['var-type'].' '.$param['var-name'];
            }
            else{
                $nodeText .= $param['var-type'].' '.$param['var-name'].', ';
            }
        }
        $nodeText .= ')';
        $methNameNode->addTextNode($nodeText);
        $node->addChild($methNameNode);
        $descNode = new PNode();
        $descNode->addText($this->getShortDescription());
        $node->addChild($descNode);
        return $node;
    }
    /**
     * Returns HTML node that contains the details part of the function.
     * @return HTMLNode The node will contain function name, long description, 
     * parameters description and return description.
     */
    public function asHTMLNode() {
        $node = WebFioriGUI::createRowNode(TRUE, FALSE);
        $node->setClassName($node->getAttributeValue('class').' function-details');
        $methNameNode = WebFioriGUI::createColNode(12, FALSE, FALSE);
        $methNameNode->setID(str_replace('&', '', $this->getName()));
        $methNameNode->setClassName($methNameNode->getAttributeValue('class').' function-name');
        $nodeText = $this->getAccessModofier().' function '. str_replace('&', '&amp;', $this->getName()).'(';
        $count = count($this->funcParams);
        for($x = 0 ; $x < $count ; $x++){
            $param = $this->funcParams['param-'.$x];
            if($x + 1 == $count){
                $nodeText .= $param['var-type'].' '. str_replace('&', '&amp', $param['var-name']);
            }
            else{
                $nodeText .= $param['var-type'].' '.str_replace('&', '&amp', $param['var-name']).', ';
            }
        }
        $nodeText .= ')';
        $methNameNode->addTextNode($nodeText);
        $node->addChild($methNameNode);
        $descNode = new HTMLNode();
        $descNode->addTextNode($this->getLongDescription());
        $descNode->setClassName('description-box');
        $node->addChild($descNode);
        if($count != 0){
            $node->addChild($this->createParametersBox());
        }
        $node->addChild($this->createReturnsBox());
        return $node;
    }
    private function createReturnsBox() {
        if(strlen($this->funcReturns['return-types']) != 0){
            $node = WebFioriGUI::createRowNode(FALSE,FALSE);
            $textNode = new PNode();
            $textNode->addText('Returns: <span class="mono">'.$this->funcReturns['return-types'].'</span>');
            $node->addChild($textNode);
            $descNode = new HTMLNode();
            $descNode->addTextNode($this->funcReturns['description']);
            $descNode->setClassName('details-box');
            $node->addChild($descNode);
            return $node;
        }
    }
    private function createParametersBox() {
        $node = WebFioriGUI::createRowNode(FALSE,FALSE);
        $textNode = new PNode();
        $textNode->addText('Parameters:');
        $node->addChild($textNode);
        $ul = new UnorderedList();
        $count = count($this->funcParams);
        for($x = 0 ; $x < $count ; $x++){
            $param = $this->funcParams['param-'.$x];
            $li = new ListItem(TRUE);
            $text = '<span style="font-family: monospace;">'.$param['var-type'].' '.$param['var-name'].'</span>';
            if($param['is-optional'] === TRUE){
                $text .= ' [Optional]';
            }
            $text .= ' '.$param['var-desc'];
            $li->setText($text);
            $ul->addChild($li);
        }
        $node->addChild($ul);
        return $node;
    }
}
