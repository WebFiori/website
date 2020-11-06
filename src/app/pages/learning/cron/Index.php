<?php
namespace webfiori\views\learn\cron;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;

class Index extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Introduction to Job Scheduling',
            'description' => 'An introduction to jobs scheduling using WebFiori '
            . 'framework.', 
            'active-aside' => 1
        ]);
        Page::insert($this->createParagraph('One of the features of the framework is the ability to '
                . 'schedule PHP code to run at specific time in the background. '
                . 'For example, it is possible to make your web application send reports at '
                . 'specific time using email or any comunication way. The framework give the developers all '
                . 'needed tools to schedule background tasks in a very simple way.'));
        Page::insert($this->createParagraph('After completing the next set of '
                . 'lessons, you will understand how task scheduling works and you will be '
                . 'able to schedule your own background tasks.'));
        $sec2 = $this->createSection('Topics Covered:');
        Page::insert($sec2);
        $ul = new UnorderedList();
        $sec2->addChild($ul);
        $ul->addListItems([
            '<a href="learn/topics/jobs-scheduling/main-classes" >Main Classes</a>',
            '<a href="learn/topics/jobs-scheduling/job-as-closure" >Scheduling Jobs as Closure</a>',
            '<a href="learn/topics/jobs-scheduling/job-implementation" >Using The Class "AbstractJob"</a>',
            '<a href="learn/topics/jobs-scheduling/executing-jobs" >Executing Jobs</a>',
            '<a href="learn/topics/jobs-scheduling/args" >Using Arguments With Jobs</a>',
            '<a href="learn/topics/jobs-scheduling/questions-and-answers" >Questions and Answers</a>'
            ],false);
        $this->setNextTopicLink('learn/topics/jobs-scheduling/main-classes', 'Main Classes');
        $this->displayView();
    }

}
return __NAMESPACE__;