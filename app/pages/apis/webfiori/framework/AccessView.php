<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AccessView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class to manage user groups and privileges.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Access');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Access', '\webfiori\framework', 'A class to manage user groups and privileges. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'asArray',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that represents all privileges groups and privileges.',
                'description' => 'Returns an array that represents all privileges groups and privileges. The returned array will be indexed array. At each index, there will be       an associative array that represents a privileges group.       The array will contain the following indices:      <ul>      <li>group-id</li>      <li>given-title</li>      <li>child-groups</li>      <li>privileges</li>      </ul>      The index \'child-groups\' will contain an indexed array of all child groups       of a parent group. The index \'privileges\' will contain an indexed array that contains       all the privileges within a group. Each index of the array will contain       an associative array that represents a privilege. The array will have       two indices:      <ul>      <li>privilege-id</li>      <li>given-title</li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains all privileges and groups info.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clear',
                'access-modifier' => 'public static function',
                'summary' => 'Removes all created user groups and privileges.',
                'description' => 'Removes all created user groups and privileges. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createPermissionsStr',
                'access-modifier' => 'public static function',
                'summary' => 'Creates a string of permissions given a user.',
                'description' => 'Creates a string of permissions given a user. This method can be handy in case the developer would like to store       user privileges in a database. The method might return a string which       might looks like the following string:      <p>\'PRIVILEGE_1-1;PRIVILEGE_2-1;G-A_GROUP\'</p>        where \'PRIVILEGE_1\' and \'PRIVILEGE_2\' are IDs of privileges and       \'A_GROUP\' is the ID of a group that the user has all its privileges. The number       that comes after the dash is the status of the privilege. Each privilege       or a group will be separated from the other by a semicolon.       Also the group will have the letter \'G\' at the start. Note that if the group       has sub-groups, this means the user will have the privileges of the sub-groups.',
                'params' => [
                    '$user' => [
                        'type' => 'User',
                        'description' => 'The user which the permissions string will be created from.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'A string of user privileges and the groups that he belongs to       (if any).',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getGroup',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an object of type UsersGroup given its ID.',
                'description' => 'Returns an object of type UsersGroup given its ID. This method can be used to check if a group is exist or not. If       the method has returned null, this means the group does not exist.',
                'params' => [
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a users group with the given ID was found,       It will be returned. If not, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/PrivilegesGroup', 'PrivilegesGroup'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPrivilege',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a privilege object given privilege ID.',
                'description' => 'Returns a privilege object given privilege ID. This method will search all created groups for a privilege which has the       given ID. If not found, the method will return null. This method also       can be used to check if a privilege is exist or not. If the method       has returned null, this means the privilege does not exist.',
                'params' => [
                    '$id' => [
                        'type' => 'string',
                        'description' => 'The ID of the privilege.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a privilege with the given ID was found in       any user group, It will be returned. If not, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/Privilege', 'Privilege'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'groups',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array which contains all top-level user groups.',
                'description' => 'Returns an array which contains all top-level user groups. The array will be empty if no user groups has been created.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains an objects of type UsersGroup.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasGroup',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if a users group does exist or not given its ID.',
                'description' => 'Checks if a users group does exist or not given its ID. ',
                'params' => [
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if a users group       with the given ID was found. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasPrivilege',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if a privilege does exist or not given its ID.',
                'description' => 'Checks if a privilege does exist or not given its ID. The method will search all created groups for a privilege with the       given ID.',
                'params' => [
                    '$id' => [
                        'type' => 'string',
                        'description' => 'The ID of the privilege.',
                        'optional' => false,
                    ],
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'If it is provided, the search for the privilege       will be limited to the group which has the given ID.',
                        'optional' => false,
                    ],
                    '$searchChildern' => [
                        'type' => 'boolean',
                        'description' => 'If set to true and group ID is specified,       the search for the privilege will include child groups.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if a privilege       with the given ID was found. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'newGroup',
                'access-modifier' => 'public static function',
                'summary' => 'Creates new users group using specific ID.',
                'description' => 'Creates new users group using specific ID. The group is the base for user privileges. After creating it, the developer       can add a set of privileges to the group. Note that the group will not created       if the name of the group contains invalid characters or it is already       created. In addition, If a parent group has the given new group name,       it will not be created.',
                'params' => [
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group. The ID must not contain       any of the following characters: \';\',\'-\',\',\' or a space. If the name contains       any of the given characters, the group will not created.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the group is created, the method will return true.       If not, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'newPrivilege',
                'access-modifier' => 'public static function',
                'summary' => 'Creates new privilege in a specific group given its ID.',
                'description' => 'Creates new privilege in a specific group given its ID. The method will add the privilege only if it does not exist in any of       the created groups.',
                'params' => [
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group that the privilege will be       added to. It must be a group in the groups array of the access class.',
                        'optional' => false,
                    ],
                    '$privilegeId' => [
                        'type' => 'string',
                        'description' => 'The ID of the privilege. The ID must not contain       any of the following characters, \';\',\'-\',\',\' or a space.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the privilege was created, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'newPrivileges',
                'access-modifier' => 'public static function',
                'summary' => 'Creates multiple privileges in a group given its ID.',
                'description' => 'Creates multiple privileges in a group given its ID. This method can be used as a shorthand to create multiple privileges in       a group instead of calling Access::newPrivilege() multiple times.',
                'params' => [
                    '$groupId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group. The group must be created       before starting to create privileges in it.',
                        'optional' => false,
                    ],
                    '$prNamesArr' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains the names of privileges.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an associative array.       The indices will be the IDs of the privileges and the values will be       booleans. Each boolean corresponds to the status of each privilege in the array of       privileges. If the privilege is added, the value will be true. If not,       it will be false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'privileges',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array which contains all privileges       in a specific group.',
                'description' => 'Returns an array which contains all privileges       in a specific group. ',
                'params' => [
                    '$groupId' => [
                        'type' => 'string|null',
                        'description' => 'The ID of the group which its       privileges will be returned. If null is given, all privileges will be       returned. Default is null.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An array which contains an objects of type Privilege. If       the given group ID does not exist, the returned array will be empty.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'resolvePriviliges',
                'access-modifier' => 'public static function',
                'summary' => 'Adds privileges to a user given privileges string.',
                'description' => 'Adds privileges to a user given privileges string. ',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'A string of privileges. The format of the string must       follow the following format: \'PRIVILEGE_1-0;PRIVILEGE_2-1;G-A_GROUP\' where       \'PRIVILEGE_1\' and \'PRIVILEGE_2\' are IDs of privileges and \'A_GROUP\'       is the ID of a group that the user belongs to. The number       that comes after the dash is the status of the privilege. If 0, then the       user will not have the given privilege. If 1, the user will have the       privilege. In the given example, The user will have only \'PRIVILEGE_2\'. and       he will belong to the group that has the ID \'A_GROUP\'. Each       privilege or a group must be separated from the other by a semicolon. Also       the group must have the letter \'G\' at the start. Note that in the given       example, if \'PRIVILEGE_1\' is in \'A_GROUP\', he will not have it even if it is       in group permissions.',
                        'optional' => false,
                    ],
                    '$user' => [
                        'type' => 'User',
                        'description' => 'The user which the permissions will be added to',
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