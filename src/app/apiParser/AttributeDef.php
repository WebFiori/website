<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\ui\HTMLNode;
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
     * Returns a string that represents a link which can be used in the class 
     * attributes summary block.
     * @return string The returned string will be formatted as follows: 
     * 'ACCESS_MODIFIER &lt;a class="class-attribute" href="BASE_URL/NAMESPACE/CLASS_NAME#ATTR_NAME&gt;ATTR_NAME&lt;a&gt;'
     */
    public function getSummaryLink() {
        return $this->getAccessModofier().
                ' <a class="class-attribute attribute-name" href="'.$this->getPageURL().
                '/'. str_replace('\\', '/', trim($this->getOwnerClass()->getNameSpace(), '\\'))
                .'/'.$this->getOwnerClass()->getName().'#'.$this->getName().'">'
                .$this->getName().'</a>';
    }
    public function getHref() {
        $pUrl = $this->getPageURL();
        $classUrl = str_replace('\\', '/', trim($this->getOwnerClass()->getNameSpace(), '\\'))
                .'/'.$this->getOwnerClass()->getName();
        return $pUrl.'/'.$classUrl.'#'.$this->getName();
    }
    /**
     * Returns an instance of the class 'HTMLNode' that represents class 
     * attribute details block.
     * @return HTMLNode The returned instance will have the following structure:
     * <pre>
&lt;div id="ATTR_NAME" class="block attribute-block" &gt;
    &lt;div id="attribute-ATTR_NAME-name" class="attribute-name-block" &gt;
    &lt;/div&gt;
    &lt;div id="attribute-ATTR_NAME-details" class="attribute-details-block" &gt;
    &lt;/div&gt;
&lt;/div&gt;
     </pre>
     */
    public function getDetailsNode() {
        $node = new HTMLNode();
        $node->setID($this->getName());
        $node->setClassName('block attribute-block');
        $attrNameNode = new HTMLNode();
        $attrNameNode->setClassName('attribute-name');
        $attrNameNode->setID('attribute-'.$this->getName().'-name');
        $nodeText = $this->getAccessModofier().' <span class="class-attribute attribute-name>">'.$this->getName().'</span>';
        $attrNameNode->addTextNode($nodeText,false);
        $node->addChild($attrNameNode);
        $descNode = new HTMLNode();
        $descNode->setID('attribute-'.$this->getName().'-details');
        $descNode->addTextNode($this->getDescription(),false);
        $descNode->setClassName('attribute-details');
        $node->addChild($descNode);
        return $node;
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
     * 
     * @return HTMLNode
     */
    public function getSummaryNode() {
        $node = new HTMLNode();
        $node->setClassName('block attribute-summary-block');
        $attrSummaryLink = $this->getSummaryLink();
        $attrNameNode = new HTMLNode();
        $attrNameNode->setClassName('attribute-name');
        $attrNameNode->addTextNode($attrSummaryLink, false);
        $node->addChild($attrNameNode);
        $descNode = new HTMLNode();
        $descNode->setClassName('description attribute-description');
        $descNode->addTextNode($this->getSummary(),false);
        $node->addChild($descNode);
        return $node;
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
}
