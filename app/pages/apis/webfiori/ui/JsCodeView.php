<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class JsCodeView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A node that represents in line JavaScript code that can be inserted on a   head node.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class JsCode');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'JsCode', '\webfiori\ui', 'A node that represents in line JavaScript code that can be inserted on a   head node. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates a new instance of the class.',
                'description' => 'Creates a new instance of the class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addChild',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$node' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' $attrs ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                    ' $useChaining ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addCode',
                'access-modifier' => 'public function',
                'summary' => 'Adds new line of JS code into the body.',
                'description' => 'Adds new line of JS code into the body. ',
                'params' => [
                    '$jsCode' => [
                        'type' => 'string',
                        'description' => 'JavaScript code.',
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
                'name' => 'setAttribute',
                'access-modifier' => 'public function',
                'summary' => 'Sets a value for an attribute.',
                'description' => 'Sets a value for an attribute. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute. If the attribute does not       exist, it will be created. If already exists, its value will be updated.       If the attribute name is \'type\', nothing will happen,       the attribute will never be created.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute. Default is empty string.',
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
                'name' => 'setClassName',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$val' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' $val2 ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$val' => [
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
                'name' => 'setTabIndex',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$val' => [
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
                'name' => 'setText',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$text' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' $esc ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setTitle',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$val' => [
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
                'name' => 'setWritingDir',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$val' => [
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
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;