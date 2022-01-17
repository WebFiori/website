<?php
namespace webfiori\views;

use webfiori\views\WebFioriPage;
use webfiori\ui\UnorderedList;

/**
 * Description of DownloadView
 *
 * @author Ibrahim
 */
class DownloadView extends WebFioriPage{
    public function __construct() {
        parent::__construct([
            'title' => 'Download',
            'description' => 'Download options of WebFiori Framework.'
        ]);
        $this->_stableDownloads();
        $this->_betaDownloads();
        $this->_nextSteps();
    }
    private function _stableDownloads() {
        $sec = $this->createSection('Latest Stable Release',3);
        $sec->addChild($this->createParagraph('The latest release of the framework is version '
                . '2.4.6. You can click <a href="https://github.com/WebFiori/framework/releases/download/v2.4.6/webfiori-v2.4.6-stable.zip">here</a> in order to start the '
                . 'download process.'));
        $row = $this->insert('v-row');
        $row->addChild('v-col', [
            'cols' => 12
        ])->addChild($sec);
    }
    private function _betaDownloads(){
        $row = $this->insert('v-row');
        
        $sec = $this->createSection('Previous Releases and Beta Releases',3);
        $row->addChild('v-col', ['cols' => 12])->addChild($sec);
        $sec->addChild($this->createParagraph('Here you will find all beta and historical releases. The given ones are '
                . 'not good option for production and might have bugs.'));
        $ul = new UnorderedList();
        $ul->addListItems(array(
            //'<a href="https://github.com/WebFiori/framework/releases/download/v2.4.6/webfiori-v2.4.6.zip">WebFiori v2.4.6 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.4.5/webfiori-v2.4.5.zip">WebFiori v2.4.5 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.4.4/webfiori-v2.4.4.zip">WebFiori v2.4.4 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.4.3/webfiori-v2.4.3.zip">WebFiori v2.4.3 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.4.2/webfiori-v2.4.2.zip">WebFiori v2.4.2 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.4.1/webfiori-v2.4.1.zip">WebFiori v2.4.1 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.4.0/webfiori-v2.4.0.zip">WebFiori v2.4.0 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.3.5/webfiori-v2.3.5.zip">WebFiori v2.3.5 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.3.4/webfiori-v2.3.4.zip">WebFiori v2.3.4 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.3.3/webfiori-v2.3.3.zip">WebFiori v2.3.3 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.3.2/webfiori-v2.3.2.zip">WebFiori v2.3.2 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.3.1/webfiori-v2.3.1.zip">WebFiori v2.3.1 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.3.0/webfiori-v2.3.0.zip">WebFiori v2.3.0 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.2.0/webfiori-v2.2.0.zip">WebFiori v2.2.0 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.1.0/webfiori-v2.1.0.zip">WebFiori v2.1.0 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.0.0/webfiori-v2.0.0.zip">WebFiori v2.0.0 Stable</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.0.0-beta.3/webfiori-v2.0.0-beta.3.zip">WebFiori v2.0.0 beta.3</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.0.0-beta.2/webfiori-v2.0.0-beta.2.zip">WebFiori v2.0.0 beta.2</a>',
            '<a href="https://github.com/WebFiori/framework/releases/download/v2.0.0-beta.1/webfiori-v2.0.0-beta.1.zip">WebFiori v2.0.0 beta.1</a>',
            '<a href="downloads/webfiori-v1.1.0-beta-3">WebFiori v1.1.0 beta-3</a>',
            '<a href="downloads/webfiori-v1.1.0-beta-2">WebFiori v1.1.0 beta-2</a>',
            '<a href="downloads/webfiori-v1.1.0-beta-1">WebFiori v1.1.0 beta-1</a>',
            //'<a href="downloads/webfiori-v1.0.9-stable">WebFiori v1.0.9 Stable</a>',
            '<a href="downloads/webfiori-v1.0.8-stable">WebFiori v1.0.8 Stable</a>',
            '<a href="downloads/webfiori-v1.0.7-stable">WebFiori v1.0.7 Stable</a>',
            '<a href="downloads/webfiori-v1.0.6-stable">WebFiori v1.0.6 Stable</a>',
            '<a href="downloads/webfiori-v1.0.5-stable">WebFiori v1.0.5 Stable</a>',
            '<a href="downloads/webfiori-v1.0.4-stable">WebFiori v1.0.4 Stable</a>',
            '<a href="downloads/webfiori-v1.0.3-stable">WebFiori v1.0.3 Stable</a>',
            '<a href="downloads/webfiori-v1.0.2-stable">WebFiori v1.0.2 Stable</a>',
            '<a href="downloads/webfiori-v1.0.2-beta-1">WebFiori v1.0.2 Beta 1</a>',
            '<a href="downloads/webfiori-v1.0.0-stable">WebFiori v1.0.0 Stable</a>',
            '<a href="downloads/webfiori-v1.0.0-beta-2">WebFiori v1.0.0 Beta 2</a>',
            '<a href="downloads/webfiori-v1.0.0-beta-1">WebFiori v1.0.0 Beta 1</a>'
        ), FALSE);
        $sec->addChild($ul);
    }
    private function _nextSteps(){
        $row = $this->insert('v-row');
        
        $sec = $this->createSection('What is Next?',3);
        $row->addChild('v-col', ['cols' => 12])->addChild($sec);
        $sec->addChild($this->createParagraph('Once you finsh downloading the framework, you can visit '
                . '<a href="learn" >Learning Center</a> in order to start your development process.'));
        
    }
}
return __NAMESPACE__;
