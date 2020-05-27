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
        Page::insert($this->createParagraph('One of the things that programmers like are the '
                . 'colors which appear in any terminal. In addition to making the output looks '
                . 'nice, colors can be used as an indicator for warnings or errors during '
                . 'execution. The framework supports output formatting usning colors if the method '
                . '<a href="docs/webfiori/entity/cli/CLICommand#println" target="_blank">CLICommand::println()</a> '
                . 'or the method <a href="docs/webfiori/entity/cli/CLICommand#print" target="_blank">CLICommand::print()</a>. In '
                . 'addition to that, it is possible to format a string using ANSI escape sequences using the '
                . 'static method <a href="docs/webfiori/entity/cli/CLICommand#formatOutput" target="_blank">CLICommand::formatOutput()</a>.'));
        $this->setPrevTopicLink('learn/topics/cli/user-input', 'User Input');
        $this->setNextTopicLink('learn/topics/cli/commands-reference', 'Commands Reference');
        $this->displayView();
    }
}
return __NAMESPACE__;