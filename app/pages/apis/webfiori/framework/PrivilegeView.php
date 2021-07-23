<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class PrivilegeView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a privilege.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Privilege');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Privilege', '\webfiori\framework', 'A class that represents a privilege. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class',
                'description' => 'Creates new instance of the class ',
                'params' => [
                    '$id' => [
                        'type' => 'string',
                        'description' => 'The unique identifier of the privilege. Default is       \'PR\'.',
                        'optional' => false,
                    ],
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the privilege. It is provided only       in case of displaying privilege in some UI view. Default is empty string.',
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
                'name' => 'getID',
                'access-modifier' => 'public function',
                'summary' => 'Returns the ID of the privilege.',
                'description' => 'Returns the ID of the privilege. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The ID of the privilege. If the ID was not set,       the method will return \'PR\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the privilege.',
                'description' => 'Returns the name of the privilege. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the privilege. If the name was not updated,       the method will return \'PR_NAME\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setID',
                'access-modifier' => 'public function',
                'summary' => 'Sets the ID of the privilege',
                'description' => 'Sets the ID of the privilege ',
                'params' => [
                    '$code' => [
                        'type' => 'string',
                        'description' => 'The ID of the privilege. Only set if the given string       is not empty. In addition, The ID of the privilege can only consist       of the following characters: [A-Z], [a-z], [0-9] and underscore.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the ID of the privilege is updated, the method will return       true. If not updated, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the privilege.',
                'description' => 'Sets the name of the privilege. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the privilege. It is only set when       the given string is not empty.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the privilege name was set, the method will return       true. If not set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type Json that contains group info as JSON string.',
                'description' => 'Returns an object of type Json that contains group info as JSON string. The generated JSON string will have the following format:      <p>      {<br/>      &nbsp;&nbsp;"privilegeId":"",<br/>      &nbsp;&nbsp;"name":"",<br/>      }      </p>',
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