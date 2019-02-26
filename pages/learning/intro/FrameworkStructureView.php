<?php
namespace webfiori\views\learn\intro;
use webfiori\views\WebFioriPage;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\HTMLNode;
use phpStructs\html\CodeSnippet;
use webfiori\WebFiori;
use WebFioriGUI;
/**
 * Description of Index
 *
 * @author Ibrahim
 */
class FrameworkStructureView extends IntroLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Framework Architecture',
            'description'=>'Learn about the Architecture of the framework.'
        ));
        $sec = $this->createSection('Separation of Concerns');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('One of the things that was put '
                . 'into cosidration while designing the framework is '
                . 'separation of concerns. For example, your UI (or views) '
                . 'will have one place. Your web APIs also have thier own place '
                . 'and so on.'));
        $sec->addChild($this->createParagraph('The following picture '
                . 'shows folder structure of the framework.'));
        $sec->addChild($this->createImag('res/images/FolderStructure.png', 'WebFiori File Structure'));
        $sec->addChild($this->createParagraph('We will explain the content of each '
                . 'folder and why it exist.'));
        $sec2 = $this->createSection('Configuration Files');
        Page::insert($sec2);
        $this->createParagraph('The folder <span style="font-family:monospace">'
                . '\'/conf\'</span> contains main configuration classes. The files are '
                . 'used to control main website attributes such as the name of '
                . 'the website, main language and database connections. Also, they '
                . 'control SMTP accounts settings.');
        $this->createParagraph('There are 3 main configuration classes:');
        $ul = new UnorderedList();
        $sec2->addChild($ul);
        $ul->addListItem('The class <a href="docs/webfiori/conf/Config" target="_blank">Config</a>.');
        $ul->addListItem('The class <a href="docs/webfiori/conf/SiteConfig" target="_blank">SiteConfig</a>.');
        $ul->addListItem('The class <a href="docs/webfiori/conf/MailConfig" target="_blank">MailConfig</a>.');
        $sec3 = $this->createSection('Initialization Files');
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph('The folder <span style="font-family:monospace">'
                . '\'/ini\'</span> contain initialization classes. The classes are '
                . 'used to initialize autoload directories, CRON jobs and privileges. The developer '
                . 'can modify the code inside the classes as he need. The classes are:'));
        $ul2 = new UnorderedList();
        $sec3->addChild($ul2);
        $ul2->addListItem('The class <a href="docs/webfiori/ini/InitAutoLoad" target="_blank">InitAutoLoad</a>.');
        $ul2->addListItem('The class <a href="docs/webfiori/ini/InitCron" target="_blank">InitCron</a>.');
        $ul2->addListItem('The class <a href="docs/webfiori/ini/InitPrivileges" target="_blank">InitPrivileges</a>.');
        $sec4 = $this->createSection('Initialization Files');
        Page::insert($sec4);
        $sec5 = $this->createSection('System Entities');
        Page::insert($sec5);
        $sec6 = $this->createSection('Themes');
        Page::insert($sec6);
        $sec7 = $this->createSection('Web Pages (Views)');
        Page::insert($sec7);
        $sec8 = $this->createSection('Web APIs');
        Page::insert($sec8);
        $sec9 = $this->createSection('Core Logic');
        Page::insert($sec9);
        $sec10 = $this->createSection('Other Folders');
        Page::insert($sec10);
        $this->setNextTopicLink('learn/topics/basic-usage', 'Basic Usage');
        $this->setPrevTopicLink('learn/topics/introduction', 'Introduction');
        $this->displayView();
    }
}
new FrameworkStructureView();
