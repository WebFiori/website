<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ResultSetView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to represent a data set which was fetched from the   database after executing a query like a \'select\' query.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ResultSet');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ResultSet', '\webfiori\database', 'A class which is used to represent a data set which was fetched from the   database after executing a query like a \'select\' query. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    'array $resultArr' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' $mappingFunction ' => [
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
                'name' => 'clearSet',
                'access-modifier' => 'public function',
                'summary' => 'Reset the values in the set to default values.',
                'description' => 'Reset the values in the set to default values. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'count',
                'access-modifier' => 'public function',
                'summary' => 'Return the number of mapped rows in the set.',
                'description' => 'Return the number of mapped rows in the set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If no result returned by MySQL server, the method will return -1. If       the executed query returned 0 rows, the method will return 0. Note that       if the mapping function returned other than an array, the method will       always return 0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'current',
                'access-modifier' => 'public function',
                'summary' => 'Returns the element which exist at current cursor location in the       mapped result.',
                'description' => 'Returns the element which exist at current cursor location in the       mapped result. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Note that if the mapping function did not return an array,       the method will always return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMappedRows',
                'access-modifier' => 'public function',
                'summary' => 'Returns the records which was generated after calling the map       function.',
                'description' => 'Returns the records which was generated after calling the map       function. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The return value of this method will depend on how the       developer implemented the mapping function. By default, the method will      return an array that holds fetched records information.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMappedRowsCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of records which was generated after calling the map       function.',
                'description' => 'Returns the number of records which was generated after calling the map       function. The number of records might be less or more based on how the developer       have implemented the mapping function. Note that if the mapping function       did not return an array, the method will return 1.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of records after mapping.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRows',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array which contains all records in the set.',
                'description' => 'Returns an array which contains all records in the set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array which contains all records in the set.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRowsCount',
                'access-modifier' => 'public function',
                'summary' => 'Return the number of original rows in the set.',
                'description' => 'Return the number of original rows in the set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of original rows in the set before executing the       mapping function.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'key',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'int
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'next',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'rewind',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setMappingFunction',
                'access-modifier' => 'public function',
                'summary' => 'Sets a custom callback which can be used to process result set and       map the records to PHP objects as desired.',
                'description' => 'Sets a custom callback which can be used to process result set and       map the records to PHP objects as desired. ',
                'params' => [
                    '$callback' => [
                        'type' => 'Closure',
                        'description' => 'A PHP function. The function will have one       parameter which is the raw result set as an array.',
                        'optional' => false,
                    ],
                    '$otherParams' => [
                        'type' => 'array',
                        'description' => 'An array that holds extra arguments which can       be passed to the mapping function.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the function is set, the method will return true.       If not, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'valid',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'boolean
',
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