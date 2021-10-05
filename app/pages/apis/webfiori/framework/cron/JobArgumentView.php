<?php
namespace docGenerator\webfiori\framework\cron;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class JobArgumentView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents execution argument of a job.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class JobArgument');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'JobArgument', '\webfiori\framework\cron', 'A class that represents execution argument of a job. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the argument. It will be considered invalid       if it contains one of the following characters: \'=\', \'&\', \'#\' and \'?\'.',
                        'optional' => false,
                    ],
                    '$desc' => [
                        'type' => 'string',
                        'description' => 'A string that describes how the argument will affect       job execution. It must be non-empty string in order to be set.',
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
                'name' => 'getDescription',
                'access-modifier' => 'public function',
                'summary' => 'Returns argument description.',
                'description' => 'Returns argument description. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that describes how the argument will affect job       execution. Default return value is \'NO DESCRIPTION\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the argument.',
                'description' => 'Returns the name of the argument. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the argument.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of job argument.',
                'description' => 'Returns the value of job argument. The method will search for the value of the argument in the array $_POST.       Note that the index that will be checked is the name of the argument.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the value of the argument is set, it will be returned       as string. Other than that, null is returned.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDescription',
                'access-modifier' => 'public function',
                'summary' => 'Sets a description for the argument.',
                'description' => 'Sets a description for the argument. ',
                'params' => [
                    '$desc' => [
                        'type' => 'string',
                        'description' => 'A string that describes how the argument will affect       job execution. It must be non-empty string in order to be set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the description is set, the method will return true.       false if not set.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the argument.',
                'description' => 'Sets the name of the argument. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the argument. It will be considered invalid       if it contains one of the following characters: \'=\', \'&\', \'#\' and \'?\'.',
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
                'summary' => 'Returns an object that represents the argument in JSON.',
                'description' => 'Returns an object that represents the argument in JSON. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object that holds the following JSON attributes:      <ul>      <li>name</li>      <li>description</li>      </ul>',
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