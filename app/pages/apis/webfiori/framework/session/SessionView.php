<?php
namespace docGenerator\webfiori\framework\session;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SessionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a session.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Session');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Session', '\webfiori\framework\session', 'A class that represents a session. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'DEFAULT_SESSION_DURATION',
            'The default lifetime for any new session (in minutes).',
            'The default lifetime for any new session (in minutes). ',
            ),
            new AttributeDef(
            'const',
            '',
            'STATUS_EXPIERED',
            'A constant that indicates the session was expired.',
            'A constant that indicates the session was expired. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STATUS_INACTIVE',
            'A constant that indicates the session was initialized but not started or       resumed.',
            'A constant that indicates the session was initialized but not started or       resumed. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STATUS_KILLED',
            'A constant that indicates the session has been killed by calling the       method \'Session::kill()\'.',
            'A constant that indicates the session has been killed by calling the       method \'Session::kill()\'. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STATUS_NEW',
            'A constant that indicates the session was just created.',
            'A constant that indicates the session was just created. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STATUS_PAUSED',
            'A constant that indicates the session was paused.',
            'A constant that indicates the session was paused. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STATUS_RESUMED',
            'A constant that indicates the session has been resumed.',
            'A constant that indicates the session has been resumed. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An array that contains session options. Available       options are:      <ul>      <li><b>name</b>: The name of the session. A valid name can only       consist of [a-z], [A-Z], [0-9], dash and underscore. This must be       provided or the method will throw an exception.</li>      <li><b>duration</b>: The duration of the session in minutes. Must be a number       greater than or equal to 0. If 0 is given, it means the session is not       persistent. If the duration is invalid, it will be set to Session::DEFAULT_SESSION_DURATION</li>      <li><b>refresh</b>: A boolean which is set to true if session timeout time       will be refreshed with every request. Default is false.</li>      </ul>',
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
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => 'Returns a JSON string that represents the session.',
                'description' => 'Returns a JSON string that represents the session. ',
                'params' => [
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
                'name' => 'close',
                'access-modifier' => 'public function',
                'summary' => 'Store session state and pause the session.',
                'description' => 'Store session state and pause the session. Note that session state will be stored only if it is running.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'get',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of a session variable.',
                'description' => 'Returns the value of a session variable. ',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a variable which has the given name is found, its       value is returned. If no such variable exist, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCookieHeader',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string which can be passed to the function \'header()\' to set session       cookie.',
                'description' => 'Returns a string which can be passed to the function \'header()\' to set session       cookie. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The string that will be returned will have the following       format:       \'&lt;cookie-name&gt;=&lt;val&gt;; expires=&lt;time&gt;; path=/       SameSite=&lt;Lax|None|Strict&gt;\'',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCookieParams',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains session cookie\'s information.',
                'description' => 'Returns an associative array that contains session cookie\'s information. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array will contain the following indices:      <ul>      <li>expires: The time at which session cookie will expire. If the cookie is       persistent, this will have a non-zero value.</li>      <li>domain: The domain at which session cookie will operate in.</li>      <li>path: The path that the cookie will operate in.</li>      <li>httponly</li>      <li>secure</li>      <li>samesite</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDuration',
                'access-modifier' => 'public function',
                'summary' => 'Returns the amount of time at which the session will be kept alive in.',
                'description' => 'Returns the amount of time at which the session will be kept alive in. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'This method will return session duration in seconds. The      default duration of any new session is 120 minutes (7200 seconds).',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getId',
                'access-modifier' => 'public function',
                'summary' => 'Returns the ID of the session.',
                'description' => 'Returns the ID of the session. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The ID of the session.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getIp',
                'access-modifier' => 'public function',
                'summary' => 'Returns the IP address of the client at which the request has come from.',
                'description' => 'Returns the IP address of the client at which the request has come from. ',
                'params' => [
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
                'name' => 'getLangCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns session language code.',
                'description' => 'Returns session language code. ',
                'params' => [
                    '$forceUpdate' => [
                        'type' => 'boolean',
                        'description' => 'Set to true if the language is set and want to       reset it. The reset process depends on the attribute       \'lang\'. It can be send via \'get\' request, \'post\' request or a cookie. If       no language code is provided and the parameter \'$forceUpdate\' is set       to true, \'EN\' will be used. If the given       language code is not in the given array and the parameter \'$forceUpdate\' is set       to true, \'EN\' will be used.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'two digit language code (such as \'EN\'). If the session       is not running or the language is not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the session.',
                'description' => 'Returns the name of the session. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the session as string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPassedTime',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of seconds that has been passed since the session started.',
                'description' => 'Returns the number of seconds that has been passed since the session started. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of seconds that has been passed since the session started.       If the session status is Session::STATUS_INACTIVE, the method will return 0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRemainingTime',
                'access-modifier' => 'public function',
                'summary' => 'Returns number of seconds remaining before the session timeout.',
                'description' => 'Returns number of seconds remaining before the session timeout. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the session is persistent or set to refresh for every request,       the method will return 0. Other than that, it will return remaining time.       If the session has no remaining time, it will return -1.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getResumedAt',
                'access-modifier' => 'public function',
                'summary' => 'Returns the time at which the session was resumed at in seconds.',
                'description' => 'Returns the time at which the session was resumed at in seconds. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The time at which the session was resumed at in seconds. If       the session is not running, the time will be 0. If the session is new,       the time will be the same as start time.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getStartedAt',
                'access-modifier' => 'public function',
                'summary' => 'Returns the time at at which the session was started at.',
                'description' => 'Returns the time at at which the session was started at. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the time in seconds. If the session       is not running, the method will return 0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getStatus',
                'access-modifier' => 'public function',
                'summary' => 'Returns the status of the session.',
                'description' => 'Returns the status of the session. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The status of the session.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUser',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type \'User\' that represents session user.',
                'description' => 'Returns an object of type \'User\' that represents session user. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'User\' that represents session user.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/User', 'User'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getVars',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains all session variables.',
                'description' => 'Returns an associative array that contains all session variables. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains all session variables.       The indices will be variables names and the value of each index is the       variable value.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'has',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the session has a given value or not.',
                'description' => 'Checks if the session has a given value or not. Note that the method will always return false if the session is not running.',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable that has the value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the value exist, the method will return true. Other       than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isPersistent',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the session cookie is persistent or not.',
                'description' => 'Checks if the session cookie is persistent or not. A session is persistent if its duration is greater than 0 minutes (has a       duration).',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the session cookie is persistent, the method will return true.       false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isRefresh',
                'access-modifier' => 'public function',
                'summary' => 'Checks if session timeout time will be refreshed with every request or not.',
                'description' => 'Checks if session timeout time will be refreshed with every request or not. This method must be called only after calling the method \'SessionManager::initSession()\'.       or it will throw an exception.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true If session timeout time will be refreshed with every request.       false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isRunning',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the session is started and running or not.',
                'description' => 'Checks if the session is started and running or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'the status of the session is Session::STATUS_NEW or Session::STATUS_RESUMED,       the method will return true. Other than that, the method will return false.',
                    'return-types' => [
                        'If',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'kill',
                'access-modifier' => 'public function',
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
            new FunctionDef([
                'name' => 'pull',
                'access-modifier' => 'public function',
                'summary' => 'Retrieves the value of a session variable and removes it from the session.',
                'description' => 'Retrieves the value of a session variable and removes it from the session. ',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the variable exist and its value is set, the method       will return its value. If the value is not set or the session is not       running, the method will return null.',
                    'return-types' => [
                        'mixed',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'reGenerateID',
                'access-modifier' => 'public function',
                'summary' => 'Re-create session ID.',
                'description' => 'Re-create session ID. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The new ID of the session.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'remove',
                'access-modifier' => 'public function',
                'summary' => 'Removes the value of a session variable.',
                'description' => 'Removes the value of a session variable. ',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the value was deleted, the method will return true.       If the variable does not exist or the variable does not exist, the method       will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'serialize',
                'access-modifier' => 'public function',
                'summary' => 'Serialize the session.',
                'description' => 'Serialize the session. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string that represents serialized       session data.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'set',
                'access-modifier' => 'public function',
                'summary' => 'Sets session variable.',
                'description' => 'Sets session variable. Note that session variable will be set only if the session is running.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the variable. Must be non-empty string.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The value of the variable. It can be any thing.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the variable is set, the method will return true. If       not, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDuration',
                'access-modifier' => 'public function',
                'summary' => 'Sets session duration.',
                'description' => 'Sets session duration. Note that this method will also updates the \'expires\' attribute of session       cookie. Also, note that if the new duration less than the passed time,       the session will expire.',
                'params' => [
                    '$time' => [
                        'type' => 'int',
                        'description' => 'Session duration in minutes.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If session duration is updated, the method will return true.       False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsRefresh',
                'access-modifier' => 'public function',
                'summary' => 'Sets if the session timeout will be refreshed with every request       or not.',
                'description' => 'Sets if the session timeout will be refreshed with every request       or not. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, timeout time will be refreshed.       Note that the property will be updated only if the session is running.',
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
                'name' => 'setSameSite',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'SameSite\' of session cookie.',
                'description' => 'Sets the value of the property \'SameSite\' of session cookie. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'It can be one of the following values, \'Lax\', \'Strict\'       or \'None\'. If any other value is provided, it will be ignored.',
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
                'name' => 'setUser',
                'access-modifier' => 'public function',
                'summary' => 'Sets the user that represents session user.',
                'description' => 'Sets the user that represents session user. Note that the user will be set only if the session is active.',
                'params' => [
                    '$userObj' => [
                        'type' => 'User',
                        'description' => 'An object of type \'User\'.',
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
                'name' => 'start',
                'access-modifier' => 'public function',
                'summary' => 'Resumes or starts new session.',
                'description' => 'Resumes or starts new session. This method works as follows, it tries to read a session from sessions       storage using the ID of the session. If a session is found, it will       populate the instance with session values taken from the storage. If no       session was found, the method will initialize new one.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type \'Json\' that represents the session.',
                'description' => 'Returns an object of type \'Json\' that represents the session. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'Json
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'unserialize',
                'access-modifier' => 'public function',
                'summary' => 'Unserialize a session and restore its data in the instance at which the       method is called on.',
                'description' => 'Unserialize a session and restore its data in the instance at which the       method is called on. ',
                'params' => [
                    '$serialized' => [
                        'type' => 'string',
                        'description' => 'The serialized session as string.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the Unserialize was successfully completed, the method       will return true. If Unserialize fails, the method will return false.',
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