<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\intro;

/**
 * Description of MoreAboutViewsView
 *
 * @author Ibrahim
 */
class MoreAboutViewsView extends IntroLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'More About Views',
            'description'=>'Learn more about views in WebFiori Framework and '
            . 'how to use the class \'Page\'.',
            'active-aside'=>3
        ));
        $this->displayView();
    }
}
new MoreAboutViewsView();
