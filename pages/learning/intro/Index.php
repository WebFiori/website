<?php
namespace webfiori\views\learn\intro;
use webfiori\views\WebFioriPage;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\HTMLNode;
use webfiori\WebFiori;
use WebFioriGUI;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends IntroLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Introduction to WebFiori Framework',
            'description'=>'An introduction lesson to the framework.',
            'active-aside'=>0
        ));
        $sec = $this->createSection('Introduction');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('When it comes to web development '
                . 'frameworks, there are many out there. One of '
                . 'them is WebFiori Framework. You might be asking your self '
                . 'now, what is this "WebFiori" framework thing?'));
        $sec->addChild($this->createParagraph('To put it in simple words, '
                . '<b>WebFiori Framework</b> is an object-oriented web development '
                . 'framework which is built in top of PHP scripting '
                . 'language. It can be used to build simple websites, '
                . 'complex web applications or web APIs.'));
        $sec2 = $this->createSection('Key Features:');
        $ul = new UnorderedList();
        $sec2->addChild($ul);
        Page::insert($sec2);
        $ul->addListItem('OOP: Built from scratch to be object-oriented.');
        $ul->addListItem('Routing: Create friendly URLs.');
        $ul->addListItem('Theming: Create nice-looking and custom UIs.');
        $ul->addListItem('Mailing: Sending email messages using SMTP.');
        $ul->addListItem('Web APIs: Create web APIs for your mobile or web application.');
        $ul->addListItem('Database Access: Support for MySQL database.');
        $ul->addListItem('Sessions Management: Manage multiple sessions at once.');
        $ul->addListItem('Autolading: Ability to load user-defined classes.');
        $ul->addListItem('User Access Management: A sub-system to manage user privileges.');
        $ul->addListItem('Tasks Schedualing: Run PHP commands at specific time using CRON.');
        $this->setNextTopicLink('learn/topics/architecture', 'Framework Architecture');
        $this->displayView();
    }
}
new Index();
