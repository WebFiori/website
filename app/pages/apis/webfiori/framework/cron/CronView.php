<?php
namespace docGenerator\webfiori\framework\cron;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CronView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that is used to manage scheduled background jobs.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Cron');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Cron', '\webfiori\framework\cron', 'A class that is used to manage scheduled background jobs. It is used to create jobs, schedule them and execute them. In order to run   the jobs automatically, the developer must add an entry in the following   formate in crontab:  <p><code>      /usr/bin/php path/to/webfiori --cron check p=&lt;password&gt;</code></p>  Where &lt;password&gt; is the password   that was set by the developer to protect the jobs from unauthorized access.   If no password is set, then it can be removed from the command.  Note that the path to PHP executable might differ from "/usr/bin/php".   It depends on where the executable has been installed.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'activeJob',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an object that represents the job which is currently being executed.',
                'description' => 'Returns an object that represents the job which is currently being executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If there is a job which is being executed, the       method will return an object of type \'CronJob\' that represent it.       If no job is being executed, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/cron/CronJob', 'CronJob'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createJob',
                'access-modifier' => 'public static function',
                'summary' => 'Creates new job using cron expression.',
                'description' => 'Creates new job using cron expression. The job will be created and scheduled only if the given cron expression       is valid. For more information on cron expressions, go to       https://en.wikipedia.org/wiki/Cron#CRON_expression. Note that       the method does not support year field. This means       the expression will have only 5 fields.',
                'params' => [
                    '$when' => [
                        'type' => 'string',
                        'description' => 'A cron expression.',
                        'optional' => false,
                    ],
                    '$jobName' => [
                        'type' => 'string',
                        'description' => 'An optional job name.',
                        'optional' => false,
                    ],
                    '$function' => [
                        'type' => 'callable',
                        'description' => 'A function to run when it is the time to execute       the job.',
                        'optional' => false,
                    ],
                    '$funcParams' => [
                        'type' => 'array',
                        'description' => 'An array of parameters that can be passed to the       function.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the job was created and scheduled, the method will       return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dailyJob',
                'access-modifier' => 'public static function',
                'summary' => 'Creates a daily job to execute every day at specific hour and minute.',
                'description' => 'Creates a daily job to execute every day at specific hour and minute. ',
                'params' => [
                    '$time' => [
                        'type' => 'string',
                        'description' => 'A time in the form \'hh:mm\'. hh can have any value       between 0 and 23 inclusive. mm can have any value between 0 and 59 inclusive.',
                        'optional' => false,
                    ],
                    '$name' => [
                        'type' => 'string',
                        'description' => 'An optional name for the job. Can be null.',
                        'optional' => false,
                    ],
                    '$func' => [
                        'type' => 'callable',
                        'description' => 'A function that will be executed once it is the       time to run the job.',
                        'optional' => false,
                    ],
                    '$funcParams' => [
                        'type' => 'array',
                        'description' => 'An optional array of parameters which will be passed to       the callback that will be executed when its time to execute the job.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the job was created and scheduled, the method will       return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dayOfMonth',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of current day in the current  month as integer.',
                'description' => 'Returns the number of current day in the current  month as integer. This method is used by the class \'CronJob\' to validate cron job       execution time.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An integer that represents current day number in       the current month.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dayOfWeek',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of current day in the current  week as integer.',
                'description' => 'Returns the number of current day in the current  week as integer. This method is used by the class \'CronJob\' to validate cron job       execution time. The method will always return a value between 0 and 6       inclusive. 0 Means Sunday and 6 is for Saturday.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An integer that represents current day number in       the week.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'execLog',
                'access-modifier' => 'public static function',
                'summary' => 'Enable or disable logging for jobs execution.',
                'description' => 'Enable or disable logging for jobs execution. This method is also used to check if logging is enabled or not. If       execution log is enabled, a log file with the name \'cron.log\' will be       created in the folder \'/logs\'.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, a log file that contains the details       of the executed jobs will be created in \'logs\' folder. Default value       is null.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If logging is enabled, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJob',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a job given its name.',
                'description' => 'Returns a job given its name. ',
                'params' => [
                    '$jobName' => [
                        'type' => 'string',
                        'description' => 'The name of the job.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a job which has the given name was found,       the method will return an object of type \'CronJob\' that represents       the job. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/cron/CronJob', 'CronJob'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJobsNames',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains the names of scheduled jobs.',
                'description' => 'Returns an array that contains the names of scheduled jobs. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the names of scheduled jobs.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLogArray',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the array that contains logged messages.',
                'description' => 'Returns the array that contains logged messages. The array will contain the messages which where logged using the method       <code>Cron::log()</code>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array of strings.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hour',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of current hour in the day as integer.',
                'description' => 'Returns the number of current hour in the day as integer. This method is used by the class \'CronJob\' to validate cron job       execution time. The method will always return a value between 0 and 23       inclusive.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An integer that represents current hour number in       the day.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'initRoutes',
                'access-modifier' => 'public static function',
                'summary' => 'Creates routes to cron web interface pages.',
                'description' => 'Creates routes to cron web interface pages. This method is used to initialize the following routes:      <ul>      <li>/cron</li>      <li>/cron/login</li>      <li>/cron/apis/{action}</li>      <li>/cron/jobs</li>      <li>/cron/jobs/{job-name}</li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'jobsQueue',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a queue of all queued jobs.',
                'description' => 'Returns a queue of all queued jobs. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'Queue\' which contains all queued jobs.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/Queue', 'Queue'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'log',
                'access-modifier' => 'public static function',
                'summary' => 'Appends a message to the array that contains logged messages.',
                'description' => 'Appends a message to the array that contains logged messages. The main aim of the log is to help developers identify the issues which       might cause a job to fail. This method can be called in any place to       log a message while the code is executing.',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'A string that act as a log message. It will be       appended as passed without any changes.',
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
                'name' => 'minute',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of current minute in the current hour as integer.',
                'description' => 'Returns the number of current minute in the current hour as integer. This method is used by the class \'CronJob\' to validate cron job       execution time. The method will always return a value between 0 and 59       inclusive.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An integer that represents current minute number in       the current hour.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'month',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of current month as integer.',
                'description' => 'Returns the number of current month as integer. This method is used by the class \'CronJob\' to validate cron job       execution time. The method will always return a value between 1 and 12       inclusive.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An integer that represents current month\'s number.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'monthlyJob',
                'access-modifier' => 'public static function',
                'summary' => 'Create a job that will be executed once every month.',
                'description' => 'Create a job that will be executed once every month. ',
                'params' => [
                    '$dayNumber' => [
                        'type' => 'int',
                        'description' => 'The day of the month at which the job will be       executed on. It can have any value between 1 and 31 inclusive.',
                        'optional' => false,
                    ],
                    '$time' => [
                        'type' => 'string',
                        'description' => 'A string that represents the time of the day that       the job will execute on. The format of the time must be \'HH:MM\'. where       HH can have any value from \'00\' up to \'23\' and \'MM\' can have any value       from \'00\' up to \'59\'.',
                        'optional' => false,
                    ],
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of cron job.',
                        'optional' => false,
                    ],
                    '$func' => [
                        'type' => 'callable',
                        'description' => 'A function that will be executed when its time to       run the job.',
                        'optional' => false,
                    ],
                    '$funcParams' => [
                        'type' => 'array',
                        'description' => 'An optional array of parameters which will be       passed to job function.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the job was scheduled, the method will return true.       If not, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'password',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or gets the password that is used to protect the cron instance.',
                'description' => 'Sets or gets the password that is used to protect the cron instance. The password is used to prevent unauthorized access to execute jobs.       The provided password must be \'sha256\' hashed string. It is recommended       to hash the password externally then use the hash inside your code.',
                'params' => [
                    '$pass' => [
                        'type' => 'string',
                        'description' => 'If not null, the password will be updated to the       given one.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the password is set, the method will return it.       If not set, the method will return the string \'NO_PASSWORD\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'registerJobs',
                'access-modifier' => 'public static function',
                'summary' => 'Register any CRON job which exist in the folder \'jobs\' of the application.',
                'description' => 'Register any CRON job which exist in the folder \'jobs\' of the application. Note that this method will register jobs only if the framework is running      using CLI or the constant \'CRON_THROUGH_HTTP\' is set to true.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'run',
                'access-modifier' => 'public static function',
                'summary' => 'Check each scheduled job and run it if its time to run it.',
                'description' => 'Check each scheduled job and run it if its time to run it. ',
                'params' => [
                    '$pass' => [
                        'type' => 'string',
                        'description' => 'If cron password is set, this value must be       provided. The given value will be hashed inside the body of the       method and then compared with the password which was set. Default       is empty string.',
                        'optional' => false,
                    ],
                    '$jobName' => [
                        'type' => 'string|null',
                        'description' => 'An optional job name. If specified, only       the given job will be checked. Default is null.',
                        'optional' => false,
                    ],
                    '$force' => [
                        'type' => 'boolean',
                        'description' => 'If this attribute is set to true and a job name       was provided, the job will be forced to execute. Default is false.',
                        'optional' => false,
                    ],
                    '$command' => [
                        'type' => 'CronCommand',
                        'description' => 'If cron is run from CLI, this parameter is       provided to set custom execution attributes of a job.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If cron password is set and the given one is       invalid, the method will return the string \'INV_PASS\'. If       a job name is specified and no job was found which has the given       name, the method will return the string \'JOB_NOT_FOUND\'. Other than that,       the method will return an associative array which has the       following indices:      <ul>      <li><b>total-jobs</b>: Total number of scheduled jobs.</li>      <li><b>executed-count</b>: Number of executed jobs.</li>      <li><b>successfully-completed</b>: Number of successfully       completed jobs.</li>      <li><b>failed</b>: Number of jobs which did not       finish successfully.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'scheduleJob',
                'access-modifier' => 'public static function',
                'summary' => 'Adds new job to jobs queue.',
                'description' => 'Adds new job to jobs queue. ',
                'params' => [
                    '$job' => [
                        'type' => 'AbstractJob',
                        'description' => 'An instance of the class \'AbstractJob\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the job is added, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDayOfMonth',
                'access-modifier' => 'public function',
                'summary' => 'Sets the number of day in the month at which the scheduler started to       execute jobs.',
                'description' => 'Sets the number of day in the month at which the scheduler started to       execute jobs. This method is helpful for the developer to test if jobs will run on       the specified time or not.',
                'params' => [
                    '$dayOfMonth' => [
                        'type' => 'int',
                        'description' => 'The number of day. 1 for the first day of month and       31 for the last day of the month.',
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
                'name' => 'setDayOfWeek',
                'access-modifier' => 'public static function',
                'summary' => 'Sets the value of the week at which the scheduler started to       run.',
                'description' => 'Sets the value of the week at which the scheduler started to       run. This method is helpful for the developer to test if jobs will run on       the specified time or not.',
                'params' => [
                    '$val' => [
                        'type' => 'int',
                        'description' => 'Numeric representation of the day of the week.       0 for Sunday through 6 for Saturday.',
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
                'name' => 'setHour',
                'access-modifier' => 'public function',
                'summary' => 'Sets the hour at which the scheduler started to       execute jobs.',
                'description' => 'Sets the hour at which the scheduler started to       execute jobs. This method is helpful for the developer to test if jobs will run on       the specified time or not.',
                'params' => [
                    '$hour' => [
                        'type' => 'int',
                        'description' => 'The number of hour. Can be any value between 1 and       23 inclusive.',
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
                'name' => 'setMinute',
                'access-modifier' => 'public function',
                'summary' => 'Sets the minute at which the scheduler started to       execute jobs.',
                'description' => 'Sets the minute at which the scheduler started to       execute jobs. This method is helpful for the developer to test if jobs will run on       the specified time or not.',
                'params' => [
                    '$minute' => [
                        'type' => 'int',
                        'description' => 'The number of the minute. Can be any value from       1 to 59.',
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
                'name' => 'setMonth',
                'access-modifier' => 'public function',
                'summary' => 'Sets the month at which the scheduler started to       execute jobs.',
                'description' => 'Sets the month at which the scheduler started to       execute jobs. This method is helpful for the developer to test if jobs will run on       the specified time or not.',
                'params' => [
                    '$month' => [
                        'type' => 'int',
                        'description' => 'The number of the month. Can be any value       between 1 and 12 inclusive.',
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
                'name' => 'timestamp',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the time at which jobs check was initialized.',
                'description' => 'Returns the time at which jobs check was initialized. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a time string in the format       \'YY-DD HH:MM\' where:       <ul>      <li>\'YY\' is month number.</li>      <li>\'MM\' is day number in the current month.</li>      <li>\'HH\' is the hour.</li>      <li>\'MM\' is the minute.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'weeklyJob',
                'access-modifier' => 'public static function',
                'summary' => 'Creates a job that will be executed on specific time weekly.',
                'description' => 'Creates a job that will be executed on specific time weekly. ',
                'params' => [
                    '$time' => [
                        'type' => 'string',
                        'description' => 'A string in the format \'d-hh:mm\'. \'d\' can be a number       between 0 and 6 inclusive or a 3 characters day name such as \'sun\'. 0 is       for Sunday and 6 is for Saturday.      \'hh\' can have any value between 0 and 23 inclusive. mm can have any value       between 0 and 59 inclusive.',
                        'optional' => false,
                    ],
                    '$name' => [
                        'type' => 'string',
                        'description' => 'An optional name for the job. Can be null.',
                        'optional' => false,
                    ],
                    '$func' => [
                        'type' => 'callable|null',
                        'description' => 'A function that will be executed once it is the       time to run the job.',
                        'optional' => false,
                    ],
                    '$funcParams' => [
                        'type' => 'array',
                        'description' => 'An optional array of parameters which will be passed to       the function.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the job was created and scheduled, the method will       return true. Other than that, the method will return false.',
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