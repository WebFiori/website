<?php
namespace docGenerator\webfiori\framework\router;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class RouterUriView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that is used to split URIs and get their parameters.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class RouterUri');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'RouterUri', '\webfiori\framework\router', 'A class that is used to split URIs and get their parameters. The main aim of this class is to extract URI parameters including:  <ul>  <li>Host</li>  <li>Authority</li>  <li>Fragment (if any)</li>  <li>Path</li>  <li>Port (if any)</li>  <li>Query string (if any)</li>  <li>Scheme</li>  </ul>  The class is also used for routing.  For more information on URI structure, visit <a target="_blank" href="https://en.wikipedia.org/wiki/Uniform_Resource_Identifier#Examples">Wikipedia</a>.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance.',
                'description' => 'Creates new instance. ',
                'params' => [
                    '$requestedUri' => [
                        'type' => 'string',
                        'description' => 'The URI such as \'https://www3.programmingacademia.com:80/{some-var}/hell/{other-var}/?do=dnt&y=#xyz\'',
                        'optional' => false,
                    ],
                    '$routeTo' => [
                        'type' => 'string|Closure',
                        'description' => 'The file that the route will take the user to ar a closure.',
                        'optional' => false,
                    ],
                    '$caseSensitive' => [
                        'type' => 'boolean',
                        'description' => 'A boolean. If the URI is case sensitive,       then this value must be set to true. False if not. Default is true.',
                        'optional' => false,
                    ],
                    '$closureParams' => [
                        'type' => 'array',
                        'description' => 'If the closure needs to use parameters,       it is possible to supply them using this array.',
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
                'name' => 'addLanguage',
                'access-modifier' => 'public function',
                'summary' => 'Adds a language to the set of languages at which the resource that the URI       points to.',
                'description' => 'Adds a language to the set of languages at which the resource that the URI       points to. ',
                'params' => [
                    '$langCode' => [
                        'type' => 'string',
                        'description' => 'A two characters string such as \'AR\' that represents       language code.',
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
                'name' => 'addMiddleware',
                'access-modifier' => 'public function',
                'summary' => 'Adds the URI to middleware or to middleware group.',
                'description' => 'Adds the URI to middleware or to middleware group. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the middleware or the group.',
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
                'name' => 'getAction',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the action that will be called in the controller.',
                'description' => 'Returns the name of the action that will be called in the controller. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the controller method.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClassName',
                'access-modifier' => 'public function',
                'summary' => 'Returns class name based on the file which the route will point to.',
                'description' => 'Returns class name based on the file which the route will point to. The method will try to extract class name from the file which the       route is pointing to.      This only applies to routes which points to PHP classes only.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Class name taken from file name. If route type is not       API o not view, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClosureParams',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the variables which will be passed to       the closure.',
                'description' => 'Returns an array that contains the variables which will be passed to       the closure. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'array
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLanguages',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains a set of languages at which the resource that the URI       points to can have.',
                'description' => 'Returns an array that contains a set of languages at which the resource that the URI       points to can have. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains language codes.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMiddlewar',
                'access-modifier' => 'public function',
                'summary' => 'Returns a list that holds objects for the middleware.',
                'description' => 'Returns a list that holds objects for the middleware. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'LinkedList
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRequestedUri',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains requested URI information.',
                'description' => 'Returns an array that contains requested URI information. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an associative array that       contains the components of the URI. The array will have the       following indices:      <ul>      <li><b>uri</b>: The original URI.</li>      <li><b>port</b>: The port number taken from the authority part.</li>      <li><b>host</b>: Will be always empty string.</li>      <li><b>authority</b>: Authority part of the URI.</li>      <li><b>scheme</b>: Scheme part of the URI (e.g. http or https).</li>      <li><b>query-string</b>: Query string if the URI has any.</li>      <li><b>fragment</b>: Any string that comes after the character \'#\' in the URI.</li>      <li><b>full-path</b>: A string which is similar to \'/path/to/resource\' that represents path part of       a URL.</li>      <li><b>path</b>: An array that contains the names of path directories</li>      <li><b>query-string-vars</b>: An array that contains query string parameter and values.</li>      <li><b>uri-vars</b>: An array that contains URI path variable and values.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRouteTo',
                'access-modifier' => 'public function',
                'summary' => 'Returns the location where the URI will route to.',
                'description' => 'Returns the location where the URI will route to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Usually, the route can be either a callable       or a path to a file. The file can be of any type.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.callable.php', 'callable'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSitemapNodes',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type \'HTMLNode\' that contains URI information which       can be used to construct XML sitemap.',
                'description' => 'Returns an object of type \'HTMLNode\' that contains URI information which       can be used to construct XML sitemap. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an array that contains objects       of type \'HTMLNode\' that contains URI information which       can be used to construct XML sitemap.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getType',
                'access-modifier' => 'public function',
                'summary' => 'Returns the type of element that the URI will route to.',
                'description' => 'Returns the type of element that the URI will route to. The type of the element can be 1 of 4 values:      <ul>      <li>Router::API_ROUTE</li>      <li>Router::VIEW_ROUTE</li>      <li>Router::CLOSURE_ROUTE</li>      <li>Router::CUSTOMIZED</li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The type of element that the URI will route to. Default       return value is Router::CUSTOMIZED.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasWWW',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the URI has WWW in the host part or not.',
                'description' => 'Checks if the URI has WWW in the host part or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the URI has WWW in the host, the method will return       true. Other than that, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isDynamic',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the resource that the URI is pointing to is dynamic.',
                'description' => 'Checks if the resource that the URI is pointing to is dynamic. A resource is considered as dynamic if it is a PHP code or a PHP file.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the resource is dynamic, the method will return true.       other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isInSiteMap',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the URI will be included in auto-generated site map or not.',
                'description' => 'Checks if the URI will be included in auto-generated site map or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the URI will be included, the method will return       true. Default is false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'printUri',
                'access-modifier' => 'public function',
                'summary' => 'Print the details of the generated URI.',
                'description' => 'Print the details of the generated URI. This method will use the method \'Util::print_r()\' to print the array       that contains URI details.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAction',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the action that will be called in the controller.',
                'description' => 'Sets the name of the action that will be called in the controller. ',
                'params' => [
                    '$action' => [
                        'type' => 'string',
                        'description' => 'The name of the controller method.',
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
                'name' => 'setClosureParams',
                'access-modifier' => 'public function',
                'summary' => 'Sets the array of closure parameters.',
                'description' => 'Sets the array of closure parameters. ',
                'params' => [
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An array that contains all the values that will be       passed to the closure.',
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
                'name' => 'setIsInSiteMap',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'$incInSiteMap\'.',
                'description' => 'Sets the value of the property \'$incInSiteMap\'. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'If true is given, the URI will be included       in site map.',
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
                'name' => 'setRoute',
                'access-modifier' => 'public function',
                'summary' => 'Sets the route which the URI will take to.',
                'description' => 'Sets the route which the URI will take to. ',
                'params' => [
                    '$routeTo' => [
                        'type' => 'string|Closure',
                        'description' => 'Usually, the route can be either a       file or it can be a callable. The file can be of any type.',
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
                'name' => 'setType',
                'access-modifier' => 'public function',
                'summary' => 'Sets the type of element that the URI will route to.',
                'description' => 'Sets the type of element that the URI will route to. The type of the element can be 1 of 4 values:      <ul>      <li>Router::API_ROUTE</li>      <li>Router::VIEW_ROUTE</li>      <li>Router::CLOSURE_ROUTE</li>      <li>Router::CUSTOMIZED</li>      </ul>      If any thing else is given, it won\'t update.',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of element that the URI will route to.',
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