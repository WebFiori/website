<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class StdInView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that implements default standard output for command line interface.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class StdIn');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'StdIn', '\webfiori\framework\cli', 'A class that implements default standard output for command line interface. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'KEY_MAP',
            'An array that holds a map of special keyboard keys codes and the       meaning of each code.',
            'An array that holds a map of special keyboard keys codes and the       meaning of each code. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'read',
                'access-modifier' => 'public function',
                'summary' => 'Reads a string of bytes from STDIN.',
                'description' => 'Reads a string of bytes from STDIN. This method is used to read specific number of characters from STDIN.',
                'params' => [
                    '$bytes ' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => true,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the string which was given as input       in STDIN.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'readLine',
                'access-modifier' => 'public function',
                'summary' => 'Reads one line from STDIN.',
                'description' => 'Reads one line from STDIN. The method will continue to read from STDIN till it finds end of       line character "\\n".',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the string which was taken from       STDIN without the end of line character.',
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