<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class HTMLTableView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to represent basic HTML tables.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class HTMLTable');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'HTMLTable', '\webfiori\ui', 'A class which is used to represent basic HTML tables. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$rows' => [
                        'type' => 'int',
                        'description' => 'Number of rows in the column. Must be greater than 0.       If less than 0 is given, the value is set to 1.',
                        'optional' => false,
                    ],
                    '$cols' => [
                        'type' => 'int',
                        'description' => 'Number of columns in the table. Must be greater than 0.       If less than 0 is given, the value is set to 1.',
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
                'name' => 'addColumn',
                'access-modifier' => 'public function',
                'summary' => 'Adds a new column to the table.',
                'description' => 'Adds a new column to the table. ',
                'params' => [
                    '$data' => [
                        'type' => 'array',
                        'description' => 'The data that will be added. If the array holds more       elements than the number of rows in the table, the extra rows will be       stripped off. If the array has less items than number of rows, the       method will fill remaining rows with empty cells.',
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
                'name' => 'addRow',
                'access-modifier' => 'public function',
                'summary' => 'Adds a new row to the body of the table.',
                'description' => 'Adds a new row to the body of the table. ',
                'params' => [
                    '$arrOrRowObj' => [
                        'type' => 'TableRow|array',
                        'description' => 'This can be an object that represents       the row or an indexed array that contains row data. Note that of the array       has more elements than the number of columns, the extra columns will be       stripped off. If the array has less elements than number of columns, the       method will add empty cells for remaining places.',
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
                'name' => 'cols',
                'access-modifier' => 'public function',
                'summary' => 'Returns number of columns in the table.',
                'description' => 'Returns number of columns in the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of columns in the table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCell',
                'access-modifier' => 'public function',
                'summary' => 'Returns a table cell given its indices.',
                'description' => 'Returns a table cell given its indices. ',
                'params' => [
                    '$rowIndex' => [
                        'type' => 'int',
                        'description' => 'Row index starting from zero.',
                        'optional' => false,
                    ],
                    '$colIndex' => [
                        'type' => 'int',
                        'description' => 'Column index starting from zero.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a cell at given location exist, it is returned as       an object. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableCell', 'TableCell'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRow',
                'access-modifier' => 'public function',
                'summary' => 'Returns a row given its number.',
                'description' => 'Returns a row given its number. ',
                'params' => [
                    '$rowIndex' => [
                        'type' => 'int',
                        'description' => 'Row number starting from 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the row exist, the method will return it as an       object. If not exist, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableRow', 'TableRow'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the cell given its location.',
                'description' => 'Returns the value of the cell given its location. ',
                'params' => [
                    '$rowIndex' => [
                        'type' => 'int',
                        'description' => 'Row index starting from 0.',
                        'optional' => false,
                    ],
                    '$colIndex' => [
                        'type' => 'int',
                        'description' => 'Column index starting from 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the cell only contains text, the method will       return a string that represent the value. If the cell contains HTML       element, it is returned as an object. If cell does not exist, the method       will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeCol',
                'access-modifier' => 'public function',
                'summary' => 'Removes a column from the table given column index.',
                'description' => 'Removes a column from the table given column index. ',
                'params' => [
                    '$colIndex' => [
                        'type' => 'int',
                        'description' => 'The index of the column.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an array that holds objects that       represents the cells of the column. If no column was removed, the array       will be empty.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeRow',
                'access-modifier' => 'public function',
                'summary' => 'Removes a row given its index.',
                'description' => 'Removes a row given its index. ',
                'params' => [
                    '$rowIndex' => [
                        'type' => 'int',
                        'description' => 'The index of the row.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the row is removed, the method will return       an object that represents the removed row. Other than that, the method       will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/TableRow', 'TableRow'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'rows',
                'access-modifier' => 'public function',
                'summary' => 'Returns number of rows in the table.',
                'description' => 'Returns number of rows in the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of rows in the table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setValue',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of a specific cell in the table.',
                'description' => 'Sets the value of a specific cell in the table. ',
                'params' => [
                    '$rowIndex' => [
                        'type' => 'int',
                        'description' => 'Row index starting from 0.',
                        'optional' => false,
                    ],
                    '$colIndex' => [
                        'type' => 'int',
                        'description' => 'Column index starting from 0.',
                        'optional' => false,
                    ],
                    '$value' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The value to set. Note that this value will       override any existing value in the cell.',
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