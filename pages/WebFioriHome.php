<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views;
use webfiori\entity\Page;
use webfiori\views\WebFioriPage;
use phpStructs\html\HTMLNode;
/**
 * Description of WebFioriHome
 *
 * @author Ibrahim
 */
class WebFioriHome extends WebFioriPage{
    public function __construct() {
        parent::__construct();
        Page::title('WebFiori Home');
        Page::siteName('WebFiori');
        Page::description('WebFiori Framework. Built to make the web blooming.');
        Page::insert(HTMLNode::createTextNode('Coming Soon.'));
        Page::render();
    }
}
new WebFioriHome();
