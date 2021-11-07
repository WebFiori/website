<?php
namespace docGenerator\webfiori\database\mssql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MSSQLQueryView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to build MSSQL queries.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MSSQLQuery');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MSSQLQuery', '\webfiori\database\mssql', 'A class which is used to build MSSQL queries. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'addCol',
                'access-modifier' => 'public function',
                'summary' => 'Build a query which can be used to add a column to associated table.',
                'description' => 'Build a query which can be used to add a column to associated table. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column taken from the table.',
                        'optional' => false,
                    ],
                    '$location' => [
                        'type' => 'string',
                        'description' => '[NOT USED]',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLQuery', 'MSSQLQuery'),
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
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLQuery', 'MSSQLQuery'),
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
                        'type' => 'string',
                        'description' => 'The name of the primary key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLQuery', 'MSSQLQuery'),
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
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLQuery', 'MSSQLQuery'),
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
                        'description' => '[NOT USED]',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLQuery', 'MSSQLQuery'),
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
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLQuery', 'MSSQLQuery'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'squareBr',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a square brackets around a string.',
                'description' => 'Adds a square brackets around a string. ',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'This can be the name of a column in a table or the name       of a table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return a string surrounded by square       brackets.       If empty string is given, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLQuery', 'MSSQLQuery'),
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