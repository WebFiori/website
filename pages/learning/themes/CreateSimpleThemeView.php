<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use webfiori\WebFiori;
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
            'active-aside'=>5,
            'title'=>'Creating a Simple Theme',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/create-simple-theme'
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        $this->createParagraph('What we will be doing here is to create a theme that '
                . 'gives different colors to page sections. It is only used to show the basics of creating a '
                . 'theme.');
        $this->createParagraph('In general, theme creation process consist of the '
                . 'following:');
        $this->themeCreationSteps();
        $this->step1();
        $this->step2();
        $this->step3();
        $this->step4();
        $this->step5();
        $this->displayView();
    }
    private function themeCreationSteps(){
        $ul = new UnorderedList();
        $ul->addListItem('Creating theme folder inside the directory <b>\'/themes\'</b>.');
        $ul->addListItem('Creating resources folders inside (JavaScript, CSS and Images).');
        $ul->addListItem('Adding theme resources as needed.');
        $ul->addListItem('Creating new PHP class inside theme directory.');
        $ul->addListItem('Extending the class <a href="'.WebFiori::getSiteConfig()->getBaseThemeName().'docs/webfiori/entity/Theme" target="_blank">Theme</a>.');
        $ul->addListItem('Implementing abstract methods as needed.');
        Page::insert($ul);
    }
    private function step1() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 1: Creating Theme Directory and Resources Folders'
        ));
        Page::insert($sec);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'Themes in WebFiori Framework are '
            . 'created inside the folder \'/themes\'. The first step in creating '
            . 'new theme is to create new folder to add all its components there. '
            . 'let\'s give the folder the name \'custom-theme\'. After creating '
            . 'theme directory, we need to create 3 additional folders inside the '
            . 'new folder. The 3 folders will be used to hold theme '
            . 'CSS, JavaScript and images. Let\'s give the names \'js\', \'css\' and \'images\'. This '
            . 'means that the folder structure will be as follows:'
        )));
        $ul = new UnorderedList();
        $ul->addListItem('/themes/custom-theme/css');
        $ul->addListItem('/themes/custom-theme/js');
        $ul->addListItem('/themes/custom-theme/images');
        $sec->addChild($ul);
    }
    private function step2() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 2: Adding Theme Resource Files'
        ));
        Page::insert($sec);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'At this step, we will create one CSS file. '
            . 'The file will be added in the folder \'/themes/custom-theme/css\'. '
            . 'Let\'s give the file the name \'theme.css\' This CSS file will '
            . 'only contain selectors to give different colors for each '
            . 'section within the page. The code within the file will be '
            . 'something like the following:'
            )
        ));
        $code = new CodeSnippet();
        $code->setTitle('CSS Code');
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
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'The padding is added only to make elements far from each '
            . 'other a little bit. In addition to creating this CSS file, we could '
            . 'do the same thing for JS and images as well.'
            )
        ));
    }
    private function step3() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 3: Creating Theme Class and Extending the Class \'Theme\''
        ));
        Page::insert($sec);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'This step is very simple. All what we have to do is to create '
            . 'new PHP class in the main theme folder. Let\'s give the name '
            . '\'CustomTheme\' to the class. After that, we need to import (or use) '
            . 'the class \'<a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme" target="_blank">Theme</a>\'. Once we do that, we make our class '
            . 'extend the class \'Theme\'. By the end of this step, the code '
            . 'inside the file \'CustomTheme.php\' should be look like the following:'
            )
        ));
        $code = new CodeSnippet();
        $code->setTitle('PHP Code');
        $code->setCode('
&lt;?php
use webfiori\entity\Theme;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
    }
}');
        $sec->addChild($code);
    }
    private function step4() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 4: Implementing The Theme'
        ));
        Page::insert($sec);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'At this step, we will start by writing the code which will '
            . 'make the theme functional. At minimum level, we need to do the '
            . 'following:'
            )
        ));
        $ul = new UnorderedList();
        $ul->addListItem('Set the name of the theme.');
        $ul->addListItem('Set the name of the directory at which the theme exist.');
        $ul->addListItem('Set the names of theme resource directories (CSS, JS and Images).');
        $ul->addListItem('Implementing the abstract methods of the class \'Theme\'.');
        $sec->addChild($ul);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'The name of the theme is used to load it. For that reason, '
            . 'each theme must have a <b>unique name</b>. To set the name of the '
            . 'theme, the method <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme#setName" target="_blank">Theme::setName()</a> '
            . 'can be used. The name of theme directory '
            . 'is used along side resource directories names to load theme '
            . 'resource files. The method <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme#setDirectoryName" target="_blank">Theme::setDirectoryName()</a> '
            . 'can be used. Also, there are 3 more methods for setting resource '
            . 'directories names, <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme#setCssDirName" target="_blank">Theme::setCssDirName()</a>, '
            . '<a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme#setJsDirName" target="_blank">Theme::setJsDirName()</a> and '
            . '<a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme#setImagesDirName" target="_blank">Theme::setImagesDirName()</a>.'
            )
        ));
        $code = new CodeSnippet();
        $code->setTitle('PHP Code');
        $code->setCode('
&lt;?php
use webfiori\entity\Theme;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
        $this->setDirectoryName(\'custom-theme\');
        $this->setCssDirName(\'css\');
        $this->setJsDirName(\'js\');
        $this->setImagesDirName(\'images\');
    }
}');
        $sec->addChild($code);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'After that, we will start the actual theme implementation. '
            . 'In the <a href="'.WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/class-Page" target="_blank">lesson</a> '
            . 'which we talked about the class <a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Page">Page</a>, '
            . 'we said that the page has multiple sections. In many cases, '
            . 'the header, footer and the side content of a web page are common '
            . 'between all pages of the website. This also applies to the tags '
            . 'which are inside the &lt;head&gt; tag.'
            )
        ));
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'The given sections of the page can be controlled by the theme. '
            . 'In order to customize the content of each part, there are 5 abstract '
            . 'methods that we need to implement:'
            )
        ));
        $ul2 = new UnorderedList();
        $base = WebFiori::getSiteConfig()->getBaseURL();
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadNode', 'Theme::getHeadNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getHeadrNode', 'Theme::getHeadrNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getAsideNode', 'Theme::getAsideNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#getFooterNode', 'Theme::getFooterNode()','_blank'));
        $ul2->addChild($this->createLinkListItem($base.'/docs/webfiori/entity/Theme#createHTMLNode', 'Theme::createHTMLNode()','_blank'));
        $sec->addChild($ul2);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'Each method of the mentioned must return an object of type '
            . '<a href="'.WebFiori::getSiteConfig()->getBaseURL().'/docs/phpStructs/html/HTMLNode" target="_blank">HTMLNode</a> '
            . 'except for the method <a href="'.WebFiori::getSiteConfig()->getBaseURL().'/docs/webfiori/entity/Theme#getHeadNode" target="_blank">Theme::getHeadNode()</a>. '
            . 'It must return an object of type <a href="'.WebFiori::getSiteConfig()->getBaseURL().'/docs/phpStructs/html/HeadNode" target="_blank">HeadNode</a>. '
            . 'The last method is used to create custom HTML nodes by supplying an '
            . 'array of options. The developer can specify how the method will '
            . 'use the options array.'
            )
        ));
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'For now, we will allow each method to return '
            . 'a &lt;div&gt; element with a text that descripes which part '
            . 'of the page the div represents.'
            )
        ));
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP Code');
        $code2->setCode('
&lt;?php
use webfiori\entity\Theme;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
        $this->setDirectoryName(\'custom-theme\');
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
    }
    private function step5() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 5: Testing The Theme'
        ));
        Page::insert($sec);
    }
}
new ClassThemeView();
