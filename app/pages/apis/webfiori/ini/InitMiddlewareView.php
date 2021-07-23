<?php
namespace docGenerator\webfiori\ini;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InitMiddlewareView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('Register middleware which are created outside the folder \'app/middleware\'.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class InitMiddleware');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'InitMiddleware', '\webfiori\ini', 'Register middleware which are created outside the folder \'app/middleware\'. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'init',
                'access-modifier' => 'public static function',
                'summary' => 'Register middleware.',
                'description' => 'Register middleware. The main aim of this method is to give the developer a way to register       the middleware which are created outside the folder \'app/pages\'. To register       any middleware, use the method MiddlewareManager::register().',
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