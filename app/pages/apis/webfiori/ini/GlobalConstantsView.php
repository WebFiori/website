<?php
namespace docGenerator\webfiori\ini;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class GlobalConstantsView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used to initialize global constants.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class GlobalConstants');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'GlobalConstants', '\webfiori\ini', 'A class which is used to initialize global constants. This class has one static method which is used to define the constants.  The class can be used to initialize any constant that the application depends   on. The constants that this class will initialize are the constants which   uses the function <code>define()</code>.  Also, the developer can modify existing ones as needed to change some of the   default settings of the framework.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'defineConstants',
                'access-modifier' => 'public static function',
                'summary' => 'Initialize the constants.',
                'description' => 'Initialize the constants. Include your own in the body of this method or modify existing ones       to suite your configuration. It is recommended to check if the global       constant is defined or not before defining it using the function       <code>defined</code>.',
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