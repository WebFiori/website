<?php
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HeadNode;
use webfiori\entity\Page;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName('Custom Theme');
        $this->setDirectoryName('custom-theme');
        $this->setCssDirName('css');
        $this->setJsDirName('js');
        $this->setImagesDirName('images');
    }
    public function createHTMLNode($options = array()) {
        $node = new HTMLNode();
        $node->addTextNode('Custom Node');
        return $node;
    }

    public function getAsideNode() {
        $aside = new HTMLNode();
        $aside->addTextNode('Aside Section');
        return $aside;
    }

    public function getFooterNode() {
        $footer = new HTMLNode();
        $footer->addTextNode('Footer Section');
        return $footer;
    }

    public function getHeadNode() {
        $head = new HeadNode();
        $head->addCSS(Page::cssDir().'/theme.css');
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        $header->addTextNode('Header Section');
        return $header;
    }

}
