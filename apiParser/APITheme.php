<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\apiParser;
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\PNode;
use webfiori\apiParser\ClassAPI;
/**
 * Description of APITheme
 * @author Ibrahim
 */
abstract class APITheme extends Theme{
    /**
     * The class that the theme will use to create APIs description page.
     * @var ClassAPI 
     */
    private $class;
    public function __construct() {
        parent::__construct();
    }
    /**
     * Sets the class that the theme will use to create APIs description page.
     * @param ClassAPI $class
     */
    public function setClass($class) {
        if($class instanceof ClassAPI){
            $this->class = $class;
        }
    }
    /**
     * Creates HTML div node that contains the body of the page.
     * The node will have the following sub-nodes:
     * <ul>
     * <li>Class description node.</li>
     * <li>Class attributes summary node.</li>
     * <li>Class functions summary node.</li>
     * <li>Class attributes details node.</li>
     * <li>Class functions details node.</li>
     * </ul>
     * @return HTMLNode
     */
    public function createBodyNode() {
        $body = new HTMLNode();
        $body->addChild($this->createClassDescriptionNode());
        $body->addChild($this->createAttrsSummaryBlock());
        $body->addChild($this->createFunctionsSummaryBlock());
        $body->addChild($this->createAttrsDetailsBlock());
        $body->addChild($this->createFunctionsDetailsBlock());
        return $body;
    }
    /**
     * Returns the class that the theme will use to create APIs description page.
     * @return ClassAPI|NULL The class that the theme will use to create APIs description page. 
     * if no class is set, the function will return NULL.
     */
    public function getClass() {
        return $this->class;
    }
    /**
     * 
     * @return HTMLNode
     */
    public function createFunctionsSummaryBlock(){
        $summaryNode = new HTMLNode();
        $summaryNode->setAttribute('class', 'summary-box');
        $summaryNode->setID('functions-summary');
        $titleNode = new PNode();
        $titleNode->setClassName('summary-box-title');
        $titleNode->addText('Class Functions Summary');
        $summaryNode->addChild($titleNode);
        $class = $this->getClass();
        if($class !== NULL){
            foreach ($class->getClassFunctions() as $method){
                $summaryNode->addChild($this->createFunctionsSummaryBlock($method));
            }
        }
        return $summaryNode;
    }
    /**
     * 
     * @return HTMLNode
     */
    public function createFunctionsDetailsBlock(){
        $detailsNode = new HTMLNode();
        $detailsNode->setAttribute('class', 'details-box');
        $detailsNode->setID('functions-details');
        $titleNode = new PNode();
        $titleNode->setClassName('details-box-title');
        $titleNode->addText('Class Functions Details');
        $detailsNode->addChild($titleNode);
        $class = $this->getClass();
        if($class !== NULL){
            foreach ($class->getClassFunctions() as $method){
                $detailsNode->addChild($this->createFunctionDetailsBlock($method));
            }
        }
        return $detailsNode;
    }
    /**
     * 
     * @return HTMLNode
     */
    public function createAttrsSummaryBlock(){
        $summaryNode = new HTMLNode();
        $summaryNode->setAttribute('class', 'summary-box');
        $summaryNode->setID('attrs-summary');
        $titleNode = new PNode();
        $titleNode->setClassName('summary-box-title');
        $titleNode->addText('Class Attributes Summary');
        $summaryNode->addChild($titleNode);
        $class = $this->getClass();
        if($class !== NULL){
            foreach ($class->getClassAttributes() as $attr){
                $summaryNode->addChild($this->createAttributeSummaryBlock($attr));
            }
        }
        return $summaryNode;
    }
    /**
     * Creates an object of type HTMLNode that represents the part of the page 
     * that will contain the details of class attributes.
     * @return HTMLNode
     */
    public function createAttrsDetailsBlock(){
        $detailsNode = new HTMLNode();
        $detailsNode->setAttribute('class', 'details-box');
        $detailsNode->setID('attrs-details');
        $titleNode = new PNode();
        $titleNode->setClassName('details-box-title');
        $titleNode->addText('Class Attributes Details');
        $detailsNode->addChild($titleNode);
        $class = $this->getClass();
        if($class !== NULL){
            foreach ($class->getClassAttributes() as $attr){
                $detailsNode->addChild($this->createAttributeDetailsBlock($attr));
            }
        }
        return $detailsNode;
    }
    /**
     * Creates HTMLNode object that contains class function summary.
     * @param FunctionDef $func An object of type FunctionDef.
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents summary block of the 
     * function.
     */
    abstract public function createFunctionSummaryBlock($func);
    /**
     * Creates HTMLNode object that contains class function details.
     * @param FunctionDef $func An object of type FunctionDef.
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents details block of the 
     * function.
     */
    abstract public function createFunctionDetailsBlock($func);
    /**
     * Creates HTMLNode object that contains class attribute summary.
     * @param AttributeDef $attr An object of type AttributeDef.
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents summary block of the 
     * attribute.
     */
    abstract public function createAttributeSummaryBlock($attr);
    /**
     * Creates HTMLNode object that contains class attribute details.
     * @param AttributeDef $attr An object of type AttributeDef.
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents details block of the 
     * attribute.
     */
    abstract public function createAttributeDetailsBlock($attr);
    /**
     * Creates HTMLNode object that contains class description.
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents class description block.
     */
    abstract public function createClassDescriptionNode();
}
