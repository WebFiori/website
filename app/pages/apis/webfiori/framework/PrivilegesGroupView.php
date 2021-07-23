<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class PrivilegesGroupView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a set of privileges.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class PrivilegesGroup');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'PrivilegesGroup', '\webfiori\framework', 'A class that represents a set of privileges. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&privileges',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all group privileges.',
                'description' => 'Returns an array that contains all group privileges. The array does not include the privileges of parent group or child       groups.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains an objects of type \'Privilege\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$gId' => [
                        'type' => 'string',
                        'description' => 'The ID of the group. Default is \'GROUP\'.',
                        'optional' => false,
                    ],
                    '$gName' => [
                        'type' => 'string',
                        'description' => 'The name of the group. Default is \'G_NAME\'.',
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
                'name' => 'addPrivilage',
                'access-modifier' => 'public function',
                'summary' => 'Adds new privilege to the array of group privileges.',
                'description' => 'Adds new privilege to the array of group privileges. ',
                'params' => [
                    '$pr' => [
                        'type' => 'Privilege',
                        'description' => 'An object of type Privilege. Note that       the privilege will be added only if there is no privilege in       the group which has the same ID.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the privilege was       added. false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'childGroups',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all child groups of the group.',
                'description' => 'Returns an array that contains all child groups of the group. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains an objects of type \'PrivilegesGroup\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getID',
                'access-modifier' => 'public function',
                'summary' => 'Returns the ID of the group.',
                'description' => 'Returns the ID of the group. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The ID of the group. Default value is \'GROUP\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the group.',
                'description' => 'Returns the name of the group. The name can be used to give a meaningful description of the group       (like a label).',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the group. Default value is \'G_NAME\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getParentGroup',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type \'PrivilegesGroup\' that represents the parent       group of \'this\' group.',
                'description' => 'Returns an object of type \'PrivilegesGroup\' that represents the parent       group of \'this\' group. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the parent group is set, the method will       return it. If it is not set, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/PrivilegesGroup', 'PrivilegesGroup'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasPrivilege',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the group has the given privilege or not.',
                'description' => 'Checks if the group has the given privilege or not. This method will only check the given group (does not include parent).',
                'params' => [
                    '$p' => [
                        'type' => 'Privilege',
                        'description' => 'An object of type \'Privilige\'.',
                        'optional' => false,
                    ],
                    '$checkChildGroups' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the       search for the privilege will include child groups. By default, it will       be set to true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the group has the given       privilege. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setID',
                'access-modifier' => 'public function',
                'summary' => 'Sets the ID of the group.',
                'description' => 'Sets the ID of the group. The ID of the group can only consist of the following characters: [A-Z],       [a-z], [0-9] and underscore. In addition, it must not be the same as the       ID of any of the parent groups or child groups.',
                'params' => [
                    '$id' => [
                        'type' => 'string',
                        'description' => 'The ID of the group.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the ID of the group is updated, the method will return       true. If not updated, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the group.',
                'description' => 'Sets the name of the group. The name is used just to give a meaning to the group.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the group. It must be non-empty string       in order to update.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If group name is updated, the method will return true.       If not updated, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setParentGroup',
                'access-modifier' => 'public function',
                'summary' => 'Sets or unset parent privileges group.',
                'description' => 'Sets or unset parent privileges group. ',
                'params' => [
                    '$group' => [
                        'type' => 'PrivilegesGroup|null',
                        'description' => 'If the given parameter is an object of       type \'PrivilegesGroup\', the parent group will be set if it has different       ID other than \'this\' group. If null reference is passed, the parent group will be       unset. Default value is null.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the class attribute value was updated, the method will       return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type Json that contains group info as JSON string.',
                'description' => 'Returns an object of type Json that contains group info as JSON string. The generated JSON string will have the following format:      <p>      {<br/>      &nbsp;&nbsp;"group-id":"",<br/>      &nbsp;&nbsp;"parent-group-id":"",<br/>      &nbsp;&nbsp;"name":"",<br/>      &nbsp;&nbsp;"privileges":[]<br/>      &nbsp;&nbsp;"child-groups":[]<br/>      }      </p>       See the class "Privilege" for more information on the JSON string that       will be generated by each privilege in the privileges array.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'Json
',
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