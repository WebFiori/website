<?php
namespace docGenerator\webfiori\framework\cron;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AbstractJobView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An abstract class that contains basic functionality for implementing cron   jobs.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class AbstractJob');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'AbstractJob', '\webfiori\framework\cron', 'An abstract class that contains basic functionality for implementing cron   jobs. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'ANY_VAL',
            'A constant that indicates a sub cron expression is of type \'multi-value\'.',
            'A constant that indicates a sub cron expression is of type \'multi-value\'. ',
            ),
            new AttributeDef(
            'const',
            '',
            'INV_VAL',
            'A constant that indicates a sub cron expression is invalid.',
            'A constant that indicates a sub cron expression is invalid. ',
            ),
            new AttributeDef(
            'const',
            '',
            'MONTHS_NAMES',
            'An associative array which holds the names and the numbers of year       months.',
            'An associative array which holds the names and the numbers of year       months. ',
            ),
            new AttributeDef(
            'const',
            '',
            'RANGE_VAL',
            'A constant that indicates a sub cron expression is of type \'range\'.',
            'A constant that indicates a sub cron expression is of type \'range\'. ',
            ),
            new AttributeDef(
            'const',
            '',
            'SPECIFIC_VAL',
            'A constant that indicates a sub cron expression is of type \'specific value\'.',
            'A constant that indicates a sub cron expression is of type \'specific value\'. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STEP_VAL',
            'A constant that indicates a sub cron expression is of type \'step value\'.',
            'A constant that indicates a sub cron expression is of type \'step value\'. ',
            ),
            new AttributeDef(
            'const',
            '',
            'WEEK_DAYS',
            'An associative array which holds the names and the numbers of week       days.',
            'An associative array which holds the names and the numbers of week       days. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$jobName' => [
                        'type' => 'string',
                        'description' => 'The name of the job.',
                        'optional' => false,
                    ],
                    '$when' => [
                        'type' => 'string',
                        'description' => 'A cron expression. An exception will be thrown if       the given expression is invalid. Default is \'    \' which means run       the job every minute.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addExecutionArg',
                'access-modifier' => 'public function',
                'summary' => 'Adds new execution argument.',
                'description' => 'Adds new execution argument. An execution argument is an argument that can be supplied to the       job in case of force execute. They will appear in cron control panel       as a table. They also can be provided to the job when executing it       throw CLI as \'arg-name="argVal".      The argument name must follow the following rules:      <ul>      <li>Must be non-empty string.</li>      <li>Must not contain \'#\', \'?\', \'&\', \'=\' or space.</li>      </ul>',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addExecutionArgs',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple execution arguments at one shot.',
                'description' => 'Adds multiple execution arguments at one shot. ',
                'params' => [
                    '$argsArr' => [
                        'type' => 'array',
                        'description' => 'An array that contains the names of the       arguments.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'afterExec',
                'access-modifier' => 'public abstract function',
                'summary' => 'Run some routines after the job is executed.',
                'description' => 'Run some routines after the job is executed. The developer can implement this method to perform some actions after the       job is executed. Note that the method will get executed if the job is failed       or successfully completed. It is optional to implement that method. The developer can       leave the body of the method empty.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'cron',
                'access-modifier' => 'public function',
                'summary' => 'Schedules a job using specific cron expression.',
                'description' => 'Schedules a job using specific cron expression. For more information on cron expressions, go to       https://en.wikipedia.org/wiki/Cron#CRON_expression. Note that       the method does not support year field. This means       the expression will have only 5 fields. Notes about the expression:       <ul>      <li>Step values are not supported for months.</li>      <li>Step values are not supported for day of week.</li>      <li>Step values are not supported for day of month.</li>      </ul>',
                'params' => [
                    '$when' => [
                        'type' => 'string',
                        'description' => 'A cron expression (such as \'8 15   1\'). Default       is \'    \' which means run the job every minute.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given cron expression is valid, the method will       set the time of cron job as specified by the expression and return       true. If the expression is invalid, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dailyAt',
                'access-modifier' => 'public function',
                'summary' => 'Schedules a cron job to run daily at specific hour and minute.',
                'description' => 'Schedules a cron job to run daily at specific hour and minute. The job will be executed every day at the given hour and minute. The       function uses 24 hours mode. If no parameters are given,       The default time is 00:00 which means that the job will be executed       daily at midnight.',
                'params' => [
                    '$hour' => [
                        'type' => 'int',
                        'description' => 'A number between 0 and 23 inclusive. 0 Means daily at       12:00 AM and 23 means at 11:00 PM. Default is 0.',
                        'optional' => false,
                    ],
                    '$minute' => [
                        'type' => 'int',
                        'description' => 'A number between 0 and 59 inclusive. Represents the       minute part of an hour. Default is 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If job time is set, the method will return true. If       not set, the method will return false. It will not set only if the       given time is not correct.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'everyHour',
                'access-modifier' => 'public function',
                'summary' => 'Schedules a cron job to run every hour.',
                'description' => 'Schedules a cron job to run every hour. The job will run at the start of the hour.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'everyMonthOn',
                'access-modifier' => 'public function',
                'summary' => 'Schedules a cron job to run every month on specific day and time.',
                'description' => 'Schedules a cron job to run every month on specific day and time. ',
                'params' => [
                    '$dayNum' => [
                        'type' => 'int',
                        'description' => 'The number of the day. It can be any value between       1 and 31 inclusive.',
                        'optional' => false,
                    ],
                    '$time' => [
                        'type' => 'string',
                        'description' => 'A day time string in the form \'hh:mm\' in 24 hours mode.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the time for the cron job is set, the method will       return true. If not, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'exec',
                'access-modifier' => 'public function',
                'summary' => 'Execute the event which should run when it is time to execute the job.',
                'description' => 'Execute the event which should run when it is time to execute the job. This method will be called automatically when cron URL is accessed. The       method will check if it is time to execute the associated event or       not. If it is the time, The event will be executed. If       the job is forced to execute, the event that is associated with the       job will be executed even if it is not the time to execute the job.',
                'params' => [
                    '$force' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the job will be forced to execute       even if it is not job time. Default is false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the event that is associated with the job is executed,       the method will return true (Even if the job did not finish successfully).      If it is not executed, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'execute',
                'access-modifier' => 'public abstract function',
                'summary' => 'Execute the job.',
                'description' => 'Execute the job. The code that will be in the body of that method is the code that will be       get executed if it is time to run the job or the job is forced to       executed. The developer must implement this method in a way it returns null or true       if the job is executed successfully. If the implementation of the method       throws an exception, the job will be considered as failed.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the job successfully completed, the method should       return null or true. If the job failed, the method should return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getArgValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of a custom execution argument.',
                'description' => 'Returns the value of a custom execution argument. The value of the argument can be supplied through the table that will       appear in cron control panel. If the execution is performed through       CLI, the value of the argument can be supplied to the job as arg-name="Arg Val".',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'the name of execution argument.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the argument does exist on the job and its value       is provided, the method will return its value. If it is not provided or       it does not exist on the job, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCommand',
                'access-modifier' => 'public function',
                'summary' => 'Returns the command that was used to execute the job.',
                'description' => 'Returns the command that was used to execute the job. Note that the command will be null if not executed from CLI environment.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/cli/CronCommand', 'CronCommand'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getExecArgs',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains the values of       custom execution parameters.',
                'description' => 'Returns an associative array that contains the values of       custom execution parameters. Note that the method will filter the values using the filter FILTER_SANITIZE_STRING.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The keys are attributes values and       the values are the values which are given as input. If a value       is not provided, it will be set to null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getExecArgsNames',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the names of added custom       execution attributes.',
                'description' => 'Returns an array that contains the names of added custom       execution attributes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains all added       custom execution attributes values.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getExpression',
                'access-modifier' => 'public function',
                'summary' => 'Returns the cron expression which is associated with the job.',
                'description' => 'Returns the cron expression which is associated with the job. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The cron expression which is associated with the job.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJobDetails',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array which contains details about the timings       at which the job will be executed.',
                'description' => 'Returns an associative array which contains details about the timings       at which the job will be executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array will have the following indices:       <ul>      <li><b>minutes</b>: Contains sub arrays which has info about the minutes       at which the job will be executed.</li>      <li><b>hours</b>: Contains sub arrays which has info about the hours       at which the job will be executed.</li>      <li><b>days-of-month</b>: Contains sub arrays which has info about the days of month       at which the job will be executed.</li>      <li><b>months</b>: Contains sub arrays which has info about the months       at which the job will be executed.</li>      <li><b>days-of-week</b>: Contains sub arrays which has info about the days of week       at which the job will be executed.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJobName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the job.',
                'description' => 'Returns the name of the job. The name is used to make different jobs unique. Each job must       have its own name. Also, the name of the job is used to force job       execution. It can be supplied as a part of cron URL.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the job. If no name is set, the function will return       \'CRON-JOB\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isDayOfMonth',
                'access-modifier' => 'public function',
                'summary' => 'Checks if current day of month in time is a day at which the job must be       executed.',
                'description' => 'Checks if current day of month in time is a day at which the job must be       executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the current day of month in       time is a day at which the job must be executed.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isDayOfWeek',
                'access-modifier' => 'public function',
                'summary' => 'Checks if current day of week in time is a day at which the job must be       executed.',
                'description' => 'Checks if current day of week in time is a day at which the job must be       executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the current day of week in       time is a day at which the job must be executed.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isForced',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the job is forced to execute or not.',
                'description' => 'Checks if the job is forced to execute or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the job was forced to execute, the method will return       true. Other than that, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isHour',
                'access-modifier' => 'public function',
                'summary' => 'Checks if current hour in time is an hour at which the job must be       executed.',
                'description' => 'Checks if current hour in time is an hour at which the job must be       executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the current hour in       time is an hour at which the job must be executed.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isMinute',
                'access-modifier' => 'public function',
                'summary' => 'Checks if current minute in time is a minute at which the job must be       executed.',
                'description' => 'Checks if current minute in time is a minute at which the job must be       executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the current minute in       time is a minute at which the job must be executed.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isMonth',
                'access-modifier' => 'public function',
                'summary' => 'Checks if current month in time is a month at which the job must be       executed.',
                'description' => 'Checks if current month in time is a month at which the job must be       executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the current month in       time is a month at which the job must be executed.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isSuccess',
                'access-modifier' => 'public function',
                'summary' => 'Returns true if the job was executed successfully.',
                'description' => 'Returns true if the job was executed successfully. The value returned by this method will depends on the return value       of the value which is returned by the method AbstractJob::execute().       If the method returned null or true, then it means the job       was successfully executed. If it returns false, this means the job did       not execute successfully. If it throws an exception, then the job is       not successfully completed.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'True if the job was executed successfully. False       if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isTime',
                'access-modifier' => 'public function',
                'summary' => 'Checks if its time to execute the job or not.',
                'description' => 'Checks if its time to execute the job or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If its time to execute the job, the method will return true.       If not, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'onFail',
                'access-modifier' => 'public abstract function',
                'summary' => 'Run some routines if the job is executed and failed to completed successfully.',
                'description' => 'Run some routines if the job is executed and failed to completed successfully. The status of failure or success depends on the implementation of the method       AbstractJob::execute().      The developer can implement this method to take actions after the       job is executed and failed to completed.       It is optional to implement that method. The developer can       leave the body of the method empty.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'onMonth',
                'access-modifier' => 'public function',
                'summary' => 'Schedules a job to run at specific day and time in a specific month.',
                'description' => 'Schedules a job to run at specific day and time in a specific month. ',
                'params' => [
                    '$monthNameOrNum' => [
                        'type' => 'int|string',
                        'description' => 'Month number from 1 to 12 inclusive       or 3 letters month name. Default is \'jan\'.',
                        'optional' => false,
                    ],
                    '$dayNum' => [
                        'type' => 'int',
                        'description' => 'The number of day in the month starting from 1 up to       31 inclusive. Default is 1.',
                        'optional' => false,
                    ],
                    '$time' => [
                        'type' => 'string',
                        'description' => 'A time in the form \'hh:mm\'. hh can have any value       between 0 and 23 inclusive. mm can have any value between 0 and 59 inclusive.       default is \'00:00\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the time for the cron job is set, the method will       return true. If not, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'onSuccess',
                'access-modifier' => 'public abstract function',
                'summary' => 'Run some routines if the job is executed and completed successfully.',
                'description' => 'Run some routines if the job is executed and completed successfully. The status of failure or success depends on the implementation of the method       AbstractJob::execute().      The developer can implement this method to perform actions after the       job is executed and failed to completed.       It is optional to implement that method. The developer can       leave the body of the method empty.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCommand',
                'access-modifier' => 'public function',
                'summary' => 'Associate the job with the command that was used to execute the job.',
                'description' => 'Associate the job with the command that was used to execute the job. ',
                'params' => [
                    '$command' => [
                        'type' => 'CronCommand',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setJobName',
                'access-modifier' => 'public function',
                'summary' => 'Sets an optional name for the job.',
                'description' => 'Sets an optional name for the job. The name is used to make different jobs unique. Each job must       have its own name. Also, the name of the job is used to force job       execution. It can be supplied as a part of cron URL.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the job.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'weeklyOn',
                'access-modifier' => 'public function',
                'summary' => 'Schedules a job to run weekly at specific week day and time.',
                'description' => 'Schedules a job to run weekly at specific week day and time. ',
                'params' => [
                    '$dayNameOrNum' => [
                        'type' => 'int',
                        'description' => 'A 3 letter day name (such as \'sun\'       or \'tue\') or a day number from 0 to 6. 0 for sunday. Default is 0.',
                        'optional' => false,
                    ],
                    '$time' => [
                        'type' => 'string',
                        'description' => 'A time in the form \'hh:mm\'. hh can have any value       between 0 and 23 inclusive. mm can have any value between 0 and 59 inclusive.       default is \'00:00\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the time for the cron job is set, the method will       return true. If not, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;