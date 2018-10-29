<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class CronJobAPIs extends APIView{
    public function __construct() {
        parent::__construct('CronJob','entity/cron');
        $this->setClassShortDesc('');
        $this->setClassLongDesc('');
        $this->setVNum('');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'cron',
            'short-desc'=>'Schedules a job using specific cron expression.',
            'long-desc'=>'Schedules a job using specific cron expression. '
            . 'For more information on cron expressions, go to '
            . ''.$this->monoLink('https://en.wikipedia.org/wiki/Cron#CRON_expression', 'Wikipedia').'. '
            . 'Note that the function does not support year field. This means '
            . 'the expression will have only 5 fields.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$when',
                    'type'=>'string',
                    'description'=>'A cron expression (such as \'8 15 * * 1\'). Default is \'* * * * *\' which means run the job every minute.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the given cron expression is valid, the function '
            . 'will set the time of cron job as specified by the expression '
            . 'and return '.$this->t().'. If the expression is invalid, the function '
            . 'will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'dailyAt',
            'short-desc'=>'Schedules a cron job to run daily at specific hour and minute.',
            'long-desc'=>'Schedules a cron job to run daily at specific '
            . 'hour and minute. The job will be executed every day at the given '
            . 'hour and minute. The function uses 24 hours mode.'
            . 'If no parameters are given, The default time is 00:00 which means that the job will be executed daily at midnight.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$hour',
                    'type'=>'int',
                    'description'=>'A number between 0 and 23 inclusive. 0 Means daily at 12:00 AM and 23 means at 11:00 PM. Default is 0.',
                    'is-optional'=>TRUE
                ),
                array(
                    'name'=>'$minute',
                    'type'=>'int',
                    'description'=>'A number between 0 and 59 inclusive. Represents the minute part of an hour. Default is 0.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If job time is set, the function will return '.$this->t().'. '
            . 'If not set, the function will return '.$this->f().'. It will not set '
            . 'only if the given time is not correct.'
        ));
        $this->addFunctionDef(array(
            'name'=>'everyHour',
            'short-desc'=>'Schedules a cron job to run every hour.',
            'long-desc'=>'Schedules a cron job to run every hour.',
            'access-modifier'=>'public'
        ));
        $this->addFunctionDef(array(
            'name'=>'everyMonthOn',
            'short-desc'=>'Schedules a cron job to run every month on specific day and time.',
            'long-desc'=>'Schedules a cron job to run every month on specific day and time.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$dayNum',
                    'type'=>'int',
                    'description'=>'The number of the day. It can be any value between 1 and 31 inclusive.',
                    'is-optional'=>TRUE
                ),
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'A day time string in the form \'hh:mm\' in 24 hours mode.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the time for the cron job is set, the function '
            . 'will return '.$this->t().'. If not, it will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'execute',
            'short-desc'=>'Execute the event which should run when it is time to execute the job.',
            'long-desc'=>'Execute the event which should run when it is time '
            . 'to execute the job. This function will be called automatically '
            . 'when cron URL is accessed. The function will check if it is '
            . 'time to execute the associated event or not. If it is the time, '
            . 'The event will be executed. If the job is forced to execute, the '
            . 'event that is associated with the job will be executed even if it '
            . 'is not the time to execute the job.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$force',
                    'type'=>'boolean',
                    'description'=>'If set to TRUE, the job will be forced to execute even if it is not job time. Default is FALSE.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the event that is associated with the job is '
            . 'executed, the function will return '.$this->t().'. If it is not executed, '
            . 'the function will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getExpression',
            'short-desc'=>'Returns the cron expression which is associated with the job.',
            'long-desc'=>'Returns the cron expression which is associated with the job.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'he cron expression which is associated with the job.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getJobDetails',
            'short-desc'=>'Returns an associative array which contains details about the timings at which the job will be executed.',
            'long-desc'=>'Returns an associative array which contains details about the timings at which the job will be executed.',
            'access-modifier'=>'public',
            'return-types'=>'array',
            'return-desc'=>'The array will have the following indices: '
            . '<ul>'
            . '<li><b>'.$this->monoStr('minutes').'</b>: Contains sub arrays which has info about the '
            . 'minutes at which the job will be executed.</li>'
            . '<li><b>'.$this->monoStr('hours').'</b>: Contains sub arrays which has info about the '
            . 'hours at which the job will be executed.'
            . '</li><li><b>'.$this->monoStr('days-of-month').'</b>: Contains sub arrays which has '
            . 'info about the days of month at which the job will be executed.'
            . '</li><li><b>'.$this->monoStr('months').'</b>: Contains sub arrays which has info about '
            . 'the months at which the job will be executed.</li>'
            . '<li><b>'.$this->monoStr('days-of-week').'</b>: Contains sub arrays which has info '
            . 'about the days of week at which the job will be executed.</li>'
            . '</ul>'
        ));
        $this->addFunctionDef(array(
            'name'=>'getJobName',
            'short-desc'=>'Returns the name of the job.',
            'long-desc'=>'Returns the name of the job. The name is used to make '
            . 'different jobs unique. Each job must have its own name. Also, '
            . 'the name of the job is used to force job execution. It can be '
            . 'supplied as a part of cron URL. ',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'The name of the job. If no name is set, the function will return \'CRON-JOB\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'isDayOfMonth',
            'short-desc'=>'Checks if current day of month in time is a day at which the job must be executed.',
            'long-desc'=>'Checks if current day of month in time is a day at which the job must be executed.',
            'access-modifier'=>'public',
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' if the current day of month in time is a day at which the job must be executed.'
        ));
        $this->addFunctionDef(array(
            'name'=>'isDayOfWeek',
            'short-desc'=>'Checks if current day of week in time is a day at which the job must be executed.',
            'long-desc'=>'Checks if current day of week in time is a day at which the job must be executed.',
            'access-modifier'=>'public',
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' if the current day of week in time is a day at which the job must be executed.'
        ));
        $this->addFunctionDef(array(
            'name'=>'isHour',
            'short-desc'=>'Checks if current hour in time is an hour at which the job must be executed.',
            'long-desc'=>'Checks if current hour in time is an hour at which the job must be executed.',
            'access-modifier'=>'public',
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' if the current hour in time is an hour at which the job must be executed.'
        ));
        $this->addFunctionDef(array(
            'name'=>'isMinute',
            'short-desc'=>'Checks if current minute in time is a minute at which the job must be executed.',
            'long-desc'=>'Checks if current minute in time is a minute at which the job must be executed.',
            'access-modifier'=>'public',
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' if the current minute in time is a minute at which the job must be executed.'
        ));
        $this->addFunctionDef(array(
            'name'=>'isMonth',
            'short-desc'=>'Checks if current month in time is a month at which the job must be executed.',
            'long-desc'=>'Checks if current month in time is a month at which the job must be executed.',
            'access-modifier'=>'public',
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' if the current month in time is a month at which the job must be executed.'
        ));
        $this->addFunctionDef(array(
            'name'=>'onMonth',
            'short-desc'=>'Schedules a job to run at specific day and time in a specific month.',
            'long-desc'=>'Schedules a job to run at specific day and time in a specific month.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$monthNameOrNum',
                    'type'=>'int|string',
                    'description'=>'Month number from 1 to 12 inclusive or 3 letters month name. Default is \'jan\'',
                    'is-optional'=>TRUE
                ),
                array(
                    'name'=>'$dayNum',
                    'type'=>'int',
                    'description'=>'The number of day in the month starting from 1 up to 31 inclusive. Default is 1.',
                    'is-optional'=>TRUE
                ),
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'A time in the form \'hh:mm\'. hh can have any value between 0 and 23 inclusive. mm can have any value btween 0 and 59 inclusive. default is \'00:00\'.',
                    'is-optional'=>TRUE
                ),
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the time for the cron job is set, the function '
            . 'will return '.$this->t().'. If not, it will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'setJobName',
            'short-desc'=>'Sets an optional name for the job.',
            'long-desc'=>'Sets an optional name for the job. The name is used '
            . 'to make different jobs unique. Each job must have its own name. '
            . 'Also, the name of the job is used to force job execution. It can '
            . 'be supplied as a part of cron URL. ',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$name',
                    'type'=>'string',
                    'description'=>'The name of the job.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'setOnExecution',
            'short-desc'=>'Sets the event that will be fired in case it is time to execute the job.',
            'long-desc'=>'Sets the event that will be fired in case it is time to execute the job.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$func',
                    'type'=>'callable',
                    'description'=>'The function that will be executed if it is the time to execute the job.',
                ),
                array(
                    'name'=>'$func',
                    'type'=>'array',
                    'description'=>'An array which can hold some parameters that can be passed to the function.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'weeklyOn',
            'short-desc'=>'Schedules a job to run weekly at specific week day and time.',
            'long-desc'=>'Schedules a job to run weekly at specific week day and time.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$dayNameOrNum',
                    'type'=>'string|int',
                    'description'=>'A 3 letter day name (such as \'sun\' or \'tue\') or a day number from 0 to 6. 0 for sunday. Default is 0.',
                    'is-optional'=>TRUE
                ),
                array(
                    'name'=>'$time',
                    'type'=>'string',
                    'description'=>'A time in the form \'hh:mm\'. hh can have '
                    . 'any value between 0 and 23 inclusive. mm can have any '
                    . 'value between 0 and 59 inclusive. default is \'00:00\'.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the time for the cron job is set, the function '
            . 'will return '.$this->t().'. If not, it will return '.$this->f().'.'
        ));
    }

    public function defineClassAttributes() {
        $this->addAttributeDef(array(
            'name'=>'ANY_VAL',
            'short-desc'=>'A constant that indicates a sub cron expression is of type \'multi-value\'.',
            'long-desc'=>'A constant that indicates a sub cron expression is of type \'multi-value\'.',
            'access-modifier'=>'CONST',
        ));
        $this->addAttributeDef(array(
            'name'=>'INV_VAL',
            'short-desc'=>'A constant that indicates a sub cron expression is invalid.',
            'long-desc'=>'A constant that indicates a sub cron expression is invalid.',
            'access-modifier'=>'CONST',
        ));
        $this->addAttributeDef(array(
            'name'=>'MONTHS_NAMES',
            'short-desc'=>'An associative array which holds the names and the numbers of year months.',
            'long-desc'=>'An associative array which holds the names and the numbers of year months.',
            'access-modifier'=>'CONST',
        ));
        $this->addAttributeDef(array(
            'name'=>'RANGE_VAL',
            'short-desc'=>'A constant that indicates a sub cron expression is of type \'range\'.',
            'long-desc'=>'A constant that indicates a sub cron expression is of type \'range\'.',
            'access-modifier'=>'CONST',
        ));
        $this->addAttributeDef(array(
            'name'=>'SPECIFIC_VAL',
            'short-desc'=>'A constant that indicates a sub cron expression is of type \'specific value\'',
            'long-desc'=>'A constant that indicates a sub cron expression is of type \'specific value\'',
            'access-modifier'=>'CONST',
        ));
        $this->addAttributeDef(array(
            'name'=>'STEP_VAL',
            'short-desc'=>'A constant that indicates a sub cron expression is of type \'step value\'',
            'long-desc'=>'A constant that indicates a sub cron expression is of type \'step value\'',
            'access-modifier'=>'CONST',
        ));
        $this->addAttributeDef(array(
            'name'=>'WEEK_DAYS',
            'short-desc'=>'An associative array which holds the names and the numbers of week days.',
            'long-desc'=>'An associative array which holds the names and the numbers of week days.',
            'access-modifier'=>'CONST',
        ));
    }
}
new CronJobAPIs();