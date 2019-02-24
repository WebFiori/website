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
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use webfiori\WebFiori;
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
        $this->createSec4();
        $this->createSec2();
        $this->createSec3();
        Page::render();
    }
    public function createSec4() {
        $sec = new HTMLNode('section');
        $hNode = new HTMLNode('h1');
        $hNode->addTextNode('Downloading The Framework');
        $sec->addChild($hNode);
        $parag1 = new PNode();
        $parag1->addText('Please go to <a href="'.WebFiori::getSiteConfig()->getBaseURL().'download">downloads page</a> to check the available '
                . 'download options.');
        $sec->addChild($parag1);
        Page::insert($sec);
    }
    public function createSec2(){
        $sec = new HTMLNode('section');
        $hNode = new HTMLNode('h1');
        $hNode->addTextNode('Is it free to use it?');
        $sec->addChild($hNode);
        $parag1 = new PNode();
        $parag1->addText('Yes for sure. You can use it for free of charge. In '
                . 'addition, it is open source. This means you can modify the '
                . 'source code of the framework the way you like as long as you '
                . 'follow MIT license regarding open source software modifications.');
        $sec->addChild($parag1);
        Page::insert($sec);
    }
    public function createSec3(){
        $sec = new HTMLNode('section');
        $hNode = new HTMLNode('h1');
        $hNode->addTextNode('Why did you build such framework since there are many '
                . 'good ones already out there?');
        $sec->addChild($hNode);
        $parag1 = new PNode();
        $parag1->addText('One of the reasons is <b>simplicity</b>. '
                . 'Some of the available frameworks makes it difficult for you '
                . 'to develop your website or web application by overwhelming you '
                . 'with many features which you don\'t actually need. WebFiori Framework '
                . 'gives you the simplest set of tools that you would need to setup a '
                . 'website, web application or web APIs.');
        $sec->addChild($parag1);
        $parag2 = new PNode();
        $parag2->addText('Another reason is the <b>ease of use</b>. '
                . 'Many of the available frameworks aren\'t easy to master in '
                . 'short time. While developing the framework, one of the things that '
                . 'we put in mind is how to help developers learn how to use the '
                . 'framework in no time. If you want to create static web pages (HTML only), then '
                . 'you only need to learn about routing. You might need to learn '
                . 'more if you want to use PHP features for your web pages. '
                . 'If you want to create a nice looking pages, You need to learn '
                . 'about the basics of theming in the framework. If you want to '
                . 'develop web APIs, Then you need to learn about routing plus creating '
                . 'API classes.');
        $sec->addChild($parag2);
        $parag3 = new PNode();
        $parag3->addText('The final reason is <b>learning</b>. While building '
                . 'the framework, I (The developer of the framework) learned many '
                . 'new concepts which I did not know about while I was student '
                . 'at university. Building new something from scratch was a good '
                . 'chance to learn new things and to put my skills into something that can help me and others.');
        $sec->addChild($parag3);
        Page::insert($sec);
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
        $ul->addListItem('Theming and the ability to create multiple UIs for the same web page using any CSS or JavaScript framework.');
        $ul->addListItem('Support for routing that makes the ability of creating search-'
                . 'engine-friendly links an easy task.');
        $ul->addListItem('Creation of web APIs that supports JSON, data filtering and '
                . 'validation.');
        $ul->addListItem('Basic support for MySQL schema and query building.');
        $ul->addListItem('Lightweight. The total size of framework core files is '
                . 'less than 3 megabytes.');
        $ul->addListItem('Access management by assigning system user a set '
                . 'of privileges.');
        $ul->addListItem('The ability to create and manage multiple '
                . 'sessions at once.');
        $ul->addListItem('Support for creating and sending nice-looking emails in a simple way by using SMTP '
                . 'protocol.');
        $ul->addListItem('Autoloading of user defined classes.');
        $ul->addListItem('The ability to create automatic tasks and let them '
                . 'run in specific time using CRON.');
        $ul->addListItem('Support for logging of system events.');
        $ul->addListItem('Well-defined file upload and file handling sub-system.');
        $ul->addListItem('Building and manipulating the DOM of a web page using PHP language.');
        $sec->addChild($ul);
        Page::insert($sec);
    }
}
new WebFioriHome();
