<?php
namespace webfiori\theme;
use webfiori\WebFiori;
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HeadNode;
use phpStructs\html\LinkNode;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;
/**
 * Description of WebFioriV108
 *
 * @author Ibrahim
 */
class WebFioriV108 extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setVersion('1.0');
        $this->setAuthor('Ibrahim');
        $this->setName('WebFiori V108');
        $this->setDirectoryName('webfiori-v1.0.8');
        $this->setAfterLoaded(function(){
            Page::document()->getChildByID('page-body')->setClassName('row');
            Page::document()->getChildByID('main-content-area')->setClassName('col-10');
        });
    }
    
    public function createHTMLNode($options = array()){
        $node = new HTMLNode();
        return $node;
    }

    public function getAsideNode(){
        $aside = new HTMLNode();
        $aside->setClassName('col-2');
        return $aside;
    }

    public function getFooterNode(){
        $footer = new HTMLNode();
        $footer->setClassName('container-fluid');
        return $footer;
    }
    public function getHeadNode(){
        $head = new HeadNode();
        $head->addCSS(Page::cssDir().'/theme.css');
        $head->addCSS('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', [
            'integrity'=>'sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh',
            'crossorigin'=>'anonymous'
        ], false);
        $head->addJs('https://code.jquery.com/jquery-3.4.1.slim.min.js', [
            'integrity'=>'sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n',
            'crossorigin'=>'anonymous'
        ], false);
        $head->addJs('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', [
            'integrity'=>'sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo',
            'crossorigin'=>'anonymous'
        ], false);
        $head->addJs('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', [
            'integrity'=>'sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6',
            'crossorigin'=>'anonymous'
        ], false);
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        $header->setClassName('container-fluid');
        $mainNav = new HTMLNode('nav');
        $header->addChild($mainNav);
        $mainNav->setClassName('navbar navbar-expand navbar-light bg-light');
        $mainNav->setStyle([
            'background-color'=>'#c1ec9b'
        ]);
        $logo = new HTMLNode('img');
        $logo->setID('main-logo');
        $logo->setAttribute('src', Page::imagesDir().'/favicon.png');
        $logoLink = new LinkNode(WebFiori::getSiteConfig()->getHomePage(), $logo->toHTML());
        $logoLink->setClassName('navbar-brand');
        $mainNav->addChild($logoLink);
        
        $button = new HTMLNode('button');
        $button->setClassName('navbar-toggler');
        $button->addTextNode('<span class="navbar-toggler-icon"></span>', false);
        $button->setAttribute('data-toggle', 'collapse');
        $button->setAttribute('data-target', 'nav-items-container');
        $button->setAttribute('type', 'button');
        $mainNav->addChild($button);
        
        $navItemsContainer = new HTMLNode();
        $navItemsContainer->setID('nav-items-container');
        $navItemsContainer->setClassName('collapse navbar-collapse');
        $mainNav->addChild($navItemsContainer);
        
        $mainLinksUl = new UnorderedList();
        $mainLinksUl->setClassName('navbar-nav');
        $mainLinksUl->addListItems([
            '<a href="" class="nav-link">Download</a>',
            '<a href="" class="nav-link">API Docs</a>',
            '<a href="" class="nav-link">Learn</a>',
            '<a href="" class="nav-link">Contribute</a>'
        ], false);
        $mainLinksUl->getChild(0)->setClassName('nav-item');
        $mainLinksUl->getChild(1)->setClassName('nav-item');
        $mainLinksUl->getChild(2)->setClassName('nav-item');
        $mainLinksUl->getChild(3)->setClassName('nav-item');
        $navItemsContainer->addChild($mainLinksUl);
        
        return $header;
    }

}
return __NAMESPACE__;
