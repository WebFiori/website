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
                'name' => 'getJoin',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string which represents the join condition of the two tables.',
                'description' => 'Returns a string which represents the join condition of the two tables. The format of the string will be similar to the following:       "`left_table` join_type `right_table` [on(join_cond)]".      The join condition will be included only if specified.',
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
                'name' => 'getName',
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
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;