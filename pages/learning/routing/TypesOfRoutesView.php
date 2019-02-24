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
            'description'=>'Learn about types of routes in WebFiori Framework.'
        ));
        Page::insert($this->createParagraph('As we have said in the last lesson, there '
                . 'are 4 different types of routes. In general, the idea of '
                . 'creating route for each type will be the same. '
                . 'The only difference will be the location of the resource '
                . 'that the route will point to.'));
        $sec1 = $this->createSection('View Route');
        Page::insert($sec1);
        $sec2 = $this->createSection('API Route');
        Page::insert($sec2);
        $sec3 = $this->createSection('Closure Route');
        Page::insert($sec3);
        $sec4 = $this->createSection('Custom Route');
        Page::insert($sec4);
        $this->setPrevTopicLink('learn/topics/routing/class-Router', 'The Class \'Router\'');
        $this->setNextTopicLink('learn/topics/routing/examples', 'Routing Examples');
        $this->displayView();
    }
}
new TypesOfRoutesView();
