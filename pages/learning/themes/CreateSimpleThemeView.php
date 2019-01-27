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
            'title'=>'Creating a Simple Theme',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/create-simple-theme'
        ));
        WebFioriGUI::createTitleNode(Page::title());
        $this->displayView();
    }
}
new ClassThemeView();
