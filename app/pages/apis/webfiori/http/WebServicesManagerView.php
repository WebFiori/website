<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class WebServicesManagerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that is used to manage multiple web services.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class WebServicesManager');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'WebServicesManager', '\webfiori\http', 'A class that is used to manage multiple web services. This class is used to keep track of multiple related web services. It   is used to group related services. For example, if we have create, read, write and   delete services, they can be added to one instance of this class.    When a request is made to the services set, An instance of the class must be created   and the method <a href="#process">WebServicesManager::process()</a> must be called.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'I',
            'A constant which is used to indicate that the message that will be       sent is of type error     .',
            'A constant which is used to indicate that the message that will be       sent is of type error     . /    const E = \'error\';    /      A constant which is used to indicate that the message that will be       sent is of type info',
            ),
            new AttributeDef(
            'const',
            '',
            'POST_CONTENT_TYPES',
            'An array that contains the supported \'POST\' request content types.',
            'An array that contains the supported \'POST\' request content types. This array has the following values:      <ul>      <li>application/x-www-form-urlencoded</li>      <li>multipart/form-data</li>      <li>application/json</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. By default, the API will have two services added to it:      <ul>      <li>api-info</li>      <li>request-info</li>      </ul>      The first service is used to return a JSON string which contains       all needed information by the front-end to implement the API. The user       can supply an optional parameter with it which is called \'version\' in       order to get information about specific API version. The       second service is used to get basic info about the request.',
                'params' => [
                    '$version' => [
                        'type' => 'string',
                        'description' => 'initial API version. Default is \'1.0.0\' Version       number must follow the format \'X.X.X\' where \'X\' is a number between       0 and 9 inclusive.',
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
                'name' => 'addService',
                'access-modifier' => 'public function',
                'summary' => 'Adds new web service to the set of web services.',
                'description' => 'Adds new web service to the set of web services. ',
                'params' => [
                    '$service' => [
                        'type' => 'AbstractWebService',
                        'description' => 'The web service that will be added.',
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
                'name' => 'contentTypeNotSupported',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that request content type is       not supported by the API.',
                'description' => 'Sends a response message to indicate that request content type is       not supported by the API. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Content type not supported.",<br/>      &nbsp;&nbsp;"type":"error",<br/>      &nbsp;&nbsp;"request-content-type":"content_type"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.',
                'params' => [
                    '$cType' => [
                        'type' => 'string',
                        'description' => 'The value of the header \'content-type\' taken from       request header.',
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
                'description' => 'Sends a response message to indicate that a database error has occur. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Database Error",<br/>      &nbsp;&nbsp;"type":"error",<br/>      &nbsp;&nbsp;"err-info":OTHER_DATA<br/>      }      </p>      In here, \'OTHER_DATA\' can be a basic string or JSON string.      Also, The response will sent HTTP code 404 - Not Found.',
                'params' => [
                    '$info' => [
                        'type' => 'JsonI|Json|string',
                        'description' => 'An object of type JsonI or       Json that describe the error in more details. Also it can be a simple string       or JSON string.',
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
                'name' => 'getCalledServiceName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the service which is being called.',
                'description' => 'Returns the name of the service which is being called. The name of the service  must be passed in the body of the request for POST and PUT       request methods (e.g. \'action=do-something\' or \'service-name=do-something\').       In case of GET and DELETE, it must be passed as query string.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'type
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDescription',
                'access-modifier' => 'public function',
                'summary' => 'Returns the description of web services set.',
                'description' => 'Returns the description of web services set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The description of web services set. The description is       useful to describe what does the set of services can do. If the description is       not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getInputs',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array or an object of type Json of filtered request inputs.',
                'description' => 'Returns an associative array or an object of type Json of filtered request inputs. The indices of the array will represent request parameters and the       values of each index will represent the value which was set in       request body. The values will be filtered and might not be exactly the same as       the values passed in request body. Note that if a parameter is optional and not       provided in request body, its value will be set to \'null\'. Note that       if request content type is \'application/json\', only basic filtering will       be applied. Also, parameters in this case don\'t apply.s',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array of filtered request inputs. This also can       be an object of type \'Json\' if request content type was \'application/json\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getInvalidParameters',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the names of request parameters which have invalid values.',
                'description' => 'Returns an array that contains the names of request parameters which have invalid values. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the names of request parameters which have invalid values.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMissingParameters',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the names of missing required parameters.',
                'description' => 'Returns an array that contains the names of missing required parameters. If a parameter is optional and not provided, it will not appear in the returned array.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the names of missing required parameters.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getNonFiltered',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array of non-filtered request inputs.',
                'description' => 'Returns an associative array of non-filtered request inputs. The indices of the array will represent request parameters and the       values of each index will represent the value which was set in       request body. The values will be exactly the same as       the values passed in request body. Note that if a parameter is optional and not       provided in request body, its value will be set to \'null\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array of request parameters.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOutputStream',
                'access-modifier' => 'public function',
                'summary' => 'Returns the stream at which the output will be sent to.',
                'description' => 'Returns the stream at which the output will be sent to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If a custom output stream is set using the       method \'WebServicesManager::setOutputStream()\', the method will return a       resource. The resource will be still open. If no custom stream is set,       the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.resource.php', 'resource'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOutputStreamPath',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the path of the custom output stream.',
                'description' => 'Returns a string that represents the path of the custom output stream. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the path of the custom output stream.       If no custom output stream is set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getServiceByName',
                'access-modifier' => 'public function',
                'summary' => 'Returns a web service given its name.',
                'description' => 'Returns a web service given its name. ',
                'params' => [
                    '$serviceName' => [
                        'type' => 'string',
                        'description' => 'The name of the service.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type \'WebService\'       if the service is found. If no service was found which has the given name,       The method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/AbstractWebService', 'AbstractWebService'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'invParams',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that a request parameter(s) have invalid values.',
                'description' => 'Sends a response message to indicate that a request parameter(s) have invalid values. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"The following parameter(s) has invalid values: \'param_1\', \'param_2\', \'param_n\'",<br/>      &nbsp;&nbsp;"type":"error"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.',
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
                'description' => 'Sends a response message to indicate that a request parameter or parameters are missing. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"The following required parameter(s) where missing from the request body: \'param_1\', \'param_2\', \'param_n\'",<br/>      &nbsp;&nbsp;"type":"error",<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'missingServiceName',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to tell the front-end that the parameter       \'action\', \'service\' or \'service-name\' is missing from request body.',
                'description' => 'Sends a response message to tell the front-end that the parameter       \'action\', \'service\' or \'service-name\' is missing from request body. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Service name is not set.",<br/>      &nbsp;&nbsp;"type":"error"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.',
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
                'summary' => 'Sends a response message to indicate that a user is not authorized call a       service or a resource.',
                'description' => 'Sends a response message to indicate that a user is not authorized call a       service or a resource. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Not authorized",<br/>      &nbsp;&nbsp;"type":"error"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 401 - Not Authorized.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'readOutputStream',
                'access-modifier' => 'public function',
                'summary' => 'Reads the content of output stream.',
                'description' => 'Reads the content of output stream. This method is used to read the content of the custom output stream. The       method will only read it if it was set using its path.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the content was taken from the stream, the method       will return it as a string. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeService',
                'access-modifier' => 'public function',
                'summary' => 'Removes a service from the manager given its name.',
                'description' => 'Removes a service from the manager given its name. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the service.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a web service which has the given name was found       and removed, the method will return an object that represent the removed       service. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/http/AbstractWebService', 'AbstractWebService'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeServices',
                'access-modifier' => 'public function',
                'summary' => 'Removes all added web services.',
                'description' => 'Removes all added web services. This method will simply re-initialize the arrays that holds all web       services.',
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
                'description' => 'Sends a response message to indicate that request method is not supported. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Method Not Allowed.",<br/>      &nbsp;&nbsp;"type":"error",<br/>      }      </p>            In addition to the message, The response will sent HTTP code 405 - Method Not Allowed.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
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
                'name' => 'sendHeaders',
                'access-modifier' => 'public function',
                'summary' => 'Sends back multiple HTTP headers to the client.',
                'description' => 'Sends back multiple HTTP headers to the client. ',
                'params' => [
                    '$headersArr' => [
                        'type' => 'array',
                        'description' => 'An associative array. The keys will act as       the headers names and the value of each key will represents the value       of the header.',
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
                'name' => 'serviceNotImplemented',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that web service is not implemented.',
                'description' => 'Sends a response message to indicate that web service is not implemented. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Service not implemented.",<br/>      &nbsp;&nbsp;"type":"error",<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'serviceNotSupported',
                'access-modifier' => 'public function',
                'summary' => 'Sends a response message to indicate that called web service is not supported by the API.',
                'description' => 'Sends a response message to indicate that called web service is not supported by the API. This method will send back a JSON string in the following format:      <p>      {<br/>      &nbsp;&nbsp;"message":"Action not supported",<br/>      &nbsp;&nbsp;"type":"error"<br/>      }      </p>      In addition to the message, The response will sent HTTP code 404 - Not Found.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDescription',
                'access-modifier' => 'public function',
                'summary' => 'Sets the description of the web services set.',
                'description' => 'Sets the description of the web services set. ',
                'params' => [
                    '$desc' => [
                        'type' => 'sting',
                        'description' => 'Set description. Used to help front-end to identify       the use of the services set.',
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
                'name' => 'setInputStream',
                'access-modifier' => 'public function',
                'summary' => 'Sets the stream at which the manager will read the inputs from.',
                'description' => 'Sets the stream at which the manager will read the inputs from. This can be used to test the services if body content type is       \'application/json\'.',
                'params' => [
                    '$pathOrResource' => [
                        'type' => 'string|resource',
                        'description' => 'A file that contains JSON or       a stream which was opened using a function like \'fopen()\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If input stream is successfully set, the method will       return true. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setOutputStream',
                'access-modifier' => 'public function',
                'summary' => 'Sets a custom output stream.',
                'description' => 'Sets a custom output stream. This method is useful if the developer would like to test the output of a       web service. Simply set the output stream to a custom one and read the       content of the stream. Note that  if the       resource already exist and has content, it will be erased.',
                'params' => [
                    '$stream' => [
                        'type' => 'resource|string',
                        'description' => 'A resource which was opened by \'fopen()\'. Also,       it can be a string that points to a file.',
                        'optional' => false,
                    ],
                    '$new' => [
                        'type' => 'boolean',
                        'description' => 'If set to true and the resource does not exist, the       method will attempt to create it.',
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
                'summary' => 'Returns Json object that represents services set.',
                'description' => 'Returns Json object that represents services set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type Json.',
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