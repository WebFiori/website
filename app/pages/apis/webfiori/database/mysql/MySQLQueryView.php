<?php
namespace docGenerator\webfiori\database\mysql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MySQLQueryView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to build MySQL queries.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MySQLQuery');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MySQLQuery', '\webfiori\database\mysql', 'A class which is used to build MySQL queries. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'addCol',
                'access-modifier' => 'public function',
                'summary' => 'Build a query which can be used to add a column to associated table.',
                'description' => 'Build a query which can be used to add a column to associated table. ',
                'params' => [
                    '$colObjKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column taken from the table.',
                        'optional' => false,
                    ],
                    '$location' => [
                        'type' => 'string',
                        'description' => 'The location at which the column will be added to.       It can be the word \'first\' or the key of the column at which the new column       will be added after.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addPrimaryKey',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query that can be used to add a primary key to the active table.',
                'description' => 'Constructs a query that can be used to add a primary key to the active table. ',
                'params' => [
                    '$pkName' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' array $pkCols' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'backtick',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a backtick character around a string.',
                'description' => 'Adds a backtick character around a string. ',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'This can be the name of a column in a table or the name       of a table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return a string surounded by backticks.       If empty string is given, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'delete',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to remove a record from the associated       table.',
                'description' => 'Constructs a query which can be used to remove a record from the associated       table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dropCol',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to drop a column from associated       table.',
                'description' => 'Constructs a query which can be used to drop a column from associated       table. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The name of column key taken from the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dropForeignKey',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query that can be used to drop foreign key constraint.',
                'description' => 'Constructs a query that can be used to drop foreign key constraint. ',
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
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dropPrimaryKey',
                'access-modifier' => 'public function',
                'summary' => 'Build a query which is used to drop primary key of linked table.',
                'description' => 'Build a query which is used to drop primary key of linked table. ',
                'params' => [
                    '$pkName' => [
                        'type' => 'null',
                        'description' => 'Not used.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
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
                'name' => 'insert',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to add new record.',
                'description' => 'Constructs a query which can be used to add new record. ',
                'params' => [
                    '$colsAndVals' => [
                        'type' => 'array',
                        'description' => 'An associative array. The indices are columns       keys and the value of each index is the value of the column. This also      can be one big indexed array of sub associative arrays. This approach can       be used to build multiple insert queries.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isBlobInsertOrUpdate',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the query represents a blob insert or update.',
                'description' => 'Checks if the query represents a blob insert or update. The aim of this method is to fix an issue with setting the collation       of the connection while executing a query.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the query represents an       insert or an update of blob datatype. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'modifyCol',
                'access-modifier' => 'public function',
                'summary' => 'Build a query which can be used to modify a column in associated table.',
                'description' => 'Build a query which can be used to modify a column in associated table. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column taken from the table.',
                        'optional' => false,
                    ],
                    '$location' => [
                        'type' => 'string',
                        'description' => 'The location at which the column will be moved to (optional).       It can be the word \'first\' or the key of the column at which the column       will be added after.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'renameCol',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a query which can be used to modify the name of       a column.',
                'description' => 'Constructs a query which can be used to modify the name of       a column. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'Column key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLQuery', 'MySQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsBlobInsertOrUpdate',
                'access-modifier' => 'public function',
                'summary' => 'Sets the property that is used to check if the query represents an insert       or an update of a blob datatype.',
                'description' => 'Sets the property that is used to check if the query represents an insert       or an update of a blob datatype. The attribute is used to fix an issue with setting the collation       of the connection while executing a query.',
                'params' => [
                    '$boolean' => [
                        'type' => 'boolean',
                        'description' => 'true if the query represents an insert or an update       of a blob datatype. false if not.',
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
                'name' => 'update',
                'access-modifier' => 'public function',
                'summary' => 'Constructs an update query.',
                'description' => 'Constructs an update query. ',
                'params' => [
                    '$newColsVals' => [
                        'type' => 'array',
                        'description' => 'An associative array. The indices of the array       are columns keys and the values are the new values for the columns.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
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