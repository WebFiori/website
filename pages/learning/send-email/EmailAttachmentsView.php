<?php
namespace webfiori\views\learn\mailing;

/**
 * Description of EmailAttachmentsView
 *
 * @author Ibrahim
 */
class EmailAttachmentsView extends MailingLearnView{
    public function __construct() {
        parent::__construct([
            'title'=>'Adding Attachments to an Email',
            'active-aside'=>4,
            'description'=>''
        ]);
        $this->setPrevTopicLink('learn/topics/mailing/send-email', 'Sending an Email');
        $this->displayView();
    }
}
return __NAMESPACE__;
