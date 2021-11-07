<?php
namespace docGenerator\webfiori\database\mssql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MSSQLColumnView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a column in MSSQL table.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MSSQLColumn');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MSSQLColumn', '\webfiori\database\mssql', 'A class that represents a column in MSSQL table. '));
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
                        'description' => 'The unique name of the column.',
                        'optional' => false,
                    ],
                    '$datatype' => [
                        'type' => 'string',
                        'description' => 'The datatype of the column. Default value is       \'nvarchar\'',
                        'optional' => false,
                    ],
                    '$size' => [
                        'type' => 'int',
                        'description' => 'The size of the column. Used only if column type       supports size.',
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
                'name' => 'asString',
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
                        'description' => 'An associative array of options. The available options       are:       <ul>      <li><b>name</b>: Required. The name of the column in the database. If not       provided, no object will be created.</li>      <li><b>datatype</b>: The datatype of the column. If not provided, \'varchar\'       will be used. Equal option: \'type\'.</li>      <li><b>size</b>: Size of the column (if datatype does support size).       If not provided, 1 will be used.</li>      <li><b>default</b>: A default value for the column if its value       is not present in case of insert.</li>      <li><b>is-null</b>: A boolean. If the column allows null values, this should       be set to true. Default is false.</li>      <li><b>is-primary</b>: A boolean. It must be set to true if the column       represents a primary key. Note that the column will be set as unique       once its set as a primary. Equal option: primary.</li>      <li><b>is-unique</b>: A boolean. If set to true, a unique index will       be created for the column.</li>      <li><b>auto-update</b>: A boolean. If the column datatype is \'date\', \'time\'       or \'datetime2\' and this parameter is set to true, the time of update will       change automatically without having to change it manually.</li>      <li><b>scale</b>: Number of numbers to the left of the decimal       point. Only supported for decimal datatype.</li>      <li><b>comment</b>: A comment which can be used to describe the column.</li>      <li><b>validator</b>: A PHP function which can be used to validate user       values before submitting the query to database.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type \'MySQLColumn\'       if created. If the index \'name\' is not set, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/mssql/MSSQLColumn', 'MSSQLColumn'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAlias',
                'access-modifier' => 'public function',
                'summary' => 'Returns column alias.',
                'description' => 'Returns column alias. Note that the method will add square brackets around the alias.',
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
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the column.',
                'description' => 'Returns the name of the column. Note that the method will add square brackets around the name.',
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
                'name' => 'setDefault',
                'access-modifier' => 'public function',
                'summary' => 'Sets the default value for the column to use in case of insert.',
                'description' => 'Sets the default value for the column to use in case of insert. For integer data type, the passed value must be an integer. For string       , the passed value must be a string. If the datatype       is \'datetime2\', the default will be set to current time and date       if non-null value is passed (the value which is returned by the       function date(\'Y-m-d H:i:s). If the passed       value is a date string in the format \'YYYY-MM-DD HH:MM:SS\', then it       will be set to the given value. If the passed       value is a date string in the format \'YYYY-MM-DD\', then the default       will be set to \'YYYY-MM-DD 00:00:00\'. If       null is passed, it implies that no default value will be used.',
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
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;