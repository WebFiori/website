<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views;
use webfiori\entity\Page;
use webfiori\views\WebFioriPage;

/**
 * Description of LearnView
 *
 * @author Ibrahim
 */
class LearnView extends WebFioriPage{
    public function __construct() {
        parent::__construct();
        Page::title('Learnning Center');
        Page::siteName('WebFiori');
        Page::description('Here you will find a list of topics that you might '
                . 'need to learn in order to use WebFiori Framework in the most '
                . 'effictive way.');
        Page::render();
    }
}
