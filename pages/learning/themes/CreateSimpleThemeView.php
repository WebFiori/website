<?php
namespace webfiori\views\learn\themes;
use webfiori\views\WebFioriPage;
use webfiori\WebFiori;
use webfiori\entity\Page;
use WebFioriGUI;
use phpStructs\html\UnorderedList;
use phpStructs\html\CodeSnippet;
use phpStructs\html\ListItem;
use phpStructs\html\HTMLNode;
/**
 * Description of ClassThemeView
 *
 * @author Ibrahim
 */
class ClassThemeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'active-aside'=>5,
            'title'=>'Creating a Simple Theme',
            'description'=>'',
            'canonical'=> WebFiori::getSiteConfig()->getBaseURL().'learn/topics/themes/create-simple-theme'
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        $this->createParagraph('What we will be doing here is to create a theme that '
                . 'gives different colors to page sections. It is only used to show the basics of creating a '
                . 'theme.');
        $this->createParagraph('In general, theme creation process consist of the '
                . 'following:');
        $this->themeCreationSteps();
        $this->step1();
        $this->step2();
        $this->step3();
        $this->step4();
        $this->step5();
        $this->displayView();
    }
    private function themeCreationSteps(){
        $ul = new UnorderedList();
        $ul->addListItem('Creating theme folder inside the directory <b>\'/themes\'</b>.');
        $ul->addListItem('Creating resources folders inside (JavaScript, CSS and Images).');
        $ul->addListItem('Adding theme resources as needed.');
        $ul->addListItem('Creating new PHP class inside theme directory.');
        $ul->addListItem('Extending the class <a href="'.WebFiori::getSiteConfig()->getBaseThemeName().'docs/webfiori/entity/Theme" target="_blank">Theme</a>.');
        $ul->addListItem('Implementing abstract methods as needed.');
        Page::insert($ul);
    }
    private function step1() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 1: Creating Theme Directory and Resources Folders'
        ));
        Page::insert($sec);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'Themes in WebFiori Framework are '
            . 'created inside the folder \'/themes\'. The first step in creating '
            . 'new theme is to create new folder to add all its components there. '
            . 'let\'s give the folder the name \'custom-theme\'. After creating '
            . 'theme directory, we need to create 3 additional folders inside the '
            . 'new folder. The 3 folders will be used to hold theme '
            . 'CSS, JavaScript and images. Let\'s give the names \'js\', \'css\' and \'images\'. This '
            . 'means that the folder structure will be as follows:'
        )));
        $ul = new UnorderedList();
        $ul->addListItem('/themes/custom-theme/css');
        $ul->addListItem('/themes/custom-theme/js');
        $ul->addListItem('/themes/custom-theme/images');
        $sec->addChild($ul);
    }
    private function step2() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 2: Adding Theme Resource Files'
        ));
        Page::insert($sec);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'At this step, we will create one CSS file. '
            . 'The file will be added in the folder \'/themes/custom-theme/css\'. '
            . 'Let\'s give the file the name \'theme.css\' This CSS file will '
            . 'only contain selectors to give different colors for each '
            . 'section within the page. The code within the file will be '
            . 'something like the following:'
            )
        ));
        $code = new CodeSnippet();
        $code->setTitle('CSS Code');
        $code->setCode('
#page-body{
    color: white;
    background-color: black;
    padding: 20px;
}
#page-header{
    background-color: blueviolet;
    padding: 20px;
}
#page-footer{
    background-color: royalblue;
    padding: 20px;
}
#main-content-area{
    background-color: violet;
    padding: 20px;
}
#side-content-area{
    background-color: honeydew;
    color:black;
    padding: 20px;
}

');
        $sec->addChild($code);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'The padding is added only to make elements far from each '
            . 'other a little bit. In addition to creating this CSS file, we could '
            . 'do the same thing for JS and images as well.'
            )
        ));
    }
    private function step3() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 3: Creating Theme Class and Extending the Class \'Theme\''
        ));
        Page::insert($sec);
        $sec->addChild($this->createNode(array(
            'type'=>'p',
            'text'=>'This step is very simple. All what we have to do is to create '
            . 'new PHP class in the main theme folder. Let\'s give the name '
            . '\'CustomTheme\' to the class. After that, we need to import (or use) '
            . 'the class \'<a href="'.WebFiori::getSiteConfig()->getBaseURL().'docs/webfiori/entity/Theme" target="_blank">Theme</a>\'. Once we do that, we make our class '
            . 'extend the class \'Theme\'. By the end of this step, the code '
            . 'inside the file \'CustomTheme.php\' should be look like the following:'
            )
        ));
        $code = new CodeSnippet();
        $code->setTitle('PHP Code');
        $code->setCode('
&lt;?php
use webfiori\entity\Theme;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
    }
}');
        $sec->addChild($code);
    }
    private function step4() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 4: Implementing The Theme'
        ));
        Page::insert($sec);
    }
    private function step5() {
        $sec = $this->createNode(array(
            'type'=>'section',
            'title'=>'Step 5: Testing The Theme'
        ));
        Page::insert($sec);
    }
}
new ClassThemeView();
