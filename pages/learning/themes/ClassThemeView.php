<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use webfiori\WebFiori;
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
class ClassThemeView extends WebFioriPage{
    public function __construct() {
        parent::__construct(array(
            'title'=>'The Class \'Theme\'',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/class-Theme'
        ));
        WebFioriGUI::createTitleNode(Page::title());
        $p1 = new PNode();
        $p1->addText(''
                . 'Themes in WebFiori framework are represented by classes. In order to create '
                . 'new theme, the class \'Theme\' must be extended.'
                . 'The class <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme" target="_blank">Theme</a> '
                . 'is the core class for creating website UI. The class is used to '
                . 'identify some of basic theme information including:');
        Page::insert($p1);
        $this->themeInfoUL();
        $p2 = new PNode();
        $p2->addText(''
                . 'In addition to that, the class has 5 abstract methods that the '
                . 'developer must implement. The 5 methodsare:');
        Page::insert($p2);
        $this->createMethodsUL();
        $p3 = new PNode();
        $p3->addText('4 of the 5 are used to create page '
                . 'header, footer and the side content area. The fourth one is used '
                . 'to create custom HTML nodes by passing an array of options.');
        Page::insert($p3);
        $p4 = new PNode();
        Page::insert($p4);
        $p4->addText(''
                . 'Also, the developer can assign callbacks to call before the '
                . 'theme is loaded or after the theme is loaded. The callback which '
                . 'is set before loading the theme can be used to set some attributes '
                . 'of the web page including the language, writing direction or any other '
                . 'attribute. The callback which is set to be called after the theme is '
                . 'loaded can be used to change the structure of the page by '
                . 'adding or removing HTML nodes.'
                . ''
                . '');
        
        
        $this->displayView();
        
    }

    private function createMethodsUL() {
        $ul = new UnorderedList();
        Page::insert($ul);
        $base = WebFiori::getSiteConfig()->getBaseURL();
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadNode', 'Theme::getHeadNode()'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadrNode', 'Theme::getHeadrNode()'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getAsideNode', 'Theme::getAsideNode()'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getFooterNode', 'Theme::getFooterNode()'));
        $ul->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#createHTMLNode', 'Theme::createHTMLNode()'));
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
