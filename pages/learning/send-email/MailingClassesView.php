<?php
namespace webfiori\views\learn\mailing;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
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
        Page::insert($this->createParagraph(''
                . 'In order to send emails using the framework you need to learn '
                . 'about 3 classes. These classes are:'
                . ''
                . ''));
        $list = new UnorderedList();
        $list->addListItems([
            '<a href="#smtpAcc">SMTPAccount</a>',
            '<a href="#mailConf">MailConfing</a>',
            '<a href="#emailMessage">EmailMessage</a>',
            '<a href="#emailController">EmailController</a>'
        ], false);
        Page::insert($list);
        $sec00 = $this->createSection('The Class "SMTPAccount"', 4, 'smtpAcc');
        $sec00->addChild($this->createParagraph(''
                . 'The class <a href="docs/webfiori/entity/mail/SMTPAccount">SMTPAccount</a> represents '
                . 'SMTP account connection information. It is used to keep SMTP server address, '
                . 'port number, SMTP credentials in addition to the email address and '
                . 'sender name. The first thing that a developer must have in '
                . 'order to send emails is SMTP account that can be used to connect with '
                . 'mailing server.'
                . ''));
        Page::insert($sec00);
        $sec01 = $this->createSection('The Class "MailConfing"', 4, 'mailConf');
        $sec01->addChild($this->createParagraph(''
                . 'The class <a href="docs/webfiori/mail/MailConfing">MailConfing</a> is a '
                . 'configuration class which is used to store SMTP accounts which are '
                . 'used by the system to send emails. The class can be used to store unlimited '
                . 'number of SMTP accounts. Every account is kept as an object of type '
                . '<a href="docs/webfiori/entity/mail/SMTPAccount">SMTPAccount</a>.'
                . ''));
        Page::insert($sec01);
        $sec02 = $this->createSection('The Class "EmailMessage"', 4, 'emailMessage');
        $sec02->addChild($this->createParagraph(''
                . 'The class <a href="docs/webfiori/entity/mail/EmailMessage">EmailMessage</a> is used to '
                . 'send the actual email. It has static methods which are used to set many attributes '
                . 'of an email message such as the subject, the people who will receive the '
                . 'email and its attachments.'
                . ''));
        Page::insert($sec02);
        $sec03 = $this->createSection('The Class "EmailController"', 4, 'emailController');
        $sec03->addChild($this->createParagraph(''
                . 'The class <a href="docs/webfiori/logic/EmailController">EmailController</a> is a utility '
                . 'class which acts as an interface between the email message and the logic which is '
                . 'used to send the message. In addition, this class is used to modify the class '
                . 'The class <a href="docs/webfiori/entity/mail/MailConfing">MailConfing</a> programatically '
                . 'by adding and removing connections.'
                . ''));
        Page::insert($sec03);
        $this->setNextTopicLink('learn/topics/mailing/send-email', 'Sending an Email');
        $this->setPrevTopicLink('learn/topics/mailing', 'Introduction');
        $this->displayView();
    }
}
return __NAMESPACE__;
