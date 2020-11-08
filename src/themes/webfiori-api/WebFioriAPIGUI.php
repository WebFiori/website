<?php

use webfiori\ui\HTMLNode;
use webfiori\framework\Page;

class WebFioriAPIGUI {
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
        $node->setClassName('pa-'.Page::dir().'-col-'.$colNum.$wm.$wp);
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