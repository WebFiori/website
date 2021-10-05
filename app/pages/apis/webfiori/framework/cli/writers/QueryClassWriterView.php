<?php
namespace docGenerator\webfiori\framework\cli\writers;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class QueryClassWriterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to write query class from an instance of the class   \'MySQLQuery\'.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class QueryClassWriter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'QueryClassWriter', '\webfiori\framework\cli\writers', 'A class which is used to write query class from an instance of the class   \'MySQLQuery\'. This class is used to write new query class based on a temporary   query object. It is used as a helper class if the command \'create\' is executed   from CLI and the option \'Query class\' is selected.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$tableObj' => [
                        'type' => 'Table',
                        'description' => 'An object of type \'webfiori\\database\\Table\' which contains the       information of the table class that will be created.',
                        'optional' => false,
                    ],
                    '$classInfoArr' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains the information       of the class that will be created. The array must have the following indices:       <ul>      <li><b>name</b>: The name of the class that will be created. If not provided, the       string \'NewClass\' is used.</li>      <li><b>namespace</b>: The namespace that the class will belong to. If not provided,       the namespace \'webfiori\' is used.</li>      <li><b>path</b>: The location at which the query will be created on. If not       provided, the constant ROOT_DIR is used. </li>      <li><b>entity-info</b>: A sub associative array that contains information about the entity       at which the class is mapped to (if any). The array must have the following indices:      <ul>      <li><b>name</b>: The name of the entity class that will be created.</li>      <li><b>path</b>: The location at which the entity class will be created on.</li>      <li><b>namespace</b>: The namespace at which the entity belongs to.</li>      <li><b>implement-jsoni</b>: A bollean which is set to true if the entity       class will implement the interface \'JsonI\'.</li>      </ul>      </li>      </ul>',
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
                'name' => 'getEntityName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name entity class will be created.',
                'description' => 'Returns the name entity class will be created. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the entity class information is set, the method will       return a string that represents the name of the entity class.             Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getEntityNamespace',
                'access-modifier' => 'public function',
                'summary' => 'Returns the namespace that the associated entity class belongs to.',
                'description' => 'Returns the namespace that the associated entity class belongs to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the entity class information is set, the method will       return a string that represents the namespace that the entity belongs to.       Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getEntityPath',
                'access-modifier' => 'public function',
                'summary' => 'Returns the location at which the entity class will be created on.',
                'description' => 'Returns the location at which the entity class will be created on. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the entity class information is set, the method will       return a string that represents the path that the entity will be created on.       Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'writeClass',
                'access-modifier' => 'public function',
                'summary' => 'Write the query class.',
                'description' => 'Write the query class. This method will first attempt to create the query class. If it was created,       it will create the entity class which is associated with it (if any       entity is associated).',
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