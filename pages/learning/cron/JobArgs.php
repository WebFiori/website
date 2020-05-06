<?php
namespace webfiori\views\learn\cron;


class JobArgs extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Using Arguments With Jobs',
            'description' => 'How to add custom execution arguments to a '
            . 'job and how to use them.', 
            'active-aside' => 6
        ]);
        $this->displayView();
    }
}
return __NAMESPACE__;