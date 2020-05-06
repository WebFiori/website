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
            'active-aside'=>1
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
        $ul->addListItems([
            '<b>OOP:</b> Built from scratch to be object-oriented.',
            '<b>Routing:</b> Create friendly URLs.',
            '<b>Theming:</b> Create nice-looking and custom UIs.',
            '<b>Mailing:</b> Sending email messages using SMTP.',
            '<b>Web APIs (Services):</b> Create web APIs for your mobile or web application.',
            '<b>Database Access:</b> Support for MySQL database.',
            '<b>Sessions Management:</b> Manage multiple sessions at once.',
            '<b>Autolading:</b> Ability to load user-defined classes and composer packages.',
            '<b>User Access Management:</b> A sub-system to manage user privileges.',
            '<b>Background Job Processing:</b> Run PHP commands at specific time in the background.',
            '<b>Create CLI Command:</b> Extend the functionality of your app by implementing command line '
            . 'interface commands.'
        ], false);
        $this->setNextTopicLink('learn/topics/architecture', 'Framework Architecture');
        $this->displayView();
    }
}
new Index();
