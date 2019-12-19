<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use webfiori\WebFiori;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\HTMLNode;
Use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use WebFioriGUI;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'The Class \'HTMLNode\'',
            'description'=>'The class HTMLNode is the core class for creating UI.',
            'active-aside'=>1
        ));
        Page::insert($this->createParagraph('This class acts as an interface between the framework and HTML. It represents any '
                . 'HTML element you can think of. The class <a href="'.WebFiori::getSiteConfig()->getBaseURL()
                .'docs/docs/phpStructs/html/HTMLNode" target="_blank">HTMLNode</a> provide the following utilites to '
                . 'create and manipulate HTML elements within the page:'));
        Page::insert($this->classUtilitiesUL());
        Page::insert($this->createParagraph('The developer can create sub-classes of this class to create different types of '
                . 'HTML elements or add extra functionality.'));
        
        $this->setPrevTopicLink('learn/topics/themes/class-HTMLNode', 'The class \'HTMLNode\'');
        $this->setNextTopicLink('learn/topics/themes/class-HTMLDoc', 'The class \'HTMLDoc\'');
        $this->displayView();
    }
    
    private function classUtilitiesUL(){
        $ul = new UnorderedList();
        $li1 = new ListItem();
        $li1->addTextNode('The ability to create any DOM element.');
        $ul->addChild($li1);
        
        $li2 = new ListItem();
        $li2->addTextNode('The ability to append and remove child DOM elements.');
        $ul->addChild($li2);
        
        $li3 = new ListItem();
        $li3->addTextNode('The ability to set and get the values of element attributes.');
        $ul->addChild($li3);
        
        $li4 = new ListItem();
        $li4->addTextNode('The ability to add text or comment elements');
        $ul->addChild($li4);
        
        $li5 = new ListItem();
        $li5->addTextNode('The ability to display the element as formatted HTML code in the browser.');
        $ul->addChild($li5);
        return $ul;
    }
}
new ClassThemeView();
