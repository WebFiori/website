<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ExtendedWebServicesManagerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An extension for the class \'WebServicesManager\' that adds support for multi-language   response messages.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class ExtendedWebServicesManager');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'ExtendedWebServicesManager', '\webfiori\framework', 'An extension for the class \'WebServicesManager\' that adds support for multi-language   response messages. The language can be set by sending a GET or POST request that has the   parameter \'lang\'.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of \'API\'.',
                'description' => 'Creates new instance of \'API\'. ',
                'params' => [
                    '$version' => [
                        'type' => 'string',
                        'description' => 'initial API version. Default is \'1.0.0\'.',
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
                'name' => 'actionNotImpl',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that an action is not implemented.',
                'description' => 'Sends a response message to indicate that an action is not implemented. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Action not implemented.",<br/>      &nbsp;&nbsp;"type":"error",<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.       Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'actionNotSupported',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that an action is not supported by the API.',
                'description' => 'Sends a response message to indicate that an action is not supported by the API. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Action not supported",<br/>      &nbsp;&nbsp;"type":"error"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.       Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'contentTypeNotSupported',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that request content type is       not supported by the API.',
                'description' => 'Sends a response message to indicate that request content type is       not supported by the API. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Content type not supported.",<br/>      &nbsp;&nbsp;"type":"error",<br/>      &nbsp;&nbsp;"request-content-type":"content_type"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.       Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
                'params' => [
                    '$cType ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createLangDir',
                'access-modifier' => 'public function',
                'summary' => 'Creates a sub array to define language variables.',
                'description' => 'Creates a sub array to define language variables. An example: if the given string is \'general\',       an array with key name \'general\' will be created. Another example is       if the given string is \'pages/login\', two arrays will be created. The       top one will have the key value \'pages\' and another one inside       the pages array with key value \'login\'.',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A string that looks like a directory.',
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
                'name' => 'databaseErr',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that a database error has occur.',
                'description' => 'Sends a response message to indicate that a database error has occur. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"a_message",<br/>      &nbsp;&nbsp;"type":"error",<br/>      &nbsp;&nbsp;"err-info":OTHER_DATA<br/>      }      </p>      In here, \'OTHER_DATA\' can be a basic string.      Also, The response will sent HTTP code 404 - Not Found.',
                'params' => [
                    '$info' => [
                        'type' => 'JsonI|Json|DB|string',
                        'description' => 'An object of type JsonI or       Json that describe the error in more details. Also it can be a simple string.       Also, this parameter can be a database instance that contains database error       information.      Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
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
                'name' => 'get',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of a language variable.',
                'description' => 'Returns the value of a language variable. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A directory to the language variable (such as \'pages/login/login-label\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given directory represents a label, the       method will return its value. If it represents an array, the array will       be returned. If nothing was found, the returned value will be the passed       value to the method.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAuthorizationHeader',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains HTTP authorization header       content.',
                'description' => 'Returns an associative array that contains HTTP authorization header       content. The generated associative array will have two indices:       <ul>      <li><b>type</b>: Type of authorization (e.g. basic, bearer )</li>      <li><b>credentials</b>: Depending on authorization type,       this field will have different values.</li>      </ul>      Note that if no authorization header is sent, The two indices will be empty.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTranslation',
                'access-modifier' => 'public function',
                'summary' => 'Returns the language instance which is linked with the API instance.',
                'description' => 'Returns the language instance which is linked with the API instance. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an instance of the class \'Language\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/i18n/Language', 'Language'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'invParams',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that a request parameter(s) have invalid values.',
                'description' => 'Sends a response message to indicate that a request parameter(s) have invalid values. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"The following parameter(s) has invalid values: \'param_1\', \'param_2\', \'param_n\'",<br/>      &nbsp;&nbsp;"type":"error"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.       Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'missingParams',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that a request parameter or parameters are missing.',
                'description' => 'Sends a response message to indicate that a request parameter or parameters are missing. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"The following required parameter(s) where missing from the request body: \'param_1\', \'param_2\', \'param_n\'",<br/>      &nbsp;&nbsp;"type":"error",<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.       Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'notAuth',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that a user is not authorized to       do an API call.',
                'description' => 'Sends a response message to indicate that a user is not authorized to       do an API call. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Not authorized",<br/>      &nbsp;&nbsp;"type":"error"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 401 - Not Authorized.       Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'requestMethodNotAllowed',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that request method is not supported.',
                'description' => 'Sends a response message to indicate that request method is not supported. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Method Not Allowed.",<br/>      &nbsp;&nbsp;"type":"error",<br/>      }      </p>      In addition to the message, The response will sent HTTP code 405 - Method Not Allowed.       Note that the content of the field "message" might differ. It depends on       the language. If no language is selected or language is not supported,       The language that will be used is the language that was set as default       language in the class \'SiteConfig\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setLangVars',
                'access-modifier' => 'public function',
                'summary' => 'Sets multiple language variables.',
                'description' => 'Sets multiple language variables. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A string that looks like a       directory.',
                        'optional' => false,
                    ],
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An associative array. The key will act as the variable       and the value of the key will act as the variable value.',
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