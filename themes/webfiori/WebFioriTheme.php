<?php
namespace webfiori\theme;
use webfiori\entity\Theme;
use webfiori\WebFiori;
use webfiori\entity\Page;
use webfiori\functions\WebsiteFunctions;
use phpStructs\html\ListItem;
use phpStructs\html\LinkNode;
use phpStructs\html\HeadNode;
use phpStructs\html\HTMLNode;
use phpStructs\html\Input;
use phpStructs\html\Label;
use phpStructs\html\PNode;
use phpStructs\html\UnorderedList;
use webfiori\conf\SiteConfig;
use webfiori\conf\Config;

class WebFioriTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setAuthor('Ibrahim Ali');
        $this->setName('WebFiori Theme');
        $this->setVersion('1.0');
        $this->setVersion('1.0.1');
        $this->setDescription('The main theme for WebFiori Framework.');
        $this->setDirectoryName('webfiori');
        $this->setImagesDirName('images');
        $this->setJsDirName('js');
        $this->setCssDirName('css');
        $this->addComponents(array(
            'LangExt.php'
        ));
        $this->setBeforeLoaded(function(){
            $session = WebsiteFunctions::get()->getSession();
            $lang = $session->getLang(TRUE);
            $lang = $session->getLang(true);
            Page::lang($lang);
            if($lang == 'AR'){
                Page::dir('rtl');
            }
            else{
                Page::dir('ltr');
            }
        });
        $this->setAfterLoaded(function(){
            $session = WebsiteFunctions::get()->getSession();
            Page::lang($session->getLang(true));
            Page::document()->getChildByID('main-content-area')->setClassName('wf-'.Page::dir().'-col-10');
            Page::document()->getChildByID('side-content-area')->setClassName('wf-'.Page::dir().'-col-2');
            Page::document()->getChildByID('page-body')->setClassName('wf-row');
            Page::document()->getChildByID('page-header')->setClassName('wf-row-np');
            Page::document()->getChildByID('page-footer')->setClassName('wf-row');
            //WebFioriGUI::createTitleNode();

            LangExt::extLang();
            $translation = &Page::translation();
            //adding menu items 
            $mainMenu = &Page::document()->getChildByID('menu-items-container');

            $item1 = new ListItem();
            $link1 = new LinkNode(SiteConfig::getBaseURL().'download', $translation->get('menus/main-menu/menu-item-1'));
            $item1->addChild($link1);
            $mainMenu->addChild($item1);

            $item2 = new ListItem();
            $link2 = new LinkNode(SiteConfig::getBaseURL().'docs/webfiori', $translation->get('menus/main-menu/menu-item-2'));
            $item2->addChild($link2);
            $mainMenu->addChild($item2);

            $item3 = new ListItem();
            $link3 = new LinkNode(SiteConfig::getBaseURL().'learn', $translation->get('menus/main-menu/menu-item-3'));
            $item3->addChild($link3);
            $mainMenu->addChild($item3);
            
            $item4 = new ListItem();
            $link4 = new LinkNode(SiteConfig::getBaseURL().'contribute', $translation->get('menus/main-menu/menu-item-4'));
            $item4->addChild($link4);
            $mainMenu->addChild($item4);

        });

    }
    public function getAsideNode() {
        $menu = new HTMLNode('div');
        return $menu;
    }

    public function getFooterNode() {
        $page = Page::get();
        $node = new HTMLNode('div');
        $socialMedia = new HTMLNode();
        $socialMedia->setClassName('wf-row');
        $socialMedia->setID('social-media-container');
        $socialMedia->setWritingDir($page->getWritingDir());

        $facebookIcon = new HTMLNode('img', false);
        $facebookIcon->setAttribute('src', $page->getThemeImagesDir().'/facebook.png');
        $facebookIcon->setClassName('social-media-icon');
        $facebookLink = new HTMLNode('a');
        $facebookLink->setAttribute('href', 'https://www.facebook.com/webfiori');
        $facebookLink->setAttribute('target', '_blank');
        $facebookLink->addChild($facebookIcon);
        $socialMedia->addChild($facebookLink);

        $twtrIcon = new HTMLNode('img', false);
        $twtrIcon->setAttribute('src', $page->getThemeImagesDir().'/tweeter.png');
        $twtrIcon->setClassName('social-media-icon');
        $twtrLink = new HTMLNode('a');
        $twtrLink->setAttribute('href', 'https://twitter.com/webfiori_');
        $twtrLink->setAttribute('target', '_blank');
        $twtrLink->addChild($twtrIcon);
        $socialMedia->addChild($twtrLink);

        $linkedinIcon = new HTMLNode('img', false);
        $linkedinIcon->setAttribute('src', $page->getThemeImagesDir().'/linkedin.png');
        $linkedinIcon->setClassName('social-media-icon');
        $linkedinLink = new HTMLNode('a');
        $linkedinLink->setAttribute('href', 'https://www.linkedin.com/in/ibrahim-binalshikh/');
        $linkedinLink->setAttribute('target', '_blank');
        $linkedinLink->addChild($linkedinIcon);
        $socialMedia->addChild($linkedinLink);

        $bloggerIcon = new HTMLNode('img', FALSE);
        $bloggerIcon->setAttribute('src', $page->getThemeImagesDir().'/iconfinder_blogger__social_media_icon_2986189.PNG');
        $bloggerIcon->setClassName('social-media-icon');
        $bloggerLink = new HTMLNode('a');
        $bloggerLink->setAttribute('href', 'http://ibrahim-2017.blogspot.com');
        $bloggerLink->setAttribute('target', '_blank');
        $bloggerLink->addChild($bloggerIcon);
        //$socialMedia->addChild($bloggerLink);
        
        $node->addChild($socialMedia);
        $contactInfo = new HTMLNode();
        $contactInfo->setClassName('wf-'.Page::dir().'-col-12');
        $p = new PNode();
        $p->setStyle(array(
            'font-size'=>'8pt'
        ));
        $p->setClassName('pa-ltr-col-six');
        $p->addText('webfiori@programmingacademia.com',array('new-line'=>TRUE));
        $contactInfo->addChild($p);
        $node->addChild($contactInfo);
        $p->addText('WebFiori Framework, All Rights Reserved © '.date('Y'));
        $div = new HTMLNode('div');
        $div->setAttribute('class', 'wf-ltr-col-12');
        $div->addTextNode('<b style="color:gray;font-size:8pt;">Powered By: <a href="https://github.com/usernane/webfiori" '
                . 'target="_blank">WebFiori Framework</a> v'.Config::getVersion().' ('.Config::getVersionType().')</b>',false);
        $node->addChild($div);
        return $node;
    }
    public function getHeadNode() {
        $headTag = new HeadNode();
        $headTag->setBase(SiteConfig::getBaseURL());
        $headTag->addLink('icon', Page::imagesDir().'/favicon.png');
        $headTag->addCSS(Page::cssDir().'/Grid.css');
        $headTag->addCSS(Page::cssDir().'/colors.css');
        $headTag->addCSS(Page::cssDir().'/theme.css');
        $headTag->addMeta('robots', 'index, follow');
        $jsCode = new phpStructs\html\JsCode();
        $jsCode->addCode(''
                . 'window.dataLayer = window.dataLayer || [];'
                . 'function gtag(){'
                . 'dataLayer.push(arguments);'
                . '}'
                . 'gtag(\'js\', new Date());'
                . 'gtag(\'config\', \'UA-91825602-1\');');
        $headTag->addChild($jsCode);
        $js = new HTMLNode('script');
        $js->setAttribute('async', '');
        $js->setAttribute('src', 'https://www.googletagmanager.com/gtag/js?id=UA-91825602-1');
        $headTag->addChild($js);
        return $headTag;
    }

    public function getHeadrNode() {
        $headerSec = new HTMLNode();
        $logoContainer = new HTMLNode();
        $logoContainer->setID('inner-header');
        $logoContainer->setClassName('wf-'.Page::dir().'-col-11-nm-np');
        $img = new HTMLNode('img', false);
        $img->setAttribute('src',Page::imagesDir().'/WebsiteIcon_1024x1024.png');
        $img->setClassName('wf-'.Page::dir().'-col-1-np-nm');
        $img->setID('logo');
        $img->setWritingDir(Page::dir());
        $link = new LinkNode(SiteConfig::getHomePage(), '');
        $link->addChild($img);
        $headerSec->addChild($link);
        $langCode = WebsiteFunctions::get()->getSession()->getLang(true);
        $p = new PNode();
        $siteNames = SiteConfig::getWebsiteNames();
        if(isset($siteNames[$langCode])){
            $p->addText($siteNames[$langCode], array('bold'=>true));
        }
        else{
            if(isset($_GET['language']) && isset($siteNames[$_GET['language']])){
                $p->addText($siteNames[$_GET['language']], array('bold'=>true));
            }
            else{
                $p->addText('<SITE NAME>', array('bold'=>true));
            }
        }
        $logoContainer->addChild($p);
        $headerSec->addChild($logoContainer);
        //end of logo UI
        //starting of main menu items
        $menu = new HTMLNode('nav');
        $menu->setID('main-navigation-menu');
        $menu->setClassName('wf-'.Page::dir().'-col-9-np');
        $ul = new UnorderedList();
        $ul->setID('menu-items-container');
        $ul->setClassName('wf-row-nm-np');
        $ul->setAttribute('dir', Page::dir());
        $menu->addChild($ul);
        $logoContainer->addChild($menu);
        return $headerSec;
    }

    /**
     * 
     * @param array $options An associative array of options. Available 
     * options are:
     * <ul>
     * <li>type: The type of the node that will be created. Supported 
     * types are: 
     * <ul>
     * <li>"div" (default).</li>
     * <li>"wf-row". This type has the following options: 
     * <ul>
     * <li>"with-padding", a boolean. If set to true, the row will have padding. Default is true.</li>
     * <li>"with-margin", a boolean. If set to true, the row will have margins. Default is true.</li>
     * </ul>
     * </li>
     * <li>"wf-col". This type has the following options: 
     * <ul>
     * <li>"size". Size of the column. A number from 1 up to 12. Default is 12.</li>
     * <li>"with-padding", a boolean. If set to true, the column will have padding. Default is true.</li>
     * <li>"with-margin", a boolean. If set to true, the column will have margins. Default is true.</li>
     * </ul>
     * </li>
     * <li>"input-element". A row which represents input element alongside its components. 
     * This type has the following options:
     * <ul>
     * <li>"input-type". The type of input element. Default is "text"</li>
     * <li>"label". The label which will be used for the input element. 
     * If not provided, the value 'Input_label' is used.</li>
     * <li>"input-id". The ID of input element. If not provided, the 
     * value 'input-el' is used.</li>
     * <li>"placeholder" A text to show as a placeholder.</li>
     * <li>"on-input". A String that represents JavaScript code which 
     * will be executed when input element value changes.</li>
     * <li>"select-data". An array of sub-associative arrays that has an options which are 
     * used if input element type is "select". Each sub array can have the following indices:
     * <ul>
     * <li>"label". A label to show for the select option.</li>
     * <li>"value". The value of the attribute "value" of the select.</li>
     * <li>"selected". A boolean. If set to true, the attribute "selected" will be set for the option.</li>
     * <li>"disabled". A boolean. If set to true, the attribute "disabled" will be set for the option.</li>
     * </ul>
     * </ul>
     * </li>
     * </ul>
     * </li>
     * </ul>
     * @return HTMLNode
     */
    public function createHTMLNode($options = array()) {
        if(isset($options['type'])){
            if($options['type'] == 'section'){
                $node = new HTMLNode('section');
                if(isset($options['h-level']) && $options['h-level'] > 0 && $options['h-level'] < 7){
                    $h = new HTMLNode('h'.$options['h-level']);
                }
                else{
                    $h = new HTMLNode('h1');
                }
                $h->addTextNode($options['title']);
                $node->addChild($h);
            }
            else if($options['type'] == 'p'){
                $node = new PNode();
                if(isset($options['text'])){
                    $node->addText($options['text']);
                }
            }
            else{
                $node = new HTMLNode();
            }
        }
        else{
            $node = new HTMLNode();
        }
        return $node;
    }

}

