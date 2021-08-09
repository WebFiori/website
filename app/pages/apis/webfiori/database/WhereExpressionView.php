<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class WhereExpressionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to build \'where\' expressions.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class WhereExpression');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'WhereExpression', '\webfiori\database', 'A class which is used to build \'where\' expressions. '));
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
                'name' => 'addCondition',
                'access-modifier' => 'public function',
                'summary' => 'Adds a condition to the expression and chain it with existing conditions.',
                'description' => 'Adds a condition to the expression and chain it with existing conditions. ',
                'params' => [
                    '$condition' => [
                        'type' => 'Condition|Expression',
                        'description' => 'The condition as an object',
                        'optional' => false,
                    ],
                    '$joinOp' => [
                        'type' => 'string',
                        'description' => 'A string such as \'and\' or \'or\' which will be used       to chain the condition with the previously added one. If the expression       has children and the chain of conditions is empty, the value will       be set as a join condition between the children and the expression.',
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
                'name' => 'getCondition',
                'access-modifier' => 'public function',
                'summary' => 'Returns the condition at which the statement represents.',
                'description' => 'Returns the condition at which the statement represents. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The condition at which the statement represents. If       the statement has no conditions, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Condition', 'Condition'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJoinCondition',
                'access-modifier' => 'public function',
                'summary' => 'Returns the condition at which the expression will use to combine with children       expressions.',
                'description' => 'Returns the condition at which the expression will use to combine with children       expressions. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string such as \'and\' or \'or\'. Default return value is \'\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getParent',
                'access-modifier' => 'public function',
                'summary' => 'Returns the parent where expression.',
                'description' => 'Returns the parent where expression. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the expression has a parent, the method       will return it as an object of type \'WhereExpression\'. If the expression       has no parent, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/WhereExpression', 'WhereExpression'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the expression.',
                'description' => 'Returns the value of the expression. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string that represents the value       of the expression.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setJoinCondition',
                'access-modifier' => 'public function',
                'summary' => 'Sets the condition at which the expression will use to combine with children       expressions.',
                'description' => 'Sets the condition at which the expression will use to combine with children       expressions. ',
                'params' => [
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A string such as \'and\' or \'or\'.',
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
                'name' => 'setParent',
                'access-modifier' => 'public function',
                'summary' => 'Sets the parent of the expression.',
                'description' => 'Sets the parent of the expression. This one is used to make the expression as a sub where condition.',
                'params' => [
                    '$whereExpr' => [
                        'type' => 'WhereExpression',
                        'description' => 'The parent expression.',
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