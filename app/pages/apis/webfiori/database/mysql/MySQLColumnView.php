<?php
namespace docGenerator\webfiori\database\mysql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MySQLColumnView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a column in MySQL table.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MySQLColumn');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MySQLColumn', '\webfiori\database\mysql', 'A class that represents a column in MySQL table. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. This method is used to initialize basic attributes of the column.       First of all, it sets MySQL version number to 8.0. Then it initializes the       supported datatypes.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the column as it appears in the       database. It must be a string and its not empty. Default value is \'col\'.',
                        'optional' => false,
                    ],
                    '$datatype' => [
                        'type' => 'string',
                        'description' => 'The type of column data. Default value is \'varchar\'.',
                        'optional' => false,
                    ],
                    '$size' => [
                        'type' => 'int',
                        'description' => 'The size of the column. Used only in case of       \'varachar\', \'int\' or decimal. If the given size is invalid, 1 will be used as default       value.',
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
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a string that can be used to create the column in a table.',
                'description' => 'Constructs a string that can be used to create the column in a table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that can be used to create the column in a table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'asString',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the column.',
                'description' => 'Returns a string that represents the column. The string can be used to add the column to a table or alter its properties.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'string
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'cleanValue',
                'access-modifier' => 'public function',
                'summary' => 'Validates and cleans a value for usage in a query.',
                'description' => 'Validates and cleans a value for usage in a query. ',
                'params' => [
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The value that will be cleaned.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return a value which is based on applied filters       and the datatype of the column.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createColObj',
                'access-modifier' => 'public static function',
                'summary' => 'Creates an instance of the class \'Column\' given an array of options.',
                'description' => 'Creates an instance of the class \'Column\' given an array of options. ',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An associative array of options. The available options       are:       <ul>      <li><b>name</b>: Required. The name of the column in the database. If not       provided, no object will be created.</li>      <li><b>datatype</b>: The datatype of the column. If not provided, \'varchar\'       will be used. Equal option: \'type\'.</li>      <li><b>size</b>: Size of the column (if datatype does support size).       If not provided, 1 will be used.</li>      <li><b>default</b>: A default value for the column if its value       is not present in case of insert.</li>      <li><b>is-null</b>: A boolean. If the column allows null values, this should       be set to true. Default is false.</li>      <li><b>is-primary</b>: A boolean. It must be set to true if the column       represents a primary key. Note that the column will be set as unique       once its set as a primary. Equal option: primary.</li>      <li><b>auto-inc</b>: A boolean. Only applicable if the column is a       primary key. Set to true to auto-increment column value by 1 for every       insert.</li>      <li><b>is-unique</b>: A boolean. If set to true, a unique index will       be created for the column.</li>      <li><b>auto-update</b>: A boolean. If the column datatype is \'timestamp\' or       \'datetime\' and this parameter is set to true, the time of update will       change automatically without having to change it manually.</li>      <li><b>scale</b>: Number of numbers to the left of the decimal       point. Only supported for decimal datatype.</li>      <li><b>comment</b>: A comment which can be used to describe the column.</li>      <li><b>validator</b>: A PHP function which can be used to validate user       values before submitting the query to database.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type \'MySQLColumn\'       if created. If the index \'name\' is not set, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mysql/MySQLColumn', 'MySQLColumn'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAlias',
                'access-modifier' => 'public function',
                'summary' => 'Returns column alias.',
                'description' => 'Returns column alias. Note that the method will add backticks around the alias.',
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
                'name' => 'getCollation',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of column collation.',
                'description' => 'Returns the value of column collation. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If MySQL version is \'5.5\' or lower, the method will       return \'utf8mb4_unicode_ci\'. Other than that, the method will return       \'utf8mb4_unicode_520_ci\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDefault',
                'access-modifier' => 'public function',
                'summary' => 'Returns the default value of the column.',
                'description' => 'Returns the default value of the column. Note that for \'datetime\' and \'timestamp\', if default value is set to       \'now()\' or \'current_timestamp\', the method will return a date string in the       format \'YYYY-MM-DD HH:MM:SS\' that represents current time.',
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
                'name' => 'getMySQLVersion',
                'access-modifier' => 'public function',
                'summary' => 'Returns version number of MySQL server.',
                'description' => 'Returns version number of MySQL server. This one is used to maintain compatibility with old MySQL servers.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'MySQL version number (such as \'5.5\'). If version number       is not set, The default return value is \'8.0\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the column.',
                'description' => 'Returns the name of the column. Note that the method will add backticks around the name.',
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
                'name' => 'getPHPType',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the datatype of column data in       PHP.',
                'description' => 'Returns a string that represents the datatype of column data in       PHP. This method basically maps the data that can be stored in a column from       MySQL type to PHP type. For example, if column type is \'varchar\', the method       will return the value \'string\'. If the column allow null values, the       method will return \'string|null\' and so on.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents column type in PHP (such as       \'integer\' or \'boolean\').',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isAutoInc',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the column is auto increment or not.',
                'description' => 'Checks if the column is auto increment or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the column is auto increment.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isAutoUpdate',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property \'isAutoUpdate\'.',
                'description' => 'Returns the value of the property \'isAutoUpdate\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the column type is \'datetime\' or \'timestamp\' and the       column is set to auto update in case of update query, the method will       return true. Default return value is valse.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAutoUpdate',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'isAutoUpdate\'.',
                'description' => 'Sets the value of the property \'isAutoUpdate\'. It is used in case the user want to update the date of a column       that has the type \'datetime\' or \'timestamp\' automatically if a record is updated.       This method has no effect for other datatypes.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'If true is passed, then the value of the column will       be updated in case an update query is constructed.',
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
                'name' => 'setDatatype',
                'access-modifier' => 'public function',
                'summary' => 'Sets the datatype of the column.',
                'description' => 'Sets the datatype of the column. ',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'A string that represents the datatype of the column.',
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
                'description' => 'Sets the default value for the column to use in case of insert. For integer data type, the passed value must be an integer. For string types such as       \'varchar\' or \'text\', the passed value must be a string. If the datatype       is \'timestamp\', the default will be set to current time and date       if non-null value is passed (the value which is returned by the       function date(\'Y-m-d H:i:s). If the passed       value is a date string in the format \'YYYY-MM-DD HH:MM:SS\', then it       will be set to the given value. If the passed       value is a date string in the format \'YYYY-MM-DD\', then the default       will be set to \'YYYY-MM-DD 00:00:00\'. same applies to \'datetime\' datatype. If       null is passed, it implies that no default value will be used.',
                'params' => [
                    '$default' => [
                        'type' => 'mixed',
                        'description' => 'The default value which will be set.',
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
                'name' => 'setIsAutoInc',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property <b>$isAutoInc</b>.',
                'description' => 'Sets the value of the property <b>$isAutoInc</b>. This attribute can be set only if the column is primary key and the       datatype of the column is set to \'int\'.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'true or false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '<b>true</b> if the property value changed. false       otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsPrimary',
                'access-modifier' => 'public function',
                'summary' => 'Makes the column primary or not.',
                'description' => 'Makes the column primary or not. Note that once the column become primary, it becomes unique by default. Also,       Note that if column type is \'boolean\', it cannot be a primary.',
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
                'name' => 'setMySQLVersion',
                'access-modifier' => 'public function',
                'summary' => 'Sets version number of MySQL server.',
                'description' => 'Sets version number of MySQL server. Version number of MySQL is used to set the correct collation for the column       in case of varchar or text data types. If MySQL version is \'5.5\' or lower,       collation will be set to \'utf8mb4_unicode_ci\'. Other than that, the       collation will be set to \'utf8mb4_unicode_520_ci\'.',
                'params' => [
                    '$vNum' => [
                        'type' => 'string',
                        'description' => 'MySQL version number (such as \'5.5\').',
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
                'description' => 'Sets or unset the owner table of the column. Note that the developer should not call this method manually. It is       used only if the column is added or removed from MySQLTable object.',
                'params' => [
                    '$table' => [
                        'type' => 'MySQLTable|null',
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
                    '$val' => [
                        'type' => 'int',
                        'description' => 'Number of numbers after the decimal point. It must be a       positive number.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If scale value is set, the method will return true.       false otherwise. The method will not set the scale in the following cases:      <ul>      <li>Datatype of the column is not decimal, float or double.</li>      <li>Size of the column is 0.</li>      <li>Given scale value is greater than the size of the column.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setSize',
                'access-modifier' => 'public function',
                'summary' => 'Sets the size of data (for numercal types and \'varchar\' only).',
                'description' => 'Sets the size of data (for numercal types and \'varchar\' only). If the data type of the column is \'int\', the maximum size is 11. If a       number greater than 11 is given, the value will be set to 11. The       maximum size for the \'varchar\' is 21845. If a value greater that that is given,       the datatype of the column will be changed to \'mediumtext\'.      For decimal, double and float data types, the value will represent       the  precision. If zero is given, then no specific value for precision       and scale will be used. If the datatype is boolean, the passed value will       be ignored and the size is set to 1.',
                'params' => [
                    '$size' => [
                        'type' => 'int',
                        'description' => 'The size to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true if the size is set. The method will return       false in case the size is invalid or datatype does not support       size attribute. Also The method will return       false in case the datatype of the column does not       support size.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
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