<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ParagraphView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a paragraph element.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Paragraph');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Paragraph', '\webfiori\ui', 'A class that represents a paragraph element. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'ALLOWED_CHILDS',
            '',
            ' ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new paragraph node.',
                'description' => 'Creates new paragraph node. ',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'An optional paragraph text.',
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
                'name' => 'addChild',
                'access-modifier' => 'public function',
                'summary' => 'Adds new child node.',
                'description' => 'Adds new child node. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode',
                        'description' => 'The node that will be added. The paragraph element       can only accept the addition of in-line HTML elements.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array|boolean',
                        'description' => 'Not used if boolean is given. If an array is given, it       will act as properties for the newly added node.',
                        'optional' => false,
                    ],
                    '$chainOnParent' => [
                        'type' => 'array',
                        'description' => 'Not used.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will always return the same instance at       which the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Paragraph', 'Paragraph'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addText',
                'access-modifier' => 'public function',
                'summary' => 'Appends new text to the body of the paragraph.',
                'description' => 'Appends new text to the body of the paragraph. ',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text that will be added.',
                        'optional' => false,
                    ],
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An array that contains a key value pairs       of text options. The supported options are:      <ul>      <li><b>bold:</b> Makes the text bold.</li>      <li><b>esc-entities</b>: If set to TRUE, HTML entities will be escaped. Default is TRUE.</li>      <li><b>italic:</b> Makes the text italic.</li>      <li><b>em:</b> Insert the text within \'em\' element.</li>      <li><b>underline:</b> Adds a line underneath the text.</li>      <li><b>overline:</b> Adds a line on the top of the text.</li>      <li><b>strikethrough:</b> Adds a line through the text.</li>      <li><b>color:</b> Sets the color of the text.</li>      <li><b>href:</b>Make the text as a link. The value of this key must be a link.</li>      <li><b>new-line:</b> Insert line break after the text.</li>      <li><b>is-abbr:</b> NOT USED.</li>      <li><b>abbr-title:</b> NOT USED.</li>      <li><b>abbr-def:</b> NOT USED.</li>            </ul>',
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
                'name' => 'clear',
                'access-modifier' => 'public function',
                'summary' => 'Clears the text of the paragraph.',
                'description' => 'Clears the text of the paragraph. ',
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