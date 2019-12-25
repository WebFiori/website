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
            'title'=>'Introduction to Routing',
            'description'=>'Learn about the basics of routing in '
            . 'WebFiori Framework.',
            'active-aside'=>1
        ));
        $sec = $this->createSection('Introduction');
        $sec->addChild($this->createParagraph(''
                . 'One of the things that website owners care about is to have '
                . 'a friendly URLs that can be remembered easily. In addition '
                . 'to that, having a well defined URL structure can help '
                . 'in SEO. For example, instead of having something like '
                . '<span style="font-family:monospace">'
                . 'http://example.com/view-something?something={a-something}</span>, '
                . 'it is better to have something like <span style="font-family:monospace">'
                . 'http://example.com/view-something/{a-something}</span>. In this example, '
                . 'something can be an image, user profile, a file or a simple HTML web page. Routing can '
                . 'help in achiving such as URL structure without having to '
                . 'create each individual resource.'
                . ''));
        $sec->addChild($this->createParagraph('One of the essential parts of the framework is routing. '
                . 'Routing in simple trems is sending user request to its correct '
                . 'destination. The class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a> is one of the core classes '
                . 'which are resposibile for performing this task. It can be used to create routes and '
                . 'send requests to the correct route.'));
        $sec->addChild($this->createParagraph('After finishing the following set of topics, you will '
                . 'be able to understand how routing sub-system works and create '
                . 'your own custom URIs structure.'));
        Page::insert($sec);
        $sec2 = $this->createSection('Topics Covered:');
        
        $ul = new UnorderedList();
        $sec2->addChild($ul);
        $ul->addListItem('<a href="learn/topics/routing/how-it-works" >How Routing System Works.</a>',FALSE);
        $ul->addListItem('<a href="learn/topics/routing/class-Router" >The Class \'Router\'.</a>',FALSE);
        $this->setNextTopicLink('learn/topics/routing/how-it-works', 'How Routing System Works');
        Page::insert($sec2);
        $this->displayView();
    }
}
new Index();