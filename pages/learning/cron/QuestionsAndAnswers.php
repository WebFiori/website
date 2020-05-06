<?php
namespace webfiori\views\learn\cron;

class QuestionsAndAnswers extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Questions and Answers About Jobs Scheduling',
            'description' => 'Most common answers about job scheduling '
            . 'and the answer to each question.', 
            'active-aside' => 7
        ]);
        $this->displayView();
    }
}
return __NAMESPACE__;
