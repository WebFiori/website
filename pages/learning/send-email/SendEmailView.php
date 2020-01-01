<?php
namespace webfiori\views\learn\mailing;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;
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
        Page::insert($this->createParagraph(''
                . 'In order to send an email, first we must have SMTP account that '
                . 'can connect to SMTP server. Once we have that, the following '
                . 'steps must be performed in order to send an email message:'
                . ''));
        $ul00 = new UnorderedList();
        $ul00->addListItems([
            'Store SMTP connection information.',
            'Initialize your message using the method <a href="docs/webfiori/mail/EmailMessage#createInstance" target="_blank">EmailMessage::createInstance()</a>.',
            'Specify the subject of the message.',
            'Specify the people who will get the message (Original copy, CC or BCC).',
            'Add content to the message body and add attachments (if any).',
            'Send the message by ccalling the method <a href="docs/webfiori/mail/EmailMessage#send" target="_blank">EmailMessage::send()</a>'
        ], false);
        Page::insert($ul00);
        Page::insert($this->createParagraph('The first step is usually performed once. After storing connection '
                . 'information, the connection can be used multiple times for sending different messages.'));
        $sec00 = $this->createSection('Storing SMTP Connection', 4, 'storeSmtpConn');
        Page::insert($sec00);
        $sec00->addChild($this->createParagraph(''
                . 'As we have said before, the class <a href="docs/webfiori/conf/MailConfig">MailConfig</a> is used to '
                . 'store SMTP accounts. There are two ways to add new SMTP account. It is possible to '
                . 'open the file which has the class code and add the connection manually, or we can '
                . 'add the connection programmatically using the class <a href="docs/webfiori/logic/MailController">MailController</a>.'
                . ''));
        $sec01 = $this->createSection('Creating and Sending The message', 4, 'storeSmtpConn');
        Page::insert($sec01);
        $this->setNextTopicLink('learn/topics/mailing/attachments', 'Adding Attachments');
        $this->setPrevTopicLink('learn/topics/mailing/classes', 'Required Classes');
        $this->displayView();
    }
}
return __NAMESPACE__;