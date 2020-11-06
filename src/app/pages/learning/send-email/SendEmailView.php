<?php
namespace webfiori\views\learn\mailing;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;
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
            'description'=>'Learn the basics of sending emails using WebFiori framework '
            . 'in PHP language.'
        ]);
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph(''
                . 'In order to send an email, first we must have SMTP account that '
                . 'can connect to SMTP server. Once we have that, the following '
                . 'steps must be performed in order to send an email message:'
                . ''));
        $ul00 = new UnorderedList();
        $ul00->addListItems([
            'Store SMTP connection information.',
            'Initialize your message using the method <a href="docs/webfiori/entity/mail/EmailMessage#createInstance" target="_blank">EmailMessage::createInstance()</a>.',
            'Specify the subject of the message.',
            'Specify the people who will get the message (Original copy, CC or BCC).',
            'Add content to the message body and add attachments (if any).',
            'Send the message by ccalling the method <a href="docs/webfiori/entity/mail/EmailMessage#send" target="_blank">EmailMessage::send()</a>'
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
                . 'add the connection programmatically using the class <a href="docs/webfiori/logic/EmailController">EmailController</a>. '
                . 'For the time being, we will use the manual way.'
                . ''));
        $sec00->addChild($this->createParagraph(''
                . 'Using the manual way, we add connection information by modifying '
                . 'the code in the constructor of the class "MailConfig". Lets assume that '
                . 'we have SMTP account that has the following info:'
                . ''));
        $ul01 = new UnorderedList();
        $ul01->addListItems([
            '<b>Server Address:</b> "mail.example.com".',
            '<b>Port:</b> "465".',
            '<b>Username:</b> "no-replay@example.com".',
            '<b>Password:</b> "123654".',
            '<b>Sender Name:</b> "System Notifier".',
            '<b>Sender Address:</b> "no-replay@example.com".'
        ],false);
        $sec00->addChild($ul01);
        $sec00->addChild($this->createParagraph(''
                . 'Using the given info, Connection information can be added maually as '
                . 'follows:'
                . ''));
        $code00 = new CodeSnippet();
        $sec00->addChild($code00);
        $code00->setTitle('PHP Code');
        $code00->getCodeElement()->setClassName('language-php');
        $code00->setCode(""
                . "//Inside the class MailConfig's constructor...\n"
                . "\$account00 = new SMTPAccount();\n"
                . "\$account00->setServerAddress('mail.example.com')\n"
                . "\$account00->setPort(465);\n"
                . "\$account00->setUsername('no-replay@example.com');\n"
                . "\$account00->setPassword('123654');\n"
                . "\n"
                . "//The next two can be set to any value.\n"
                . "//They are the name and sender address which appear in email clients.\n"
                . "\$account00->setName('System Notifier');\n"
                . "\$account00->setAddress('no-replay@example.com');\n"
                . "\n"
                . "//Finally, add the account.\n"
                . "//We must give our account a name in order to use it later.\n"
                . "\$this->addSMTPAccount('no-replay-smtp',\$account00);"
                . "");
        $sec00->addChild($this->createParagraph(''
                . 'Adding another SMTP account will be the same way. By using the manual way, '
                . 'we skip the check for correct connection info. If we used the '
                . 'class to add the account, it will check if the connection '
                . 'info are correct before adding it. The method '
                . '<a target="_blank" href="docs/webfiori/logic/EmailController#updateOrAddEmailAccount">EmailController::updateOrAddEmailAccount()</a> '
                . 'is used to add '
                . 'SMTP connection programmatically.'
                . ''));
        $sec01 = $this->createSection('Creating and Sending The Message', 4, 'storeSmtpConn');
        $sec01->addChild($this->createParagraph(''
                . 'Sending HTML email messages is performed using the class '
                . '<a target="_blank" href="docs/webfiori/entity/mail/EmailMessage">EmailMessage</a>. '
                . 'This class has only static methods which are used to set '
                . 'the attributes of an email message such as its subject, importance '
                . 'and the people who will get the message. This class is usually used '
                . 'in the following way:'
                . ''));
        $ul03 = new UnorderedList();
        $ul03->addListItems([
            'Specify SMTP connection to use.',
            'Set the subject of the message.',
            'Specify the people who will receive the message.',
            'Write the email message.',
            'Send the message.'
        ]);
        $sec01->addChild($this->createParagraph(''
                . 'There are other things which might be performed to the message '
                . 'before sending it. For example, we might specify the importance of '
                . 'the message or add attachments to it or add colorsand styles. But for now, we will look '
                . 'at the most basic use case. The following PHP code shows how to create '
                . 'and send a basic email message.'
                . ''));
        $code01 = new CodeSnippet();
        $code01->getCodeElement()->setClassName('language-php');
        $code01->setTitle('PHP Code');
        $sec01->addChild($code01);
        $code01->setCode(""
                . "//First thing to do, Specify SMTP account to use.\n"
                . "//In our example, the name was 'no-replay-smtp'.\n"
                . "EmailMessage::createInstance('no-replay-smtp');\n"
                . "EmailMessage::subject('This is a Test Email');\n"
                . "\n"
                . "//Adds a receiver. The method accepts a name and email address.\n"
                . "EmailMessage::addReceiver('Blog User','user@example.com')\n"
                . "\n"
                . "//Write some text to the body of the message.\n"
                . "EmailMessage::write('This is a welcome message.')\n"
                . "//Final step, is sending the message."
                . "EmailMessage::send()\n"
                . "\n"
                . "");
        Page::insert($sec01);
        $sec02 = $this->createSection('HTML Emails', 4, 'htmlEmails');
        Page::insert($sec02);
        $sec02->addChild($this->createParagraph(''
                . 'One of the main features of using the class "EmailMessage" is the '
                . 'full support for creating HTML emails. Every instance which '
                . 'is created using the class has an object of type '
                . '<a target="_blank" href="docs/phpStructs/html/HTMLDoc">HTMLDoc</a> which is '
                . 'associated with it. The document object can be accessed using the '
                . 'method <a target="_blank" href="docs/webfiori/entity/mail/EmailMessage#document">'
                . 'EmailMessage::documen()</a>. In addition to that, it is possible to '
                . 'add objects of type <a target="_blank" href="docs/phpStructs/html/HTMLNode">HTMLNode</a> to the body of the message using '
                . 'the method <a target="_blank" href="docs/webfiori/entity/mail/EmailMessage#insertNode">'
                . 'EmailMessage::insertNode()</a>.'
                . ''));
        
        $this->setNextTopicLink('learn/topics/mailing/attachments', 'Adding Attachments');
        $this->setPrevTopicLink('learn/topics/mailing/classes', 'Required Classes');
        $this->displayView();
    }
}
return __NAMESPACE__;