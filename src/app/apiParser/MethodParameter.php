<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\apiParser;

/**
 * A class that represents method attribute.
 *
 * @author Ibrahim
 */
class MethodParameter {
    private $attrName;
    private $attrType;
    private $attrDescription;
    private $isOptional;
    public function __construct($name = '', $type = 'unkown', $desc = '', $isOptional = false) {
        $this->setName($name);
        $this->setType($type);
        $this->setDescription($desc);
        $this->setIsOptional($isOptional);
    }
    public function setName($name) {
        $this->attrName = $name;
    }
    public function setType($type) {
        $this->attrType = $type;
    }
    public function setDescription($desc) {
        $this->attrDescription = $desc;
    }
    public function setIsOptional($bool) {
        $this->isOptional = $bool === true;
    }
    public function getName() {
        return $this->attrName;
    }
    public function getType() {
        return $this->attrType;
    }
    public function getDescription() {
        return $this->attrDescription;
    }
    public function isOptional() {
        return $this->isOptional;
    }
}
