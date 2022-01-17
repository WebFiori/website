<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ColumnFactoryView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A factory class for creating column objects.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ColumnFactory');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ColumnFactory', '\webfiori\database', 'A factory class for creating column objects. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'create',
                'access-modifier' => 'public static function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$database' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' $name' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    ' $options ' => [
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
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;