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
abstract class LearnView extends WebFioriPage{
    private $nextTopicLink;
    private $prevTopicLink;
    private $activeAside;
    public function __construct($x=array(
        'title'=>'Learnning Center',
        'description'=>'Here you will find a list of topics that you might '
                . 'need to learn in order to use WebFiori Framework in the most '
                . 'effictive way.')) {
        parent::__construct($x);
        $titleNode = Page::theme()->createHTMLNode(['type'=>'page-title','title'=>Page::title()]);
        Page::document()->getChildByID('main-content-area')->addChild($titleNode);
        $active = isset($x['active-aside']) ? $x['active-aside'] : -1;
        $this->setAsideActiveLinkNum($active);
    }
    public function displayView() {
        $div = Page::theme()->createHTMLNode(['type'=>'container']);
        $div->setID('next-prev-container');
        if($this->prevTopicLink !== null){
            $this->prevTopicLink->setClassName('prev-button');
            $div->addChild($this->prevTopicLink);
        }
        if($this->nextTopicLink !== null){
            $this->nextTopicLink->setClassName('next-button');
            $div->addChild($this->nextTopicLink);
        }
        if($div->childrenCount() != 0){
            Page::insert($div);
        }
        $this->createAsidNav();
        parent::displayView();
    }
    public function setNextTopicLink($link,$title) {
        $this->nextTopicLink = new HTMLNode();
        $linkNode = new LinkNode($link,$title);
        $this->nextTopicLink->addTextNode('<b>Next: </b>',false);
        $this->nextTopicLink->addChild($linkNode);
    }
    public function setPrevTopicLink($link,$title) {
        $this->prevTopicLink = new HTMLNode();
        $linkNode = new LinkNode($link,$title);
        $this->prevTopicLink->addTextNode('<b>Previous: </b>',false);
        $this->prevTopicLink->addChild($linkNode);
    }
    public function getAsideActiveLinkNum() {
        return $this->activeAside;
    }
    public function setAsideActiveLinkNum($num) {
        $this->activeAside = $num;
    }
    public abstract function createAsidNav();
}
