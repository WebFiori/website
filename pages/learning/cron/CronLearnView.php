<?php
namespace webfiori\views\learn\cron;

use webfiori\entity\Page;
use webfiori\views\learn\LearnView;

class CronLearnView extends LearnView {
    public function __construct($x = array()) {
        parent::__construct($x);
    }
    public function createAsidNav() {
        $aside = Page::document()->getChildByID('side-content-area');
        $linksArr = [
            [
                'label'=>'Back to Index',
                'link'=>'learn'
            ],
            [
                'label'=>'Introduction',
                'link'=>'learn/topics/jobs-scheduling'
            ],
            [
                'label'=>'Main Classes',
                'link'=>'learn/topics/jobs-scheduling/main-classes'
            ],
            [
                'label'=>'Scheduling Job as a Closure',
                'link'=>'learn/topics/jobs-scheduling/job-as-closure'
            ],
            [
                'label'=>'Using the Class \'AbstractJob\'',
                'link'=>'learn/topics/jobs-scheduling/job-implementation'
            ],
            [
                'label'=>'Jobs Execution',
                'link'=>'learn/topics/jobs-scheduling/executing-jobs'
            ],
            [
                'label'=>'Using Arguments With Jobs',
                'link'=>'learn/topics/jobs-scheduling/args'
            ],
            [
                'label'=>'Questions & Answers',
                'link'=>'learn/topics/jobs-scheduling/questions-and-answers'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
