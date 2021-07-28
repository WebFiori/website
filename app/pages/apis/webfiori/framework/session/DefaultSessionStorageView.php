<?php
namespace docGenerator\webfiori\framework\session;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class DefaultSessionStorageView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('The default sessions storage engine.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class DefaultSessionStorage');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'DefaultSessionStorage', '\webfiori\framework\session', 'The default sessions storage engine. This storage engine will store session state as a file in the folder   \'app/storage/sessions\'. The name of the file that contains session state   will be the ID of the session.'));
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
                'name' => 'gc',
                'access-modifier' => 'public function',
                'summary' => 'Removes all inactive sessions.',
                'description' => 'Removes all inactive sessions. This method will check if the constant \'SESSION_GC\' is exist and its value       is valid. If exist and valid, it will be used as reference for removing       old sessions. If it does not exist, the method will remove any inactive       session which is older than 30 days.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isStorageDirExist',
                'access-modifier' => 'public function',
                'summary' => 'Checks if sessions storage location is exist and writable.',
                'description' => 'Checks if sessions storage location is exist and writable. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If sessions storage location exist and is writable,       the method will return true.',
                    'return-types' => [
                        'bolean',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'read',
                'access-modifier' => 'public function',
                'summary' => 'Reads a session from session file.',
                'description' => 'Reads a session from session file. ',
                'params' => [
                    '$sessionId' => [
                        'type' => 'string',
                        'description' => 'The ID of the session.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the method successfully accessed session state,       the method will return a string that represents the session. Other than that,       the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'remove',
                'access-modifier' => 'public function',
                'summary' => 'Removes session file.',
                'description' => 'Removes session file. ',
                'params' => [
                    '$sessionId' => [
                        'type' => 'string',
                        'description' => 'The ID of the session.',
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
                'summary' => 'Stores session state to a file.',
                'description' => 'Stores session state to a file. ',
                'params' => [
                    '$sessionId' => [
                        'type' => 'Session',
                        'description' => 'The session that will be stored.',
                        'optional' => false,
                    ],
                    '$session' => [
                        'type' => 'string',
                        'description' => 'The session that will be stored.',
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