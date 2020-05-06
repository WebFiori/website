<?php

namespace webfiori\views\learn\cron;

class JobAsClosure extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Scheduling Job as a Closure',
            'description' => 'The fastes way to schedule a job is to schedule '
            . 'it as a closure. Learn how to do it here.', 
            'active-aside' => 3
        ]);
        $this->displayView();
    }
}
return __NAMESPACE__;
