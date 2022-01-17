<?php
namespace docGenerator\webfiori\framework\router;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class RouterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('The basic class that is used to route user requests to the correct   location.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Router');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Router', '\webfiori\framework\router', 'The basic class that is used to route user requests to the correct   location. The developer can use this class to create a readable URIs to system resources.   In general, there are 4 types of routes:  <ul>  <li>View route.</li>  <li>API route.</li>  <li>Closure route.</li>  <li>Custom route.</li>  </ul>  <p>  A view route is a route that points to a file which exist inside the directory   \'app/pages\'. They are simply web pages (HTML or PHP).  </p>  <p>An API route is a route that points to a file which exist inside the   directory \'app/apis\'. This folder usually contains PHP files which extends   the class \'ExtendedWebServicesManager\' or the class \'WebServicesManager\'.  </p>  <p>  A closure route is simply a function that will be executed when the   user visits the URL.  </p>  <p>  A customized route is a route that can point to any file which exist inside   the framework scope. For example, The developer might create a folder   \'my-files\' and inside it, he might add \'my-view.html\'. Then he can add a route   to it as follows:  <pre>  Router::addRoute([<br/>  &nbsp;&nbsp;&nbsp;&nbsp;\'path\'=>\'/custom-route\',<br/>  &nbsp;&nbsp;&nbsp;&nbsp;\'route-to\'=>\'/my-files/my-view.html\'<br/>  ]);  </pre>   </p>  <p>  In addition to creating routes using files, it is possible to have routes which   points to classes as follows:  <pre>  Router::addRoute([<br/>  &nbsp;&nbsp;&nbsp;&nbsp;\'path\'=>\'/custom-route\',<br/>  &nbsp;&nbsp;&nbsp;&nbsp;\'route-to\'=> MyClass::class<br/>  ]);  </pre>   </p>'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'API_ROUTE',
            'A constant that represents API route.',
            'A constant that represents API route. It is simply the root directory where APIs       should be created.',
            ),
            new AttributeDef(
            'const',
            '',
            'CLOSURE_ROUTE',
            'A constant that represents closure route.',
            'A constant that represents closure route. The value of the       constant is \'func\'.',
            ),
            new AttributeDef(
            'const',
            '',
            'CUSTOMIZED',
            'A constant for custom directory route.',
            'A constant for custom directory route. ',
            ),
            new AttributeDef(
            'const',
            '',
            'VIEW_ROUTE',
            'A constant that represents view route.',
            'A constant that represents view route. It is simply the root directory where web       pages should be created.',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'addRoute',
                'access-modifier' => 'public static function',
                'summary' => 'Adds new route to a file inside the root folder.',
                'description' => 'Adds new route to a file inside the root folder. ',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An associative array of options. Available options       are:       <ul>      <li><b>path</b>: The path part of the URI. For example, if the       requested URI is \'http://www.example.com/user/ibrahim\', the path       part of the URI is \'/user/ibrahim\'. It is possible to include variables       in the path. To include a variable in the path, its name must be enclosed       between {}. The value of the variable will be stored in either the array       $_GET or $_POST after the requested URI is resolved. If we use the same       example above to get any user profile, We would add the following as       a path: \'user/{username}\'. In this case, username will be available in       $_GET[\'username\']. Note that its possible to get the value of the       variable using the method <b>Router::<a href="#getVarValue">getVarValue()</a></b></li>      <li><b>route-to</b>: The path to the file that the route will point to.       It can be any file in the scope of the variable ROOT_DIR.</li>      <li><b>as-api</b>: If this parameter is set to true, the route will be       treated as if it was an API route. This means that the constant \'API_ROUTE\'       will be initiated when a request is made to the route. Note that if the PHP file that       the route is pointing to represents an API, no need to add this option. Default is false.</li>      <li><b>case-sensitive</b>: Make the URL case sensitive or not.       If this one is set to false, then if a request is made to the URL \'https://example.com/one/two\',      It will be the same as requesting the URL \'https://example.com/OnE/tWO\'. Default       is true.</li>      <li><b>languages</b>: An indexed array that contains the languages at       which the resource can have. Each language is represented as two       characters such as \'AR\'.</li>      <li><b>vars-values</b>: An optional associative array which contains sub       indexed arrays that contains possible values for URI vars. This one is       used when building the sitemap.</li>      <li><b>middleware</b>: This can be a name of a middleware to assign to the       route. This also can be a middleware group. In addition to that, this can       be an array that holds middleware names or middleware groups names.</li>       <li><b>in-sitemap</b>: If set to true, the given route will be added to       the basic site map which can be generated by the router class.</li>      <li><b>methods</b>: An optional array that can have a set of       allowed request methods for fetching the resource. This can be       also a single string such as \'GET\' or \'POST\'.</li>      <li><b>action</b>: If the class that the route is pointing to       represents a controller, this index can have the value of the       action that will be performed (the name of the class method).</li>      <li><b>routes</b> This option is used to have sub-routes in the same path. This       option is used to group multiple routes which share initial part of a path.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the route was created.       If a route for the given path was already created, the method will return       false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'api',
                'access-modifier' => 'public static function',
                'summary' => 'Adds new route to a web services set.',
                'description' => 'Adds new route to a web services set. Note that the route which created using this method will be added to       \'global\' and \'api\' middleware groups.',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains route       options. Available options are:      <ul>      <li><b>path</b>: The path part of the URI. For example, if the       requested URI is \'http://www.example.com/user/ibrahim\', the path       part of the URI is \'/user/ibrahim\'. It is possible to include variables       in the path. To include a variable in the path, its name must be enclosed       between {}. The value of the variable will be stored in either the array       $_GET or $_POST after the requested URI is resolved. If we use the same       example above to get any user profile, We would add the following as       a path: \'user/{username}\'. In this case, username will be available in       $_GET[\'username\']. Note that its possible to get the value of the       variable using the method <b>Router::<a href="#getVarValue">getVarValue()</a></b>.       Note that for any route that points to a web services set, a variable which       has the name \'service-name\' must be added.</li>      <li><b>route-to</b>: The path to the API file. The root folder for       all APIs is \'/apis\'. If the API name is \'get-user-profile.php\', then the       value of this parameter must be \'/get-user-profile.php\'. If the API is in a       sub-directory inside the APIs directory, then the name of the       directory must be included.</li>      <li><b>case-sensitive</b>: Make the URL case sensitive or not.       If this one is set to false, then if a request is made to the URL \'https://example.com/one/two\',      It will be the same as requesting the URL \'https://example.com/OnE/tWO\'. Default       is true.</li>      <li><b>vars-values</b>: An optional associative array which contains sub       indexed arrays that contains possible values for URI vars. This one is       used when building the sitemap.</li>      <li><b>middleware</b>: This can be a name of a middleware to assign to the       route. This also can be a middleware group. In addition to that, this can       be an array that holds middleware names or middleware groups names.</li>      <li><b>methods</b>: An optional array that can have a set of       allowed request methods for fetching the resource. This can be       also a single string such as \'GET\' or \'POST\'.</li>      <li><b>routes</b> This option is used to have sub-routes in the same path. This       option is used to group multiple routes which share initial part of a path.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the route was created.       If a route for the given path was already created, the method will return       false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'base',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the base URI which is used to create routes.',
                'description' => 'Returns the base URI which is used to create routes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The base URL which is used to create routes. The returned       value is based on one of two values. Either the value that is returned       by the method \'Util::getBaseURL()\' or the method \'SiteConfig::getBaseURL()\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'closure',
                'access-modifier' => 'public static function',
                'summary' => 'Adds new closure route.',
                'description' => 'Adds new closure route. Note that the route which created using this method will be added to       \'global\' and \'closure\' middleware groups.',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains route       options. Available options are:      <ul>      <li><b>path</b>: The path part of the URI. For example, if the       requested URI is \'http://www.example.com/user/ibrahim\', the path       part of the URI is \'/user/ibrahim\'. It is possible to include variables       in the path. To include a variable in the path, its name must be enclosed       between {}. The value of the variable will be stored in either the array       $_GET or $_POST after the requested URI is resolved. If we use the same       example above to get any user profile, We would add the following as       a path: \'user/{username}\'. In this case, username will be available in       $_GET[\'username\']. Note that its possible to get the value of the       variable using the method <b>Router::<a href="#getVarValue">getVarValue()</a></b></li>      <li><b>route-to</b>: A closure (A PHP function). </li>      <li><b>closure-params</b>: An array that contains values which       can be passed to the closure.</li>      <li><b>as-api</b>: If this parameter is set to true, the route will be       treated as if it was an API route. This means that the constant \'API_ROUTE\'       will be initiated when a request is made to the route. Default is false.</li>      <li><b>case-sensitive</b>: Make the URL case sensitive or not.       If this one is set to false, then if a request is made to the URL \'https://example.com/one/two\',      It will be the same as requesting the URL \'https://example.com/OnE/tWO\'. Default       is true.</li>      <li><b>languages</b>: An indexed array that contains the languages at       which the resource can have. Each language is represented as two       characters such as \'AR\'.</li>      <li><b>vars-values</b>: An optional associative array which contains sub       indexed arrays that contains possible values for URI vars. This one is       used when building the sitemap.</li>            <li><b>middleware</b>: This can be a name of a middleware to assign to the       route. This also can be a middleware group. In addition to that, this can       be an array that holds middleware names or middleware groups names.</li>             <li><b>in-sitemap</b>: If set to true, the given route will be added to       the basic site map which can be generated by the router class.</li>      <li><b>methods</b>: An optional array that can have a set of       allowed request methods for fetching the resource. This can be       also a single string such as \'GET\' or \'POST\'.</li>      <li><b>routes</b> This option is used to have sub-routes in the same path. This       option is used to group multiple routes which share initial part of a path.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the route was created.       If a route for the given path was already created, the method will return       false. Also, if <b>\'route-to\'</b> is not a function, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBase',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the value of the base URI which is appended to the path.',
                'description' => 'Returns the value of the base URI which is appended to the path. This method is similar to calling the method <b>Router::<a href="#base">base()</a></b>.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'string
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRouteUri',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an object of type \'RouterUri\' which contains route information.',
                'description' => 'Returns an object of type \'RouterUri\' which contains route information. When the method Router::route() is called and a route is found, an       object of type \'RouterUri\' is created which has route information.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object which has route information. If the       method \'Router::route()\' is not yet called or no route was found,       the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/router/RouterUri', 'RouterUri'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUriObj',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an object of type \'RouterUri\' that represents route URI.',
                'description' => 'Returns an object of type \'RouterUri\' that represents route URI. ',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'The path part of the URI.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a route was found which has the given path,       an object of type \'RouterUri\' is returned. If no route is found, null       is returned.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/router/RouterUri', 'RouterUri'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUriObjByURL',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an object of type \'RouterUri\' which contains URL route information.',
                'description' => 'Returns an object of type \'RouterUri\' which contains URL route information. ',
                'params' => [
                    '$url' => [
                        'type' => 'string',
                        'description' => 'A string that represents a URL (such as \'https://example.com/my-resource\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a resource was found which has the given route, an       object of type RouterUri is returned. Other than that, null is returned. Note       that if the URI is invalid, the method will return null. Also, if the library       \'http\' is not loaded, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/router/RouterUri', 'RouterUri'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getVarValue',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the value of a variable which exist in the path part of the       URI.',
                'description' => 'Returns the value of a variable which exist in the path part of the       URI. ',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable. Note that it must       not include braces.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the value of the       variable if it was set. If it is not set or routing is still not yet       happend, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasRoute',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if a given path has a route or not.',
                'description' => 'Checks if a given path has a route or not. ',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'The path which will be checked (such as \'/path1/path2\')',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the given path       has a route.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'incSiteMapRoute',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a route to a basic xml site map.',
                'description' => 'Adds a route to a basic xml site map. If this method is called, a route in the form \'http://example.com/sitemam.xml\'        and in the form \'http://example.com/sitemam\' will be created.       The method will check all created routes objects and check if they       should be included in the site map. Note that if a URI has variables, it       will be not included unless possible values are given for the variable.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'notFound',
                'access-modifier' => 'public static function',
                'summary' => 'Call the closure which was set if a route is not found.',
                'description' => 'Call the closure which was set if a route is not found. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'page',
                'access-modifier' => 'public static function',
                'summary' => 'Adds new route to a web page.',
                'description' => 'Adds new route to a web page. Note that the route which created using this method will be added to       \'global\' and \'web\' middleware groups.',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains route       options. Available options are:      <ul>      <li><b>path</b>: The path part of the URI. For example, if the       requested URI is \'http://www.example.com/user/ibrahim\', the path       part of the URI is \'/user/ibrahim\'. It is possible to include variables       in the path. To include a variable in the path, its name must be enclosed       between {}. The value of the variable will be stored in either the array       $_GET or $_POST after the requested URI is resolved. If we use the same       example above to get any user profile, We would add the following as       a path: \'user/{username}\'. In this case, username will be available in       $_GET[\'username\']. </li>      <li><b>route-to</b>: The path to the view file. The root folder for       all views is \'/pages\'. If the view name is \'view-user.php\', then the       value of this parameter must be \'/view-user.php\'. If the view is in a       sub-directory inside the views directory, then the name of the       directory must be included.</li>      <li><b>case-sensitive</b>: Make the URL case sensitive or not.       If this one is set to false, then if a request is made to the URL \'https://example.com/one/two\',      It will be the same as requesting the URL \'https://example.com/OnE/tWO\'. Default       is true.</li>      <li><b>languages</b>: An indexed array that contains the languages at       which the resource can have. Each language is represented as two       characters such as \'AR\'.</li>      <li><b>vars-values</b>: An optional associative array which contains sub       indexed arrays that contains possible values for URI vars. This one is       used when building the sitemap.</li>      <li><b>middleware</b>: This can be a name of a middleware to assign to the       route. This also can be a middleware group. In addition to that, this can       be an array that holds middleware names or middleware groups names.</li>       <li><b>in-sitemap</b>: If set to true, the given route will be added to       the basic site map which can be generated by the router class.</li>      <li><b>methods</b>: An optional array that can have a set of       allowed request methods for fetching the resource. This can be       also a single string such as \'GET\' or \'POST\'.</li>      <li><b>routes</b> This option is used to have sub-routes in the same path. This       option is used to group multiple routes which share initial part of a path.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the route was created.       If a route for the given path was already created, the method will return       false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'printRoutes',
                'access-modifier' => 'public static function',
                'summary' => 'Display all routes details.',
                'description' => 'Display all routes details. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'redirect',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a redirect route.',
                'description' => 'Adds a redirect route. ',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'The path at which when the user visits will be redirected.',
                        'optional' => false,
                    ],
                    '$to' => [
                        'type' => 'string',
                        'description' => 'A path or a URL at which the user will be sent to.',
                        'optional' => false,
                    ],
                    '$code' => [
                        'type' => 'int',
                        'description' => 'HTTP redirect code. Can have one of the following values:      301, 302, 303, 307 and 308. Default is 301 (Permanent redirect).',
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
                'name' => 'removeAll',
                'access-modifier' => 'public static function',
                'summary' => 'Remove all routes which has been added to the array of routes.',
                'description' => 'Remove all routes which has been added to the array of routes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeRoute',
                'access-modifier' => 'public static function',
                'summary' => 'Removes a route given its path.',
                'description' => 'Removes a route given its path. ',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'The path part of route URI.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the route is removed, the method will return       true. If not, The method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'route',
                'access-modifier' => 'public static function',
                'summary' => 'Redirect a URI to its route.',
                'description' => 'Redirect a URI to its route. ',
                'params' => [
                    '$uri' => [
                        'type' => 'string',
                        'description' => 'The URI.',
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
                'name' => 'routes',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an associative array of all available routes.',
                'description' => 'Returns an associative array of all available routes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array of all available routes. The       keys will be requested URIs and the values are the routes.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'routesAsRouterUri',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an associative array that contains all routes.',
                'description' => 'Returns an associative array that contains all routes. The returned array will have two indices, \'static\' and \'variable\'. The \'static\'       index will contain routes to resources at which they don\'t contain variables in       their path part. Each index of the two will have another sub associative array.      The indices of each sub array ill be URLs that represents the route and       the value at each index will be an object of type \'RouterUri\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains all routes.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'routesCount',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of routes at which the router has.',
                'description' => 'Returns the number of routes at which the router has. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of routes.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setOnNotFound',
                'access-modifier' => 'public static function',
                'summary' => 'Sets a callback to call in case a given rout is not found.',
                'description' => 'Sets a callback to call in case a given rout is not found. ',
                'params' => [
                    '$func' => [
                        'type' => 'callable',
                        'description' => 'The function which will be called if       the rout is not found.',
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
                'name' => 'uriObj',
                'access-modifier' => 'public static function',
                'summary' => 'Adds an object of type \'RouterUri\' as new route.',
                'description' => 'Adds an object of type \'RouterUri\' as new route. ',
                'params' => [
                    '$routerUri' => [
                        'type' => 'RouterUri',
                        'description' => 'An object of type \'RouterUri\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the object is added as new route, the method will       return true. If the given parameter is not an instance of \'RouterUri\'       or a route is already added, The method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
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