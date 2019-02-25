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
class BasicUsageView extends IntroLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Basic Usage',
            'description'=>'The simplest way to use the framework.'
        ));
        $sec = $this->createSection('A Route and a View');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('The simplest way in using the framework is to '
                . 'create HTML web pages and add routes to each page. Pages in WebFiori Framework '
                . 'must be created inside the folder <span style="font-family:monospace">\'/pages\'</span>. '
                . 'It is possible to create your pages in different place but leave this '
                . 'for later.'));
        $sec->addChild($this->createParagraph('Lets assume that we have HTML page which hase '
                . 'the name <span style="font-family:monospace">\'index.html\'</span>. Also, '
                . 'let\'s assume tha the page has the following code in it:'));
        $code = new CodeSnippet();
        $code->setTitle('HTML Code');
        $code->setCode('<pre>'. str_replace('<', '&lt;', str_replace('>', '&gt;', ''
                . '<!DOCTYPE html>
<html>
    <head>
        <title>Hello</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <p>
                Welcome to My Home Page
            </p>
            <p>
                This page is served using 
                <a href="https://programmingacademia.com/webfiori">WebFiori Framework</a>
            </p>
        </div>
    </body>
</html>'
                . '')).'</pre>');
        $sec->addChild($code);
        $sec2 = $this->createSection('Key Features:');
        $ul = new UnorderedList();
        $sec2->addChild($ul);
        Page::insert($sec2);
        $this->displayView();
    }
}
new BasicUsageView();
