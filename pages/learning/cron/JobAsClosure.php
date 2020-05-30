<?php

namespace webfiori\views\learn\cron;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;

class JobAsClosure extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Scheduling Job as a Closure',
            'description' => 'The fastes way to schedule a job is to schedule '
            . 'it as a closure. Learn how to do it here.', 
            'active-aside' => 3
        ]);
        Page::insert($this->createParagraph('A job can be created using one of two ways:'));
        $waysList = new UnorderedList([
            'As a closure.',
            'Extending the class <a href="docs/webfiori/entity/cron/AbstractJob">AbstractJob</a>.'
        ], false);
        Page::insert($waysList);
        Page::insert($this->createParagraph('The easiest and simplest way is to schedule a job as a closure. To schedule a job as a closure, we '
                . 'have to use the class <a href="docs/webfiori/entity/cron/Cron" target="_blank">Cron</a>. The class '
                . 'has many pre-made methods which can be used to schedule jobs as closures in diffrent tomes. These methods include '
                . 'the following ones:'));
        $cronMethodsList = new UnorderedList([
            '<a href="docs/webfiori/entity/cron/Cron#createJob" target="_blank">Cron::createJob()</a>: Schedule a job using specific cron expression.',
            '<a href="docs/webfiori/entity/cron/Cron#dailyJob" target="_blank">Cron::dailyJob()</a>: Schedule a job to run every day at specific time.',
            '<a href="docs/webfiori/entity/cron/Cron#monthlyJob" target="_blank">Cron::monthlyJob()</a>: Schedule a job to run once every month in a specific day and time.',
            '<a href="docs/webfiori/entity/cron/Cron#weeklyJob" target="_blank">Cron::weeklyJob()</a>: Schedule a job to run once every week in a specific day and time.',
        ], false);
        Page::insert($this->createParagraph('The following code sample shows how to use each one of the methods to schedule jobs.'));
        $code1 = new CodeSnippet('PHP', "namespace webfiori\ini;

use webfiori\entity\cron\Cron;

class InitCron {
    /**
     * A method that can be used to initialize cron jobs.
     * The developer can use this method to create cron jobs.
     * @since 1.0
     */
    public static function init() {

        Cron::createJob('*/10 * * * *', 'Every Minute', function () {
            echo \"Will execute every 10 minutes\";
        });
        
        Cron::dailyJob(\"13:00\", \"Test Job\", function () {
            echo \"Will execute every day at 1:00 PM\";
        });
        
        Cron::weeklyJob('sun-15:30', 'Another Job', function () {
            echo \"Will execute every sunday at 3:30 PM\";
        });
        
        Cron::monthlyJob(1, '00:00', 'First Day Of Month', function () {
            echo \"Will execute at first day of every month at 12:00 AM\";
        });
    }
}");
        $code1->getCodeElement()->setClassName('language-php');
        Page::insert($code1);
        Page::insert($cronMethodsList);
        $this->setPrevTopicLink('learn/topics/jobs-scheduling/main-classes', 'Main Classes');
        $this->setNextTopicLink('learn/topics/jobs-scheduling/job-implementation', 'Using The Class "AbstractJob"');
        $this->displayView();
    }
}
return __NAMESPACE__;
