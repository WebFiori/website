<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class TableRowView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents &lt;tr&gt; node.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class TableRow');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'TableRow', '\webfiori\ui', 'A class that represents &lt;tr&gt; node. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the row.',
                'description' => 'Creates new instance of the row. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addCell',
                'access-modifier' => 'public function',
                'summary' => 'Adds new cell to the row.',
                'description' => 'Adds new cell to the row. ',
                'params' => [
                    '$cellContent' => [
                        'type' => 'string|TableCell|HTMLNode',
                        'description' => 'The text of cell body. It can have HTML.       Also, it can be an object of type \'TableCell\' or an object of type       \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of the cell. This attribute       can have only one of two values, \'td\' or \'th\'. \'td\' If the cell is       in the body of the table and \'th\' if the cell is in the header. If       none of the two is given, \'td\' will be used by default.',
                        'optional' => false,
                    ],
                    '$escEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true and cell text is provided,       the method will replace the       characters \'&lt;\', \'&gt;\' and \'&\' with the following HTML       entities: \'&lt;\', \'&gt;\' and \'&amp;\' in the given text. Default is false.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array',
                        'description' => 'An associative array of attributes which will be       set for the added cell.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method is       called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableRow', 'TableRow'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addChild',
                'access-modifier' => 'public function',
                'summary' => 'Adds new child node to the row.',
                'description' => 'Adds new child node to the row. The node will be added only if its an instance of the class       \'TableCell\'.',
                'params' => [
                    '$node' => [
                        'type' => 'TableCell|string',
                        'description' => 'New table cell. This also can be a string       such as \'td\' or \'th\'.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array|boolean',
                        'description' => 'An optional array of attributes which will be set in       the newly added child. This also can act as last method parameter if it       is given as boolean.',
                        'optional' => false,
                    ],
                    '$chainOnParent' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the method       will return the same instance at which the child node is added to. If       set to false, the method will return the child which have been added.       This can be useful if the developer would like to add a chain of elements       to the body of the node. Default value is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter <code>$useChaining</code> is set to true,       the method will return the \'$this\' instance. If set to false, it will       return the newly added child. If the given parameter is not       an instance of \'TableCell\' or a string that does not represents a       table cell, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableCell', 'TableCell'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableRow', 'TableRow'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCell',
                'access-modifier' => 'public function',
                'summary' => 'Returns a table cell given its index.',
                'description' => 'Returns a table cell given its index. ',
                'params' => [
                    '$index' => [
                        'type' => 'int',
                        'description' => 'Cell index starting from 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the cell does exist, the method will return       an object of type \'TableCell\'. If cell does not exist, the method       will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableCell', 'TableCell'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setData',
                'access-modifier' => 'public function',
                'summary' => 'Adds a data to the row.',
                'description' => 'Adds a data to the row. This method works as follows, if the parent element of the row is of       type \'HTMLTable\', the method will remove all data which is currently       set. After that, it checks the number of columns of the       parent and add elements based on that. If the elements are less, the       remaining cells will be filled with the string \'-\'. If the array       elements are more, the extra ones are stripped. If the parent is not       of type \'HTMLTable\', the data will be added without size check.',
                'params' => [
                    '$data' => [
                        'type' => 'array',
                        'description' => 'An array that holds the data as strings or objects       of type \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$headerData' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will add the       data in a \'th\' cell instead of \'td\' cell. Default is false.',
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