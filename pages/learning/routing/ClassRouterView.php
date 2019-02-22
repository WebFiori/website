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
            'description'=>'Learn about the class \'Router\' and how to use it.'
        ));
        $this->createParagraph('The class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a> '
                . 'is one of the core classes. The main aim of this '
                . 'class is to direct client request to the correct '
                . 'resource. In addition to that, this class is used to create '
                . 'routes to different resources.');
        $this->createParagraph('A resource can be simply a file such as '
                . 'a text file, an image or web page or a complex report '
                . 'that was generated dynamically by gathering data '
                . 'and representing it in a good looking way.');
        $this->createParagraph('Most of the time, this class will '
                . 'be used to create routes. In general, there are '
                . '4 types of routes that can be created using this '
                . 'class:');
        Page::insert($this->typesOfRoutes());
        $this->setPrevTopicLink('learn/topics/routing/how-it-works', 'How Routing System Works');
    
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
}
new ClassRouterView();
