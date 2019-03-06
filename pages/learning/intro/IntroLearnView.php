<?php
namespace webfiori\views\learn\intro;
use webfiori\views\learn\LearnView;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
/**
 * Description of ThemesLearnView
 *
 * @author Ibrahim
 */
class IntroLearnView extends LearnView{
    public function __construct($x = array()) {
        parent::__construct($x);
    }
    //put your code here
    public function createAsidNav() {
        $aside = &Page::document()->getChildByID('side-content-area');
        $aside->addTextNode('<p><b>Topics:</b></p>',FALSE);
        $aside->setAttribute('style', 'border: 1px solid;');
        $links = new UnorderedList();
        $links->setClassName('aside-nav');
        $aside->addChild($links);
        $li00 = $this->createLinkListItem('learn/topics/introduction', 'Introduction to WebFiori');
        $li00->setClassName('aside-nav-item');
        $links->addChild($li00);
        $li01 = $this->createLinkListItem('learn/topics/architecture', 'Framework Architecture');
        $li01->setClassName('aside-nav-item');
        $links->addChild($li01);
        $li02 = $this->createLinkListItem('learn/topics/basic-usage', 'Basic Usage');
        $li02->setClassName('aside-nav-item');
        $links->addChild($li02);
        $li03 = $this->createLinkListItem('learn/topics/more-about-views', 'More About Views');
        $li03->setClassName('aside-nav-item');
        $links->addChild($li03);
        switch ($this->getAsideActiveLinkNum()){
            case 0:{
                $li00->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 1:{
                $li01->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 2:{
                $li02->setClassName('aside-nav-item active-aside-item');
                break;
            }
            case 3:{
                $li03->setClassName('aside-nav-item active-aside-item');
                break;
            }
        }
    }

}
