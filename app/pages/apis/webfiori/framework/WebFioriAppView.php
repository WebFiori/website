<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class WebFioriAppView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('The instance of this class is used to control basic settings of   the framework.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class WebFioriApp');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'WebFioriApp', '\webfiori\framework', 'The instance of this class is used to control basic settings of   the framework. Also, it is the entry point of any request.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'autoRegister',
                'access-modifier' => 'public static function',
                'summary' => 'Register CLI commands or cron jobs.',
                'description' => 'Register CLI commands or cron jobs. ',
                'params' => [
                    '$folder' => [
                        'type' => 'string',
                        'description' => 'The name of the folder that contains the jobs or       commands. It must be a folder inside \'app\' folder or the folder which is defined       by the constant \'APP_DIR_NAME\'.',
                        'optional' => false,
                    ],
                    '$regCallback' => [
                        'type' => 'Closure',
                        'description' => 'A callback which is used to register the       classes of the folder.',
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
                'name' => 'getAppConfig',
                'access-modifier' => 'public static function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'Config
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAutoloader',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a reference to an instance of \'AutoLoader\'.',
                'description' => 'Returns a reference to an instance of \'AutoLoader\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A reference to an instance of \'AutoLoader\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/AutoLoader', 'AutoLoader'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClassStatus',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the status of the class.',
                'description' => 'Returns the status of the class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The returned value will be one of 3 values: \'NONE\' if       the constructor of the class is not called. \'INITIALIZING\' if the execution       is happening inside the constructor of the class. \'INITIALIZED\' once the       code in the constructor is executed.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSysController',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a reference to an instance of \'ConfigController\'.',
                'description' => 'Returns a reference to an instance of \'ConfigController\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A reference to an instance of \'ConfigController\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/ConfigController', 'ConfigController'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setConfig',
                'access-modifier' => 'public static function',
                'summary' => 'Sets the configuration object that will be used to configure some of the       framework settings.',
                'description' => 'Sets the configuration object that will be used to configure some of the       framework settings. ',
                'params' => [
                    '$conf' => [
                        'type' => 'Config',
                        'description' => '',
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
                'name' => 'start',
                'access-modifier' => 'public static function',
                'summary' => 'Start your WebFiori application.',
                'description' => 'Start your WebFiori application. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An instance of the class.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/WebFioriApp', 'WebFioriApp'),
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