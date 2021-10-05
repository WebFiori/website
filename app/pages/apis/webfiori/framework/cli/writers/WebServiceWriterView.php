<?php
namespace docGenerator\webfiori\framework\cli\writers;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class WebServiceWriterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A writer class which is used to create new web service class.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class WebServiceWriter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'WebServiceWriter', '\webfiori\framework\cli\writers', 'A writer class which is used to create new web service class. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$webServicesObj' => [
                        'type' => 'AbstractWebService',
                        'description' => 'The object that will be written to the       class.',
                        'optional' => false,
                    ],
                    '$classInfoArr' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains the information       of the class that will be created. The array must have the following indices:       <ul>      <li><b>name</b>: The name of the class that will be created. If not provided, the       string \'NewClass\' is used.</li>      <li><b>namespace</b>: The namespace that the class will belong to. If not provided,       the namespace \'webfiori\' is used.</li>      <li><b>path</b>: The location at which the query will be created on. If not       provided, the constant ROOT_DIR is used. </li>      </ul>',
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