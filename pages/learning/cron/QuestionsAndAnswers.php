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
                . '<a href="learn/topics/jobs-scheduling/job-implementation" >check here</a>'
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
