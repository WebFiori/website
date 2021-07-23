<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class DatabaseView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to represents the structure of the database.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Database');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Database', '\webfiori\database', 'A class which is used to represents the structure of the database. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$connectionInfo' => [
                        'type' => 'ConnectionInfo',
                        'description' => 'An object that holds database       connection information.',
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
                'name' => 'addQuery',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$query' => [
                        'type' => 'type',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$type' => [
                        'type' => 'type',
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
                'name' => 'addTable',
                'access-modifier' => 'public function',
                'summary' => 'Adds a table to the instance.',
                'description' => 'Adds a table to the instance. ',
                'params' => [
                    '$table' => [
                        'type' => 'Table',
                        'description' => 'the table that will be added.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the table is added, the method will return true. False       otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'andWhere',
                'access-modifier' => 'public function',
                'summary' => 'Build a \'where\' expression.',
                'description' => 'Build a \'where\' expression. This method can be used to append an \'and\' condition to an already existing       \'where\' condition.',
                'params' => [
                    '$col' => [
                        'type' => 'AbstractQuery|string',
                        'description' => 'A string that represents the name of the       column that will be evaluated. This also can be an object of type       \'AbstractQuery\' in case the developer would like to build a sub-where       condition.',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A string that represents the condition at which column       value will be evaluated against. Can be ignored if first parameter is of       type \'AbstractQuery\'.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The value (or values) at which the column will be evaluated       against. Can be ignored if first parameter is of       type \'AbstractQuery\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clear',
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
                'name' => 'createTable',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to create selected database table.',
                'description' => 'Constructs a query which can be used to create selected database table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createTables',
                'access-modifier' => 'public function',
                'summary' => 'Create SQL query which can be used to create all database tables.',
                'description' => 'Create SQL query which can be used to create all database tables. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'delete',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to remove a record from the       selected table.',
                'description' => 'Constructs a query which can be used to remove a record from the       selected table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'drop',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which will drop a database table when executed.',
                'description' => 'Constructs a query which will drop a database table when executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'execute',
                'access-modifier' => 'public function',
                'summary' => 'Execute SQL query.',
                'description' => 'Execute SQL query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the last executed query was a select, show or       describe query, the method will return an object of type \'ResultSet\' that       holds fetched records. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ResultSet', 'ResultSet'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getConnection',
                'access-modifier' => 'public function',
                'summary' => 'Returns the connection at which the instance will use to run SQL queries.',
                'description' => 'Returns the connection at which the instance will use to run SQL queries. This method will try to connect to the database if no connection is active.       If the connection was not established, the method will throw an exception.       If the connection is already active, the method will return it.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The connection at which the instance will use to run SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Connection', 'Connection'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getConnectionInfo',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object that holds connection information.',
                'description' => 'Returns an object that holds connection information. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object that holds connection information.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ConnectionInfo', 'ConnectionInfo'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastError',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last database error info.',
                'description' => 'Returns the last database error info. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an associative array with two indices.       The first one is \'message\' which contains error message and the second one       is \'code\' which contains error code.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastQuery',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last generated SQL query.',
                'description' => 'Returns the last generated SQL query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Last generated SQL query as string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastResultSet',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last result set which was generated from executing a query such       as a \'select\' query.',
                'description' => 'Returns the last result set which was generated from executing a query such       as a \'select\' query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The last result set. If no result set is available,       the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ResultSet', 'ResultSet'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the database.',
                'description' => 'Returns the name of the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the database.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getQueries',
                'access-modifier' => 'public function',
                'summary' => 'Returns an indexed array that contains all generated SQL queries.',
                'description' => 'Returns an indexed array that contains all generated SQL queries. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains all generated SQL queries.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getQueryGenerator',
                'access-modifier' => 'public function',
                'summary' => 'Returns the query builder which is used to build SQL queries.',
                'description' => 'Returns the query builder which is used to build SQL queries. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'AbstractQuery
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTable',
                'access-modifier' => 'public function',
                'summary' => 'Returns a table structure as an object given its name.',
                'description' => 'Returns a table structure as an object given its name. ',
                'params' => [
                    '$tblName' => [
                        'type' => 'string',
                        'description' => 'The name of the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'the table.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTables',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all added tables.',
                'description' => 'Returns an array that contains all added tables. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an associative array. The indices       of the array are tables names and the values are objects of type \'Table\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasTable',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a table exist in the database or not.',
                'description' => 'Checks if a table exist in the database or not. ',
                'params' => [
                    '$tableName' => [
                        'type' => 'string',
                        'description' => 'The name of the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the table exist, the method will return true.       False if it does not exist.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insert',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to insert a record in the selected       table.',
                'description' => 'Constructs a query which can be used to insert a record in the selected       table. ',
                'params' => [
                    '$colsAndVals' => [
                        'type' => 'array',
                        'description' => 'An associative array that holds the columns and       values. The indices of the array should be column keys and the values       of the indices are the new values.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'limit',
                'access-modifier' => 'public function',
                'summary' => 'Sets the number of records that will be fetched by the query.',
                'description' => 'Sets the number of records that will be fetched by the query. ',
                'params' => [
                    '$limit' => [
                        'type' => 'int',
                        'description' => 'A number which is greater than 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'offset',
                'access-modifier' => 'public function',
                'summary' => 'Sets the offset.',
                'description' => 'Sets the offset. The offset is basically the number of records that will be skipped from the       start.',
                'params' => [
                    '$offset' => [
                        'type' => 'int',
                        'description' => 'Number of records to skip.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'orWhere',
                'access-modifier' => 'public function',
                'summary' => 'Build a \'where\' expression.',
                'description' => 'Build a \'where\' expression. This method can be used to append an \'or\' condition to an already existing       \'where\' condition.',
                'params' => [
                    '$col' => [
                        'type' => 'AbstractQuery|string',
                        'description' => 'A string that represents the name of the       column that will be evaluated. This also can be an object of type       \'AbstractQuery\' in case the developer would like to build a sub-where       condition.',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A string that represents the condition at which column       value will be evaluated against. Can be ignored if first parameter is of       type \'AbstractQuery\'.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The value (or values) at which the column will be evaluated       against. Can be ignored if first parameter is of       type \'AbstractQuery\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'page',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to fetch a set of records as a page.',
                'description' => 'Constructs a query which can be used to fetch a set of records as a page. ',
                'params' => [
                    '$num' => [
                        'type' => 'int',
                        'description' => 'Page number. It should be a number greater than or equals       to 1.',
                        'optional' => false,
                    ],
                    '$itemsCount' => [
                        'type' => 'int',
                        'description' => 'Number of records per page. Must be a number greater       than or equals to 1.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'select',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query that can be used to get records from a table.',
                'description' => 'Constructs a query that can be used to get records from a table. ',
                'params' => [
                    '$cols' => [
                        'type' => 'array',
                        'description' => 'An array that holds the keys of the columns that will       be selected.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setConnection',
                'access-modifier' => 'public function',
                'summary' => 'Sets the connection that will be used by the schema.',
                'description' => 'Sets the connection that will be used by the schema. ',
                'params' => [
                    '$con' => [
                        'type' => 'Connection',
                        'description' => 'An active connection.',
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
                'name' => 'setConnectionInfo',
                'access-modifier' => 'public function',
                'summary' => 'Sets database connection information.',
                'description' => 'Sets database connection information. ',
                'params' => [
                    '$info' => [
                        'type' => 'ConnectionInfo',
                        'description' => 'An object that holds connection information.',
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
                'name' => 'setQuery',
                'access-modifier' => 'public function',
                'summary' => 'Sets the database query to a raw SQL query.',
                'description' => 'Sets the database query to a raw SQL query. ',
                'params' => [
                    '$query' => [
                        'type' => 'string',
                        'description' => 'A string that represents the query.',
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
                'name' => 'table',
                'access-modifier' => 'public function',
                'summary' => 'Select one of the tables which exist on the schema and use it to build      SQL queries.',
                'description' => 'Select one of the tables which exist on the schema and use it to build      SQL queries. ',
                'params' => [
                    '$tblName' => [
                        'type' => 'string',
                        'description' => 'The name of the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'truncate',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which will truncate a database table when executed.',
                'description' => 'Constructs a query which will truncate a database table when executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'update',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to update a record in the selected       table.',
                'description' => 'Constructs a query which can be used to update a record in the selected       table. ',
                'params' => [
                    '$newColsVals' => [
                        'type' => 'array',
                        'description' => 'An associative array that holds the columns and       values. The indices of the array should be column keys and the values       of the indices are the new values.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'where',
                'access-modifier' => 'public function',
                'summary' => 'Build a where condition.',
                'description' => 'Build a where condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'AbstractQuery|string',
                        'description' => 'A string that represents the name of the       column that will be evaluated. This also can be an object of type       \'AbstractQuery\' in case the developer would like to build a sub-where       condition.',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A string that represents the condition at which column       value will be evaluated against. Can be ignored if first parameter is of       type \'AbstractQuery\'.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The value (or values) at which the column will be evaluated       against. Can be ignored if first parameter is of       type \'AbstractQuery\'.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which can be used to join       multiple where conditions. If not provided, \'and\' will be used by default.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of the class       \'AbstractQuery\' which can be used to build SQL queries.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
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