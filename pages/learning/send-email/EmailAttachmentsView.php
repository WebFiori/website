<?php
namespace webfiori\views\learn\mailing;
use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;
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
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph(''
                . 'One of the great features of the class '
                . '"<a target="_blank" href="docs/webfiori/entity/mail/EmailMessage">EmailMessage</a>" is the '
                . 'support for adding attachments to the message. In order to add attachments '
                . 'to the email message, the developer must use the class '
                . '<a target="_blank" href="docs/webfiori/entity/File">File</a>. This '
                . 'class is used to read and write files or send them back as a '
                . 'response. In order to add a file as  an attachment, it must be first '
                . 'opened and then added to the message using the method '
                . '<a target="_blank" href="docs/webfiori/entity/mail/EmailMessage#attach">EmailMessage::attach()</a>.'
                . ''));
        Page::insert($this->createParagraph(''
                . 'Let\'s assume that we have the same SMTP connection from the prevuse '
                . 'lesson. Also, let\s assume that we have a file which has '
                . 'the name "My CV.docx" in the root directory of the '
                . 'framework. The following code snippit shows how to add the '
                . 'file as an attachment to the email.'
                . ''
                . ''));
        $code01 = new CodeSnippet();
        $code01->setTitle('PHP Code');
        Page::insert($code01);
        $code01->setCode(""
                . "EmailMessage::createInstance('no-replay-smtp');\n"
                . "EmailMessage::subject('Attached My Latest CV');\n"
                . "\n"
                . "EmailMessage::addReceiver('Blog User','user@example.com')\n"
                . "\n"
                . "//Write some text to the body of the message.\n"
                . "EmailMessage::write('Attached is my newest CV. Please check it "
                . "and replay to me if there is any thing extra you need from me.')\n"
                . "\n"
                . "//Open the file that will be added as an attachment.\n"
                . "\$attachment = new File('My CV.docx',ROOT_DIR);\n"
                . "//We have to read the file before adding it as an attachment.\n"
                . "\$attachment->read();\n"
                . "//Finally, we add it to our message.\n"
                . "EmailMessage::attach(\$attachment);\n\n"
                . "EmailMessage::send()\n"
                . "\n"
                . "");
        $this->setPrevTopicLink('learn/topics/mailing/send-email', 'Sending an Email');
        $this->displayView();
    }
}
return __NAMESPACE__;
