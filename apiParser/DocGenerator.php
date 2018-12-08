<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\apiParser\ClassAPI;
use webfiori\entity\Util;
use webfiori\entity\Page;
use phpStructs\Stack;
use phpStructs\html\HTMLNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use Exception;
/**
 * Description of DocGenerator
 *
 * @author Ibrahim
 */
class DocGenerator {
    private $linksArr;
    private $classesLinksByPackage;
    private $apiReadersArr;
    private $baseUrl;
    public function __construct($options=array()) {
        if(isset($options['path'])){
            $options['path'] = str_replace('/', '\\', $options['path']);
            $this->baseUrl = isset($options['base-url']) ? $options['base-url']:'';
            if(Util::isDirectory($options['path'])){
                $classes = $this->_scanPathForFiles($options['path']);
                $this->linksArr = array();
                $this->classesLinksByPackage = array();
                $this->apiReadersArr = array();
                foreach ($classes as $classPath){
                    $this->apiReadersArr[] = new APIReader($classPath);
                }
                $this->_buildLinks();
                $siteName = isset($options['site-name']) && strlen($options['site-name']) > 0 ?
                        $options['site-name'] : 'Docs';
                
                foreach ($this->apiReadersArr as $reader){
                    Page::theme($options['theme']);
                    Page::siteName($siteName);
                    $classAPI = new ClassAPI($reader,$this->linksArr);
                    $classAPI->setBaseURL($this->baseUrl);
                    $page = new APIPage($classAPI);
                    $this->_createAsideNav();
                    $page->createHTMLFile(ROOT_DIR);
                    Page::reset();
                }
            }
            else{
                throw new Exception('Given path is invalid.');
            }
        }
        else{
            throw new Exception('Classes path is not set.');
        }
    }
    private function _buildLinks() {
        foreach ($this->apiReadersArr as $apiReader){
            $packageLink = $apiReader->getPackage();
            $packageLink2 = str_replace('.', '/', $packageLink);
            $cName = $apiReader->getClassName();
            if($packageLink2 === ''){
                $classLink = $this->baseUrl.'/'.$cName;
            }
            else{
                $classLink = $this->baseUrl.'/'.$packageLink2.'/'.$cName;
            }
            $packageName = strlen($apiReader->getPackage()) > 0 ? $apiReader->getPackage() : 'default';
            $this->linksArr[$cName] = '<a class="mono" href="'.$classLink.'" target="_blank">'.$cName.'</a>';
            $this->classesLinksByPackage[$packageName][] = $this->linksArr[$cName];
            foreach ($apiReader->getConstantsNames() as $name){
                $this->linksArr[$cName.'::'.$name] = '<a class="mono" href="'.$classLink.'#'.$name.'" target="_blank">'.$cName.'::'.$name.'</a>';
            }
            foreach ($apiReader->getFunctionsNames() as $name){
                $this->linksArr[$cName.'::'.$name.'()'] = '<a class="mono" href="'.$classLink.'#'.$name.'" target="_blank">'.$cName.'::'.$name.'()</a>';
            }
        }
    }
    /**
     * Creates aside navigation menu which contains 
     * all system classes along packages.
     */
    private function _createAsideNav(){
        $aside = &Page::document()->getChildByID('side-content-area');
        $aside->addTextNode('<p>All Classes:</p>');
        $nav = new HTMLNode('nav');
        $aside->setAttribute('style', 'border: 1px solid;');
        $ul = new UnorderedList();
        $ul->setClassName('side-ul');
        $nav->addChild($ul);
        $aside->addChild($nav);
        foreach ($this->classesLinksByPackage as $packageName => $packageClasses){
            $packageLi = new ListItem();
            $packageLi->setText($packageName);
            $packageUl = new UnorderedList();
            $packageLi->addChild($packageUl);
            foreach ($packageClasses as $classLink){
                $li = new ListItem();
                $li->addTextNode($classLink);
                $packageUl->addChild($li);
            }
            $ul->addChild($packageLi);
        }
    }
    private function _scanPathForFiles($root){
        $dirsStack = new Stack();
        $dirsStack->push($root);
        $retVal = array();
        while($root = $dirsStack->pop()){
            $subDirs = scandir($root);
            foreach ($subDirs as $subDir){
                if($subDir != '.' && $subDir != '..'){
                    $xSubDir = $root.'\\'.$subDir;
                    if(Util::isDirectory($xSubDir)){
                        $dirsStack->push($xSubDir);
                    }
                    else{
                        if(strpos($subDir, '.php') !== FALSE){
                            $retVal[] = $xSubDir;
                        }
                    }
                }
            }
        }
        return $retVal;
    }
}
