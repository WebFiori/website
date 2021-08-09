<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AbstractWebServiceView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents one web service.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class AbstractWebService');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'AbstractWebService', '\webfiori\http', 'A class that represents one web service. A web service is simply an action that is performed by a web   server to do something. For example, It is possible to have a web service   which is responsible for creating new user profile. Think of it as an   action taken to perform specific task.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'E',
            'A constant which is used to indicate that the message that will be       sent is of type error.',
            'A constant which is used to indicate that the message that will be       sent is of type error. ',
            ),
            new AttributeDef(
            'const',
            '',
            'I',
            'A constant which is used to indicate that the message that will be       sent is of type info.',
            'A constant which is used to indicate that the message that will be       sent is of type info. ',
            ),
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
                'name' => '&getRequestMethods',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains all possible requests methods at which the       service can be called with.',
                'description' => 'Returns an array that contains all possible requests methods at which the       service can be called with. The array will contains strings like \'GET\' or \'POST\'. If no request methods       where added, the array will be empty.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains all possible requests methods at which the       service can be called using.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. The developer can supply an optional service name.       A valid service name must follow the following rules:      <ul>      <li>It can contain the letters [A-Z] and [a-z].</li>      <li>It can contain the numbers [0-9].</li>      <li>It can have the character \'-\' and the character \'_\'.</li>      </ul>      If The given name is invalid, the name of the service will be set to \'new-service\'.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the web service.',
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
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
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
                'name' => 'addParameter',
                'access-modifier' => 'public function',
                'summary' => 'Adds new request parameter to the service.',
                'description' => 'Adds new request parameter to the service. The parameter will only be added if no parameter which has the same       name as the given one is added before.',
                'params' => [
                    '$param' => [
                        'type' => 'RequestParameter|array',
                        'description' => 'The parameter that will be added. It       can be an object of type \'RequestParameter\' or an associative array of       options. The array can have the following indices:      <ul>      <li><b>name</b>: The name of the parameter. It must be provided.</li>      <li><b>type</b>: The datatype of the parameter. If not provided, \'string\' is used.</li>      <li><b>optional</b>: A boolean. If set to true, it means the parameter is       optional. If not provided, \'false\' is used.</li>      <li><b>min</b>: Minimum value of the parameter. Applicable only for       numeric types.</li>      <li><b>max</b>: Maximum value of the parameter. Applicable only for       numeric types.</li>      <li><b>allow-empty</b>: A boolean. If the type of the parameter is string or string-like       type and this is set to true, then empty strings will be allowed. If       not provided, \'false\' is used.</li>      <li><b>custom-filter</b>: A PHP function that can be used to filter the       parameter even further</li>      <li><b>default</b>: An optional default value to use if the parameter is       not provided and is optional.</li>      <li><b>description</b>: The description of the attribute.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given request parameter is added, the method will       return true. If it was not added for any reason, the method will return       false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAuthHeader',
                'access-modifier' => 'public function',
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
                'name' => 'getInputs',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array or an object of type Json of filtered request inputs.',
                'description' => 'Returns an associative array or an object of type Json of filtered request inputs. The indices of the array will represent request parameters and the       values of each index will represent the value which was set in       request body. The values will be filtered and might not be exactly the same as       the values passed in request body. Note that if a parameter is optional and not       provided in request body, its value will be set to \'null\'. Note that       if request content type is \'application/json\', only basic filtering will       be applied. Also, parameters in this case don\'t apply.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array of filtered request inputs. This also can       be an object of type \'Json\' if request content type was \'application/json\'.       If no manager was associated with the service, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getManager',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/WebServicesManager', 'WebServicesManager'),
                        'null
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getParamVal',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of request parameter given its name.',
                'description' => 'Returns the value of request parameter given its name. ',
                'params' => [
                    '$paramName' => [
                        'type' => 'string',
                        'description' => 'The name of request parameter as specified when       it was added to the service.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter is found and its value is set, the       method will return its value. Other than that, the method will return null.       For optional parameters, if a default value is set for it, the method will      return that value.',
                    'return-types' => [
                        'mixed',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasParameter',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the service has a specific request parameter given its name.',
                'description' => 'Checks if the service has a specific request parameter given its name. Note that the name of the parameter is case sensitive. This means that       \'get-profile\' is not the same as \'Get-Profile\'.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the parameter.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a request parameter which has the given name is added       to the service, the method will return true. Otherwise, the method will return       false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isAuthRequred',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property \'requreAuth\'.',
                'description' => 'Returns the value of the property \'requreAuth\'. The property is used to tell if the authorization step will be skipped       or not when the service is called.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if authorization step required.       False if the authorization step will be skipped. Default return value is true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isAuthorized',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the client is authorized to use the service or not.',
                'description' => 'Checks if the client is authorized to use the service or not. The developer should implement this method in a way it returns a boolean.       If the method returns true, it means the client is allowed to use the service.       If the method returns false, then he is not authorized and a 401 error       code will be sent back. If the method returned nothing, then it means the       user is authorized to call the API. If WebFiori framework is used, it is       possible to perform the functionality of this method using middleware.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'processRequest',
                'access-modifier' => 'abstract function',
                'summary' => 'Process client\'s request.',
                'description' => 'Process client\'s request. This method must be implemented in a way it sends back a response after       processing the request.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeParameter',
                'access-modifier' => 'public function',
                'summary' => 'Removes a request parameter from the service given its name.',
                'description' => 'Removes a request parameter from the service given its name. ',
                'params' => [
                    '$paramName' => [
                        'type' => 'string',
                        'description' => 'The name of the parameter (case sensitive).',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a parameter which has the given name       was removed, the method will return an object of type \'RequestParameter\'       that represents the removed parameter. If nothing is removed, the       method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/http/RequestParameter', 'RequestParameter'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeRequestMethod',
                'access-modifier' => 'public function',
                'summary' => 'Removes a request method from the previously added ones.',
                'description' => 'Removes a request method from the previously added ones. ',
                'params' => [
                    '$method' => [
                        'type' => 'string',
                        'description' => 'The request method (e.g. \'get\', \'post\', \'options\' ...). It       can be in upper case or lower case.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given request method is remove, the method will       return true. Other than that, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'send',
                'access-modifier' => 'public function',
                'summary' => 'Sends Back a data using specific content type and specific response code.',
                'description' => 'Sends Back a data using specific content type and specific response code. ',
                'params' => [
                    '$conentType' => [
                        'type' => 'string',
                        'description' => 'Response content type (such as \'application/json\')',
                        'optional' => false,
                    ],
                    '$data' => [
                        'type' => 'mixed',
                        'description' => 'Any data to send back. Mostly, it will be a string.',
                        'optional' => false,
                    ],
                    '$code' => [
                        'type' => 'int',
                        'description' => 'HTTP response code that will be used to send the data.       Default is HTTP code 200 - Ok.',
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
                'name' => 'sendResponse',
                'access-modifier' => 'public function',
                'summary' => 'Sends a JSON response to the client.',
                'description' => 'Sends a JSON response to the client. The basic format of the message will be as follows:      <p>      {<br/>      &nbsp;&nbsp;"message":"Action is not set.",<br/>      &nbsp;&nbsp;"type":"error"<br/>      &nbsp;&nbsp;"http-code":404<br/>      &nbsp;&nbsp;"more-info":EXTRA_INFO<br/>      }      </p>      Where EXTRA_INFO can be a simple string or any JSON data.',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'The message to send back.',
                        'optional' => false,
                    ],
                    '$type' => [
                        'type' => 'string',
                        'description' => 'A string that tells the client what is the type of       the message. The developer can specify his own message types such as       \'debug\', \'info\' or any string. If it is empty string, it will be not       included in response payload.',
                        'optional' => false,
                    ],
                    '$code' => [
                        'type' => 'int',
                        'description' => 'Response code (such as 404 or 200). Default is 200.',
                        'optional' => false,
                    ],
                    '$otherInfo' => [
                        'type' => 'mixed',
                        'description' => 'Any other data to send back it can be a simple       string, an object... . If null is given, the parameter \'more-info\'       will be not included in response. Default is empty string. Default is null.',
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
                'name' => 'setIsAuthRequred',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'requreAuth\'.',
                'description' => 'Sets the value of the property \'requreAuth\'. The property is used to tell if the authorization step will be skipped       or not when the service is called.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True to make authorization step required. False to       skip the authorization step.',
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
                'name' => 'setManager',
                'access-modifier' => 'public function',
                'summary' => 'Associate the web service with a manager.',
                'description' => 'Associate the web service with a manager. The developer does not have to use this method. It is used when a       service is added to a manager.',
                'params' => [
                    '$manager' => [
                        'type' => 'WebServicesManager|null',
                        'description' => 'The manager at which the service       will be associated with. If null is given, the association will be removed if       the service was associated with a manager.',
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
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns a Json object that represents the service.',
                'description' => 'Returns a Json object that represents the service. The generated JSON string from the returned Json object will have       the following format:      <p>      {<br/>      &nbsp;&nbsp;"name":"",<br/>      &nbsp;&nbsp;"since":"",<br/>      &nbsp;&nbsp;"description":"",<br/>      &nbsp;&nbsp;"request-methods":[],<br/>      &nbsp;&nbsp;"parameters":[],<br/>      &nbsp;&nbsp;"responses":[]<br/>      }      </p>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an object of type Json.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
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