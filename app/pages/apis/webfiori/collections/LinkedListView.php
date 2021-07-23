<?php
namespace docGenerator\webfiori\collections;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class LinkedListView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a linked list data structure.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class LinkedList');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'LinkedList', '\webfiori\collections', 'A class that represents a linked list data structure. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&get',
                'access-modifier' => 'public function',
                'summary' => 'Returns the element at the specified index.',
                'description' => 'Returns the element at the specified index. ',
                'params' => [
                    '$index' => [
                        'type' => 'unkown_type',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The element at the specified index. If the list       is empty or the given index is out of list bounds, The method will       return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&getFirst',
                'access-modifier' => 'public function',
                'summary' => 'Returns the first element that was added to the list.',
                'description' => 'Returns the first element that was added to the list. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The first element that was added to the list. If the list       is empty, The method will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&getLast',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last element that was added to the list.',
                'description' => 'Returns the last element that was added to the list. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The last element that was added to the list. If the list       is empty, The method will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&remove',
                'access-modifier' => 'public function',
                'summary' => 'Removes an element given its index.',
                'description' => 'Removes an element given its index. If the given index is in the range [0, LinkedList::size() - 1]       the element at the given index is returned. If the list is empty or the given       index is out of the range, the method will return null. Also the       method will return null if the given index is not an integer.',
                'params' => [
                    '$index' => [
                        'type' => 'int',
                        'description' => 'The index of the element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The element that was removed. null if no element is removed.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&removeElement',
                'access-modifier' => 'public function',
                'summary' => 'Removes a specific element from the list.',
                'description' => 'Removes a specific element from the list. The method will remove the first occurrence of the element if it is       repeated. Note that the method use strict comparison to check for equality.',
                'params' => [
                    '$val' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be removed.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return The element after removal if the given element       is removed. Other than that, the method will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&removeFirst',
                'access-modifier' => 'public function',
                'summary' => 'Removes the first element in the list.',
                'description' => 'Removes the first element in the list. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the list has elements, the first element is returned.       If the list is empty, the method will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '&removeLast',
                'access-modifier' => 'public function',
                'summary' => 'Removes the last element in the list.',
                'description' => 'Removes the last element in the list. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the list has elements, the last element is returned.       If the list is empty, the method will return null.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$max' => [
                        'type' => 'int',
                        'description' => 'The maximum number of elements that the list can hold.       If 0 or a negative number is given, the list will be able to hold       unlimited number of elements.',
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
                'name' => 'add',
                'access-modifier' => 'public function',
                'summary' => 'Adds new element to the list.',
                'description' => 'Adds new element to the list. ',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be added. It can be of any type.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true if the element is added. The method will return       false only if the list accepts a limited number of elements and that       number has been reached.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clear',
                'access-modifier' => 'public function',
                'summary' => 'Removes all of the elements from the list.',
                'description' => 'Removes all of the elements from the list. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'contains',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a given element is in the list or not.',
                'description' => 'Checks if a given element is in the list or not. Note that the method uses strict equality operator \'===\' to check       for element existence.',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be checked.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true if the element is on the list. Other than that,       the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'countElement',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of times a given element has appeared on the list.',
                'description' => 'Returns the number of times a given element has appeared on the list. ',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be counted.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The number of times the element has appeared on the list. If       the element does not exist, 0 is returned.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'current',
                'access-modifier' => 'public function',
                'summary' => 'Returns the element that the iterator is currently is pointing to.',
                'description' => 'Returns the element that the iterator is currently is pointing to. This method is only used if the list is used in a \'foreach\' loop.       The developer should not call it manually unless he knows what he       is doing.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The element that the iterator is currently is pointing to.',
                    'return-types' => [
                        'mixed',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'indexOf',
                'access-modifier' => 'public function',
                'summary' => 'Returns the index of an element.',
                'description' => 'Returns the index of an element. Note that the method is using strict comparison operator to search (===).       The method will return the index of the first match it found if the list       contain the same element more than once.',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The element to search for.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The index of the element if found. If the list does not contain       the element or is empty, the method will return -1.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insert',
                'access-modifier' => 'public function',
                'summary' => 'Insert new element in the middle of the list.',
                'description' => 'Insert new element in the middle of the list. The method will try to insert new element at the given position. If the       position is index 0, the element will be inserted at the start of the       list. If the position equals to the number of elements in the list, then the       element will be inserted at the end of the list. If position is between       0 and LinkedList::size(), then the element will be inserted in the       middle. The element will be not inserted in only two cases:      <ul>      <li>Position is not between 0 and LinkedList::size() inclusive.</li>      <li>The list accepts only a specific number of elements and its full.</li>      </ul>      Note that the element at the specified index will be moved to the       next position and the new element will replace it.',
                'params' => [
                    '$el' => [
                        'type' => 'mixed',
                        'description' => 'The new element that will be inserted.',
                        'optional' => false,
                    ],
                    '$position' => [
                        'type' => 'int',
                        'description' => 'The index at which the element will be inserted in.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the element is inserted, the method will return true.       If not, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insertionSort',
                'access-modifier' => 'public function',
                'summary' => 'Sort the elements of the list using insertion sort algorithm.',
                'description' => 'Sort the elements of the list using insertion sort algorithm. Note that sorting can be only applied to following types:      <ul>      <li>numerical types</li>      <li>strings</li>      <li>Objects that implements the interface \'webfiori\\collections\\Comparable\'</li>      </ul>',
                'params' => [
                    '$ascending' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, list elements       will be sorted in ascending order (From lower to higher). Else,       they will be sorted in descending order (From higher to lower). Default is       true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if list       elements have been sorted. The only cases that the method       will return false is when the list has an object which does       not implement the interface Comparable or it has a mix of objects       and primitive types. Also, the method will return false if not       all elements of the same primitive type.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'key',
                'access-modifier' => 'public function',
                'summary' => 'Returns the current node in the iterator.',
                'description' => 'Returns the current node in the iterator. This method is only used if the list is used in a \'foreach\' loop.       The developer should not call it manually unless he knows what he       is doing.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'Node\' or null if the list is empty or       the iterator is finished.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/Node', 'Node'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'max',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of maximum elements the list can hold.',
                'description' => 'Returns the number of maximum elements the list can hold. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the maximum number of elements was set to 0 or a       negative number, the method will return -1 which indicates       that the list can have any number of elements. Other than that,       the method will return the maximum number of elements.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'next',
                'access-modifier' => 'public function',
                'summary' => 'Returns the next element in the iterator.',
                'description' => 'Returns the next element in the iterator. This method is only used if the list is used in a \'foreach\' loop.       The developer should not call it manually unless he knows what he       is doing.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The next element in the iterator. If the iterator is       finished or the list is empty, the method will return null.',
                    'return-types' => [
                        'mixed',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'replace',
                'access-modifier' => 'public function',
                'summary' => 'Replace an element with new one.',
                'description' => 'Replace an element with new one. ',
                'params' => [
                    '$oldEl' => [
                        'type' => 'mixed',
                        'description' => 'The element that will be replaced.',
                        'optional' => false,
                    ],
                    '$newEl' => [
                        'type' => 'mixed',
                        'description' => 'The element that will replace the old one.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if replaced.       if the element is not replaced, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'rewind',
                'access-modifier' => 'public function',
                'summary' => 'Return iterator pointer to the first element in the list.',
                'description' => 'Return iterator pointer to the first element in the list. This method is only used if the list is used in a \'foreach\' loop.       The developer should not call it manually unless he knows what he       is doing.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'size',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of elements in the list.',
                'description' => 'Returns the number of elements in the list. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of elements in the list.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toArray',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains the elements of the list.',
                'description' => 'Returns an array that contains the elements of the list. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains the elements of the list.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'valid',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the iterator has more elements or not.',
                'description' => 'Checks if the iterator has more elements or not. This method is only used if the list is used in a \'foreach\' loop.       The developer should not call it manually unless he knows what he       is doing.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If there is a next element, the method       will return true. False otherwise.',
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