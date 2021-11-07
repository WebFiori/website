<?php
namespace docGenerator\webfiori\framework\session;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SessionOperationsView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which includes all database related operations to add, update,   and delete sessions from a database.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SessionOperations');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SessionOperations', '\webfiori\framework\session', 'A class which includes all database related operations to add, update,   and delete sessions from a database. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'gc',
                'access-modifier' => 'public function',
                'summary' => 'Clears the sessions which are older than the constant \'SESSION_GC\' or       older than 30 days if the constant is not defined.',
                'description' => 'Clears the sessions which are older than the constant \'SESSION_GC\' or       older than 30 days if the constant is not defined. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChunksCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of data chunks a session has.',
                'description' => 'Returns the number of data chunks a session has. ',
                'params' => [
                    '$sId' => [
                        'type' => 'string',
                        'description' => 'The ID of the session.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the session does not exist, the method will return 0.      Other than that, it will return data chunks count.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSession',
                'access-modifier' => 'public function',
                'summary' => 'Returns a record that holds session data given Its ID.',
                'description' => 'Returns a record that holds session data given Its ID. ',
                'params' => [
                    '$sId' => [
                        'type' => 'string',
                        'description' => 'The ID of the session.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'This method will return a string which holds serialized       session info.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSessionsIDs',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds the IDs of sessions which are older than       specific date and time.',
                'description' => 'Returns an array that holds the IDs of sessions which are older than       specific date and time. ',
                'params' => [
                    '$olderThan' => [
                        'type' => 'string',
                        'description' => 'A date-time string in the format \'YYYY-MM-DD HH:MM:SS\'.       This also can only be a date.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An array that holds the IDs of sessions which are older than       given date.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isSessionExist',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a session which has the given ID exist or not in the database.',
                'description' => 'Checks if a session which has the given ID exist or not in the database. ',
                'params' => [
                    '$sId' => [
                        'type' => 'string',
                        'description' => 'The unique identifier of the session.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a session which has the given ID exist, the method will       return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeSession',
                'access-modifier' => 'public function',
                'summary' => 'Removes a session from the database given its ID.',
                'description' => 'Removes a session from the database given its ID. ',
                'params' => [
                    '$sId' => [
                        'type' => 'string',
                        'description' => 'The ID of the session.',
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
                'name' => 'saveSession',
                'access-modifier' => 'public function',
                'summary' => 'Store session state.',
                'description' => 'Store session state. ',
                'params' => [
                    '$sId' => [
                        'type' => 'string',
                        'description' => 'The ID of the session.',
                        'optional' => false,
                    ],
                    '$session' => [
                        'type' => 'string',
                        'description' => 'A string that holds serialized       session info.',
                        'optional' => false,
                    ],
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