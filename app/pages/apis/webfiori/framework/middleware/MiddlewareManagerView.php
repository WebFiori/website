<?php
namespace docGenerator\webfiori\framework\middleware;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MiddlewareManagerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('This class is used to manage the operations which are related to middleware.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MiddlewareManager');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MiddlewareManager', '\webfiori\framework\middleware', 'This class is used to manage the operations which are related to middleware. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'getGroup',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a set of meddalewares that belongs to a specific group.',
                'description' => 'Returns a set of meddalewares that belongs to a specific group. ',
                'params' => [
                    '$groupName' => [
                        'type' => 'string',
                        'description' => 'The name of the group.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return a linked list with all       middleware in the group. If no group which has the given name exist, the       list will be empty.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMiddleware',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a registered middleware given its name.',
                'description' => 'Returns a registered middleware given its name. ',
                'params' => [
                    '$name' => [
                        'type' => 'strin',
                        'description' => 'The name of the middleware.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a middleware with the given name is       found, the method will return it. Other than that, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/middleware/AbstractMiddleware', 'AbstractMiddleware'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'register',
                'access-modifier' => 'public static function',
                'summary' => 'Register a new middleware.',
                'description' => 'Register a new middleware. ',
                'params' => [
                    '$middleware' => [
                        'type' => 'AbstractMiddleware',
                        'description' => 'The middleware that will be registered.',
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
                'name' => 'remove',
                'access-modifier' => 'public static function',
                'summary' => 'Removes a middleware given its name.',
                'description' => 'Removes a middleware given its name. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the middleware.',
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