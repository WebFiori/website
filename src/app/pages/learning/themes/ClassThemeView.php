<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use webfiori\framework\Webfiori;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\ListItem;
use phpStructs\html\UnorderedList;
use WebFioriGUI;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'active-aside'=>6,
            'title'=>'The Class \'Theme\'',
            'description'=>'The core class for creating UI.'
        ));
        Page::insert($this->createParagraph(''
                . 'Themes in WebFiori framework are represented by classes. In order to create '
                . 'new theme, the class \'Theme\' must be extended.'
                . 'The class <a href="docs/webfiori/entity/Theme" target="_blank">Theme</a> '
                . 'is the core class for creating website UI. The class is used to '
                . 'identify some of basic theme information including:'));
        $this->themeInfoUL();
        Page::insert($this->createParagraph(''
                . 'In addition to that, the class has 5 abstract methods that the '
                . 'developer must implement. The 5 methods are:'));
        $this->createThemeMainMethodsUL();
        Page::insert($this->createParagraph('4 of the 5 are used to create page '
                . 'header, footer and the side content area. The fifth one is used '
                . 'to create custom HTML nodes by passing an array of options.'));
        Page::insert($this->createParagraph(''
                . 'Also, the developer can assign callbacks to call before the '
                . 'theme is loaded or after the theme is loaded. There are two methods to create '
                . 'callbacks for the theme:'));
        $this->createThemeCallbacksMethodUL();
        Page::insert($this->createParagraph('The callback which '
                . 'is set before loading the theme can be used to set some attributes '
                . 'of the web page including the language, writing direction or any other '
                . 'attribute. The callback which is set to be called after the theme is '
                . 'loaded can be used to change the structure of the page by '
                . 'adding or removing HTML nodes.'));
        $this->setPrevTopicLink('learn/topics/themes/class-Page', 'The class \'Page\'');
        $this->setNextTopicLink('learn/topics/themes/create-simple-theme', 'Creating a Simple Theme');
        $this->displayView();
        
    }
    private function createThemeCallbacksMethodUL() {
        $ul = new UnorderedList();
        Page::insert($ul);
        $base = WebFiori::getSiteConfig()->getBaseURL();
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#setBeforeLoaded', 'Theme::setBeforeLoaded()','_blank'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#setAfterLoaded', 'Theme::setAfterLoaded()','_blank'));
    }
    private function createThemeMainMethodsUL() {
        $ul = new UnorderedList();
        Page::insert($ul);
        $base = WebFiori::getSiteConfig()->getBaseURL();
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadNode', 'Theme::getHeadNode()','_blank'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadrNode', 'Theme::getHeadrNode()','_blank'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getAsideNode', 'Theme::getAsideNode()','_blank'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getFooterNode', 'Theme::getFooterNode()','_blank'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#createHTMLNode', 'Theme::createHTMLNode()','_blank'));
    }
    private function themeInfoUL() {
        $ul = new UnorderedList();
        Page::insert($ul);
        $li1 = new ListItem();
        $li1->addTextNode('Name of theme author.');
        $ul->addChild($li1);
        
        $li2 = new ListItem();
        $li2->addTextNode('A unique name for the theme.');
        $ul->addChild($li2);
        
        $li3 = new ListItem();
        $li3->addTextNode('Version number of the theme.');
        $ul->addChild($li3);
        
        $li4 = new ListItem();
        $li4->addTextNode('A description for the theme.');
        $ul->addChild($li4);
        
        $li5 = new ListItem();
        $li5->addTextNode('The name of the directory where theme and theme files exist.');
        $ul->addChild($li5);
        
        $li6 = new ListItem();
        $li6->addTextNode('The name of the directory that will contain CSS files.');
        $ul->addChild($li6);
        
        $li7 = new ListItem();
        $li7->addTextNode('The name of the directory that will contain JavaScript files.');
        $ul->addChild($li7);
        
        $li8 = new ListItem();
        $li8->addTextNode('Theme license information including name and URL.');
        $ul->addChild($li8);
    }
}
new ClassThemeView();
