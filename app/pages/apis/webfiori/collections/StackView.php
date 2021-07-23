<?php
namespace docGenerator\webfiori\collections;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class StackView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a stack data structure.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Stack');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Stack', '\webfiori\collections', 'A class that represents a stack data structure. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&peek',
                'access-modifier' => 'public function',
                'summary' => 'Returns the element that exist on the top of the stack.',
                'description' => 'Returns the element that exist on the top of the stack. This method will return the last element that was added to the stack.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The element at the top. If the stack is empty, the method       will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&pop',
                'access-modifier' => 'public function',
                'summary' => 'Removes an element from the top of the stack.',
                'description' => 'Removes an element from the top of the stack. The method will remove the last element that was added to the stack.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The element after removal from the stack. If the stack is       empty, the method will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a new instance of the class.',
                'description' => 'Constructs a new instance of the class. ',
                'params' => [
                    '$max' => [
                        'type' => 'int',
                        'description' => 'The maximum number of elements the stack can hold.       if a negative number is given or 0, the stack will have unlimited number       of elements. Also if the given value is not an integer, the maximum will be set       to unlimited. Default is 0.',
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
                'name' => 'add',
                'access-modifier' => 'public function',
                'summary' => 'Adds new element to the top of the stack.',
                'description' => 'Adds new element to the top of the stack. ',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be added. If it is null, the       method will not add it.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the element is added.       The method will return false only in two cases, If the maximum       number of elements is reached and trying to add new one or the given element       is null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'max',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of maximum elements the stack can hold.',
                'description' => 'Returns the number of maximum elements the stack can hold. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the maximum number of elements was set to 0 or a       negative number, the method will return -1 which indicates that       the stack can have infinite number of elements. Other than that,       the method will return the maximum number of elements.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'push',
                'access-modifier' => 'public function',
                'summary' => 'Adds new element to the top of the stack.',
                'description' => 'Adds new element to the top of the stack. ',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be added. If it is null, the       method will not add it.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the element is added.       The method will return false only in two cases, If the maximum       number of elements is reached and trying to add new one or the given element       is null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'size',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of elements in the stack.',
                'description' => 'Returns the number of elements in the stack. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of elements in the stack.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toArray',
                'access-modifier' => 'public function',
                'summary' => 'Returns an indexed array that contains the elements of the stack.',
                'description' => 'Returns an indexed array that contains the elements of the stack. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains the elements of the stack.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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