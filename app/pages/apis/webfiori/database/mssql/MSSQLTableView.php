<?php
namespace docGenerator\webfiori\database\mssql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MSSQLTableView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents MSSQL table.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MSSQLTable');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MSSQLTable', '\webfiori\database\mssql', 'A class that represents MSSQL table. '));
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
                'name' => 'addColumns',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple columns at once.',
                'description' => 'Adds multiple columns at once. ',
                'params' => [
                    '$colsArr' => [
                        'type' => 'array',
                        'description' => 'An associative array. The keys will act as column       key in the table. The value of the key can be an object of type \'MSSQLColumn\'       or be an associative array of column options. The available options       are:       <ul>      <li><b>name</b>: The name of the column in the database. If not provided,       the name of the key will be used but with every \'-\' replaced by \'_\'.</li>      <li><b>datatype</b>: The datatype of the column.  If not provided, \'varchar\'       will be used. Note that the value \'type\' can be used as an       alias to this index.</li>      <li><b>size</b>: Size of the column (if datatype does support size).       If not provided, 1 will be used.</li>      <li><b>default</b>: A default value for the column if its value       is not present in case of insert.</li>      <li><b>is-null</b>: A boolean. If the column allows null values, this should       be set to true. Default is false.</li>      <li><b>is-primary</b>: A boolean. It must be set to true if the column       represents a primary key. Note that the column will be set as unique       once its set as a primary.</li>      <li><b>is-unique</b>: A boolean. If set to true, a unique index will       be created for the column.</li>      <li><b>auto-update</b>: A boolean. If the column datatype is       \'datetime\' or similar type and this parameter is set to true, the time of update will       change automatically without having to change it manually.</li>      <li><b>scale</b>: Number of numbers to the left of the decimal       point. Only supported for decimal datatype.</li>      </ul>',
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
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the table.',
                'description' => 'Returns the name of the table. Note that the method will add square brackets around the name.',
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
                'name' => 'getUniqueConstraintName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the unique constraint.',
                'description' => 'Returns the name of the unique constraint. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the unique constraint. If it is not set,       the method will return the name of the table prefixed with the       string \'AF_\' as constraint name.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setUniqueConstraintName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the unique constraint.',
                'description' => 'Sets the name of the unique constraint. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the unique constraint. Must be non-empty      string.',
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