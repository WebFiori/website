<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\themes;
use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;
/**
 * Description of MethodCreateNodeView
 *
 * @author Eng.Ibrahim
 */
class MethodCreateNodeView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Using the Method Theme::createHTMLNode()',
            'description'=>'Learn the basics of how to use the method Using the Method Theme::createHTMLNode() '
            . 'in order to create custom UI components.',
            'active-aside'=>6
        ));
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        Page::insert($this->createParagraph(''
                . 'As a UI developer, your pages will have many different '
                . 'UI components such as tables, input elements and many others. '
                . 'Some of the components will be generic and can be used almost '
                . 'in any page. For example, you might have a table which '
                . 'can have different data for different views. The method '
                . '<a href="docs/webfiori/entity/Theme#createHTMLNode" target="_blank">Theme::createHTMLNode()</a> can be used to create such '
                . 'a generic table. '
                . ''));
        Page::insert($this->createParagraph(''
                . 'The main aim of this method is to give the developers the ability '
                . 'to create generic HTML elements which can be used in different '
                . 'places. The idea is that the creator of the theme can specify '
                . 'what type of elements the method can create. Theme developer '
                . 'must implement this method in a way that it returns an instance '
                . 'of the class <a href="docs/phpStructs/html/HTMLNode" target="_blank">HTMLNode</a>.'
                . ''));
        Page::insert($this->createParagraph(''
                . 'What we will be doing is to show you how to use this method. '
                . 'Simply, what we will be doing is to use the theme that we have created '
                . 'in the last lesson and build in top of it. The code that we have '
                . 'created for our simple theme is the following:'
                . ''));
        $code1 = new CodeSnippet();
        $code1->setTitle('PHP Code');
        $code1->setCode('
<?php
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
        $this->setDirectoryName(\'custom-theme\');
        $this->setCssDirName(\'css\');
        $this->setJsDirName(\'js\');
        $this->setImagesDirName(\'images\');
    }
    public function createHTMLNode($options = array()) {
        $node = new HTMLNode();
        $node->addTextNode(\'Custom Node\');
        return $node;
    }

    public function getAsideNode() {
        $aside = new HTMLNode();
        $aside->addTextNode(\'Aside Section\');
        return $aside;
    }

    public function getFooterNode() {
        $footer = new HTMLNode();
        $footer->addTextNode(\'Footer Section\');
        return $footer;
    }

    public function getHeadNode() {
        $head = new HeadNode();
        //getting CSS directory
        $cssDir = Page::cssDir();
        //adding the CSS file to theme resource files set
        $head->addCSS($cssDir.\'/theme.css\');
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        $header->addTextNode(\'Header Section\');
        return $header;
    }
}');
        Page::insert($code1);
        Page::insert($this->createParagraph(''
                . 'What we will be doing is to make the method return HTML node that '
                . 'represents a table. We will try to make the table generic and '
                . 'accepts any number of rows and columns. Now that we have selected '
                . 'our design goal, we will start by modifying the body of the method '
                . '<a href="docs/webfiori/entity/Theme#createHTMLNode" target="_blank">Theme::createHTMLNode()</a>. '
                . ''));
        Page::insert($this->createParagraph(''
                . 'Since this method must support different types of HTML elements, '
                . 'we need to think of a way to add this option. The best solution is to '
                . 'add the index \'type\' in the passed options array (You may think of '
                . 'different way). If the \'type\' index isset and has the value \'table\', we '
                . 'will create the table element and return it. Other than that, we '
                . 'will return a &lt;div&gt; element. The code bellow shows how the body of '
                . 'the method will look like after applying those changes.'
                . ''));
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP Code');
        $code2->setCode('    public function createHTMLNode($options = array()) {
        if(isset($options[\'type\'])){
            $type = $options[\'type\'];
            if($type == \'table\'){
                //we create our table
                $table = new HTMLNode(\'table\');
                return $table;
            }
            else{
                //unsupported node type. Return div
                $node = new HTMLNode(\'div\');
                return $node;
            }
        }
        else{
            $node = new HTMLNode(\'div\');
            return $node;
        }
    }');
        Page::insert($code2);
        Page::insert($this->createParagraph(''
                . 'Now that we have our table element created, we need to add '
                . 'rows to it. Let\'s assume that table data will be in the '
                . 'index \'data\'. This index will contain table data as an '
                . 'indexed array. Each index will represent a row in owr table. '
                . 'So, we must loop through the element of the array as shown.'
                . ''));
        $code3 = new CodeSnippet();
        $code3->setTitle('PHP Code');
        $code3->setCode('    public function createHTMLNode($options = array()) {
        if(isset($options[\'type\'])){
            $type = $options[\'type\'];
            if($type == \'table\'){
                //we create our table
                $table = new HTMLNode(\'table\');
                foreach ($options[\'data\'] as $rowData){
                    //create table rows here
                }
                return $table;
            }
            else{
                //unsupported node type. Return div
                $node = new HTMLNode(\'div\');
                return $node;
            }
        }
        else{
            $node = new HTMLNode(\'div\');
            return $node;
        }
    }');
        Page::insert($code3);
        Page::insert($this->createParagraph(''
                . 'Now we will start by creating table rows and add our '
                . 'data to the table. To create a table row, we can use the '
                . 'class <a href="docs/phpStructs/html/TableRow" target="_blank">TableRow</a>. '
                . 'Simply, we will first import this class, create an instance of '
                . 'the class as needed, add cell data using the method '
                . '<a href="docs/phpStructs/html/TableRow#addCell" target="_blank">TableRow::addCell()</a> '
                . 'and finally add the row '
                . 'to the table. '
                . ''
                . ''));
        Page::insert($this->createParagraph(''
                . 'Once we finish the last steps, the full theme code will '
                . 'look like the following.'
                . ''));
        $code4 = new CodeSnippet();
        $code4->setTitle('PHP Code');
        $code4->setCode('<?php
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HeadNode;
use phpStructs\html\TableRow;
use webfiori\entity\Page;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName(\'Custom Theme\');
        $this->setDirectoryName(\'custom-theme\');
        $this->setCssDirName(\'css\');
        $this->setJsDirName(\'js\');
        $this->setImagesDirName(\'images\');
    }
    /**
     * Creates HTML element.
     * @param array $options An associative array of options. The available options are: 
     * 1- type: type of the node. The method only support the type \'table\'.
     * 2- data: An indexed array that contains table data. Used only if the 
     * type is \'table\'.
     * @return HTMLNode
     */
    public function createHTMLNode($options = array()) {
        if(isset($options[\'type\'])){
            $type = $options[\'type\'];
            if($type == \'table\'){
                //we create our table
                $table = new HTMLNode(\'table\');
                foreach ($options[\'data\'] as $rowData){
                    //create table rows here
                    $row = new TableRow();
                    foreach ($rowData as $cellData){
                        $row->addCell($cellData);
                    }
                    $table->addChild($row);
                }
                return $table;
            }
            else{
                //unsupported node type. Return div
                $node = new HTMLNode(\'div\');
                return $node;
            }
        }
        else{
            $node = new HTMLNode(\'div\');
            return $node;
        }
    }

    public function getAsideNode() {
        $aside = new HTMLNode();
        $aside->addTextNode(\'Aside Section\');
        return $aside;
    }

    public function getFooterNode() {
        $footer = new HTMLNode();
        $footer->addTextNode(\'Footer Section\');
        return $footer;
    }

    public function getHeadNode() {
        $head = new HeadNode();
        //getting CSS directory
        $cssDir = Page::cssDir();
        //adding the CSS file to theme resource files set
        $head->addCSS($cssDir.\'/theme.css\');
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        $header->addTextNode(\'Header Section\');
        return $header;
    }
}');
        Page::insert($code4);
        Page::insert($this->createParagraph(''
                . 'The only step remaining is to see the result of what we have '
                . 'done so far. As we did last time, we will create a '
                . '<a href="learn/topics/more-about-views" target="_blank">view</a>, '
                . 'add a <a href="learn/topics/routing" target="_blank">route</a> to it, and load our theme. The '
                . 'only different this time is that we will add some tables '
                . 'to the body of the page. We will use the code from last lesson and modify it a '
                . 'little bit.'
                . ''));
        $code5 = new CodeSnippet();
        $code5->setTitle('PHP Code');
        $code5->setCode('<?php
namespace examples\views;
use webfiori\entity\Page;
class ExamplePage{
    public function __construct() {
        //loading the theme using its name
        Page::theme(\'Custom Theme\');
        //setting page title
        Page::title(\'Example Page\');
        //setting the description of the page
        Page::description(\'An example page.\');
        
        //create table using the theme
        $table1 = Page::theme()->createHTMLNode(array(
            \'type\'=>\'table\',
            \'data\'=>array(
                array(\'Fruit\',\'Pet\',\'City\'),
                array(\'Orange\',\'Dog\',\'Dammam\'),
                array(\'Apple\',\'Cat\',\'Al Ahsa\'),
            )
        ));
        //add border to show the table
        $table1->setAttribute(\'border\',\'1\');
        Page::insert($table1);
        Page::render();
    }
}
//initialize the view
new ExamplePage();');
        Page::insert($code5);
        Page::insert($this->createParagraph(''
                . 'If we view the page in any web browser, it will look '
                . 'like the following.'
                . ''));
        Page::insert($this->createImag('res/images/CustomHTMLNode.png', 'HTML Node Test'));
        Page::insert($this->createParagraph('As you can see, A '
                . 'HTML table element was created for us. '
                . 'We can now use the method to create different table sizes.'
                . ' Full source code of the example can be found in <a target="_blank" href="https://github.com/usernane/webfiori-examples/tree/master/creating-theme-2">GitHub</a>.'));
        $this->setPrevTopicLink('learn/topics/themes/create-simple-theme', 'Creating a Simple Theme');
        $this->displayView();
    }
}
new MethodCreateNodeView();
