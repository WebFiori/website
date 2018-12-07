<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PackageAPI
 *
 * @author Ibrahim
 */
class PackageAPI {
    /**
     * Long description of the package.
     * @var type 
     */
    private $desc;
    /**
     * Short description of the package.
     * @var type 
     */
    private $shortDesc;
    private $packageName;
    private $classes;
    /**
     * 
     * @param type $package
     */
    public function __construct() {
        
    }
    public function setPackageName($name) {
        $this->packageName = $name;
    }
    public function getPackageName() {
        return $this->packageName;
    }
    /**
     * Sets the description of the package.
     * @param string $desc The description of the package.
     */
    public function setShortDescription($desc) {
        $this->shortDesc = $desc;
    }
    /**
     * Returns the description of the package.
     * @return string The description of the package.
     */
    public function getShortDescription() {
        return $this->shortDesc;
    }
    /**
     * Sets the description of the package.
     * @param string $desc The description of the package.
     */
    public function setLongDescription($desc) {
        $this->desc = $desc;
    }
    /**
     * Returns the description of the package.
     * @return string The description of the package.
     */
    public function getLongDescription() {
        return $this->desc;
    }
}
