<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use webfiori\framework\Webfiori;
use webfiori\entity\Page;
use WebFioriGUI;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;
use phpStructs\html\ListItem;
use phpStructs\html\HTMLNode;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'active-aside'=>7,
            'title'=>'Creating a Simple Theme',
            'description'=>'Learn how to create a simple theme using WebFiori Framework>'
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph('What we will be doing here is to create a theme that '
                . 'gives different colors to page sections. It is only used to show the basics of creating a '
                . 'theme.'));
        Page::insert($this->createParagraph('In general, theme creation process consist of the '
                . 'following:'));
        $this->themeCreationSteps();
        $this->step1();
        $this->step2();
        $this->step3();
        $this->step4();
        $this->step5();
        $this->setPrevTopicLink('learn/topics/themes/class-Theme', 'The Class \'Theme\'');
        $this->setNextTopicLink('learn/topics/themes/the-method-createHTMLNode', 'Using the Method Theme::createHTMLNode()');
        $this->displayView();
    }
    private function themeCreationSteps(){
        $ul = new UnorderedList();
        $ul->addListItems(array(
            'Creating theme folder inside the directory <b>\'/themes\'</b>.',
            'Creating resources folders inside (JavaScript, CSS and Images).',
            'Adding theme resources as needed.',
            'Creating new PHP class inside theme directory.',
            'Extending the class <a href="docs/webfiori/entity/Theme" target="_blank">Theme</a>.',
            'Implementing abstract methods as needed.'
        ), FALSE);
        Page::insert($ul);
    }
    private function step1() {
        $sec = $this->createSection('Step 1: Creating Theme Directory and Resources Folders');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('Themes in WebFiori Framework are '
            . 'created inside the folder \'/themes\'. The first step in creating '
            . 'new theme is to create new folder to add all its components there. '
            . 'let\'s give the folder the name \'custom-theme\'. After creating '
            . 'theme directory, we need to create 3 additional folders inside the '
            . 'new folder. The 3 folders will be used to hold theme '
            . 'CSS, JavaScript and images. Let\'s give the names \'js\', \'css\' and \'images\'. This '
            . 'means that the folder structure will be as follows:'));
        $ul = new UnorderedList();
        $ul->addListItem('/themes/custom-theme/css');
        $ul->addListItem('/themes/custom-theme/js');
        $ul->addListItem('/themes/custom-theme/images');
        $sec->addChild($ul);
    }
    private function step2() {
        $sec = $this->createSection('Step 2: Adding Theme Resource Files');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('At this step, we will create one CSS file. '
            . 'The file will be added in the folder \'/themes/custom-theme/css\'. '
            . 'Let\'s give the file the name \'theme.css\' This CSS file will '
            . 'only contain selectors to give different colors for each '
            . 'section within the page. The code within the file will be '
            . 'something like the following:'));
        $code = new CodeSnippet();
        $code->setTitle('CSS Code');
        $code->getCodeElement()->setClassName('lang-css');
        $code->setCode('
#page-body{
    color: white;
    background-color: black;
    padding: 20px;
}
#page-header{
    background-color: blueviolet;
    padding: 20px;
}
#page-footer{
    background-color: royalblue;
    padding: 20px;
}
#main-content-area{
    background-color: violet;
    padding: 20px;
}
#side-content-area{
    background-color: honeydew;
    color:black;
    padding: 20px;
}

');
        $sec->addChild($code);
        $sec->addChild($this->createParagraph('The padding is added only to make elements far from each '
            . 'other a little bit. In addition to creating this CSS file, we could '
            . 'do the same thing for JS and images as well.'));
    }
    private function step3() {
        $sec = $this->createParagraph('Step 3: Creating Theme Class and Extending the Class \'Theme\'');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('This step is very simple. All what we have to do is to create '
            . 'new PHP class in the main theme folder. Let\'s give the name '
            . '\'CustomTheme\' to the class. After that, we need to import (or use) '
            . 'the class \'<a href="docs/webfiori/entity/Theme" target="_blank">Theme</a>\'. Once we do that, we make our class '
            . 'extend the class \'Theme\'. By the end of this step, the code '
            . 'inside the file \'CustomTheme.php\' should be look like the following:'));
        $code = new CodeSnippet();
        $code->setTitle('PHP Code');
        $code->getCodeElement()->setClassName('language-php');
        $code->setCode('
<?php
use webfiori\entity\Theme;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
    }
}');
        $sec->addChild($code);
    }
    private function step4() {
        $sec = $this->createSection('Step 4: Implementing The Theme');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('At this step, we will start by writing the code which will '
            . 'make the theme functional. At minimum level, we need to do the '
            . 'following:'));
        $ul = new UnorderedList();
        $ul->addListItem('Set the name of the theme.');
        $ul->addListItem('Set the names of theme resource directories (CSS, JS and Images).');
        $ul->addListItem('Implementing the abstract methods of the class \'Theme\'.');
        $sec->addChild($ul);
        $sec->addChild($this->createParagraph('The name of the theme is used to load it. For that reason, '
            . 'each theme must have a <b>unique name</b>. To set the name of the '
            . 'theme, the method <a href="docs/webfiori/entity/Theme#setName" target="_blank">Theme::setName()</a> '
            . 'can be used. The name of theme directory '
            . 'is used along side resource directories names to load theme '
            . 'resource files. The method <a href="docs/webfiori/entity/Theme#setDirectoryName" target="_blank">Theme::setDirectoryName()</a> '
            . 'can be used. Also, there are 3 more methods for setting resource '
            . 'directories names, <a href="docs/webfiori/entity/Theme#setCssDirName" target="_blank">Theme::setCssDirName()</a>, '
            . '<a href="docs/webfiori/entity/Theme#setJsDirName" target="_blank">Theme::setJsDirName()</a> and '
            . '<a href="docs/webfiori/entity/Theme#setImagesDirName" target="_blank">Theme::setImagesDirName()</a>.'));
        $code = new CodeSnippet();
        $code->setTitle('PHP Code');
        $code->getCodeElement()->setClassName('language-php');
        $code->setCode('
<?php
use webfiori\entity\Theme;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
        $this->setCssDirName(\'css\');
        $this->setJsDirName(\'js\');
        $this->setImagesDirName(\'images\');
    }
}');
        $sec->addChild($code);
        $sec->addChild($this->createParagraph('After that, we will start the actual theme implementation. '
            . 'In the <a href="learn/topics/themes/class-Page" target="_blank">lesson</a> '
            . 'which we talked about the class <a href="docs/webfiori/entity/Page">Page</a>, '
            . 'we said that the page has multiple sections. In many cases, '
            . 'the header, footer and the side content of a web page are common '
            . 'between all pages of the website. This also applies to the tags '
            . 'which are inside the &lt;head&gt; tag.'));
        $sec->addChild($this->createParagraph('The given sections of the page can be controlled by the theme. '
            . 'In order to customize the content of each part, there are 5 abstract '
            . 'methods that we need to implement:'));
        $ul2 = new UnorderedList();
        $base = WebFiori::getSiteConfig()->getBaseURL();
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadNode', 'Theme::getHeadNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadrNode', 'Theme::getHeadrNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getAsideNode', 'Theme::getAsideNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getFooterNode', 'Theme::getFooterNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#createHTMLNode', 'Theme::createHTMLNode()','_blank'));
        $sec->addChild($ul2);
        $sec->addChild($this->createParagraph('Each method of the mentioned must return an object of type '
            . '<a href="docs/phpStructs/html/HTMLNode" target="_blank">HTMLNode</a> '
            . 'except for the method <a href="docs/webfiori/entity/Theme#getHeadNode" target="_blank">Theme::getHeadNode()</a>. '
            . 'It must return an object of type <a href="docs/phpStructs/html/HeadNode" target="_blank">HeadNode</a>. '
            . 'The last method is used to create custom HTML nodes by supplying an '
            . 'array of options. The developer can specify how the method will '
            . 'use the options array.'));
        $sec->addChild($this->createParagraph('For now, we will allow each method to return '
            . 'a &lt;div&gt; element with a text that descripes which part '
            . 'of the page the div represents. First, we need to import the class \'HTMLNode\' and '
            . 'the class \'HeadNode\' since we are going to use them.'));
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP Code');
        $code2->getCodeElement()->setClassName('language-php');
        $code2->setCode('
<?php
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HeadNode;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
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
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        $header->addTextNode(\'Header Section\');
        return $header;
    }
}');
        $sec->addChild($code2);
        $sec->addChild($this->createParagraph('If we test the theme as it is, it would not show any colors '
            . 'for different page areas since we did not include the CSS file that '
            . 'we have created. The last step for now is to load the CSS file that '
            . 'we have created. In order to add any reasource file, we have to include '
            . 'it inside the body of the method <a href="docs/webfiori/entity/Theme#getHeadNode" target="_blank">Theme::getHeadNode()</a>.'
            . 'To do that, we use the method <a href="docs/phpStructs/html/HeadNode#addCSS" target="_blank">HeadNode::addCSS()</a>. In '
            . 'addition to using this method, we use the method <a href="docs/webfiori/entity/Page#cssDir" target="_blank">Page::cssDir()</a> to get '
            . 'the correct CSS directory of the theme. After performing '
            . 'this step, the theme will be ready for testing.'));
        $code3 = new CodeSnippet();
        $code3->setTitle('PHP Code');
        $code3->getCodeElement()->setClassName('language-php');
        $code3->setCode('
<?php
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HeadNode;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
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
        $sec->addChild($code3);
    }
    private function step5() {
        $sec = $this->createSection('Step 5: Testing The Theme');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('After creating our new theme, we need to see the result. '
            . 'What we will be doing is to create new PHP class in the '
            . '\'/pages\' directory and load the theme in the file. Let\'s give '
            . 'the file the name \'ThemeTestPage.php\'. First of all, we will '
            . 'be going to include the class <a href="docs/webfiori/entity/Page" target="_blank">Page</a> since we will be using it. '
            . 'After that, we will '
            . 'load the theme using the static method <a href="docs/webfiori/entity/Page#usingTheme" target="_blank">Page::usingTheme()</a>. '
            . 'The name of the theme will be passed to this method in order to load it. After that, '
            . 'we will give our page a title using the static method <a href="docs/webfiori/entity/Page#title" target="_blank">Page::title()</a> '
            . 'and a short description using the static method <a href="docs/webfiori/entity/Page#description" target="_blank">Page::description()</a>. '
            . 'Finally, we will add a paragraph to the body in order to add some '
            . 'text and make it clear.'));
        $code = new CodeSnippet();
        $code->setTitle('PHP Code');
        $code->getCodeElement()->setClassName('language-php');
        $code->setCode('<?php
namespace examples\views;
use webfiori\entity\Page;
use phpStructs\html\PNode;
class ExamplePage{
    public function __construct() {
        //loading the theme using its name
        Page::theme(\'Custom Theme\');
        //setting page title
        Page::title(\'Example Page\');
        //setting the description of the page
        Page::description(\'An example page.\');
        
        //adding paragraph to main-content-area
        $p = new PNode();
        $p->addText(\'Main Content Area\');
        Page::insert($p);
        
        //adding a paragraph to page-body
        $p2 = new PNode();
        $p2->addText(\'Page Body\');
        Page::insert($p2,\'page-body\');
        
        Page::render();
    }
}
//We do that to make the router initialize the view automatically.
return __NAMESPACE__;');
        $sec->addChild($code);
        $sec->addChild($this->createParagraph('The final step is to add a <a href="learn/topics/routing">route</a> to the view that we have '
             . 'created then navigate using the browser to the view URL.'));
        $sec->addChild($this->createParagraph('You can find the full source code in <a href="https://github.com/usernane/webfiori-examples/tree/master/creating-theme" target="_blank">GitHub</a>'));
    }
}
new ClassThemeView();
