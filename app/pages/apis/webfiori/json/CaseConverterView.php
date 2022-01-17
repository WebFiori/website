<?php
namespace docGenerator\webfiori\json;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CaseConverterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to convert string case from one to another (e.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CaseConverter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CaseConverter', '\webfiori\json', 'A class which is used to convert string case from one to another (e. g. camle to snake).'));
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
                'name' => 'convert',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a string to specific case.',
                'description' => 'Converts a string to specific case. ',
                'params' => [
                    '$value' => [
                        'type' => 'string',
                        'description' => 'The string that will be converted.',
                        'optional' => false,
                    ],
                    '$style' => [
                        'type' => 'string',
                        'description' => 'The name of the style that the given string will be       converted to. It can be one of 3 values:      <ul>      <li>snake</li>      <li>kebab</li>      <li>camel</li>      </ul>      If the given value is non of the given 3, the string woun\'t be changed.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The same string converted to selected style.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toCamelCase',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a string to camel case.',
                'description' => 'Converts a string to camel case. ',
                'params' => [
                    '$value' => [
                        'type' => 'string',
                        'description' => 'A string such as \'my-val\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the string after conversion. For      example, if the string is \'my-val\', the method will return the string \'myVal\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toKebabCase',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a string to kebab case.',
                'description' => 'Converts a string to kebab case. ',
                'params' => [
                    '$value' => [
                        'type' => 'string',
                        'description' => 'A string such as \'myVal\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the string after conversion. For      example, if the string is \'myVal\', the method will return the string \'my-val\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toSnackCase',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a string to snake case.',
                'description' => 'Converts a string to snake case. ',
                'params' => [
                    '$value' => [
                        'type' => 'string',
                        'description' => 'A string such as \'my-val\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the string after conversion. For      example, if the string is \'my-val\', the method will return the string \'my_val\'.',
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