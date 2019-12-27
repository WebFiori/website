<?php
namespace webfiori\views\learn\mailing;
/**
 * Description of MailingClassesView
 *
 * @author Ibrahim
 */
class MailingClassesView extends MailingLearnView{
    public function __construct() {
        parent::__construct([
            'title'=>'Required Classes for Sending an Email',
            'active-aside'=>2,
            'description'=>''
        ]);
        $this->setNextTopicLink('learn/topics/mailing/send-email', 'Sending an Email');
        $this->setPrevTopicLink('learn/topics/mailing', 'Introduction');
        $this->displayView();
    }
}
return __NAMESPACE__;
