<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ListThemesCommandView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A CLI command which is used to list all registered themes.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ListThemesCommand');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ListThemesCommand', '\webfiori\framework\cli', 'A CLI command which is used to list all registered themes. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. The command will have name \'--list-themes\'. In addition to that,       it will have the following arguments:      <ul>      <li><b>theme-name</b>: If specified, only information about given theme       will be shown.</li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'exec',
                'access-modifier' => 'public function',
                'summary' => 'Execute the command.',
                'description' => 'Execute the command. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the command executed without any errors, the       method will return 0. Other than that, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
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