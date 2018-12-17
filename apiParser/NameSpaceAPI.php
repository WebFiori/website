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
    public function __construct() {
        $this->name = '\\';
        $this->classes = array();
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
    public function getClasses() {
        return $this->classes;
    }
}
