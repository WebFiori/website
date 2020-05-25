<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;

class RunningCommands extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Running Commands',
            'description' => 'Learn how to run CLI command in WebFiori Framework.',
            'active-aside' => 3
        ]);
        Page::insert($this->createParagraph(''
                . 'We have seen how to run command line '
                . 'interface of the framework in the last lesson. In order to run '
                . 'a command, we have to understand the structure of each command.'));
        Page::insert($this->createParagraph(''
                . 'The overall format of any command in the framework is this: '
                . '<code>command-name [arg1 arg2="something" arg3...]</code>. '
                . 'This format means that every command in the framework '
                . 'consist of the following parts:'));
        $commandStructUl = new UnorderedList([
            'Command name (the <code>command-name</code>). ',
            'Zero or more arguments (the <code>[arg1 arg2="something" arg3...]</code>).'
        ], false);
        Page::insert($commandStructUl);
        Page::insert($this->createParagraph(''
                . 'The name of the command is usually something like <code>help</code> or '
                . '<code>h</code>. The arguments usually come after the name of the '
                . 'command. Some commands does not have arguments and some do. '
                . 'In addition, a command can have optional arguments and '
                . 'mandatory ones.'));
        Page::insert($this->createParagraph(''
                . 'One of the commands that the framework supports is the '
                . 'command <code>help</code>. When we run it without any '
                . 'arguments, we would see the following output:'));
        $code1 = new CodeSnippet();
        $code1->setTitle('Terminal');
        $code1->setCode("$ php webfiori help                                                                                                           
Usage:
    command [arg1 arg2=\"val\" arg3...]

Available Commands:
    help
        Display CLI Help. To display help for specific command, use the argument \"command-name\" with this command.
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
        Test the result of routing to a URL
");
        Page::insert($code1);
        Page::insert($this->createParagraph(''
                . 'From the help, we can notice that the <code>--help</code> supports '
                . 'one argument and the name of the argument is <code>command-name</code>. '
                . 'This argument is used to show help for a specific command. '
                . 'For example, if we want to show the help for the command '
                . '<code>--cron</code>, we can do it as follows:'
                . ''));
        $code2 = new CodeSnippet();
        $code2->setTitle('Terminal');
        $code2->setCode("$ php webfiori help --command-name=cron                
    cron
               Run CRON Scheduler
    Supported Arguments:
                            p:  CRON password.
                        check: [Optional] Run a check aginst all jobs to check if it is time to execute them or not.
                        force: [Optional] Force a specific job to execute.
                     job-name: [Optional] The name of the job that will be forced to execute.
                show-job-args: [Optional] If this one is provided with job name and a job has custom execution args, they will be shown.
                     show-log: [Optional] If set, execution log will be shown after execution is completed.");
        Page::insert($code2);
        $this->setPrevTopicLink('learn/topics/cli/setup', 'Setup');
        $this->setNextTopicLink('learn/topics/cli/implementing-custom-commands', 'Impleminting Custom CLI Command');
        $this->displayView();
    }
}
return __NAMESPACE__;