<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use phpStructs\html\HTMLNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use webfiori\entity\Page;
class WebFioriAPIGUI{
    /**
     * 
     * @param type $title
     * @return HTMLNode
     */
    public static function createTitleNode($title=null) {
        $titleRow = self::createRowNode(FALSE,FALSE);
        $h1 = new HTMLNode('h2');
        if($title != NULL){
            $h1->addTextNode($title,FALSE);
        }
        else{
            $h1->addTextNode(Page::title(),FALSE);
        }
        $h1->setClassName('pa-'.Page::dir().'-col-10-nm-np');
        $titleRow->addChild($h1);
        return $titleRow;
    }
    
    /**
     * 
     * @param type $colNum
     * @param type $withPadding
     * @param type $withMargin
     * @return HTMLNode
     */
    public static function createColNode($colNum=1,$withPadding=true,$withMargin=true){
        $wp = $withPadding === TRUE ? '' : '-np';
        $wm = $withMargin === TRUE ? '' : '-nm';
        $node = new HTMLNode();
        $node->setClassName('pa-'.Page::get()->getWritingDir().'-col-'.$colNum.$wm.$wp);
        return $node;
    }
    /**
     * 
     * @param type $withPadding
     * @param type $withMargin
     * @return HTMLNode
     */
    public static function createRowNode($withPadding=true,$withMargin=true){
        $wp = $withPadding === TRUE ? '' : '-np';
        $wm = $withMargin === TRUE ? '' : '-nm';
        $node = new HTMLNode();
        $node->setClassName('pa-row'.$wm.$wp);
        return $node;
    }
}