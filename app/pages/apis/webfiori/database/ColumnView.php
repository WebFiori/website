<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ColumnView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which represents a column in a database table.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class Column');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'Column', '\webfiori\database', 'A class which represents a column in a database table. The developer must extend this class to implement different columns for   different relational databases.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the column as it appears in the database.',
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
                'name' => 'asString',
                'access-modifier' => 'public abstract function',
                'summary' => 'Returns a string that represents the column.',
                'description' => 'Returns a string that represents the column. The developer should implement this method in a way that it returns a       string that can be used to add the column to a new table or to alter       a column in an existing table.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the column.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'cleanValue',
                'access-modifier' => 'public abstract function',
                'summary' => 'Filters and cleans column value before using it in a query.',
                'description' => 'Filters and cleans column value before using it in a query. ',
                'params' => [
                    '$val' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The value after cleanup.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAlias',
                'access-modifier' => 'public function',
                'summary' => 'Returns column alias.',
                'description' => 'Returns column alias. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Name alias.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getComment',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents a comment which was added with the column.',
                'description' => 'Returns a string that represents a comment which was added with the column. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Comment text. If it is not set, the method will return       null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCustomCleaner',
                'access-modifier' => 'public function',
                'summary' => 'Returns the function which is used to filter the value of the column.',
                'description' => 'Returns the function which is used to filter the value of the column. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The function which is used to filter the value of the column.',
                    'return-types' => [
                        'Closure',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDatatype',
                'access-modifier' => 'public function',
                'summary' => 'Returns the type of column data (such as \'varchar\').',
                'description' => 'Returns the type of column data (such as \'varchar\'). ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The type of column data. Default return value is \'char\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDefault',
                'access-modifier' => 'public function',
                'summary' => 'Returns the default value of the column.',
                'description' => 'Returns the default value of the column. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The default value of the column.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getIndex',
                'access-modifier' => 'public function',
                'summary' => 'Returns the index of the column in its parent table.',
                'description' => 'Returns the index of the column in its parent table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The index of the column in its parent table starting from 0.       If the column has no parent table, the method will return -1.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the column.',
                'description' => 'Returns the name of the column. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the column.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOldName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the old name of the column.',
                'description' => 'Returns the old name of the column. Note that the old name will be set only if the method       Column::setName() is called more than once in the same instance.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string that represents the       old name if it is set. Null if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOwner',
                'access-modifier' => 'public function',
                'summary' => 'Returns the table who owns the column.',
                'description' => 'Returns the table who owns the column. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the owner is set, the method will return an       object of type \'Table\' that represent it. Other than that, the method       will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPHPType',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the datatype as one of PHP datatypes.',
                'description' => 'Returns a string that represents the datatype as one of PHP datatypes. The main aim of this method is to produce correct type hinting when mapping       the column to an entity class. For example, the \'varchar\' in MySQL is       a \'string\' in PHP.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents column datatype in PHP.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPrevOwner',
                'access-modifier' => 'public function',
                'summary' => 'Returns the previous table which was owns the column.',
                'description' => 'Returns the previous table which was owns the column. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the owner of the table was set then updated, the       method will return the old owner value.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getScale',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of scale.',
                'description' => 'Returns the value of scale. Scale is simply the number of digits that will appear to the right of       decimal point. Only applicable if the datatype of the column is decimal,       float or double.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of numbers after the decimal point.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSize',
                'access-modifier' => 'public function',
                'summary' => 'Returns the size of the column.',
                'description' => 'Returns the size of the column. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The size of the column.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSupportedTypes',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains supported datatypes.',
                'description' => 'Returns an array that contains supported datatypes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains supported datatypes.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isNameWithTablePrefix',
                'access-modifier' => 'public function',
                'summary' => 'Checks if table name will be prefixed with database name or not.',
                'description' => 'Checks if table name will be prefixed with database name or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'True if it will be prefixed. False if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isNull',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the column allows null values.',
                'description' => 'Checks if the column allows null values. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the column allows null values. Default return       value is false which means that the column does not allow null values.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isPrimary',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the column is part of the primary key or not.',
                'description' => 'Checks if the column is part of the primary key or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the column is primary.       Default return value is false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isUnique',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property $isUnique.',
                'description' => 'Returns the value of the property $isUnique. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the column value is unique.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAlias',
                'access-modifier' => 'public function',
                'summary' => 'Sets an alias for the column.',
                'description' => 'Sets an alias for the column. ',
                'params' => [
                    '$alias' => [
                        'type' => 'string',
                        'description' => 'Column alias.',
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
                'name' => 'setComment',
                'access-modifier' => 'public function',
                'summary' => 'Sets a comment which will appear with the column.',
                'description' => 'Sets a comment which will appear with the column. ',
                'params' => [
                    '$comment' => [
                        'type' => 'string|null',
                        'description' => 'Comment text. It must be non-empty string       in order to set. If null is passed, the comment will be removed.',
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
                'name' => 'setCustomFilter',
                'access-modifier' => 'public function',
                'summary' => 'Sets a custom filtering function to cleanup values before being used in       database queries.',
                'description' => 'Sets a custom filtering function to cleanup values before being used in       database queries. The function signature should be as follows : <code>function ($orgVal, $cleanedVa)</code>      where the first value is the original value and the second one is the value with       basic filtering applied to.',
                'params' => [
                    '$callback' => [
                        'type' => 'Closure',
                        'description' => 'The callback.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If it was updated, the method will return true. Other than that,       the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDatatype',
                'access-modifier' => 'public function',
                'summary' => 'Sets the type of column data.',
                'description' => 'Sets the type of column data. ',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of column data.',
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
                'name' => 'setDefault',
                'access-modifier' => 'public function',
                'summary' => 'Sets the default value for the column to use in case of insert.',
                'description' => 'Sets the default value for the column to use in case of insert. ',
                'params' => [
                    '$defaultVal' => [
                        'type' => 'mixed',
                        'description' => 'The default value.',
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
                'name' => 'setIsNull',
                'access-modifier' => 'public function',
                'summary' => 'Updates the value of the property $isNull.',
                'description' => 'Updates the value of the property $isNull. This property can be set to true if the column allow the insertion of       null values. Note that for primary key column, the method will have no       effect.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'true if the column allow null values. false       if not.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true If the property value is updated. If the given       value is not a boolean, the method will return false. Also if       the column represents a primary key, the method will always return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsPrimary',
                'access-modifier' => 'public function',
                'summary' => 'Updates the value of the property <b>$isPrimary</b>.',
                'description' => 'Updates the value of the property <b>$isPrimary</b>. Note that once the column become primary, it will not allow null values.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => '<b>true</b> if the column is primary key. false       if not.',
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
                'name' => 'setIsUnique',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property $isUnique.',
                'description' => 'Sets the value of the property $isUnique. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True if the column value is unique. false       if not.',
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
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the column.',
                'description' => 'Sets the name of the column. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the column as it appears in the database.',
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
                'summary' => 'Sets or unset the owner table of the column.',
                'description' => 'Sets or unset the owner table of the column. Note that the developer should not call this method manually. It is       used only if the column is added or removed from Table object.',
                'params' => [
                    '$table' => [
                        'type' => 'Table|null',
                        'description' => 'The owner of the column. If null is given,       The owner will be unset.',
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
                'name' => 'setScale',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of Scale.',
                'description' => 'Sets the value of Scale. Scale is simply the number of digits that will appear to the right of       decimal point. Only applicable if the datatype of the column is decimal,       float and double.',
                'params' => [
                    '$scale' => [
                        'type' => 'unkown_type',
                        'description' => '',
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
                'name' => 'setSize',
                'access-modifier' => 'public function',
                'summary' => 'Sets the size of the data that will be stored by the column.',
                'description' => 'Sets the size of the data that will be stored by the column. ',
                'params' => [
                    '$size' => [
                        'type' => 'int',
                        'description' => 'A positive number that represents the size. must be greater       than 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the size is set, the method will return true. Other than       that, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setSupportedTypes',
                'access-modifier' => 'public function',
                'summary' => 'Adds a set of values as a supported datatypes for the column.',
                'description' => 'Adds a set of values as a supported datatypes for the column. ',
                'params' => [
                    '$datatypes' => [
                        'type' => 'array',
                        'description' => 'An indexed array that contains a strings that       represents the types.',
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
                'name' => 'setWithTablePrefix',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attributes which determine if table name will be       prefixed with database name or not.',
                'description' => 'Sets the value of the attributes which determine if table name will be       prefixed with database name or not. Note that table name will be prefixed with database name only if owner       schema is set.',
                'params' => [
                    '$withDbPrefix' => [
                        'type' => 'boolean',
                        'description' => 'True to prefix table name with database name.       false to not prefix table name with database name.',
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