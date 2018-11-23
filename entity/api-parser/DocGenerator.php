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
    public function __construct($options=array()) {
        if(isset($options['path'])){
            $options['path'] = str_replace('/', '\\', $options['path']);
            if(Util::isDirectory($options['path'])){
                $classes = $this->_scanPathForFiles($options['path']);
                $apiReaders = array();
                foreach ($classes as $classPath){
                    Util::print_r($classPath);
                    $apiReaders[] = new APIReader($classPath);
                }
                foreach ($apiReaders as $reader){
                    Util::print_r($reader->getFunctionsNames());
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
