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
        $this->setPrevTopicLink('learn/topics/routing/class-Router', 'The Class \'Router\'');
        $this->setNextTopicLink('learn/topics/routing/examples', 'Routing Examples');
        $this->displayView();
    }
}
new TypesOfRoutesView();
