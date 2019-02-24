<?php
namespace webfiori\views\learn\routing;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;
/**
 * Description of ClassRouterView
 *
 * @author Ibrahim
 */
class RoutingExamplesView extends RoutingLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Routing Examples',
            'description'=>'A set of basic examples that shows how different types of '
            . 'routes works WebFiori Framework.'
        ));
        $this->setPrevTopicLink('learn/topics/routing/class-Router', 'The Class \'Router\'');
        //$this->setNextTopicLink('learn/topics/routing/routing-examples', 'Routing Examples');
        $this->displayView();
    }
}
new RoutingExamplesView();
