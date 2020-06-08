<?php
namespace webfiori\views\learn\cron;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;

class ExecutingJobs extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Jobs Execution',
            'description' => 'Learn the ways which can be used to execute '
            . 'a background job.', 
            'active-aside' => 5
        ]);
        Page::insert($this->createParagraph('When a job is scheduled, it will not get executed by it self even '
                . 'if it is time to run it. A job can be only get executed if there was a trigger that caused it '
                . 'to execute. The trigger can be a forced trigger or automatic trigger.'));
        $sec1 = $this->createSection('Using CRON Entry to Trigger Execution');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph('The recomended way is to add a '
                . 'CRON entry on your server which looks like this one:'));
        $sec1->addTextNode('<code>* * * * * php webfiori cron p="pass" --check</code>', false);
        $sec1->addChild($this->createParagraph('This will execute the command <code>cron</code> of the '
                . 'framework with the option <code>--check</code> every minute. The option <code>pass</code> '
                . 'must be included if a password is set to protect jobs from unauthorized execution. It will simply '
                . 'check all scheduled jobs and to check if it is time to execute them. Note '
                . 'that the path to PHP interpreter and the framework my differ. Because of this, '
                . 'the format of the entry may differ.'));
        $sec1->addChild($this->createParagraph('If the server is runnig on windows, it '
                . 'is possible to use "Task Scheduler" to achieve the same result.'));
        $sec2 = $this->createSection('Using Command Line Interface to Trigger Execution');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph('Another way to trigger jobs execution is to '
                . 'use command line interface (or terminal) to run the command <code>cron</code>. If '
                . 'the server supports SSH access, it is possible to '
                . 'run the following command to trigger execution:'));
        $code1 = new CodeSnippet('Terminal', "php webfiori cron p=\"pass\" --check");
        $sec2->addChild($code1);
        $sec2->addChild($this->createParagraph('Executing jobs through terminal can be usefull if the developer '
                . 'would like to inspect the output of jobs or would like to check what causes a job to fail.'));
        $sec3 = $this->createSection('Forcing a Job to Execute');
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph('One of the features of the framework is the ability to force a '
                . 'scheduled job to execute even if it is not the time to run it. A job can be forced to run '
                . 'using one of two methods:'));
        $list = new UnorderedList([
            'Cron control panel.',
            'Command line interface.'
        ]);
        $sec3->addChild($list);
        $subSec1  = $this->createSection('Force a Job to Execute Using Cron Control Panel', 4);
        $subSec1->addChild($this->createParagraph('If the constant <code>CRON_THROUGH_HTTP</code> is defined and is set to '
                . '<code>true</code>, it will be possible to access cron control panel and use it to force '
                . 'a job to execute. The control panel can be accessed using any web browser by navigating to the '
                . 'URL <code>https://yoursite.com/cron</code>. If a password is set to protect the jobs, it will open a '
                . 'login page.'));
        $subSec1->addChild($this->createImag('assets/images/cron00.png', 'CRON login page.'));
        $subSec1->addChild($this->createParagraph('If logged in, a table with all scheduled jobs will appear. In addition, '
                . 'an area that contains something like a terminal will appear. It is used to show execution status of a job. '
                . 'In order to force a job, simply click on the button with the title "Force Execution". The following image shows '
                . 'how the page looks like whith one job.'));
        $subSec1->addChild($this->createImag('assets/images/cron01.png', 'Cron control panel.'));
        $sec3->addChild($subSec1);
        $subSec2  = $this->createSection('Force a Job to Execute Using Command Line Interface', 4);
        $sec3->addChild($subSec2);
        $subSec2->addChild($this->createParagraph('Forcing a job to execute thorugh terminal is useful in case of debugging. '
                . 'The terminal can be used to show the full output of executing a job. To force execution of a specific job, simply '
                . 'we have to run the following command:'));
        $subSec2->addTextNode('<code>php webfiori cron p="pass" --force</code>', false);
        $subSec2->addChild($this->createParagraph('Once this command is executed, the terminal will ask the user '
                . 'to select one of the scheduled jobs to force. The following image shows the full terminal output when using '
                . 'this way to force a job.'));
        $subSec2->addChild($this->createImag('assets/images/cron02.png', 'Cron force terminal output.'));
        
        $this->setPrevTopicLink('learn/topics/jobs-scheduling/job-implementation', 'Using The Class AbstractJob');
        $this->setNextTopicLink('learn/jobs-scheduling/args', 'Using Arguments With Forced Jobs');
        $this->displayView();
    }
}
return __NAMESPACE__;
