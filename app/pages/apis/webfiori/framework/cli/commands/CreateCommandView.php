<?php
namespace docGenerator\webfiori\framework\cli\commands;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CreateCommandView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A command which is used to automate some of the common tasks such as   creating table classes or controllers.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CreateCommand');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CreateCommand', '\webfiori\framework\cli\commands', 'A command which is used to automate some of the common tasks such as   creating table classes or controllers. Note that this feature is Experimental and might have issues. Also, it   might be removed in the future.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '_createEntityFromQuery',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'exec',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClassInfo',
                'access-modifier' => 'public function',
                'summary' => 'Prompts the user to enter class information such as it is name.',
                'description' => 'Prompts the user to enter class information such as it is name. This method is useful in case we would like to create a class.',
                'params' => [
                    '$defaltNs ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an array that contains 3 indices:       <ul>      <li><b>name</b>: The name of the class.</li>      <li><b>namespace</b>: The namespace of the class. It will be empty string if no       namespace is entered.</li>      <li><b>path</b>: The location at which the class will be created.</li>      </ul>',
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