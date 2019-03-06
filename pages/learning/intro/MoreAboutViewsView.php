<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\intro;
use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;
/**
 * Description of MoreAboutViewsView
 *
 * @author Ibrahim
 */
class MoreAboutViewsView extends IntroLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'More About Views',
            'description'=>'Learn more about views in WebFiori Framework and '
            . 'how to use the class \'Page\'.',
            'active-aside'=>3
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph(''
                . 'Views in WebFiori Framework can be more than just plain HTML. '
                . 'They can be dynamic PHP web pages. One of the grate features that '
                . 'the framework provides is the entity class \'<a href="docs/webfiori/entity/Page" target="_blank">Page</a>\'.'
                . ''));
        $sec1 = $this->createSection('The Class \'Page\'');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph(''
                . 'The class \'Page\' simply represents a dynamic PHP web page. '
                . 'The developer can use this class to change many attributes of a '
                . 'web page such as its title, description, canonical URL and more. '
                . 'You can learn more about this class in <a href="learn/topics/themes" target="_blank">'
                . 'Themes Lessons</a> under the section '
                . '<a href="learn/topics/themes/class-Page" target="_blank">The Class \'Page\'</a>. '
                . ''
                . ''));
        $sec2 = $this->createSection('Using The Class \'Page\'');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph(''
                . 'Assume that we would like to create a home page for our website. '
                . 'Also, assume that the title of the page is \'Welcome to My WebSite\', '
                . 'the name of the website is \'My Personal Blog\' and the '
                . 'body of the page has one paragraph. Let\'s create '
                . 'new PHP file inside the folder pages and give it the name '
                . '\index.php\'.'
                . ''));
        $sec2->addChild($this->createParagraph('The first step is to '
                . 'import the class \'Page\' from the namespace '
                . '<a href="docs/webfiori/entity" target="_blank">\webfiori\entity</a> as shown bellow.'));
        $code = new CodeSnippet();
        $code->setTitle('PHP Code');
        $code->setCode('&lt;?php
use webfiori\entity\Page;');
        $sec2->addChild($code);
        $sec2->addChild($this->createParagraph('The next step is to '
                . 'set the name of the website and the title of the page. '
                . 'The static method <a href="docs/webfiori/entity/Page#title" target="_blank">Page::title()</a> is used to set the title of the page. '
                . 'The static method <a href="docs/webfiori/entity/Page#siteName" target="_blank">Page::siteName()</a> is used to set the name of the website. '));
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP Code');
        $code2->setCode('&lt;?php
use webfiori\entity\Page;
Page::title(\'Welcome to My WebSite\');
Page::siteName(\'My Personal Blog\');');
        $sec2->addChild($code2);
        $sec2->addChild($this->createParagraph(''
                . 'After that, we will be adding a text to the body '
                . 'of the page. To add a text, we import the class '
                . '<a href="docs/phpStructs/html/HTMLNode" target="_blank">HTMLNode</a>. '
                . 'This class has a static method that can be used to '
                . 'create text nodes. The method is <a href="docs/phpStructs/html/HTMLNode#createTextNode" target="_blank">HTMLNode::createTextNode()</a>.'
                . ''));
        $code3 = new CodeSnippet();
        $code3->setTitle('PHP Code');
        $code3->setCode('&lt;?php
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
Page::title(\'Welcome to My WebSite\');
Page::siteName(\'My Personal Blog\');
$textNode = HTMLNode::createTextNode(\'Welcome. This is my home page.\');');
        $sec2->addChild($code3);
        $sec2->addChild($this->createParagraph('To add an element to the body '
                . 'of the page, the method <a href="docs/webfiori/entity/Page#insert" target="_blank">Page::insert()</a> can '
                . 'be used.'));
        $code4 = new CodeSnippet();
        $code4->setTitle('PHP Code');
        $code4->setCode('&lt;?php
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
Page::title(\'Welcome to My WebSite\');
Page::siteName(\'My Personal Blog\');
$textNode = HTMLNode::createTextNode(\'Welcome. This is my home page.\');
Page::insert($textNode);');
        $sec2->addChild($code4);
        $sec2->addChild($this->createParagraph('The last line of code that we '
                . 'will add to the file '
                . 'is for calling the method <a href="" target="_blank">Page::render()</a> '
                . 'in order to display the view.'));
        $code5 = new CodeSnippet();
        $code5->setTitle('PHP Code');
        $code5->setCode('&lt;?php
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
Page::title(\'Welcome to My WebSite\');
Page::siteName(\'My Personal Blog\');
$textNode = HTMLNode::createTextNode(\'Welcome. This is my home page.\');
Page::insert($textNode);
Page::render();');
        $sec2->addChild($code5);
        $sec2->addChild($this->createParagraph('Now we are done with the '
                . 'code of the file \'index.php\'. The last step is '
                . 'to add a <a href="learn/topics/routing" target="_blank">route</a> to the view that we have just created.'
                . ''));
        $sec2->addChild($this->createParagraph(''
                . 'Assuming that your website URL is \'http://example.com/\', '
                . 'the HTML document that will be generated by the class '
                . '\'Page\' will have the following HTML:'));
        $code7 = new CodeSnippet();
        $code7->setTitle('PHP Code');
        $code7->setCode(str_replace('<', '&lt;', str_replace('>', '&gt;', ''
                . '<!DOCTYPE html>
<html>
    <head>
        <base href="http://example.com/">
        <title>
            Welcome to My WebSite | My Personal Blog
        </title>
        <link rel="canonical" href="http://example.com/home">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    </head>
    <body itemscope="" itemtype="http://schema.org/WebPage">
        <div id="page-header">
        </div>
        <div id="page-body">
            <div id="side-content-area">
            </div>
            <div id="main-content-area">
                Welcome. This is my home page.
            </div>
        </div>
        <div id="page-footer">
        </div>
    </body>
</html>
'
                . '')));
        $sec2->addChild($code7);
        $sec2->addChild($this->createParagraph('As you can see, the &lt;head&gt; '
                . 'tag will have two meta tags added by default. '
                . 'the meta \'viewport\' and the meta \'canonical\'.'));
        $this->setPrevTopicLink('learn/topics/basic-usage', 'Basic Usage');
        $this->displayView();
    }
}
new MoreAboutViewsView();
