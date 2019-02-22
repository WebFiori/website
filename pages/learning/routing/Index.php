<?php
namespace webfiori\views\learn\routing;
use phpStructs\html\HTMLNode;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends RoutingLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Routing',
            'description'=>'Learn about the basics of routing in '
            . 'WebFiori Framework.'
        ));
        $this->createParagraph('One of the essential parts of the framework is routing. '
                . 'Routing in simple trems is sending user request to its correct '
                . 'destination. The developer can use the class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a>.');
        $this->createParagraph('After finishing the following set of topics, you will '
                . 'be able to understand how routing sub-system works and create '
                . 'your own custom routes.');
        $sec = new HTMLNode('section');
        $h = new HTMLNode('h1');
        $h->addTextNode('Topics:');
        $sec->addChild($h);
        Page::insert($sec);
        $ul = new UnorderedList();
        $sec->addChild($ul);
        $ul->addListItem('<a href="learn/topics/routing/how-it-works" >How Routing System Works.</a>');
        $ul->addListItem('<a href="learn/topics/routing/class-Router" >The Class \'Router\'.</a>');
        $this->setNextTopicLink('learn/topics/routing/how-it-works', 'How Routing System Works');
        $this->displayView();
    }
}
new Index();