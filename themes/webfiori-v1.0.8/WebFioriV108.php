<?php
namespace webfiori\theme;
use webfiori\WebFiori;
use webfiori\entity\Theme;
use webfiori\apiParser\APITheme;
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
class WebFioriV108 extends APITheme{
    public function __construct() {
        parent::__construct();
        $this->setVersion('1.0');
        $this->setAuthor('Ibrahim');
        $this->setName('WebFiori V108');
        $this->setDirectoryName('webfiori-v1.0.8');
        $this->setAfterLoaded(function(){
            Page::document()->getChildByID('page-body')->setClassName('row  ml-0 mr-0');
            Page::document()->getChildByID('page-body')->setStyle([
                'margin-top'=>'100px'
            ]);
            Page::document()->getBody()->setStyle([
                'max-height'=>'10px',
                'height'=>'10px'
            ]);
            Page::document()->getChildByID('main-content-area')->setClassName('col-10');
        });
    }
    
    public function createHTMLNode($options = array()){
        $nodeType = isset($options['type']) ? $options['type'] : '';
        if($nodeType == 'section'){
            $sec = new HTMLNode('section');
            $hLvl = isset($options['h-level']) ? $options['h-level'] : 3;
            $hLevelX = $hLvl > 0 && $hLvl < 7 ? $hLvl : 1;
            $h = new HTMLNode('h'.$hLevelX);
            $title = isset($options['title']) ? $options['title'] : 'Sec_Title';
            $h->addTextNode($title);
            $sec->addChild($h);
            return $sec;
        }
        $node = new HTMLNode();
        return $node;
    }

    public function getAsideNode(){
        $aside = new HTMLNode();
        $aside->setClassName('col-2');
        return $aside;
    }

    public function getFooterNode(){
        $footer = new HTMLNode('footer');
        $footer->setClassName('bd-footer text-muted');
        $footer->setClassName('container-fluid p-md-4 mt-md-5');
        $footerLinksUl = new UnorderedList();
        $footerLinksUl->setClassName('nav justify-content-center');
        $footerLinksUl->addListItems([
            '<a href="https://github.com/usernane/webfiori">GitHub</a>',
            '<a href="https://twitter.com/webfiori_" >Twitter</a>',
            '<a href="https://t.me/webfiori" >Telegram</a>'
        ], false);
        $footerLinksUl->getChild(0)->setClassName('nav-item');
        $footerLinksUl->getChild(1)->setClassName('nav-item ml-3');
        $footerLinksUl->getChild(2)->setClassName('nav-item ml-3');
        $footer->addChild($footerLinksUl);
        $powerdByNode = new HTMLNode('p');
        $powerdByNode->addTextNode('Powered by: <a href="https://programmingacademia.com/webfiori">WebFiori Framework</a> v'.WebFiori::getConfig()->getVersion().'. '
                . 'Code licensed under the <a href="https://opensource.org/licenses/MIT">MIT License</a>.', false);
        $footer->addChild($powerdByNode);
        $img = new HTMLNode('img');
        $img->setAttribute('src', Page::imagesDir().'/favicon.png');
        $img->setAttribute('alt', 'logo');
        $img->setStyle([
            'height'=>'25px'
        ]);
        $footer->addChild($img);
        $copywriteNotice = new HTMLNode('p');
        $copywriteNotice->addTextNode('All Rights Reserved © '.date('Y'));
        $footer->addChild($copywriteNotice);
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
        $header = new HTMLNode('header');
        $header->setClassName('container-fluid');
        $mainNav = new HTMLNode('nav');
        $header->addChild($mainNav);
        $mainNav->setClassName('navbar navbar-expand-lg navbar-light fixed-top');
        $mainNav->setStyle([
            'background-color'=>'#c1ec9b',
            'padding'=>'0'
        ]);
        $logo = new HTMLNode('img');
        $logo->setID('main-logo');
        $logo->setAttribute('src', Page::imagesDir().'/favicon.png');
        $logo->setAttribute('alt', 'logo');
        $logoLink = new LinkNode(WebFiori::getSiteConfig()->getHomePage(), $logo->toHTML());
        $logoLink->setClassName('navbar-brand ml-3');
        $mainNav->addChild($logoLink);
        
        $button = new HTMLNode('button');
        $button->setClassName('navbar-toggler');
        $button->addTextNode('<span class="navbar-toggler-icon"></span>', false);
        $button->setAttribute('data-toggle', 'collapse');
        $button->setAttribute('data-target', '#navItemsContainer');
        $button->setAttribute('type', 'button');
        $button->setAttribute('aria-controls', 'navItemsContainer');
        $button->setAttribute('aria-expanded', 'false');
        $mainNav->addChild($button);
        
        $navItemsContainer = new HTMLNode();
        $navItemsContainer->setID('navItemsContainer');
        $navItemsContainer->setClassName('collapse navbar-collapse');
        $mainNav->addChild($navItemsContainer);
        
        $mainLinksUl = new UnorderedList();
        $mainLinksUl->setClassName('navbar-nav justify-content-center');
        $mainLinksUl->addListItems([
            '<a href="download" class="nav-link">Download</a>',
            '<a href="docs" class="nav-link">API Docs</a>',
            '<a href="learn" class="nav-link">Learn</a>',
            '<a href="ontribute" class="nav-link">Contribute</a>'
        ], false);
        $mainLinksUl->getChild(0)->setClassName('nav-item');
        $mainLinksUl->getChild(1)->setClassName('nav-item');
        $mainLinksUl->getChild(2)->setClassName('nav-item');
        $mainLinksUl->getChild(3)->setClassName('nav-item');
        $navItemsContainer->addChild($mainLinksUl);
        
        return $header;
    }

    public function createAttributeDetailsBlock($attr) {
        
    }

    public function createAttributeSummaryBlock($attr) {
        
    }

    public function createClassDescriptionNode() {
        
    }

    public function createMethodDetailsBlock($func) {
        
    }

    public function createMethodSummaryBlock($func) {
        
    }

    public function createNamespaceContentBlock($nsObj) {
        
    }

}
return __NAMESPACE__;
