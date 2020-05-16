<?php

namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;

class IntroView extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Introduction to CLI',
            'description' => 'One of the features of the framework is the ability '
            . 'to use it throgh command line interface (CLI). Here you will get '
            . 'a chance to learn about how to use it throgh CLI and build your '
            . 'own CLI apps.',
            'active-aside' => 1
        ]);
        
        Page::insert($this->createParagraph(''
                . 'One of the features of the framework is the ability to run it '
                . 'as a command line application using terminals. This can be usefull '
                . 'if the server that the application is deployed in have SSH access. '
                . 'The command line interface of the framework has a limit functionality '
                . 'but the developer can extend it by creating custom commands.'
                . ''));
        Page::insert($this->createParagraph(''
                . 'After completing the next set of tutorials, the developer should '
                . 'be able to use the framework using CLI. Also, he should be '
                . 'able to create his own custom commands and run them.'
                . ''));
        $sec2 = $this->createSection('Topics Covered:');
        
        $ul = new UnorderedList();
        $sec2->addChild($ul);
        $ul->addListItems([
            '<a href="learn/topics/cli/setup" >Setup.</a>'
            ],false);
        $this->setNextTopicLink('learn/topics/cli/how-it-works', 'How Routing System Works');
        Page::insert($sec2);
        $this->displayView();
    }
}
return __NAMESPACE__;
