<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class TableView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to represents database tables.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class Table');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'Table', '\webfiori\database', 'A class that can be used to represents database tables. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates a new instance of the class.',
                'description' => 'Creates a new instance of the class. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the table. If empty string is given,       the value \'new_table\' will be used as default.',
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
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$colObj' => [
                        'type' => 'Column',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'boolean
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addColumns',
                'access-modifier' => 'public function',
                'summary' => 'Adds a set of columns as one patch.',
                'description' => 'Adds a set of columns as one patch. ',
                'params' => [
                    '$cols' => [
                        'type' => 'array',
                        'description' => 'An array that holds the columns as an associative array.       The indices should represent columns keys.',
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
                'summary' => 'Adds a foreign key to the table.',
                'description' => 'Adds a foreign key to the table. ',
                'params' => [
                    '$refTable' => [
                        'type' => 'Table|AbstractQuery|string',
                        'description' => 'The referenced table. It is the table that       will contain original values. This value can be an object of type       \'Table\', an object of type \'AbstractQuery\' or the namespace of a class which is a sub-class of       the class \'AbstractQuery\'.',
                        'optional' => false,
                    ],
                    '$cols' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains key columns.       The indices must be names of columns which exist in \'this\' table and       the values must be columns from referenced table. It is possible to       provide an indexed array. If an indexed array is given, the method will       assume that the two tables have same column key.',
                        'optional' => false,
                    ],
                    '$keyname' => [
                        'type' => 'string',
                        'description' => 'The name of the key.',
                        'optional' => false,
                    ],
                    '$onupdate' => [
                        'type' => 'string',
                        'description' => 'The \'on update\' condition for the key. it can be one       of the following:       <ul>      <li>set null</li>      <li>cascade</li>      <li>restrict</li>      <li>set default</li>      <li>no action</li>      </ul>      Default value is \'set null\'.',
                        'optional' => false,
                    ],
                    '$ondelete' => [
                        'type' => 'string',
                        'description' => 'The \'on delete\' condition for the key. it can be one       of the following:       <ul>      <li>set null</li>      <li>cascade</li>      <li>restrict</li>      <li>set default</li>      <li>no action</li>      </ul>      Default value is \'set null\'.',
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
                'name' => 'getColByIndex',
                'access-modifier' => 'public function',
                'summary' => 'Returns a column given its index.',
                'description' => 'Returns a column given its index. ',
                'params' => [
                    '$index' => [
                        'type' => 'int',
                        'description' => 'The index of the column.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a column was found which has the specified index,       it is returned. Other than that, The method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Column', 'Column'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColByKey',
                'access-modifier' => 'public function',
                'summary' => 'Returns a column given its key name.',
                'description' => 'Returns a column given its key name. ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of column key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a column which has the given key exist on the table,       the method will return it as an object. Other than that, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Column', 'Column'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColByName',
                'access-modifier' => 'public function',
                'summary' => 'Returns a column given its actual name.',
                'description' => 'Returns a column given its actual name. ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of column as it appears in the database.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a column which has the given name exist on the table,       the method will return it as an object. Other than that, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Column', 'Column'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCols',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that holds all table columns.',
                'description' => 'Returns an associative array that holds all table columns. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The indices of the array are column       keys and the values are objects of type \'Column\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of columns which are in the table.',
                'description' => 'Returns the number of columns which are in the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of columns in the table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsDatatypes',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains data types of table columns.',
                'description' => 'Returns an array that contains data types of table columns. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains columns data types. Each       index will corresponds to the index of the column in the table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsKeys',
                'access-modifier' => 'public function',
                'summary' => 'Returns an indexed array that contains the names of columns keys.',
                'description' => 'Returns an indexed array that contains the names of columns keys. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An indexed array that contains the names of columns keys.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getColsNames',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all columns names as they will appear in       the database.',
                'description' => 'Returns an array that contains all columns names as they will appear in       the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains all columns names as they will appear in       the database.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getComment',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents a comment which was added with the table.',
                'description' => 'Returns a string that represents a comment which was added with the table. ',
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
                'name' => 'getEntityMapper',
                'access-modifier' => 'public function',
                'summary' => 'Returns an instance of the class \'EntityMapper\' which can be used to map the       table to an entity class.',
                'description' => 'Returns an instance of the class \'EntityMapper\' which can be used to map the       table to an entity class. Note that the developer can modify the name of the entity and the namespace       that it belongs to in addition to the path that the class will be created on.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An instance of the class \'EntityMapper\'',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/EntityMapper', 'EntityMapper'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getForeignKey',
                'access-modifier' => 'public function',
                'summary' => 'Returns a foreign key given its name.',
                'description' => 'Returns a foreign key given its name. ',
                'params' => [
                    '$keyName' => [
                        'type' => 'string',
                        'description' => 'The name of the foreign key as specified when it       was added to the table.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a key with the given name exist, the method       will return an object that represent it. Other than that, the method will       return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ForeignKey', 'ForeignKey'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getForignKeys',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all table foreign keys.',
                'description' => 'Returns an array that contains all table foreign keys. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array of FKs.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getForignKeysCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of foreign keys added to the table.',
                'description' => 'Returns the number of foreign keys added to the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an integer that represents the count of FKs.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the table.',
                'description' => 'Returns the name of the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the table. Default return value is \'new_table\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOldName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the old name of the column.',
                'description' => 'Returns the old name of the column. Note that the old name will be set only if the method       Table::setName() is called more than once in the same instance.',
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
                'summary' => 'Returns the database which owns the table.',
                'description' => 'Returns the database which owns the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the owner is set, the method will return it as an       object. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/database/Database', 'Database'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPrimaryKeyColsCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of columns that will act as one primary key.',
                'description' => 'Returns the number of columns that will act as one primary key. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of columns that will act as one primary key. If       the table has no primary key, the method will return 0. If one column       is used as primary, the method will return 1. If two, the method       will return 2 and so on.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPrimaryKeyColsKeys',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the keys of the columns which are primary.',
                'description' => 'Returns an array that contains the keys of the columns which are primary. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the keys of the columns which are primary.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPrimaryKeyName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of table primary key.',
                'description' => 'Returns the name of table primary key. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The returned value will be the name of the table added       to it the suffix \'_pk\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSelect',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'SelectExpression
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasColumn',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$colName' => [
                        'type' => 'string',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'boolean
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasColumnWithKey',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the table has a column with a given key.',
                'description' => 'Checks if the table has a column with a given key. ',
                'params' => [
                    '$keyName' => [
                        'type' => 'string',
                        'description' => 'The name of the key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a column with the given key exist, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isNameWithDbPrefix',
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
                'name' => 'removeColByKey',
                'access-modifier' => 'public function',
                'summary' => 'Removes a column from the table given its key.',
                'description' => 'Removes a column from the table given its key. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'Key name of the column.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the column is removed, an object that represent it       is returned. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Column', 'Column'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeReference',
                'access-modifier' => 'public function',
                'summary' => 'Removes a foreign key given its name.',
                'description' => 'Removes a foreign key given its name. ',
                'params' => [
                    '$keyName' => [
                        'type' => 'string',
                        'description' => 'The name of the foreign key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the key was removed, the method will return the       removed key as an object. If nothing changed, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ForeignKey', 'ForeignKey'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setComment',
                'access-modifier' => 'public function',
                'summary' => 'Sets a comment which will appear with the table.',
                'description' => 'Sets a comment which will appear with the table. ',
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
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the table.',
                'description' => 'Sets the name of the table. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the table. Must be non-empty string in order       to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the name is set, the method will return true. Other than       that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setOwner',
                'access-modifier' => 'public function',
                'summary' => 'Sets or removes the database which owns the table.',
                'description' => 'Sets or removes the database which owns the table. ',
                'params' => [
                    '$db' => [
                        'type' => 'Database|null',
                        'description' => 'The owner database. If null is passed, the owner       will be unset.',
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
                'name' => 'setWithDbPrefix',
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
            new FunctionDef([
                'name' => 'toSQL',
                'access-modifier' => 'public abstract function',
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
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;