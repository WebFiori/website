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
        Page::render();
    }
}
