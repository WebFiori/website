<?php

namespace webfiori\views\learn\cron;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;

class CronClasses extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Main Classes',
            'description' => 'The main classes that makes it possible to schedule '
            . 'and execute background jobs.', 
            'active-aside' => 2
        ]);
        Page::insert($this->createParagraph('The sub-system which is responsible for scheduling '
                . 'jobs consist of 3 main classes. In order to schedule jobs, we need to use them. '
                . 'The classes are:'));
        $list = new UnorderedList([
            'The class <a href="docs/webfiori/entity/cron/AbstractJob">AbstractJob</a>.',
            'The class <a href="docs/webfiori/entity/cron/CronJob">CronJob</a>.',
            'The class <a href="docs/webfiori/entity/cron/Cron">Cron</a>.',
            'The class <a href="docs/webfiori/ini/InitCron">InitCron</a>.'
        ], false);
        Page::insert($list);
        Page::insert($this->createParagraph('There are other classes that makes the system for '
                . 'scheduling jobs works but they are mainly utility class. In order to schhedule a job, mostly '
                . 'we have to work with the 3 given classes.'));
        $sec1 = $this->createSection('The Class "AbstractJob"');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph('This class has all needed methods for created a custom job. The '
                . 'developer can extend this class and implement the abstract methods to create the job. The class '
                . 'has 4 abstract methods which can be implemented:'));
        $jobMethodsList = new UnorderedList([
            '<a href="docs/webfiori/entity/cron/AbstractJob#execute" target="_blank">AbstractJob::execute()</a>',
            '<a href="docs/webfiori/entity/cron/AbstractJob#afterExec" target="_blank">AbstractJob::afterExec()</a>',
            '<a href="docs/webfiori/entity/cron/AbstractJob#onFail" target="_blank">AbstractJob::onFail()</a>',
            '<a href="docs/webfiori/entity/cron/AbstractJob#onSuccess" target="_blank">AbstractJob::onSuccess()</a>'
        ], false);
        $sec1->addChild($jobMethodsList);
        $sec2 = $this->createSection('The Class "CronJob"');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph('This class provides basic implementation for the class '
                . '<code>AbstractJob</code>. The developer can create an instance of this class and schedule it directly.'));
        
        $sec3 = $this->createSection('The Class "Cron"');
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph('This class is the controller for jobs scheduling system. '
                . 'This class performs many operations including jobs management, executing jobs, trigger job execution and so on.'));
        
        $sec4 = $this->createSection('The Class "InitCron"');
        Page::insert($sec4);
        $sec4->addChild($this->createParagraph('This class is one of the framework initialization '
                . 'classes. The class is used to initialize the scheduled jobs. '
                . 'The developer can use it to create an instance of his job and schedule it there. The class has one '
                . 'ststic method which is <a href="docs/webfiori/ini/InitCron#init">InitCron::init()</a>. The developer can '
                . 'modify the body of the method as he needs.'));
        $this->setPrevTopicLink('learn/topics/jobs-scheduling', 'Introduction');
        $this->setNextTopicLink('learn/topics/jobs-scheduling/job-as-closure', 'Scheduling Jobs as Closure');
        $this->displayView();
    }
}
return __NAMESPACE__;
