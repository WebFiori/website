<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ConnectionInfoView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An entity that can be used to store database connection information.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ConnectionInfo');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ConnectionInfo', '\webfiori\database', 'An entity that can be used to store database connection information. The information that can be stored includes:  <ul>  <li>Database host address.</li>  <li>Port number.</li>  <li>The username of the user that will be used to access the database.</li>  <li>The password of the user.</li>  <li>The name of the database.</li>  </ul>    In addition to the given ones, the developer can give the connection an   optional name.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'SUPPORTED_DATABASES',
            'An array that contains supported databases.',
            'An array that contains supported databases. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$databaseType' => [
                        'type' => 'string',
                        'description' => 'Name of the database at which the connection       is for.',
                        'optional' => false,
                    ],
                    '$user' => [
                        'type' => 'string',
                        'description' => 'The username of the user that will be used to access       the database.',
                        'optional' => false,
                    ],
                    '$pass' => [
                        'type' => 'string',
                        'description' => 'The password of the user.',
                        'optional' => false,
                    ],
                    '$dbname' => [
                        'type' => 'string',
                        'description' => 'The name of the database.',
                        'optional' => false,
                    ],
                    '$host' => [
                        'type' => 'string',
                        'description' => 'The address of database host. Default value is       \'localhost\'.',
                        'optional' => false,
                    ],
                    '$port' => [
                        'type' => 'int',
                        'description' => 'Port number that will be used to access database server.       Default is 3306.',
                        'optional' => false,
                    ],
                    '$extras' => [
                        'type' => 'array',
                        'description' => 'An array that can have extra information at which the       connection might need.',
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
                'name' => 'getDBName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the database.',
                'description' => 'Returns the name of the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the name of the database.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDatabaseType',
                'access-modifier' => 'public function',
                'summary' => 'Returns the type of the database at which the connection will use.',
                'description' => 'Returns the type of the database at which the connection will use. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Database type such as \'mysql\' or \'maria-db\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getExtars',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains any extra connection information.',
                'description' => 'Returns an array that contains any extra connection information. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains any extra connection information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHost',
                'access-modifier' => 'public function',
                'summary' => 'Returns the address of database host.',
                'description' => 'Returns the address of database host. The host address can be a URL, an IP address or \'localhost\' if       the database is hosted in the same server that the framework is       installed in.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the address of the host. If       it is not set, the method will return \'localhost\' by default.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the connection.',
                'description' => 'Returns the name of the connection. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the connection. Default return value is \'New_Connection\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPassword',
                'access-modifier' => 'public function',
                'summary' => 'Returns the password of the user that will be used to access the database.',
                'description' => 'Returns the password of the user that will be used to access the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the password of the user.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPort',
                'access-modifier' => 'public function',
                'summary' => 'Returns database server port number.',
                'description' => 'Returns database server port number. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Server port number. If it is not set, the method will       return 3306 by default.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUsername',
                'access-modifier' => 'public function',
                'summary' => 'Returns username of the user that will be used to access the database.',
                'description' => 'Returns username of the user that will be used to access the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the username.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDBName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the database.',
                'description' => 'Sets the name of the database. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the database.',
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
                'name' => 'setDatabaseType',
                'access-modifier' => 'public function',
                'summary' => 'Sets the type of the database.',
                'description' => 'Sets the type of the database. The value is used to select the correct query builder for the database.       Supported values are:            <ul>      <li>mysql</li>      </ul>',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'Database type such as \'mysql\' or \'maria-db\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the type is set, the method will return true. Other       than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setExtras',
                'access-modifier' => 'public function',
                'summary' => 'Sets extra connection information as an array.',
                'description' => 'Sets extra connection information as an array. The array should contain any extra information at which the connection       might use.',
                'params' => [
                    '$array' => [
                        'type' => 'array',
                        'description' => 'An array that contains any extra connection information.',
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
                'name' => 'setHost',
                'access-modifier' => 'public function',
                'summary' => 'Sets the address of database host.',
                'description' => 'Sets the address of database host. The host address can be a URL, an IP address or \'localhost\' if       the database is hosted in the same server that the framework is       installed in.',
                'params' => [
                    '$hostAddr' => [
                        'type' => 'string',
                        'description' => 'The address of database host.',
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
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the connection.',
                'description' => 'Sets the name of the connection. ',
                'params' => [
                    '$newName' => [
                        'type' => 'string',
                        'description' => 'The new name. Must be non-empty string.',
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
                'name' => 'setPassword',
                'access-modifier' => 'public function',
                'summary' => 'Sets the password of the user that will be used to access the database.',
                'description' => 'Sets the password of the user that will be used to access the database. ',
                'params' => [
                    '$password' => [
                        'type' => 'string',
                        'description' => 'A string that represents the password of the user.',
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
                'name' => 'setPort',
                'access-modifier' => 'public function',
                'summary' => 'Sets database server port number.',
                'description' => 'Sets database server port number. ',
                'params' => [
                    '$portNum' => [
                        'type' => 'int',
                        'description' => 'Server port number. It will be set only if the       given value is greater than 0.',
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
                'name' => 'setUsername',
                'access-modifier' => 'public function',
                'summary' => 'Sets the username of the user that will be used to access the database.',
                'description' => 'Sets the username of the user that will be used to access the database. ',
                'params' => [
                    '$user' => [
                        'type' => 'string',
                        'description' => 'A string that represents the username.',
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