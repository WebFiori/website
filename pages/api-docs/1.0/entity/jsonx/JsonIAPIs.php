<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class JsonIAPIs extends APIView{
    public function __construct() {
        parent::__construct('JsonI','entity/jsonx');
        $this->setClassShortDesc('An interface for the objects that can be added to an instance of JsonX.');
        $this->setClassLongDesc('An interface for the objects that can be added to an instance of '.$this->monoCL('entity/jsonx', 'JsonX').'.');
        $this->setVNum('1.0');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'toJSON',
            'short-desc'=>'Returns an object of type '.$this->monoCL('entity/jsonx', 'JsonX').'.',
            'long-desc'=>'Returns an object of type '.$this->monoCL('entity/jsonx', 'JsonX').'. '
            . 'This function must be implemented by any class that will be '
            . 'added as an attribute to any '.$this->monoCL('entity/jsonx', 'JsonX').' instance. It is '
            . 'used to customize the returned JSON string.',
            'access-modifier'=>'public',
            'return-types'=>$this->monoCL('entity/jsonx', 'JsonX'),
            'return-desc'=>'An object of type '.$this->monoCL('entity/jsonx', 'JsonX').'.'
        ));
    }

    public function defineClassAttributes() {

    }
}
new JsonIAPIs();