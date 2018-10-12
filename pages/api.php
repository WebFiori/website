<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Page::theme('WebFiori Theme');
$class = new ClassAPI();
$class->setName('SessionManager');
$class->setDescription('A class that is used to manage system sessions.');
$class->setPackage('webfiori/entity/'.$class->getName());
$func1 = new FunctionDef();
$func1->setName('func1');
$func1->setAccessModifier('public');
$func1->setShortDescription('Initiate language attribute of the session.');
$func1->addFuncParam('$param1', 'string', 'A two characters language code.');
$func1->setLongDescription('Function 1\'s long description.');
$class->addFunction($func1);

$func1 = new FunctionDef();
$func1->setName('func2');
$func1->setAccessModifier('public');
$func1->setShortDescription('Initiate language attribute of the session.');
$func1->setLongDescription('Function 2\'s long description.');
$class->addFunction($func1);

$func1 = new FunctionDef();
$func1->setName('func3');
$func1->setAccessModifier('public');
$func1->setShortDescription('Initiate language attribute of the session.');
$func1->setLongDescription('Function 3\'s long description.');
$class->addFunction($func1);

$attr1 = new AttributeDef();
$attr1->setAccessModifier('const');
$attr1->setName('MY_CONST');
$attr1->setShortDescription('A constant string.');
$attr1->setLongDescription('This is a long description.');
$attr1->setType('string');
$class->addAttribute($attr1);

$apiPage = new APIPage($class);