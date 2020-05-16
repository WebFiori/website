<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;

class CliSetup extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Setup',
            'description' => '',
            'active-aside' => 2
        ]);
        Page::insert($this->createParagraph(''
                . 'Depending on the operating system that will be in use, the '
                . 'run way may differ. But there is one thing which is common. '
                . 'The first thing is that we must know where PHP interpeter is installed. '
                . 'After that, we run it as follows:'
                . ''));
        $code = new CodeSnippet();
        $code->setTitle('Terminal');
        $code->addCodeLine('PATH_TO_PHP webfiori');
        Page::insert($code);
        Page::insert($this->createParagraph('We will look at how to run it on Windows OS and '
                . 'Linux (Ubuntu).'));
        $linSec = $this->createSection('Windows');
        Page::insert($linSec);
        $winSec = $this->createSection('Windows');
        Page::insert($winSec);
        $this->setPrevTopicLink('learn/cli', 'Introduction');
        $this->displayView();
    }
}
return __NAMESPACE__;