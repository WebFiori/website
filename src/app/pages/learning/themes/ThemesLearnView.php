<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\themes;
use webfiori\views\learn\LearnView;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\PNode;
/**
 * Description of ThemesLearnView
 *
 * @author Ibrahim
 */
class ThemesLearnView extends LearnView{
    public function __construct($x = array()) {
        parent::__construct($x);
    }
    //put your code here
    public function createAsidNav() {
        $aside = Page::document()->getChildByID('side-content-area');
        $linksArr = [
            [
                'label'=>'Back to Index',
                'link'=>'learn'
            ],
            [
                'label'=>'Introduction',
                'link'=>'learn/topics/themes'
            ],
            [
                'label'=>'The class \'HTMLNode\'',
                'link'=>'learn/topics/themes/class-HTMLNode'
            ],
            [
                'label'=>'The class \'HTMLDoc\'',
                'link'=>'learn/topics/themes/class-HTMLDoc'
            ],
            [
                'label'=>'The class \'HeadNode\'',
                'link'=>'learn/topics/themes/class-HeadNode'
            ],
            [
                'label'=>'The class \'Page\'',
                'link'=>'learn/topics/themes/class-Page'
            ],
            [
                'label'=>'The class \'Theme\'',
                'link'=>'learn/topics/themes/class-Theme'
            ],
            [
                'label'=>'Creating a Simple Theme',
                'link'=>'learn/topics/themes/create-simple-theme'
            ],
            [
                'label'=>'Using the Method Theme::createHTMLNode()',
                'link'=>'learn/topics/themes/the-method-createHTMLNode'
            ],
//            [
//                'label'=>'Before and After Loaded Callbacks',
//                'link'=>'learn/topics/themes/before-after-loaded'
//            ],
//            [
//                'label'=>'Customizing Page Aside Area',
//                'link'=>'learn/topics/themes/customizing-aside'
//            ],
//            [
//                'label'=>'Adding Support For Custom HTML Elements',
//                'link'=>'learn/topics/themes/custom-html-nodes'
//            ],
//            [
//                'label'=>'Before and After Loaded Events',
//                'link'=>'learn/topics/themes/before-after-load-events'
//            ],
            
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
