<?php
namespace webfiori\views\learn\themes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use webfiori\views\WebFioriPage;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\HTMLNode;
use webfiori\WebFiori;
use WebFioriGUI;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Themes',
            'description'=>'Learn about how to create themes using '
            . 'WebFiori Framework.'
        ));
        $sec = $this->createSection('Introduction');
        Page::insert($sec);
        $sec->addChild($this->createParagraph(''
                . 'A web application or a website which provide useful content '
                . 'isn\'t good enough if it does not proved good and easy to '
                . 'use user interface. User interface is one of the important factors that '
                . 'can be used to mesure how good a website is. For that reason, '
                . 'WebFiori Framework provide the needed tools to create a '
                . 'custom UIs for your website or web application.'
                . ''));
        $sec->addChild($this->createParagraph('Themes in WebFiori Framework are used to create different '
                . 'custom user interfaces for your website or web application. '
                . 'In addition, they work like a plug-ins and can provide '
                . 'additional functionality.'));
        $sec->addChild($this->createParagraph('The first thing that you need to know are the classes that you will intract with as '
                . 'a theme designer. Once you know about them, we will start by building a simple theme that will '
                . 'only show the areas of a web page. After that, we will start by customizing the '
                . 'theme using JS, CSS and any extra tools needed.'));
        $sec->addChild($this->createParagraph('After finishing the next list of topics, you will be '
                . 'able to create custom web pages using PHP or any front end '
                . 'framework or tool.'));
        $sec2 = $this->createSection('Topics Covered:');
        Page::insert($sec2);
        $ul = new UnorderedList();
        $li1 = new ListItem();
        $li1->addTextNode('Classes:');
        $subUl1 = new UnorderedList();
        $li1->addChild($subUl1);
        $ul->addChild($li1);
        $subUl1->addChild($this->createLinkListItem('learn/topics/themes/class-HTMLNode', 'The class \'HTMLNode\''));
        $subUl1->addChild($this->createLinkListItem('learn/topics/themes/class-HTMLDoc', 'The class \'HTMLDoc\''));
        $subUl1->addChild($this->createLinkListItem('learn/topics/themes/class-HeadNode', 'The class \'HeadNode\''));
        $subUl1->addChild($this->createLinkListItem('learn/topics/themes/class-Page', 'The class \'Page\''));
        $subUl1->addChild($this->createLinkListItem('learn/topics/themes/class-Theme', 'The class \'Theme\''));
        $li2 = new ListItem();
        $li2->addTextNode('Start Creating Themes:');
        $subUl2 = new UnorderedList();
        $li2->addChild($subUl2);
        $ul->addChild($li2);
        $subUl2->addChild($this->createLinkListItem('learn/topics/themes/create-simple-theme', 'Creating a Simple Theme'));
        $subUl2->addChild($this->createLinkListItem('learn/topics/themes/customizing-head-tag', 'Adding JS, CSS and Other &lt;head&gt; Tag Elements.'));
        $subUl2->addChild($this->createLinkListItem('learn/topics/themes/customizing-header', 'Customizing Page Header.'));
        $subUl2->addChild($this->createLinkListItem('learn/topics/themes/customizing-footer', 'Customizing Page Footer.'));
        $subUl2->addChild($this->createLinkListItem('learn/topics/themes/customizing-aside', 'Customizing Page Aside Area.'));
        $subUl2->addChild($this->createLinkListItem('learn/topics/themes/custom-html-nodes', 'Adding Support For Custom HTML Elements.'));
        $subUl2->addChild($this->createLinkListItem('learn/topics/themes/before-after-load-events', 'Before and After Loaded Events.'));
        $sec2->addChild($ul);
        
        $this->setNextTopicLink('learn/topics/themes/class-HTMLNode', 'The class \'HTMLNode\'');
        $this->displayView();
    }
}
new Index();
