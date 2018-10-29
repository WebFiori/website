<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class CronAPIs extends APIView{
    public function __construct() {
        parent::__construct('Cron','entity/cron');
        $this->setClassShortDesc('');
        $this->setClassLongDesc('');
        $this->setVNum('');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'createJob',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'',
                ),
                array(
                    'name'=>'$func',
                    'type'=>'callable',
                    'description'=>'',
                ),
                array(
                    'name'=>'$funcParams',
                    'type'=>'',
                    'description'=>'',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'dailyJob',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'',
                ),
                array(
                    'name'=>'$func',
                    'type'=>'callable',
                    'description'=>'',
                ),
                array(
                    'name'=>'$funcParams',
                    'type'=>'',
                    'description'=>'',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'execLog',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$bool',
                    'type'=>'boolean',
                    'description'=>'',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'jobsQueue',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
            'return-types'=> $this->monoCL('entity/html-php-structs/structs', 'Queue'),
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'password',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$pass',
                    'type'=>'string',
                    'description'=>'',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'string',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'scheduleJob',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$job',
                    'type'=> $this->monoCL('entity/cron', 'CronJob'),
                    'description'=>'',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'weeklyJob',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'',
                ),
                array(
                    'name'=>'$func',
                    'type'=>'callable',
                    'description'=>'',
                ),
                array(
                    'name'=>'$funcParams',
                    'type'=>'',
                    'description'=>'',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>''
        ));
    }

    public function defineClassAttributes() {
        
    }
}
new CronAPIs();