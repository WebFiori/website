<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use webfiori\views\learn\LearnView;

class CLILearnView extends LearnView{
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
                'label'=>'Introduction',
                'link'=>'learn/topics/cli'
            ],
            [
                'label'=>'Setup',
                'link'=>'learn/topics/cli/setup'
            ],
            [
                'label'=>'Running Commands',
                'link'=>'learn/topics/cli/running-commands'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
