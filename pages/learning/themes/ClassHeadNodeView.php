<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use webfiori\WebFiori;
use webfiori\entity\Page;
use WebFioriGUI;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends WebFioriPage{
    public function __construct() {
        parent::__construct(array(
            'title'=>'The Class \'HeadNode\'',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/class-HeadNode'
        ));
        WebFioriGUI::createTitleNode(Page::title());
        
        $this->createParagraph('The class <a>HeadNode</a> represents <span style="font-family:monospace">&lt;head&gt;</span> tag of the page. '
                . 'It is used to add CSS, JavaScript files and to include any other resources which the '
                . 'page depends on. Also, it can be used to add any extra META tags that the page needs.');
        
        $this->displayView();
    }
}
new ClassThemeView();
