<?php
namespace webfiori\views\learn;
use webfiori\entity\Page;
use webfiori\views\WebFioriPage;
use phpStructs\html\HTMLNode;
use phpStructs\html\Anchor;
/**
 * Description of LearnView
 *
 * @author Ibrahim
 */
abstract class LearnView extends WebFioriPage{
    private $nextTopicLink;
    private $prevTopicLink;
    private $activeAside;
    /**
     * Creates new instance of the class.
     * @param array $options An associative array of options. 
     * Available options are:
     * <ul>
     * <li><b>title</b>: The title of the page. If not provided, the value 
     * 'Learnning Center' is used.<li>
     * <li><b>description</b>: The description of the page. If not provided, 
     * the the value 'Here you will find a list of topics that you might 
     * need to learn in order to use WebFiori Framework in the most effective way.' 
     * is used.<li>
     * <li><b>site-name</b>: The name of the website. If not provided, 
     * the global website which is stored in the class 'SiteConfig' is 
     * used.<li>
     * <li><b>canonical</b>: The canonical link of the page.<li>
     * <li><b>active-aside</b>: The number of the active link from the side 
     * menu.</li>
     * </ul>
     */
    public function __construct($x=array(
        'title'=>'Learnning Center',
        'description'=>'Here you will find a list of topics that you might '
                . 'need to learn in order to use WebFiori Framework in the most '
                . 'effective way.')) {
        parent::__construct($x);
        $titleNode = Page::theme()->createHTMLNode(['type'=>'page-title','title'=>Page::title()]);
        Page::document()->getChildByID('main-content-area')->addChild($titleNode);
        $active = isset($x['active-aside']) ? $x['active-aside'] : -1;
        $this->setAsideActiveLinkNum($active);
    }
    public function displayView() {
        $div = Page::theme()->createHTMLNode(['type'=>'container']);
        $div->setID('next-prev-container');
        if($this->prevTopicLink !== null){
            $this->prevTopicLink->setClassName('prev-button');
            $div->addChild($this->prevTopicLink);
        }
        if($this->nextTopicLink !== null){
            $this->nextTopicLink->setClassName('next-button');
            $div->addChild($this->nextTopicLink);
        }
        if($div->childrenCount() != 0){
            Page::insert($div);
        }
        $this->createAsidNav();
        parent::displayView();
    }
    public function setNextTopicLink($link,$title) {
        $this->nextTopicLink = new HTMLNode();
        $linkNode = new Anchor($link,$title);
        $this->nextTopicLink->addTextNode('<b>Next: </b>',false);
        $this->nextTopicLink->addChild($linkNode);
    }
    public function setPrevTopicLink($link,$title) {
        $this->prevTopicLink = new HTMLNode();
        $linkNode = new Anchor($link,$title);
        $this->prevTopicLink->addTextNode('<b>Previous: </b>',false);
        $this->prevTopicLink->addChild($linkNode);
    }
    public function getAsideActiveLinkNum() {
        return $this->activeAside;
    }
    public function setAsideActiveLinkNum($num) {
        $this->activeAside = $num;
    }
    public abstract function createAsidNav();
}
