<?php

namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
class CustomCommand extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Impleminting Custom CLI Command',
            'description' => 'Learn how to create a custom command line '
            . 'interface command using WebFiori Framework.',
            'active-aside' => 4
        ]);
        Page::insert($this->createParagraph(''
                . 'One of the greate features of the framework is that it allows '
                . 'the developers to extend the functionality which is provided '
                . 'by CLI engine of the framework by creating their own custom '
                . 'commands.'
                . ''));
        Page::insert($this->createParagraph(''
                . 'Creating new command is very simple. It involves the following '
                . 'steps:'
                . ''));
        $this->setPrevTopicLink('learn/topics/cli/running-commands', 'Running Commands');
        $this->displayView();
    }
}
return __NAMESPACE__;
