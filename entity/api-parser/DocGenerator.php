<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DocGenerator
 *
 * @author Ibrahim
 */
class DocGenerator {
    private $linksArr;
    private $apiReadersArr;
    private $baseUrl;
    public function __construct($options=array()) {
        if(isset($options['path'])){
            $options['path'] = str_replace('/', '\\', $options['path']);
            $this->baseUrl = isset($options['base-url']) ? $options['base-url']:'';
            if(Util::isDirectory($options['path'])){
                $classes = $this->_scanPathForFiles($options['path']);
                $this->linksArr = array();
                $this->apiReadersArr = array();
                foreach ($classes as $classPath){
                    Util::print_r($classPath);
                    $this->apiReadersArr[] = new APIReader($classPath);
                }
                $this->_buildLinks();
                Util::print_r($this->linksArr);
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
            $this->linksArr[$cName] = '<a href="'.$classLink.'" target="_blank">'.$cName.'</a>';
            foreach ($apiReader->getConstantsNames() as $name){
                $this->linksArr[$cName.'::'.$name] = '<a href="'.$classLink.'#'.$name.'" target="_blank">'.$cName.'::'.$name.'</a>';
            }
            foreach ($apiReader->getFunctionsNames() as $name){
                $this->linksArr[$cName.'::'.$name.'()'] = '<a href="'.$classLink.'#'.$name.'" target="_blank">'.$cName.'::'.$name.'()</a>';
            }
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
