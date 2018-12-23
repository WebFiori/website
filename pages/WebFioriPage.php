<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views;
use webfiori\entity\Page;
/**
 * Description of WebFioriPage
 *
 * @author Ibrahim
 */
class WebFioriPage {
    public function __construct() {
        Page::theme('WebFiori Theme');
    }
}
