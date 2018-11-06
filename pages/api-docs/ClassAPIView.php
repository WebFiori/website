<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClassAPIView
 *
 * @author Ibrahim
 */
abstract class ClassAPIView extends APIView{
    /**
     *
     * @var ClassAPI 
     */
    private $class;
    public function __construct($name = 'Class', $package = '', $vNum = null) {
        parent::__construct();
        $this->class = new ClassAPI();
        $this->class->setName($name);
        $this->class->setPackage($package);
        $this->class->setVersion($vNum);
        $this->defineClassFunctions();
        $this->defineClassAttributes();
    }
    /**
     * 
     * @param array $array
     */
    public function addAttributeDef($array=array(
        'name'=>'',
        'access-modifier'=>'',
        'short-desc'=>'',
        'long-desc'=>''
    )) {
        $attrName = isset($array['name']) ? (strlen($array['name']) > 0 ? $array['name'] : 'fName') : 'fName';
        $accessModifyer = isset($array['access-modifier']) ? (strlen($array['access-modifier']) > 0 ? $array['access-modifier'] : 'public') : 'public';
        $shortDesc = isset($array['short-desc']) ? (strlen($array['short-desc']) > 0 ? $array['short-desc'] : 'Short Description') : 'Short Description';
        $longDesc = isset($array['long-desc']) ? (strlen($array['long-desc']) > 0 ? $array['long-desc'] : 'Short Description') : 'Short Description';
        $attrDef = new AttributeDef();
        $attrDef->setName($attrName);
        $attrDef->setAccessModifier($accessModifyer);
        $attrDef->setLongDescription($longDesc);
        $attrDef->setShortDescription($shortDesc);
        $this->getClassAPIObj()->addAttribute($attrDef);
    }
    /**
     * 
     * @param array $array
     */
    public function addFunctionDef($array=array(
        'name'=>'',
        'access-modifier'=>'',
        'short-desc'=>'',
        'long-desc'=>'',
        'params'=>array(
            array(
                'name'=>'',
                'type'=>'',
                'is-optional'=>false,
                'description'=>''
                )
        ),
        'return-types'=>array(),
        'return-desc'=>''
    )) {
        $fName = isset($array['name']) ? (strlen($array['name']) > 0 ? $array['name'] : 'fName') : 'fName';
        $fAccessModifyer = isset($array['access-modifier']) ? (strlen($array['access-modifier']) > 0 ? $array['access-modifier'] : 'public') : 'public';
        $fShortDesc = isset($array['short-desc']) ? (strlen($array['short-desc']) > 0 ? $array['short-desc'] : 'Short Description') : 'Short Description';
        $fLongDesc = isset($array['long-desc']) ? (strlen($array['long-desc']) > 0 ? $array['long-desc'] : 'Short Description') : 'Short Description';
        $funcDescObj = new FunctionDef();
        $funcDescObj->setName($fName);
        $funcDescObj->setAccessModifier($fAccessModifyer);
        $funcDescObj->setLongDescription($fLongDesc);
        $funcDescObj->setShortDescription($fShortDesc);
        if(isset($array['params'])){
            foreach ($array['params'] as $param){
                $isOptional = isset($param['is-optional']) ? $param['is-optional'] === TRUE : FALSE;
                $funcDescObj->addFuncParam($param['name'], $param['type'], $param['description'],$isOptional);
            }
        }
        if(isset($array['return-types'])){
            $retDesc = isset($array['return-desc']) ? (strlen($array['return-desc']) > 0 ? $array['return-desc'] : 'Return Description') : 'Return Description';
            $funcDescObj->setReturns($array['return-types'], $retDesc);
        }
        $this->getClassAPIObj()->addFunction($funcDescObj);
    }
    /**
     * Returns the linked ClassAPI object.
     * @return ClassAPI
     */
    public function &getClassAPIObj() {
        return $this->class;
    }
    public abstract function defineClassFunctions();
    public abstract function defineClassAttributes();
}
