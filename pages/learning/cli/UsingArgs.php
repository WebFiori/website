<?php

namespace webfiori\views\learn\cli;

use webfiori\views\learn\cli\CLILearnView;

class UsingArgs extends CLILearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Using Command Line Arguments',
            'description' => 'Learn how to add support for command line arguments in '
            . 'your command.',
            'active-aside' => 5
        ]);
        $this->setPrevTopicLink('learn/topics/cli/implementing-custom-commands', 'Implementing Basic Command');
        $this->displayView();
    }
}
return __NAMESPACE__;
