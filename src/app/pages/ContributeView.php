<?php
namespace webfiori\views;
use webfiori\framework\Page;
use webfiori\ui\UnorderedList;
use webfiori\ui\Anchor;
/**
 * Description of ContributeView
 *
 * @author Eng.Ibrahim
 */
class ContributeView extends WebFioriPage {
    public function __construct() {
        parent::__construct(array(
            'title'=>'Contribute',
            'description'=>'Ways to help in the development process of the '
            . 'framework.'
        ));
        $row = $this->insert('v-row');
        $row->addChild('v-col', [
            'cols' => '12'
        ])->addChild($this->createParagraph('The framework is open source and '
                . 'licensed under MIT license. Any one is free to use it '
                . 'the way they like. There are many ways at which any '
                . 'one can contribute to the project. '
                . 'Here we list some of the ways.'));
        $sec1 = $this->createSection('Using It');
        $row->addChild('v-col', [
            'cols' => 12
        ])->addChild($sec1);
        $sec1->addChild($this->createParagraph('The easiest way is to use the '
                . 'framework as your web development framework. Since the '
                . 'framework is licensed under MIT license, it is '
                . 'possible to use the framework even for building '
                . 'commercial software without having to worry about any legal things as '
                . 'long as you follow the terms of the license.'));
        
        $sec2 = $this->createSection('Documentation');
         $row->addChild('v-col', [
            'cols' => 12
        ])->addChild($sec2);

        $sec2->addChild($this->createParagraph(''
                . 'Another way to contribute is to create or improve project documentation. '
                . 'Simply, you can go to <a href="https://github.com/webfiori/docs" target="_blank">documentation repo</a> in GitHub and start '
                . 'by forking the repo and create pages that describes different '
                . 'aspects of the project.'
                . ''));
        $sec3 = $this->createSection('Review Code, Add Features, Fix Bugs');
        $row->addChild('v-col', [
            'cols' => 12
        ])->addChild($sec3);
        
        $sec3->addChild($this->createParagraph('You are free to modify code base of the '
                . 'framework as you like as long as you follow MIT license rules. '
                . 'You can grab the source code of the framework from '
                . 'its <a href="https://github.com/WebFiori/framework" target="_blank">repo</a> in GitHub.'));
        $sec3->addChild($this->createParagraph(''
                . 'There are many things that you can do with the code. You can create '
                . 'your own features, customize existing ones or fix the bugs that '
                . 'you might find.'
                . ''));
        $sec = $this->createSection('Tell People About The Framework');
        $sec->addChild($this->createParagraph('Telling people about the existence of '
                . 'the framework is another way. Simply, all what you have to do is to '
                . 'share information about the framework with anyone you like.'));
        $row->addChild('v-col', [
            'cols' => 12
        ])->addChild($sec);
        $sec4 = $this->createSection('Donate');
        $row->addChild('v-col', [
            'cols' => 12
        ])->addChild($sec4);
        $sec4->addChild($this->createParagraph(''
                . 'Another way to contribute is to support the development of '
                . 'the framework through donations. You can do a one-time donation '
                . 'using one of the following channels:'
                . ''));
        $payPalImg = $this->createImag('https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png', 'PayPal Image.');
        $link = new Anchor('https://paypal.me/IbrahimBinAlshikh', '', '_blank');
        $link->addChild($payPalImg);
        $sec4->addChild($link);
        $sec5 = $this->createSection('Contributers and Sponsers');
        $row->addChild('v-col', [
            'cols' => 12
        ])->addChild($sec5);
        $sec5->addChild($this->createParagraph('Here you will find a list of all '
                . 'people who have contributed to the project in any way in addition to '
                . 'sponsers. Your name '
                . 'will be added to the list if you contribute to the project '
                . 'in any way ;).'));
        
        $subSec1 = $this->createSection('Contributers:', 2);
        $sec5->addChild($subSec1);
        $ul1 = new UnorderedList();
        $subSec1->addChild($ul1);
        $ul1->addListItems(array(
            '<a href="https://twitter.com/IbrahimBAli2017">Ibrahim BinAlashikh</a> - Founder and Core Developer',
            '<a href="https://github.com/ibrahimBeladi">Ibrahim Beladi</a> - Contributor',
            '&lt;YOUR NAME HERE &gt;'
        ),false);
        $subSec2 = $this->createSection('Sponsers:', 2);
        $sec5->addChild($subSec2);
        $ul2 = new UnorderedList();
        $subSec2->addChild($ul2);
        $ul2->addListItems(array(
            '&lt;YOUR NAME HERE &gt;'
        ),false);
    }
}
return __NAMESPACE__;