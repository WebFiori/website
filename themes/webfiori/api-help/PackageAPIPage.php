<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIPackagePage
 *
 * @author Ibrahim
 */
class PackageAPIPage {
    /**
     *
     * @var PackageAPI 
     */
    private $package;
    /**
     * 
     * @param PackageAPI $package
     */
    public function __construct($package) {
        Page::lang('en');
        Page::dir('ltr');
        Page::title('Package '.$package->getPackageName());
        Page::document()->getBody()->setClassName('api-page');
        Page::description($package->getShortDescription());
        Page::document()->getHeadNode()->addCSS(Page::cssDir().'/api-page.css');
        WebFioriGUI::createTitleNode('Package '.$package->getPackageName());
        $this->createPackageDescriptionNode($package);
        Page::render();
    }
    /**
     * 
     * @param PackageAPI $package
     */
    private function createPackageDescriptionNode($package) {
        $node = WebFioriGUI::createRowNode(FALSE, FALSE);
        $descNode = new PNode();
        $descNode->addText($package->getLongDescription());
        $node->addChild($descNode);
        Page::insert($node);
    }
}
