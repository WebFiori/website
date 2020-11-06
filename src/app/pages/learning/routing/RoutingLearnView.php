<?php
namespace webfiori\views\learn\routing;


use webfiori\views\learn\LearnView;
use webfiori\entity\Page;
/**
 * Description of RoutingLearnView
 *
 * @author Ibrahim
 */
class RoutingLearnView extends LearnView{
    /**
     * Creates new instance of the class.
     * @param array $x An associative array of options. 
     * Available options are:
     * <ul>
     * <li><b>title</b>: The title of the page. If not provided, the value 
     * 'Learnning Center' is used.</li>
     * <li><b>description</b>: The description of the page. If not provided, 
     * the the value 'Here you will find a list of topics that you might 
     * need to learn in order to use WebFiori Framework in the most effective way.' 
     * is used.</li>
     * <li><b>site-name</b>: The name of the website. If not provided, 
     * the global website which is stored in the class 'SiteConfig' is 
     * used.</li>
     * <li><b>canonical</b>: The canonical link of the page.</li>
     * <li><b>active-aside</b>: The number of the active link from the side 
     * menu. The numbers starts from 1.</li>
     * </ul>
     */
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
                'label'=>'Introduction to Routing',
                'link'=>'learn/topics/routing'
            ],
            [
                'label'=>'How Routing System Works',
                'link'=>'learn/topics/routing/how-it-works'
            ],
            [
                'label'=>'The Class \'Router\'',
                'link'=>'learn/topics/routing/class-Router'
            ],
            [
                'label'=>'Types of Routes',
                'link'=>'learn/topics/routing/types-of-routes'
            ],
            [
                'label'=>'URI Variables',
                'link'=>'learn/topics/routing/variables'
            ],
            [
                'label'=>'Routing Q&A',
                'link'=>'learn/topics/routing/questions-and-answers'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
