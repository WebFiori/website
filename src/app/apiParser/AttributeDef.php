<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\ui\HTMLNode;
use webfiori\docs\apiParser\DocsWebPage;
/**
 * Definition of class attribute
 *
 * @author Ibrahim
 */
class AttributeDef {
    /**
     * 
     * @var DocsWebPage
     */
    private $ownerPage;
    private $name;
    private $type;
    private $shortDescription;
    private $longDescription;
    private $accessMofifier;
    private $pageUrl;
    private $ns;
    private $ownerClass;
    /**
     * Creates new instance of the class.
     * 
     * @param string $accsessMod Access modifier of the attribute such as 'public'.
     * 
     * @param string $type A string that represents the type of the attribute.
     * 
     * @param string $name The name of the attribute as it appears inside the class 
     * such as '$myAttr'.
     * 
     * @param string $summary A summary of the attribute.
     * 
     * @param string $desc A detailed description of the attribute.
     */
    public function __construct($accsessMod = '', $type = '', $name = '', $summary = '', $desc = '') {
        $this->setAccessModifier($accsessMod);
        $this->setName($name);
        $this->setSummary($summary);
        $this->setDescription($desc);
        $this->setType($type);
    }
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
        $node = new HTMLNode('span');
        $node->text($this->getAccessModofier().' '.$this->getName());
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
    public function getDescriptionAsHTMLNode() {
        $node = HTMLNode::fromHTMLText($this->getDescription());
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
     * Sets the description of the attribute.
     * @param string $desc The description of the attribute.
     */
    public function setSummary($desc) {
        $this->shortDescription = $desc;
    }
    /**
     * Returns HTMLNode which contains a link to the detailed description of 
     * the attribute on the same page.
     * 
     * @return HTMLNode The node is used in summary block of the docs web page.
     */
    public function getSummaryNode() {
        $node = new HTMLNode('span');
        $node->text($this->getAccessModofier().' ');
        $node->addChild('a', [
            'href' => $this->getOwnerPage()->getCanonical().'#'.$this->getName()
        ], false)->text($this->getName());
        
        return $node;
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
    /**
     * Returns the summary of the attribute.
     * @return string The summary of the attribute.
     */
    public function getSummary() {
        return $this->shortDescription;
    }
    /**
     * Creates HTMLNode that holds the summary of the attribute.
     * 
     * @return HTMLNode The node name will be 'span'.
     */
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
