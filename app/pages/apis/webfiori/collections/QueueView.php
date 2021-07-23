<?php
namespace docGenerator\webfiori\collections;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class QueueView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a queue data structure.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Queue');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Queue', '\webfiori\collections', 'A class that represents a queue data structure. The queue is implemented in a way that the first element that comes in will   be the first element to come out (FIFO queue).'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&dequeue',
                'access-modifier' => 'public function',
                'summary' => 'Removes the top element from the queue.',
                'description' => 'Removes the top element from the queue. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The element after removal from the queue. If the queue is       empty, the method will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&peek',
                'access-modifier' => 'public function',
                'summary' => 'Returns the element that exist on the top of the queue.',
                'description' => 'Returns the element that exist on the top of the queue. This method will return the first element that was added to the queue.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The element at the top. If the queue is empty, the method       will return null.',
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
                        'description' => 'The maximum number of elements the queue can hold.       if a negative number is given or 0, the queue will have unlimited number       of elements. Also if the given value is not an integer, the maximum will be set       to unlimited. Default is 0.',
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
                'summary' => 'Adds new element to the bottom of the queue.',
                'description' => 'Adds new element to the bottom of the queue. ',
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
                'name' => 'enqueue',
                'access-modifier' => 'public function',
                'summary' => 'Adds new element to the bottom of the queue.',
                'description' => 'Adds new element to the bottom of the queue. ',
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
                'summary' => 'Returns the number of maximum elements the queue can hold.',
                'description' => 'Returns the number of maximum elements the queue can hold. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the maximum number of elements was set to 0 or a       negative number, the method will return -1 which indicates       that the queue can have any number of elements. Other than that,       the method will return the maximum number of elements.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'size',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of elements in the queue.',
                'description' => 'Returns the number of elements in the queue. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of elements in the queue.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toArray',
                'access-modifier' => 'public function',
                'summary' => 'Returns an indexed array that contains the elements of the queue.',
                'description' => 'Returns an indexed array that contains the elements of the queue. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains the elements of the queue.',
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