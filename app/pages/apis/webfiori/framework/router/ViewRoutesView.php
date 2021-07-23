<?php
namespace docGenerator\webfiori\framework\router;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ViewRoutesView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that only has one method to initiate some of system routes.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ViewRoutes');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ViewRoutes', '\webfiori\framework\router', 'A class that only has one method to initiate some of system routes. The class is meant to only initiate the routes which uses the method   Router::view().'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'create',
                'access-modifier' => 'public static function',
                'summary' => 'Create all views routes.',
                'description' => 'Create all views routes. Include your own here.',
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