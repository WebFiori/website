<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views;
use webfiori\entity\Page;
use webfiori\WebFiori;
use phpStructs\html\ListItem;
use phpStructs\html\LinkNode;
use phpStructs\html\HTMLNode;
use phpStructs\html\PNode;
/**
 * Description of WebFioriPage
 *
 * @author Ibrahim
 */
class WebFioriPage {
    public function __construct($options=array()) {
        Page::theme('WebFiori Theme');
        if(isset($options['title'])){
            Page::title($options['title']);
        }
        else{
            Page::title('WebFiori Page');
        }
        if(isset($options['description'])){
            Page::description($options['description']);
        }
        else{
            Page::description(WebFiori::getSiteConfig()->getDescriptions()['EN']);
        }
        if(isset($options['canonical'])){
            Page::canonical($options['canonical']);
        }
        if(isset($options['site-name'])){
            Page::siteName($options['site-name']);
        }
        else{
            Page::siteName(WebFiori::getSiteConfig()->getWebsiteNames()['EN']);
        }
        Page::lang('EN');
    }
    /**
     * Creates HTML node of type 'img'
     * @param string $src The value of the attribute 'src'.
     * @param string $alt The value of the attribute 'alt'.
     * @return HTMLNode
     */
    public function createImag($src,$alt='') {
        $img = new HTMLNode('img', FALSE);
        $img->setAttribute('src', $src);
        $img->setAttribute('alt', $alt);
        return $img;
    }
    /**
     * 
     * @param type $link
     * @param type $label
     * @return ListItem
     */
    public function createLinkListItem($link,$label,$target='_self') {
        $li00 = new ListItem();
        $link00 = new LinkNode($link, $label,$target);
        $li00->addChild($link00);
        return $li00;
    }
    public function createParagraph($text) {
        $p = new PNode();
        $p->addText($text);
        Page::insert($p);
    }
    /**
     * 
     * @param type $options
     * @return HTMLNode
     */
    public function createNode($options) {
        return Page::theme()->createHTMLNode($options);
    }
    public function displayView() {
        Page::render();
    }
    
}
