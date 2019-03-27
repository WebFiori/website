<?php
namespace webfiori\views\learn\routing;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;
/**
 * Description of ClassRouterView
 *
 * @author Ibrahim
 */
class TypesOfRoutesView extends RoutingLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Types of Routes',
            'description'=>'Learn about types of routes in WebFiori Framework.',
            'active-aside'=>3
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph('As we have said in the last lesson, there '
                . 'are 4 different types of routes. In general, the idea of '
                . 'creating route for each type will be the same. '
                . 'The only difference will be the location of the resource '
                . 'that the route will point to.'));
        $sec1 = $this->createSection('View Route');
        $sec1->addChild($this->createParagraph(''
                . 'This type of route is the most common type of routes. It is a '
                . 'route that will point to a web page. The page can be '
                . 'simple HTML page or dynamic PHP web page. Usually, the '
                . 'folder \'/pages\' will contain all the views. The method '
                . '<a href="docs/webfiori/entity/router/Router#view" target="_blank">Router::view()</a> '
                . 'is used to create such route.'
                . ''));
        $sec1->addChild($this->createParagraph(''
                . 'In order to make it easy for developers, they can use the class '
                . '<a href="docs/webfiori/entity/router/ViewRoutes" target="_blank">ViewRoutes</a> '
                . 'to create routes to all views. The developer can modify the body of '
                . 'the method <a href="docs/webfiori/entity/router/ViewRoutes#create" target="_blank">ViewRoutes::create()</a> '
                . 'to add new routes.'
                . ''));
        $sec1->addChild($this->createParagraph(''
                . 'Lets assume that we have 3 views inside the folder \'pages\' as follows:'
                . ''));
        $ul1 = new UnorderedList();
        $ul1->addListItem('/pages/HomeView.html');
        $ul1->addListItem('/pages/LoginView.php');
        $ul1->addListItem('/pages/system-views/DashboardView.php');
        $sec1->addChild($ul1);
        $sec1->addChild($this->createParagraph('Also, Lets assume that the base URL of the website is '
                . 'https://example.com/. We want the user to see the pages as follows:'));
        $ul2 = new UnorderedList();
        $ul2->addListItem('\'https://example.com/\' should point to the view \'HomeView.html\'');
        $ul2->addListItem('\'https://example.com/home\' should point to the view \'HomeView.html\'');
        $ul2->addListItem('\'https://example.com/user-login\' should point to the view \'LoginView.php\'');
        $ul2->addListItem('\'https://example.com/dashboard\' should point to the view \'DashboardView.html\'');
        $sec1->addChild($ul2);
        $sec1->addChild($this->createParagraph('The following sample code shows how to create such a URL structre using '
                . 'the class <a href="docs/webfiori/entity/router/ViewRoutes" target="_blank">ViewRoutes</a>.'));
        $code01 = new CodeSnippet();
        $code01->setTitle('PHP Code');
        $code01->setCode("class ViewRoutes {
    public static function create(){
        Router::view('/', '/HomeView.html');
        Router::view('/home', '/HomeView.html');
        Router::view('/user-login', '/ThemeTestPage.php');
        Router::view('/dashboard', '/system-views/DashboardView.php');
    }
}
    ");
        $sec1->addChild($code01);
        Page::insert($sec1);
        $sec2 = $this->createSection('API Route');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph(''
                . 'An API route is a route that usually will point to a PHP class that '
                . 'exist in the folder \'/apis\'. Usually the class will '
                . 'extend the class \'<a href="docs/restEasy/WebAPI" target="_blank">WebAPI</a>\' '
                . 'or the class \'<a href="docs/entity/ExtendedWebAPI" target="_blank">ExtendedWebAPI</a>\'. '
                . 'Also, one API class usually will contain multiple APIs. '
                . 'To execute one of the APIs in the class, we have to include an '
                . 'extra GET or POST parameter which has the name \'action\'. '
                . 'For more information in creating web APIs, you can check <a href="learn/web-apis" target="_blank">here</a>.'
                . ''));
        $sec2->addChild($this->createParagraph(''
                . 'Suppose that we have 3 API classes as follows:'
                . ''
                . ''));
        $ul3 = new UnorderedList();
        $ul3->addListItem('UserAPIs.php, Has 3 actions: \'add-user\', \'update-user\' and \'delete-user\'');
        $ul3->addListItem('writer/ArticleAPIs.php Has 2 actions: \'publish-article\' and \'\'.');
        $sec3 = $this->createSection('Closure Route');
        Page::insert($sec3);
        $sec4 = $this->createSection('Custom Route');
        Page::insert($sec4);
        $this->setPrevTopicLink('learn/topics/routing/class-Router', 'The Class \'Router\'');
        //$this->setNextTopicLink('learn/topics/routing/examples', 'Routing Examples');
        $this->displayView();
    }
}
new TypesOfRoutesView();
