<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class UserView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a system user.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class User');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'User', '\webfiori\framework', 'A class that represents a system user. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$username' => [
                        'type' => 'string',
                        'description' => 'Username of the user.',
                        'optional' => false,
                    ],
                    '$password' => [
                        'type' => 'string',
                        'description' => 'The login password of the user.',
                        'optional' => false,
                    ],
                    '$email' => [
                        'type' => 'string',
                        'description' => 'Email address of the user.',
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
                'summary' => 'Returns a JSON string representation of the user.',
                'description' => 'Returns a JSON string representation of the user. The Json object will create a JSON string which has the following       format:      <p>{<br/>      &nbsp;&nbsp;"use-id":-1<br/>      &nbsp;&nbsp;"email":""<br/>      &nbsp;&nbsp;"display-name":""<br/>      &nbsp;&nbsp;"username":""<br/>      }</p>',
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
                'name' => 'addPrivilege',
                'access-modifier' => 'public function',
                'summary' => 'Adds new privilege to the array of user privileges.',
                'description' => 'Adds new privilege to the array of user privileges. ',
                'params' => [
                    '$privilegeId' => [
                        'type' => 'string',
                        'description' => 'The ID of the privilege. It must be exist in       the class \'Access\' or it won\'t be added. If the privilege is already       added, It will be not added again.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the privilege is       added. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addToGroup',
                'access-modifier' => 'public function',
                'summary' => 'Adds a user to a privileges group given group ID.',
                'description' => 'Adds a user to a privileges group given group ID. ',
                'params' => [
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group.',
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
                'name' => 'getDisplayName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the display name of the user.',
                'description' => 'Returns the display name of the user. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The display name of the user. Default value is       null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getEmail',
                'access-modifier' => 'function',
                'summary' => 'Returns the value of the property \'$email\'.',
                'description' => 'Returns the value of the property \'$email\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of the property \'$email\'. Default value is       empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getID',
                'access-modifier' => 'public function',
                'summary' => 'Returns The ID of the user.',
                'description' => 'Returns The ID of the user. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The ID of the user.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastLogin',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property \'$lastLogin\'.',
                'description' => 'Returns the value of the property \'$lastLogin\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Last login date. If not set, the method will       return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastPasswordResetDate',
                'access-modifier' => 'public function',
                'summary' => 'Returns the date at which user password was reseted.',
                'description' => 'Returns the date at which user password was reseted. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'the date at which user password was reseted.       If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPassword',
                'access-modifier' => 'function',
                'summary' => 'Returns the value of the property \'$password\'.',
                'description' => 'Returns the value of the property \'$password\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of the property \'$password\'. Default value is       empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRegDate',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property \'$regDate\'.',
                'description' => 'Returns the value of the property \'$regDate\'. ',
                'params' => [
                    '$date' => [
                        'type' => 'string|null',
                        'description' => 'Registration date. If not set, the method will      return null.',
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
                'name' => 'getResetCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of times the user has requested that his password       to be reseted.',
                'description' => 'Returns the number of times the user has requested that his password       to be reseted. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of times the user has requested that his password       to be reseted. Default value is 0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUserName',
                'access-modifier' => 'function',
                'summary' => 'Returns the value of the property \'$userName\'.',
                'description' => 'Returns the value of the property \'$userName\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of the property \'$userName\'. Default value is       empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasAnyPrivilege',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the user has one of multiple privileges.',
                'description' => 'Checks if the user has one of multiple privileges. ',
                'params' => [
                    '$privilegesIdsArr' => [
                        'type' => 'array',
                        'description' => 'An array that contains the IDs of the       privileges.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the user has one of the given privileges, the method       will return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasPrivilege',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a user has privilege or not given its ID.',
                'description' => 'Checks if a user has privilege or not given its ID. ',
                'params' => [
                    '$privilegeId' => [
                        'type' => 'string',
                        'description' => 'The ID of the privilege.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the user has the given       privilege. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'inGroup',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the user belongs to a privileges group given its ID.',
                'description' => 'Checks if the user belongs to a privileges group given its ID. A user will be a part of privileges group only if the group has at least       one privilege and he has all the       privileges of that group. In addition, he must have all the privileges       of all child groups of that group.',
                'params' => [
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the user belongs       to the users group. The user will be considered a part of the group       only if he has all the permissions in the group.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'privileges',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array which contains all user privileges.',
                'description' => 'Returns an array which contains all user privileges. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array which contains an objects of type Privilege.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeAllPrivileges',
                'access-modifier' => 'public function',
                'summary' => 'Reinitialize the array of user privileges.',
                'description' => 'Reinitialize the array of user privileges. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removePrivilege',
                'access-modifier' => 'public function',
                'summary' => 'Removes a privilege from user privileges array given its ID.',
                'description' => 'Removes a privilege from user privileges array given its ID. ',
                'params' => [
                    '$privilegeId' => [
                        'type' => 'string',
                        'description' => 'The ID of the privilege.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the privilege is removed, the method will       return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDisplayName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the display name of the user.',
                'description' => 'Sets the display name of the user. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'Display name. It will be set only if it was a string       with length that is greater than 0 (Not empty string). Note that the method will       remove any extra spaces in the name.',
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
                'name' => 'setEmail',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'$email\'.',
                'description' => 'Sets the value of the property \'$email\'. ',
                'params' => [
                    '$email' => [
                        'type' => 'string',
                        'description' => 'The email to set. Note that the method will       use the method \'trim()\' in order to trim passed value.',
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
                'name' => 'setID',
                'access-modifier' => 'public function',
                'summary' => 'Sets the ID of the user.',
                'description' => 'Sets the ID of the user. ',
                'params' => [
                    '$id' => [
                        'type' => 'int',
                        'description' => 'The ID of the user.',
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
                'name' => 'setLastLogin',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property <b>$lastLogin</b>.',
                'description' => 'Sets the value of the property <b>$lastLogin</b>. ',
                'params' => [
                    '$date' => [
                        'type' => 'string',
                        'description' => 'Last login date date.',
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
                'name' => 'setLastPasswordResetDate',
                'access-modifier' => 'public function',
                'summary' => 'Sets the date at which user password was reseted.',
                'description' => 'Sets the date at which user password was reseted. ',
                'params' => [
                    '$date' => [
                        'type' => 'string',
                        'description' => 'The date at which user password was reseted.',
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
                'name' => 'setPassword',
                'access-modifier' => 'function',
                'summary' => 'Sets the password of a user.',
                'description' => 'Sets the password of a user. ',
                'params' => [
                    '$password' => [
                        'type' => 'string',
                        'description' => 'The password to set.',
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
                'name' => 'setRegDate',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'$regDate\'.',
                'description' => 'Sets the value of the property \'$regDate\'. ',
                'params' => [
                    '$date' => [
                        'type' => 'string',
                        'description' => 'Registration date.',
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
                'name' => 'setResetCount',
                'access-modifier' => 'public function',
                'summary' => 'Sets the number of times the user has requested that his password       to be reseted.',
                'description' => 'Sets the number of times the user has requested that his password       to be reseted. ',
                'params' => [
                    '$times' => [
                        'type' => 'int',
                        'description' => 'The number of times the user has requested that his password       to be reseted. Must be an integer greater than -1.',
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
                'name' => 'setUserName',
                'access-modifier' => 'function',
                'summary' => 'Sets the user name of a user.',
                'description' => 'Sets the user name of a user. ',
                'params' => [
                    '$username' => [
                        'type' => 'string',
                        'description' => 'The username to set. Note that the method will       use the method \'trim()\' in order to trim passed value.',
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
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns a Json object that represents the user.',
                'description' => 'Returns a Json object that represents the user. The Json object will create a JSON string which has the following       format:      <p>{<br/>      &nbsp;&nbsp;"useId":-1<br/>      &nbsp;&nbsp;"email":""<br/>      &nbsp;&nbsp;"displayName":""<br/>      &nbsp;&nbsp;"username":""<br/>      }</p>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type Json.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
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