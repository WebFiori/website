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
        $this->displayView();
    }
}
new Index();