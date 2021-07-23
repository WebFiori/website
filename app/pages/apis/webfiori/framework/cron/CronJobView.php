<?php
namespace docGenerator\webfiori\framework\cron;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CronJobView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a cron job.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CronJob');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CronJob', '\webfiori\framework\cron', 'A class that represents a cron job. This class used to provide basic implementation for the class \'AbstractJob\'.   It is recommended to not use this class in creating custom jobs. The recommended   option is to extend the class \'AbstractJob\'.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$when' => [
                        'type' => 'string',
                        'description' => 'A cron expression. An exception will be thrown if       the given expression is invalid. Default is \'    \' which means run       the job every minute.',
                        'optional' => false,
                    ],
                    '$autoReg' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the job will be scheduled without       having to add it to jobs queue. Default is false.',
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
                'name' => 'afterExec',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'execute',
                'access-modifier' => 'public function',
                'summary' => 'Execute the job.',
                'description' => 'Execute the job. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The return value of the method will depend on the       closure which is set to execute. If no closure is set, the method will       return null. If it is set, the return value of the closure will be returned       by this method.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOnExecution',
                'access-modifier' => 'public function',
                'summary' => 'Returns a callable which represents the code that will be       executed when its time to run the job.',
                'description' => 'Returns a callable which represents the code that will be       executed when its time to run the job. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A callable which represents the code that will be       executed when its time to run the job.',
                    'return-types' => [
                        'Callable',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'onFail',
                'access-modifier' => 'public function',
                'summary' => 'Run the closure which is set to execute if the job is failed.',
                'description' => 'Run the closure which is set to execute if the job is failed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'onSuccess',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setOnExecution',
                'access-modifier' => 'public function',
                'summary' => 'Sets the event that will be fired in case it is time to execute the job.',
                'description' => 'Sets the event that will be fired in case it is time to execute the job. ',
                'params' => [
                    '$func' => [
                        'type' => 'callable',
                        'description' => 'The function that will be executed if it is the       time to execute the job. This function can have a return value If the function       returned null or true, then it means the job was successfully executed.       If it returns false, this means the job did not execute successfully.',
                        'optional' => false,
                    ],
                    '$funcParams' => [
                        'type' => 'array',
                        'description' => 'An array which can hold some parameters that       can be passed to the function.',
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
                'name' => 'setOnFailure',
                'access-modifier' => 'public function',
                'summary' => 'Sets a function to call in case the job function has returned false.',
                'description' => 'Sets a function to call in case the job function has returned false. ',
                'params' => [
                    '$func' => [
                        'type' => 'callable',
                        'description' => 'The function that will be executed.',
                        'optional' => false,
                    ],
                    '$params' => [
                        'type' => 'array',
                        'description' => 'An array of parameters that will be passed to the       function.',
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