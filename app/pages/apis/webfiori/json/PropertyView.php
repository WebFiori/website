<?php
namespace docGenerator\webfiori\json;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class PropertyView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An entity that represents an attribute in Json object.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Property');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Property', '\webfiori\json', 'An entity that represents an attribute in Json object. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'PROP_NAME_STYLES',
            'An array of supported property styles.',
            'An array of supported property styles. This array holds the following values:      <ul>      <li>camel</li>      <li>kebab</li>      <li>snake</li>      <li>none</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&getValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property.',
                'description' => 'Returns the value of the property. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of the property.',
                    'return-types' => [
                        'mixed',
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the property.',
                        'optional' => false,
                    ],
                    '$value' => [
                        'type' => 'mixed',
                        'description' => 'The value of the property.',
                        'optional' => false,
                    ],
                    '$style' => [
                        'type' => 'string',
                        'description' => 'The style at which the name of the property will      use to represent its name. Can be one of the following values:      <ul>      <li>snake</li>      <li>kebab</li>      <li>camel</li>      <li>none</li>      </ul>      The default value is \'none\'.',
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
                'name' => 'getJsonXTagName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of XML tag that will be used when representing the      property in JSONx.',
                'description' => 'Returns the name of XML tag that will be used when representing the      property in JSONx. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The returned string will have the following syntax:      "json:&lt;type&gt;" where "&lt;type&gt;" is the datatype of the property.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the property.',
                'description' => 'Returns the name of the property. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the property. Note that the returned value      will depend on the style at which the property name is set to use.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getStyle',
                'access-modifier' => 'public function',
                'summary' => 'Returns the style at which the names of the properties will use.',
                'description' => 'Returns the style at which the names of the properties will use. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return one of the following values:      <ul>      <li>snake</li>      <li>kebab</li>      <li>camel</li>      <li>none</li>      </ul>      The default value is \'none\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getType',
                'access-modifier' => 'public function',
                'summary' => 'Returns the datatype of property value.',
                'description' => 'Returns the datatype of property value. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return one of the following values:      <ul>      <li>integer</li>      <li>double</li>      <li>string</li>      <li>boolean</li>      <li>object</li>      <li>NULL</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isAsObject',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the property will be represented as object or array.',
                'description' => 'Checks if the property will be represented as object or array. This method is only used with arrays since in some cases the developer      would like to have associative arrays as objects.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the property will be represented as object, true is      returned. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAsObject',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property which is used to tell if      the property will be represented as object or array.',
                'description' => 'Sets the value of the property which is used to tell if      the property will be represented as object or array. This method is only used with arrays since in some cases the developer      would like to have associative arrays as objects.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True to represent the array as object. False       otherwise.',
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
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the property.',
                'description' => 'Sets the name of the property. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the property.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the name is set, the method will return true. False      otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setStyle',
                'access-modifier' => 'public function',
                'summary' => 'Sets the style at which the names of the properties will use.',
                'description' => 'Sets the style at which the names of the properties will use. Another way to set the style that will be used by the instance is to       define the global constant \'JSONX_PROP_STYLE\' and set its value to       the desired style. Note that the method will change already added properties       to the new style. Also, it will override the style which is set using       the constant \'JSONX_PROP_STYLE\'.',
                'params' => [
                    '$style' => [
                        'type' => 'string',
                        'description' => 'The style that will be used. It can be one of the       following values:      <ul>      <li>camel</li>      <li>kebab</li>      <li>snake</li>      <li>none</li>      </ul>',
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
                'name' => 'setValue',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property.',
                'description' => 'Sets the value of the property. ',
                'params' => [
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The value of the property. This can be a string or      array or number or an object or null.',
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