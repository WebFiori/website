<?php
namespace webfiori\views\learn\routing;
use phpStructs\html\CodeSnippet;
use webfiori\entity\Page;
/**
 * Description of GenericRoutesView
 *
 * @author Ibrahim
 */
class VariablesInRoutes extends RoutingLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Variables in Routes',
            'description'=>'A URI Variable is a string which is a part of URI\'s path which '
                . 'can have many values. The value of the variable can be '
                . 'specified when sending a request to the resource that the '
                . 'URI represents.',
            'active-aside'=>5
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        $sec1 = $this->createSection('The Basic Idea');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph(''
                . 'Suppose that we have a we have a website that publishes news. '
                . 'Each post will have its own link. '
                . 'The posts has a URI structute that looks like '
                . '"https://example.com/news/some_post". One way to route the user to '
                . 'the correct post is to create a unique route for each post. '
                . 'If there are 1000 posts, then we have to create 1000 routes which is '
                . 'overwhelming.'
                . ''));
        $sec1->addChild($this->createParagraph(''
                . 'WebFiori framework provides a way to create one route to '
                . 'all posts. This can be achived by using URI variables while '
                . 'creating your route.'
                . ''));
        $sec2 = $this->createSection('What is a URI Variable?');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph(''
                . 'A URI Variable is a string which is a part of URI\'s path which '
                . 'can have many values. The value of the variable can be '
                . 'specified when sending a request to the resource that the '
                . 'URI represents. In the above example, the value of the variable '
                . 'most probably will be the name of the post. URI variables can be '
                . 'also used to replace query string variables to make URIs '
                . 'user friendly.'
                . ''));
        $sec3 = $this->createSection('Using URI Variable');
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph('We have already seen variables '
                . 'when we explained the diffrent types of routes. In order to '
                . 'add a variable to a route, we have to enclose its name between '
                . 'two curly braces. To access the value of the '
                . 'variable, the method <a href="docs/webfiori/entity/router/Router#getVarValue" target="_blank">Router::getVarValue()</a> is used. The following sample code shows how to use '
                . 'URI variiables.'));
        $code03 = new CodeSnippet();
        $code03->setTitle('PHP Code');
        $code03->setCode("class ClosureRoutes {
    public static function create(){
        Router::closure([
            'path'=>'/news/{post-title}', 
            'route-to'=>function(){
                \$name = Router::getVarValue('post-title');
                echo 'You tried to open the post which has the title \''.\$name.'\'';
            }
        ]);
    }
}
    ");
        $sec3->addChild($code03);
        $this->setPrevTopicLink('learn/topics/routing/types-of-routes', 'Types of Routes');
        $this->displayView();
    }
}
return __NAMESPACE__;