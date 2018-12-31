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
use phpStructs\html\PNode;
/**
 * Description of DownloadView
 *
 * @author Ibrahim
 */
class DownloadView extends WebFioriPage{
    public function __construct() {
        parent::__construct();
        Page::title('Download');
        Page::siteName('WebFiori');
        Page::description('Links to download WebFiori Framework.');
        
        $parag1 = new PNode();
        $parag1->addText('The latest release of the framework is v1.0.1. '
                . 'You Please click <a>here</a> to download a zip file that contains all '
                . 'what you need.');
        Page::insert($parag1);
        
        $parag2 = new PNode();
        $parag2->addText('Also, you can go to GitHub repo to get access for '
                . 'current and future releses.');
        Page::insert($parag2);
        
        Page::render();
    }
}
new DownloadView();
