<?php
namespace webfiori\views\learn\mailing;
use webfiori\views\learn\LearnView;
use webfiori\entity\Page;
/**
 * Description of MailingLearnView
 *
 * @author Ibrahim
 */
class MailingLearnView extends LearnView{
    /**
     * 
     * @param type $x
     */
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
                'link'=>'learn/topics/mailing'
            ],
            [
                'label'=>'Required Classes',
                'link'=>'learn/topics/mailing/classes'
            ],
            [
                'label'=>'Sending an Email',
                'link'=>'learn/topics/mailing/send-first-email'
            ],
            [
                'label'=>'Adding Attachments',
                'link'=>'learn/topics/mailing/attachments'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }
}