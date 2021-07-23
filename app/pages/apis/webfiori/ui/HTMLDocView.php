<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class HTMLDocView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents HTML document.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class HTMLDoc');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'HTMLDoc', '\webfiori\ui', 'A class that represents HTML document. The created document is HTML 5 compatible (DOCTYPE html). Also, the document   will have the following features by default:   <ul>  <li>A Head node with meta charset = \'utf-8\' and view port = \'width=device-width, initial-scale=1.0\'.</li>  <li>A body node.</li>  </ul>'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'NL',
            'A constant that represents new line character',
            'A constant that represents new line character ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a new HTML document.',
                'description' => 'Constructs a new HTML document. The document that will be generated will look like the following by       default:      <pre>      &lt;!DOCTYPE html>      &lt;html>      &nbsp;&nbsp;&lt;head>      &nbsp;&nbsp;&nbsp;&nbsp;&lt;title>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Default      &nbsp;&nbsp;&nbsp;&nbsp;&lt;/title>      &nbsp;&nbsp;&nbsp;&nbsp;&lt;/meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">      &nbsp;&nbsp;&lt;/head>      &nbsp;&nbsp;&lt;/body itemscope="" itemtype="http://schema.org/WebPage">      &nbsp;&nbsp;&lt;/body>      &lt;//html>      </pre>',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string of HTML code that represents the document.',
                'description' => 'Returns a string of HTML code that represents the document. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string of HTML code that represents the document.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addChild',
                'access-modifier' => 'public function',
                'summary' => 'Appends new node to the body of the document.',
                'description' => 'Appends new node to the body of the document. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be added.       It can be an instance of \'HTMLNode\' or tag name. It will be added       only if the name of the node is not \'html\', \'head\' or body.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes which will be set in       the newly added child.',
                        'optional' => false,
                    ],
                    '$chainOnParent' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the method       will return the same instance at which the child node is added to. If       set to false, the method will return the child which have been added.       This can be useful if the developer would like to add a chain of elements       to the body of the parent or child. Default value is false. It means the       chaining will happen at parent level.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter <code>$chainOnParent</code> is set to true,       the method will return the \'body\' HTML Node. If set to false, it will       return the newly added child.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'asCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns the document as readable HTML code wrapped inside \'pre\' element.',
                'description' => 'Returns the document as readable HTML code wrapped inside \'pre\' element. ',
                'params' => [
                    '$formattingOptions' => [
                        'type' => 'array',
                        'description' => 'An associative array which contains       an options for formatting the code. The available options are:      <ul>      <li><b>tab-spaces</b>: The number of spaces in a tab. Usually 4.</li>      <li><b>with-colors</b>: A boolean value. If set to true, the code will       be highlighted with colors.</li>      <li><b>initial-tab</b>: Number of initial tabs</li>      <li><b>colors</b>: An associative array of highlight colors.</li>      </ul>      The array \'colors\' has the following options:      <ul>      <li><b>bg-color</b>: The \'pre\' block background color.</li>      <li><b>attribute-color</b>: HTML attribute name color.</li>      <li><b>attribute-value-color</b>: HTML attribute value color.</li>      <li><b>text-color</b>: Normal text color.</li>      <li><b>comment-color</b>: Comment color.</li>      <li><b>operator-color</b>: Assignment operator color.</li>      <li><b>lt-gt-color</b>: Less than and greater than color.</li>      <li><b>node-name-color</b>: Node name color.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The document as readable HTML code wrapped inside \'pre\' element.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBody',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node that represents the body of the document.',
                'description' => 'Returns the node that represents the body of the document. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The node that represents the body.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChildByID',
                'access-modifier' => 'public function',
                'summary' => 'Returns a child node given its ID.',
                'description' => 'Returns a child node given its ID. ',
                'params' => [
                    '$id' => [
                        'type' => 'string',
                        'description' => 'The ID of the child.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method returns an object of type HTMLNode.       if found. If no node has the given ID, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChildrenByAttributeValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns a list that contains a set of elements at which they have specific       attribute value.',
                'description' => 'Returns a list that contains a set of elements at which they have specific       attribute value. ',
                'params' => [
                    '$attrName' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute such as \'class\' or \'href\'.',
                        'optional' => false,
                    ],
                    '$attrVal' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type \'LinkedList\'       that contains all matched nodes.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChildrenByTag',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list that contains all children which has the given tag       value.',
                'description' => 'Returns a linked list that contains all children which has the given tag       value. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value of the tag (such as \'div\' or \'input\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'A linked list that contains all children which has the given tag       value.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDocumentRoot',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node that represents the root of the document.',
                'description' => 'Returns the node that represents the root of the document. The root node of the document is the node which has the name \'html\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an object of type HTMLNode.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHeadNode',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node that represents the \'head\' node.',
                'description' => 'Returns the node that represents the \'head\' node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The node that represents the \'head\' node.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HeadNode', 'HeadNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLanguage',
                'access-modifier' => 'public function',
                'summary' => 'Returns the language of the document.',
                'description' => 'Returns the language of the document. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A two characters language code. If the language is       not set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeChild',
                'access-modifier' => 'public function',
                'summary' => 'Removes a child node from the document.',
                'description' => 'Removes a child node from the document. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be removed.  This also       can be the value of the attribute ID of the node that will be removed.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the node if removed.       If not removed, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'saveToHTMLFile',
                'access-modifier' => 'public function',
                'summary' => 'Saves the document to .',
                'description' => 'Saves the document to . html file.',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'The location where the content will be written to       (e.g. \'C:\\user\\html\\pages\').       must be non empty string.',
                        'optional' => false,
                    ],
                    '$fileName' => [
                        'type' => 'string',
                        'description' => 'The name of the file (such as \'index\'). Must be non empty string.',
                        'optional' => false,
                    ],
                    '$wellFormatted' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, The generated file will be       well formatted (readable by humans).',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the file is successfully created.       False if not. Default is true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setHeadNode',
                'access-modifier' => 'public function',
                'summary' => 'Updates the head node that is used by the document.',
                'description' => 'Updates the head node that is used by the document. ',
                'params' => [
                    '$node' => [
                        'type' => 'HeadNode',
                        'description' => 'The node to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If head node is set, the method will return true.       if it is not set, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setLanguage',
                'access-modifier' => 'public function',
                'summary' => 'Sets the language of the document.',
                'description' => 'Sets the language of the document. ',
                'params' => [
                    '$lang' => [
                        'type' => 'string|null',
                        'description' => 'A two characters language code. If the given string is       empty or its length does not equal to 2, language won\'t be set. If null       is given, then the attribute will be removed if it was set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the attribute \'lang\' of the document is set, or       removed, the method will return true. Note that the method will always       return true if null is given. Other than that, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toHTML',
                'access-modifier' => 'public function',
                'summary' => 'Returns HTML string that represents the document.',
                'description' => 'Returns HTML string that represents the document. ',
                'params' => [
                    '$formatted' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, The generated HTML code will be       well formatted. Default is true. Note that this attribute will take       effect only if the formatting option is not set using the method       HTMLNode::setIsFormatted().',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'HTML string that represents the document.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
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