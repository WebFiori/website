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
        $sec = $this->createSection('Welcome');
        $sec->addChild($this->createParagraph('Welcome to WebFiori learning center. In here, you will '
                . 'be abble to learn how to use the framework in the most '
                . 'effective way. You can find all the topics bellow.'));
        Page::insert($sec);
    }

    private function _whatToLearn() {
        $sec = $this->createSection('I want to learn about:');
        $ul = new UnorderedList();
        $sec->addChild($ul);
        $ul->addChild($this->createLinkListItem('learn/topics/basics', 'The basics.'));
        $ul->addChild($this->createLinkListItem('learn/topics/routing', 'Routing.'));
        $ul->addChild($this->createLinkListItem('learn/topics/themes', 'Creating themes.'));
        Page::insert($sec);
    }
}
new Index();
