<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InputStreamView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An interface that can be used to implement input streams at which CLI  can read input from.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('interface InputStream');
        $this->insert($this->getTheme()->createClassDescriptionNode('interface', 'InputStream', '\webfiori\framework\cli', 'An interface that can be used to implement input streams at which CLI  can read input from. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'read',
                'access-modifier' => 'public function',
                'summary' => 'Reads specific number of bytes from the stream.',
                'description' => 'Reads specific number of bytes from the stream. ',
                'params' => [
                    '$bytes' => [
                        'type' => 'int',
                        'description' => 'The number of bytes at which the method will read.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should return the bytes as string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
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