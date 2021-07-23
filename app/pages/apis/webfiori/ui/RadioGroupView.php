<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class RadioGroupView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which can be used to represent a group of radio buttons inserted   inside a &lt;fieldset&gt; element.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class RadioGroup');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'RadioGroup', '\webfiori\ui', 'A class which can be used to represent a group of radio buttons inserted   inside a &lt;fieldset&gt; element. Each radio button alongside its label are placed in one div element.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$groupName' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute \'name\' of radio buttons.',
                        'optional' => false,
                    ],
                    '$labels' => [
                        'type' => 'array',
                        'description' => 'An optional array that holds the labels for radio       buttons.',
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
                'name' => 'addButton',
                'access-modifier' => 'public function',
                'summary' => 'Adds new radio button to the group.',
                'description' => 'Adds new radio button to the group. ',
                'params' => [
                    '$label' => [
                        'type' => 'string',
                        'description' => 'A label for the radio button.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes for the radio button.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/RadioGroup', 'RadioGroup'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addButtons',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple radio buttons.',
                'description' => 'Adds multiple radio buttons. ',
                'params' => [
                    '$labelsArr' => [
                        'type' => 'array',
                        'description' => 'An array that contains radio buttons labels.',
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
                'name' => 'getGroupName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'name\' of all radio buttons.',
                'description' => 'Returns the value of the attribute \'name\' of all radio buttons. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'the value of the attribute \'name\' of all radio buttons.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRadio',
                'access-modifier' => 'public function',
                'summary' => 'Returns a radio button given its index.',
                'description' => 'Returns a radio button given its index. ',
                'params' => [
                    '$index' => [
                        'type' => 'int',
                        'description' => 'The index of the radio button starting from 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an input element if found. Null       if no such element.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRadioLabel',
                'access-modifier' => 'public function',
                'summary' => 'Returns a radio button label given radio button index.',
                'description' => 'Returns a radio button label given radio button index. ',
                'params' => [
                    '$index' => [
                        'type' => 'int',
                        'description' => 'The index of the radio button starting from 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type \'Label\' if       the radio button exist. Null if not.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Label', 'Label'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setLabel',
                'access-modifier' => 'public function',
                'summary' => 'Sets the label that will appear at the top of the group.',
                'description' => 'Sets the label that will appear at the top of the group. ',
                'params' => [
                    '$lbl' => [
                        'type' => 'string',
                        'description' => 'Label text.',
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