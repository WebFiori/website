<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class LabelView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents &lt;label&gt; tag.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Label');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Label', '\webfiori\ui', 'A class that represents &lt;label&gt; tag. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates a new label node with specific text on it.',
                'description' => 'Creates a new label node with specific text on it. ',
                'params' => [
                    '$text' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'The text that will be displayed by the label.       This also can be an object of type \'HTMLNode\'.      Default is empty string.',
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
                'name' => 'setFor',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'for\'.',
                'description' => 'Sets the value of the attribute \'for\'. ',
                'params' => [
                    '$elIdOrInput' => [
                        'type' => 'string|Input',
                        'description' => 'It can be the value of the \'id\' attribute       of an input element or it can be an instance of the class \'Input\'. Note       that if the provided value is an instance of \'Input\', then the attribute       \'id\' must be set first.',
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
                'summary' => 'Sets the text that will be displayed by the label.',
                'description' => 'Sets the text that will be displayed by the label. This method is applicable only if the first child of the label       is of type \'#TEXT\'.',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text that will be displayed by the label.',
                        'optional' => false,
                    ],
                    '$escEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to TRUE, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is TRUE.',
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