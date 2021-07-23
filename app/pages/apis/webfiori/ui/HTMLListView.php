<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class HTMLListView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents ordered list or unordered list.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class HTMLList');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'HTMLList', '\webfiori\ui', 'A class that represents ordered list or unordered list. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$listType' => [
                        'type' => 'string',
                        'description' => 'A string that represents list type. It can have       two values, \'ul\' or \'li\'. Default is \'ul\'.',
                        'optional' => false,
                    ],
                    '$arrOfItems' => [
                        'type' => 'array',
                        'description' => 'An array that contains strings       that represents each list item. Also, it can have objects of type       \'ListItem\' or \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is true.',
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
                'name' => 'addChild',
                'access-modifier' => 'public function',
                'summary' => 'Adds new child node.',
                'description' => 'Adds new child node. ',
                'params' => [
                    '$node' => [
                        'type' => 'ListItem|HTMLNode|string',
                        'description' => 'The node that will be added.       It can be an instance of the class \'ListItem\', instance of the       class \'HTMLNode\' or a string that represents the       content of the list item that will be added.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array|boolean',
                        'description' => 'An optional array of attributes which will be set in       the newly added list item.',
                        'optional' => false,
                    ],
                    '$chainOnParent' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the method       will return the same instance at which the child node is added to. If       set to false, the method will return the child which have been added.       This can be useful if the developer would like to add a chain of elements       to the body of the parent or child. Default value is false. It means the       chaining will happen at child level.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter <code>$chainOnParent</code> is set to true,       the method will return the \'$this\' instance. If set to false, it will       return the newly added child.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/ListItem', 'ListItem'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLList', 'HTMLList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addListItem',
                'access-modifier' => 'public function',
                'summary' => 'Adds new item to the list.',
                'description' => 'Adds new item to the list. ',
                'params' => [
                    '$listItemBody' => [
                        'type' => 'string|ListItem|HTMLNode',
                        'description' => 'The text that will be displayed by the       list item. Also, it can be an object of type \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true and the body of the list is a text,       the method will replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Applicable only if the first parameter is a text.       Default is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLList', 'HTMLList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addListItems',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple items at once to the list.',
                'description' => 'Adds multiple items at once to the list. ',
                'params' => [
                    '$arrOfItems' => [
                        'type' => 'array',
                        'description' => 'An array that contains strings       that represents each list item. Also, it can have objects of type       \'ListItem\' or \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true and a text is given for the list       item, the method will replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLList', 'HTMLList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addSubList',
                'access-modifier' => 'public function',
                'summary' => 'Adds a sublist to the main list.',
                'description' => 'Adds a sublist to the main list. ',
                'params' => [
                    '$ul' => [
                        'type' => 'HTMLList',
                        'description' => 'An object of type \'HTMLList\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLList', 'HTMLList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChild',
                'access-modifier' => 'public function',
                'summary' => 'Returns a child node given its index.',
                'description' => 'Returns a child node given its index. ',
                'params' => [
                    '$index' => [
                        'type' => 'int',
                        'description' => 'The position of the child node. This must be an integer       value starting from 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the child does exist, the method will return an       object of type \'ListItem\'. If no element was found, the method will       return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/ListItem', 'ListItem'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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