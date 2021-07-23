<?php
namespace docGenerator\webfiori\framework\session;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SessionsManagerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to manage user sessions.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SessionsManager');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SessionsManager', '\webfiori\framework\session', 'A class which is used to manage user sessions. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'close',
                'access-modifier' => 'public static function',
                'summary' => 'Saves the state of the active session and close it.',
                'description' => 'Saves the state of the active session and close it. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'destroy',
                'access-modifier' => 'public static function',
                'summary' => 'Destroy the active session.',
                'description' => 'Destroy the active session. Calling this method when there is no active session will have no effect.',
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
                'access-modifier' => 'public static function',
                'summary' => 'Returns the value of a session variable.',
                'description' => 'Returns the value of a session variable. The value will be taken from the active session.',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a variable which has the given name is found, its       value is returned. If no such variable exist or there was no active session,      the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getActiveSession',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the currently active session.',
                'description' => 'Returns the currently active session. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If a session is active, the method will return an       object of type \'Session\' that contains session information. If no       session is active, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/session/Session', 'Session'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCookiesHeaders',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains cookies headers values.',
                'description' => 'Returns an array that contains cookies headers values. The returned values can be used to create cookies for sessions.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an array that contains headers values       that can be used to create sessions cookies.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSessionIDFromCookie',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the ID of a session from a cookie given its name.',
                'description' => 'Returns the ID of a session from a cookie given its name. ',
                'params' => [
                    '$sessionName' => [
                        'type' => 'string',
                        'description' => 'The name of the session.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the ID is found, the method will return it.       If the session cookie was not found, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSessionIDFromRequest',
                'access-modifier' => 'public static function',
                'summary' => 'Return session ID from session cookie, get or post parameter.',
                'description' => 'Return session ID from session cookie, get or post parameter. ',
                'params' => [
                    '$seesionName' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If session ID is found, the method will       return it. Note that if it is in a cookie, the name of the cookie must       be the name of the session in order to take the ID from it. If it is       in GET or POST request, it must be in a parameter with the name       \'session-id\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSessions',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an indexed array that contains all created sessions.',
                'description' => 'Returns an indexed array that contains all created sessions. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains objects of type \'Session\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getStorage',
                'access-modifier' => 'public static function',
                'summary' => 'Returns storage engine which is used to store sessions state.',
                'description' => 'Returns storage engine which is used to store sessions state. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'SessionStorage
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasCookie',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the given session name has a cookie or not.',
                'description' => 'Checks if the given session name has a cookie or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if a cookie with the name of       the session is fount. false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasSession',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if the manager has specific session or not.',
                'description' => 'Checks if the manager has specific session or not. ',
                'params' => [
                    '$sName' => [
                        'type' => 'string',
                        'description' => 'The name of the session.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the manager manages a session which has the given name,       the method will return true. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'newId',
                'access-modifier' => 'public static function',
                'summary' => 'Generate new ID for the active session.',
                'description' => 'Generate new ID for the active session. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If there was an active session and new ID is generated       for it, the method will return the new ID. Other than that, the method       will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'pauseAll',
                'access-modifier' => 'public static function',
                'summary' => 'Stores the status of all sessions and pause them.',
                'description' => 'Stores the status of all sessions and pause them. ',
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
                'access-modifier' => 'public static function',
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
                    'description' => 'If the variable exist and its value is set, the method       will return its value. If the value is not set or no session is      active, the method will return null.',
                    'return-types' => [
                        'mixed',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'remove',
                'access-modifier' => 'public static function',
                'summary' => 'Removes the value of a session variable from the active session.',
                'description' => 'Removes the value of a session variable from the active session. ',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the value was deleted, the method will return true.       If the does not exist or no session is active, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'reset',
                'access-modifier' => 'public static function',
                'summary' => 'Reset sessions manager to defaults.',
                'description' => 'Reset sessions manager to defaults. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'set',
                'access-modifier' => 'public static function',
                'summary' => 'Sets session variable.',
                'description' => 'Sets session variable. Note that session variable will be set only if there was an active session.',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable. Must be non-empty string.',
                        'optional' => false,
                    ],
                    '$value' => [
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
                'name' => 'setStorage',
                'access-modifier' => 'public static function',
                'summary' => 'Sets sessions storage engine.',
                'description' => 'Sets sessions storage engine. This method is used to create a custom sessions storage engine. The       framework by default provide one type which is file storage. The       developer can implement a custom storage engine using the interface       \'SessionStorage\'.',
                'params' => [
                    '$storage' => [
                        'type' => 'SesstionStorage',
                        'description' => 'The new sessions storage.',
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
                'access-modifier' => 'public static function',
                'summary' => 'Starts new session or resumes an existing one.',
                'description' => 'Starts new session or resumes an existing one. The method will first checks if a session which has the given name exist.       if there was such session, it will pause all sessions and resumes selected       one. If no session was found which has the given name, the method will       initialize new session.',
                'params' => [
                    '$sessionName' => [
                        'type' => 'string',
                        'description' => 'The name of the session that will be resumed       or created.',
                        'optional' => false,
                    ],
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An array that contains session options. Available       options are:      <ul>      <li><b>duration</b>: The duration of the session in minutes. Must be a number       greater than or equal to 0. If 0 is given, it means the session is not       persistent.</li>      <li><b>refresh</b>: A boolean which is set to true if session timeout time       will be refreshed with every request. Default is false.</li>      </ul>',
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
                'name' => 'validateStorage',
                'access-modifier' => 'public static function',
                'summary' => 'Validate the current status of the storage.',
                'description' => 'Validate the current status of the storage. This method will go through all sessions which was activated and check the       status of each one. If the session is new, paused or resumed, the method       will store session state using specified storage engine. If the status       of the session is killed, the method will remove session state from       the storage. In addition to that, the method will garbage-collect all       sessions which are not active any more. The garbage collection algorithm       will depends on the way the developer have implemented his own sessions       storage engine.',
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