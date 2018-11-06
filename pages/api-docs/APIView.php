<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIView
 *
 * @author Ibrahim
 */
class APIView {
    private $apiBase;
    /**
     * 
     * @param string $name
     */
    public function __construct() {
        $this->apiBase = 'docs/1.0/';
        Page::theme('WebFiori Theme');
        Page::dir('ltr');
        Page::lang('en');
        $this->_createAsideNav();
    }
    public function setClassShortDesc($desc) {
        $this->getClassAPIObj()->setShortDescription($desc);
    }
    public function setClassLongDesc($desc){
        $this->getClassAPIObj()->setLongDescription($desc);
    }
    public function setVNum($vNum) {
        $this->getClassAPIObj()->setVersion($vNum);
    }
    public function classFuncCall($cName,$cPackage,$fName) {
        $cLink = $this->monoCL($cPackage, $cName);
        $fLink = $this->monoLink($this->getBaseURL().$cPackage.'/'.$cName.'#'.$fName, $fName.'()');
        return $cLink.$this->monoStr('::').$fLink;
    }
    /**
     * Creates aside navigation menu which contains 
     * all system classes along packages.
     */
    private function _createAsideNav(){
        $asideLinks = ViewRoutes::getAPIViewsRoutes();
        $aside = &Page::document()->getChildByID('side-content-area');
        $aside->addTextNode('<p>All Classes:</p>');
        $nav = new HTMLNode('nav');
        $aside->setAttribute('style', 'border: 1px solid;');
        $ul = new UnorderedList();
        $ul->setClassName('side-ul');
        $nav->addChild($ul);
        $aside->addChild($nav);
        $currentPackage = '';
        $newPackage = '';
        $packageUl = new UnorderedList();
        $packageLi = new ListItem(TRUE);
        foreach ($asideLinks as $link){
            if($currentPackage == ''){
                $currentPackage = $link['package'];
                $newPackage = $link['package'];
            }
            $newPackage = $link['package'];
            $expl = explode('/', $link['requested-url']);
            $linkNode = new LinkNode(trim(SiteConfig::get()->getBaseURL(), '/').$link['requested-url'], $expl[count($expl) - 1]);
            $li = new ListItem();
            $li->addChild($linkNode);
            if($currentPackage != $newPackage){
                $currentPackage = $newPackage;
                $packageUl = new UnorderedList();
                $packageUl->setClassName('side-ul');
                $packageLi = new ListItem();
                $packageLi->setText($currentPackage);
                $packageLi->addChild($packageUl);
                $ul->addChild($packageLi);
            }
            else{
                $packageUl->addChild($li);
            }
        }
    }
    /**
     * Returns a link to the same API view.
     * @return string
     */
    public function getLink() {
        return $this->getBaseURL().$this->getClassAPIObj()->getName();
    }
    /**
     * Returns the base URL for fetching all API views.
     * @return string
     */
    public function getBaseURL() {
        return $this->apiBase;
    }
    /**
     * Constructs a link to class API page using monospace font face.
     * @param string $package The package that the class belongs to.
     * @param string $name The name of the class.
     * @return string A link to class API view.
     */
    public function monoCL($package,$name) {
        return $this->monoLink($this->getBaseURL().$package.'/'.$name, $name);
    }
    /**
     * Constructs a link using monospace font face.
     * @param type $href The link.
     * @param type $label A label for the link.
     * @return type 
     */
    public function monoLink($href,$label) {
        return '<a class="mono" href="'.$href.'">'.$label.'</a>';
    }
    /**
     * Constructs a string using monospace as font face.
     * @param type $str
     * @return type
     */
    public function monoStr($str) {
        return '<span class="mono">'.$str.'</span>';
    }
    public function n() {
        return $this->monoStr('NULL');
    }
    public function t() {
        return $this->monoStr('TRUE');
    }
    public function f() {
        return $this->monoStr('FALSE');
    }
}
