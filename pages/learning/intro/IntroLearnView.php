<?php
namespace webfiori\views\learn\intro;
use webfiori\views\learn\LearnView;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\PNode;
/**
 * Description of ThemesLearnView
 *
 * @author Ibrahim
 */
class IntroLearnView extends LearnView{
    public function __construct($x = array()) {
        parent::__construct($x);
    }
    public function createAsidNav() {
        $aside = Page::document()->getChildByID('side-content-area');
        $linksArr = [
            [
                'label'=>'Back to Index',
                'link'=>'learn'
            ],
            [
                'label'=>'Introduction to WebFiori',
                'link'=>'learn/topics/introduction'
            ],
            [
                'label'=>'Framework Architecture',
                'link'=>'learn/topics/architecture'
            ],
            [
                'label'=>'Basic Usage',
                'link'=>'learn/topics/basic-usage'
            ],
            [
                'label'=>'More About Views',
                'link'=>'learn/topics/more-about-views'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
