<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CLIView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which adds basic support for running the framework through   command line interface (CLI).');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CLI');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CLI', '\webfiori\framework\cli', 'A class which adds basic support for running the framework through   command line interface (CLI). In addition to adding support for CLI, this class is used to register any   custom commands which are created by developers. Also, it initialize some of   the attributes of the framework in order to use it in CLI environment.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'displayErr',
                'access-modifier' => 'public static function',
                'summary' => 'Display PHP error information in CLI.',
                'description' => 'Display PHP error information in CLI. ',
                'params' => [
                    '$errno' => [
                        'type' => 'int',
                        'description' => 'Error number',
                        'optional' => false,
                    ],
                    '$errstr' => [
                        'type' => 'string',
                        'description' => 'The error as string.',
                        'optional' => false,
                    ],
                    '$errfile' => [
                        'type' => 'string',
                        'description' => 'The file at which the error has accrued in.',
                        'optional' => false,
                    ],
                    '$errline' => [
                        'type' => 'int',
                        'description' => 'Line number at which the error has accrued in.',
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
                'name' => 'displayException',
                'access-modifier' => 'public static function',
                'summary' => 'Display exception information in terminal.',
                'description' => 'Display exception information in terminal. ',
                'params' => [
                    '$ex' => [
                        'type' => 'Exception',
                        'description' => 'An exception which is thrown any time during       program execution.',
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
                'name' => 'getActiveCommand',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the command which is being executed.',
                'description' => 'Returns the command which is being executed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If a command is requested and currently in execute       stage, the method will return it as an object of type \'CLICommand\'. If       no command is active, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/cli/CLICommand', 'CLICommand'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRegisteredCommands',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an associative array of registered commands.',
                'description' => 'Returns an associative array of registered commands. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an associative array. The keys of       the array are the names of the commands and the value of the key is       an object of type \'CLICommand\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'init',
                'access-modifier' => 'public static function',
                'summary' => 'Initialize CLI.',
                'description' => 'Initialize CLI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isCLI',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if the framework is running through command line interface (CLI) or       through a web server.',
                'description' => 'Checks if the framework is running through command line interface (CLI) or       through a web server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the framework is running through a command line,       the method will return true. False if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'register',
                'access-modifier' => 'public static function',
                'summary' => 'Register new command.',
                'description' => 'Register new command. ',
                'params' => [
                    '$cliCommand' => [
                        'type' => 'CLICommand',
                        'description' => 'The command that will be registered.',
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
                'name' => 'registerCommands',
                'access-modifier' => 'public static function',
                'summary' => 'Register CLI commands.',
                'description' => 'Register CLI commands. This method will register the commands which are bundled with the       framework first. Once it is finished, it will register any commands which       are created by the developer using the method InitCliCommands::init(). This       method should be only used during initialization stage. Calling it again       will have no effect.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'runCLI',
                'access-modifier' => 'public static function',
                'summary' => 'Run the provided CLI command.',
                'description' => 'Run the provided CLI command. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the CLI is completed without any errors, the method will       return 0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
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