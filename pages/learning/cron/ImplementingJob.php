<?php
namespace webfiori\views\learn\cron;

class ImplementingJob extends CronLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Using the Class \'AbstractJob\'',
            'description' => 'Learn how to use the class AbstractJob for '
            . 'implementing a custom background job.', 
            'active-aside' => 4
        ]);
        $this->displayView();
    }
}
return __NAMESPACE__;
