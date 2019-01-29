<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use webfiori\WebFiori;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\HTMLNode;
use WebFioriGUI;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends WebFioriPage{
    public function __construct() {
        parent::__construct(array(
            'title'=>'The Class \'Page\'',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/class-Page'
        ));
        WebFioriGUI::createTitleNode(Page::title());
        
        $p1 = new PNode();
        Page::insert($p1);
        $p1->addText('The class <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page" target="_blank">Page</a> represents a web page. It is used to alter some of the '
                . 'basic attributes of the page including the title of the page, its description, language, canonical URL '
                . 'and many other attributes. In addition to that, this class is used to load themes using the '
                . 'method <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page#usingTheme" target="_blank">Page::usingTheme()</a> '
                . 'by passing the name of the theme to this method. '
                . 'Also, this class can be used to load a translation file based on the language of the page by calling the '
                . 'method <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page#usingLanguage" target="_blank">Page::usingLanguage()</a>');
        
        
        $p2 = new PNode();
        Page::insert($p2);
        $p2->addText('One of the important features that this class provides is an access to the DOM of the page. '
                . 'The DOM is stored as an instance of <a href="'.WebFiori::getSiteConfig()->getBaseURL().'/docs/phpStructs/html/HTMLDoc" target="_blank">HTMLDoc</a> '
                . 'A reference to the DOM can be obtained using the method '
                . '<a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page#document" target="_blank">Page::document()</a>. '
                . 'By default, the document will have the following elements:');
        $this->defaultBodyELsUL();
        
        $p3 = new PNode();
        Page::insert($p3);
        $p3->addText('The content of the <span style="font-family:monospace">&lt;head&gt;</span> tag and the look and feel of the '
                . 'elements with IDs \'<span style="font-family:monospace">page-header</span>\','
                . ' \'<span style="font-family:monospace">page-footer</span>\' and \'<span style="font-family:monospace">side-content-area</span>\' will directly depend on the '
                . 'implementation of the loaded theme. The following image shows the structure of the DOM in a visual way.');
        
        $img = new HTMLNode('img');
        $img->setAttribute('src', 'res/images/DocumentStructure.PNG');
        $img->setAttribute('alt', 'Image of DOM.');
        Page::insert($img);
        
        $p4 = new PNode();
        Page::insert($p4);
        
        $p5 = new PNode();
        Page::insert($p5);
        
        $this->displayView();
    }
    
    private function defaultBodyELsUL(){
        $ul = new UnorderedList();
        Page::insert($ul);
        
        $li1 = new ListItem();
        $li1->addTextNode('<span style="font-family:monospace">&lt;head&gt;</span> tag that contains CSS, JS and other meta and link tags.');
        $ul->addChild($li1);
        
        $li2 = new ListItem();
        $li2->addTextNode('A <span style="font-family:monospace">&lt;div&gt;</span> element which has the ID \'page-body\' that represents the body of the page.');
        $ul->addChild($li2);
        
        $li3 = new ListItem();
        $li3->addTextNode('A <span style="font-family:monospace">&lt;div&gt;</span> element which has the ID \'page-header\' that represents the header section of the page.');
        $ul->addChild($li3);
        
        $li4 = new ListItem();
        $li4->addTextNode('A <span style="font-family:monospace">&lt;div&gt;</span> element which has the ID \'page-footer\' that represents the footer section of the page.');
        $ul->addChild($li4);
        
        $li5 = new ListItem();
        $li5->addTextNode('A <span style="font-family: monospace">&lt;div&gt;</span> element which has the ID \'main-content-area\' that represents the area at which user content will be added to.');
        $ul->addChild($li5);
        
        $li6 = new ListItem();
        $li6->addTextNode('A <span style="font-family: monospace">&lt;div&gt;</span> element which has the ID \'side-content-area\' that represents the side section of the page.');
        $ul->addChild($li6);
    }
    
}
new ClassThemeView();
