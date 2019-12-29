<?php
namespace webfiori\views\learn\fileUpload;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
/**
 * Description of ClassUploaderView
 *
 * @author Ibrahim
 */
class ClassUploaderView extends UploadLearnView{
    public function __construct() {
        parent::__construct([
            'title'=>'The Class \'Uploader\'',
            'description'=>'The class \'Uploader\' is a utility class which is '
            . 'used to handle file uploads in PHP in a very simple way.',
            'active-aside'=>2,
        ]);
        Page::insert($this->createParagraph(''
                . 'The class \'<a href="docs/webfiori/entity/Uploader">Uploader</a>\' is a utility class which is '
                . 'used to handle file uploads in PHP in a very simple way. '
                . 'It has all necessary tools to handle one file upload or '
                . 'multiple files upload. The class will help in achieving the '
                . 'following:'
                . ''
                . ''));
        $ul00 = new UnorderedList();
        $ul00->addListItems([
            'Restrict uploaded files types.',
            'Get MIME type of most file types using file extension only.',
            'Support for multiple uploads.',
            'View the status of each uploaded file in a simple way.',
            'No need to use the array $_FILES to upload files.',
            'Ability to create upload files API in matter of fiew lines',
            'Store the uploaded file(s) to a specific location on the server.'
        ]);
        Page::insert($ul00);
        $this->setPrevTopicLink('learn/topics/file-upload', 'Introduction');
        $this->setNextTopicLink('learn/topics/file-upload/example', 'Usage Examples');
        $this->displayView();
    }
}
return __NAMESPACE__;