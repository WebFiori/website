<?php
namespace webfiori\views\learn\cron;

use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;

class ImplementingJob extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Using the Class \'AbstractJob\'',
            'description' => 'Learn how to use the class AbstractJob for '
            . 'implementing a custom background job.', 
            'active-aside' => 4
        ]);
        Page::insert($this->createParagraph('If the job that will be scheduled is simple, it is recomended '
                . 'to schedule it as closure. But if the job is complex, it is recomended to implement it as a '
                . 'class to make it easier when managing it. In order to implement a job as a '
                . 'class, the class <a href="docs/webfiori/entity/cron/AbstractJob" target="_blank">AbstractJob</a>.'));
        Page::insert($this->createParagraph('The class <code>AbstractJob</code> as all needed utilities to schedule a job at '
                . 'any time. The class has 4 abstract methods that must be implemented.  The methods are: '));
        $jobMethodsList = new UnorderedList([
            '<a href="docs/webfiori/entity/cron/AbstractJob#execute" target="_blank">AbstractJob::execute()</a>',
            '<a href="docs/webfiori/entity/cron/AbstractJob#onFail" target="_blank">AbstractJob::onFail()</a>',
            '<a href="docs/webfiori/entity/cron/AbstractJob#onSuccess" target="_blank">AbstractJob::onSuccess()</a>',
            '<a href="docs/webfiori/entity/cron/AbstractJob#afterExec" target="_blank">AbstractJob::afterExec()</a>',
        ], false);
        Page::insert($jobMethodsList);
        Page::insert($this->createParagraph('The first method will contain the actual job code that will be executed '
                . 'when it is time to run the job. The method must return a boolean value or null. If the job successfully '
                . 'executed, it must return <code>true</code> or <code>null</code>. If the job fails, the method must return '
                . '<code>false</code>.'));
        Page::insert($this->createParagraph('The method <a href="docs/webfiori/entity/cron/AbstractJob#onFail" target="_blank">AbstractJob::onFail()</a> '
                . 'can have a code that will be executed if the job has failed to complete successfully. For example, it can have a code '
                . 'that will notify system admins that a background job has failed. A job will be considered as a failed '
                . 'job in two cases. If the method <code>AbstractJob::execute()</code> return false or when it throws an exception.'));
        Page::insert($this->createParagraph('The method <a href="docs/webfiori/entity/cron/AbstractJob#onSuccess" target="_blank">AbstractJob::onSuccess()</a> can have a code '
                . 'that will be executed if the job finished without any issues. A job is considered as a success job when the method '
                . 'AbstractJob::execute() returns <code>true</code> or <code>null</code> (simply return nothing).'));
        Page::insert($this->createParagraph('The method <a href="docs/webfiori/entity/cron/AbstractJob#afterExec" target="_blank">AbstractJob::afterExec()</a> '
                . 'can have a code which will be executed after the job finished to execute. The code will get executed in both cases, success or fail.'));
        
        Page::insert($this->createParagraph('The developer can place the class that represents the '
                . 'job i any directory as long as it is in autoload directories. The following code '
                . 'shows a sample job that writes a text to a file.'));
        $code1 = new CodeSnippet('PHP', "<?php
          
namespace webfiori\entity\cron;

use webfiori\entity\cron\AbstractJob;
use webfiori\entity\File;

class WriteFileJob extends AbstractJob{
    public function __construct() {
        parent::__construct('Write File Job');
        //Execute job every 1 hour
        \$this->everyHour();
    }
    public function afterExec() {
        // A code that will get executed after job compleition.
    }

    public function execute() {
        // This is the code that will be get executed.
        \$file = new File('Background Job File.txt', ROOT_DIR);
        \$file->setRawData('The job \"'.\$this->getJobName().'\" was executed at '.date('H:i').\"\\n\");
        \$file->write();
    }

    public function onFail() {
        // A code that will get executed only when the job fails.
    }

    public function onSuccess() {
        // A code that will get executed only when the job successfully run.
    }

}
");
        $code1->getCodeElement()->setClassName('lang-php');
        Page::insert($code1);
        Page::insert($this->createParagraph('After implementing the job, it must be '
                . 'registered. The method <a href="docs/webfiori/cron/Cron#scheduleJob" target="_blank">Cron::scheduleJob()</a> '
                . 'In order to register jobs, the class <a href="docs/webfiori/ini/InitCron">InitCron</a>. '
                . 'The following code shows how it is done.'));
        $code2 = new CodeSnippet('PHP', "namespace webfiori\ini;

use webfiori\entity\cron\Cron;
use webfiori\entity\cron\WriteFileJob;

class InitCron {
    /**
     * A method that can be used to initialize cron jobs.
     * The developer can use this method to create cron jobs.
     * @since 1.0
     */
    public static function init() {

        Cron::scheduleJob(new WriteFileJob());
    }
}");
        $code2->setClassName('lang-php');
        Page::insert($code2);
        $this->setNextTopicLink('learn/topics/jobs-scheduling/executing-jobs', 'Jobs Execution');
        $this->setPrevTopicLink('learn/topics/jobs-scheduling/job-as-closure', 'Job as Closure');
        $this->displayView();
    }
}
return __NAMESPACE__;
