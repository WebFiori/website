<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class LoggerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that is used to log messages to a file.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Logger');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Logger', '\webfiori\framework', 'A class that is used to log messages to a file. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'MESSSAGE_TYPES',
            'An array which contains a key that describes the meaning of a log message.',
            'An array which contains a key that describes the meaning of a log message. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'callStack',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a stack which contains all the called functions and methods.',
                'description' => 'Returns a stack which contains all the called functions and methods. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An instance of the class \'Stack\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/Stack', 'Stack'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clear',
                'access-modifier' => 'public static function',
                'summary' => 'Removes the whole content of the log file.',
                'description' => 'Removes the whole content of the log file. Once the content of the log is cleared, a message at the top of the log       will appear. The message will say the following:      <p>---------------Log Cleared At YYYY-MM-DD HH:MM:SS +00---------------</p>      The \'+00\' is the code of the time zone.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'directory',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or returns the full directory of the log file.',
                'description' => 'Sets or returns the full directory of the log file. Note that If the given directory does not exists, the method will       try to create it. The default place for saving logs is ROOT_DIR.\'/logs\'.',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'If provided, the save directory will be set to the       given one.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The location where the log files are stored.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'displayLog',
                'access-modifier' => 'public static function',
                'summary' => 'Show log content as output on screen.',
                'description' => 'Show log content as output on screen. This function simply open the log file and display it as output using       \'echo\' command.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'enabled',
                'access-modifier' => 'public static function',
                'summary' => 'Enable, disable or check if logging is enabled.',
                'description' => 'Enable, disable or check if logging is enabled. ',
                'params' => [
                    '$isEnabled' => [
                        'type' => 'boolean',
                        'description' => 'If provided and set to true, logging will be       enabled. If provided and not true, logging will be disabled.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if logging is enabled.       false otherwise. Default return value is false which means that the       logger is disabled.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'get',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a singleton of the class.',
                'description' => 'Returns a singleton of the class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'Logger
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAbsolutePath',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a string that represents the absolute path to the log file location.',
                'description' => 'Returns a string that represents the absolute path to the log file location. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the absolute path to the log file location.       Note that the extension \'.log\' will be appended to the end of the string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLogsArray',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains all log messages.',
                'description' => 'Returns an array that contains all log messages. ',
                'params' => [
                    '$logName' => [
                        'type' => 'string',
                        'description' => 'An optional log name. If provided, only log messages       of the given log will be returned.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The array that will be returned will be associative. The       keys will be logs names and the values are logged messages.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'log',
                'access-modifier' => 'public static function',
                'summary' => 'Writes a message to the log file.',
                'description' => 'Writes a message to the log file. ',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'The message that will be written.',
                        'optional' => false,
                    ],
                    '$messageType' => [
                        'type' => 'string',
                        'description' => 'The type of the message that will be logged.       it can have one of 4 values, \'info\', \'warning\', \'error\' or \'debug\'. Note       that the last type will be logged only if the constant \'DEBUG\' is defined.       The default value is \'info\'.',
                        'optional' => false,
                    ],
                    '$logName' => [
                        'type' => 'string',
                        'description' => 'The name of the log file. If it is not       null, the log will be written to the given file name.',
                        'optional' => false,
                    ],
                    '$addDashes' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, a line of dashes will be inserted       after the message. Used to organize log messages.',
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
                'name' => 'logFuncCall',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a debug message to a log file that says the given method or function was called.',
                'description' => 'Adds a debug message to a log file that says the given method or function was called. The message will be logged only if the constant \'DEBUG\' is defined.',
                'params' => [
                    '$funcName' => [
                        'type' => 'string',
                        'description' => 'The name of the function or the method. To get the       name of the function in its body, Use the magic constant \'__FUNCTION__\'.       To get the name of a method inside class, use the magic constant \'__METHOD__\'.      It is recommended to always use \'__METHOD__\' as this constant will return       class name with it if the method is inside a class.',
                        'optional' => false,
                    ],
                    '$logFileName' => [
                        'type' => 'string',
                        'description' => 'The name of the log file. If it is not       null, the log will be written to the given file name.',
                        'optional' => false,
                    ],
                    '$addDashes' => [
                        'type' => 'string',
                        'description' => 'If set to true, a line of dashes will be inserted       after the message. Used to organize log messages.',
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
                'name' => 'logFuncReturn',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a debug message to a log file that says the execution of a given       function or a method was finished.',
                'description' => 'Adds a debug message to a log file that says the execution of a given       function or a method was finished. Note that the message will be logged only if the constant       \'DEBUG\' is defined. To get the       name of the function in its body, Use the magic constant \'__FUNCTION__\'.       To get the name of a method inside class, use the magic constant \'__METHOD__\'.      It is recommended to always use \'__METHOD__\' as this constant will return       class name with it if the function is inside a class.',
                'params' => [
                    '$funcName' => [
                        'type' => 'string',
                        'description' => 'The name of the function or method.',
                        'optional' => false,
                    ],
                    '$logFileName' => [
                        'type' => 'string',
                        'description' => 'The name of the log file. If it is not       null, the log will be written to the given file name. Default is null.',
                        'optional' => false,
                    ],
                    '$addDashes' => [
                        'type' => 'string',
                        'description' => 'If set to true, a line of dashes will be inserted       after the message. Used to organize log messages.',
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
                'name' => 'logName',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or returns the name of the log file.',
                'description' => 'Sets or returns the name of the log file. This method is used to switch between different log files. The       name should be provided without any extentions (e.g. \'my-log\').       Note that log files will always have the       extention .txt The default log file name is \'log.txt\'.',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'The name of the log file that the system will be writing       logs to.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the name of the log file that the       logger is using to write logs (without extension).',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'logReturnValue',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a log message to log function or method\'s return value (debug).',
                'description' => 'Adds a log message to log function or method\'s return value (debug). ',
                'params' => [
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The return value of a function.',
                        'optional' => false,
                    ],
                    '$logName' => [
                        'type' => 'type',
                        'description' => 'The name of the log file. If it is not       null, the log will be written to the given file name.',
                        'optional' => false,
                    ],
                    '$addDashes' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, a line of dashes will be inserted       after the message. Used to organize log messages.',
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
                'name' => 'requestCompleted',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a message to the last selected log file that states the client       request was processed.',
                'description' => 'Adds a message to the last selected log file that states the client       request was processed. This method is usually called after calling       the function \'die()\' or \'exit()\'. Also if no server code will be       executed after. The exact message that will be logged is:      <p>"Processing of client request is finished."</p>',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'section',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a new line to separate log parts.',
                'description' => 'Adds a new line to separate log parts. T      he line will have the following text:      <p>-+--+-</p>',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'storeLogs',
                'access-modifier' => 'public static function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
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