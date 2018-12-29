<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views;
use webfiori\entity\Page;
use webfiori\views\WebFioriPage;
use phpStructs\html\HTMLNode;
use phpStructs\html\PNode;
use \phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
/**
 * Description of WebFioriHome
 *
 * @author Ibrahim
 */
class WebFioriHome extends WebFioriPage{
    public function __construct() {
        parent::__construct();
        Page::title('WebFiori Home');
        Page::siteName('WebFiori');
        Page::description('WebFiori Framework. Built to make the web blooming.');
        $parag1 = new PNode();
        
        $parag1->addText('Do you want to build a website with customizable user interface? ');
        $parag1->addLineBreak();
        $parag1->addText('Do you want to build a complicated web application with session '
                . 'management and database access? ');
        $parag1->addText('Do you want to build web APIs for your mobile app? ');
        $parag1->addLineBreak();
        $parag1->addText('If this is the case, then <em>WebFiori Framework</em> is your choice.');
        Page::insert($parag1);
        $this->createSec1();
        Page::render();
    }
    
    private function createSec1(){
        $sec = new HTMLNode('section');
        $hNode = new HTMLNode('h1');
        $hNode->addTextNode('What is WebFiori Framework?');
        $sec->addChild($hNode);
        $parag1 = new PNode();
        $parag1->addText(''
                . 'WebFiori Framework is new web framework which is built using '
                . 'PHP language. The framework is fully object oriented (OOP). '
                . 'It allows the use of the famous model-view-controller (MVC) model '
                . 'but it does not '
                . 'force it. The framework comes with many features which can '
                . 'help in making your website or web application up and running '
                . 'in no time. Some of the key features are:'
                . '');
        $sec->addChild($parag1);
        $ul = new UnorderedList();
        $feature1 = new ListItem(TRUE);
        $feature1->setText('Theming and the ability to create multiple UIs for the same web page using any CSS or JavaScript framework.');
        $ul->addChild($feature1);
        $feature2 = new ListItem(TRUE);
        $feature2->setText('Support for routing that makes the ability of creating search '
                . 'engine friendly links an easy task.');
        $ul->addChild($feature2);
        $feature3 = new ListItem(TRUE);
        $feature3->setText('Creation of web APIs that supports JSON, data filtering and '
                . 'validation.');
        $ul->addChild($feature3);
        $feature4 = new ListItem(TRUE);
        $feature4->setText('Support for MySQL schema and query building.');
        $ul->addChild($feature4);
        $feature5 = new ListItem(TRUE);
        $feature5->setText('Lightweight. The total size of framework core files is '
                . 'less than 3 megabytes.');
        $ul->addChild($feature5);
        $feature6 = new ListItem(TRUE);
        $feature6->setText('Access management by assigning system user a set '
                . 'of privileges.');
        $ul->addChild($feature6);
        $feature7 = new ListItem(TRUE);
        $feature7->setText('The ability to create and manage multiple '
                . 'sessions at once.');
        $ul->addChild($feature7);
        $feature8 = new ListItem(TRUE);
        $feature8->setText('Support for sending emails in a simple way by using SMTP '
                . 'protocol.');
        $ul->addChild($feature8);
        $feature9 = new ListItem(TRUE);
        $feature9->setText('Autoloading of user defined classes.');
        $ul->addChild($feature9);
        $feature10 = new ListItem(TRUE);
        $feature10->setText('The ability to create atomatic tasks and let them '
                . 'run in specific time using CRON.');
        $ul->addChild($feature10);
        $feature11 = new ListItem(TRUE);
        $feature11->setText('Support for logging system events.');
        $ul->addChild($feature11);
        $feature12 = new ListItem(TRUE);
        $feature12->setText('Well-defined file upload and file handling sub-system.');
        $ul->addChild($feature12);
        $feature13 = new ListItem(TRUE);
        $feature13->setText('Building web page\'s DOM using PHP language.');
        $ul->addChild($feature13);
        $sec->addChild($ul);
        Page::insert($sec);
    }
}
new WebFioriHome();
