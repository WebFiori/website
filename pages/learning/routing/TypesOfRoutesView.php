<?php
namespace webfiori\views\learn\routing;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;
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
        Page::insert($this->createParagraph('As we have said in the last lesson, there '
                . 'are 4 different types of routes. In general, the idea of '
                . 'creating route for each type will be the same. '
                . 'The only difference will be the location of the resource '
                . 'that the route will point to.'));
        $sec1 = $this->createSection('View Route');
        $sec1->addChild($this->createParagraph(''
                . 'This type of route is the most common type of route. It is a '
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
                . 'The following code sample shows how to create d'
                . ''));
        Page::insert($sec1);
        $sec2 = $this->createSection('API Route');
        Page::insert($sec2);
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
