<?php
namespace docGenerator\webfiori\framework\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MessageBoxView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A generic class for showing a floating box in web pages that can have any content   in its body.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MessageBox');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MessageBox', '\webfiori\framework\ui', 'A generic class for showing a floating box in web pages that can have any content   in its body. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&getBody',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node that represents the body of the message.',
                'description' => 'Returns the node that represents the body of the message. The returned node can be used to display content in box body.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'a node that represents the body of message box.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&getHeader',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node that represents the header of the message.',
                'description' => 'Returns the node that represents the header of the message. The returned node can be used to add extra content to the header.       By default, the header will have a close button.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'a node that represents the header of message box.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCount',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the number of message boxes which has been created.',
                'description' => 'Returns the number of message boxes which has been created. The count will manly depends on the number of instances that was created.       Every instance will increment the value by 1.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of message boxes which has been created.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isInitialized',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the message box is fully initialized.',
                'description' => 'Checks if the message box is fully initialized. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the message box is fully       initialized and its components are ready for use. False if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
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