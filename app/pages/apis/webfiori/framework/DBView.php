<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class DBView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to represent system database.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class DB');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'DB', '\webfiori\framework', 'A class that can be used to represent system database. The developer can extend this class to have his own database schema. The main   aim of this class is to make it easy for developers to use the connections   which are stored in the class \'Config\'.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$connName' => [
                        'type' => 'ConnectionInfo|string',
                        'description' => 'This can be an object that holds       connection information or a string that represents connection name as       specified when the connection was added to the file \'Config.php\'.',
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
                'name' => 'register',
                'access-modifier' => 'public function',
                'summary' => 'Auto-register database tables which exist on a specific directory.',
                'description' => 'Auto-register database tables which exist on a specific directory. Note that the statement \'return __NAMESPACE__\' must be included at the       end of the table class for auto-register to work. If the statement       does not exist, the method will assume that the path is the namespace of       the classes. Also, the classes which represents tables must be suffixed       with the word \'Table\' (e.g. UsersTable).',
                'params' => [
                    '$pathToScan' => [
                        'type' => 'string',
                        'description' => 'A path which is relative to application source       code. For example, if tables classes exist in the folder       \'C:\\Server\\apache\\htdocs\\app\\database\', then the value of this       argument must be \'app\\database\\.',
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