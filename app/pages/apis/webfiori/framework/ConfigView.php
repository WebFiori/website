<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ConfigView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An interface which holds basic methods that any application configuration   class must have.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('interface Config');
        $this->insert($this->getTheme()->createClassDescriptionNode('interface', 'Config', '\webfiori\framework', 'An interface which holds basic methods that any application configuration   class must have. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'addAccount',
                'access-modifier' => 'public function',
                'summary' => 'Adds an email account.',
                'description' => 'Adds an email account. The developer can use this method to add new account during runtime.      The account will be removed once the program finishes.',
                'params' => [
                    '$acc' => [
                        'type' => 'SMTPAccount',
                        'description' => 'an object of type SMTPAccount.',
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