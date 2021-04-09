<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\apiParser;
use webfiori\ui\HTMLNode;
use webfiori\docs\apiParser\DocsWebPage;

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
    private $attrTypeStr;
    /**
     * Creates new  instance of the class.
     * 
     * @param string $name The name of the parameter such as '$arg1'.
     * 
     * @param ParameterType $type The type (or types) of the parameter.
     * 
     * @param type $desc
     * @param type $isOptional
     */
    public function __construct($name = '', ParameterType $type = null, $desc = '', $isOptional = false) {
        $this->setName($name);
        $type !== null ? $this->setType($type) : '';
        $this->setDescription($desc);
        $this->setIsOptional($isOptional);
    }
    public function setName($name) {
        $this->attrName = $name;
    }
    public function getParametersNode(DocsWebPage $p) {
        $expl = explode('|', $this->getTypeStr());
        $span = new HTMLNode('span');
        foreach ($expl as $type) {
            if ($span->childrenCount() != 0) {
                $span->text('|');
            }
            $anchor = $p->getLink($type);
            if ($anchor !== null) {
                $span->addChild($anchor);
            } else {
                $span->text($type);
            }
        }

        return $span;
    }
    /**
     * 
     * @param HTMLNode $type
     */
    public function setType(ParameterType $type) {
        $this->attrType = $type;
    }
    /**
     * 
     * @param HTMLNode $type
     */
    public function setTypeStr($type) {
        $this->attrTypeStr = $type;
    }
    public function getTypeStr() {
        return $this->attrTypeStr;
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
    /**
     * 
     * @return ParameterType
     */
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
