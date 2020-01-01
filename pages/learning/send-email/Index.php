<?php
namespace webfiori\views\learn\mailing;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
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
        Page::insert($this->createParagraph('One of the important features of any web application '
            . 'is the ability to send email messages. WebFiori Framework '
            . 'has all needed tools to allow the system be able to send '
            . 'HTML emails. '
            .'Email messages are used in many ways. '
            . 'For example, they are used to activate user account, reset password, '
            . 'send ads, etc...'));
        Page::insert($this->createParagraph(''
                . 'After finishing the following set of topics, you will be able to understand how '
                . 'to send a very basic email message using the framework.'
                . ''));
        $sec = $this->createSection('Topics Covered:');
        Page::insert($sec);
        $topicsUl = new UnorderedList();
        $topicsUl->addListItems([
            '<a href="learn/topics/mailing/classes">Mailing Sub-system Classes</a>',
            '<a href="learn/topics/mailing/send-email">How to Send an Email</a>',
            '<a href="learn/topics/mailing/attachments">Adding Attachments to Your Email</a>'
        ], false);
        $sec->addChild($topicsUl);
        $this->setNextTopicLink('learn/topics/mailing/classes', 'Mailing Sub-system Classes');
        $this->displayView();
    }
}
return __NAMESPACE__;
