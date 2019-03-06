<?php
namespace webfiori\views;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
/**
 * Description of ContributeView
 *
 * @author Eng.Ibrahim
 */
class ContributeView extends WebFioriPage{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Contribute',
            'description'=>'Ways to help in the development process of the '
            . 'framework.'
        ));
        Page::insert($this->createParagraph('The framework is open source and '
                . 'licensed under MIT license. Any one is free to use it '
                . 'the way they like. There are many ways at which any '
                . 'person can contribute to WebFiori Framework project. '
                . 'Here we list some of the ways.'));
        $sec1 = $this->createSection('Useing It');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph('The easiest way is to use the '
                . 'framework as your web development framework. Since the '
                . 'framework is licensed under MIT license, it is '
                . 'possible to use the framework even for building '
                . 'commercial software.'));
        
        $sec2 = $this->createSection('Documentation');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph(''
                . 'Another way to contribute is to create project documentation. '
                . 'Simply, you can go to <a>documentation repo</a> in GitHub and start '
                . 'by cloning the repo and create pages that describes different '
                . 'aspects of the project.'
                . ''));
        $sec3 = $this->createSection('Review Code, Add Features, Fix Bugs');
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph('You are free to modify code base of the '
                . 'framework as you like as long as you follow MIT license rules. '
                . 'You can grab the source code of the framework from '
                . 'its <a>repo</a> in GitHub.'));
        $sec3->addChild($this->createParagraph(''
                . 'There are many things that you can do with the code. You can create '
                . 'your own features, customize existing ones or fix the bugs that '
                . 'you might find.'
                . ''));
        $sec4 = $this->createSection('Contributers and Sponsers');
        Page::insert($sec4);
        $sec4->addChild($this->createParagraph('Here you will find a list of all '
                . 'people who have contributed to the project in any way in addition to '
                . 'sponsers. Your name '
                . 'will be added to the list if you contribute to the project '
                . 'in any way ;).'));
        
        $subSec1 = $this->createSection('Contributers:', 2);
        $sec4->addChild($subSec1);
        $ul1 = new UnorderedList();
        $subSec1->addChild($ul1);
        $ul1->addListItems(array(
            '<a href="https://twitter.com/IbrahimBAli2017">Ibrahim BinAlashikh</a> - Founder and Core Developer',
            '&lt;YOUR NAME HERE &gt;'
        ),FALSE);
        $subSec2 = $this->createSection('Sponsers:', 2);
        $sec4->addChild($subSec2);
        $ul2 = new UnorderedList();
        $subSec1->addChild($ul2);
        $ul1->addListItems(array(
            '&lt;YOUR NAME HERE &gt;'
        ),FALSE);
        $this->displayView();
    }
}
new ContributeView();