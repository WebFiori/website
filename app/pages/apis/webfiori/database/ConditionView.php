<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ConditionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a binary conditional statement.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Condition');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Condition', '\webfiori\database', 'A class that represents a binary conditional statement. A binary conditional statement is a statement that has two operands   combined using an operator like the equal.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$leftOperand' => [
                        'type' => 'string|Expression|Condition',
                        'description' => 'The left hand side       operand of the condition.',
                        'optional' => false,
                    ],
                    '' => [
                        'type' => 'string|Expression|Condition',
                        'description' => '$rightOperand The right hand side       operand of the condition.',
                        'optional' => false,
                    ],
                    '$condition' => [
                        'type' => 'string',
                        'description' => 'A string which is used to join the two sides       (such as \'=\', \'!=\', \'and\', \'or\', etc...)',
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
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => 'Creates and returns a string that represents the condition.',
                'description' => 'Creates and returns a string that represents the condition. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string which looks like \'A = B\' where \'A\' is the left       hand side operand and \'B\' is right hand side operand and the \'=\' is the       condition. Note that if left side operand is not null and right operand is       null, the method will return the left operand without a condition and vise versa. If the       two operands are null, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'equals',
                'access-modifier' => 'public function',
                'summary' => 'Checks if two conditions represent same condition.',
                'description' => 'Checks if two conditions represent same condition. Two conditions are equal if they have the same string representation.',
                'params' => [
                    '$cond' => [
                        'type' => 'Condition',
                        'description' => 'The condition that will be checked with.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the two are equals, the method will return true.       False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCondition',
                'access-modifier' => 'public function',
                'summary' => 'Returns the condition which is used to combine the two operands of the condition.',
                'description' => 'Returns the condition which is used to combine the two operands of the condition. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string which is used to join the two sides       (such as \'=\', \'!=\', \'and\', \'or\', etc...)',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLeftOperand',
                'access-modifier' => 'public function',
                'summary' => 'Returns the left hand side operand of the condition.',
                'description' => 'Returns the left hand side operand of the condition. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The left hand side operand of the condition.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/Expression', 'Expression'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/Condition', 'Condition'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRightOperand',
                'access-modifier' => 'public function',
                'summary' => 'Returns the right hand side operand of the condition.',
                'description' => 'Returns the right hand side operand of the condition. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The right hand side operand of the condition.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/Expression', 'Expression'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/Condition', 'Condition'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCondition',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the condition which is used to join left side operand       and right side operand.',
                'description' => 'Sets the value of the condition which is used to join left side operand       and right side operand. ',
                'params' => [
                    '$cond' => [
                        'type' => 'string',
                        'description' => 'A string such as \'=\', \'!=\', \'&&\' or any such value.',
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
                'name' => 'setLeftOperand',
                'access-modifier' => 'public function',
                'summary' => 'Sets the left hand side operand of the condition.',
                'description' => 'Sets the left hand side operand of the condition. ',
                'params' => [
                    '$op' => [
                        'type' => 'string|Expression|Condition',
                        'description' => 'The left hand side operand       of the condition.',
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
                'name' => 'setRightOperand',
                'access-modifier' => 'public function',
                'summary' => 'Sets the right hand side operand of the condition.',
                'description' => 'Sets the right hand side operand of the condition. ',
                'params' => [
                    '$op' => [
                        'type' => 'string|Expression|Condition',
                        'description' => 'The right hand side operand       of the condition.',
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