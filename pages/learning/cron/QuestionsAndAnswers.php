<?php
namespace webfiori\views\learn\cron;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;

class QuestionsAndAnswers extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Questions and Answers About Jobs Scheduling',
            'description' => 'Most common answers about job scheduling '
            . 'and the answer to each question.', 
            'active-aside' => 8
        ]);
        $this->setPrevTopicLink('learn/topics/jobs-scheduling/sending-notifications', 'Email Notifications');
        Page::insert($this->createParagraph('Here you will find a list of common '
                . 'questions about routing and the answer to each one.'));
        $questionsArr = [];
        $questionsArr[] = $this->createQuestionBox(
                'What is is a CRON job?', 
                'A cron job is simply a task that will ususlly get executed in the background '
                . 'that performs a specific task in a specific time. For example, you might have a task that generates a set of reports '
                . 'and then send them through email at specific time in the day or week.');
        $questionsArr[] = $this->createQuestionBox('How to schedule a cron job?', ''
                . 'There are two ways to schedule cron jobs using WebFiori framework. The first one is to '
                . 'schedule them as closure and the second one is to use the class '
                . '<a href="docs/webfiori/entity/cron/AbstractJob" target="_blank">AbstractJob</a>. For more information '
                . 'about how to schedule jobs as closure, <a href="learn/topics/jobs-scheduling/job-as-closure" >check here</a>. '
                . 'For more information about how to schedule jobs using the class <code>AbstractJob</code>, '
                . '<a href="learn/topics/jobs-scheduling/job-implementation" >check here</a>');
        $questionsArr[] = $this->createQuestionBox('Is it possible to force execution of a job?', ''
                . 'Yes it is. There are two ways to do it. One way is to force execution '
                . 'using command line intreface and the second way is to use cron web interface which can '
                . 'be activated by defining the constant <code>CRON_THROUGH_HTTP</code> and setting its value to '
                . '<code>true</code> inside the class <a href="docs/webfiori/ini/GlobalConstants">GlobalConstants</a>. To learn more about this topic, '
                . '<a href="learn/topics/jobs-scheduling/executing-jobs">check here</a>.'
                . '');
        $questionsArr[] = $this->createQuestionBox('What are job arguments?', ''
                . 'Job arguments are variables which can be set when the job is forced to execute. '
                . 'They can be used to customize the output of the job based on the given arguments values. '
                . 'The values of the arguments can be set in command line interface and '
                . 'also in cron web interface.'
                . '');
        $questionsArr[] = $this->createQuestionBox('Is it posible to get notifications about execution status '
                . 'of a job?', ''
                . 'It is possible to do that using the class <a href="docs/webfiori/entity/cron/CronEmail">CronEmail</a>. To learn '
                . 'more about how to use it, <a href="learn/topics/jobs-scheduling/sending-notifications">click here</a>.'
                . '');
        $questionsArr[] = $this->createQuestionBox('How to add extra entries to the log file which comes with the notification email?', ''
                . 'Simply use the method <a href="docs/webfiori/entity/cron/Cron#log">Cron::log()</a>. It is possible to use '
                . 'it any where in your code.'
                . '');
        $questionsUl = new UnorderedList();
        Page::insert($questionsUl);
        $qNum = 0;
        foreach ($questionsArr as $questionBox){
            $questionBox->setID('question-'.$qNum);
            $questionTitleNode = $questionBox->getChildrenByTag('h4')->get(0);
            $questionsUl->addListItem($this->createLinkListItem(Page::canonical().'#'.$questionBox->getID(), $questionTitleNode->getChild(0)->getText()));
            Page::insert($questionBox);
            $qNum++;
        }
        $this->displayView();
    }
}
return __NAMESPACE__;
