<?php
namespace webfiori\views;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
use phpStructs\html\LinkNode;
use phpStructs\html\HTMLNode;
/**
 * Description of ContributeView
 *
 * @author Eng.Ibrahim
 */
class ContributeView extends WebFioriPage{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Video Tutorials',
            'description'=>'A video based tutorials which can help you '
            . 'in getting started with WebFiori Framework.'
        ));
        Page::insert($this->createParagraph('Here, you will find a set of '
                . 'usefule videos which can be very helpful. They explain '
                . 'most of the things that you need to get started with '
                . 'WebFiori Framework. The creator of the videos is the '
                . 'author of the video.'));
$this->_createVideoSection('Introduction', 'UiIHQsZ-b2A', null);
        $this->displayView();
    }
    private function _createVideoSection($title,$vidId,$vidPageLink){
        $vidRow = Page::theme()->createHTMLNode(['type'=>'wf-row']);
        $vidRow->setStyle([
            'border'=>'1px solid'
        ]);
        $imgUrl = 'https://img.youtube.com/vi/'.$vidId.'/sddefault.jpg';
        $vidImg = new HTMLNode('img');
        $vidImg->setAttribute('src', $imgUrl);
        $vidImg->setStyle([
            'width'=>'150px'
        ]);
        $vidImg->setClassName('wf-ltr-col-3');
        $vidRow->addChild($vidImg);
        $vidTitleContainer = new HTMLNode();
        $vidTitleContainer->setClassName('wf-ltr-col-7');
        $vidTitleContainer->addTextNode($title);
        $vidRow->addChild($vidTitleContainer);
        Page::insert($vidRow);
    }
}
new ContributeView();