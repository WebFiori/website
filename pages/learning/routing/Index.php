<?php
namespace webfiori\views\learn\routing;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author Ibrahim
 */
class Index extends RoutingLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Routing',
            'description'=>'Learn about the basics of routing in '
            . 'WebFiori Framework.'
        ));
        $this->createParagraph('One of the essential parts of the framework is routing. '
                . 'Routing in simple trems is sending user request to its correct '
                . 'destination. The developer can use the class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a>.');
        $this->createParagraph('After finishing the following set of topics, you will '
                . 'be able to understand how routing sub-system works and create '
                . 'your own custom routes.');
        
        $this->displayView();
    }
}
new Index();