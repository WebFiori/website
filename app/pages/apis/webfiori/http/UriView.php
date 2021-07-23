<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class UriView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that is used to split URIs and get their parameters.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Uri');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Uri', '\webfiori\http', 'A class that is used to split URIs and get their parameters. The main aim of this class is to extract URI parameters including:  <ul>  <li>Host</li>  <li>Authority</li>  <li>Fragment (if any)</li>  <li>Path</li>  <li>Port (if any)</li>  <li>Query string (if any)</li>  <li>Scheme</li>  </ul>  For more information on URI structure, visit <a target="_blank" href="https://en.wikipedia.org/wiki/Uniform_Resource_Identifier#Examples">Wikipedia</a>.'));
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
                        'description' => 'The URI such as \'https://www3.webfiori.com:80/{some-var}/hell/{other-var}/?do=dnt&y=#xyz\'',
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
                'name' => 'addVarValue',
                'access-modifier' => 'public function',
                'summary' => 'Adds a possible value for a URI variable.',
                'description' => 'Adds a possible value for a URI variable. This is used in constructing the sitemap node of the URI. If a value is       provided, then it will be part of the URI that will appear in the sitemap.',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable. It must be exist as       the path part in the URI.',
                        'optional' => false,
                    ],
                    '$varValue' => [
                        'type' => 'string',
                        'description' => 'The value of the variable. Note that any extra spaces       in the value will be trimmed.',
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
                'name' => 'addVarValues',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple values to URI variable.',
                'description' => 'Adds multiple values to URI variable. ',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of he variable.',
                        'optional' => false,
                    ],
                    '$arrayOfVals' => [
                        'type' => 'array',
                        'description' => 'An array that contains all possible values for       the variable.',
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
                'name' => 'equals',
                'access-modifier' => 'public function',
                'summary' => 'Checks if two URIs are equal or not.',
                'description' => 'Checks if two URIs are equal or not. Two URIs are considered equal if they have the same authority and the       same path name.',
                'params' => [
                    '$otherUri' => [
                        'type' => 'Uri',
                        'description' => 'The URI which \'this\' URI will be checked against.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the URIs are       equal.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAuthority',
                'access-modifier' => 'public function',
                'summary' => 'Returns authority part of the URI.',
                'description' => 'Returns authority part of the URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The authority part of the URI. Usually,       it is a string in the form \'//www.example.com:80\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBaseURL',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the base URL of the framework.',
                'description' => 'Returns the base URL of the framework. The returned value will depend on the folder where the library files       are located. For example, if your domain is \'example.com\' and the library       is placed at the root and the requested resource is \'http://example.com/x/y/z\',       then the base URL will be \'http://example.com/\'. If the library is       placed inside a folder in the server which has the name \'system\', and       the same resource is requested, then the base URL will be       \'http://example.com/system\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The base URL (such as \'http//www.example.com/\')',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getComponents',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array which contains all URI parts.',
                'description' => 'Returns an associative array which contains all URI parts. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return an associative array that       contains the components of the URI. The array will have the       following indices:      <ul>      <li><b>uri</b>: The original URI.</li>      <li><b>port</b>: The port number taken from the authority part.</li>      <li><b>host</b>: Will be always empty string.</li>      <li><b>authority</b>: Authority part of the URI.</li>      <li><b>scheme</b>: Scheme part of the URI (e.g. http or https).</li>      <li><b>query-string</b>: Query string if the URI has any.</li>      <li><b>fragment</b>: Any string that comes after the character \'#\' in the URI.</li>      <li><b>path</b>: An array that contains the names of path directories</li>      <li><b>query-string-vars</b>: An array that contains query string parameter and values.</li>      <li><b>uri-vars</b>: An array that contains URI path variable and values.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getFragment',
                'access-modifier' => 'public function',
                'summary' => 'Returns fragment part of the URI.',
                'description' => 'Returns fragment part of the URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Fragment part of the URI. The fragment in the URI is       any string that comes after the character \'#\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHost',
                'access-modifier' => 'public function',
                'summary' => 'Returns host name from the host part of the URI.',
                'description' => 'Returns host name from the host part of the URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The host name such as \'www.webfiori.com\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPath',
                'access-modifier' => 'public function',
                'summary' => 'Returns the path part of the URI.',
                'description' => 'Returns the path part of the URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string such as \'/path1/path2/path3\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPathArray',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array which contains the names of URI directories.',
                'description' => 'Returns an array which contains the names of URI directories. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array which contains the names of URI directories.       For example, if the path part of the URI is \'/path1/path2\', the       array will contain the value \'path1\' at index 0 and \'path2\' at index 1.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPort',
                'access-modifier' => 'public function',
                'summary' => 'Returns port number of the authority part of the URI.',
                'description' => 'Returns port number of the authority part of the URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Port number of the authority part of the URI. If       port number was not specified, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getQueryString',
                'access-modifier' => 'public function',
                'summary' => 'Returns the query string that was appended to the URI.',
                'description' => 'Returns the query string that was appended to the URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The query string that was appended to the URI.       If the URI has no query string, the method will return empty       string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getQueryStringVars',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array which contains query string parameters.',
                'description' => 'Returns an associative array which contains query string parameters. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array which contains query string parameters.       the keys will be acting as the names of the parameters and the values       of each parameter will be in its key.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getScheme',
                'access-modifier' => 'public function',
                'summary' => 'Returns the scheme part of the URI.',
                'description' => 'Returns the scheme part of the URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The scheme part of the URI. Usually, it is called protocol       (like http, ftp).',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUri',
                'access-modifier' => 'public function',
                'summary' => 'Returns the original requested URI.',
                'description' => 'Returns the original requested URI. ',
                'params' => [
                    '$incQueryStr' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the query string part       will be included in the URL. Default is false.',
                        'optional' => false,
                    ],
                    '$incFragment' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the fragment part       will be included in the URL. Default is false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The original requested URI.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUriVar',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of URI variable given its name.',
                'description' => 'Returns the value of URI variable given its name. A variable is a string which is defined while creating the route.       it is name is included between \'{}\'.',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable. Note that this value       must not include braces.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the value of the       variable if found. If the variable is not set or the variable       does not exist, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUriVars',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array which contains URI parameters.',
                'description' => 'Returns an associative array which contains URI parameters. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array which contains URI parameters. The       keys will be the names of the variables and the value of each variable will       be in its index.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getVarValues',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains possible values for a URI variable.',
                'description' => 'Returns an array that contains possible values for a URI variable. ',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an array that contains all possible       values for the variable which was added using the method Router::addUriVarValue().       If the variable does not exist, the array will be empty.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasUriVar',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the URI has a variable or not given its name.',
                'description' => 'Checks if the URI has a variable or not given its name. A variable is a string which is defined while creating the route.       it is name is included between \'{}\'.',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given variable name is exist, the method will       return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasVars',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the URI has any variables or not.',
                'description' => 'Checks if the URI has any variables or not. A variable is a string which is defined while creating the route.       it is name is included between \'{}\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the URI has any variables, the method will       return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isAllVarsSet',
                'access-modifier' => 'public function',
                'summary' => 'Checks if all URI variables has values or not.',
                'description' => 'Checks if all URI variables has values or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if all URI       variables have a value other than null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isCaseSensitive',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property that tells if the URI is case sensitive       or not.',
                'description' => 'Returns the value of the property that tells if the URI is case sensitive       or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'True if URI case sensitive. False if not. Default is false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsCaseSensitive',
                'access-modifier' => 'public function',
                'summary' => 'Make the URI case sensitive or not.',
                'description' => 'Make the URI case sensitive or not. This is mainly used in case the developer would like to use the       URI in routing.',
                'params' => [
                    '$caseSensitive' => [
                        'type' => 'boolean',
                        'description' => 'True to make it case sensitive. False to       not.',
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
                'name' => 'setRequestedUri',
                'access-modifier' => 'public function',
                'summary' => 'Sets the requested URI.',
                'description' => 'Sets the requested URI. ',
                'params' => [
                    '$uri' => [
                        'type' => 'string',
                        'description' => 'A string that represents requested URI.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the requested URI is a match with the original URI which       is stored in the object, it will be set and the method will return true.       Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setUriVar',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of a URI variable.',
                'description' => 'Sets the value of a URI variable. A variable is a string which is defined while creating the route.       it is name is included between \'{}\'.',
                'params' => [
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable.',
                        'optional' => false,
                    ],
                    '$value' => [
                        'type' => 'string',
                        'description' => 'The value of the variable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the variable       was set. If the variable does not exist, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'splitURI',
                'access-modifier' => 'public static function',
                'summary' => 'Breaks a URI into its basic components.',
                'description' => 'Breaks a URI into its basic components. ',
                'params' => [
                    '$uri' => [
                        'type' => 'string',
                        'description' => 'The URI that will be broken.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given URI is not valid,       the Method will return false. Other than that, The method will return an associative array that       contains the components of the URI. The array will have the       following indices:      <ul>      <li><b>uri</b>: The original URI.</li>      <li><b>port</b>: The port number taken from the authority part.</li>      <li><b>host</b>: Will be always empty string.</li>      <li><b>authority</b>: Authority part of the URI.</li>      <li><b>scheme</b>: Scheme part of the URI (e.g. http or https).</li>      <li><b>query-string</b>: Query string if the URI has any.</li>      <li><b>fragment</b>: Any string that comes after the character \'#\' in the URI.</li>      <li><b>path</b>: An array that contains the names of path directories</li>      <li><b>query-string-vars</b>: An array that contains query string parameter and values.</li>      <li><b>uri-vars</b>: An array that contains URI path variable and values.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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