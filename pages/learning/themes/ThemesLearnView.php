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
        $aside = &Page::document()->getChildByID('side-content-area');
        $aside->addTextNode('<p><b>Topics:</b></p>');
        $aside->setAttribute('style', 'border: 1px solid;');
        $links = new UnorderedList();
        $links->setClassName('aside-nav');
        $aside->addChild($links);
        $li00 = $this->createLinkListItem('learn/topics/themes/class-HTMLNode', 'The class \'HTMLNode\'');
        $li00->setClassName('aside-nav-item');
        $links->addChild($li00);
        $li01 = $this->createLinkListItem('learn/topics/themes/class-HTMLDoc', 'The class \'HTMLDoc\'');
        $li01->setClassName('aside-nav-item');
        $links->addChild($li01);
        $li02 = $this->createLinkListItem('learn/topics/themes/class-HeadNode', 'The class \'HeadNode\'');
        $li02->setClassName('aside-nav-item');
        $links->addChild($li02);
        $li03 = $this->createLinkListItem('learn/topics/themes/class-Page', 'The class \'Page\'');
        $li03->setClassName('aside-nav-item');
        $links->addChild($li03);
        $li04 = $this->createLinkListItem('learn/topics/themes/class-Theme', 'The class \'Theme\'');
        $li04->setClassName('aside-nav-item');
        $links->addChild($li04);
        $li05 = $this->createLinkListItem('learn/topics/themes/create-simple-theme', 'Creating a Simple Theme');
        $li05->setClassName('aside-nav-item');
        $links->addChild($li05);
        $li06 = $this->createLinkListItem('learn/topics/themes/customizing-head-tag', 'Adding JS, CSS and Other &lt;head&gt; Tag Elements.');
        $li06->setClassName('aside-nav-item');
        $links->addChild($li06);
        $li07 = $this->createLinkListItem('learn/topics/themes/customizing-header', 'Customizing Page Header.');
        $li07->setClassName('aside-nav-item');
        $links->addChild($li07);
        $li08 = $this->createLinkListItem('learn/topics/themes/customizing-footer', 'Customizing Page Footer.');
        $li08->setClassName('aside-nav-item');
        $links->addChild($li08);
        $li09 = $this->createLinkListItem('learn/topics/themes/customizing-aside', 'Customizing Page Aside Area.');
        $li09->setClassName('aside-nav-item');
        $links->addChild($li09);
        $li10 = $this->createLinkListItem('learn/topics/themes/custom-html-nodes', 'Adding Support For Custom HTML Elements.');
        $li10->setClassName('aside-nav-item');
        $links->addChild($li10);
        $li11 = $this->createLinkListItem('learn/topics/themes/before-after-load-events', 'Before and After Loaded Events.');
        $li11->setClassName('aside-nav-item');
        $links->addChild($li11);
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
            case 4:{
                $li04->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 5:{
                $li05->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 6:{
                $li06->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 7:{
                $li07->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 8:{
                $li08->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 9:{
                $li09->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 10:{
                $li10->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 11:{
                $li11->setClassName('aside-nav-item active-aside-item');
                break;
            }
        }
    }

}
