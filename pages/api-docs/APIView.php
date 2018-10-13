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
abstract class APIView {
    private $apiBase;
    /**
     *
     * @var ClassAPI 
     */
    private $class;
    /**
     * 
     * @param string $name
     */
    public function __construct($name='Class',$package='',$vNum=null) {
        $this->apiBase = 'docs/1.0/';
        Page::theme('WebFiori Theme');
        Page::dir('ltr');
        Page::lang('en');
        $this->_createAsideNav();
        $this->class = new ClassAPI();
        $this->class->setName($name);
        $this->class->setPackage($package);
        $this->class->setVersion($vNum);
        $this->defineClassFunctions();
        $this->defineClassAttributes();
    }
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
    public function getLink() {
        return $this->getBaseURL().$this->getClassAPIObj()->getName();
    }
    public function getBaseURL() {
        return $this->apiBase;
    }
    /**
     * 
     * @return ClassAPI
     */
    public function &getClassAPIObj() {
        return $this->class;
    }
    public function monoCL($package,$name) {
        return $this->monoLink($this->getBaseURL().$package.'/'.$name, $name);
    }
    public function monoLink($href,$label) {
        return '<a class="mono" href="'.$href.'">'.$label.'</a>';
    }
    public function monoStr($str) {
        return '<span class="mono">'.$str.'</span>';
    }
    /**
     * 
     * @param array $array
     */
    public function addFunctionDef($array=array(
        'name'=>'',
        'access-modifier'=>'',
        'short-desc'=>'',
        'long-desc'=>'',
        'params'=>array(
            array(
                'name'=>'',
                'type'=>'',
                'is-optional'=>false,
                'description'=>''
                )
        ),
        'return-types'=>array(),
        'return-desc'=>''
    )) {
        $fName = isset($array['name']) ? (strlen($array['name']) > 0 ? $array['name'] : 'fName') : 'fName';
        $fAccessModifyer = isset($array['access-modifier']) ? (strlen($array['access-modifier']) > 0 ? $array['access-modifier'] : 'public') : 'public';
        $fShortDesc = isset($array['short-desc']) ? (strlen($array['short-desc']) > 0 ? $array['short-desc'] : 'Short Description') : 'Short Description';
        $fLongDesc = isset($array['long-desc']) ? (strlen($array['long-desc']) > 0 ? $array['long-desc'] : 'Short Description') : 'Short Description';
        $funcDescObj = new FunctionDef();
        $funcDescObj->setName($fName);
        $funcDescObj->setAccessModifier($fAccessModifyer);
        $funcDescObj->setLongDescription($fLongDesc);
        $funcDescObj->setShortDescription($fShortDesc);
        if(isset($array['params'])){
            foreach ($array['params'] as $param){
                $isOptional = isset($param['is-optional']) ? $param['is-optional'] === TRUE : FALSE;
                $funcDescObj->addFuncParam($param['name'], $param['type'], $param['description'],$isOptional);
            }
        }
        if(isset($array['return-types'])){
            $retDesc = isset($array['return-desc']) ? (strlen($array['return-desc']) > 0 ? $array['return-desc'] : 'Return Description') : 'Return Description';
            $funcDescObj->setReturns($array['return-types'], $retDesc);
        }
        $this->getClassAPIObj()->addFunction($funcDescObj);
    }
    /**
     * 
     * @param array $array
     */
    public function addAttributeDef($array=array(
        'name'=>'',
        'access-modifier'=>'',
        'short-desc'=>'',
        'long-desc'=>''
    )) {
        $attrName = isset($array['name']) ? (strlen($array['name']) > 0 ? $array['name'] : 'fName') : 'fName';
        $accessModifyer = isset($array['access-modifier']) ? (strlen($array['access-modifier']) > 0 ? $array['access-modifier'] : 'public') : 'public';
        $shortDesc = isset($array['short-desc']) ? (strlen($array['short-desc']) > 0 ? $array['short-desc'] : 'Short Description') : 'Short Description';
        $longDesc = isset($array['long-desc']) ? (strlen($array['long-desc']) > 0 ? $array['long-desc'] : 'Short Description') : 'Short Description';
        $attrDef = new AttributeDef();
        $attrDef->setName($attrName);
        $attrDef->setAccessModifier($accessModifyer);
        $attrDef->setLongDescription($shortDesc);
        $attrDef->setShortDescription($longDesc);
        $this->getClassAPIObj()->addAttribute($attrDef);
    }
    public abstract function defineClassFunctions();
    public abstract function defineClassAttributes();
}
