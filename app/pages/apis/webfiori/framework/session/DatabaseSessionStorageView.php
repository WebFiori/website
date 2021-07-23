<?php
namespace docGenerator\webfiori\framework\session;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class DatabaseSessionStorageView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A session storage engine which uses database to store session state.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class DatabaseSessionStorage');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'DatabaseSessionStorage', '\webfiori\framework\session', 'A session storage engine which uses database to store session state. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class',
                'description' => 'Creates new instance of the class ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'gc',
                'access-modifier' => 'public function',
                'summary' => 'Removes all inactive sessions from the database.',
                'description' => 'Removes all inactive sessions from the database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'read',
                'access-modifier' => 'public function',
                'summary' => 'Reads session state.',
                'description' => 'Reads session state. ',
                'params' => [
                    '$sesstionId' => [
                        'type' => 'string',
                        'description' => 'The unique identifier of the session.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return a string that represents the       session if it was found. If no session was found which has the given ID, the method       will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'remove',
                'access-modifier' => 'public function',
                'summary' => 'Stops a session and remove its state from the database.',
                'description' => 'Stops a session and remove its state from the database. ',
                'params' => [
                    '$sesstionId' => [
                        'type' => 'string',
                        'description' => 'The unique identifier of the session.',
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
                'name' => 'save',
                'access-modifier' => 'public function',
                'summary' => 'Store session state.',
                'description' => 'Store session state. ',
                'params' => [
                    '$sessionId' => [
                        'type' => 'string',
                        'description' => 'The ID of the session that will be stored.',
                        'optional' => false,
                    ],
                    '$serializedSession' => [
                        'type' => 'string',
                        'description' => 'A string that represents the session in       serilized form.',
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