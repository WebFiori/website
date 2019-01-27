<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn;
use webfiori\entity\Page;
use webfiori\views\WebFioriPage;
use webfiori\entity\Util;
use phpStructs\html\HTMLNode;
use phpStructs\html\PNode;
use phpStructs\html\LinkNode;
use webfiori\views\learn\LearningAsideMenu;
use WebFioriGUI;
/**
 * Description of LearnView
 *
 * @author Ibrahim
 */
class LearnView extends WebFioriPage{
    private $nextTopicLink;
    private $prevTopicLink;
    public function __construct($title='Learnning Center',$desc='Here you will find a list of topics that you might '
                . 'need to learn in order to use WebFiori Framework in the most '
                . 'effictive way.') {
        parent::__construct();
        Page::title($title);
        WebFioriGUI::createTitleNode($title);
        Page::description($desc);
        Page::document()->getChildByID('side-content-area')->addChild(LearningAsideMenu::createAsideNav());
    }
    public function display() {
        $div = new HTMLNode();
        $div->setID('next-prev-container');
        if($this->prevTopicLink !== NULL){
            $this->prevTopicLink->setClassName('prev-button');
            $div->addChild($this->prevTopicLink);
        }
        if($this->nextTopicLink !== NULL){
            $this->nextTopicLink->setClassName('next-button');
            $div->addChild($this->nextTopicLink);
        }
        if($div->childrenCount() != 0){
            Page::insert($div);
        }
        Page::render();
    }
    public function setNextTopicLink($link,$title) {
        $this->nextTopicLink = new LinkNode($link, $title);
    }
    public function setPrevTopicLink($link,$title) {
        $this->prevTopicLink = new LinkNode($link, $title);
    }
    public function createHeaderSection($array){
        $headerContainer = new HTMLNode();
        $headerContainer->setClassName('header-container');
        $pageUrl = Util::getRequestedURL();
        $p = new PNode();
        $p->addText('<b class="header-title">Content of the page:</b>');
        $headerContainer->addChild($p);
        $header = new HTMLNode('header');
        $headerContainer->addChild($header);
        foreach ($array as $elId => $text){
            $link = new LinkNode($pageUrl.'#'.$elId, $text);
            $h = new HTMLNode('h2');
            $h->addChild($link);
            $header->addChild($h);
        }
        Page::insert($headerContainer);
    }
}
