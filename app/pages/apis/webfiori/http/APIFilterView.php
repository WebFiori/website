<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class APIFilterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class used to validate and sanitize request parameters.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class APIFilter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'APIFilter', '\webfiori\http', 'A class used to validate and sanitize request parameters. This class is the core class which is used to manage and set request   parameters.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'INVALID',
            'A constant that indicates a given value is invalid.',
            'A constant that indicates a given value is invalid. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'addRequestParameter',
                'access-modifier' => 'public function',
                'summary' => 'Adds a new request parameter to the filter.',
                'description' => 'Adds a new request parameter to the filter. ',
                'params' => [
                    '$reqParam' => [
                        'type' => 'RequestParameter',
                        'description' => 'The request parameter that will be added.',
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
                'name' => 'clearInputs',
                'access-modifier' => 'public function',
                'summary' => 'Clears the arrays that are used to store filtered and not-filtered variables.',
                'description' => 'Clears the arrays that are used to store filtered and not-filtered variables. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clearParametersDef',
                'access-modifier' => 'public function',
                'summary' => 'Clears filter parameters.',
                'description' => 'Clears filter parameters. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'filter',
                'access-modifier' => 'public static function',
                'summary' => 'Filter the values of an associative array.',
                'description' => 'Filter the values of an associative array. The filtering algorithm will work as follows:      <ul>      <li>First, check if $arr[\'param-name\'] is set.</li>      <li>If not set, check if its optional. If optional and default value is       given, then use default value. Else, set the filtered value to null.</li>      <li>If arr[\'param-name\'] is given, then do the following steps:      <ul>      <li>First, apply basic filtering (if applicable).</li>      <li>If custom filter is provided, then apply it.</li>      </ul>      </li>      </ul>',
                'params' => [
                    '$apiFilter' => [
                        'type' => 'APIFilter',
                        'description' => 'An instance of the class \'APIFilter\' that       contains filter constrains.',
                        'optional' => false,
                    ],
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An associative array of values which will be filtered.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an associative array which has two       indices. The index with key \'filtered\' will contain an array which       has all values filtered. The index which has the key \'non-filtered\'       will contain the original values.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getFilterDef',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains filter constraints.',
                'description' => 'Returns an array that contains filter constraints. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains filter constraints.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getInputStreamPath',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents input stream path.',
                'description' => 'Returns a string that represents input stream path. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        'null
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getInputs',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array or object of type \'Json\' that contains       request body inputs.',
                'description' => 'Returns an associative array or object of type \'Json\' that contains       request body inputs. The data in the array or the object will have the filters applied to.       Note that if parameter type is \'json-obj\', no basic filtering will       be applied. Only custom filter.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array that contains request inputs. If no data was       filtered, the method will return null. If the request content type was       \'application/json\', the method will return an instance of the class       \'Json\' that has all JSON information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setInputStream',
                'access-modifier' => 'public function',
                'summary' => 'Sets the stream at which the filter will use to read the inputs.',
                'description' => 'Sets the stream at which the filter will use to read the inputs. This can be used to test the filter if body content type is       \'application/json\'.',
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
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;