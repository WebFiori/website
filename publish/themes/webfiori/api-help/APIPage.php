<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * A class that is used to display a class API object.
 *
 * @author Ibrahim
 */
class APIPage {
    /**
     * 
     * @param ClassAPI $class
     */
    public function __construct($class) {
        Page::lang('en');
        Page::dir('ltr');
        Page::title($class->getName());
        Page::document()->getBody()->setClassName('api-page');
        Page::description($class->getLongDescription());
        Page::document()->getHeadNode()->addCSS(Page::cssDir().'/api-page.css');
        $packageNode = new PNode();
        $packageNode->addText('<b class="mono">'.$class->getPackage().'</b>');
        Page::insert($packageNode);
        WebFioriGUI::createTitleNode($class->getLongName());
        $this->createClassDescriptionNode($class);
        Page::insert($class->getAttributesSummaryNode());
        Page::insert($class->getFunctionsSummaryNode());
        Page::insert($class->getAttributesDetailsNode());
        Page::insert($class->getFunctionsDetailsNode());
        Page::render();
    }
    /**
     * 
     * @param ClassAPI $class
     */
    private function createClassDescriptionNode($class) {
        $node = WebFioriGUI::createRowNode(FALSE, FALSE);
        $descNode = new PNode();
        $descNode->addText($class->getLongDescription());
        $node->addChild($descNode);
        Page::insert($node);
        
        $classV = $class->getVersion();
        if($classV !== NULL){
            $vNode = new PNode();
            $vNode->addText('Version: '.$classV);
            Page::insert($vNode);
        }
        
    }
}
