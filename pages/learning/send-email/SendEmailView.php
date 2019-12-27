<?php
namespace webfiori\views\learn\mailing;

/**
 * Description of SendEmailView
 *
 * @author Ibrahim
 */
class SendEmailView extends MailingLearnView{
    public function __construct() {
        parent::__construct([
            'title'=>'Sending an Email',
            'active-aside'=>3,
            'description'=>''
        ]);
        $this->setNextTopicLink('learn/topics/mailing/attachments', 'Adding Attachments');
        $this->setPrevTopicLink('learn/topics/mailing/classes', 'Required Classes');
        $this->displayView();
    }
}
return __NAMESPACE__;