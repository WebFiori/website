<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class TableCellView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a cell in HTML table.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class TableCell');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'TableCell', '\webfiori\ui', 'A class that represents a cell in HTML table. The cell can be of type &lt;th&gt; or &lt;td&gt;.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$cellType' => [
                        'type' => 'string',
                        'description' => 'The type of the cell. This attribute       can have only one of two values, \'td\' or \'th\'. \'td\' If the cell is       in the body of the table and \'th\' if the cell is in the header. If       none of the two is given, \'td\' will be used by default.',
                        'optional' => false,
                    ],
                    '$cellBody' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'An optional item that can be added to       the body of the cell.',
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
                'name' => 'getColSpan',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'colspan\'.',
                'description' => 'Returns the value of the attribute \'colspan\'. This attribute indicates for how many columns the cell extends. If this attribute       is not set, the default value for it will be 1.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of columns that the cell will span.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRowSpan',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'rowspan\'.',
                'description' => 'Returns the value of the attribute \'rowspan\'. This attribute indicates for how many rows the cell extends. If this attribute       is not set, the default value for it will be 1.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of rows that the cell will span.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setColSpan',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'colspan\'.',
                'description' => 'Sets the value of the attribute \'colspan\'. This attribute indicates for how many columns the cell extends. This       attribute can have any value from 1 up to 1000. If the given value is       not in the range, the attribute will not set.',
                'params' => [
                    '$colSpan' => [
                        'type' => 'int',
                        'description' => 'The number of columns that the cell will span.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableCell', 'TableCell'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setRowSpan',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'rowspan\'.',
                'description' => 'Sets the value of the attribute \'rowspan\'. This attribute indicates for how many rows the cell extends. This       attribute can have any value from 0 up to 65534. If the given value is       not in the range, the attribute will not set. If 0 is given, this means       the cell will span till the end of table section.',
                'params' => [
                    '$rowSpan' => [
                        'type' => 'int',
                        'description' => 'The number of rows that the cell will span.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableCell', 'TableCell'),
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