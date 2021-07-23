<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class OrderedListView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents ordered list (ol).');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class OrderedList');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'OrderedList', '\webfiori\ui', 'A class that represents ordered list (ol). '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$arrOfItems' => [
                        'type' => 'array',
                        'description' => 'An array that contains strings       that represents each list item. Also, it can have objects of type       \'ListItem\'.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is true.',
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