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
        Router::view([
            'path'=>'/', 
            'route-to'=>'/HomeView.html'
        ]);
        Router::view([
            'path'=>'/home', 
            'route-to'=>'/HomeView.html'
        });
        Router::view([
            'path'=>'/user-login', 
            'route-to'=>'/ThemeTestPage.php'
        ]);
        Router::view([
            'path'=>'/dashboard', 
            'route-to'=>'/system-views/DashboardView.php'
        ]);
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
        $ul3->addListItem('/apis/UserAPIs.php, Has 3 actions: \'add-user\', \'update-user\' and \'delete-user\'.');
        $ul3->addListItem('/apis/writer/ArticleAPIs.php Has 2 actions: \'publish-article\' and \'revert-publish\'.');
        $ul3->addListItem('/apis/writer/ContentAPIs.php Has 2 actions: \'add-content\' and \'remove-content\'.');
        $sec2->addChild($this->createParagraph('Assuming that the base URL of the website is '
                . 'https://example.com/, We want the URLs of the APIs to be like that:'));
        $ul4 = new UnorderedList();
        $ul4->addListItem('\'https://example.com/web-apis/user/add-user\' should point to the view \'/apis/UserAPIs.php\'');
        $ul4->addListItem('\'https://example.com/web-apis/user/update-user\' should point to the view \'/apis/UserAPIs.php\'');
        $ul4->addListItem('\'https://example.com/web-apis/user/delete-user\' should point to the view \'/apis/UserAPIs.php\'');
        $ul4->addListItem('\'https://example.com/web-apis/article/publish-article\' should point to the view \'/apis/writer/ArticleAPIs.php\'');
        $ul4->addListItem('\'https://example.com/web-apis/article/revert-publish\' should point to the view \'/apis/writer/ArticleAPIs.php\'');
        $ul4->addListItem('\'https://example.com/web-apis/article-content/add-content\' should point to the view \'/apis/writer/ContentAPIs.php\'');
        $ul4->addListItem('\'https://example.com/web-apis/article-content/remove-content\' should point to the view \'/apis/writer/ContentAPIs.php\'');
        $sec2->addChild($ul4);
        $sec2->addChild($this->createParagraph(''
                . 'One thing to note about creating APIs is that API action must be passed '
                . 'alongside request body as a GET or POST parameter (e.g. \'action=add-user\'). '
                . 'as you can see from the above URLs, the action is appended to the end '
                . 'of the URL. To let the router know that this is an API action, we '
                . 'can use <a href="learn/routing/generic-routes" target="_blank">Generic Route</a>.'
                . ''));
        $sec2->addChild($this->createParagraph(''
                . 'A generic route is a route that has some of its '
                . '<a href="https://en.wikipedia.org/wiki/Uniform_Resource_Identifier#Generic_syntax" '
                . 'target="_blank">path parts</a> unkown. '
                . 'They can be used to serve dynamic content pased on generic path value. '
                . 'A generic path value is a value that is enclosed between {} while '
                . 'creating the route. For example, the first 3 APIs can have one '
                . 'URL in the form \'https://example.com/web-apis/user/<b>{action}</b>\'.'
                . ''));
        $sec2->addChild($this->createParagraph('The following sample code shows how to create such a URL structre using '
                . 'the class <a href="docs/webfiori/entity/router/APIRoutes" target="_blank">APIRoutes</a>. You can '
                . 'see how API action is passed. Note that the value of the generic must be \'action\' or the API call '
                . 'will fail.'));
        $code02 = new CodeSnippet();
        $code02->setTitle('PHP Code');
        $code02->setCode("class APIRoutes {
    public static function create(){
        Router::api([
            'path'=>'/web-apis/user/{action}', 
            'route-to'=>'/UserAPIs.php'
        ]);
        Router::api([
            'path'=>'/web-apis/article/{action}', 
            'route-to'=>'/writer/ArticleAPIs.php'
        ]);
        Router::api([
            'path'=>'/web-apis/article-content/{action}', 
            'route-to'=>'/writer/ContentAPIs.php'
        ]);
    }
}
    ");
        $sec2->addChild($code02);
        $sec3 = $this->createSection('Closure Route');
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph(''
                . 'A closure route is a route to a user defined code that will '
                . 'be executed when the resource is requested. In other terms, it is a function that '
                . 'will be called when a request is made. It is simply an <a '
                . 'href="https://www.php.net/manual/en/functions.anonymous.php" target="_blank">Anonymous Function</a>.'
                . 'Suppose that we would like to create a route to a function that will '
                . 'output \'Hello Mr.{A_Name}\' When its called. The URL that will be requested '
                . 'will have the form \'https://example.com/say-hello-to/{A_Name}\'. As you can see, we have '
                . 'added the name as a generic path variable in the URL.'
                . ''));
        $sec3->addChild($this->createParagraph('Since the request method of the URL is GET, we can access the '
                . 'name using the super global $_GET. The following code sample shows '
                . 'how its done.'));
        $code03 = new CodeSnippet();
        $code03->setTitle('PHP Code');
        $code03->setCode("class ClosureRoutes {
    public static function create(){
        Router::closure([
            'path'=>'/say-hello-to/{A_Name}', 
            'route-to'=>function(){
                \$name = \$_GET['A_Name'];
                echo 'Hello Mr.'.\$name;
            }
        ]);
    }
}
    ");
        $sec3->addChild($code03);
        $sec4 = $this->createSection('Custom Route');
        Page::insert($sec4);
        $this->setPrevTopicLink('learn/topics/routing/class-Router', 'The Class \'Router\'');
        $this->setNextTopicLink('learn/topics/routing/generic-route', 'Generic Routes');
        $this->displayView();
    }
}
new TypesOfRoutesView();
