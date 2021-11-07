<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class EAbstractWebServiceView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which represents a web service.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class EAbstractWebService');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'EAbstractWebService', '\webfiori\framework', 'A class which represents a web service. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'getManager',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/ExtendedWebServicesManager', 'ExtendedWebServicesManager'),
                        'null
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setManager',
                'access-modifier' => 'public function',
                'summary' => 'Associate the web service with a manager.',
                'description' => 'Associate the web service with a manager. The developer does not have to use this method. It is used when a       service is added to a manager.',
                'params' => [
                    '$manager' => [
                        'type' => 'ExtendedWebServicesManager|null',
                        'description' => 'The manager at which the service       will be associated with. If null is given, the association will be removed if       the service was associated with a manager.',
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