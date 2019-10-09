<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\routing;

/**
 * Description of GenericRoutesView
 *
 * @author Eng.Ibrahim
 */
class GenericRoutesView extends RoutingLearnView{
    public function __construct($x = array()) {
        parent::__construct(array(
            'title'=>'Generic Routes',
            'description'=>'Learn about generic routes and how to create then in WebFiori Framework.',
            'active-aside'=>3
        ));
        $sec1 = $this->createSection('The Basic Idea');
        $sec2 = $this->createSection('Using Generic Routes');
    }
}
