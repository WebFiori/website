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
            'active-aside'=>5,
            'title'=>'The Class \'Page\'',
            'description'=>'This class is used to modify web page attributes by '
            . 'loading themes.'
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph('The class <a href="docs/webfiori/entity/Page" target="_blank">Page</a> represents a web page. It is used to alter some of the '
                . 'basic attributes of the page including the title of the page, its description, language, canonical URL '
                . 'and many other attributes. In addition to that, this class is used to load themes using the '
                . 'method <a href="docs/webfiori/entity/Page#usingTheme" target="_blank">Page::usingTheme()</a> '
                . 'by passing the name of the theme to this method. '
                . 'Also, this class can be used to load a translation file based on the language of the page by calling the '
                . 'method <a href="docs/webfiori/entity/Page#usingLanguage" target="_blank">Page::usingLanguage()</a>'));
        
        Page::insert($this->createParagraph('One of the important features that this class provides is an access to the DOM of the page. '
                . 'The DOM is stored as an instance of <a href="docs/phpStructs/html/HTMLDoc" target="_blank">HTMLDoc</a> '
                . 'A reference to the DOM can be obtained using the method '
                . '<a href="docs/webfiori/entity/Page#document" target="_blank">Page::document()</a>. '
                . 'By default, the document will have the following elements:'));
        $this->defaultBodyELsUL();
        
        Page::insert($this->createParagraph('The content of the <span style="font-family:monospace">&lt;head&gt;</span> tag and the look and feel of the '
                . 'elements with IDs \'<span style="font-family:monospace">page-header</span>\','
                . ' \'<span style="font-family:monospace">page-footer</span>\' and \'<span style="font-family:monospace">side-content-area</span>\' will directly depend on the '
                . 'implementation of the loaded theme. The following image shows the structure of the DOM in a visual way.'));
        Page::insert($this->createImag('res/images/DocumentStructure.PNG', 'Page DOM'));
        Page::insert($this->createParagraph('The following HTML code shows how the'
                . ' DOM will look like.'));
        $code = new CodeSnippet();
        $code->getCodeElement()->setClassName('language-html');
        $code->setCode('<!DOCTYPE html>
<html>
    <head>
        <title>
            Default
        </title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    </head>
    <body itemscope = "" itemtype = "http://schema.org/WebPage">
    </body>
</html>
');
        Page::insert($code);
        
        $this->setPrevTopicLink('learn/topics/themes/class-HeadNode', 'The class \'HeadNode\'');
        $this->setNextTopicLink('learn/topics/themes/class-Theme', 'The class \'Theme\'');
        $this->displayView();
    }
    
    private function defaultBodyELsUL(){
        $ul = new UnorderedList();
        Page::insert($ul);
        $ul->addListItems(array(
            '<span style="font-family:monospace">&lt;head&gt;</span> tag that contains CSS, JS and other meta and link tags.',
            'A <span style="font-family:monospace">&lt;div&gt;</span> element which has the ID \'page-body\' that represents the body of the page.',
            'A <span style="font-family:monospace">&lt;div&gt;</span> element which has the ID \'page-header\' that represents the header section of the page.',
            'A <span style="font-family:monospace">&lt;div&gt;</span> element which has the ID \'page-footer\' that represents the footer section of the page.',
            'A <span style="font-family: monospace">&lt;div&gt;</span> element which has the ID \'main-content-area\' that represents the area at which user content will be added to.',
            'A <span style="font-family: monospace">&lt;div&gt;</span> element which has the ID \'side-content-area\' that represents the side section of the page.'
        ), FALSE);
    }
    
}
new ClassThemeView();
