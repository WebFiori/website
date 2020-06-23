<?php
namespace webfiori\views\learn\webServices;

use webfiori\entity\Page;
use webfiori\views\learn\LearnView;

class WebAPIsLearnView extends LearnView{
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
                'link'=>'learn/topics/web-services/intro'
            ],
            [
                'label'=>'Main Classes',
                'link'=>'learn/topics/web-services/main-classes'
            ],
            [
                'label'=>'Creating a Simple Web Service',
                'link'=>'learn/topics/web-services/create-web-service'
            ],
            [
                'label'=>'Using Authorization',
                'link'=>'learn/topics/web-services/authorization'
            ],
            [
                'label'=>'Dealing With Multiple Web Services',
                'link'=>'learn/topics/web-services/multiple-services'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
