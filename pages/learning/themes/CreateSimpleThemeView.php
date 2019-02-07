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
class ClassThemeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Creating a Simple Theme',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/create-simple-theme'
        ));
        $this->createParagraph('What we will be doing here is to create a theme that '
                . 'gives different colors to page sections. It is only used to show the basics of creating a '
                . 'theme.');
        $this->createParagraph('In general, ');
        $this->displayView();
    }
}
new ClassThemeView();
