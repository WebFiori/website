<?php
namespace webfiori\views\learn;
use webfiori\views\WebFioriPage;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
use phpStructs\html\PNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\LinkNode;
use WebFioriGUI;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends WebFioriPage{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Learning Center',
            'description'=>'Learn the basics of how to use WebFiori Framework.'
        ));
        WebFioriGUI::createTitleNode('Learning Center');
        $this->_welcome();
        $this->_whatToLearn();
        Page::render();
    }
    private function _welcome(){
        $sec = new HTMLNode('section');
        $h = new HTMLNode('h1');
        $h->addTextNode('Welcome');
        $sec->addChild($h);
        $p1 = new PNode();
        $p1->addText('Welcome to WebFiori learning center. In here, you will '
                . 'be abble to learn how to use the framework in the most '
                . 'effective way. You can find all the topics bellow.');
        $sec->addChild($p1);
        Page::insert($sec);
    }

    private function _whatToLearn() {
        $sec = new HTMLNode('section');
        $h = new HTMLNode('h1');
        $h->addTextNode('I want to learn about:');
        $sec->addChild($h);
        $ul = new UnorderedList();
        $sec->addChild($ul);
        $ul->addListItem($this->_createListItem('learn/topics/basics', 'The basics.'));
        $ul->addListItem($this->_createListItem('learn/topics/routing', 'Routing.'));
        $ul->addListItem($this->_createListItem('learn/topics/themes', 'Creating themes.'));
        Page::insert($sec);
    }
    private function _createListItem($link,$label) {
        $li00 = new ListItem();
        $link00 = new LinkNode($link, $label);
        $li00->addChild($link00);
        return $li00;
    }
}
new Index();
