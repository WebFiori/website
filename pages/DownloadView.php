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
use webfiori\WebFiori;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\LinkNode;
/**
 * Description of DownloadView
 *
 * @author Ibrahim
 */
class DownloadView extends WebFioriPage{
    public function __construct() {
        parent::__construct();
        Page::title('Download');
        Page::siteName('WebFiori Framework');
        Page::description('Download options of WebFiori Framework.');
        $this->_stableDownloads();
        $this->_betaDownloads();
        $this->_nextSteps();
        Page::render();
    }
    private function _stableDownloads() {
        $sec = new HTMLNode('section');
        $h = new HTMLNode('h1');
        $h->addTextNode('Stable Releases');
        $sec->addChild($h);
        $p1 = new PNode();
        $p1->addText('The latest release of the framework is version '
                . '1.0.0. You can click <a href="downloads/webfiori-v1.0.0-stable">here</a> in order to start the '
                . 'download process.');
        $sec->addChild($p1);
        Page::insert($sec);
    }
    private function _betaDownloads(){
        $sec = new HTMLNode('section');
        $h = new HTMLNode('h1');
        $h->addTextNode('Beta Releases');
        $sec->addChild($h);
        $p1 = new PNode();
        $p1->addText('Here you will find all beta releases. The given ones are '
                . 'not ready for production and might have bugs. The latest release '
                . 'is at the top.');
        $sec->addChild($p1);
        $ul = new UnorderedList();
        $ul->addChild($this->_createListItem('downloads/webfiori-v1.0.0-beta-2', 'WebFiori v1.0.0 Beta 2'));
        $ul->addChild($this->_createListItem('downloads/webfiori-v1.0.0-beta-1', 'WebFiori v1.0.0 Beta 1'));
        $sec->addChild($ul);
        Page::insert($sec);
    }
    private function _nextSteps(){
        $sec = new HTMLNode('section');
        $h = new HTMLNode('h1');
        $h->addTextNode('What is Next?');
        $sec->addChild($h);
        $p1 = new PNode();
        $p1->addText('Once you finsh downloading the framework, you can visit '
                . '<a href="learn" >Learning Center</a> in order to start your development process.');
        $sec->addChild($p1);
        Page::insert($sec);
    }

    private function _createListItem($link,$label) {
        $li00 = new ListItem();
        $link00 = new LinkNode($link, $label);
        $li00->addChild($link00);
        return $li00;
    }
}
new DownloadView();
