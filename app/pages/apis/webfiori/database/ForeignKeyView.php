<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ForeignKeyView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a foreign key.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ForeignKey');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ForeignKey', '\webfiori\database', 'A class that represents a foreign key. A foreign key must have an owner table and a source table. The   source table will contain original values and the owner is simply the table   that ownes the key.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'CONDITIONS',
            'An array of allowed conditions for \'on delete\' and \'on update\'.',
            'An array of allowed conditions for \'on delete\' and \'on update\'. The array have the following strings:      <ul>      <li>set null</li>      <li>restrict</li>      <li>set default</li>      <li>no action</li>      <li>cascade</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new foreign key.',
                'description' => 'Creates new foreign key. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the key. It must be a string and its not empty.       Also it must not contain any spaces or any characters other than A-Z, a-z and       underscore. The default value is \'key_name\'.',
                        'optional' => false,
                    ],
                    '$ownerTable' => [
                        'type' => 'Table',
                        'description' => 'The table that will contain the key.',
                        'optional' => false,
                    ],
                    '$sourceTable' => [
                        'type' => 'Table',
                        'description' => 'The name of the table that contains the       original values.',
                        'optional' => false,
                    ],
                    '$cols' => [
                        'type' => 'array|string',
                        'description' => 'An associative array that contains the names of key       columns. The indices must be columns in the owner table and the values are       columns in the source columns.',
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
                'name' => 'addReference',
                'access-modifier' => 'public function',
                'summary' => 'Add a column reference to the foreign key.',
                'description' => 'Add a column reference to the foreign key. Note that before using this method, the owner table and the source       table must be set. In addition, the two columns must have same data type.',
                'params' => [
                    '$ownerColName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that belongs to the owner.       This one will take the value from source column.',
                        'optional' => false,
                    ],
                    '$sourceColName' => [
                        'type' => 'string',
                        'description' => 'The name of the column that belongs to the       source. The value of the owner column will be taken from this column. If       not provided, it will assume that the name of the source column is       the same as the owner column.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the reference is created, the method will return true.       Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getKeyName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the key.',
                'description' => 'Returns the name of the key. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the key.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOnDelete',
                'access-modifier' => 'public function',
                'summary' => 'Returns the condition that will happen if the value of the column in the       reference table is deleted.',
                'description' => 'Returns the condition that will happen if the value of the column in the       reference table is deleted. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The on delete condition as string or null in       case it is not set.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOnUpdate',
                'access-modifier' => 'public function',
                'summary' => 'Returns the condition that will happen if the value of the column in the       reference table is updated.',
                'description' => 'Returns the condition that will happen if the value of the column in the       reference table is updated. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The on update condition as string or null in       case it is not set.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOwner',
                'access-modifier' => 'public function',
                'summary' => 'Returns the table who owns the key.',
                'description' => 'Returns the table who owns the key. The table that owns the key is simply the table that will take values       from source table.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the key owner is set, the method will return       an object of type \'Table\'. that represent it. If not set,       the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOwnerCols',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array which contains the columns that belongs to       the table that will contain the key.',
                'description' => 'Returns an associative array which contains the columns that belongs to       the table that will contain the key. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The indices will represent columns       names and the values are objects of type \'Column\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSource',
                'access-modifier' => 'public function',
                'summary' => 'Returns the source table.',
                'description' => 'Returns the source table. The source table is simply the table that will contain       original values.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the source is set, the method will return       an object of type \'Table\'. that represent it. If not set,       the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSourceCols',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array which contains the columns that will be       referenced.',
                'description' => 'Returns an associative array which contains the columns that will be       referenced. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The indices will represent columns       names and the values are objects of type \'Column\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSourceName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the table that is referenced by the key.',
                'description' => 'Returns the name of the table that is referenced by the key. The referenced table is simply the table that contains original values.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the table that is referenced by the key. If       it is not set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeReference',
                'access-modifier' => 'public function',
                'summary' => 'Removes a column from the key given owner column name.',
                'description' => 'Removes a column from the key given owner column name. ',
                'params' => [
                    '$ownerColName' => [
                        'type' => 'string',
                        'description' => 'The name of the owner column name.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a column which has the given name was found and removed,       the method will return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setKeyName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the key.',
                'description' => 'Sets the name of the key. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the key. A valid key name must follow the       following rules:      <ul>      <li>Must be non-empty string.</li>      <li>First character must not be a number.</li>      <li>Can only contain the following characters: [A-Z], [a-z], [0-9] and       underscore.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true if the name of the key is set. The method will       return the constant ForeignKey::INV_KEY_NAME in       case if the given key name is invalid.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setOnDelete',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property $onUpdateCondition.',
                'description' => 'Sets the value of the property $onUpdateCondition. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'A value from the array ForeignKey::CONDITIONS.       If the given value is null, the condition will be set to null.',
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
                'name' => 'setOnUpdate',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property $onUpdateCondition.',
                'description' => 'Sets the value of the property $onUpdateCondition. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'A value from the array ForeignKey::CONDITIONS.       If the given value is null, the condition will be set to null.',
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
                'name' => 'setOwner',
                'access-modifier' => 'public function',
                'summary' => 'Sets the table who owns the key.',
                'description' => 'Sets the table who owns the key. The table that owns the key is simply the table that will take values       from source table.',
                'params' => [
                    '$table' => [
                        'type' => 'Table',
                        'description' => 'An object of type \'Table\'.',
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
                'name' => 'setSource',
                'access-modifier' => 'public function',
                'summary' => 'Sets the source table that will be referenced.',
                'description' => 'Sets the source table that will be referenced. The source table is simply the table that will contain       original values.',
                'params' => [
                    '$table' => [
                        'type' => 'Table',
                        'description' => 'An object of type \'Table\'.',
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