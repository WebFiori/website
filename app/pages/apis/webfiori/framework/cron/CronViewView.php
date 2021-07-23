<?php
namespace docGenerator\webfiori\framework\cron;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CronViewView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A generic view for cron related operations.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CronView');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CronView', '\webfiori\framework\cron', 'A generic view for cron related operations. It can be extended to create a view which is used to   perform some operations on cron jobs.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                    '$title' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$description ' => [
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
                'name' => 'createOutputWindow',
                'access-modifier' => 'public function',
                'summary' => 'Adds an area which is used to show server output.',
                'description' => 'Adds an area which is used to show server output. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getControlsContainer',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'HTMLNode
',
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