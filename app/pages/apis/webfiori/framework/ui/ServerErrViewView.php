<?php
namespace docGenerator\webfiori\framework\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ServerErrViewView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A page which is used to display exception information when it is thrown or   any other errors.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ServerErrView');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ServerErrView', '\webfiori\framework\ui', 'A page which is used to display exception information when it is thrown or   any other errors. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates a new instance of the class.',
                'description' => 'Creates a new instance of the class. ',
                'params' => [
                    '$throwableOrErr' => [
                        'type' => 'Throwable|array',
                        'description' => 'This can be an instance of the       interface \'Throwable\' or it can be an array that contains error information       which was returned from the method \'error_get_last()\'.',
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
                'name' => 'show',
                'access-modifier' => 'public function',
                'summary' => 'Show the view.',
                'description' => 'Show the view. ',
                'params' => [
                    '$responseCode' => [
                        'type' => 'int',
                        'description' => 'A response code to send before showing the view.       default is 500 - Server Error.',
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