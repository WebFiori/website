<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use webfiori\WebFiori;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\HTMLNode;
use phpStructs\html\CodeSnippet;
use WebFioriGUI;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'The Class \'Page\'',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/class-Page'
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        $this->createParagraph('The class <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page" target="_blank">Page</a> represents a web page. It is used to alter some of the '
                . 'basic attributes of the page including the title of the page, its description, language, canonical URL '
                . 'and many other attributes. In addition to that, this class is used to load themes using the '
                . 'method <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page#usingTheme" target="_blank">Page::usingTheme()</a> '
                . 'by passing the name of the theme to this method. '
                . 'Also, this class can be used to load a translation file based on the language of the page by calling the '
                . 'method <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page#usingLanguage" target="_blank">Page::usingLanguage()</a>');
        
        $this->createParagraph('One of the important features that this class provides is an access to the DOM of the page. '
                . 'The DOM is stored as an instance of <a href="'.WebFiori::getSiteConfig()->getBaseURL().'/docs/phpStructs/html/HTMLDoc" target="_blank">HTMLDoc</a> '
                . 'A reference to the DOM can be obtained using the method '
                . '<a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page#document" target="_blank">Page::document()</a>. '
                . 'By default, the document will have the following elements:');
        $this->defaultBodyELsUL();
        
        $this->createParagraph('The content of the <span style="font-family:monospace">&lt;head&gt;</span> tag and the look and feel of the '
                . 'elements with IDs \'<span style="font-family:monospace">page-header</span>\','
                . ' \'<span style="font-family:monospace">page-footer</span>\' and \'<span style="font-family:monospace">side-content-area</span>\' will directly depend on the '
                . 'implementation of the loaded theme. The following image shows the structure of the DOM in a visual way.');
        
        $img = new HTMLNode('img');
        $img->setAttribute('src', 'res/images/DocumentStructure.PNG');
        $img->setAttribute('alt', 'Image of DOM.');
        Page::insert($img);
        
        $this->createParagraph('The following HTML code shows how the DOM will look like.');
        $code = new CodeSnippet();
        $code->setCode('<pre style="margin:0;background-color:rgb(21, 18, 33); color:gray"><span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">!DOCTYPE html</span><span style="color:rgb(204,225,70)">&gt;</span>
<span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">html</span><span style="color:rgb(204,225,70)">&gt;</span>
    <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">head</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">base</span> <span style="color:rgb(0,124,0)">href</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"http://example.com/"</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">title</span><span style="color:rgb(204,225,70)">&gt;</span>
            Default X | My X Website
        <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">title</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">link</span> <span style="color:rgb(0,124,0)">rel</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"canonical"</span> <span style="color:rgb(0,124,0)">href</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"http://example.com/test"</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">meta</span> <span style="color:rgb(0,124,0)">name</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"viewport"</span> <span style="color:rgb(0,124,0)">content</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"</span><span style="color:rgb(204,225,70)">&gt;</span>
    <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">head</span><span style="color:rgb(204,225,70)">&gt;</span>
    <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">body</span> <span style="color:rgb(0,124,0)">itemscope</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">""</span> <span style="color:rgb(0,124,0)">itemtype</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"http://schema.org/WebPage"</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">div</span> <span style="color:rgb(0,124,0)">id</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"page-header"</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">div</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">div</span> <span style="color:rgb(0,124,0)">id</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"page-body"</span><span style="color:rgb(204,225,70)">&gt;</span>
            <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">div</span> <span style="color:rgb(0,124,0)">id</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"side-content-area"</span><span style="color:rgb(204,225,70)">&gt;</span>
            <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">div</span><span style="color:rgb(204,225,70)">&gt;</span>
            <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">div</span> <span style="color:rgb(0,124,0)">id</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"main-content-area"</span><span style="color:rgb(204,225,70)">&gt;</span>
            <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">div</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">div</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;</span><span style="color:rgb(204,225,70)">div</span> <span style="color:rgb(0,124,0)">id</span> <span style="color:gray">=</span> <span style="color:rgb(170,85,137)">"page-footer"</span><span style="color:rgb(204,225,70)">&gt;</span>
        <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">div</span><span style="color:rgb(204,225,70)">&gt;</span>
    <span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">body</span><span style="color:rgb(204,225,70)">&gt;</span>
<span style="color:rgb(204,225,70)">&lt;/</span><span style="color:rgb(204,225,70)">html</span><span style="color:rgb(204,225,70)">&gt;</span>
</pre>');
        Page::insert($code);
        
        $this->setPrevTopicLink('learn/topics/themes/class-HeadNode', 'The class \'HeadNode\'');
        $this->setNextTopicLink('learn/topics/themes/class-Theme', 'The class \'Theme\'');
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
