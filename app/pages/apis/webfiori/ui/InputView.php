<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InputView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents any input element.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Input');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Input', '\webfiori\ui', 'A class that represents any input element. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'INPUT_MODES',
            'An array of supported input modes.',
            'An array of supported input modes. The array contains the following values:      <ul>      <li>none</li>      <li>text</li>      <li>decimal</li>      <li>numeric</li>      <li>tel</li>      <li>search</li>      <li>email</li>      <li>url</li>      </ul>',
            ),
            new AttributeDef(
            'const',
            '',
            'INPUT_TYPES',
            'An array of supported input types.',
            'An array of supported input types. This array has the following values:      <ul>      <li>text</li>      <li>date</li>      <li>password</li>      <li>submit</li>      <li>checkbox</li>      <li>email</li>      <li>url</li>      <li>tel</li>      <li>color</li>      <li>file</li>      <li>range</li>      <li>month</li>      <li>number</li>      <li>date-local</li>      <li>hidden</li>      <li>time</li>      <li>week</li>      <li>search</li>      <li>select</li>      <li>textarea</li>      <li>radio</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of the input element. If the       given type is not in the array Input::INPUT_TYPES, \'text\'       will be used by default.',
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
                'description' => 'Adds new child node. The node will be added only if the type of the node is       &lt;select&gt; and the given node is of type &lt;option&gt; or       &lt;optgroup&gt;. Also, if the input type is &lt;textarea&gt; and       the given node is a text node, it will be added.',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be added. If a text is given       and the node is of type &lt;textarea&gt;, The text will be added to the       body of the text area. If input type is &lt;select&gt;, then new option       will be added with the same label of the given text.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array|boolean',
                        'description' => 'An optional array of attributes which will be set in       the newly added child. Also, this argument can work as last method argument       if a boolean is given.',
                        'optional' => false,
                    ],
                    '$chainOnParent' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the method       will return the same instance at which the child node is added to. If       set to false, the method will return the child which have been added.       This can be useful if the developer would like to add a chain of elements       to the body of the node. Default value is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter <code>$useChaining</code> is set to true,       the method will return the \'$this\' instance. If set to false, it will       return the newly added child. If no child is added, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addOption',
                'access-modifier' => 'public function',
                'summary' => 'Adds an option to the input element which has the type \'select\'.',
                'description' => 'Adds an option to the input element which has the type \'select\'. ',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains select options.       The array must have at least the following indices:      <ul>      <li>label: A label that will be displayed to the user.</li>      <li>value: The value that will be set for the attribute \'value\'.</li>      <li>attributes: An associative array of attributes which can be set       for the option.</li>      </ul>      In addition to the two indices, the array can have additional index.       The index name is \'attributes\'. This index can have an associative array       of attributes which will be set for the option. The key will act as the       attribute name and the value of the key will act as the value of the       attribute.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addOptions',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple options at once to an input element of type \'select\'.',
                'description' => 'Adds multiple options at once to an input element of type \'select\'. ',
                'params' => [
                    '$arrayOfOpt' => [
                        'type' => 'array',
                        'description' => 'An associative array of options.             The key will act as the \'value\' attribute and       the value of the key will act as the label for the option. Also,       it is possible that the value of the key is a sub-associative array that       contains only two indices:       <ul>      <li>label: A label for the option.</li>      <li>attributes: An optional associative array of attributes for the option.       The key will act as the       attribute name and the value of the key will act as the value of the       attribute.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addOptionsGroup',
                'access-modifier' => 'public function',
                'summary' => 'Adds an \'optgroup\' child element.',
                'description' => 'Adds an \'optgroup\' child element. ',
                'params' => [
                    '$optionsGroupArr' => [
                        'type' => 'array',
                        'description' => 'An associative array that contains       group info. The array must have the following indices:      <ul>      <li>label: The label of the group.</li>      <li>attributes: An optional associative array that contains group attributes.</li>      <li>options: A sub associative array that contains group       options. The key will act as the \'value\' attribute and       the value of the key will act as the label for the option. Also,       it is possible that the value of the key is a sub-associative array that       contains only two indices:       <ul>      <li>label: A label for the option.</li>      <li>attributes: An optional associative array of attributes.       The key will act as the       attribute name and the value of the key will act as the value of the       attribute.</li></li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getType',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'type\'.',
                'description' => 'Returns the value of the attribute \'type\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of the attribute \'type\'. For \'textarea\' and       select, this method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setInputMode',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'inputmode\'.',
                'description' => 'Sets the value of the attribute \'inputmode\'. ',
                'params' => [
                    '$mode' => [
                        'type' => 'string',
                        'description' => 'The value to set. It must be a value from the array       Input::INPUT_MODES.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setList',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'list\'',
                'description' => 'Sets the value of the attribute \'list\' ',
                'params' => [
                    '$listId' => [
                        'type' => 'string',
                        'description' => 'The ID of the element that will be acting       as pre-defined list of elements. It cannot be set for hidden, file,       checkbox, textarea, select and radio input types.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setMax',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'max\'.',
                'description' => 'Sets the value of the attribute \'max\'. ',
                'params' => [
                    '$max' => [
                        'type' => 'string',
                        'description' => 'The value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setMaxLength',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'maxlength\'.',
                'description' => 'Sets the value of the attribute \'maxlength\'. ',
                'params' => [
                    '$length' => [
                        'type' => 'string',
                        'description' => 'The value to set. The attribute value can be set only       for text, email, search, tel and url input types.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setMin',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'min\'.',
                'description' => 'Sets the value of the attribute \'min\'. ',
                'params' => [
                    '$min' => [
                        'type' => 'string',
                        'description' => 'The value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setMinLength',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'minlength\'.',
                'description' => 'Sets the value of the attribute \'minlength\'. ',
                'params' => [
                    '$length' => [
                        'type' => 'string',
                        'description' => 'The value to set. The attribute value can be set only       for text, email, search, tel and url input types.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setNodeName',
                'access-modifier' => 'public function',
                'summary' => 'A method that does nothing.',
                'description' => 'A method that does nothing. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will always return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setPlaceholder',
                'access-modifier' => 'public function',
                'summary' => 'Sets a placeholder text for the input element if it supports it.',
                'description' => 'Sets a placeholder text for the input element if it supports it. A placeholder can be set for the following input types:      <ul>      <li>text</li>      <li>textarea</li>      <li>password</li>      <li>number</li>      <li>search</li>      <li>email</li>      <li>url</li>      </ul>',
                'params' => [
                    '$text' => [
                        'type' => 'string|null',
                        'description' => 'The value to set. The attribute can be       set only if the type of the input is text or password or number. If null       is given, the attribute will be unset If it was set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setType',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'type\'.',
                'description' => 'Sets the value of the attribute \'type\'. ',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'The type of the input element. If the       given type is not in the array Input::INPUT_TYPES, The       method will not update the type.      It can be only a value from the array Input::INPUT_TYPES. Also, if       the input type is \'textarea\' or \'select\', this attribute will never       be set using this method.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setValue',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'value\'',
                'description' => 'Sets the value of the attribute \'value\' ',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Input', 'Input'),
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