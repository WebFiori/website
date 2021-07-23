<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SelectExpressionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to build the select expression of a select query.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SelectExpression');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SelectExpression', '\webfiori\database', 'A class which is used to build the select expression of a select query. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a new instance of the class.',
                'description' => 'Constructs a new instance of the class. ',
                'params' => [
                    '$table' => [
                        'type' => 'Table',
                        'description' => 'The table at which the select expression will be       based on.',
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
                'name' => 'addColumn',
                'access-modifier' => 'public function',
                'summary' => 'Adds new column to the set of columns in the select.',
                'description' => 'Adds new column to the set of columns in the select. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column as specified when the column       was added to associated table.',
                        'optional' => false,
                    ],
                    '$options' => [
                        'type' => 'string|null',
                        'description' => 'An optional alias for the column.',
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
                'name' => 'addExpression',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    'Expression $expr' => [
                        'type' => 'unkown_type',
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
                'name' => 'addLeft',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'left()\' condition to the \'where\' part of the select.',
                'description' => 'Adds a \'left()\' condition to the \'where\' part of the select. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that the condition will be       based on as it appears in the database.',
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
                    '$join' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
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
                'name' => 'addLike',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'like\' condition to the \'where\' part of the select.',
                'description' => 'Adds a \'like\' condition to the \'where\' part of the select. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that the condition will be       based on as it appears in the database.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value of the \'like\' condition.',
                        'optional' => false,
                    ],
                    '$join' => [
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
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addRight',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'right()\' condition to the \'where\' part of the select.',
                'description' => 'Adds a \'right()\' condition to the \'where\' part of the select. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that the condition will be       based on as it appears in the database.',
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
                    '$join' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
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
                'name' => 'addWhere',
                'access-modifier' => 'public function',
                'summary' => 'Adds a condition to the \'where\' part of the select.',
                'description' => 'Adds a condition to the \'where\' part of the select. ',
                'params' => [
                    '$leftOpOrExp' => [
                        'type' => 'type',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$rightOp' => [
                        'type' => 'type',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$cond' => [
                        'type' => 'type',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$join' => [
                        'type' => 'string',
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
                'name' => 'addWhereBetween',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'where between \' condition.',
                'description' => 'Adds a \'where between \' condition. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that the condition will be       based on as it appears in the database.',
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
                    '$join' => [
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
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addWhereCondition',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$cond' => [
                        'type' => 'Condition',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$join' => [
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
                'name' => 'addWhereIn',
                'access-modifier' => 'public function',
                'summary' => 'Adds a \'where in()\' condition.',
                'description' => 'Adds a \'where in()\' condition. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that the condition will be       based on as it appears in the database.',
                        'optional' => false,
                    ],
                    '$vals' => [
                        'type' => 'array',
                        'description' => 'An array that holds the values that will be checked.',
                        'optional' => false,
                    ],
                    '$join' => [
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
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addWhereNull',
                'access-modifier' => 'public function',
                'summary' => 'Adds \'where is null\' condition.',
                'description' => 'Adds \'where is null\' condition. ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that the condition will be       based on as it appears in the database.',
                        'optional' => false,
                    ],
                    '$join' => [
                        'type' => 'string',
                        'description' => 'An optional string which could be used to join       more than one condition (\'and\' or \'or\'). If not given, \'and\' is used as       default value.',
                        'optional' => false,
                    ],
                    '$not' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the \'in\' condition will be set       to \'is not null\'.',
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
                'name' => 'clear',
                'access-modifier' => 'public function',
                'summary' => 'Removes all columns and expressions in the select.',
                'description' => 'Removes all columns and expressions in the select. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'colsCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns number of columns and expressions in the select.',
                'description' => 'Returns number of columns and expressions in the select. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of columns and expressions in the select.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsKeys',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all columns keys which are in the select.',
                'description' => 'Returns an array that contains all columns keys which are in the select. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains all columns keys which are in the select.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsStr',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that contains the columns at which that will be select.',
                'description' => 'Returns a string that contains the columns at which that will be select. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the table has no columns to select, the method will       return the value \'\'. Other than that, the method will return a string that       contains columns names.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getGroupBy',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the group by part of the select.',
                'description' => 'Returns a string that represents the group by part of the select. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the group by part of the select. If       no columns exist in the group by part, the method will return empty       string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOrderBy',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the order by part of the select.',
                'description' => 'Returns a string that represents the order by part of the select. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the order by part of the select. If       no columns exist in the order by part, the method will return empty       string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSelectCols',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array of the columns that holds all select expression       columns.',
                'description' => 'Returns an associative array of the columns that holds all select expression       columns. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array of the columns that holds all select expression       columns. The indices will be columns keys and the values are objects of       type \'Column\' or \'Expression\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTable',
                'access-modifier' => 'public function',
                'summary' => 'Returns the table which is associated with the select expression.',
                'description' => 'Returns the table which is associated with the select expression. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The table which is associated with the select expression.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the select expression.',
                'description' => 'Returns the value of the select expression. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of select expression.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWhereExpr',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/WhereExpression', 'WhereExpression'),
                        'null
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWhereStr',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the \'where\' part of the select in addition       to the \'order by\' and \'group by\'.',
                'description' => 'Returns a string that represents the \'where\' part of the select in addition       to the \'order by\' and \'group by\'. ',
                'params' => [
                    '$withOrderBy' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the \'order by\' part of the       \'where\' will be included. Default is \'true\'.',
                        'optional' => false,
                    ],
                    '$withGroupBy' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the \'order by\' part of the       \'where\' will be included. Default is \'true\'.',
                        'optional' => false,
                    ],
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
                'name' => 'groupBy',
                'access-modifier' => 'public function',
                'summary' => 'Adds a column to the set of columns at which the table records will       be grouped by.',
                'description' => 'Adds a column to the set of columns at which the table records will       be grouped by. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column as specified when adding the       column to the table.',
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
                'name' => 'hasCol',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a column exist in the select expression or not.',
                'description' => 'Checks if a column exist in the select expression or not. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column. For expressions, this can be       sha256 hash of expression value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the column exist in the select, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'orderBy',
                'access-modifier' => 'public function',
                'summary' => 'Adds a column to the set of columns at which the table records will       be ordered by.',
                'description' => 'Adds a column to the set of columns at which the table records will       be ordered by. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column as specified when adding the       column to the table.',
                        'optional' => false,
                    ],
                    '$orderType' => [
                        'type' => 'string',
                        'description' => 'Order type of the column. Can be \'a\' for       ascending or \'d\' for descending.',
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
                'name' => 'removeCol',
                'access-modifier' => 'public function',
                'summary' => 'Removes a column from the set of columns that will be selected.',
                'description' => 'Removes a column from the set of columns that will be selected. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The key of the column.',
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
                'name' => 'select',
                'access-modifier' => 'public function',
                'summary' => 'Adds a set of columns or expressions to the select.',
                'description' => 'Adds a set of columns or expressions to the select. ',
                'params' => [
                    '$colsOrExprs' => [
                        'type' => 'array',
                        'description' => 'An array that contains columns and expressions.       The array can be associative. If so, the indices must be columns names       and the values must me sub arrays that holds column options. Each sub       array can have the following indices:       <ul>      <li>\'obj\': An object of type column or an expression.</li>      <li>\'alias\': An optional string which can act as an alias.</li>      <li>\'aggregate\': Aggregate function to use in the column such as       \'avg\' or \'max\'.</li>      </ul>',
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