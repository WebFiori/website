<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class RequestParameterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents request parameter.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class RequestParameter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'RequestParameter', '\webfiori\http', 'A class that represents request parameter. Request parameter can be part of query string in case of   GET and DELETE calls and in request body in case of   PUT or POST requests'));
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
                        'description' => 'The name of the parameter as it appears in the request body.       It must be a valid name. If the given name is invalid, the parameter       name will be set to \'a-parameter\'. Valid name must comply with the following       rules:      <ul>      <li>It can contain the letters [A-Z] and [a-z].</li>      <li>It can contain the numbers [0-9].</li>      <li>It can have the character \'-\' and the character \'_\'.</li>      </ul>',
                        'optional' => false,
                    ],
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of the data that will be in the parameter stored       by the parameter. Supported types are:      <ul>      <li>string</li>      <li>integer</li>      <li>email</li>      <li>float</li>      <li>url</li>      <li>boolean</li>      <li>array</li>      <li>json-obj</li>      </ul>       If invalid type is given or no type is provided, \'string\' will be used by       default.',
                        'optional' => false,
                    ],
                    '$isOptional' => [
                        'type' => 'boolean',
                        'description' => 'Set to true if the parameter is optional. Default       is false.',
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
                'summary' => 'Returns a string that represents the object.',
                'description' => 'Returns a string that represents the object. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string in the following format:      <p>      RequestParameter[<br/>      &nbsp;&nbsp;&nbsp;&nbsp;Name => \'a_name\'<br/>      &nbsp;&nbsp;&nbsp;&nbsp;Type => \'a_type\'<br/>      &nbsp;&nbsp;&nbsp;&nbsp;Description => \'a_desc\'<br/>      &nbsp;&nbsp;&nbsp;&nbsp;Is Optional => \'true\'<br/>      &nbsp;&nbsp;&nbsp;&nbsp;Default => \'a_defalt\'<br/>      &nbsp;&nbsp;&nbsp;&nbsp;Minimum Value => \'a_number\'<br/>      &nbsp;&nbsp;&nbsp;&nbsp;Maximum Value => \'a_number\'      <br/>]      </p>      If any of the values is null, the value will be shown as \'null\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'applyBasicFilter',
                'access-modifier' => 'public function',
                'summary' => 'Checks if we need to apply basic filter or not       before applying custom filter callback.',
                'description' => 'Checks if we need to apply basic filter or not       before applying custom filter callback. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true       if the basic filter will be applied before applying custom filter. If no custom       filter is set, the method will return true by default.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createParam',
                'access-modifier' => 'public static function',
                'summary' => 'Creates an object of the class given an associative array of options.',
                'description' => 'Creates an object of the class given an associative array of options. ',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An associative array of       options. The array can have the following indices:      <ul>      <li><b>name</b>: The name of the parameter. If invalid name is provided,       the value \'a-parameter\' is used. If it is not provided, no       parameter will be created.</li>      <li><b>type</b>: The datatype of the parameter. If not provided, \'string\' is used.</li>      <li><b>optional</b>: A boolean. If set to true, it means the parameter is       optional. If not provided, \'false\' is used.</li>      <li><b>min</b>: Minimum value of the parameter. Applicable only for       numeric types.</li>      <li><b>max</b>: Maximum value of the parameter. Applicable only for       numeric types.</li>      <li><b>allow-empty</b>: A boolean. If the type of the parameter is string or string-like       type and this is set to true, then empty strings will be allowed. If       not provided, \'false\' is used.</li>      <li><b>custom-filter</b>: A PHP function that can be used to filter the       parameter even further</li>      <li><b>default</b>: An optional default value to use if the parameter is       not provided and is optional.</li>      <li><b>description</b>: The description of the attribute.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given request parameter is created,       the method will return an object of type \'RequestParameter\'.       If it was not created for any reason, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/http/RequestParameter', 'RequestParameter'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCustomFilterFunction',
                'access-modifier' => 'public function',
                'summary' => 'Returns the function that is used as a custom filter       for the parameter.',
                'description' => 'Returns the function that is used as a custom filter       for the parameter. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The function that is used as a custom filter       for the parameter. If not set, the method will return null.',
                    'return-types' => [
                        'callback',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDefault',
                'access-modifier' => 'public function',
                'summary' => 'Returns the default value to use in case the parameter is       not provided.',
                'description' => 'Returns the default value to use in case the parameter is       not provided. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The default value to use in case the parameter is       not provided. If no default value is provided, the method will       return null.',
                    'return-types' => [
                        'mixed',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDescription',
                'access-modifier' => 'public function',
                'summary' => 'Returns the description of the parameter.',
                'description' => 'Returns the description of the parameter. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The description of the parameter. If the description is       not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMaxVal',
                'access-modifier' => 'public function',
                'summary' => 'Returns the maximum numeric value the parameter can accept.',
                'description' => 'Returns the maximum numeric value the parameter can accept. This method apply only to integer type.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The maximum numeric value the parameter can accept.       If the request parameter type is not numeric, the method will return       null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMinVal',
                'access-modifier' => 'public function',
                'summary' => 'Returns the minimum numeric value the parameter can accept.',
                'description' => 'Returns the minimum numeric value the parameter can accept. This method apply only to and integer type.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The minimum numeric value the parameter can accept.       If the request parameter type is not numeric, the method will return       null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the parameter.',
                'description' => 'Returns the name of the parameter. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the parameter.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getType',
                'access-modifier' => 'public function',
                'summary' => 'Returns the type of the parameter.',
                'description' => 'Returns the type of the parameter. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The type of the parameter (Such as \'string\', \'email\', \'integer\').',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isEmptyStringAllowed',
                'access-modifier' => 'public function',
                'summary' => 'Checks if empty strings are allowed as values for the parameter.',
                'description' => 'Checks if empty strings are allowed as values for the parameter. If the property value is not updated using the method       RequestParameter::setIsEmptyStringAllowed(), The method will return       default value which is false.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if empty strings are allowed as values for the parameter.       false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isOptional',
                'access-modifier' => 'public function',
                'summary' => 'Returns a boolean value that can be used to tell if the parameter is       optional or not.',
                'description' => 'Returns a boolean value that can be used to tell if the parameter is       optional or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the parameter is optional and false       if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCustomFilterFunction',
                'access-modifier' => 'public function',
                'summary' => 'Sets a callback method to work as a filter for request parameter.',
                'description' => 'Sets a callback method to work as a filter for request parameter. The callback method will have 3 parameters passed to it:      <ul>      <li>Original value without filtering.</li>      <li>The value with basic filtering rules applied to it.</li>      <li>An object of type RequestParameter.</li>      </ul>       <p>If the parameter $applyBasicFilter is set to false, the second parameter       will have the value \'NOT_APLICABLE\'.</p>      <p>The object of type <b>RequestParameter</b>       will contain original information for the filter.</p> The method       must be implemented in a way that makes it return false or null if the       parameter has invalid value. If the parameter is filtered and       was validated, the method must return the valid and filtered       value.',
                'params' => [
                    '$function' => [
                        'type' => 'callback',
                        'description' => 'A callback function.',
                        'optional' => false,
                    ],
                    '$applyBasicFilter' => [
                        'type' => 'boolean',
                        'description' => 'If set to true,       the basic filter will be applied to the parameter. Default       is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the callback is set, the method will return true. If       not set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDefault',
                'access-modifier' => 'public function',
                'summary' => 'Sets a default value for the parameter to use if the parameter is       not provided Or when the filter fails.',
                'description' => 'Sets a default value for the parameter to use if the parameter is       not provided Or when the filter fails. This method can be used to include a default value for the parameter if       it is optional or in case the filter was not able to filter given value.',
                'params' => [
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'default value for the parameter to use.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the default value is set, the method will return true.       If it is not set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDescription',
                'access-modifier' => 'public function',
                'summary' => 'Sets the description of the parameter.',
                'description' => 'Sets the description of the parameter. This method is used to document the API. Used to help front-end developers.',
                'params' => [
                    '$desc' => [
                        'type' => 'string',
                        'description' => 'Parameter description.',
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
                'name' => 'setIsEmptyStringAllowed',
                'access-modifier' => 'public function',
                'summary' => 'Allow or disallow empty strings as values for the parameter.',
                'description' => 'Allow or disallow empty strings as values for the parameter. The value of the attribute will be updated only if the type of the       parameter is set to \'string\'.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'true to allow empty strings and false to disallow       empty strings.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the property is updated.       If datatype of the request parameter is not string, The method will       not update the property value and will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsOptional',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'isOptional\'.',
                'description' => 'Sets the value of the property \'isOptional\'. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True to make the parameter optional. False to make       it mandatory.',
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
                'name' => 'setMaxVal',
                'access-modifier' => 'public function',
                'summary' => 'Sets the maximum value.',
                'description' => 'Sets the maximum value. The value will be updated       only if:      <ul>      <li>The request parameter type is numeric (\'integer\' or \'float\').</li>      <li>The given value is greater than RequestParameter::getMinVal()</li>      </ul>',
                'params' => [
                    '$val' => [
                        'type' => 'int',
                        'description' => 'The maximum value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true once the maximum value       is updated. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setMinVal',
                'access-modifier' => 'public function',
                'summary' => 'Sets the minimum value that the parameter can accept.',
                'description' => 'Sets the minimum value that the parameter can accept. The value will be updated       only if:      <ul>      <li>The request parameter type is numeric (\'integer\' or \'float\').</li>      <li>The given value is less than RequestParameter::getMaxVal()</li>      </ul>',
                'params' => [
                    '$val' => [
                        'type' => 'int',
                        'description' => 'The minimum value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true once the minimum value       is updated. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the parameter.',
                'description' => 'Sets the name of the parameter. A valid parameter name must       follow the following rules:      <ul>      <li>It can contain the letters [A-Z] and [a-z].</li>      <li>It can contain the numbers [0-9].</li>      <li>It can have the character \'-\' and the character \'_\'.</li>      </ul>',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the parameter.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given name is valid, the method will return       true once the name is set. false is returned if the given       name is invalid.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setType',
                'access-modifier' => 'public function',
                'summary' => 'Sets the type of the parameter.',
                'description' => 'Sets the type of the parameter. ',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of the parameter. It must be a value       form the contats which exist in the class \'ParamTypes\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true is returned if the type is updated. false       if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns a Json object that represents the request parameter.',
                'description' => 'Returns a Json object that represents the request parameter. This method is used to help front-end developers in showing the       documentation of the request parameter. The format of JSON string       will be as follows:      <p>      {<br/>      &nbsp;&nbsp;"name":"a-param",<br/>      &nbsp;&nbsp;"type":"string",<br/>      &nbsp;&nbsp;"description":null,<br/>      &nbsp;&nbsp;"is-optional":true,<br/>      &nbsp;&nbsp;"default-value":null,<br/>      &nbsp;&nbsp;"min-val":null,<br/>      &nbsp;&nbsp;"max-val":null<br/>      }      </p>',
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