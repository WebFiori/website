<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use WebFioriGUI;
use webfiori\entity\Util;
use webfiori\entity\File;
/**
 * A class that is used to display a class API object.
 *
 * @author Ibrahim
 */
class APIPage {
    /**
     *
     * @var ClassAPI 
     */
    private $class;
    /**
     * 
     * @param ClassAPI $class
     */
    public function __construct($class) {
        $this->class = $class;
        Page::lang('en');
        Page::dir('ltr');
        Page::title($class->getName());
        Page::document()->getBody()->setClassName('api-page');
        Page::description($class->getShortDescription());
        Page::canonical($class->getLink());
        Page::document()->getHeadNode()->addCSS(Page::cssDir().'/api-page.css');
        $packageNode = new PNode();
        $packageNode->addText('<b class="mono">namespace '.$class->getNameSpace().'</b>');
        Page::insert($packageNode);
        WebFioriGUI::createTitleNode($class->getLongName());
        $this->createClassDescriptionNode($class);
        Page::insert($class->getAttributesSummaryNode());
        Page::insert($class->getFunctionsSummaryNode());
        Page::insert($class->getAttributesDetailsNode());
        Page::insert($class->getFunctionsDetailsNode());
    }
    public function createHTMLFile($path) {
        $savePath = $path.$this->class->getNameSpace();
        if(Util::isDirectory($savePath, TRUE)){
            $file = new File();
            $file->setName($this->class->getName().'.html');
            $file->setPath($savePath);
            $file->setRawData(Page::document()->toHTML());
            $file->write();
            return TRUE;
        }
        return FALSE;
    }
    /**
     * 
     * @param ClassAPI $class
     */
    private function createClassDescriptionNode($class) {
        $node = WebFioriGUI::createRowNode(FALSE, FALSE);
        $descNode = new PNode();
        $descNode->addText($class->getShortDescription().' '.$class->getLongDescription());
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
