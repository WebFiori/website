<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AbstractQueryView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A base class that can be used to build SQL queries.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class AbstractQuery');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'AbstractQuery', '\webfiori\database', 'A base class that can be used to build SQL queries. '));
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
                'name' => 'addCol',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query that can be used to add a column to a database table.',
                'description' => 'Constructs a query that can be used to add a column to a database table. The developer should implement this method in a way it creates SQL query       that can be used to add a column to a table.',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The name of column key as specified when the column       was added to the table.',
                        'optional' => false,
                    ],
                    '$location' => [
                        'type' => 'string',
                        'description' => 'The location at which the column will be added to.       This usually the name of the column that the new column will be added after.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addForeignKey',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query that can be used to add foreign key constraint.',
                'description' => 'Constructs a query that can be used to add foreign key constraint. ',
                'params' => [
                    '$keyName' => [
                        'type' => 'string',
                        'description' => 'The name of the foreign key as specified when creating       the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addPrimaryKey',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query which can be used to add a primary key constrain to a       table.',
                'description' => 'Constructs a query which can be used to add a primary key constrain to a       table. ',
                'params' => [
                    '$pkName' => [
                        'type' => 'string',
                        'description' => 'The name of the primary key.',
                        'optional' => false,
                    ],
                    '$pkCols' => [
                        'type' => 'array',
                        'description' => 'An array that contains the keys of the columns that the       primary key is composed of.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'andWhere',
                'access-modifier' => 'public function',
                'summary' => 'Build a where condition.',
                'description' => 'Build a where condition. This method can be used to append an \'and\' condition to an already existing       \'where\' condition.',
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
                    'description' => 'Returns the same instance at which the method is       called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'copyQuery',
                'access-modifier' => 'public function',
                'summary' => 'Creates and returns a copy of the builder.',
                'description' => 'Creates and returns a copy of the builder. The information that will be copied includes:      <ul>      <li>Limit.</li>      <li>Offset.</li>      <li>Linked table.</li>      <li>Linked schema.</li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'MySQLQuery
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createTable',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which when executed will create the table in the database.',
                'description' => 'Constructs a query which when executed will create the table in the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'delete',
                'access-modifier' => 'public abstract function',
                'summary' => 'Removes a record from the active table.',
                'description' => 'Removes a record from the active table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
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
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dropCol',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query that can be used to drop a column.',
                'description' => 'Constructs a query that can be used to drop a column. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The name of column key as specified when the column       was added to the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dropForeignKey',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query that can be used to drop foreign key constraint.',
                'description' => 'Constructs a query that can be used to drop foreign key constraint. Note that the syntax will support only SQL Server and Oracle. The developer       may have to override this method to support other databases.',
                'params' => [
                    '$keyName' => [
                        'type' => 'string',
                        'description' => 'The name of the key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dropPrimaryKey',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query which can be used to drop a primary key constrain from a       table.',
                'description' => 'Constructs a query which can be used to drop a primary key constrain from a       table. ',
                'params' => [
                    '$pkName' => [
                        'type' => 'string',
                        'description' => 'The name of the primary key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'execute',
                'access-modifier' => 'public function',
                'summary' => 'Execute the generated SQL query.',
                'description' => 'Execute the generated SQL query. ',
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
                'name' => 'getLastQueryType',
                'access-modifier' => 'public function',
                'summary' => 'Returns the type of last generated SQL query.',
                'description' => 'Returns the type of last generated SQL query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string such as \'select\' or \'update\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLimit',
                'access-modifier' => 'public function',
                'summary' => 'Returns a number that represents the limit.',
                'description' => 'Returns a number that represents the limit. The limit is basically the number of records that will be fetched.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of records will be fetched. Default is -1.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOffset',
                'access-modifier' => 'public function',
                'summary' => 'Returns a number that represents the offset.',
                'description' => 'Returns a number that represents the offset. The offset is basically the number of records that will be skipped       from the start when fetching the result.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of records will be skipped. Default is -1.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getParams',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the values at which the prepared query       will be bind to.',
                'description' => 'Returns an array that contains the values at which the prepared query       will be bind to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the values at which the prepared query       will be bind to.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPrevQuery',
                'access-modifier' => 'public function',
                'summary' => 'Returns the previously lined query builder.',
                'description' => 'Returns the previously lined query builder. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        'null
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getQuery',
                'access-modifier' => 'public function',
                'summary' => 'Returns the generated SQL query.',
                'description' => 'Returns the generated SQL query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Returns the generated query as string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSchema',
                'access-modifier' => 'public function',
                'summary' => 'Returns the schema at which the generator is associated with.',
                'description' => 'Returns the schema at which the generator is associated with. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The schema at which the generator is associated with.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Database', 'Database'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTable',
                'access-modifier' => 'public function',
                'summary' => 'Returns the table which was associated with the query.',
                'description' => 'Returns the table which was associated with the query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The associated table as an object. If no table is       associated, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'groupBy',
                'access-modifier' => 'public function',
                'summary' => 'Adds a set of columns to the \'group by\' part of the query.',
                'description' => 'Adds a set of columns to the \'group by\' part of the query. ',
                'params' => [
                    '$colOrColsArr' => [
                        'type' => 'string|array',
                        'description' => 'This can be one column key or an       array that contains columns keys.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insert',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query which can be used to insert a record in a table.',
                'description' => 'Constructs a query which can be used to insert a record in a table. ',
                'params' => [
                    '$colsAndVals' => [
                        'type' => 'array',
                        'description' => 'An associative array that holds the columns and       values. The indices of the array should be column keys and the values       of the indices are the new values.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isMultiQuery',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the query represents a multi-query.',
                'description' => 'Checks if the query represents a multi-query. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the query is a multi-query.       False if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isPrepareBeforeExec',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the query will be prepared before execution or not.',
                'description' => 'Checks if the query will be prepared before execution or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the query will be prepared       before execution. False if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'join',
                'access-modifier' => 'public function',
                'summary' => 'Perform a join query.',
                'description' => 'Perform a join query. ',
                'params' => [
                    '$query' => [
                        'type' => 'AbstractQuery',
                        'description' => 'The query at which the current query       result will be joined with.',
                        'optional' => false,
                    ],
                    '$joinType' => [
                        'type' => 'string',
                        'description' => 'The type of the join such as \'left join\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'leftJoin',
                'access-modifier' => 'public function',
                'summary' => 'Perform a left join query.',
                'description' => 'Perform a left join query. ',
                'params' => [
                    '$query' => [
                        'type' => 'AbstractQuery',
                        'description' => 'The query at which the current query       result will be joined with.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
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
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'modifyCol',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query that can be used to modify a column.',
                'description' => 'Constructs a query that can be used to modify a column. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The name of column key as specified when the column       was added to the table.',
                        'optional' => false,
                    ],
                    '$location' => [
                        'type' => 'string',
                        'description' => 'The location at which the column will be moved to.       This usually the name of the column that the column will be added after.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
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
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'on',
                'access-modifier' => 'public function',
                'summary' => 'Adds an \'on\' condition to a join query.',
                'description' => 'Adds an \'on\' condition to a join query. ',
                'params' => [
                    '$leftCol' => [
                        'type' => 'string',
                        'description' => 'The name of the column key which exist in the left table.',
                        'optional' => false,
                    ],
                    '$rightCol' => [
                        'type' => 'string',
                        'description' => 'The name of the column key which exist in the right table.',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A condition which is used to join a new \'on\' condition       with existing one.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'orWhere',
                'access-modifier' => 'public function',
                'summary' => 'Build a where condition.',
                'description' => 'Build a where condition. This method can be used to append an \'or\' condition to an already existing       \'where\' condition.',
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
                    'description' => 'Returns the same instance at which the method is       called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'orderBy',
                'access-modifier' => 'public function',
                'summary' => 'Adds a set of columns to the \'order by\' part of the query.',
                'description' => 'Adds a set of columns to the \'order by\' part of the query. ',
                'params' => [
                    '$colsArr' => [
                        'type' => 'array',
                        'description' => 'An array that contains columns keys. To specify       order type, the indices should be columns keys and the values are order       type. Order type can have two values, \'a\' for       ascending or \'d\' for descending.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'AbstractQuery The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        '@return',
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
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'renameCol',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query which can be used to rename a column.',
                'description' => 'Constructs a query which can be used to rename a column. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The name of column key as specified when the column       was added to the table.',
                        'optional' => false,
                    ],
                    '$newName' => [
                        'type' => 'string',
                        'description' => 'The new name of the column.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'reset',
                'access-modifier' => 'public function',
                'summary' => 'Reset query parameters to default values.',
                'description' => 'Reset query parameters to default values. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'rightJoin',
                'access-modifier' => 'public function',
                'summary' => 'Perform a right join query.',
                'description' => 'Perform a right join query. ',
                'params' => [
                    '$query' => [
                        'type' => 'AbstractQuery',
                        'description' => 'The query at which the current query       result will be joined with.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'select',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a select query based on associated table.',
                'description' => 'Constructs a select query based on associated table. ',
                'params' => [
                    '$cols' => [
                        'type' => 'array',
                        'description' => 'An array that contains the keys of the columns that       will be selected. This also can be an array that holds objects of type       \'Expression\'. Also, it can be an associative array of columns keys and       sub arrays. The sub arrays can have options for the columns that will be       selected. Supported options are:      <ul>      <li>\'obj\': An object of type column or an expression.</li>      <li>\'alias\': An optional string which can act as an alias.</li>      <li>\'aggregate\': Aggregate function to use in the column such as       \'avg\' or \'max\'.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'selectAvg',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a select query which can be used to find the average value       of a column.',
                'description' => 'Constructs a select query which can be used to find the average value       of a column. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of column key.',
                        'optional' => false,
                    ],
                    '$alias' => [
                        'type' => 'string',
                        'description' => 'An optional alias for the column that will hold the       value of the average. Default is \'avg\'.',
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
                'name' => 'selectCount',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a select query which can be used to find the number of rows       of a result.',
                'description' => 'Constructs a select query which can be used to find the number of rows       of a result. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'Optional name of column key. Default is null.',
                        'optional' => false,
                    ],
                    '$alias' => [
                        'type' => 'string',
                        'description' => 'An optional alias for the column that will hold the       value. Default is \'count\'.',
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
                'name' => 'selectMax',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a select query which can be used to find the minimum value       of a column.',
                'description' => 'Constructs a select query which can be used to find the minimum value       of a column. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of column key.',
                        'optional' => false,
                    ],
                    '$alias' => [
                        'type' => 'string',
                        'description' => 'An optional alias for the column that will hold the       value. Default is \'max\'.',
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
                'name' => 'selectMin',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a select query which can be used to find the minimum value       of a column.',
                'description' => 'Constructs a select query which can be used to find the minimum value       of a column. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of column key.',
                        'optional' => false,
                    ],
                    '$alias' => [
                        'type' => 'string',
                        'description' => 'An optional alias for the column that will hold the       value. Default is \'min\'.',
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
                'name' => 'setParams',
                'access-modifier' => 'public function',
                'summary' => 'Sets the parameters which will be used in case the query will be prepared.',
                'description' => 'Sets the parameters which will be used in case the query will be prepared. ',
                'params' => [
                    '$parameters' => [
                        'type' => 'array',
                        'description' => 'An array that holds the parameters. The structure of       the array depends on how the developer have implemented the method       Connection::bind().',
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
                'name' => 'setPrepareBeforeExec',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property which is used to tell if the query       will be prepared query or not.',
                'description' => 'Sets the value of the property which is used to tell if the query       will be prepared query or not. This will mostly be used in case of raw SQL queries.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True to make a prepared query before execution. False       to execute the query without preparation.',
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
                'summary' => 'Sets a raw SQL query.',
                'description' => 'Sets a raw SQL query. ',
                'params' => [
                    '$query' => [
                        'type' => 'string',
                        'description' => 'SQL query.',
                        'optional' => false,
                    ],
                    '$multiQuery' => [
                        'type' => 'boolean',
                        'description' => 'A boolean which is set to true if the query       represents multi-query.',
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
                'name' => 'setSchema',
                'access-modifier' => 'public function',
                'summary' => 'Associate query generator with a database schema.',
                'description' => 'Associate query generator with a database schema. ',
                'params' => [
                    '$schema' => [
                        'type' => 'Database',
                        'description' => 'The schema at which the generator will be associated       with.',
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
                'name' => 'setTable',
                'access-modifier' => 'public function',
                'summary' => 'Associate a table with the query builder.',
                'description' => 'Associate a table with the query builder. ',
                'params' => [
                    '$table' => [
                        'type' => 'Table',
                        'description' => 'The table that will be associated.',
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
                'summary' => 'Sets the table at which the generator will generate queries for.',
                'description' => 'Sets the table at which the generator will generate queries for. ',
                'params' => [
                    '$tblName' => [
                        'type' => 'string',
                        'description' => 'The name of the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
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
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'union',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$query' => [
                        'type' => 'AbstractQuery',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$all' => [
                        'type' => 'boolean',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'update',
                'access-modifier' => 'public abstract function',
                'summary' => 'Constructs a query which can be used to update a record.',
                'description' => 'Constructs a query which can be used to update a record. ',
                'params' => [
                    '$newColsVals' => [
                        'type' => 'array',
                        'description' => 'An associative array that holds the columns and       values. The indices of the array should be column keys and the values       of the indices are the new values.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the same instance at which       the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'where',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'where\' condition to an existing select, update or delete query.',
                'description' => 'Adds a \'where\' condition to an existing select, update or delete query. ',
                'params' => [
                    '$col' => [
                        'type' => 'AbstractQuery|string',
                        'description' => 'The key of the column. This also can be an       object of type AbstractQuery. The object is used to build a sub       where condition.',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A string such as \'=\' or \'!=\'.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The value at which column value will be evaluated againest.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereBetween',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where between \' condition.',
                'description' => 'Constructs a \'where between \' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on.',
                        'optional' => false,
                    ],
                    '$firstVal' => [
                        'type' => 'mixed',
                        'description' => 'The left hand side operand of the between condition.',
                        'optional' => false,
                    ],
                    '$secondVal' => [
                        'type' => 'mixed',
                        'description' => 'The right hand side operand of the between condition.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                    '$not' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the \'between\' condition will be set       to \'not between\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereIn',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where in()\' condition.',
                'description' => 'Constructs a \'where in()\' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on.',
                        'optional' => false,
                    ],
                    '$vals' => [
                        'type' => 'array',
                        'description' => 'An array that holds the values that will be checked.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                    '$not' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the \'in\' condition will be set       to \'not in\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereLeft',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'left()\' condition to the \'where\' part of the select.',
                'description' => 'Adds a \'left()\' condition to the \'where\' part of the select. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on. Note that the column type must be a string type such as varchar or the       call to the method will be ignored.',
                        'optional' => false,
                    ],
                    '$charsCount' => [
                        'type' => 'int',
                        'description' => 'The number of characters that will be taken from       the left of the column value.',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A condition at which the comparison will be based on.       can only have 4 values, \'=\', \'!=\', \'in\' and \'not in\'.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string|array',
                        'description' => 'The value at which the condition will be compared with.       This also can be an array of values if the condition is \'in\' or \'not in\'.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereLike',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where like\' condition.',
                'description' => 'Constructs a \'where like\' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on. Note that the column type must be a string type such as varchar or the       call to the method will be ignored.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value at which the \'like\' condition will be       based on.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                    '$not' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the \'like\' condition will be set       to \'not like\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereNotBetween',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where not between \' condition.',
                'description' => 'Constructs a \'where not between \' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on.',
                        'optional' => false,
                    ],
                    '$firstVal' => [
                        'type' => 'mixed',
                        'description' => 'The left hand side operand of the between condition.',
                        'optional' => false,
                    ],
                    '$secVal' => [
                        'type' => 'mixed',
                        'description' => 'The right hand side operand of the between condition.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereNotIn',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where not in()\' condition.',
                'description' => 'Constructs a \'where not in()\' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on.',
                        'optional' => false,
                    ],
                    '$vals' => [
                        'type' => 'array',
                        'description' => 'An array that holds the values that will be checked.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereNotLike',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where like\' condition.',
                'description' => 'Constructs a \'where like\' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on. Note that the column type must be a string type such as varchar or the       call to the method will be ignored.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value at which the \'like\' condition will be       based on.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereNotNull',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where is not null\' condition.',
                'description' => 'Constructs a \'where is not null\' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on.',
                        'optional' => false,
                    ],
                    '$join' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereNull',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a \'where is null\' condition.',
                'description' => 'Constructs a \'where is null\' condition. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on.',
                        'optional' => false,
                    ],
                    '$join' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                    '$not' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the \'is null\' condition will be set       to \'is not null\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'whereRight',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'right()\' condition to the \'where\' part of the select.',
                'description' => 'Adds a \'right()\' condition to the \'where\' part of the select. ',
                'params' => [
                    '$col' => [
                        'type' => 'string',
                        'description' => 'The key of the column that the condition will be based       on. Note that the column type must be a string type such as varchar or the       call to the method will be ignored.',
                        'optional' => false,
                    ],
                    '$charsCount' => [
                        'type' => 'int',
                        'description' => 'The number of characters that will be taken from       the right of the column value.',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A condition at which the comparison will be based on.       can only have 4 values, \'=\', \'!=\', \'in\' and \'not in\'.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string|array',
                        'description' => 'The value at which the condition will be compared with.       This also can be an array of values if the condition is \'in\' or \'not in\'.',
                        'optional' => false,
                    ],
                    '$joinCond' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/AbstractQuery', 'AbstractQuery'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
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