<?php
namespace docGenerator\webfiori\collections;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class NodeView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A singly linked node that can be used to construct different data structures.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Node');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Node', '\webfiori\collections', 'A singly linked node that can be used to construct different data structures. It is somehow the core class of this library.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&data',
                'access-modifier' => 'public function',
                'summary' => 'Returns the data that is stored in the node.',
                'description' => 'Returns the data that is stored in the node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The data that is stored in the node.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&next',
                'access-modifier' => 'public function',
                'summary' => 'Returns a reference to the next linked node.',
                'description' => 'Returns a reference to the next linked node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If no linked node is set, null is returned. Else,       an instance of Node is returned.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/collections/Node', 'Node'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a new node with specific data and next node.',
                'description' => 'Constructs a new node with specific data and next node. Note that the method will only accept references.',
                'params' => [
                    '$data' => [
                        'type' => 'mixed',
                        'description' => 'The data that the node will hold.',
                        'optional' => false,
                    ],
                    '$next' => [
                        'type' => 'Node',
                        'description' => 'The next node. If null is given or the given       value is not an instance of Node, the next node will be set to       null.',
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
                'name' => 'setData',
                'access-modifier' => 'public function',
                'summary' => 'Sets the data that the node will hold.',
                'description' => 'Sets the data that the node will hold. Note that the method will only accept a reference to the data.',
                'params' => [
                    '$data' => [
                        'type' => 'mixed',
                        'description' => 'A reference to the data that the node will hold.',
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
                'name' => 'setNext',
                'access-modifier' => 'public function',
                'summary' => 'Sets the reference to the next linked node.',
                'description' => 'Sets the reference to the next linked node. Note that the method can only accept a reference to the next node.',
                'params' => [
                    '$next' => [
                        'type' => 'Node',
                        'description' => 'The next node. If null is given, the next node       will be set to null. If the given value is not an instance of Node,       it will be not set.',
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