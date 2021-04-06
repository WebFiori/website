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
class NameSpaceAPI{
    private $name;
    private $classes;
    private $interfaces;
    private $traits;
    private $subNamespaces;
    public function __construct($ns = '', $classes = [], $subNsArr = []) {
        $this->name = '\\'. trim($ns, '\\');
        $this->classes = [];
        $this->subNamespaces = [];
        $this->interfaces = [];
        $this->traits = [];
        foreach ($classes as $name => $infoArr) {
            $this->add($name, $infoArr);
        }
        foreach ($subNsArr as $subNs) {
            $this->addSubNamespace($subNs);
        }
    }
    public function add($name, $info) {
        $trimmedName = trim($name);
        $accessMod = $info['access-modifier'];
        if ($accessMod == 'class' || $accessMod == 'abstract class') {
            $this->classes[$trimmedName] = $info;
        } else if ($accessMod == 'interface') {
            $this->interfaces[$trimmedName] = $info;
        } else if ($accessMod == 'trait') {
            $this->traits[$trimmedName] = $info;
        }
    }
    /**
     * Returns an array that contains an objects of type ClassAPI.
     * The objects in the array will represents the interfaces in the 
     * name space.
     * @return array
     */
    public function getInterfaces() {
        return $this->interfaces;
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
        return $this->classes;
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
    public function getTraits() {
        return $this->traits;
    }
    /**
     * Returns an array that contains an objects of type APIClass.
     * @return array An array that contains an objects of type APIClass.
     */
    public function getAll() {
        return array_merge($this->getClasses(), $this->getInterfaces(), $this->getTraits());
    }
}
