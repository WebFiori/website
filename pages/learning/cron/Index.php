<?php
namespace webfiori\views\learn\cron;
use webfiori\views\learn\LearnView;

class Index extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Introduction to Job Scheduling',
            'description' => 'An introduction to jobs scheduling using WebFiori '
            . 'framework.', 
            'active-aside' => 1
        ]);
        $this->displayView();
    }

}
return __NAMESPACE__;