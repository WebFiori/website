<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ExpressionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to represent any SQL expression.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Expression');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Expression', '\webfiori\database', 'A class that can be used to represent any SQL expression. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new expression.',
                'description' => 'Creates new expression. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'a string that represents the value of the expression.',
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
                'summary' => 'Returns the value of the expression.',
                'description' => 'Returns the value of the expression. Similar to calling Expression::getValue()',
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
                'name' => 'equals',
                'access-modifier' => 'public function',
                'summary' => 'Checks if two expressions represent same expression.',
                'description' => 'Checks if two expressions represent same expression. ',
                'params' => [
                    '$exp' => [
                        'type' => 'Expression',
                        'description' => 'The expression that will be checked with.',
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
                'name' => 'setVal',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the expression.',
                'description' => 'Sets the value of the expression. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'A string that represents the value of the expression.',
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