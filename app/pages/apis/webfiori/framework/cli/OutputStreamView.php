<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class OutputStreamView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An interface that can be used to implement output streams at which CLI  can send output to.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('interface OutputStream');
        $this->insert($this->getTheme()->createClassDescriptionNode('interface', 'OutputStream', '\webfiori\framework\cli', 'An interface that can be used to implement output streams at which CLI  can send output to. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'println',
                'access-modifier' => 'public function',
                'summary' => 'Print out a string and terminates the current line by writing the       line separator string (or PHP_EOL).',
                'description' => 'Print out a string and terminates the current line by writing the       line separator string (or PHP_EOL). The implementation of this method should work like the function fprintf().',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'The string that will be printed to the stream.',
                        'optional' => false,
                    ],
                    '$_' => [
                        'type' => 'mixed',
                        'description' => 'One or more extra arguments that can be supplied to the       method.',
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