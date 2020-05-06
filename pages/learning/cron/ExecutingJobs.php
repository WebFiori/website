<?php
namespace webfiori\views\learn\cron;

class ExecutingJobs extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Jobs Execution',
            'description' => 'Learn the ways which can be used to execute '
            . 'a background job.', 
            'active-aside' => 5
        ]);
        $this->displayView();
    }
}
return __NAMESPACE__;
