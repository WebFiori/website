<?php
namespace webfiori\views\learn\mailing;

/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends MailingLearnView{
    public function __construct() {
        parent::__construct([
            'title'=>'Introduction to Sending Emails',
            'active-aside'=>1,
            'description'=>'One of the important features of any web application '
            . 'is the ability to send email messages. WebFiori Framework '
            . 'has all needed tools to allow the system be able to send '
            . 'HTML emails.'
        ]);
        $this->setNextTopicLink('learn/topics/mailing/classes', 'Required Classes');
        $this->displayView();
    }
}
return __NAMESPACE__;
