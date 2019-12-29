<?php
namespace webfiori\views\learn\fileUpload;
use webfiori\views\learn\LearnView;
use webfiori\entity\Page;
/**
 * Description of UploadLearnView
 *
 * @author Ibrahim
 */
class UploadLearnView extends LearnView{
    public function __construct($x = []) {
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
                'link'=>'learn/topics/file-upload'
            ],
            [
                'label'=>'The Class \'Uploader\'',
                'link'=>'learn/topics/file-upload/class-Uploader'
            ],
            [
                'label'=>'Usage Examples',
                'link'=>'learn/topics/file-upload/example'
            ]
        ];
        $linksArr[$this->getAsideActiveLinkNum()]['is-active'] = true;
        $aside->addChild(Page::theme()->createHTMLNode([
            'type'=>'vertical-nav-bar',
            'nav-links'=>$linksArr
        ]));
    }

}
