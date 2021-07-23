<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class LangClassWriterView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A writer which is used to write any class that represents a language class.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class LangClassWriter');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'LangClassWriter', '\webfiori\framework\cli', 'A writer which is used to write any class that represents a language class. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$langCode' => [
                        'type' => 'string',
                        'description' => 'Language code such as \'AR\' or \'EN\'.',
                        'optional' => false,
                    ],
                    '$writingDir' => [
                        'type' => 'string',
                        'description' => 'Writing direction of the language such as       \'ltr\' or \'rtl\'.',
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