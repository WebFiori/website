<?php
namespace themes\webfioriSite;

use themes\vuetifyCore\VuetifyThemeCore;
use webfiori\ui\HTMLNode;
use themes\webfioriSite\AsideSection;
use themes\webfioriSite\FooterSection;
use themes\webfioriSite\HeadSection;
use themes\webfioriSite\HeaderSection;

class WebFioriWebsiteTheme extends VuetifyThemeCore {
    /**
     * Creates new instance of the class.
     */
    public function __construct(){
        parent::__construct('Super Theme');
        //TODO: Set the properties of your theme.
        //$this->setName('Super Theme');
        //$this->setVersion('1.0');
        //$this->setAuthor('Me');
        //$this->setDescription('My Super Cool Theme.');
        //$this->setAuthorUrl('https://me.com');
        //$this->setLicenseName('MIT');
        //$this->setLicenseUrl('https://opensource.org/licenses/MIT');
        //$this->setCssDirName('css');
        //$this->setJsDirName('js');
        //$this->setImagesDirName('images');
    }
    /**
     * Returns an object of type 'HTMLNode' that represents aside section of the page. 
     *
     * @return HTMLNode|null An object of type 'HTMLNode'. If the theme has no aside
     * section, the method might return null.
     */
    public function getAsideNode() {
        return new AsideSection($this->getPage());
    }
    /**
     * Returns an object of type 'HTMLNode' that represents footer section of the page.
     *
     * @return HTMLNode|null An object of type 'HTMLNode'. If the theme has no footer
     * section, the method might return null.
     */
    public function getFooterNode() {
        return new FooterSection($this->getPage());
    }
    /**
     * Returns an object of type HeadNode that represents HTML &lt;head&gt; node.
     *
     * @return HeadNode
     */
    public function getHeadNode() {
        return new HeadSection($this->getPage());
    }
    /**
     * Returns an object of type HTMLNode that represents header section of the page.
     *
     * @return HTMLNode|null @return HTMLNode|null An object of type 'HTMLNode'. If the theme has no header
     * section, the method might return null.
     */
    public function getHeaderNode() {
        return new HeaderSection($this->getPage());
    }
}
return __NAMESPACE__;
