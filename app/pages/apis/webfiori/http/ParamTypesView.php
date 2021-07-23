<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ParamTypesView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that contains constants for representing request parameters types.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ParamTypes');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ParamTypes', '\webfiori\http', 'A class that contains constants for representing request parameters types. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'ARR',
            'A constant to indicate that a parameter is of type array.',
            'A constant to indicate that a parameter is of type array. ',
            ),
            new AttributeDef(
            'const',
            '',
            'BOOL',
            'A constant to indicate that a parameter is of type boolean.',
            'A constant to indicate that a parameter is of type boolean. ',
            ),
            new AttributeDef(
            'const',
            '',
            'DOUBLE',
            'A constant to indicate that a parameter is of type float or double.',
            'A constant to indicate that a parameter is of type float or double. ',
            ),
            new AttributeDef(
            'const',
            '',
            'EMAIL',
            'A constant to indicate that a parameter is of type email.',
            'A constant to indicate that a parameter is of type email. ',
            ),
            new AttributeDef(
            'const',
            '',
            'INT',
            'A constant to indicate that a parameter is of type integer.',
            'A constant to indicate that a parameter is of type integer. ',
            ),
            new AttributeDef(
            'const',
            '',
            'JSON_OBJ',
            'A constant to indicate that a parameter is of type JSON object.',
            'A constant to indicate that a parameter is of type JSON object. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STRING',
            'A constant to indicate that a parameter is of type string.',
            'A constant to indicate that a parameter is of type string. ',
            ),
            new AttributeDef(
            'const',
            '',
            'URL',
            'A constant to indicate that a parameter is of type url.',
            'A constant to indicate that a parameter is of type url. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'getTypes',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains all supported parameters types.',
                'description' => 'Returns an array that contains all supported parameters types. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains all supported parameters types.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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