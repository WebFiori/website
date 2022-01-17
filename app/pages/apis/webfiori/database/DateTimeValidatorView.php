<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class DateTimeValidatorView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A utility class which is used to validate date and time strings  for insert and update operations.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class DateTimeValidator');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'DateTimeValidator', '\webfiori\database', 'A utility class which is used to validate date and time strings  for insert and update operations. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'isValidDate',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if date string represents a valid date.',
                'description' => 'Checks if date string represents a valid date. ',
                'params' => [
                    '$date' => [
                        'type' => 'string',
                        'description' => 'A string that represents the date in the format       YYYY-MM-DD.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the string represents a valid date, the method will return      true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isValidDateTime',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if a date-time string is valid or not.',
                'description' => 'Checks if a date-time string is valid or not. ',
                'params' => [
                    '$dateTime' => [
                        'type' => 'string',
                        'description' => 'A date string in the format \'YYYY-MM-DD HH:MM:SS\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the string represents correct date and time, the       method will return true. False if it is not valid.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isValidTime',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if time string represents a valid time.',
                'description' => 'Checks if time string represents a valid time. ',
                'params' => [
                    '$time' => [
                        'type' => 'string',
                        'description' => 'A string that represents the time in the format       HH:MM:SS. Note that the hours are in the 24 hours mode.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the string represents a valid time, it will return      true. Other than that, the method will return false.',
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