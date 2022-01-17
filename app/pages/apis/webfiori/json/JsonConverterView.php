<?php
namespace docGenerator\webfiori\json;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class JsonConverterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class to convert Json instance to it\'s JSON string representation.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class JsonConverter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'JsonConverter', '\webfiori\json', 'A class to convert Json instance to it\'s JSON string representation. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'objectToJson',
                'access-modifier' => 'public static function',
                'summary' => 'Convert an object to Json object.',
                'description' => 'Convert an object to Json object. Note that the properties which will be in the generated Json      object will depend on the public \'get\' methods of the object.      The name of the properties will depend on the name of the method. For      example, if the name of one of the methods is \'getFullName\', then      property name will be \'FullName\'.',
                'params' => [
                    '$obj' => [
                        'type' => 'object',
                        'description' => 'The object that will be converted.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'Json
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'propertyToJsonString',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a JSON property to its JSON string representation.',
                'description' => 'Converts a JSON property to its JSON string representation. ',
                'params' => [
                    '$prop' => [
                        'type' => 'Property',
                        'description' => 'The property that will be converted.',
                        'optional' => false,
                    ],
                    '$formatted' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the generated output will have      indentations and new lines which makes it readable.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'JSON representation of the property as string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'propertyToJsonXString',
                'access-modifier' => 'public static function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    'Property $prop' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' $withName ' => [
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
                'name' => 'toJsonString',
                'access-modifier' => 'public static function',
                'summary' => 'Convert Json instance to it\'s JSON string representation.',
                'description' => 'Convert Json instance to it\'s JSON string representation. ',
                'params' => [
                    '$jsonObj' => [
                        'type' => 'Json',
                        'description' => 'The object that will be converted.',
                        'optional' => false,
                    ],
                    '$formatted' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the generated output will have      indentation and new lines which makes it readable. Note that the      size of generated string will increase if set to true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'A well formatted JSON string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toJsonXString',
                'access-modifier' => 'public static function',
                'summary' => 'Converts an instance of Json to JSONx string.',
                'description' => 'Converts an instance of Json to JSONx string. ',
                'params' => [
                    '$json' => [
                        'type' => 'Json',
                        'description' => 'The object that holds the attributes.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'Returns XML string that represents Json schema.',
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