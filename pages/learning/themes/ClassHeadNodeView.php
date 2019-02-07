<?php
namespace webfiori\views\learn\themes;
use webfiori\WebFiori;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'The Class \'HeadNode\'',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/class-HeadNode'
        ));
        $this->createParagraph('The class <a>HeadNode</a> represents <span style="font-family:monospace">&lt;head&gt;</span> tag of the page. '
                . 'It is used to add CSS, JavaScript files and to include any other resources which the '
                . 'page depends on. Also, it can be used to add any extra META tags that the page needs.');
        $this->createParagraph('The following methods of the class will mostly be used:');
        $this->_createMethodsUsed();
        $this->setPrevTopicLink('learn/topics/themes/class-HTMLDoc', 'The class \'HTMLDoc\'');
        $this->setNextTopicLink('learn/topics/themes/class-Page', 'The class \'Page\'');
        $this->displayView();
    }
    private function _createMethodsUsed(){
        $ul = new UnorderedList();
        Page::insert($ul);
        $ul->addChild($this->createLinkListItem('docs/phpStructs/html/HeadNode#addCSS', 'HeadNode::addCSS()', '_blank'));
        $ul->addChild($this->createLinkListItem('docs/phpStructs/html/HeadNode#addJS', 'HeadNode::addJS()', '_blank'));
        $ul->addChild($this->createLinkListItem('docs/phpStructs/html/HeadNode#addMeta', 'HeadNode::addMeta()', '_blank'));
        $ul->addChild($this->createLinkListItem('docs/phpStructs/html/HeadNode#addAlternate', 'HeadNode::addAlternate()', '_blank'));
        $ul->addChild($this->createLinkListItem('docs/phpStructs/html/HeadNode#setTitle', 'HeadNode::setTitle()', '_blank'));
        $ul->addChild($this->createLinkListItem('docs/phpStructs/html/HeadNode#setBase', 'HeadNode::setBase()', '_blank'));
        $ul->addChild($this->createLinkListItem('docs/phpStructs/html/HeadNode#setCanonical', 'HeadNode::setCanonical()', '_blank'));
    }
}
new ClassThemeView();
