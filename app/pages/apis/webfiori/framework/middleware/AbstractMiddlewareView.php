<?php
namespace docGenerator\webfiori\framework\middleware;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AbstractMiddlewareView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An abstract class that can be used to implement custom middleware.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class AbstractMiddleware');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'AbstractMiddleware', '\webfiori\framework\middleware', 'An abstract class that can be used to implement custom middleware. Every middleware the developer write must be placed in the folder \'app/middleware\'   of the framework in order for the framework to auto-register the middleware.   If the middleware is placed in another place, then the developer must register   it manually using the method MiddlewareManager::register() before adding   the middleware to any route.'));
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
                        'description' => 'A unique name for the middleware. The name will be       used later to assign the middleware to specific routes.',
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
                'name' => 'addToGroup',
                'access-modifier' => 'public function',
                'summary' => 'Adds the middleware to specific group.',
                'description' => 'Adds the middleware to specific group. Group name can be used to apply multiple middlewares to specific       route.',
                'params' => [
                    '$groupName' => [
                        'type' => 'string',
                        'description' => 'The name of the group.',
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
                'name' => 'addToGroups',
                'access-modifier' => 'public function',
                'summary' => 'Adds the middleware to more than one group.',
                'description' => 'Adds the middleware to more than one group. ',
                'params' => [
                    '$groupsArr' => [
                        'type' => 'array',
                        'description' => 'An array that contains the mames of the groups.',
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
                'name' => 'after',
                'access-modifier' => 'public abstract function',
                'summary' => 'Perform an action after accessing application level and before sending       the request.',
                'description' => 'Perform an action after accessing application level and before sending       the request. This method can be used to add extra payload to the response or even       change it totally before sending back the response.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'afterSend',
                'access-modifier' => 'public abstract function',
                'summary' => 'Perform an action after sending the response and before terminating the       application.',
                'description' => 'Perform an action after sending the response and before terminating the       application. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'before',
                'access-modifier' => 'public abstract function',
                'summary' => 'Perform an action before accessing application level.',
                'description' => 'Perform an action before accessing application level. This method will get executed before routing happens. One use case of       this method is to use it to check if the user is authorized to access       the system or not. If he is not, then send back a redirect header that       takes the user to login screen or just send a 401 response code with       a message.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'compare',
                'access-modifier' => 'public function',
                'summary' => 'Compare the priority of the middleware with another one.',
                'description' => 'Compare the priority of the middleware with another one. The main aim of this method is to prioritize which middleware will be reached       first. First the method checks the priority of the middleware. If the       two have same priority, it will use the name of the middleware.',
                'params' => [
                    '$other' => [
                        'type' => 'AbstractMiddleware',
                        'description' => 'Another middleware to compare with.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getGroups',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds the names of the groups that the middleware       belongs to.',
                'description' => 'Returns an array that holds the names of the groups that the middleware       belongs to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that holds the names of the groups that the middleware       belongs to.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the middleware.',
                'description' => 'Returns the name of the middleware. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'the name of the middleware.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPriority',
                'access-modifier' => 'public function',
                'summary' => 'Returns the priority of the middleware.',
                'description' => 'Returns the priority of the middleware. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Priority of the middleware.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the middleware.',
                'description' => 'Sets the name of the middleware. The name of the middleware is used to assign it to a route. For this reason,       each middleware must have a unique name.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the middleware.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the name is set, the method will return true. If not       set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setPriority',
                'access-modifier' => 'public function',
                'summary' => 'Sets the priority of the middleware.',
                'description' => 'Sets the priority of the middleware. Priority of middleware is used to specify which middleware will be reached       first. The higher the priority, the sooner the middleware will be reached.       For example, a middleware with priority 100 will be reached before a       middleware with priority 99.',
                'params' => [
                    '$priority' => [
                        'type' => 'int',
                        'description' => 'Middleware priority.',
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