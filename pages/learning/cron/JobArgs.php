<?php
namespace webfiori\views\learn\cron;

use webfiori\entity\Page;

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
        $sec2 = $this->createSection('Sending Arguments Throgh CRON Control Panel');
        Page::insert($sec2);
        $sec3 = $this->createSection('Sending Arguments Throgh Terminal');
        Page::insert($sec3);
        $this->setPrevTopicLink('learn/topics/jobs-scheduling/executing-jobs', 'Executing Jobs');
        $this->setNextTopicLink('learn/topics/jobs-scheduling/sending-notifications', 'Sending Execution Notifications');
        $this->displayView();
    }
}
return __NAMESPACE__;