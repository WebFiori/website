<?php
namespace docGenerator\webfiori\ini;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InitAutoLoadView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that has one method to initialize user-defined autoload directories.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class InitAutoLoad');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'InitAutoLoad', '\webfiori\ini', 'A class that has one method to initialize user-defined autoload directories. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'init',
                'access-modifier' => 'public static function',
                'summary' => 'Add user-defined directories to the set of directories at which the framework       will search for classes.',
                'description' => 'Add user-defined directories to the set of directories at which the framework       will search for classes. The developer can use the method AutoLoader::newSearchFolder() to add       new search directory. Note that the developer does not have to       register the folder \'vendor\' as it will be auto-registered.',
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