<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\views;
use webfiori\views\WebFioriPage;
use webfiori\entity\Page;
use phpStructs\html\PNode;
use WebFioriGUI;
/**
 * Description of NotFound
 *
 * @author Ibrahim
 */
class NotFound extends WebFioriPage{
    public function __construct() {
        parent::__construct();
        Page::title('404 - Not Found');
        Page::siteName('WebFiori');
        Page::description('Not found.');
        WebFioriGUI::createTitleNode('404 - Not Found');
        $parag1 = new PNode();
        $parag1->addText('The page that you are looking for was not found. '
                . 'Sorry about that.');
        Page::insert($parag1);
        http_response_code(404);
        Page::render();
    }
}
new NotFound();