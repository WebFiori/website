<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class JsonIAPIs extends APIView{
    public function __construct() {
        parent::__construct('JsonI','entity/jsonx');
        $this->setClassShortDesc('');
        $this->setClassLongDesc('');
        $this->setVNum('');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'',
                    'type'=>'',
                    'description'=>'',
                )
            ),
            'return-types'=>'',
            'return-desc'=>''
        ));
    }

    public function defineClassAttributes() {
        $this->addAttributeDef(array(
            'name'=>'',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public',
        ));
    }
}
new JsonIAPIs();