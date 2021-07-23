<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ResponseView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents HTTP response.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Response');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Response', '\webfiori\http', 'A class that represents HTTP response. This class can be used to collect server output and send it back to the client.  In addition, it can be used to send custom headers to the client. This class   is used to solve the error \'Output already started at XXX\'. Note that   this class does not comply with PSR-7 specifications.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'addHeader',
                'access-modifier' => 'public static function',
                'summary' => 'Adds new HTTP header to the response.',
                'description' => 'Adds new HTTP header to the response. ',
                'params' => [
                    '$headerName' => [
                        'type' => 'string',
                        'description' => 'The name of the header.',
                        'optional' => false,
                    ],
                    '$headerVal' => [
                        'type' => 'string',
                        'description' => 'The value of the header.',
                        'optional' => false,
                    ],
                    '$isReplace' => [
                        'type' => 'boolean',
                        'description' => 'If the header is already exist and this parameter       is set to true, the method will override all existing header values with       the given value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the header is added, the method will return true. If       not added, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'beforeSend',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a function to execute before sending the final response.',
                'description' => 'Adds a function to execute before sending the final response. This method can be used to add more than one callback.',
                'params' => [
                    '$func' => [
                        'type' => 'Closure',
                        'description' => 'A PHP callable.',
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
                'name' => 'clear',
                'access-modifier' => 'public static function',
                'summary' => 'Removes all added headers and reset the body of the response.',
                'description' => 'Removes all added headers and reset the body of the response. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/Response', 'Response'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clearBody',
                'access-modifier' => 'public static function',
                'summary' => 'Reset the body of the response.',
                'description' => 'Reset the body of the response. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/Response', 'Response'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clearHeaders',
                'access-modifier' => 'public static function',
                'summary' => 'Removes all headers which where added to the response.',
                'description' => 'Removes all headers which where added to the response. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/Response', 'Response'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBody',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a string that represents response body that will be send.',
                'description' => 'Returns a string that represents response body that will be send. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents response body that will be send.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCode',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the value of HTTP response code that will be sent.',
                'description' => 'Returns the value of HTTP response code that will be sent. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'HTTP response code. Default value is 200.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHeader',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the value(s) of specific HTTP header.',
                'description' => 'Returns the value(s) of specific HTTP header. ',
                'params' => [
                    '$headerName' => [
                        'type' => 'array',
                        'description' => 'The name of the header.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If such header exist, the method will return an array       that contains the values of the header. If the header does not exist, the       method will return an empty array.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHeaders',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an associative array that contains response headers.',
                'description' => 'Returns an associative array that contains response headers. The returned array will only contain information about the headers which are       added using the method Response::addHeader().',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The indices will be headers names and       the value of each index will be sub array that contains header values.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasHeader',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if the response will have specific header or not.',
                'description' => 'Checks if the response will have specific header or not. This method will only check for headers which are added using the method       Response::addHeader().',
                'params' => [
                    '$headerName' => [
                        'type' => 'string',
                        'description' => 'The name of the header (such as \'content-type\').',
                        'optional' => false,
                    ],
                    '$headerVal' => [
                        'type' => 'string',
                        'description' => 'An optional value to check for. Default is null       which means only check for the name.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a header which has the given name exist, the method       will return true. If a value is specified and a match is fond, the       method will return true. Other than that, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isSent',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if the response was sent or not.',
                'description' => 'Checks if the response was sent or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if output is sent. False       if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeHeader',
                'access-modifier' => 'public static function',
                'summary' => 'Removes a header from the response.',
                'description' => 'Removes a header from the response. ',
                'params' => [
                    '$headerName' => [
                        'type' => 'string',
                        'description' => 'The name of the header.',
                        'optional' => false,
                    ],
                    '$headerVal' => [
                        'type' => 'string|null',
                        'description' => 'An optional header value. If the header has       multiple values and this one is specified, only the given header value       will be removed.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the header is removed, the method will return true. Other       than that, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'send',
                'access-modifier' => 'public static function',
                'summary' => 'Send the response.',
                'description' => 'Send the response. Note that if this method is called outside CLI environment,      it will terminate the execution of code once the output is sent. In terminal       environment, calling it will have no effect.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCode',
                'access-modifier' => 'public static function',
                'summary' => 'Sets the value of HTTP response code that will be sent.',
                'description' => 'Sets the value of HTTP response code that will be sent. ',
                'params' => [
                    '$code' => [
                        'type' => 'int',
                        'description' => 'HTTP response code. The value must be between 100 and       599 inclusive.',
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
                'name' => 'write',
                'access-modifier' => 'public static function',
                'summary' => 'Appends a string to response body.',
                'description' => 'Appends a string to response body. ',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'The string that will be appended.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/Response', 'Response'),
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