<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class UtilView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('Framework utility class.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Util');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Util', '\webfiori\framework', 'Framework utility class. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'DB_NEED_CONF',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that database connection was not established.',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that database connection was not established. ',
            ),
            new AttributeDef(
            'const',
            '',
            'ERR_TYPES',
            'A constant array that contains all PHP error codes in       addition to a description for each error.',
            'A constant array that contains all PHP error codes in       addition to a description for each error. It is possible to access error information by simply using error       number as an index. For example, to access E_ERROR info, do the following:<br/>      <code>      $errInf = ERR_TYPES[E_ERROR];<br/>      echo $errInf[\'type\'];<br/>      echo $errInf[\'description\'];<br/>      </code>',
            ),
            new AttributeDef(
            'const',
            '',
            'MISSING_CONF_FILE',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that the file \'Config.',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that the file \'Config. php\' is missing.',
            ),
            new AttributeDef(
            'const',
            '',
            'MISSING_SITE_CONF_FILE',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that the file \'SiteConfig.',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that the file \'SiteConfig. php\' is missing.',
            ),
            new AttributeDef(
            'const',
            '',
            'NEED_CONF',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that system is not configured yet.',
            'A constant that is returned by Util::checkSystemStatus() to indicate       that system is not configured yet. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'binaryString',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a positive integer value to binary string.',
                'description' => 'Converts a positive integer value to binary string. ',
                'params' => [
                    '$intVal' => [
                        'type' => 'int',
                        'description' => 'The number that will be converted.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given value is an integer and it is greater       than -1, a string of zeros and ones is returned. Other than that,       false is returned.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'displayErrors',
                'access-modifier' => 'public static function',
                'summary' => 'Call this method to display errors and warnings.',
                'description' => 'Call this method to display errors and warnings. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'extractClassName',
                'access-modifier' => 'public static function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$filePath' => [
                        'type' => 'unkown_type',
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
                'name' => 'filterScripts',
                'access-modifier' => 'public static function',
                'summary' => 'This method is used to filter scripting code such as       JavaScript or PHP.',
                'description' => 'This method is used to filter scripting code such as       JavaScript or PHP. ',
                'params' => [
                    '$input' => [
                        'type' => 'string',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'string
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBaseURL',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the base URL of the framework.',
                'description' => 'Returns the base URL of the framework. The returned value will depend on the folder where the framework files       are located. For example, if your domain is \'example.com\' and the framework       is placed at the root and the requested resource is \'http://example.com/x/y/z\',       then the base URL will be \'http://example.com/\'. If the framework is       placed inside a folder in the server which has the name \'system\', and       the same resource is requested, then the base URL will be       \'http://example.com/system\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The base URL (such as \'http//www.example.com/\')',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClientIP',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the IP address of the user who is connected to the server.',
                'description' => 'Returns the IP address of the user who is connected to the server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The IP address of the user who is connected to the server.       The value is taken from the array $_SERVER at index \'REMOTE_ADDR\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDatabaseTestInstance',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the instance of \'MySQLLink\' which is used to check database       connection using the method \'Util::checkDbConnection()\'.',
                'description' => 'Returns the instance of \'MySQLLink\' which is used to check database       connection using the method \'Util::checkDbConnection()\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The instance of \'MySQLLink\' which is used to check database       connection using the method \'Util::checkDbConnection()\'. If no test was       performed, the method will return null.',
                    'return-types' => [
                        'MySQLLink',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getGWeekDates',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains the dates of current week\'s days in Gregorian calendar.',
                'description' => 'Returns an array that contains the dates of current week\'s days in Gregorian calendar. The returned array will contain the dates starting from Sunday. The format       of the dates will be \'Y-m-d\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an array that contains the dates of current week\'s days.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getGWeekday',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of a day in the week given a date.',
                'description' => 'Returns the number of a day in the week given a date. ',
                'params' => [
                    '$date' => [
                        'type' => 'string',
                        'description' => 'A date string that has the month, the date and       year number. The string must be provided in the format \'YYYY-MM-DD\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'ISO-8601 numeric representation of the day that       represents the given date in the week. 1 for Monday and 7 for Sunday.       If the method fails, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHostIP',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the IPv4 address of server host.',
                'description' => 'Returns the IPv4 address of server host. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The IPv4 address of server host.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRequestHeaders',
                'access-modifier' => 'public static function',
                'summary' => 'Returns HTTP request headers.',
                'description' => 'Returns HTTP request headers. This method will try to extract request headers using two ways,       first, it will check if the method \'apache_request_headers()\' is       exist or not. If it does, then request headers will be taken from       there. If it does not exist, it will try to extract request headers       from the super global $_SERVER.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array of request headers. The indices       will represents the headers and the values are the values of the       headers. The indices will be all in lower case.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRequestedURL',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the URI of the requested resource.',
                'description' => 'Returns the URI of the requested resource. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The URI of the requested resource.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isDirectory',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if a given directory exists or not.',
                'description' => 'Checks if a given directory exists or not. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A string in a form of directory (Such as \'root/home/res\').',
                        'optional' => false,
                    ],
                    '$createIfNot' => [
                        'type' => 'boolean',
                        'description' => 'If set to true and the given directory does       not exists, The method will try to create the directory.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'In general, the method will return false if the       given directory does not exists. The method will return true only       in two cases, If the directory exits or it does not exists but was created.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isUpper',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if a given character is an upper case letter or lower case letter.',
                'description' => 'Checks if a given character is an upper case letter or lower case letter. ',
                'params' => [
                    '$char' => [
                        'type' => 'char',
                        'description' => 'A character such as (A B C D " > < ...).',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'True if the given character is in upper case.',
                    'return-types' => [
                        'bool',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'numericValue',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a string to its numeric value.',
                'description' => 'Converts a string to its numeric value. ',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'A string that represents a number.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given string represents an integer,       the value is returned as an integer. If the given string represents a float,       the value is returned as a float. If the method is unable to convert       the string to its numerical value, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                        new Anchor('http://php.net/manual/en/language.types.float.php', 'float'),
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'print_r',
                'access-modifier' => 'public static function',
                'summary' => 'Call the method \'print_r\' and insert \'pre\' around it.',
                'description' => 'Call the method \'print_r\' and insert \'pre\' around it. The method is used to make the output well formatted and user       readable. Note that if the framework is running through command line       interface, the output will be sent to STDOUTE.',
                'params' => [
                    '$expr' => [
                        'type' => 'mixed',
                        'description' => 'Any variable or value that can be passed to the       function \'print_r\'.',
                        'optional' => false,
                    ],
                    '$asMessageBox' => [
                        'type' => 'boolean',
                        'description' => 'If this attribute is set to true, the output      will be shown in a floating message box which can be moved around inside       the web page. Default is true. It has no effect in case the framework       is running through CLI.',
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
                'name' => 'reverse',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the reverse of a string.',
                'description' => 'Returns the reverse of a string. This method can be used to reverse the order of any string.       For example, if the given string is \'   Good Morning Buddy\', the       method will return \'ydduB gninriM dooG   \'. If null is given, the       method will return empty string. Note that if the given string is       a unicode string, then the method needs mb_ extension to be exist for       the output to be correct.',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'The string that will be reversed.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The string after reversing its order.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'uniord',
                'access-modifier' => 'public static function',
                'summary' => 'Returns unicode code of a character.',
                'description' => 'Returns unicode code of a character. Common values: 32 = space, 10 = new line, 13 = carriage return.      Note that this method depends on mb_ functions.',
                'params' => [
                    '$u' => [
                        'type' => 'type',
                        'description' => 'a character.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The unicode code of a character. If mb_ library is not       loaded, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
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