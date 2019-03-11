<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\themes;
use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;
/**
 * Description of MethodCreateNodeView
 *
 * @author Eng.Ibrahim
 */
class MethodCreateNodeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Using the Method Theme::createHTMLNode()',
            'description'=>'Learn the basics of how to use the method Using the Method Theme::createHTMLNode() '
            . 'in order to create custom UI components.',
            'active-aside'=>6
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph(''
                . 'As a UI developer, your pages will have many different '
                . 'UI components such as tables, input elements and many others. '
                . 'Some of the components will be generic and can be used almost '
                . 'in any page. For example, you might have a table which '
                . 'can have different data for different views. The method '
                . '<a href="docs/webfiori/entity/Theme#createHTMLNode" target="_blank">Theme::createHTMLNode()</a> can be used to create such '
                . 'a generic table. '
                . ''));
        Page::insert($this->createParagraph(''
                . 'The main aim of this method is to give the developers the ability '
                . 'to create generic HTML elements which can be used in different '
                . 'places. The idea is that the creator of the theme can specify '
                . 'what type of elements the method can create. Theme developer '
                . 'must implement this method in a way that it returns an instance '
                . 'of the class <a href="docs/phpStructs/html/HTMLNode" target="_blank">HTMLNode</a>.'
                . ''));
        Page::insert($this->createParagraph(''
                . 'What we will be doing is to show you how to use this method. '
                . 'Simply, what we will be doing is to use the theme that we have created '
                . 'in the last lesson and build in top of it. The code that we have '
                . 'created for our simple theme is the following:'
                . ''));
        $code1 = new CodeSnippet();
        $code1->setTitle('PHP Code');
        $code1->setCode('
<?php
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HTMLNode;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
        $this->setDirectoryName(\'custom-theme\');
        $this->setCssDirName(\'css\');
        $this->setJsDirName(\'js\');
        $this->setImagesDirName(\'images\');
    }
    public function createHTMLNode($options = array()) {
        $node = new HTMLNode();
        $node->addTextNode(\'Custom Node\');
        return $node;
    }

    public function getAsideNode() {
        $aside = new HTMLNode();
        $aside->addTextNode(\'Aside Section\');
        return $aside;
    }

    public function getFooterNode() {
        $footer = new HTMLNode();
        $footer->addTextNode(\'Footer Section\');
        return $footer;
    }

    public function getHeadNode() {
        $head = new HeadNode();
        //getting CSS directory
        $cssDir = Page::cssDir();
        //adding the CSS file to theme resource files set
        $head->addCSS($cssDir.\'/theme.css\');
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        $header->addTextNode(\'Header Section\');
        return $header;
    }
}');
        Page::insert($code1);
        Page::insert($this->createParagraph(''
                . 'What we will be doing is to make the method return HTML node that '
                . 'represents a table. We will try to make the table generic and '
                . 'accepts any number of rows and columns. Now that we have selected '
                . 'our design goal, we will '
                . ''));
        $this->setPrevTopicLink('learn/topics/themes/create-simple-theme', 'Creating a Simple Theme');
        $this->displayView();
    }
}
new MethodCreateNodeView();
