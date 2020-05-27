<?php

namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;

class CustomCommand extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Impleminting Basic CLI Command',
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
                . 'What we will be doing here is to implement a very basic '
                . 'command. Creating new one is very simple. It involves the following '
                . 'steps:'
                . ''));
        $steps = new UnorderedList([
            'Creating new PHP class that extends the class '
            . '<a href="docs/webfiori/entity/cli/CLICommand" target="_blank">CLICommand</a> and '
            . 'implementing the abstract method <a href="webfiori/entity/cli/CLICommand#exec">CLICommand::exec()</a>.',
            'Register the command using the method <a href="docs/webfiori/entity/cli/CLI#register" target="_blank">CLI::register()</a>.'
        ], false);
        Page::insert($steps);
        $sec1 = $this->createSection('Extending The Class "CLICommand"',4);
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph('The first step in creating new command is to '
                . 'create new PHP class and make the class a child of the class '
                . '<a href="docs/webfiori/entity/cli/CLICommand" target="_blank">CLICommand</a>. If '
                . 'we checked the '
                . '<a href="docs/webfiori/entity/cli/CLICommand#__construct" target="_blank">constructor</a> '
                . 'of the class, it takes 3 parameters. The first one is the name of the command, the second '
                . 'one is an array of arguments and the last one is a description of the '
                . 'command.'));
        $sec1->addChild($this->createParagraph('The name of the command is a string which '
                . 'will be used to execute it later. The arguments is an array that contains '
                . 'sub associative arrays of arguments that the command needs. The description '
                . 'of the command is a string that will be shown when the command <code>help</code> '
                . 'is executed.'));
        $sec1->addChild($this->createParagraph('Suppose that we would like to '
                . 'implement a command that takes the name from the terminal as an '
                . 'input and display the string "Hi <YOUR_NAME>". Let\'s assume that the '
                . 'name of the command is <code>say-hi</code>. The following '
                . 'code snippit shows how this command is created.'));
        $code1 = new CodeSnippet();
        $code1->setTitle('PHP Code');
        $code1->setCode("<?php

namespace webfiori\entity\cli;

use webfiori\entity\cli\CLICommand;

class SayHiCommand extends CLICommand {
    
    public function __construct() {
        parent::__construct('say-hi', [], 'Takes a name as input and say \"Hi\".');
    }
    
    public function exec() {
        \$name = \$this->getInput('Give me your name:');
        \$this->println(\"Hi \$name\");
        return 0;
    }

}");
        $sec1->addChild($code1);
        $sec1->addChild($this->createParagraph('Before we continue, let\'s explain what we did. '
                . 'The method <a href="docs/webfiori/entity/cli/CLICommand#getInput" target="_blank">CLICommand::getInput()</a> '
                . 'is used to read user input from <code>STDIN</code>. The method accepts 3 parameters but for now, we will '
                . 'only use the first one. The first parameter of the method is simply a prompt text that will be shown to the '
                . 'user. The text is used to specify what we would like to get from the user.'));
        $sec1->addChild($this->createParagraph('The method '
                . '<a href="docs/webfiori/entity/cli/CLICommand#getInput" target="_blank">CLICommand::println()</a> '
                . 'is used to show output. It will send it directly to <code>STDOUT</code>.'));
        
        $sec2 = $this->createSection('Registering the command',4);
        Page::insert($sec2);
        
        $sec2->addChild($this->createParagraph('Now that we have our command is ready, all '
                . 'what we have to to is to register it. In order to register any custom-created '
                . 'command, the class <a target="_blank" href="docs/webfiori/ini/InitCliCommands">InitCliCommands</a> can be used '
                . 'to complete the task. '
                . 'The following code shows how to register new command'));
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP Code');
        $code2->setCode("namespace webfiori\ini;

use webfiori\entity\cli\CLI;

//first, import the command.
use webfiori\\entity\\cli\\SayHiCommand;

class InitCliCommands {

    public static function init() {
        //After importing, register it.
        CLI::register(new SayHiCommand());
    }
}");
        $sec2->addChild($code2);
        
        $sec3 = $this->createSection('Running The Command',4);
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph('When the command <code>help</code> is executed, the newly created '
                . 'command will appear at the end of supported commands list as follows:'));
        $code3 = new CodeSnippet();
        $sec3->addChild($code3);
        $code3->setTitle('Terminal');
        $code3->setCode("    say-hi
        Takes a name as input and say \"Hi\".");
        $sec3->addChild($this->createParagraph('When the command is executed, the output in '
                . 'the terminal will be similar to the one shown in next snippit.'));
        $code4 = new CodeSnippet();
        $sec3->addChild($code4);
        $code4->setTitle('Terminal');
        $code4->setCode("$ php webfiori say-hi
Give me your name:
Ibrahim BinAlshikh
Hi Ibrahim BinAlshikh
");
        $this->setPrevTopicLink('learn/topics/cli/running-commands', 'Running Commands');
        $this->setNextTopicLink('learn/topics/cli/using-args', 'Using Arguments');
        $this->displayView();
    }
}
return __NAMESPACE__;
