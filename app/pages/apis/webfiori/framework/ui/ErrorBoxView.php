<?php
namespace docGenerator\webfiori\framework\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ErrorBoxView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A fixed box which is used to show PHP warnings and notices.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ErrorBox');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ErrorBox', '\webfiori\framework\ui', 'A fixed box which is used to show PHP warnings and notices. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
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
                'name' => 'setDescription',
                'access-modifier' => 'public function',
                'summary' => 'Sets error description based on error number.',
                'description' => 'Sets error description based on error number. ',
                'params' => [
                    '$errno' => [
                        'type' => 'int',
                        'description' => 'A PHP error number such as E_ERROR.',
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
                'name' => 'setError',
                'access-modifier' => 'public function',
                'summary' => 'Sets error based on error number.',
                'description' => 'Sets error based on error number. ',
                'params' => [
                    '$errno' => [
                        'type' => 'int',
                        'description' => 'A PHP error number such as E_ERROR.',
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
                'name' => 'setFile',
                'access-modifier' => 'public function',
                'summary' => 'Sets the file that caused the error.',
                'description' => 'Sets the file that caused the error. Note that if the constant \'WF_VERBOSE\' is not defined or set to \'false\',       the method will have no effect.',
                'params' => [
                    '$file' => [
                        'type' => 'string',
                        'description' => 'The absolute path of the file that has the error.',
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
                'name' => 'setLine',
                'access-modifier' => 'public function',
                'summary' => 'Sets error line number.',
                'description' => 'Sets error line number. Note that if the constant \'WF_VERBOSE\' is not defined or set to \'false\',       the method will have no effect.',
                'params' => [
                    '$line' => [
                        'type' => 'string',
                        'description' => 'The line that caused the error.',
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
                'name' => 'setMessage',
                'access-modifier' => 'public function',
                'summary' => 'Sets error message.',
                'description' => 'Sets error message. ',
                'params' => [
                    '$msg' => [
                        'type' => 'string',
                        'description' => 'The message that will be displayed.',
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
                'name' => 'setTrace',
                'access-modifier' => 'public function',
                'summary' => 'Sets the trace of the error.',
                'description' => 'Sets the trace of the error. This method will get the trace using the function debug_backtrace().',
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