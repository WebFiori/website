<?php
namespace webfiori\views\learn\cron;
use webfiori\entity\Page;
use webfiori\entity\cron\CronEmail;
use phpStructs\html\CodeSnippet;

class SendCronNotifications extends CronLearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Sending CRON Notifications',
            'description' => 'One of the things that the framework supports is the '
            . 'ability to send notifications about jobs execution status. Here, you '
            . 'will learn how to send cron output using email.',
            'active-aside' => 7
        ]);
        Page::insert($this->createParagraph('One of the things that the framework supports is the '
            . 'ability to send email notifications about jobs execution status. The notifications are useful and can '
                . 'be used to follow up with jobs execution and can be used to diagnose the cause of failure '
                . 'of a job when it fails.'));
        Page::insert($this->createParagraph('Note that to use mailing service of the framework, SMTP account must '
                . 'be setup. To learn more about sending emails and how to do the setup, '
                . '<a href="learn/topics/mailing/send-email" target="_blank">click here</a>'));
        $sec = $this->createSection('The Class CronEmail');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('In order to send email notifications, the class '
                . '<a href="docs/webfiori/entity/cron/CronEmail" target="_blank">CronEmail</a> must be used. '
                . 'This class can be used to send an email regarding the status of background job execution (failed or success). '
                . 'This class must be only used in one of the abstract methods of a background job since using it while no job is active will have no effect. '
                . 'It is recommended to create an instance of this class in the body of the method '
                . '<a href="docs/webfiori/entity/cron/AbstractJob#afterExec" target="_blank">AbstractJob::afterExec()</a>'));
        $sec2 = $this->createSection('Usage Example');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph('The following code sample shows how to use the class to send '
                . 'notifications to one email address. It assumes that there exist SMTP account which '
                . 'has the name "notifications" and it will be used to send the notifications.'));
        
        $code = new CodeSnippet('PHP', "<?php
namespace webfiori\entity\cron;

use webfiori\entity\cron\AbstractJob;
use webfiori\entity\cron\Cron;
use webfiori\entity\cron\CronEmail;

class GenerateAttendaceReportJob extends AbstractJob {
    public function __construct() {
        parent::__construct('Generate Attendance Report');
        
        //Generate attendance report once the new month start.
        \$this->everyMonthOn(1, '00:00');
        
        // Add two arguments
        \$this->addExecutionArgs([
            'start-date',
            'end-date',
        ]);
    }
    public function afterExec() {
        //Send email that shows the status of job execution
        new CronEmail('notifications', [
            'ibinshikh@outlook.com' => 'Ibrahim' 
        ]);
    }

    public function execute() {
        //Access argument value.
        \$startDate = \$this->getArgValue('start-date');
        if (\$startDate === null) {
            Cron::log('Start date is missing. Using default value.');
            //TODO: Set a default start date which should be the start of prev month
            \$startDate = '2020-06-01';
        }
        
        \$endDate = \$this->getArgValue('end-date');
        if (\$endDate === null) {
            Cron::log('End date is missing. Using default value.');
            //TODO: Set a default start date which should be the start of prev month
            \$endDate = '2020-06-30';
        }
        Cron::log('Start date = \"'.\$startDate.'\"');
        Cron::log('End date = \"'.\$endDate.'\"');
        //TODO: Generate the report.
    }

    public function onFail() {
        //TODO: Notify using email that an error stopped the job.
    }

    public function onSuccess() {
        //TODO: Store generated reports and send them using email.
    }

}
");
        $sec2->addChild($code);
        $code->getCodeElement()->setClassName('lang-php');
        $sec2->addChild($this->createParagraph('Assuming that the job finish without any errors, the following emmail will be '
                . 'sent.'));
        $sec2->addChild($this->createImag('assets/images/cron05.png', 'Cron output email.'));
        $sec2->addChild($this->createParagraph('If the job failed due to any error, the following message would be sent.'));
        $sec2->addChild($this->createImag('assets/images/cron06.png', 'Cron output email.'));
        $this->setNextTopicLink('learn/topics/jobs-scheduling/questions-and-answers', 'Questions and Answers');
        $this->setPrevTopicLink('learn/topics/jobs-scheduling/args', 'Using Arguments With Forced Jobs');
        $this->displayView();
    }
}
return __NAMESPACE__;