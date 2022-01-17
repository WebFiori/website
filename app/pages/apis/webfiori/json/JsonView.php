<?php
namespace docGenerator\webfiori\json;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class JsonView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to create well formatted JSON strings.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Json');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Json', '\webfiori\json', 'A class that can be used to create well formatted JSON strings. The class follows the specifications found at https://www.json.org/index.html.  This class is useful in collecting server variables and sends them back as   JSON object to the clients that supports JSON.  The process of creating JSON strings using this class is as follows:  <ul>  <li>Create new instance of the class.</li>  <li>Add the data that will be decoded to JSON format using   the proper method.</li>  <li>To see the generated JSON, simply use the command \'echo\'   against the created instance.</li>  </ul>'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'SPECIAL_CHARS',
            'An array that contains JSON special characters.',
            'An array that contains JSON special characters. The array contains the following characters:      <ul>      <li>\\</li>      <li>/</li>      <li>"</li>      <li>\\t</li>      <li>\\r</li>      <li>\\n</li>      <li>\\f</li>      </ul>',
            ),
            new AttributeDef(
            'const',
            '',
            'SPECIAL_CHARS_ESC',
            'An array that contains escaped JSON special characters.',
            'An array that contains escaped JSON special characters. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&get',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value at the given key.',
                'description' => 'Returns the value at the given key. ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The value of the key. Note that the style of the key       does not matter.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The return type will depends on the value which       was set by any method which can be used to add props. It can be a number,       a boolean, string, an object or null if does not exist.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                        'mixed',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$initialData' => [
                        'type' => 'array|string',
                        'description' => 'Initial data which is used to initialize       the object. It can be a string which looks like JSON or it can be an       associative array. If it is an associative array, then the keys will be       acting as properties and the value of each key will be the value of       the property.',
                        'optional' => false,
                    ],
                    '$isFormatted' => [
                        'type' => 'boolean',
                        'description' => 'If this attribute is set to true, the generated       JSON will be indented and have new lines (readable). Note that the parameter       will be ignored if the constant \'WF_VERBOSE\' is defined and is set to true.',
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
                'summary' => 'Returns the data on the object as a JSON string.',
                'description' => 'Returns the data on the object as a JSON string. ',
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
                'name' => 'add',
                'access-modifier' => 'public function',
                'summary' => 'Adds a new value to the JSON string.',
                'description' => 'Adds a new value to the JSON string. This method can be used to add an integer, a double,       a string, an array or an object. If null is given, the method will       set the value at the given key to null. If the given value or key is       invalid, the method will not add the value and will return false.',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The value of the key.',
                        'optional' => false,
                    ],
                    '$value' => [
                        'type' => 'mixed',
                        'description' => 'The value of the key.',
                        'optional' => false,
                    ],
                    '$arrayAsObj' => [
                        'type' => 'array',
                        'description' => 'This parameter is used only if the given value      is an array. If set to true, the array will be added as an object.       Default is false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the value is set.       If the given value or key is invalid, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addArray',
                'access-modifier' => 'public function',
                'summary' => 'Adds an array to the JSON.',
                'description' => 'Adds an array to the JSON. ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of the key.',
                        'optional' => false,
                    ],
                    '$value' => [
                        'type' => 'array',
                        'description' => 'The array that will be added.',
                        'optional' => false,
                    ],
                    '$asObject' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true,       the array will be added as an object in JSON string. Note that if the       array is associative, each index will be added as an object. Default is false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return false if the given key is invalid       or the given value is not an array.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addBoolean',
                'access-modifier' => 'public function',
                'summary' => 'Adds a boolean value (true or false) to the JSON data.',
                'description' => 'Adds a boolean value (true or false) to the JSON data. ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of the key.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'boolean',
                        'description' => 'true or false. If not specified,       The default will be true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true in case the value is set.       If the given value is not a boolean or the key value is invalid string,       the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addMultiple',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple values to the object.',
                'description' => 'Adds multiple values to the object. ',
                'params' => [
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An associative array. The keys will act as object keys       in JSON and the values of the keys will be the values in JSON.',
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
                'name' => 'addNumber',
                'access-modifier' => 'public function',
                'summary' => 'Adds a number to the JSON data.',
                'description' => 'Adds a number to the JSON data. Note that if the given number is the constant <b>INF</b> or the constant       <b>NAN</b>, The method will add them as a string. The \'INF\' will be added      as the string "Infinity" and the \'NAN\' will be added as the string "Nan".',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of the key.',
                        'optional' => false,
                    ],
                    '$value' => [
                        'type' => 'int|double',
                        'description' => 'The value of the key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true in case the number is       added. If the given value is not a number or the key value is invalid       string, the method       will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addObject',
                'access-modifier' => 'public function',
                'summary' => 'Adds an object to the JSON string.',
                'description' => 'Adds an object to the JSON string. The object that will be added can implement the interface JsonI to make       the generated JSON string customizable. Also, the object can be of       type Json. If the given value is an object that does not implement the       interface JsonI or it is not of type Json,       The method will try to extract object information based on its "getXxxxx()" public       methods. Assuming that the object has 2 public methods with names       <code>getFirstProp()</code> and <code>getSecondProp()</code>.       In that case, the generated JSON will be on the formate       <b>{"FirstProp":"prop-1","SecondProp":""}</b>.',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The key value.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'JsonI|Json|object',
                        'description' => 'The object that will be added.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the object is added.       If the key value is invalid string, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addString',
                'access-modifier' => 'public function',
                'summary' => 'Adds a new key to the JSON data with its value as string.',
                'description' => 'Adds a new key to the JSON data with its value as string. ',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of the key. Must be non empty string.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value of the string.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true in case the string is added.       If the given value is not a string or the given key is invalid, the       method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'decode',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a JSON-like string to JSON object.',
                'description' => 'Converts a JSON-like string to JSON object. Note that this method uses the function \'json_decode()\' to parse the       given JSON string. This means same rules which applies to \'json_decode()\'      applies here.',
                'params' => [
                    '$jsonStr' => [
                        'type' => 'string',
                        'description' => 'A string which looks like JSON object.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given string represents A valid JSON, it       will be converted to Json object and returned. Other than that, the       method will return an array that contains information about parsing error.       The array will have two indices, \'error-code\' and \'error-message\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'escapeJSONSpecialChars',
                'access-modifier' => 'public static function',
                'summary' => 'Escape JSON special characters from string.',
                'description' => 'Escape JSON special characters from string. If the given string is null,the method will return empty string.',
                'params' => [
                    '$string' => [
                        'type' => 'string',
                        'description' => 'A value of one of JSON object properties.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An escaped version of the string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'fromJsonFile',
                'access-modifier' => 'public static function',
                'summary' => 'Reads JSON data from a file and convert it to an object of type \'Json\'.',
                'description' => 'Reads JSON data from a file and convert it to an object of type \'Json\'. ',
                'params' => [
                    '$pathToJsonFile' => [
                        'type' => 'string',
                        'description' => 'The full path to a file that contains       JSON data.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the method was able to read the whole data       and convert it to <code>Json</code> instance, the method will return       an object of type <code>Json</code>. If the method was unable to convert       file data to an object of type <code>Json</code>, it will return an       array that contains error information. The array will have two indices,       \'error-code\' and \'error-message\' Other than that, it will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPropStyle',
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
                'name' => 'getProperties',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds all added attributes.',
                'description' => 'Returns an array that holds all added attributes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that holds objects of type \'Property\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPropsNames',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the names of all added properties.',
                'description' => 'Returns an array that contains the names of all added properties. Note that the names may differ if properties style is changed after      adding them.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the names of all added properties.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasKey',
                'access-modifier' => 'public function',
                'summary' => 'Checks if Json instance has the given key or not.',
                'description' => 'Checks if Json instance has the given key or not. Note that if properties style is set to \'none\', the value of the key       must be exactly the same as when the property was added or the method       will consider the key as does not exist. For other styles, the method will       convert the key to selected style and check for its existence.',
                'params' => [
                    '$key' => [
                        'type' => 'string',
                        'description' => 'The name of the key.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the       key exists. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isFormatted',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the final JSON output will be formatted or not.',
                'description' => 'Checks if the final JSON output will be formatted or not. This can be used to make the generated output readable by adding       indentation and new lines.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'True if will be formatted. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'remove',
                'access-modifier' => 'public function',
                'summary' => 'Removes a property from the instance.',
                'description' => 'Removes a property from the instance. ',
                'params' => [
                    '$keyName' => [
                        'type' => 'string',
                        'description' => 'The name of the property.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the property as object if      removed. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Property', 'Property'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsFormatted',
                'access-modifier' => 'public function',
                'summary' => 'Makes the JSON output appears readable or not.',
                'description' => 'Makes the JSON output appears readable or not. If the output is formatted, the generated output will look like       a tree. If not formatted, the output string will be generated as one line.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True to make the output formatted and false to make       it not.',
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
                'name' => 'setPropsStyle',
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
                'name' => 'toJSONString',
                'access-modifier' => 'public function',
                'summary' => 'Creates and returns a well formatted JSON string that will be created using       provided data.',
                'description' => 'Creates and returns a well formatted JSON string that will be created using       provided data. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A well formatted JSON string that will be created using       provided data.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toJSONxString',
                'access-modifier' => 'public function',
                'summary' => 'Creates and returns a well formatted XML string that will be created using       provided data.',
                'description' => 'Creates and returns a well formatted XML string that will be created using       provided data. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A well formatted JSONx string that will be created using       provided data.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
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