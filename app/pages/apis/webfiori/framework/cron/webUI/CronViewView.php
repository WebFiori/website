<?php
namespace docGenerator\webfiori\framework\cron\webUI;
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
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CronView', '\webfiori\framework\cron\webUI', 'A generic view for cron related operations. It can be extended to create a view which is used to   perform some operations on cron jobs.'));
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
                    ' $description ' => [
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
                'name' => 'createVDialog',
                'access-modifier' => 'public function',
                'summary' => 'Adds a very basic v-dialog that can be used to show status messages and so on.',
                'description' => 'Adds a very basic v-dialog that can be used to show status messages and so on. ',
                'params' => [
                    '$model' => [
                        'type' => 'string',
                        'description' => 'The vue model which is used to make the dialig visible.',
                        'optional' => false,
                    ],
                    '$titleModel' => [
                        'type' => 'string',
                        'description' => 'A string that represents the model which is used       to set the title.',
                        'optional' => false,
                    ],
                    '$messageModel' => [
                        'type' => 'string',
                        'description' => 'The name of the model that will hold dialog      message.',
                        'optional' => false,
                    ],
                    '$closeAction' => [
                        'type' => 'string',
                        'description' => 'The name of the method which will be invoked       when close button is clicked.',
                        'optional' => false,
                    ],
                    '$iconProps' => [
                        'type' => 'array',
                        'description' => 'An optional array that holds icon props. the       array can have two indices: \'model\' and \'color-model\'.',
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
                'name' => 'getJson',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'Json
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