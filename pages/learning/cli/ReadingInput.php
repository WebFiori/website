<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;

class ReadingInput extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Reading User Input',
            'description' => 'Any CLI command at some point, will need to '
            . 'have an inputs from the user. Here, we will learn how to read user '
            . 'input using the pre-made read modes.',
            'active-aside' => 6
        ]);
        Page::insert($this->createParagraph('We have seen in the last lesson how to '
                . 'get user input from the terminal using the method '
                . '<a href="docs/webfiori/entity/cli/CLICommand#getInput" target="_blank">CLICommand::getInput()</a>. '
                . 'The framework provides the developers with some of the commonly used helper inputs like '
                . 'asking a question. We will take a look at the available '
                . 'options.'));
        $sec1 = $this->createSection('Prompt');
        $sec1->addChild($this->createParagraph('Prompt is simply to ask the user to enter anything using '
                . 'the method <a href="docs/webfiori/entity/cli/CLICommand#getInput" target="_blank">CLICommand::getInput()</a>. '
                . 'The method accepts 3 parameters. The first one is the text that will be shown to the '
                . 'user. The second one is a default value which will be used when the user hit '
                . '"Enter" without typing anything. The last one is a closure which can be used '
                . 'to validate user input.'));
        Page::insert($sec1);
        $sec2 = $this->createSection('Confirm');
        $sec2->addChild($this->createParagraph(''
                . 'The method <a href="docs/webfiori/entity/cli/CLICommand#confirm" target="_blank">CLICommand::confirm()</a> '
                . 'is used to ask the user question which can have two answers only, yes or no. '
                . 'The method have two parameters. The first one is the text that will be shown in the console and the '
                . 'second is a boolean that represents default value if the user hit "Enter" without '
                . 'specifying an answer. The method will return true if the answer was "yes" and false if the '
                . 'answer is "no".'
                . ''));
        $sec2->addChild($this->createParagraph('To submit the answer, the user have to type <code>n<code> for "no" or '
                . '<code>y</code> for "yes" in the console and hit "Enter".'));
        Page::insert($sec2);
        $sec3 = $this->createSection('Multiple Choice Question');
        $sec3->addChild($this->createParagraph(''));
        Page::insert($sec3);
        $this->displayView();
    }
}
return __NAMESPACE__;