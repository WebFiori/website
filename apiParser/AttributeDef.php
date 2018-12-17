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
/**
 * Definition of class attribute
 *
 * @author Ibrahim
 */
class AttributeDef {
    private $name;
    private $type;
    private $shortDescription;
    private $longDescription;
    private $accessMofifier;
    private $pageUrl;
    private $ns;
    private $ownerClass;
    /**
     * Sets attribute access modifier.
     * @param string $mod Attribute access modifier (e.g. 'public', 'protected', 'const').
     */
    public function setAccessModifier($mod) {
        $this->accessMofifier = $mod;
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
     * Returns attribute access modifier.
     * @return string attribute access modifier (e.g. 'public', 'protected', 'const').
     */
    public function getAccessModofier() {
        return $this->accessMofifier;
    }
    /**
     * Sets the description of the attribute.
     * @param string $desc The description of the attribute.
     */
    public function setDescription($desc) {
        $this->longDescription = $desc;
    }
    public function setPageURL($url){
        $this->pageUrl = $url;
    }
    public function getPageURL(){
        return $this->pageUrl;
    }
    /**
     * Returns the description of the attribute.
     * @return string The description of the attribute.
     */
    public function getDescription() {
        return $this->longDescription;
    }
    /**
     * Sets the description of the attribute.
     * @param string $desc The description of the attribute.
     */
    public function setSummary($desc) {
        $this->shortDescription = $desc;
    }
    /**
     * Returns the summary of the attribute.
     * @return string The summary of the attribute.
     */
    public function getSummary() {
        return $this->shortDescription;
    }
    /**
     * Sets the datatype of the attribute.
     * @param string $type Datatype of the attribute.
     */
    public function setType($type) {
        $this->type = $type;
    }
    /**
     * Returns datatype of the attribute.
     * @return string Datatype of the attribute.
     */
    public function getType(){
        return $this->type;
    }
    /**
     * Sets the name of the attribute.
     * @param string $name The name of the attribute.
     */
    public function setName($name) {
        $this->name = $name;
    }
    /**
     * Returns the name of the attribute.
     * @return string The name of the attribute.
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Returns HTML node that contains the summary part of the attribute.
     * @return HTMLNode The node will contain attribute name and short description.
     */
    public function summaryHTMLNode() {
        $node = WebFioriGUI::createRowNode(TRUE, FALSE);
        $node->setAttribute('style', 'border: 1px solid;');
        $node->setClassName($node->getAttributeValue('class').' attribute-summary');
        $attrNameNode = WebFioriGUI::createColNode(12, FALSE, FALSE);
        $attrNameNode->setClassName('class-attribute');
        $nodeText = $this->getAccessModofier().' <a class="class-attribute" href="'.$this->getPageURL().'/'. str_replace('\\', '/', trim($this->getOwnerClass()->getNameSpace(), '\\')).'/'.$this->getOwnerClass()->getName().'#'.$this->getName().'">'.$this->getName().'</a>';
        $attrNameNode->addTextNode($nodeText);
        $node->addChild($attrNameNode);
        $descNode = new PNode();
        $descNode->addText($this->getSummary());
        $node->addChild($descNode);
        return $node;
    }
    
    /**
     * Returns HTML node that contains the details part of the attribute.
     * @return HTMLNode The node will contain attribute name and long description.
     */
    public function asHTMLNode() {
        $node = WebFioriGUI::createRowNode(TRUE, FALSE);
        $node->setAttribute('style', 'border: 1px solid;');
        $node->setClassName($node->getAttributeValue('class').' attribute-summary');
        $attrNameNode = WebFioriGUI::createColNode(12, FALSE, FALSE);
        $attrNameNode->setClassName('class-attribute');
        $attrNameNode->setID($this->getName());
        $nodeText = $this->getAccessModofier().' '.$this->getName();
        $attrNameNode->addTextNode($nodeText);
        $node->addChild($attrNameNode);
        $descNode = new HTMLNode();
        $descNode->addTextNode($this->getDescription());
        $descNode->setClassName('details-box');
        $node->addChild($descNode);
        return $node;
    }
}
