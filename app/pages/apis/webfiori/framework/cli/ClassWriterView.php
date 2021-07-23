<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ClassWriterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A utility class which is used as a helper class with the command \'create\'.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ClassWriter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ClassWriter', '\webfiori\framework\cli', 'A utility class which is used as a helper class with the command \'create\'. This class can be used to write .php classes.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$classInfoArr' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains the information       of the class that will be created. The array must have the following indices:       <ul>      <li><b>name</b>: The name of the class that will be created. If not provided, the       string \'NewClass\' is used.</li>      <li><b>namespace</b>: The namespace that the class will belong to. If not provided,       the namespace \'webfiori\' is used.</li>      <li><b>path</b>: The location at which the class will be created on. If not       provided, the constant ROOT_DIR is used. </li>            </ul>',
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
                'name' => 'append',
                'access-modifier' => 'public function',
                'summary' => 'Appends a string to the string that represents the body of the class.',
                'description' => 'Appends a string to the string that represents the body of the class. ',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'The string that will be appended. At the end of the string       a new line character will be appended.',
                        'optional' => false,
                    ],
                    '$tapsCount' => [
                        'type' => 'int',
                        'description' => 'The number of taps that will be added to the string.       A tap is represented as 4 spaces.',
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
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the class that will be created.',
                'description' => 'Returns the name of the class that will be created. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the class that will be created.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getNamespace',
                'access-modifier' => 'public function',
                'summary' => 'Returns the namespace at which the generated class will be added to.',
                'description' => 'Returns the namespace at which the generated class will be added to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The namespace at which the generated class will be added to.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPath',
                'access-modifier' => 'public function',
                'summary' => 'Returns the location at which the class will be created on.',
                'description' => 'Returns the location at which the class will be created on. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The location at which the class will be created on.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'writeClass',
                'access-modifier' => 'public function',
                'summary' => 'Write the new class to a .',
                'description' => 'Write the new class to a . php file.',
                'params' => [
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