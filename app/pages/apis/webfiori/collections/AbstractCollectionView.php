<?php
namespace docGenerator\webfiori\collections;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AbstractCollectionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A base class that can be used to create different collections.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class AbstractCollection');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'AbstractCollection', '\webfiori\collections', 'A base class that can be used to create different collections. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the collection and its element.',
                'description' => 'Returns a string that represents the collection and its element. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the collection and its element.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'add',
                'access-modifier' => 'public abstract function',
                'summary' => 'Adds new element to the collection.',
                'description' => 'Adds new element to the collection. ',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be added. It can be of any type. Note       that the value is passed by reference.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method should be implemented in a way that it returns       true if the element is added and returns false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'count',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of elements in the collection.',
                'description' => 'Returns the number of elements in the collection. This one is similar to calling the method "AbstractCollection::<a href="#size">size()</a>".',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Number of elements in the collection.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'size',
                'access-modifier' => 'public abstract function',
                'summary' => 'Returns the number of elements in the collection.',
                'description' => 'Returns the number of elements in the collection. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of elements in the collection.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toArray',
                'access-modifier' => 'public abstract function',
                'summary' => 'Returns an array that contains the elements of the collection.',
                'description' => 'Returns an array that contains the elements of the collection. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the elements of the collection.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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