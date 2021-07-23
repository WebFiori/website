<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class RequestView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents HTTP client request.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Request');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Request', '\webfiori\http', 'A class that represents HTTP client request. The developer can use this class to access basic information about a   request. Note that it does not comply with PSR-7 in all aspects.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'METHODS',
            'An array that contains the names of request methods.',
            'An array that contains the names of request methods. This array contains the following strings:      <ul>      <li>GET</li>      <li>HEAD</li>      <li>POST</li>      <li>PUT</li>      <li>DELETE</li>      <li>TRACE</li>      <li>OPTIONS</li>      <li>PATCH</li>      <li>CONNECT</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'getAuthHeader',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains the value of the header \'authorization\'.',
                'description' => 'Returns an array that contains the value of the header \'authorization\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array will have two indices, the first one with       name \'scheme\' and the second one with name \'credentials\'. The index \'scheme\'       will contain the name of the scheme which is used to authenticate       (\'Basic\', \'Bearer\', \'Digest\', etc...). The index \'credentials\' will contain       the credentials which can be used to authenticate the client.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClientIP',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the IP address of the user who is connected to the server.',
                'description' => 'Returns the IP address of the user who is connected to the server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The IP address of the user who is connected to the server.       The value is taken from the array $_SERVER at index \'REMOTE_ADDR\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getContentType',
                'access-modifier' => 'public static function',
                'summary' => 'Returns request content type.',
                'description' => 'Returns request content type. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of the header \'content-type\' in the request.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHeaders',
                'access-modifier' => 'public static function',
                'summary' => 'Returns HTTP request headers.',
                'description' => 'Returns HTTP request headers. This method will try to extract request headers using two ways,       first, it will check if the method \'apache_request_headers()\' is       exist or not. If it does, then request headers will be taken from       there. If it does not exist, it will try to extract request headers       from the super global $_SERVER.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array of request headers. The indices       will represents the headers and the values are the values of the       headers. The indices will be all in lower case.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMethod',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the name of request method which is used to call one of the services in the set.',
                'description' => 'Returns the name of request method which is used to call one of the services in the set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Request method such as POST, GET, etc.... Default return       value is \'GET\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getParam',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the value of a GET or POST parameter.',
                'description' => 'Returns the value of a GET or POST parameter. This method will apply basic filtering to the value of the parameter before returning       it.',
                'params' => [
                    '$paramName' => [
                        'type' => 'string',
                        'description' => 'The name of the parameter. Note that if the value has extra       spaces, they will be trimmed.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the value of the parameter if       set. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRequestedURL',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the URI of the requested resource.',
                'description' => 'Returns the URI of the requested resource. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The URI of the requested resource.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUri',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an object that holds all information about requested URI.',
                'description' => 'Returns an object that holds all information about requested URI. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an object that holds all information about requested URI.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/Uri', 'Uri'),
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