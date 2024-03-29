<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ConnectionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a connection to a database.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class Connection');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'Connection', '\webfiori\database', 'A class that represents a connection to a database. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$connInfo' => [
                        'type' => 'ConnectionInfo',
                        'description' => 'An object that contains database connection       information.',
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
                'name' => 'connect',
                'access-modifier' => 'public abstract function',
                'summary' => 'Connect to RDBMS.',
                'description' => 'Connect to RDBMS. The developer must implement this method in a way it establishes a connection       to a database using native database driver or PDO. Once the connection is       established without errors, the method should return true.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the connection to the database is established, the method       should return true. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getConnectionInfo',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object that contains database connection information.',
                'description' => 'Returns an object that contains database connection information. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object that contains database connection information.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ConnectionInfo', 'ConnectionInfo'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastErrCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns error code at which that was generated by executing last query.',
                'description' => 'Returns error code at which that was generated by executing last query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Last error code at which that was generated by executing last query.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastErrMessage',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last message at which that was generated by executing a query.',
                'description' => 'Returns the last message at which that was generated by executing a query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The last message at which that was generated by executing a query.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastQuery',
                'access-modifier' => 'public function',
                'summary' => 'Returns last executed query object.',
                'description' => 'Returns last executed query object. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Last executed query object. If no query was executed,       the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastResultSet',
                'access-modifier' => 'public function',
                'summary' => 'Returns last result set.',
                'description' => 'Returns last result set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The result set. If the result set is not set, the       method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ResultSet', 'ResultSet'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'prepare',
                'access-modifier' => 'public abstract function',
                'summary' => 'Creates a prepared SQL statement from the query.',
                'description' => 'Creates a prepared SQL statement from the query. The implementation of this method should execute a prepare statement       on the database engine. An example is MySQL. In this case, the developer       must use the method mysqli::prepare(). After the statement is prepared,       then the developer can bind parameters values using the       method mysqli_stmt::bind_param().',
                'params' => [
                    '$queryParams' => [
                        'type' => 'array',
                        'description' => 'An optional array of parameters to bind with the       prepared query. The structure of the array will depend on the type of       database engine that will be used.',
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
                'name' => 'runQuery',
                'access-modifier' => 'public abstract function',
                'summary' => 'Sets the last query and execute it.',
                'description' => 'Sets the last query and execute it. This method should be implemented in a way that it accepts null or an       object of type \'AbstractQuery\'. If an object of type \'AbstractQuery\' is       passed, then the last query will be set to it. After that, the method should       run the query. If null is passed, the method should check for last       query object. If set, it should execute it.',
                'params' => [
                    'AbstractQuery $query ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setErrCode',
                'access-modifier' => 'public function',
                'summary' => 'Sets error code at which that was generated by executing last query.',
                'description' => 'Sets error code at which that was generated by executing last query. ',
                'params' => [
                    '$code' => [
                        'type' => 'int|string',
                        'description' => 'An integer value or any code that represents error code.',
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
                'name' => 'setErrMessage',
                'access-modifier' => 'public function',
                'summary' => 'Sets error message at which that was generated by executing last query.',
                'description' => 'Sets error message at which that was generated by executing last query. ',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'The Error message.',
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
                'name' => 'setLastQuery',
                'access-modifier' => 'public function',
                'summary' => 'Sets the last executed query.',
                'description' => 'Sets the last executed query. ',
                'params' => [
                    '$query' => [
                        'type' => 'AbstractQuery',
                        'description' => 'Last executed query.',
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
                'name' => 'setResultSet',
                'access-modifier' => 'public function',
                'summary' => 'Sets result set.',
                'description' => 'Sets result set. ',
                'params' => [
                    '$result' => [
                        'type' => 'ResultSet',
                        'description' => 'An object that represents result set.',
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