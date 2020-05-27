<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;

class FormattingOutput extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Formatting Output',
            'description' => 'Learn how to format the output in the consoles that '
            . 'supports ANSI encoding.',
            'active-aside' => 7
        ]);
        
        $this->setPrevTopicLink('learn/topics/cli/user-input', 'User Input');
        $this->setNextTopicLink('learn/topics/cli/commands-reference', 'Commands Reference');
        $this->displayView();
    }
}
return __NAMESPACE__;