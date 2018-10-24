<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class LoggerAPIs extends APIView{
    public function __construct() {
        parent::__construct('Logger','webfiori/entity');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'callStack',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'clear',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'directory',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'displayLog',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'enabled',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'get',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'log',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'logFuncCall',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'logFuncReturn',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'logName',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'logReturnValue',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'requestCompleted',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
        $this->addFunctionDef(array(
            'name'=>'section',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
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
            'name'=>'MESSSAGE_TYPES',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'const'
        ));
    }

}
new LoggerAPIs();