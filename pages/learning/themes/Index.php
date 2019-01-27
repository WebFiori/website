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
use phpStructs\html\LinkNode;
use WebFioriGUI;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends WebFioriPage{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Themes',
            'description'=>'Learn about how to create themes using '
            . 'WebFiori Framework.'
        ));
        WebFioriGUI::createTitleNode('Themes');
        $p1 = new PNode();
        $p1->addText('Themes in WebFiori Framework are used to create different '
                . 'custom user interfaces for your website or web application. '
                . 'In addition, they work like a plug in and can provide '
                . 'additional functionality.');
        Page::insert($p1);
        $p2 = new PNode();
        $p2->addText('After finishing the next list of topics, you will be '
                . 'able to create custom web pages using PHP or any front end '
                . 'framework or tool.');
        Page::insert($p2);
        $sec = new HTMLNode('section');
        $h = new HTMLNode('h1');
        $h->addTextNode('Topics:');
        $sec->addChild($h);
        Page::insert($sec);
        $ul = new UnorderedList();
        $ul->addChild($this->createLinkListItem('learn/topics/themes/class-Theme', 'The class \'Theme\''));
        $ul->addChild($this->createLinkListItem('learn/topics/themes/class-Page', 'The class \'Page\''));
        $ul->addChild($this->createLinkListItem('learn/topics/themes/class-HTMLNode', 'The class \'HTMLNode\''));
        $ul->addChild($this->createLinkListItem('learn/topics/themes/class-HeadNode', 'The class \'HeadNode\''));
        $ul->addChild($this->createLinkListItem('learn/topics/themes/create-simple-theme', 'Creating a Simple Theme'));
        $sec->addChild($ul);
        Page::render();
    }
}
new Index();
