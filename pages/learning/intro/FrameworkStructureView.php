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
            'description'=>'Learn about the Architecture of the framework.',
            'active-aside'=>2
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
        $sec2->addChild($this->createParagraph('The folder <span style="font-family:monospace">'
                . '\'/conf\'</span> contains main configuration classes. The files are '
                . 'used to control main website attributes such as the name of '
                . 'the website, main language and database connections. Also, they '
                . 'control SMTP accounts settings.'));
        $sec2->addChild($this->createParagraph('There are 3 main configuration classes:'));
        $ul = new UnorderedList();
        $sec2->addChild($ul);
        $ul->addListItem('The class <a href="docs/webfiori/conf/Config" target="_blank">Config</a>.',FALSE);
        $ul->addListItem('The class <a href="docs/webfiori/conf/SiteConfig" target="_blank">SiteConfig</a>.',FALSE);
        $ul->addListItem('The class <a href="docs/webfiori/conf/MailConfig" target="_blank">MailConfig</a>.',FALSE);
        $sec3 = $this->createSection('Initialization Files');
        Page::insert($sec3);
        $sec3->addChild($this->createParagraph('The folder <span style="font-family:monospace">'
                . '\'/ini\'</span> contain initialization classes. The classes are '
                . 'used to initialize autoload directories, CRON jobs and privileges. The developer '
                . 'can modify the code inside the classes as he need. The classes are:'));
        $ul2 = new UnorderedList();
        $sec3->addChild($ul2);
        $ul2->addListItem('The class <a href="docs/webfiori/ini/InitAutoLoad" target="_blank">InitAutoLoad</a>.',FALSE);
        $ul2->addListItem('The class <a href="docs/webfiori/ini/InitCron" target="_blank">InitCron</a>.',FALSE);
        $ul2->addListItem('The class <a href="docs/webfiori/ini/InitPrivileges" target="_blank">InitPrivileges</a>.',FALSE);
        $sec4 = $this->createSection('System Entities');
        $sec4->addChild($this->createParagraph(''
                . 'Framework entities are classes that the framework '
                . 'is using to function. They are located inside the folder '
                . '<span style="font-family:monospace">\'/entity\'</span>. In addition '
                . 'to classes, this folder contains all core libraries that '
                . 'the framework is depending on. The libraries include the following '
                . 'ones: '
                . ''));
        $ul3 = new UnorderedList();
        $sec4->addChild($ul3);
        $ul3->addListItem('<a href="docs/jsonx" target="_blank">JsonX Library:</a> Used to create well formatted JSON strings.',FALSE);
        $ul3->addListItem('<a href="docs/phMysql" target="_blank">PhMySQL Library:</a> Used to construct MySQL Schemas and queries in simple manner.',FALSE);
        $ul3->addListItem('<a href="docs/phpStructs" target="_blank">phpStructs Library:</a> A library that provide basic data structures such as a '
                . 'linked list and stack in addition '
                . 'to classes that can be used to create HTML documents using PHP.',FALSE);
        $ul3->addListItem('<a href="docs/restEasy" target="_blank">RESTEasy Library:</a> A library that can make the process of creating web '
                . 'APIs very simple.',FALSE);
        Page::insert($sec4);
        $sec6 = $this->createSection('Themes');
        Page::insert($sec6);
        $sec6->addChild($this->createParagraph('The folder '
                . '<span style="font-family:monospace">\'/themes\'</span> will contain '
                . 'themes. Themes in WebFiori Framework works like a UI template that '
                . 'can be used to give a unified, easy to modify look and feel. In '
                . 'addition to that, themes can work like a plugins that can '
                . 'provide additional functionality to a web page.'));
        $sec7 = $this->createSection('Web Pages (Views)');
        Page::insert($sec7);
        $sec7->addChild($this->createParagraph(''
                . 'One of the core features of any website or web application is '
                . 'the pages that users can see. The folder <span style="font-family:monospace">\'/pages\'</span> is '
                . 'used as one place for creating web pages. A web page can be a simple HTML '
                . 'file or it can be a complex page that uses PHP. For each page, there must '
                . 'be a route created for it using the method '
                . '<a href="docs/webfiori/entity/router/Router#view" target="_blank">Router::view()</a> of the class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a>.'
                . ''));
        $sec8 = $this->createSection('Web APIs');
        Page::insert($sec8);
        $sec8->addChild($this->createParagraph(''
                . 'Web APIs (or web services) are used to help in creating web applications '
                . 'or in creating mobile apps. The framework supports the '
                . 'creation of web APIs that uses JSON notation.'
                . ''));
        $sec8->addChild($this->createParagraph('The folder '
                . '<span style="font-family:monospace">\'/apis\'</span> is a place '
                . 'where developer can create end points of the API. The end points '
                . 'are simply PHP files that extends the class <a href="docs/restEasy/WebAPI" target="_blank">WebAPI</a> '
                . 'or the class <a href="docs/webfiori/entity/ExtendedWebAPI" target="_blank">ExtendedWebAPI</a>. '
                . 'For each API, there must '
                . 'be a route created for it using the method '
                . '<a href="docs/webfiori/entity/router/Router#api" target="_blank">Router::api()</a> of the class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a>.'
                . ''));
        $sec9 = $this->createSection('Core Logic');
        Page::insert($sec9);
        $sec9->addChild($this->createParagraph('The folder '
                . '<span style="font-family:monospace">\'/functions\'</span> contains '
                . 'basic classes that can be used to alter the 3 '
                . 'main configuration files. In addition, it contains one class '
                . 'that can be used to manage sessions and connect to '
                . 'database. The developers can extend the class <a href="docs/webfiori/functions/Functions" target="_blank">Functions</a> '
                . 'to add database support to the website.'));
        $sec10 = $this->createSection('Other Folders');
        Page::insert($sec10);
        $sec10->addChild($this->createParagraph(''
                . 'In addition to the given folders, '
                . 'there are more additional folders that provide '
                . 'extra functionality. The folders are:'
                . ''));
        $ul4 = new UnorderedList();
        $sec10->addChild($ul4);
        $ul4->addListItem('<a style="font-family:monospace" href="docs/webfiori/entity/mail" target="_blank">/entity/mail</a>: Provide classes for sending email messages.',FALSE);
        $ul4->addListItem('<a style="font-family:monospace" href="docs/webfiori/entity/cron" target="_blank">/entity/cron</a>: Provide classes which can be used to create CRON tasks.',FALSE);
        $ul4->addListItem('<a style="font-family:monospace" href="docs/webfiori/entity/router" target="_blank">/entity/router</a>: Provide classes for routing sub-system.',FALSE);
        $ul4->addListItem('<span style="font-family:monospace">/logs</span>: A folder that will contain text log files which is created by the class <a href="docs/webfiori/entity/Logger" target="_blank">Logger</a>.',FALSE);
        $ul4->addListItem('<span style="font-family:monospace">/res</span>: A folder that can be used to add system resource files such as JS or CSS files.',FALSE);
        $this->setNextTopicLink('learn/topics/basic-usage', 'Basic Usage');
        $this->setPrevTopicLink('learn/topics/introduction', 'Introduction');
        $this->displayView();
    }
}
new FrameworkStructureView();
