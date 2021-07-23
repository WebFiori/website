<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AnchorView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents &lt;a&gt; tag.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Anchor');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Anchor', '\webfiori\ui', 'A class that represents &lt;a&gt; tag. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a new instance of the class.',
                'description' => 'Constructs a new instance of the class. ',
                'params' => [
                    '$href' => [
                        'type' => 'string',
                        'description' => 'The link.',
                        'optional' => false,
                    ],
                    '$body' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'The label to display. Also, this can be an object of       type \'HTMLNode\'. Note that if text is given and the text contains HTML       code, the method will not replace the code by HTML entities.',
                        'optional' => false,
                    ],
                    '$target' => [
                        'type' => 'string',
                        'description' => 'The value to set for the attribute \'target\'.       Default is \'_self\'.',
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
                'name' => 'setHref',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'href\' of the link tag.',
                'description' => 'Sets the value of the property \'href\' of the link tag. ',
                'params' => [
                    '$link' => [
                        'type' => 'string',
                        'description' => 'The value to set. It must be non-empty string.',
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
                'name' => 'setTarget',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'target\' of the link tag.',
                'description' => 'Sets the value of the property \'target\' of the link tag. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The value to set.',
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
                'name' => 'setText',
                'access-modifier' => 'public function',
                'summary' => 'Sets the text that will be seen by the user.',
                'description' => 'Sets the text that will be seen by the user. Note that this method is only applicable if the first child of the       anchor is of type \'#TEXT\'.',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text to set.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is false.',
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