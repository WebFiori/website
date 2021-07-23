<?php
namespace docGenerator\app\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MainDatabaseView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A sample database instance.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MainDatabase');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MainDatabase', '\app\database', 'A sample database instance. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addUser',
                'access-modifier' => 'public function',
                'summary' => 'Adds new user to the database.',
                'description' => 'Adds new user to the database. ',
                'params' => [
                    '$userObj' => [
                        'type' => 'User',
                        'description' => 'An object that holds user information.',
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
                'name' => 'getUserByEmail',
                'access-modifier' => 'public function',
                'summary' => 'Returns user information given its email address.',
                'description' => 'Returns user information given its email address. ',
                'params' => [
                    '$emailAddress' => [
                        'type' => 'string',
                        'description' => 'The email address of the user.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a user which has the given email was found, the       method will return it. If no such user was found, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/User', 'User'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUserById',
                'access-modifier' => 'public function',
                'summary' => 'Returns user information given its ID.',
                'description' => 'Returns user information given its ID. ',
                'params' => [
                    '$userId' => [
                        'type' => 'int',
                        'description' => 'The ID of the user.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a user which has the given ID was found, the       method will return it. If no such user was found, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/User', 'User'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUserByUsername',
                'access-modifier' => 'public function',
                'summary' => 'Returns user information given its username.',
                'description' => 'Returns user information given its username. ',
                'params' => [
                    '$uName' => [
                        'type' => 'string',
                        'description' => 'The username of the user.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a user which has the given username was found, the       method will return it. If no such user was found, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/User', 'User'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUsers',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds objects of type \'User\'.',
                'description' => 'Returns an array that holds objects of type \'User\'. ',
                'params' => [
                    '$pageNum' => [
                        'type' => 'int',
                        'description' => 'An optional page number. Default is 1.',
                        'optional' => false,
                    ],
                    '$itmesPerPage' => [
                        'type' => 'int',
                        'description' => 'The number of records per page. Default is 5.',
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
                'name' => 'login',
                'access-modifier' => 'public function',
                'summary' => 'Checks if user can login to the system or not.',
                'description' => 'Checks if user can login to the system or not. ',
                'params' => [
                    '$userNameOrEmail' => [
                        'type' => 'string',
                        'description' => 'The username of the user or his email       address.',
                        'optional' => false,
                    ],
                    '$userPass' => [
                        'type' => 'string',
                        'description' => 'The password of the user (not hashed).',
                        'optional' => false,
                    ],
                    '$sessionDuration' => [
                        'type' => 'int',
                        'description' => 'An optional session duration (in minutes). Must be a number       greater than 1. Default is 5.',
                        'optional' => false,
                    ],
                    '$isRef' => [
                        'type' => 'boolean',
                        'description' => 'A boolean to indicate if the timeout of the session       will be refreshed with every request or not.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the user is logged in, the method will return an       object of type \'User\'. If not, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/framework/User', 'User'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'updatePassword',
                'access-modifier' => 'public function',
                'summary' => 'Update the password of a user given its ID.',
                'description' => 'Update the password of a user given its ID. ',
                'params' => [
                    '$user' => [
                        'type' => 'User',
                        'description' => 'An object that holds the ID of the user       alongside the new password.',
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
                'name' => 'updatePrivileges',
                'access-modifier' => 'public function',
                'summary' => 'Update the privileges of a user given its ID.',
                'description' => 'Update the privileges of a user given its ID. ',
                'params' => [
                    '$user' => [
                        'type' => 'User',
                        'description' => 'An object that holds the ID of the user       alongside the new set of privileges.',
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
                'name' => 'updateUser',
                'access-modifier' => 'public function',
                'summary' => 'Update user information given its info stored in an object.',
                'description' => 'Update user information given its info stored in an object. This method will update the following information:      <ul>      <li>email</li>      <li>username</li>      </ul>',
                'params' => [
                    '$userObj' => [
                        'type' => 'User',
                        'description' => 'The object that holds user info.',
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