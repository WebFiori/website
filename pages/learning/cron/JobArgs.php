<?php
namespace webfiori\views\learn\cron;

use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;

class JobArgs extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Using Arguments With Forced Jobs',
            'description' => 'When a job is forced to execute, it is possible to '
            . 'supply extra arguments to it to customize the execution process.'
            . ' Learn How to add custom execution arguments to a '
            . 'job and how to use them here.', 
            'active-aside' => 6
        ]);
        Page::insert($this->createParagraph('One of the things that a developer might '
                . 'want from a job to do is when it is forced to execute is to behave in a diffrent '
                . 'way based on some inputs given by the one who will execute it. One of the features that the '
                . 'framework provides is the ability to add custom execution arguments to a job. The arguments can '
                . 'be sent to the job when it is firced to execute throgh the control panel of the jobs or throgh '
                . 'command line interface.'));
        $sec1 = $this->createSection('Adding Arguments');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph('Job arguments are associated with an instance of the '
                . 'class <code>AbstractJob</code>. In order to add arguments to a job, simply use the method '
                . '<a href="docs/webfiori/entity/cron/AbstractJob#addExecutionArg" target="_blank">AbstractJob::addExecutionArg()</a>. Also, '
                . 'it is possible to add multiple arguments at once using the method '
                . '<a href="docs/webfiori/entity/cron/AbstractJob#addExecutionArgs" target="_blank">AbstractJob::addExecutionArgs()</a>. Ususlly, '
                . 'arguments are added to the job when initialized (in the constructor). But it is possible to add them after the '
                . 'job has been scheduled.'));
        $sec1->addChild($this->createParagraph('The following code sample shows how to add arguments to job.'));
        $code1 = new CodeSnippet('PHP', "<?php
namespace webfiori\\entity\cron;

use webfiori\\entity\cron\AbstractJob;
use webfiori\\entity\cron\Cron;

class GenerateAttendanceReportJob extends AbstractJob {
    public function __construct() {
        parent::__construct('
        ');
        
        //Generate attendance report once the new month start.
        \$this->everyMonthOn(1, '00:00');
        
        // Add two arguments
        \$this->addExecutionArgs([
            'start-date',
            'end-date',
        ]);
    }
    public function afterExec() {
        //TODO:
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
        $code1->getCodeElement()->setClassName('lang-php');
        $sec1->addChild($code1);
        $sec2 = $this->createSection('Sending Arguments Throgh CRON Control Panel');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph('If the ability to execute cron jobs through HTTP is enabled, it will '
                . 'be possible to access cron control panel to force execution of a job. The access to the control panel '
                . 'can be enabled by defining the constant <code>CRON_THROUGH_HTTP</code> and setting its value to <code>true</code>. '
                . 'Assuming that the server has the URL "https://example.com", the cron control panel can be '
                . 'accessed throgh "https://example.com/cron".'));
        $sec2->addChild($this->createParagraph('To supply arguments to '
                . 'a job when forceing it to execute, simply navigate to the page that shows job information by clicking '
                . 'on its name in the page that lists all scheduled jobs. In the lower side of the page, '
                . 'there will be a table at which the user can see the names of the argumens. The next image shows '
                . 'the whole page that shows the details of the job.'));
        $sec2->addChild($this->createImag('assets/images/cron03.png', 'Cron control panel.'));
        $sec3 = $this->createSection('Sending Arguments Throgh Terminal');
        $sec3->addChild($this->createParagraph('Another way to force jobs to execute is to use '
                . 'command line interface. The command <code>cron</code> is used to force the execution of a job. '
                . 'To force a job, simply supply the argument "<code>--force</code>"'));
        $sec3->addChild($this->createParagraph('The following terminal output image shows how to force the '
                . 'job that was created using the code at the start of this page. Notice that if the job '
                . 'has extra arguments, it asks to supply them.'));
        $sec3->addChild($this->createImag('assets/images/cron04.png', 'Cron output.'));
        Page::insert($sec3);
        $this->setPrevTopicLink('learn/topics/jobs-scheduling/executing-jobs', 'Executing Jobs');
        $this->setNextTopicLink('learn/topics/jobs-scheduling/sending-notifications', 'Sending Execution Notifications');
        $this->displayView();
    }
}
return __NAMESPACE__;