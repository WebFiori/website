<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\apiParser;
use webfiori\apiParser\ClassAPI;
/**
 * Description of NameSpace
 *
 * @author Ibrahim
 */
class NameSpaceAPI {
    private $name;
    private $classes;
    private $subNamespaces;
    public function __construct() {
        $this->name = '\\';
        $this->classes = array();
        $this->subNamespaces = [];
    }
    private function _get($cType){
        $arr = array();
        $count = count($this->getAll());
        for($x = 0 ; $x < $count ; $x++){
            $classApi = $this->getAll()[$x];
            if(trim($classApi->getClassType()) == $cType){
                $arr[] = $classApi;
            }
        }
        return $arr;
    }
    /**
     * Returns an array that contains an objects of type ClassAPI.
     * The objects in the array will represents the interfaces in the 
     * name space.
     * @return array
     */
    public function getInterfaces() {
        return $this->_get('interface');
    }
    /**
     * Returns an array which contains all names of sub-namespaces.
     * @return array An array which contains all names of sub-namespaces as strings.
     */
    public function getSubNamespaces() {
        return $this->subNamespaces;
    }
    /**
     * Adds a sub-namespace name to the set of sub-namespaces.
     * @param string $name The namespace name. It must be non-empty string and 
     * not the same as the namespace name of current instance.
     */
    public function addSubNamespace($name) {
        $trimmed = trim($name);
        if(strlen($trimmed) > 0 && $trimmed != $this->getName()){
            $this->subNamespaces[] = $trimmed;
        }
    }
    /**
     * Returns an array that contains an objects of type ClassAPI.
     * The objects in the array will represents the classes in the 
     * name space.
     * @return array
     */
    public function getClasses() {
        $arr1 = $this->_get('class');
        $arr2 = $this->_get('abstract class');
        return array_merge($arr1, $arr2);
    }
    /**
     * Sets the name of the namespace.
     * @param string $name A string in the format '\hello\world'
     */
    public function setName($name) {
        $this->name = $name;
    }
    /**
     * Returns the name of the namespace.
     * @return string A string in the format '\hello\world'
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Adds a class that belongs to the namespace.
     * @param ClassAPI $classApi An object of type ClassAPI
     */
    public function addClass($classApi) {
        if($classApi instanceof ClassAPI){
            $this->classes[] = $classApi;
        }
    }
    /**
     * Returns an array that contains an objects of type APIClass.
     * @return array An array that contains an objects of type APIClass.
     */
    public function getAll() {
        return $this->classes;
    }
}
