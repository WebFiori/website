<?php
namespace docGenerator\webfiori\database\mysql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MySQLTableView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents MySQL table.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MySQLTable');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MySQLTable', '\webfiori\database\mysql', 'A class that represents MySQL table. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates a new instance of the class.',
                'description' => 'Creates a new instance of the class. This method will initialize the basic settings of the table. It will       set MySQL version to 8.0, the engine to \'InnoDB\' and char set to       \'utf8mb4\'.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the table.',
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
                'summary' => 'Adds new column to the table.',
                'description' => 'Adds new column to the table. Note that the column will be added only if no column was found in       the table which has the same name       as the given column (key name and database name).',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The index at which the column will be added to. The name       of the key can only have the following characters: [A-Z], [a-z], [0-9]       and \'-\'.',
                        'optional' => false,
                    ],
                    '$colObj' => [
                        'type' => 'MySQLColumn',
                        'description' => 'An object of type MySQLColumn.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true if the column is added. false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addColumns',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple columns at once.',
                'description' => 'Adds multiple columns at once. ',
                'params' => [
                    '$colsArr' => [
                        'type' => 'array',
                        'description' => 'An associative array. The keys will act as column       key in the table. The value of the key can be an object of type \'MySQLColumn\'       or be an associative array of column options. The available options       are:       <ul>      <li><b>name</b>: The name of the column in the database. If not provided,       the name of the key will be used but with every \'-\' replaced by \'_\'.</li>      <li><b>datatype</b>: The datatype of the column.  If not provided, \'varchar\'       will be used. Note that the value \'type\' can be used as an       alias to this index.</li>      <li><b>size</b>: Size of the column (if datatype does support size).       If not provided, 1 will be used.</li>      <li><b>default</b>: A default value for the column if its value       is not present in case of insert.</li>      <li><b>is-null</b>: A boolean. If the column allows null values, this should       be set to true. Default is false.</li>      <li><b>is-primary</b>: A boolean. It must be set to true if the column       represents a primary key. Note that the column will be set as unique       once its set as a primary.</li>      <li><b>auto-inc</b>: A boolean. Only applicable if the column is a       primary key. Set to true to auto-increment column value by 1 for every       insert.</li>      <li><b>is-unique</b>: A boolean. If set to true, a unique index will       be created for the column.</li>      <li><b>auto-update</b>: A boolean. If the column datatype is \'timestamp\' or       \'datetime\' and this parameter is set to true, the time of update will       change automatically without having to change it manually.</li>      <li><b>scale</b>: Number of numbers to the left of the decimal       point. Only supported for decimal datatype.</li>      <li><b>comment</b> A comment which can be used to describe the column.</li>      </ul>',
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
                'name' => 'getCharSet',
                'access-modifier' => 'public function',
                'summary' => 'Returns the character set that is used by the table.',
                'description' => 'Returns the character set that is used by the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The character set that is used by the table.. The default       value is \'utf8\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCollation',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of table collation.',
                'description' => 'Returns the value of table collation. If MySQL version is \'5.5\' or lower, the method will       return \'utf8mb4_unicode_ci\'. Other than that, the method will return       \'utf8mb4_unicode_520_ci\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Table collation.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getEngine',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the storage engine used by the table.',
                'description' => 'Returns the name of the storage engine used by the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the storage engine used by the table. The default       value is \'InnoDB\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
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
                'name' => 'removeColByKey',
                'access-modifier' => 'public function',
                'summary' => 'Removes a column given its key.',
                'description' => 'Removes a column given its key. ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'Column key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the column was removed, the method will return true.       Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
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
                'name' => 'toSQL',
                'access-modifier' => 'public function',
                'summary' => 'Returns SQL query which can be used to create the table.',
                'description' => 'Returns SQL query which can be used to create the table. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents SQL query which can be used       to create the table.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
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