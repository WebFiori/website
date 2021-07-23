<?php
namespace docGenerator\webfiori\jobs;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SampleJobView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A sample job that shows how to create jobs and make them schedule automatically.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SampleJob');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SampleJob', '\webfiori\jobs', 'A sample job that shows how to create jobs and make them schedule automatically. '));
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
                'name' => 'afterExec',
                'access-modifier' => 'public function',
                'summary' => 'A code that will get executed after the job finished successfully or not.',
                'description' => 'A code that will get executed after the job finished successfully or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'execute',
                'access-modifier' => 'public function',
                'summary' => 'The actual code that will get executed when the job is running.',
                'description' => 'The actual code that will get executed when the job is running. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'onFail',
                'access-modifier' => 'public function',
                'summary' => 'Executed when the job failed to completed successfully.',
                'description' => 'Executed when the job failed to completed successfully. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'onSuccess',
                'access-modifier' => 'public function',
                'summary' => 'Executed after the job has completed without any errors.',
                'description' => 'Executed after the job has completed without any errors. ',
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