<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class CronAPIs extends APIView{
    public function __construct() {
        parent::__construct('Cron','entity/cron');
        $this->setClassShortDesc('A class that is used to manage cron jobs.');
        $this->setClassLongDesc('A class that is used to manage cron jobs. '
                . 'It is used to create jobs, schedule them and execute them. '
                . 'In order to run the jobs automatically, the developer must '
                . 'add an entry in the following formate in crontab: '
                . '<br/>'.$this->monoStr('* * * * *  /usr/bin/curl {BASE_URL}/cron-jobs/execute/{password}').'<br/> '
                . 'Where '.$this->monoStr('{BASE_URL}').' is the web site\'s '
                . 'base URL and '.$this->monoStr('{password}').' is the '
                . 'password that was set by the developer to protect the '
                . 'jobs from unauthorized access.');
        $this->setVNum('1.0.1');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'createJob',
            'short-desc'=>'Creates new job using cron expression.',
            'long-desc'=>' Creates new job using cron expression. '
            . 'The job will be created and scheduled only if the given '
            . 'cron expression is valid. For more information on cron expressions, '
            . 'go to '.$this->monoLink('https://en.wikipedia.org/wiki/Cron#CRON_expression', 'Wikipedia').'. '
            . 'Note that the function does not support year field. This '
            . 'means the expression will have only 5 fields.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'A cron expression.',
                ),
                array(
                    'name'=>'$func',
                    'type'=>'callable',
                    'description'=>'A function to run when it is the time to execute the job.',
                ),
                array(
                    'name'=>'$funcParams',
                    'type'=>'array',
                    'description'=>'An array of parameters that can be passed to the function.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the job was created and scheduled, the function '
            . 'will return '.$this->t().'. Other than that, the function will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'dailyJob',
            'short-desc'=>'Creates a daily job to execute every day at specific hour and minute.',
            'long-desc'=>'Creates a daily job to execute every day at specific hour and minute.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'A time in the form \'hh:mm\'. hh can have '
                    . 'any value between 0 and 23 inclusive. mm can have any '
                    . 'value between 0 and 59 inclusive.',
                ),
                array(
                    'name'=>'$func',
                    'type'=>'callable',
                    'description'=>'A function to run when it is the time to execute the job.',
                ),
                array(
                    'name'=>'$funcParams',
                    'type'=>'array',
                    'description'=>'An array of parameters that can be passed to the function.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the job was created and scheduled, the function '
            . 'will return '.$this->t().'. Other than that, the function will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'execLog',
            'short-desc'=>'Enable or disable logging for jobs execution.',
            'long-desc'=>'Enable or disable logging for jobs execution. '
            . 'This function is also used to check if logging is enabled or not.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$bool',
                    'type'=>'boolean',
                    'description'=>'If set to '.$this->t().', a log file that contains '
                    . 'the details of the executed jobs will be created in '
                    . '\''.$this->monoStr('logs').'\' folder. Default value is '.$this->n().'.',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If logging is enabled, the function will return '.$this->t().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'jobsQueue',
            'short-desc'=>'Returns a queue of all queued jobs.',
            'long-desc'=>'Returns a queue of all queued jobs.',
            'access-modifier'=>'public static',
            'return-types'=> $this->monoCL('entity/html-php-structs/structs', 'Queue'),
            'return-desc'=>'An object of type '.$this->monoCL('entity/html-php-structs/structs', 'Queue').' which contains all queued jobs.'
        ));
        $this->addFunctionDef(array(
            'name'=>'password',
            'short-desc'=>'Sets or gets the password that is used to protect the cron instance.',
            'long-desc'=>'Sets or gets the password that is used to protect the cron instance. '
            . 'The password is used to prevent unauthorized access to execute jobs.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$pass',
                    'type'=>'string',
                    'description'=>'If not '.$this->n().', the password will be updated to the given one.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'string',
            'return-desc'=>'If the password is set, the function will return '
            . 'it. If not set, the function will return the string \''.$this->monoStr('NO_PASSWORD').'\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'scheduleJob',
            'short-desc'=>'Adds new job to jobs queue.',
            'long-desc'=>'Adds new job to jobs queue.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$job',
                    'type'=> $this->monoCL('entity/cron', 'CronJob'),
                    'description'=>'An instance of the class '.$this->monoCL('entity/cron', 'CronJob').'.',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the job is added, the function will return '.$this->t().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'weeklyJob',
            'short-desc'=>'Creates a job that will be executed on specific time weekly.',
            'long-desc'=>'Creates a job that will be executed on specific time weekly.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'A string in the format \''.$this->monoStr('d-hh:mm').'\'. '
                    . '\'d\' can be a number between 0 and 6 inclusive or a 3 '
                    . 'characters day name such as \'sun\'. 0 is for Sunday '
                    . 'and 6 is for Saturday. \'hh\' can have any value between '
                    . '0 and 23 inclusive. mm can have any value between 0 and '
                    . '59 inclusive.',
                ),
                array(
                    'name'=>'$func',
                    'type'=>'callable',
                    'description'=>'A function to run when it is the time to execute the job.',
                ),
                array(
                    'name'=>'$funcParams',
                    'type'=>'array',
                    'description'=>'An array of parameters that can be passed to the function.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the job was created and scheduled, the function '
            . 'will return '.$this->t().'. Other than that, the function will return '.$this->f().'.'
        
        ));
    }

    public function defineClassAttributes() {
        
    }
}
new CronAPIs();