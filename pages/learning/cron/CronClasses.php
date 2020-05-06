<?php

namespace webfiori\views\learn\cron;

class CronClasses extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Main Classes',
            'description' => 'The main classes that makes it possible to schedule '
            . 'and execute background jobs.', 
            'active-aside' => 2
        ]);
        $this->displayView();
    }
}
return __NAMESPACE__;
