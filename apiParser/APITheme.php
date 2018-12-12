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
/**
 * Description of APITheme
 *
 * @author Ibrahim
 */
abstract class APITheme extends Theme{
    public function __construct() {
        parent::__construct();
    }
    public function createFunctionsSummaryBlock(){
        $summaryNode = new HTMLNode();
        $summaryNode->setAttribute('class', 'summary-box');
        $summaryNode->setID('functions-summary');
        $titleNode = new PNode();
        $titleNode->setClassName('summary-box-title');
        $titleNode->addText('Class Functions Summary');
        $summaryNode->addChild($titleNode);
        return $summaryNode;
    }
    public function createFunctionsDetailsBlock(){
        $summaryNode = new HTMLNode();
        $summaryNode->setAttribute('class', 'details-box');
        $summaryNode->setID('functions-details');
        $titleNode = new PNode();
        $titleNode->setClassName('details-box-title');
        $titleNode->addText('Class Functions Details');
        $summaryNode->addChild($titleNode);
        return $summaryNode;
    }
    public function createAttrsSummaryBlock(){
        $summaryNode = new HTMLNode();
        $summaryNode->setAttribute('class', 'summary-box');
        $summaryNode->setID('attrs-summary');
        $titleNode = new PNode();
        $titleNode->setClassName('summary-box-title');
        $titleNode->addText('Class Attributes Summary');
        $summaryNode->addChild($titleNode);
        return $summaryNode;
    }
    public function createAttrsDetailsBlock(){
        $summaryNode = new HTMLNode();
        $summaryNode->setAttribute('class', 'details-box');
        $summaryNode->setID('attrs-details');
        $titleNode = new PNode();
        $titleNode->setClassName('details-box-title');
        $titleNode->addText('Class Attributes Details');
        $summaryNode->addChild($titleNode);
        return $summaryNode;
    }
    abstract public function createFunctionSummaryBlock($func);
    abstract public function createFunctionDetailsBlock($func);
    abstract public function createAttributeSummaryBlock($attr);
    abstract public function createAttributeDetailsBlock($attr);
    abstract public function createClassDescriptionNode($class);
}
