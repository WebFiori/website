<?php
namespace docGenerator\webfiori\collections;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ComparableView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An interface that is used to compare objects.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('interface Comparable');
        $this->insert($this->getTheme()->createClassDescriptionNode('interface', 'Comparable', '\webfiori\collections', 'An interface that is used to compare objects. It is used by the class   LinkedList\'s sorting method in order to compare objects.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'compare',
                'access-modifier' => 'public function',
                'summary' => 'Compare the given instance with another object.',
                'description' => 'Compare the given instance with another object. The implementation of this method should be as follows.       If the two objects are equal, the method should return 0.       If the current instance is greater, the method should return positive number.       If the object at the parameter is greater, the method should return a negative number.',
                'params' => [
                    '$other' => [
                        'type' => 'mixed',
                        'description' => 'The other variable that will be compared       with.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'Negative value, 0 or positive value.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
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