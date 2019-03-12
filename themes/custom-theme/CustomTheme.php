<?php
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HeadNode;
use phpStructs\html\TableRow;
use webfiori\entity\Page;
class CustomTheme extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setName('Custom Theme');
        $this->setDirectoryName('custom-theme');
        $this->setCssDirName('css');
        $this->setJsDirName('js');
        $this->setImagesDirName('images');
    }
    /**
     * Creates HTML element.
     * @param array $options An associative array of options. The available options are: 
     * 1- type: type of the node. The method only support the type 'table'.
     * 2- data: An indexed array that contains table data. Used only if the 
     * type is 'table'.
     * @return HTMLNode
     */
    public function createHTMLNode($options = array()) {
        if(isset($options['type'])){
            $type = $options['type'];
            if($type == 'table'){
                //we create our table
                $table = new HTMLNode('table');
                foreach ($options['data'] as $rowData){
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
                $node = new HTMLNode('div');
                return $node;
            }
        }
        else{
            $node = new HTMLNode('div');
            return $node;
        }
    }

    public function getAsideNode() {
        $aside = new HTMLNode();
        $aside->addTextNode('Aside Section');
        return $aside;
    }

    public function getFooterNode() {
        $footer = new HTMLNode();
        $footer->addTextNode('Footer Section');
        return $footer;
    }

    public function getHeadNode() {
        $head = new HeadNode();
        //getting CSS directory
        $cssDir = Page::cssDir();
        //adding the CSS file to theme resource files set
        $head->addCSS($cssDir.'/theme.css');
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        $header->addTextNode('Header Section');
        return $header;
    }
}