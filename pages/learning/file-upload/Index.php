<?php
namespace webfiori\views\learn\fileUpload;
use webfiori\entity\Page;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends UploadLearnView{
    public function __construct() {
        parent::__construct([
            'title'=>'Introduction',
            'description'=>'Introduction on to how to upload files using WebFiori '
            . 'Framework.',
            'active-aside'=>1,
        ]);
        $this->setNextTopicLink('learn/topics/file-upload/class-Uploader', 'The Class \'Uploader\'');
        Page::insert($this->createParagraph(''
                . 'When trying to upload files in PHP, you have to access the global '
                . 'array <a href="https://www.php.net/manual/en/reserved.variables.files.php">$_FIELS</a> which can '
                . 'lead to a mess in some use cases. Also, it is difficult to use the global'
                . 'constant in case of multiple file uploads.'
                . ''));
        Page::insert($this->createParagraph(''
                . 'The framework has a utility class that can be used to handle file '
                . 'uploads using mimimum amount of effort and code. '
                . 'The name of the class \'<a href="docs/webfiori/entity/Uploader">Uploader</a>\' and its part of the namespace '
                . '\'<a href="docs/webfiori/entity"></a>\''
                . ''
                . ''));
        $this->displayView();
    }
}
return __NAMESPACE__;
