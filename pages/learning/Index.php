<?php
namespace webfiori\views\learn;
use webfiori\views\WebFioriPage;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
use phpStructs\html\PNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\Anchor;
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
        $titleNode = Page::theme()->createHTMLNode(['type'=>'page-title']);
        Page::insert($titleNode);
        $this->_welcome();
        $link = new Anchor('learn/video', 'Video Tutorials');
        Page::insert($link);
        $this->_whatToLearn();
        Page::render();
    }
    private function _welcome(){
        $sec = $this->createSection('Welcome',3);
        $sec->addChild($this->createParagraph('Welcome to WebFiori learning center. In here, you will '
                . 'be able to learn how to use the framework in the most '
                . 'effective way. You can find all the topics bellow.'));
        Page::insert($sec);
    }

    private function _whatToLearn() {
        $sec = $this->createSection('I want to learn about:',3);
        $ul = new UnorderedList();
        $sec->addChild($ul);
        $ul->addChild($this->createLinkListItem('learn/topics/introduction', 'Introduction.'));
        $ul->addChild($this->createLinkListItem('learn/topics/routing', 'Routing.'));
        $ul->addChild($this->createLinkListItem('learn/topics/themes', 'Creating themes.'));
        $ul->addChild($this->createLinkListItem('learn/topics/file-upload', 'Uploading Files.'));
        $ul->addChild($this->createLinkListItem('learn/topics/mailing', 'Sending Email Messages.'));
        $ul->addChild($this->createLinkListItem('learn/topics/cli', 'Command Line Interface.'));
        $ul->addChild($this->createLinkListItem('learn/topics/jobs-scheduling', 'Task Scheduler.'));
//        $ul->addChild($this->createLinkListItem('learn/topics/privileges', 'Privileges System.'));
//        $ul->addChild($this->createLinkListItem('learn/topics/web-services', 'Web Services (APIs).'));
//        $ul->addChild($this->createLinkListItem('learn/topics/database', 'Database Access.'));
        Page::insert($sec);
    }
}
new Index();
