<?php
namespace webfiori\views\learn\intro;
use webfiori\views\WebFioriPage;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\HTMLNode;
use phpStructs\html\CodeSnippet;
use webfiori\WebFiori;
use WebFioriGUI;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class BasicUsageView extends IntroLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Basic Usage',
            'description'=>'The simplest way to use the framework.',
            'active-aside'=>3
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        $sec = $this->createSection('A Route and a View');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('The simplest way in using the framework is to '
                . 'create HTML web pages and add <a href="learn/topics/routing">routes</a> to each page. Pages in WebFiori Framework '
                . 'must be created inside the folder <span style="font-family:monospace">\'/pages\'</span>. '
                . 'It is possible to create your pages in different place but leave this '
                . 'for later.'));
        $sec->addChild($this->createParagraph('Lets assume that we have HTML page which hase '
                . 'the name <span style="font-family:monospace">\'index.html\'</span>. Also, '
                . 'let\'s assume tha the page has the following code in it:'));
        $code = new CodeSnippet();
        $code->setTitle('HTML Code');
        $code->getCodeElement()->setClassName('language-html');
        $code->setCode('<!DOCTYPE html>
<html>
    <head>
        <title>Hello</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <p>
                Welcome to My Home Page
            </p>
            <p>
                This page is served using 
                <a href="https://programmingacademia.com/webfiori">WebFiori Framework</a>
            </p>
        </div>
    </body>
</html>');
        $sec->addChild($code);
        $sec->addChild($this->createParagraph(''
                . 'In order to view the page, we have to create a route '
                . 'for it. Since this is a page, we can use the method '
                . '<a href="docs/webfiori/entity/router/Router#view" target="_blank">Router::view()</a> to create its route. '
                . 'The class <a href="docs/webfiori/entity/router/ViewRoutes" target="_blank">ViewRoutes</a> has one static method which the '
                . 'developer can use to create routes to views. The '
                . 'following code shows how the route is created.'
                . ''));
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP Code');
        $code2->getCodeElement()->setClassName('language-php');
        $code2->setCode("class ViewRoutes {
    /**
     * Create all views routes. Include your own here.
     * @since 1.0
     */
    public static function create(){
        //add a route to the index file of the website
        Router::view('/home', '/index.html');
    }
}
");
        $this->setPrevTopicLink('learn/topics/architecture', 'Framework Architecture');
        $this->setNextTopicLink('learn/topics/more-about-views', 'More About Views');
        $this->displayView();
    }
}
new BasicUsageView();
