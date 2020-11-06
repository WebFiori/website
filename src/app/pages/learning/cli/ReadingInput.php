<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;

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
        $sec1->addChild($this->createParagraph('The following code snippit shows how to get user input using the method '
                . '<code>CLICommand::getInput()</code>.'));
        $code1 = new CodeSnippet();
        $code1->getCodeElement()->setClassName('language-php');
        $code1->setTitle('PHP');
        $code1->setCode("\$userInput = \$this->getInput('Give me your name:');\n"
                . "\$this->println(\"Your name is: \$userInput\");");
        $sec1->addChild($code1);
        $sec1->addChild($this->createParagraph('The following code snippit shows how to use default values with prompt. In this case, '
                . 'the default value will be "Orange".'));
        $code2 = new CodeSnippet();
        $code2->getCodeElement()->setClassName('language-php');
        $code2->setTitle('PHP');
        $code2->setCode("\$userInput = \$this->getInput('Enter a fruit name:', 'Orange');\n"
                . "\$this->println(\"Fruit name: \$userInput\");");
        $sec1->addChild($code2);
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
        $sec2->addChild($this->createParagraph('To submit the answer, the user have to type <code>n</code> for "no" or '
                . '<code>y</code> for "yes" in the console and hit "Enter". Note that if the user submitted any other answer, the '
                . 'method will keep asking till he submit one of the two answers.'));
        $sec2->addChild($this->createParagraph('The following code sample shows how to use the method <code>CLICommand::confirm()</code>.'));
        $code3 = new CodeSnippet();
        $code3->getCodeElement()->setClassName('language-php');
        $code3->setTitle('PHP');
        $code3->setCode("if (\$this->confirm('Are you sure that you would like to continue?')) {\n"
                . "    \$this->success('Will continue.');\n"
                . "} else {\n"
                . "    \$this->warning('Will stop here.');\n"
                . "}\n");
        $sec2->addChild($code3);
        $sec2->addChild($this->createParagraph('The following image shows the output of the command when executed.'));
        $sec2->addChild($this->createImag('assets/images/cli00.png', 'Terminal Output'));
        Page::insert($sec2);
        $sec3 = $this->createSection('Multiple Choice Question');
        $sec3->addChild($this->createParagraph('Amultiple choice input is a way to make the user select one '
                . 'of more than one choice. The method <a href="docs/webfiori/entity/cli/CLICommand#select" target="_blank">CLICommand::select()</a> '
                . 'is used to show the question and the possible choices. The method accepts 3 parameters. The first one is '
                . 'the text that will be shown to the user. The second one is the array that contains the '
                . 'choices at which the user will select from. The last parameter is an optional '
                . 'default value to use in case the user hit "Enter" without selecting any choice. Note that '
                . 'the array must be indexed and the default value must be part of the choices.'));
        $sec3->addChild($this->createParagraph('The user can select an answer by supplying its number as '
                . 'an input or the full text of the choice.'));
        $sec3->addChild($this->createParagraph('The following code sample shows how to use the method <code>CLICommand::select()</code>.'));
        $code4 = new CodeSnippet();
        $code4->getCodeElement()->setClassName('language-php');
        $code4->setTitle('PHP');
        $code4->setCode(""
                . "\$choices = [\n"
                . "    'PHP',\n"
                . "    'JavaScript',\n"
                . "    'C++','HTML',\n"
                . "    'C#'\n"
                . "];\n"
                . "\$answer = \$this->select('Which of the following is not a programming language?', \$choices);\n\n"
                . "if (\$answer == 'HTML') {\n"
                . "    \$this->success('Correct Answer');\n"
                . "} else {\n"
                . "    \$this->error('Wrong answer.');\n"
                . "}");
        $sec3->addChild($code4);
        $sec3->addChild($this->createParagraph('The following image shows the output of the command when executed.'));
        $sec3->addChild($this->createImag('assets/images/cli01.png', 'Terminal Output'));
        Page::insert($sec3);
        $this->setPrevTopicLink('learn/topics/cli/using-args', 'Using Command Line Arguments');
        $this->setNextTopicLink('learn/topics/cli/formatting-output', 'Formatting Output');
        $this->displayView();
    }
}
return __NAMESPACE__;