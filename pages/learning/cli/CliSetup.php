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
        Page::insert($this->createParagraph('Let\'s assume that '
                . 'PHP interpeter is installed on Linux. '
                . 'If the framework is downloaded and all standard '
                . 'libraries of the framework are also included, the following output would be '
                . 'seen when running the command <code>php webfiori</code>:'));
        $output = new CodeSnippet();
        $output->setTitle('Terminal');
        $output->getCodeElement()->setClassName('language-shell');
        $output->setCode("$ php webfiori                                                                                                                       
|\                /|                          
| \      /\      / |              |  / \  |
\  \    /  \    /  / __________   |\/   \/|
 \  \  /    \  /  / /  /______ /  | \/ \/ |
  \  \/  /\  \/  / /  /           |  \ /  |
   \    /  \    / /  /______      |\  |  /|
    \  /    \  / /  /______ /       \ | /  
     \/  /\  \/ /  /                  |    
      \ /  \ / /  /                   |    
       ______ /__/                    |    
WebFiori Framework (c) Version 1.1.0 CR-5

Usage:
    command [arg1 arg2=\"val\" arg3...]

Available Commands:
    help
        Display CLI Help. To display help for specific command, use the argument \"--command-name\" with this command.
    v
        Display framework version info.
    show-config
        Display framework configuration.
    list-themes
        List all registered themes.
    list-jobs
        List all scheduled CRON jobs.
    list-routes
        List all created routes and which resource they point to.
    cron
               Run CRON Scheduler
    route
        Test the result of routing to a URL");
        Page::insert($output);
        
        Page::insert($this->createParagraph("Once this output appears, it means everything is "
                . "ready to use the framework in CLI environment."));
        $this->setPrevTopicLink('learn/topics/cli', 'Introduction');
        $this->setNextTopicLink('learn/topics/cli/running-commands', 'Running Commands');
        $this->displayView();
    }
}
return __NAMESPACE__;