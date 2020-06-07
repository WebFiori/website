<?php
namespace webfiori\views\learn\cron;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;

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
                . 'to execute. The trigger can be a forced trigger or automatic trigger. In general, jobs can be '
                . 'executed using 3 ways:'));
        $waysList = new UnorderedList([
            'CRON entry in the server.',
            'Forced to exexute using CRON control panel through HTTP.',
            'Forceed to execute using command line interface.'
        ]);
        Page::insert($waysList);
        $sec1 = $this->createSection('CRON Entry');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph('The recomended way is to add a '
                . 'CRON entry on your server which looks like this one:'));
        $sec1->addTextNode('<code>* * * * * php webfiori cron p="pass" --check</code>', false);
        $sec1->addChild($this->createParagraph('This will execute the command <code>cron</code> of the '
                . 'framework with the option <code>--check</code> every minute. It will simply '
                . 'check all scheduled jobs and to check if it is time to execute them. Note '
                . 'that the path to PHP interpreter and the framework my differ. Because of this, '
                . 'the format of the entry may differ.'));
        $sec1->addChild($this->createParagraph('If the server is runnig on windows, it '
                . 'is possible to use "Task Scheduler" to achieve the same result.'));
        $this->setNextTopicLink('learn/topics/jobs-scheduling/job-implementation', 'Using The Class AbstractJob');
        $this->displayView();
    }
}
return __NAMESPACE__;
