<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\themes;

/**
 * Description of BeforeAfterEventsView
 *
 * @author Eng.Ibrahim
 */
class BeforeAfterEventsView extends ThemesLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'Before and After Loaded Callbacks',
            'description'=>'Learn about the callbacks that can be used before '
            . 'loading the theme or after loading the theme.',
            'active-aside'=>6,
        ));
    }
}
