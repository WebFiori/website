<?php

namespace webfiori\views\learn\cli;
use webfiori\entity\Page;

class QuestionsAndAnswers extends CLILearnView {
    public function __construct() {
        parent::__construct([
            'title' =>'Questions and Answers About Command Line Interface',
            'description' => 'Here you will find a list of some of the common '
                . 'questions about command line applications support and the answer to each one.',
            'active-aside' => 9
        ]);
        Page::insert($this->createParagraph('Here you will find a list of some of the common '
                . 'questions about command line applications support and the answer to each one.'));
        $question1 = $this->createQuestionBox('What do you mean by command line application?', ''
                . 'A command line application is a program that can be executed using terminal '
                . 'applications such as <code>bash</code>, <code>cmd</code> or <code>cygwin</code>.'
                . '');
        Page::insert($question1);
        Page::insert($this->createQuestionBox('How to create a new command?', ''
                . 'Creating new command involves two steps. First, create new PHP class that extends the class '
                . '<a href="docs/webfiori/entity/cli/CLICommand" target="_blank">CLICommand</a> in the folder '
                . '"entity/cli" or the folder that contains your project files. Once extended, give your command a name and '
                . 'define its arguments (if any). Secondly, implement the '
                . 'abstract method <a href="docs/webfiori/entity/cli/CLICommand#exec" target="_blank">CLICommand::exec()</a>. '
                . 'Finally, register your command using the method <a href="docs/webfiori/entity/cli/CLI#register" target="_blank">CLI::register()</a>. '
                . 'It is possible to create new instance of the command inside the method '
                . '<a href="docs/webfiori/ini/InitCliCommands#init" target="_blank">InitCliCommands::init()</a>.'
                . ''));
        Page::insert($this->createQuestionBox('What is the meaning of command argument?', 'An '
                . 'argument is simply extra information that a command might need to operate correctly. '
                . 'For example, a command might need to read a file from the hard drive and process it. An argument in '
                . 'this case can be file path. You can find more information about command line '
                . 'arguments <a href="learn/topics/cli/using-args">here</a>'));
        Page::insert($this->createQuestionBox('How to add arguments to a command?', ''
                . 'There are 3 ways:'
                . '<ul>'
                . '<li>Add them using the constructor of the class <a href="docs/webfiori/entity/cli/CLICommand" target="_blank">CLICommand</a>.</li>'
                . '<li>Add them using the method <a href="docs/webfiori/entity/cli/CLICommand#addArgs" target="_blank">CLICommand::addArgs()</a>.</li>'
                . '<li>Add them using the method <a href="docs/webfiori/entity/cli/CLICommand#addArg" target="_blank">CLICommand::addArg()</a>.</li>'
                . '</ul>'
                . 'The first two methods can be used to add multiple arguments at once. The last one is used to add one argument at a time.'
                . ''));
        Page::insert($this->createQuestionBox('How to display output to the terminal?', ''
                . 'To disply output, it is possible to use one of two methods in the class <code>CLICommand</code>:'
                . '<ul>'
                . '<li><a href="docs/webfiori/entity/cli/CLICommand#print" target="_blank">CLICommand::print()</a></li>'
                . '<li><a href="docs/webfiori/entity/cli/CLICommand#println" target="_blank">CLICommand::println()</a></li>'
                . '</ul>'
                . 'The framework will always send the output directly to <code>STDOUT</code>.'
                . 'To learn more about output, <a href="learn/topics/cli/formatting-output">click here</a>'
                . ''
                . ''));
        Page::insert($this->createQuestionBox('How to read user input?', ''
                . 'To simply read anything from the trminal, use the method <a href="docs/webfiori/entity/cli/CLICommand#print" '
                . 'target="_blank">CLICommand::read()</a>. The method will read user input from <code>STDIN</code> and return it '
                . 'as string. '
                . 'In addition to that method, there are other methods that can be used for specific use cases. '
                . '<a href="learn/topics/cli/user-input">Click here</a> to learn more about user input.'
                . ''));
        $this->setPrevTopicLink('learn/topics/cli/commands-reference', 'Commands Reference');
        $this->displayView();
    }
}
return __NAMESPACE__;
