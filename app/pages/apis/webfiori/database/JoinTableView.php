<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class JoinTableView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents two joined tables.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class JoinTable');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'JoinTable', '\webfiori\database', 'A class that represents two joined tables. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$left' => [
                        'type' => 'Table',
                        'description' => 'The left table of the join.',
                        'optional' => false,
                    ],
                    '$right' => [
                        'type' => 'Table',
                        'description' => 'The right table of the join.',
                        'optional' => false,
                    ],
                    '$joinType' => [
                        'type' => 'string',
                        'description' => 'A string that represents join type such as \'left\' or       \'right\'.',
                        'optional' => false,
                    ],
                    '$alias' => [
                        'type' => 'string',
                        'description' => 'An optional alias for the table. It is simply will       be set as the name of the table.',
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
                'name' => 'addJoinCondition',
                'access-modifier' => 'public function',
                'summary' => 'Adds a condition which could be used to join the two tables.',
                'description' => 'Adds a condition which could be used to join the two tables. ',
                'params' => [
                    '$cond' => [
                        'type' => 'Condition',
                        'description' => 'The condition.',
                        'optional' => false,
                    ],
                    '$joinOp' => [
                        'type' => 'string',
                        'description' => 'This one is used to chain multiple conditions       with each other. This one can have values such as \'and\' or \'or\'.',
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
                'name' => 'getColByKey',
                'access-modifier' => 'public function',
                'summary' => 'Returns a column given its key name.',
                'description' => 'Returns a column given its key name. The method will first check for such column in the left table. If       not found in the left, the method will check the right table.',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of column key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a column which has the given key exist on the table,       the method will return it as an object. Other than that, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Column', 'Column'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColByName',
                'access-modifier' => 'public function',
                'summary' => 'Returns a column given its actual name.',
                'description' => 'Returns a column given its actual name. The method will first check for such column in the left table. If       not found in the left, the method will check the right table.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of column as it appears in the database.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a column which has the given name exist on the table,       the method will return it as an object. Other than that, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Column', 'Column'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCols',
                'access-modifier' => 'public function',
                'summary' => 'Returns an indexed array that holds all columns of the joined tables.',
                'description' => 'Returns an indexed array that holds all columns of the joined tables. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an array that holds objects of type \'Column\'. The       columns are taken from left ant right table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of columns in the combined table.',
                'description' => 'Returns the number of columns in the combined table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of columns in the combined table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsDatatypes',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains data types of table columns.',
                'description' => 'Returns an array that contains data types of table columns. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains columns data types. Each       index will corresponds to the index of the column in the table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsKeys',
                'access-modifier' => 'public function',
                'summary' => 'Returns an indexed array that contains the names of columns keys.',
                'description' => 'Returns an indexed array that contains the names of columns keys. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains the names of columns keys.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsNames',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all columns names as they will appear in       the database.',
                'description' => 'Returns an array that contains all columns names as they will appear in       the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains all columns names as they will appear in       the database.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJoin',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string which represents the join condition of the two tables.',
                'description' => 'Returns a string which represents the join condition of the two tables. ',
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
                'name' => 'getJoinCondition',
                'access-modifier' => 'public function',
                'summary' => 'Returns the condition at which the two tables joined based on.',
                'description' => 'Returns the condition at which the two tables joined based on. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The condition at which the two tables joined based on.       This also can be a chain of conditions.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Condition', 'Condition'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJoinType',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents join type.',
                'description' => 'Returns a string that represents join type. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string such as \'left\' or \'right\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLeft',
                'access-modifier' => 'public function',
                'summary' => 'Returns the left table of the join.',
                'description' => 'Returns the left table of the join. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'left table of the join.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRight',
                'access-modifier' => 'public function',
                'summary' => 'Returns the right table of the join.',
                'description' => 'Returns the right table of the join. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'right table of the join.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toSQL',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string which represents the joined tables.',
                'description' => 'Returns a string which represents the joined tables. ',
                'params' => [
                    '$firstCall' => [
                        'type' => 'boolean',
                        'description' => 'A boolean to indicate if the join is a nesting of       other joins or not. Default value is false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'SQL statement that represents the join.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
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