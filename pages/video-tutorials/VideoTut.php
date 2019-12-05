<?php
namespace webfiori\views;
use webfiori\WebFiori;
use phpStructs\html\HTMLNode;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\ListItem;
use phpStructs\html\UnorderedList;
use phpStructs\html\LinkNode;
class VideoTut {
    /**
     *
     * @var HTMLNode 
     */
    private $iframe;
    /**
     *
     * @var HTMLNode 
     */
    private $vidDescNode;
    public function __construct($vidId,$pageTitle,$asideActive=0) {
        Page::theme(WebFiori::getSiteConfig()->getBaseThemeName());
        Page::insert(Page::theme()->createHTMLNode([
            'type'=>'page-title',
            'title'=>$pageTitle
        ]));
        Page::title($pageTitle);
        Page::siteName('WebFiori Framework');
        $this->iframe = new HTMLNode('iframe');
        $this->iframe->setClassName('video-container');
        $this->iframe->setAttribute('width', '560');
        $this->iframe->setAttribute('height', '315');
        $this->iframe->setAttribute('allowfullscreen', '');
        $this->iframe->setAttribute('src', 'https://www.youtube.com/embed/'.$vidId);
        Page::insert($this->iframe);
        $this->vidDescNode = Page::theme()->createHTMLNode(['type'=>'wf-row']);
        $this->vidDescNode->setID('video-desc-container');
        Page::insert($this->vidDescNode);
        $this->createAsidNav([
            'learn/video/intro'=>'Introduction',
            'learn/video/installing-wamp-stack'=>'Installing WAMP Stack',
            'learn/video/creating-first-project'=>'Creating PHP Project',
            'learn/video/routing-p1'=>'Routing - Part 1',
            'learn/video/routing-p2'=>'Routing - Part 2',
            'learn/video/views-p1'=>'Views - Part 1',
            'learn/video/views-p2'=>'Views - Part 2'
        ], $asideActive);
    }
    public function addToDescription($text) {
        $this->vidDescNode->addTextNode('<p>'.$text.'</p>', false);
    }
    public function setDescription($desc) {
        Page::description($desc);
    }
    public function displayView() {
        Page::render();
    }
    //put your code here
    public function createAsidNav($linksArr,$active=0) {
        $aside = &Page::document()->getChildByID('side-content-area');
        $backLink = new PNode();
        $backLink->addText('<a href="learn/video">Back to Index</a>', array(
            'esc-entities'=>FALSE
        ));
        $backLink->setClassName('back-link');
        $aside->addChild($backLink);
        $aside->addTextNode('<p class="aside-links-title"><b>Video Tutorials:</b></p>',FALSE);
        $aside->setAttribute('style', 'border: 1px solid;');
        $links = new UnorderedList();
        $links->setClassName('aside-nav');
        $aside->addChild($links);
        $activeIndex=0;
        foreach ($linksArr as $link=>$title){
            $li00 = new ListItem();
            $link00 = new LinkNode($link, $title);
            $li00->addChild($link00);
            if($activeIndex == $active){
                $li00->setClassName('aside-nav-item active-aside-item');
            }
            else{
                $li00->setClassName('aside-nav-item');
            }
            $links->addChild($li00);
            $activeIndex++;
        }
    }
}
