<?php
namespace webfiori\views\learn\routing;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use webfiori\views\learn\LearnView;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\PNode;
/**
 * Description of RoutingLearnView
 *
 * @author Ibrahim
 */
class RoutingLearnView extends LearnView{
    public function __construct($x = array()) {
        parent::__construct($x);
    }
    public function createAsidNav() {
        $aside = &Page::document()->getChildByID('side-content-area');
        $backLink = new PNode();
        $backLink->addText('<a href="learning">Back to Learning Center Index</a>', array(
            'esc-entities'=>FALSE
        ));
        $backLink->setClassName('back-link');
        $aside->addChild($backLink);
        $aside->addTextNode('<p class="aside-links-title"><b>Topics:</b></p>',FALSE);
        $aside->setAttribute('style', 'border: 1px solid;');
        $links = new UnorderedList();
        $links->setClassName('aside-nav');
        $aside->addChild($links);
        $li00 = $this->createLinkListItem('learn/topics/routing', 'Introduction to Routing');
        $li00->setClassName('aside-nav-item');
        $links->addChild($li00);
        $li01 = $this->createLinkListItem('learn/topics/routing/how-it-works', 'How Routing System Works');
        $li01->setClassName('aside-nav-item');
        $links->addChild($li01);
        $li02 = $this->createLinkListItem('learn/topics/routing/class-Router', 'The Class \'Router\'');
        $li02->setClassName('aside-nav-item');
        $links->addChild($li02);
        $li03 = $this->createLinkListItem('learn/topics/routing/types-of-routes', 'Types of Routes');
        $li03->setClassName('aside-nav-item');
        //$links->addChild($li03);
        switch ($this->getAsideActiveLinkNum()){
            case 0:{
               $li00->setClassName('aside-nav-item active-aside-item');
               break;
            }
            case 1:{
               $li01->setClassName('aside-nav-item active-aside-item');
               break;
            }
            case 2:{
               $li02->setClassName('aside-nav-item active-aside-item');
               break;
            }
            case 3:{
               $li03->setClassName('aside-nav-item active-aside-item');
               break;
            }
        }
    }

}
