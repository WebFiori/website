<?php
namespace webfiori\views\learn\routing;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;
/**
 * Description of ClassRouterView
 *
 * @author Ibrahim
 */
class ClassRouterView extends RoutingLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'The Class \'Router\'',
            'description'=>'Learn about the class \'Router\' and how to use it.',
            'active-aside'=>2
        ));
        $sec = $this->createSection('The Basics');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('The class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a> '
                . 'is one of the core framework classes. The main aim of this '
                . 'class is to direct client request to the correct '
                . 'resource. In addition to that, this class is used to create '
                . 'routes to different resources.'));
        $sec->addChild($this->createParagraph('A resource can be simply a file such as '
                . 'a text file, an image or web page or a complex report '
                . 'that was generated dynamically by gathering data '
                . 'and representing it in a good looking way.'));
        $sec->addChild($this->createParagraph('Most of the time, this class will '
                . 'be used to create routes. In general, there are '
                . '4 types of routes that can be created using this '
                . 'class:'));
        $sec->addChild($this->typesOfRoutes());
        $sec->addChild($this->createParagraph('For each type of route, there is a '
                . 'specific static method in the class \'Router\' that can be used to '
                . 'create it. The 4 methods that corresponds to each type are:'));
        $sec->addChild($this->typesOfRoutesMethods());
        $this->setPrevTopicLink('learn/topics/routing/how-it-works', 'How Routing System Works');
        $this->setNextTopicLink('learn/topics/routing/types-of-routes', 'Types of Routes');
        $this->displayView();
    }
    
    private function typesOfRoutes(){
        $ul = new UnorderedList();
        $ul->addListItem('View Route.');
        $ul->addListItem('API Route.');
        $ul->addListItem('Closure Route.');
        $ul->addListItem('Custom Route.');
        return $ul;
    }
    private function typesOfRoutesMethods(){
        $ul = new UnorderedList();
        $ul->addListItem('<a href="docs/webfiori/entity/router/Router#view" target="_blank">Router::view()</a>');
        $ul->addListItem('<a href="docs/webfiori/entity/router/Router#api" target="_blank">Router::api()</a>');
        $ul->addListItem('<a href="docs/webfiori/entity/router/Router#closure" target="_blank">Router::closure()</a>');
        $ul->addListItem('<a href="docs/webfiori/entity/router/Router#other" target="_blank">Router::other()</a>');
        return $ul;
    }
}
new ClassRouterView();
