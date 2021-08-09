<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class EntityMapperView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to map a \'Table\' object to an entity class.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class EntityMapper');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'EntityMapper', '\webfiori\database', 'A class which is used to map a \'Table\' object to an entity class. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$tableObj' => [
                        'type' => 'Table',
                        'description' => 'The table that will be mapped to an entity.',
                        'optional' => false,
                    ],
                    '$className' => [
                        'type' => 'string',
                        'description' => 'The name of the class that the entity will be       created in.',
                        'optional' => false,
                    ],
                    '$path' => [
                        'type' => 'string',
                        'description' => 'The directory at which the entity will be created in.       the default value is the constant __DIR__.',
                        'optional' => false,
                    ],
                    '$namespace' => [
                        'type' => 'string',
                        'description' => 'The namespace at which the entity will belongs       to. If invalid is given, \'webfiori\\database\\entity\' is used as default value.',
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
                'name' => 'create',
                'access-modifier' => 'public function',
                'summary' => 'Creates the class that the table records will be mapped to.',
                'description' => 'Creates the class that the table records will be mapped to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the class is created, the method will return true.       If not, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAbsolutePath',
                'access-modifier' => 'public function',
                'summary' => 'Returns the full path to the entity class.',
                'description' => 'Returns the full path to the entity class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the full path to the file that contains       the mapped class.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAttribitesNames',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the names of attributes mapped from columns       names.',
                'description' => 'Returns an array that contains the names of attributes mapped from columns       names. Attributes names are generated based on the names of keys. For example,       if we have two columns one with key \'user-id\' and the second one with       name \'user-PASS\', then the two attributes which represents the two columns       will have the names \'userId\' and \'userPASS\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains attributes names. The       indices will be columns keys and the values are attributes names.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getEntityMethods',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains the possible names       of the methods which exist in the entity class that the result       of a select query on the table will be mapped to.',
                'description' => 'Returns an associative array that contains the possible names       of the methods which exist in the entity class that the result       of a select query on the table will be mapped to. The names of the methods are constructed from the names of columns       keys. For example, if the name of the column key is \'user-id\', the       name of setter method will be \'setUserId\' and the name of setter       method will be \'setUserId\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The array will have two indices.       The first index has the name \'setters\' which will contain the names       of setters and the second index is \'getters\' which contains the names       of the getters.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getEntityName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the class that the table is mapped to.',
                'description' => 'Returns the name of the class that the table is mapped to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string that represents the       name of the class that the table is mapped to.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getNamespace',
                'access-modifier' => 'public function',
                'summary' => 'Returns the namespace at which the entity belongs to.',
                'description' => 'Returns the namespace at which the entity belongs to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string that represents the name      of the namespace at which the entity belongs to.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPath',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory at which the entity will be created in.',
                'description' => 'Returns the name of the directory at which the entity will be created in. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string that represents the name       of the directory at which the entity will be created in.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSettersMap',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that maps possible entity methods names with       table columns names in the database.',
                'description' => 'Returns an associative array that maps possible entity methods names with       table columns names in the database. Assuming that the table has two columns. The first one has a key = \'user-id\'       and the second one has a key \'password\'. Also, let\'s assume that the first column       has the name \'id\' in the database and the second one has the name \'user_pass\'.       If this is the case, the method will return something like the following array:      <p>      <code>[<br/>      \'setUserId\' =&gt; \'id\',<br/>      \'setPassword\' =&gt; \'user_pass\'<br/>      ]</code>      </p>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The indices represents the names of       the methods in the entity class and the values are the names of table       columns as they appear in the database.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTable',
                'access-modifier' => 'public function',
                'summary' => 'Returns the table instance which is associated with the mapper.',
                'description' => 'Returns the table instance which is associated with the mapper. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'Table\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/Table', 'Table'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'mapToMethodName',
                'access-modifier' => 'public function',
                'summary' => 'Maps key name to entity method name.',
                'description' => 'Maps key name to entity method name. ',
                'params' => [
                    '$colKey' => [
                        'type' => 'string',
                        'description' => 'The name of column key such as \'user-id\'.',
                        'optional' => false,
                    ],
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of the method. This one can have only two values,       \'s\' for setter method and \'g\' for getter method. Default is \'g\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The name of the mapped method name. If the passed column       key is empty string, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setEntityName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the entity class.',
                'description' => 'Sets the name of the entity class. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'A string that represents the name of the entity class.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the name is set, the method will return true. If       not set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setNamespace',
                'access-modifier' => 'public function',
                'summary' => 'Sets the namespace at which the entity will belongs to.',
                'description' => 'Sets the namespace at which the entity will belongs to. ',
                'params' => [
                    '$ns' => [
                        'type' => 'string',
                        'description' => 'A string that represents the namespace.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the namespace is set, the method will return true. If       not set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setPath',
                'access-modifier' => 'public function',
                'summary' => 'Sets the location at which the entity class will be created on.',
                'description' => 'Sets the location at which the entity class will be created on. ',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'A string that represents the path to the folder at       which the entity will be created on.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the path is set, the method will return true. If       not set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setUseJsonI',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'$implJsonI\'.',
                'description' => 'Sets the value of the attribute \'$implJsonI\'. If this attribute is set to true, the generated entity will implemented       the interface \'webfiori\\json\\JsonI\'. Not that this will make the entity class       depends on the library \'Json\'.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True to make it implement the interface JsonI and       false to not.',
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