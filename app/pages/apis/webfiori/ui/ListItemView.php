<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ListItemView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents List Item node.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ListItem');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ListItem', '\webfiori\ui', 'A class that represents List Item node. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Constructs new list item',
                'description' => 'Constructs new list item ',
                'params' => [
                    '$listItemBody' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'An optional body for the list item.       It can be a string or an instance of the class HTMLNode. Default is null.',
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
                'name' => 'addList',
                'access-modifier' => 'public function',
                'summary' => 'Adds a sub list to the body of the list item.',
                'description' => 'Adds a sub list to the body of the list item. ',
                'params' => [
                    '$listItems' => [
                        'type' => 'array',
                        'description' => 'An array that holds all list items which       will be in the body of the list. It can contain text items or it can have       objects of type \'ListItem\'.',
                        'optional' => false,
                    ],
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of the sub list. It can be \'ul\' or \'ol\'.       Default is \'ul\'.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array',
                        'description' => 'An optional associative array of attributes which       will be set for the list.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/ListItem', 'ListItem'),
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