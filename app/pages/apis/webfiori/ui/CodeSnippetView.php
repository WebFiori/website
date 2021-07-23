<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CodeSnippetView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to display code snippits in good looking way.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CodeSnippet');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CodeSnippet', '\webfiori\ui', 'A class that can be used to display code snippits in good looking way. The class has a set of nodes which defines the following attributes of a   code block:  <ul>  <li>A title for the code snippit.</li>  <li>Line numbers.</li>  <li>The code it self.</li>  </ul>  The developer can use the following CSS selectors (class selector) to customize the snippit   using CSS:  <ul>  <li>code-snippit: The container that contains all other elements.</li>  <li>snippit-title: Can be used to customize the look and feel of snippit title.</li>  <li>line-numbers: A container that contains a set of span elements which has   line numbers.</li>  <li>line-number: A single span element that contains line number.</li>  <li>code-display: An area that contains pre element which wraps a code element.</li>  <li>code: The container that contains the code.</li>  </ul>'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$title' => [
                        'type' => 'string',
                        'description' => 'The title of the snippit. This will appear at the top       of the element. It can be something like \'PHP Code\' or \'Java Code\'.',
                        'optional' => false,
                    ],
                    '$code' => [
                        'type' => 'string',
                        'description' => 'The code that will be displayed by the snippit.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addCodeLine',
                'access-modifier' => 'public function',
                'summary' => 'Adds new line of code to the code snippit.',
                'description' => 'Adds new line of code to the code snippit. ',
                'params' => [
                    '$codeAsTxt' => [
                        'type' => 'string',
                        'description' => 'The code line. It does not have to include "\\n"       character as the method will append it automatically to the string.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCodeElement',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node that contains the code that will be shown by the snippit.',
                'description' => 'Returns the node that contains the code that will be shown by the snippit. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The node that contains the code that will be shown by the snippit.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOriginalCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns the original text which represents the code.',
                'description' => 'Returns the original text which represents the code. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The original text that represents the code.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOriginalTitle',
                'access-modifier' => 'public function',
                'summary' => 'Returns the original code title as supplied for the method CodeSnippit::setTitle().',
                'description' => 'Returns the original code title as supplied for the method CodeSnippit::setTitle(). ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The original code title as supplied for the method       CodeSnippit::setTitle().',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitle',
                'access-modifier' => 'public function',
                'summary' => 'Returns the title of the code snippit.',
                'description' => 'Returns the title of the code snippit. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The title of the code snippit. Note that The title which       will be returned by this method will have HTML special characters escaped.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCode',
                'access-modifier' => 'public function',
                'summary' => 'Sets the code that will be displayed by the snippit block.',
                'description' => 'Sets the code that will be displayed by the snippit block. ',
                'params' => [
                    '$code' => [
                        'type' => 'string',
                        'description' => 'The code. Note that to make the code appears in       multi-lines, it must be included between double quotation marks.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setTitle',
                'access-modifier' => 'public function',
                'summary' => 'Sets the title of the snippit.',
                'description' => 'Sets the title of the snippit. This can be used to specify the language the code represents (e.g.       \'Java Code\' or \'HTML Code\'. The title will appear at the top of the snippit       block.',
                'params' => [
                    '$title' => [
                        'type' => 'string',
                        'description' => 'The title of the snippit.',
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