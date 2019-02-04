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
    //put your code here
    public function createAsidNav() {
        $aside = &Page::document()->getChildByID('side-content-area');
        $aside->addTextNode('Topics:');
        $aside->setAttribute('style', 'border: 1px solid;');
        $links = new UnorderedList();
        $aside->addChild($links);
        $links->addChild($this->createLinkListItem('learn/topics/themes/class-HTMLNode', 'The class \'HTMLNode\''));
        $links->addChild($this->createLinkListItem('learn/topics/themes/class-HTMLDoc', 'The class \'HTMLDoc\''));
        $links->addChild($this->createLinkListItem('learn/topics/themes/class-HeadNode', 'The class \'HeadNode\''));
        $links->addChild($this->createLinkListItem('learn/topics/themes/class-Page', 'The class \'Page\''));
        $links->addChild($this->createLinkListItem('learn/topics/themes/class-Theme', 'The class \'Theme\''));
        $links->addChild($this->createLinkListItem('learn/topics/themes/create-simple-theme', 'Creating a Simple Theme'));
        $links->addChild($this->createLinkListItem('learn/topics/themes/customizing-head-tag', 'Adding JS, CSS and Other &lt;head&gt; Tag Elements.'));
        $links->addChild($this->createLinkListItem('learn/topics/themes/customizing-header', 'Customizing Page Header.'));
        $links->addChild($this->createLinkListItem('learn/topics/themes/customizing-footer', 'Customizing Page Footer.'));
        $links->addChild($this->createLinkListItem('learn/topics/themes/customizing-aside', 'Customizing Page Aside Area.'));
        $links->addChild($this->createLinkListItem('learn/topics/themes/custom-html-nodes', 'Adding Support For Custom HTML Elements.'));
        $links->addChild($this->createLinkListItem('learn/topics/themes/before-after-load-events', 'Before and After Loaded Events.'));
    }

}
