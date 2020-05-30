<?php

namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use webfiori\views\learn\cli\CLILearnView;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;

class UsingArgs extends CLILearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Using Command Line Arguments',
            'description' => 'Learn how to add support for command line arguments in '
            . 'your command.',
            'active-aside' => 5
        ]);
        Page::insert($this->createParagraph('Usually, a command can have some arguments '
                . 'which are passed to it when it is called. Some arguments can be optional and '
                . 'some are not. In addition to that, some arguments might work as an options. If '
                . 'added, they will make the command behave in different way.'));
        Page::insert($this->createParagraph('Adding arguments to a command can be achived in '
                . '3 ways: '));
        $ul = new UnorderedList([
            'Supply the arguments to the constructor of the class <a href="docs/webfiori/entity/cli/CLICommand#__construct" target="_blank">CLICommand</a>.',
            'Using the method <a href="docs/webfiori/entity/cli/CLICommand#addArgs" target="_blank">CLICommand::addArgs()</a>',
            'Using the method <a href="docs/webfiori/entity/cli/CLICommand#addArg" target="_blank">CLICommand::addArg()</a>'
        ], false);
        Page::insert($ul);
        Page::insert($this->createParagraph('What we will do is to use the constructor of '
                . 'the class to add arguments to the command which we created in last '
                . 'lessen. We will add two arguments, <code>--name</code> and <code>--email</code>. If the '
                . 'name is not provided, we will simply read it when the job starts to execute.'));
        $code1 = new CodeSnippet();
        $code1->getCodeElement()->setClassName('language-php');
        $code1->setTitle('PHP Code');
        $code1->setCode("<?php

namespace webfiori\entity\cli;

use webfiori\entity\cli\CLICommand;

class SayHiCommand extends CLICommand{
    
    public function __construct() {
        parent::__construct('say-hi', [
            '--name' => [
                'optional' => true
            ],
            '--email' => [
                'optional' => true
            ]
        ], 'Takes a name as input and say \"Hi\".');
    }
    
    public function exec() {
        \$name = \$this->getArgValue('--name');
        
        if (\$name === null) {
            \$name = \$this->getInput('Give me your name:');
        }
        \$email = \$this->getArgValue('--email');
        \$this->println(\"Hi \$name\");
        
        if (\$email === null) {
            \$this->warning('Email is not provided.');
        } else {
            \$this->println(\"Email address: \$email\");
        }
        return 0;
    }
}
");
        Page::insert($code1);
        Page::insert($this->createParagraph('Now that we have our command, we can run it. There are 3 '
                . 'possibilites, one is that we have everything as arguments, the second is we have only the '
                . '<code>--name</code> argument and the last is to have none.'));
        Page::insert($this->createParagraph('The next output will be shown when running the command with all '
                . 'arguments.'));
        $code2 = new CodeSnippet();
        $code2->setTitle('Terminal');
        $code2->setCode("$ php webfiori say-hi --name=\"Ibrahim\" --email=\"example@mydomain.com\"
Hi Ibrahim
Email address: example@mydomain.com
");
        Page::insert($code2);
        Page::insert($this->createParagraph('The next output will be shown when running the command with the argument '
                . '<code>--name</code> is set and the argument <code>--email</code> is missing.'));
        $code3 = new CodeSnippet();
        $code3->setTitle('Terminal');
        $code3->setCode("$ php webfiori say-hi --name=\"Ibrahim\"                                                                         
Hi Ibrahim
Warning: Email is not provided.");
        Page::insert($code3);
        Page::insert($this->createParagraph('You can notice the statement which was shown by the method '
                . '<a href="docs/webfiori/entity/cli/CLICommand#warning" target="_blank">CLICommand::warning()</a>. It '
                . 'is one of the methods which is used to format the output.'));
        Page::insert($this->createParagraph('The next output will be shown when running the command without providing '
                . 'any arguments.'));
        $code4 = new CodeSnippet();
        $code4->setTitle('Terminal');
        $code4->setCode("$ php webfiori say-hi                                                                                          
Give me your name:
Ibrahim Ali
Hi Ibrahim Ali
Warning: Email is not provided.
");
        Page::insert($code4);
        $this->setPrevTopicLink('learn/topics/cli/implementing-custom-commands', 'Implementing Basic Command');
        $this->setNextTopicLink('learn/topics/cli/user-input', 'Reading Input');
        $this->displayView();
    }
}
return __NAMESPACE__;
