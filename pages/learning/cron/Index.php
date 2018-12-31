<?php
namespace webfiori\views\learn\cron;
use webfiori\views\learn\LearnView;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends LearnView{
    public function __construct() {
        parent::__construct('Cron Jobs','Learn about how to setup '
                . 'cron jobs using WebFiori Framework.');
        $this->display();
    }
}
new Index();