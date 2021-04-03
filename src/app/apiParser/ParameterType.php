<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\apiParser;

use webfiori\ui\HTMLNode;
/**
 * Description of ParameterType
 *
 * @author Eng.Ibrahim
 */
class ParameterType extends HTMLNode {
    public function __construct(array $namesArr = []) {
        parent::__construct('span');
        foreach ($namesArr as $name) {
            $this->add($name);
        }
    }
    public function add($type) {
        if ($this->childrenCount() != 0) {
            $this->text('|');
        }
        if ($type instanceof HTMLNode) {
            $this->addChild($type);
        } else {
            $this->text($type);
        }
    }
}
