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
        $aside = Page::document()->getChildByID('side-content-area');
        $linksArr = [
            [
                'label'=>'Back to Index',
                'link'=>'learn'
            ],
            [
                'label'=>'Introduction to Routing',
                'link'=>'learn/topics/routing'
            ],
            [
                'label'=>'How Routing System Works',
                'link'=>'learn/topics/routing/how-it-works'
            ],
            [
                'label'=>'The Class \'Router\'',
                'link'=>'learn/topics/routing/class-Router'
            ],
            [
                'label'=>'Types of Routes',
                'link'=>'learn/topics/routing/types-of-routes'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
