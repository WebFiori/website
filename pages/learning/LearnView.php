<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn;
use webfiori\entity\Page;
use webfiori\views\WebFioriPage;
use phpStructs\html\HTMLNode;
use webfiori\views\learn\LearningAsideMenu;
/**
 * Description of LearnView
 *
 * @author Ibrahim
 */
class LearnView extends WebFioriPage{
    public function __construct($title='Learnning Center',$desc='Here you will find a list of topics that you might '
                . 'need to learn in order to use WebFiori Framework in the most '
                . 'effictive way.') {
        parent::__construct();
        Page::title($title);
        Page::description($desc);
        Page::document()->getChildByID('side-content-area')->addChild(LearningAsideMenu::createAsideNav());
    }
    public function display() {
        Page::render();
    }
}
