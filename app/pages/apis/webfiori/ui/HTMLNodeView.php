<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class HTMLNodeView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents HTML element.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class HTMLNode');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'HTMLNode', '\webfiori\ui', 'A class that represents HTML element. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'COMMENT_NODE',
            'A constant that indicates a node is of type comment.',
            'A constant that indicates a node is of type comment. ',
            ),
            new AttributeDef(
            'const',
            '',
            'DEFAULT_CODE_FORMAT',
            'An associative array of default formatting options for the code.',
            'An associative array of default formatting options for the code. It is used when displaying the actual generated HTML code. The array has       the following indices and values:      <ul>      <li><b>tab-spaces</b>: Number of spaces in a tab. The value is 4.</li>      <li><b>initial-tab</b>: Initial number of tabs. The value is 0.</li>      <li><b>with-colors</b>: A boolean. The value is true.</li>      <li><b>use-pre</b>: Use \'pre\' or \'span\' to add colors. The value is true. </li>      <li><b>colors</b>: A sub-associative array of colors. The array has       the following indices and values:      <ul>      <li><b>bg-color</b>: Background color of code block. The value is \'rgb(21, 18, 33)\'</li>      <li><b>text-color</b>: Color of any text that appears inside any node.       The value is \'gray\'.</li>      <li><b>attribute-color</b>: The color of attribute name. The value is       \'rgb(0,124,0)\'.</li>      <li><b>attribute-value-color</b>: The color of attribute value. The value       is \'rgb(170,85,137)\'.</li>      <li><b>node-name-color</b>: Color of HTML node name. The value is       \'rgb(204,225,70)\'.</li>      <li><b>lt-gt-color</b>: The color of \'&lt;\' and \'&gt;\' signs (around node name). The       value is \'rgb(204,225,70)\'.</li>      <li><b>comment-color</b>: The color of any HTML comment. The value       is \'rgb(0,189,36)\'.</li>      <li><b>operator-color</b>: The color of equal operator for attribute       value. The value is \'gray\'.</li>      </ul>      </li>      <ul>',
            ),
            new AttributeDef(
            'const',
            '',
            'TEXT_NODE',
            'A constant that indicates a node is of type text.',
            'A constant that indicates a node is of type text. ',
            ),
            new AttributeDef(
            'const',
            '',
            'VOID_TAGS',
            'An array that contains all unpaired (or void) HTML tags.',
            'An array that contains all unpaired (or void) HTML tags. An unpaired tag is a tag that does tot require closing tag. Its       body is empty and does not contain any thing.      This array has the following values:      <ul>      <li>br</li>      <li>hr</li>      <li>meta</li>      <li>img</li>      <li>input</li>      <li>wbr</li>      <li>embed</li>      <li>base</li>      <li>col</li>      <li>link</li>      <li>param</li>      <li>source</li>      <li>track</li>      <li>area</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Constructs a new instance of the class.',
                'description' => 'Constructs a new instance of the class. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the node (such as \'div\').  If       the developer would like to create a comment node, the name should be \'#comment\'. If       the developer would like to create a text node, the name should be \'#text\'.       If this parameter is not given, default value will be used which is \'div\'. A valid       node name must follow the following rules:      <ul>      <li>Must not be an empty string.</li>      <li>Must not start with a number.</li>      <li>Must not start with \'-\', \'.\' or \':\'.</li>      <li>Can only have the following characters in its name: [A-Z], [a-z],       [0-9], \':\', \'.\' and \'-\'.</li>      <ul>',
                        'optional' => false,
                    ],
                    'An' => [
                        'type' => '$attrs',
                        'description' => 'optional array that contains node attributes.',
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
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => 'Returns non-formatted HTML string that represents the node as a whole.',
                'description' => 'Returns non-formatted HTML string that represents the node as a whole. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'HTML string that represents the node as a whole.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addChild',
                'access-modifier' => 'public function',
                'summary' => 'Adds new child node to the body of the instance.',
                'description' => 'Adds new child node to the body of the instance. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be added.       It can be an instance of the class \'HTMLNode\' or a string that represents the       name of the node that will be added. The node can have       child nodes only if 4 conditions are met:      <ul>      <li>If the node is not a text node.</li>      <li>The node is not a comment node.</li>      <li>The node is not a void node.</li>      <li>The node is not it self. (making a node as a child of it self)</li>      </ul>',
                        'optional' => false,
                    ],
                    '$attrsOrChain' => [
                        'type' => 'array|boolean',
                        'description' => 'An optional array of attributes which will be set in       the newly added child. Applicable only if the newly added node is not       a text or a comment node. Also, this can be used as boolean value to       act as last method parameter (the $chainOnParent)',
                        'optional' => false,
                    ],
                    '$chainOnParent' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the method       will return the same instance at which the child node is added to. If       set to false, the method will return the child which have been added.       This can be useful if the developer would like to add a chain of elements       to the body of the parent or child. Default value is false. It means the       chaining will happen at child level.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter <code>$chainOnParent</code> is set to true,       the method will return the \'$this\' instance. If set to false, it will       return the newly added child.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addCommentNode',
                'access-modifier' => 'public function',
                'summary' => 'Adds a comment node as a child.',
                'description' => 'Adds a comment node as a child. The comment node will be added to the body of the node only       if it is not a void node.',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text that will be in the node.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addTextNode',
                'access-modifier' => 'public function',
                'summary' => 'Adds a text node as a child.',
                'description' => 'Adds a text node as a child. The text node will be added to the body of the node only       if it is not a void node.',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text that will be in the node.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'anchor',
                'access-modifier' => 'public function',
                'summary' => 'Adds an anchor (&lt;a&gt;) tag to the body of the node.',
                'description' => 'Adds an anchor (&lt;a&gt;) tag to the body of the node. ',
                'params' => [
                    '$body' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'The body of the tag. This can be a simple text       or an object of type \'HTMLNode\'. Note that if text is given and the text contains HTML       code, the method will not replace the code by HTML entities.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array that contains the attributes which       will be set for the created node.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'applyClass',
                'access-modifier' => 'public function',
                'summary' => 'Sets the attribute \'class\' for all child nodes.',
                'description' => 'Sets the attribute \'class\' for all child nodes. ',
                'params' => [
                    '$cName' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute.',
                        'optional' => false,
                    ],
                    '$override' => [
                        'type' => 'boolean',
                        'description' => 'If set to true and the child has already this       attribute set, the given value will override the existing value. If set to       false, the new value will be appended to the existing one. Default is       true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'asCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node as readable HTML code wrapped inside \'pre\' element.',
                'description' => 'Returns the node as readable HTML code wrapped inside \'pre\' element. ',
                'params' => [
                    '$formattingOptions' => [
                        'type' => 'array',
                        'description' => 'An associative array which contains       an options for formatting the code. The available options are:      <ul>      <li><b>tab-spaces</b>: The number of spaces in a tab. Usually 4.</li>      <li><b>with-colors</b>: A boolean value. If set to true, the code will       be highlighted with colors.</li>      <li><b>initial-tab</b>: Number of initial tabs</li>      <li><b>colors</b>: An associative array of highlight colors.</li>      </ul>      The array \'colors\' has the following options:      <ul>      <li><b>bg-color</b>: The \'pre\' block background color.</li>      <li><b>attribute-color</b>: HTML attribute name color.</li>      <li><b>attribute-value-color</b>: HTML attribute value color.</li>      <li><b>text-color</b>: Normal text color.</li>      <li><b>comment-color</b>: Comment color.</li>      <li><b>operator-color</b>: Assignment operator color.</li>      <li><b>lt-gt-color</b>: Less than and greater than color.</li>      <li><b>node-name-color</b>: Node name color.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The node as readable HTML code wrapped inside \'pre\' element.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'br',
                'access-modifier' => 'public function',
                'summary' => 'Adds a line break (&lt;br/&gt;) to the body of the node.',
                'description' => 'Adds a line break (&lt;br/&gt;) to the body of the node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'build',
                'access-modifier' => 'public function',
                'summary' => 'Build the body of the node using an array.',
                'description' => 'Build the body of the node using an array. ',
                'params' => [
                    '$arrOfChildren' => [
                        'type' => 'array',
                        'description' => 'The array can hold objects of type       HTMLNode or can hold sub associative arrays.       each array will hold one child information. Each array can have the following       options:            <ul>      <li><b>name</b>: The name of the child such as \'div\'.</li>      <li><b>attributes</b>: A sub associative array that holds the attributes of the child.</li>      <li><b>is-void</b>: A boolean which can be set to true if the child       represents a void node.</li>      <li><b>text</b>: This index is used if node type is #TEXT or #COMMENT. It       represents the text that will appear in the body of the node</li>      <li><b>children</b>: An array that holds arrays that represents the children of       the child. The arrays can have same structure.</li>      </ul>',
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
                'name' => 'cell',
                'access-modifier' => 'public function',
                'summary' => 'Adds a cell (&lt;td&gt; or &lt;th&gt;) to the body of the node.',
                'description' => 'Adds a cell (&lt;td&gt; or &lt;th&gt;) to the body of the node. The method will create the cell as an object of type \'TableCell\'.      Note that the cell will be added only if the node name is \'tr\'.',
                'params' => [
                    '$cellBody' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'The text of cell body. It can have HTML.       Also, it can be an object of type \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$cellType' => [
                        'type' => 'string',
                        'description' => 'The type of the cell. This attribute       can have only one of two values, \'td\' or \'th\'. \'td\' If the cell is       in the body of the table and \'th\' if the cell is in the header. If       none of the two is given, \'td\' will be used by default.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes to set for the       cell.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'children',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list of all child nodes.',
                'description' => 'Returns a linked list of all child nodes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A linked list of all child nodes. if the       given node is a text node, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'childrenCount',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of child nodes attached to the node.',
                'description' => 'Returns the number of child nodes attached to the node. If the node is a text node, a comment node or a void node,       the method will return 0.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of child nodes attached to the node.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'close',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the closing part of the node.',
                'description' => 'Returns a string that represents the closing part of the node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the closing part of the node.       if the node is a text node, a comment node or a void node the returned       value will be an empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'codeSnippit',
                'access-modifier' => 'public function',
                'summary' => 'Adds an object of type \'CodeSnippit\' as a child element.',
                'description' => 'Adds an object of type \'CodeSnippit\' as a child element. ',
                'params' => [
                    '$title' => [
                        'type' => 'string',
                        'description' => 'The title of the code snippit such as \'PHP Code\'.',
                        'optional' => false,
                    ],
                    '$code' => [
                        'type' => 'string',
                        'description' => 'The code that will be displayed by the snippit. It       is recommended that the code enclosed between double quotation marks.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes to set for the       parent element in the object. Note that if the array has the       attribute \'class\' or the attribute \'style\', they will be ignored.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method is       called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'comment',
                'access-modifier' => 'public function',
                'summary' => 'Adds a comment node as a child.',
                'description' => 'Adds a comment node as a child. The comment node will be added to the body of the node only       if it is not a void node.',
                'params' => [
                    '$txt' => [
                        'type' => 'string',
                        'description' => 'The text that will be in the node.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'component',
                'access-modifier' => 'public function',
                'summary' => 'Loads HTML-like component and make it a child of current node.',
                'description' => 'Loads HTML-like component and make it a child of current node. This method can be used to load any component that uses HTML syntax       into an object and make it a child of the instance at which the method is       called in. If the component file contains more than one node as a root note,       all nodes will be added as children.',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'The location of the file that       will have the HTML component.',
                        'optional' => false,
                    ],
                    '$slotsVals' => [
                        'type' => 'array',
                        'description' => 'An array that contains slots values. A slot in       the component is a string which is enclosed between two curly braces (such as {{name}}).       This array must be associative. The indices of the array are slots names       and values of the indices are slots values. The values of the slots can be       also sub-array that contains more values. For example, if we       have a slot with the name {{ user-name }}, then the array can have the       index \'user-name\' with the value of the slot.',
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
                'name' => 'count',
                'access-modifier' => 'public function',
                'summary' => 'Returns the number of child nodes attached to the node.',
                'description' => 'Returns the number of child nodes attached to the node. If the node is a text node, a comment node or a void node,       the method will return 0.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The number of child nodes attached to the node.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createComment',
                'access-modifier' => 'public static function',
                'summary' => 'Creates new comment node.',
                'description' => 'Creates new comment node. ',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text that will be inserted in the body       of the comment.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An object of type HTMLNode.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createTextNode',
                'access-modifier' => 'public static function',
                'summary' => 'Creates new text node.',
                'description' => 'Creates new text node. ',
                'params' => [
                    '$nodeText' => [
                        'type' => 'string',
                        'description' => 'The text that will be inserted in the body       of the node.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An object of type HTMLNode.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
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
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'div',
                'access-modifier' => 'public function',
                'summary' => 'Adds a &lt;div&gt; element to the body of the node.',
                'description' => 'Adds a &lt;div&gt; element to the body of the node. ',
                'params' => [
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes that will be set in       the div element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance which was added to       the body of the instance that the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'form',
                'access-modifier' => 'public function',
                'summary' => 'Adds a &lt;form&gt; element to the body of the node.',
                'description' => 'Adds a &lt;form&gt; element to the body of the node. ',
                'params' => [
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes that will be set in       the form element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance which was added to       the body of the instance that the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'fromHTMLText',
                'access-modifier' => 'public static function',
                'summary' => 'Creates HTMLNode object given a string of HTML code.',
                'description' => 'Creates HTMLNode object given a string of HTML code. Note that this method is still under implementation.',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'A string that represents HTML code.',
                        'optional' => false,
                    ],
                    '$asHTMLDocObj' => [
                        'type' => 'boolean',
                        'description' => 'If set to \'true\' and given HTML represents a       structured HTML document, the method will convert the code to an object       of type \'HTMLDoc\'. Default is \'true\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given code represents HTML document       and the parameter <b>$asHTMLDocObj</b> is set to \'true\', an object of type       \'HTMLDoc\' is returned. If the given code has multiple top level nodes       (e.g. \'&lt;div&gt;&lt;/div&gt;&lt;div&gt;&lt;/div&gt;\'),       an array that contains an objects of type \'HTMLNode\' is returned. If the       given code has one top level node, an object of type \'HTMLNode\' is returned.       Note that it is possible that the method will return an instance which       is a sub-class of the class \'HTMLNode\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HeadNode', 'HeadNode'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLDoc', 'HTMLDoc'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAttribute',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of an attribute.',
                'description' => 'Returns the value of an attribute. Calling this method is similar to calling HTMLNode::getAttributeValue().',
                'params' => [
                    '$attrName' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute. Upper case name and       lower case name is treated same way. Which means \'ID\' is like \'id\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the value of the attribute       if found. If no such attribute or the value of the attribute is set       to null, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAttributeValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of an attribute.',
                'description' => 'Returns the value of an attribute. ',
                'params' => [
                    '$attrName' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute. It can be in upper       or lower case.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the value of the attribute       if found. If no such attribute or the value of the attribute is set       to null, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAttributes',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array of all node attributes alongside the values.',
                'description' => 'Returns an associative array of all node attributes alongside the values. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an associative array. The keys will act as the attribute       name and the value will act as the value of the attribute. If the node       is a text node, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChild',
                'access-modifier' => 'public function',
                'summary' => 'Returns a child node given its index.',
                'description' => 'Returns a child node given its index. ',
                'params' => [
                    '$index' => [
                        'type' => 'int',
                        'description' => 'The position of the child node. This must be an integer       value starting from 0.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the child does exist, the method will return       an object of type \'HTMLNode\'. If no element was found, the method will       return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChildByAttributeValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns a node based on its attribute value (Direct child).',
                'description' => 'Returns a node based on its attribute value (Direct child). Note that if there are multiple children with the same attribute and value,       the first occurrence is returned.',
                'params' => [
                    '$attrName' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute. Supplying lower case       name or upper case name is the same.',
                        'optional' => false,
                    ],
                    '$attrVal' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type HTMLNode       if a node is found. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChildByID',
                'access-modifier' => 'public function',
                'summary' => 'Returns a child node given its ID.',
                'description' => 'Returns a child node given its ID. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The ID of the child.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method returns an object of type HTMLNode       if found. If no node has the given ID, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChildrenByTag',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list that contains all child nodes which has the given       tag name.',
                'description' => 'Returns a linked list that contains all child nodes which has the given       tag name. If the given tag name is empty string or the node has no children which has       the given tag name, the returned list will be empty.',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The name of the tag (such as \'div\' or \'a\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'A linked list that contains all child nodes which has the given       tag name.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClassName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'class\' of the element.',
                'description' => 'Returns the value of the attribute \'class\' of the element. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the attribute \'class\' is set, the method will return       its value. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getComment',
                'access-modifier' => 'public function',
                'summary' => 'Returns the node as HTML comment.',
                'description' => 'Returns the node as HTML comment. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The node as HTML comment. if the node is not a comment,       the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getID',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'id\' of the element.',
                'description' => 'Returns the value of the attribute \'id\' of the element. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the attribute \'id\' is set, the method will return       its value. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastChild',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last added child.',
                'description' => 'Returns the last added child. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The child will be returned as an object of type \'HTMLNode\'.       If the node has no children, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'name\' of the element.',
                'description' => 'Returns the value of the attribute \'name\' of the element. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the attribute \'name\' is set, the method will return       its value. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getNodeName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the node.',
                'description' => 'Returns the name of the node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the node. If the node is a text node, the       method will return the value \'#TEXT\'. If the node is a comment node, the       method will return the value \'#COMMENT\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getOriginalText',
                'access-modifier' => 'public function',
                'summary' => 'Returns the original text which was set in the body of the node.',
                'description' => 'Returns the original text which was set in the body of the node. This only applies to text nodes and comment nodes.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The original text without any modifications.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getParent',
                'access-modifier' => 'public function',
                'summary' => 'Returns the parent node.',
                'description' => 'Returns the parent node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type HTMLNode if the node       has a parent. If the node has no parent, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getStyle',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains in-line CSS declarations.',
                'description' => 'Returns an array that contains in-line CSS declarations. If the attribute is not set, the array will be empty.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array of CSS declarations. The keys of the array will       be the names of CSS Properties and the values will be the values of       the attributes (e.g. \'color\'=>\'white\').',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTabIndex',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'tabindex\' of the element.',
                'description' => 'Returns the value of the attribute \'tabindex\' of the element. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the attribute \'tabindex\' is set, the method will return       its value. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getText',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the text that this node represents.',
                'description' => 'Returns the value of the text that this node represents. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the node is a text node or a comment node,       the method will return the text in the body of the node. If not,       the method will return empty string. Note that if the node represents       a text node and HTML entities where escaped while setting its text, the       returned value will have HTML entities escaped.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTextUnescaped',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the text that this node represents.',
                'description' => 'Returns the value of the text that this node represents. The method will return a string which has HTML entities unescaped.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the node is a text node,       the method will return the text in the body of the node. If not,       the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitle',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'title\' of the element.',
                'description' => 'Returns the value of the attribute \'title\' of the element. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the attribute \'title\' is set, the method will return       its value. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWritingDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'dir\' of the element.',
                'description' => 'Returns the value of the attribute \'dir\' of the element. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the attribute \'dir\' is set, the method will return       its value. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasAttribute',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the node has a given attribute or not.',
                'description' => 'Checks if the node has a given attribute or not. Note that if the node is a text node or a comment node, it will       always return false.',
                'params' => [
                    '$attrName' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute. It can be in upper case       or lower case.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true if the attribute is set.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasChild',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a given node is a direct child of the instance.',
                'description' => 'Checks if a given node is a direct child of the instance. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode',
                        'description' => 'The node that will be checked.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true is returned if the node is a child       of the instance. false if not. Also if the current instance is a       text node or a comment node, the function will always return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hr',
                'access-modifier' => 'public function',
                'summary' => 'Adds a horizontal rule (&lt;hr/&gt;) to the body of the node.',
                'description' => 'Adds a horizontal rule (&lt;hr/&gt;) to the body of the node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'htmlAsArray',
                'access-modifier' => 'public static function',
                'summary' => 'Converts a string of HTML code to an array that looks like a tree of       HTML elements.',
                'description' => 'Converts a string of HTML code to an array that looks like a tree of       HTML elements. This method parses text based on the specifications which are found in       https://html.spec.whatwg.org/multipage/syntax.html#start-tags',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'HTML code.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An indexed array. Each index will contain parsed element       information. For example, if the given code is as follows:<br/>      <pre>      &lt;html&gt;&lt;head&gt;&lt;/head&gt;&lt;body&gt;&lt;/body&gt;&lt;/html&gt;      </pre>      Then the output will be as follows:      <pre>Array      &nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;[0] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[tag-name] =&gt; html      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[is-void-tag] =&gt;       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[attributes] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[children] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[0] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[tag-name] =&gt; head      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[is-void-tag] =&gt;       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[attributes] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[children] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;&nbsp;&nbsp;[1] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[tag-name] =&gt; body      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[is-void-tag] =&gt;       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[attributes] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[children] =&gt; Array      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;&nbsp;&nbsp;)      &nbsp;&nbsp;)      )      </pre>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'img',
                'access-modifier' => 'public function',
                'summary' => 'Adds an image element (&lt;img&gt;) to the body of the node.',
                'description' => 'Adds an image element (&lt;img&gt;) to the body of the node. ',
                'params' => [
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes that will be set in       the image element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance which was added to       the body of the instance that the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'input',
                'access-modifier' => 'public function',
                'summary' => 'Adds new input (&lt;input&gt;, &lt;select&gt; or &lt;textarea&gt;)       element as a child to the body of the node.',
                'description' => 'Adds new input (&lt;input&gt;, &lt;select&gt; or &lt;textarea&gt;)       element as a child to the body of the node. The method will create an object of type \'Input\' and add it as a child.',
                'params' => [
                    '$inputType' => [
                        'type' => 'string',
                        'description' => 'The type of the input element. The values of       this parameter must be taken from the array Input::INPUT_TYPES. Default       value is \'text\'.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array that contains attributes to       set for the input. If the array contains the attribute \'type\', it will       be ignored.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance which was added to       the body of the instance that the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insert',
                'access-modifier' => 'public function',
                'summary' => 'Insert new HTML element at specific position.',
                'description' => 'Insert new HTML element at specific position. ',
                'params' => [
                    '$el' => [
                        'type' => 'HTMLNode',
                        'description' => 'The new element that will be inserted. It is possible       to insert child elements to the element if the following conditions are       met:      <ul>      <li>If the node is not a text node.</li>      <li>The node is not a comment node.</li>      <li>The note is not a void node.</li>      <li>The note is not it self. (making a node as a child of it self)</li>      </ul>',
                        'optional' => false,
                    ],
                    '$position' => [
                        'type' => 'int',
                        'description' => 'The position at which the element will be added.       it must be a value between 0 and <code>HTMLNode::childrenCount()</code> inclusive.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isComment',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the given node represents a comment or not.',
                'description' => 'Checks if the given node represents a comment or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the given       node is a comment.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isFormatted',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property $isFormatted.',
                'description' => 'Returns the value of the property $isFormatted. The property is used to control how the HTML code that will be generated       will look like. If set to true, the code will be user-readable. If set to       false, it will be compact and the load size will be come less since no       new line characters or spaces will be added in the code.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the property is set, the method will return       its value. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isQuotedAttribute',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the node will rendere all attributes quoted or not.',
                'description' => 'Checks if the node will rendere all attributes quoted or not. This method is used to make sure that all attributes are quotated when      rendering the node. If false is returned, then the quoted attributes       will be decided based on the value of the attribute.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if all attributes will be       quoted. False if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isTextNode',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the node is a text node or not.',
                'description' => 'Checks if the node is a text node or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the node is a text node. false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isUseOriginalText',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the property $useOriginalTxt.',
                'description' => 'Returns the value of the property $useOriginalTxt. The property is used when parsing text nodes. If it is set to true,       the text that will be in the body of the node will be the exact text       which was set using the method HTMLNode::setText() (The value which will be       returned by the method HTMLNode::getOriginalText()). If it is set to       false, then the text which is in the body of the node will be the       value which is returned by the method HTMLNode::getText().',
                'params' => [
                ],
                'returns' => [
                    'description' => 'True if original text will be used in the body of the       text node. False if not. Default is false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isVoidNode',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the given node is a void node.',
                'description' => 'Checks if the given node is a void node. A void node is a node which cannot have child nodes in its body.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the node is a void node, the method will return true.       False if not. Note that text nodes and comment nodes are considered as void tags.',
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
                    'description' => 'An object of type \'HTMLNode\' or null if the node       has no children is empty or the iterator is finished.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'label',
                'access-modifier' => 'public function',
                'summary' => 'Adds new label (&lt;label&gt;) element to the body of the node.',
                'description' => 'Adds new label (&lt;label&gt;) element to the body of the node. The method will create an object of type \'Label\' and add it as a       child to the body.',
                'params' => [
                    '$body' => [
                        'type' => 'string|array',
                        'description' => 'The body of the label. It can be a simple       text or it can be an object of type \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array that contains attributes to       set for the label.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the newly added label.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/Label', 'Label'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'li',
                'access-modifier' => 'public function',
                'summary' => 'Adds a list item element (&lt;li&gt;) to the body of the node.',
                'description' => 'Adds a list item element (&lt;li&gt;) to the body of the node. The method will add the node as an object of type \'ListItem\'.      Note that it will be added only if the node is of type \'ul\' or \'li\'.',
                'params' => [
                    '$itemBody' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The body of the list item. It can be a simple       text or an object of type \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes that will be set in       the list item element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'loadComponent',
                'access-modifier' => 'public static function',
                'summary' => 'Loads HTML-like component.',
                'description' => 'Loads HTML-like component. This method can be used to load any component that uses HTML or XML syntax       into an object. The method can return many types depending on the loaded       component.',
                'params' => [
                    '$htmlTemplatePath' => [
                        'type' => 'string',
                        'description' => 'The location of the file that       will have the component. It can be of any type (HTML, XML, ...).',
                        'optional' => false,
                    ],
                    '$slotsValsArr' => [
                        'type' => 'array',
                        'description' => 'An array that contains slots values. A slot in       the component is a string which is enclosed between two curly braces (such as {{name}}).       This array must be associative. The indices of the array are slots names       and values of the indices are slots values. For example, if we       have a slot with the name {{ user-name }}, then the array can have the       index \'user-name\' with the value of the slot.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given component represents HTML document,       an object of type \'HTMLDoc\' is returned. If the given component       represents &lt;head&gt; node, the method will return an object of type       \'HeadNode\'. Other than that, the method will return an object of type       \'HTMLNode\'. If the file has more than one node in the root, the method       will return an array that contains objects of type \'HTMLNode\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HeadNode', 'HeadNode'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLDoc', 'HTMLDoc'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'ol',
                'access-modifier' => 'public function',
                'summary' => 'Adds a list (&lt;ol&gt;) to the body of the node.',
                'description' => 'Adds a list (&lt;ol&gt;) to the body of the node. The method will create an object of type \'UnorderedList\' and add it as       a child. Note that if the node of type \'ul\' or \'ol\', nothing will be       added.',
                'params' => [
                    '$items' => [
                        'type' => 'array',
                        'description' => 'An array that contains list items. They can be a simple text,       objects of type \'ListItem\' or object of type \'HTMLNode\'. Note that if the       list item is a text, the item will be added without placing HTML entities in       the text if the text has HTMLCode.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes to set for the       list.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will always return the same instance at       which the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'open',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the opening part of the node.',
                'description' => 'Returns a string that represents the opening part of the node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the opening part of the node.       if the node is a text node or a comment node, the returned value will be an empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'paragraph',
                'access-modifier' => 'public function',
                'summary' => 'Adds a paragraph (&lt;p&gt;) as a child element.',
                'description' => 'Adds a paragraph (&lt;p&gt;) as a child element. ',
                'params' => [
                    '$body' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'An optional text to add to the body of the paragraph.       This also can be an object of type \'HTMLNode\'. Note that if HTMLNode       object is given, its name must be part of the array PNode::ALLOWED_CHILDS or       the method will not add it.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'type',
                        'description' => '',
                        'optional' => false,
                    ],
                    '$escEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeAllChildNodes',
                'access-modifier' => 'public function',
                'summary' => 'Removes all child nodes.',
                'description' => 'Removes all child nodes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this             method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeAttribute',
                'access-modifier' => 'public function',
                'summary' => 'Removes an attribute from the node given its name.',
                'description' => 'Removes an attribute from the node given its name. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeAttributes',
                'access-modifier' => 'public function',
                'summary' => 'Removes all attributes from the node.',
                'description' => 'Removes all attributes from the node. This method will simply re-initialize the array that holds all       the attributes.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeChild',
                'access-modifier' => 'public function',
                'summary' => 'Removes a direct child node.',
                'description' => 'Removes a direct child node. ',
                'params' => [
                    '$nodeInstOrId' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be removed. This also can       be the ID of the child that will be removed. In addition to that, this can       be the index of the element that will be removed starting from 0.',
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
                'name' => 'removeLastChild',
                'access-modifier' => 'public function',
                'summary' => 'Removes the last child on the node.',
                'description' => 'Removes the last child on the node. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If a node is removed, the method will return it as       an object of type \'HTMLNode\'. Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'replaceChild',
                'access-modifier' => 'public function',
                'summary' => 'Replace a direct child node with a new one.',
                'description' => 'Replace a direct child node with a new one. ',
                'params' => [
                    '$oldNode' => [
                        'type' => 'HTMLNode',
                        'description' => 'The old node. It must be a child of the instance.',
                        'optional' => false,
                    ],
                    '$replacement' => [
                        'type' => 'HTMLNode',
                        'description' => 'The replacement node.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'true is returned if the node replaced. false if not.',
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
                'name' => 'section',
                'access-modifier' => 'public function',
                'summary' => 'Adds a section (&lt;section&gt;) as a child element.',
                'description' => 'Adds a section (&lt;section&gt;) as a child element. This method will create a section element with a heading element in its       body.      Note that if the title of the contains HTML entities, they will be not escaped       and will be treated as HTML code.',
                'params' => [
                    '$title' => [
                        'type' => 'string|HTMLNode',
                        'description' => 'The title that will be set in the heading tag.       This also can be an object of type \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$headingLvl' => [
                        'type' => 'int',
                        'description' => 'Heading level. It can be a value between 1       and 6 inclusive. Default value is 1.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes that will be set in       the section element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object that represents the added      section.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAttribute',
                'access-modifier' => 'public function',
                'summary' => 'Sets a value for an attribute.',
                'description' => 'Sets a value for an attribute. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the attribute. If the attribute does not       exist, it will be created. If already exists, its value will be updated.       Note that if the node type is text node, the attribute will never be created.',
                        'optional' => false,
                    ],
                    '$val' => [
                        'type' => 'string|null',
                        'description' => 'The value of the attribute. Default is null. Note       that if the value has any extra spaces, they will be trimmed. Also, if       the given value is null, the attribute will be set with no value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAttributes',
                'access-modifier' => 'public function',
                'summary' => 'Sets multiple attributes at once.',
                'description' => 'Sets multiple attributes at once. ',
                'params' => [
                    '$attrsArr' => [
                        'type' => 'array',
                        'description' => 'An associative array that has attributes names       and values. The indices will represents       attributes names and the value of each index represents the values of       the attributes. If the given array has elements without keys, they       will be added without values.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setClassName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'class\' of the node.',
                'description' => 'Sets the value of the attribute \'class\' of the node. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The name of the class.',
                        'optional' => false,
                    ],
                    '$override' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to false and the node       has a class already set, the given class name will be appended to the       existing one. Default is true which means the attribute will be set as       new.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setID',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'id\' of the node.',
                'description' => 'Sets the value of the attribute \'id\' of the node. ',
                'params' => [
                    '$idVal' => [
                        'type' => 'string',
                        'description' => 'The value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsFormatted',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property $isFormatted.',
                'description' => 'Sets the value of the property $isFormatted. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'true to make the document that will be generated       from the node user-readable. false to make it compact.',
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
                'name' => 'setIsQuotedAttribute',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property which is used to tell if all node attributes       will be quoted or not.',
                'description' => 'Sets the value of the property which is used to tell if all node attributes       will be quoted or not. Note that this method is only applicable if the element that the method       is called on has no parent (root node).',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'True to make the node render quoted attributes.       False to not.',
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
                'name' => 'setIsVoidNode',
                'access-modifier' => 'public function',
                'summary' => 'Make the node a void node or not.',
                'description' => 'Make the node a void node or not. A void node is a node which does not require closing tag. The developer       does not have to set the node type to void or not since this is done       automatically. For custom made elements, this might be required.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'If the developer would like to make the       node a void node, then he must pass true.',
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
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'name\' of the node.',
                'description' => 'Sets the value of the attribute \'name\' of the node. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setNodeName',
                'access-modifier' => 'public function',
                'summary' => 'Updates the name of the node.',
                'description' => 'Updates the name of the node. If the node type is a text or a comment,       developer can only switch between the two types. If the node type is of       another type and has child nodes, type will be changed only if the given       node name is not a void node. If the node is a void node and it has no       children, it will switch without problems.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The new name.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the type is updated.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setStyle',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'style\' of the node.',
                'description' => 'Sets the value of the attribute \'style\' of the node. ',
                'params' => [
                    '$cssStyles' => [
                        'type' => 'array',
                        'description' => 'An associative array of CSS declarations. The keys of the array should       be the names of CSS Properties and the values should be the values of       the attributes (e.g. \'color\'=>\'white\').',
                        'optional' => false,
                    ],
                    '$override' => [
                        'type' => 'boolean',
                        'description' => 'If this value is set to true and a style is already       set, then the old style will be overridden by the given style. Default is       false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setTabIndex',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'tabindex\' of the node.',
                'description' => 'Sets the value of the attribute \'tabindex\' of the node. ',
                'params' => [
                    '$val' => [
                        'type' => 'int',
                        'description' => 'The value to set. From MDN: An integer attribute indicating if       the element can take input focus. It can takes several values:       <ul>      <li>A negative value means that the element should be focusable, but       should not be reachable via sequential keyboard navigation.</li>      <li>0 means that the element should be focusable and reachable via sequential       keyboard navigation, but its relative order is defined by the platform convention</li>      <li>A positive value means that the element should be focusable       and reachable via sequential keyboard navigation; the order in       which the elements are focused is the increasing value of the       tabindex. If several elements share the same tabindex, their relative       order follows their relative positions in the document.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setText',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property $text.',
                'description' => 'Sets the value of the property $text. Note that if the type of the node is comment, the method will replace       \'&lt;!--\' and \'--&gt;\' with \' --\' and \'-- \' if it was found in the given text.',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text to set. If the node is not a text node or       a comment node, the value will never be set.',
                        'optional' => false,
                    ],
                    '$escHtmlEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is true. Ignored in case the node type is comment.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setTitle',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'title\' of the node.',
                'description' => 'Sets the value of the attribute \'title\' of the node. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value to set. From MDN: Contains a       text representing advisory information related to the element       it belongs to. Such information can typically, but not necessarily,       be presented to the user as a tooltip.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setUseOriginal',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property $useOriginalTxt.',
                'description' => 'Sets the value of the property $useOriginalTxt. The property is used when parsing text nodes. If it is set to true,       the text that will be in the body of the node will be the exact text       which was set using the method HTMLNode::setText() (The value which will be       returned by the method HTMLNode::getOriginalText()). If it is set to       false, then the text which is in the body of the node will be the       value which is returned by the method HTMLNode::getText().',
                'params' => [
                    '$boolean' => [
                        'type' => 'boolean',
                        'description' => 'True or false.',
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
                'name' => 'setWritingDir',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'dir\' of the node.',
                'description' => 'Sets the value of the attribute \'dir\' of the node. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The value to set. It can be \'ltr\' or \'rtl\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'table',
                'access-modifier' => 'public function',
                'summary' => 'Adds a table node (&lt;table&gt;) to the body of the node.',
                'description' => 'Adds a table node (&lt;table&gt;) to the body of the node. ',
                'params' => [
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes to set       on the child.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the newly added instance.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'text',
                'access-modifier' => 'public function',
                'summary' => 'Adds a text node as a child.',
                'description' => 'Adds a text node as a child. The text node will be added to the body of the node only       if it is not a void node.',
                'params' => [
                    '$txt' => [
                        'type' => 'string',
                        'description' => 'The text that will be in the node.',
                        'optional' => false,
                    ],
                    '$escEntities' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will       replace the characters \'&lt;\', \'&gt;\' and       \'&amp\' with the following HTML entities: \'&amp;lt;\', \'&amp;gt;\' and \'&amp;amp;\'       in the given text. Default is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance that this       method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toHTML',
                'access-modifier' => 'public function',
                'summary' => 'Returns HTML string that represents the node as a whole.',
                'description' => 'Returns HTML string that represents the node as a whole. ',
                'params' => [
                    '$formatted' => [
                        'type' => 'boolean',
                        'description' => 'Set to true to return a well formatted       HTML document (has new lines and indentations). Note that the size of       generated node will increase if this one is set to true. Default is false.',
                        'optional' => false,
                    ],
                    '$initTab' => [
                        'type' => 'int',
                        'description' => 'Initial tab count (indentation). Used in case of the document is       well formatted. This number represents the size of code indentation.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'HTML string that represents the node.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'tr',
                'access-modifier' => 'public function',
                'summary' => 'Adds a row (&lt;tr&gt;) to the body of the node.',
                'description' => 'Adds a row (&lt;tr&gt;) to the body of the node. The method will create the row as an object of type \'TableRow\'.      Note that the row will be added only if the node name is \'tbody\' or \'table\'.',
                'params' => [
                    '$data' => [
                        'type' => 'array',
                        'description' => 'An array that holds the data that will be added to the       row. This array can hold strings or objects of type \'HTMLNode\'.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes to set for the       row.',
                        'optional' => false,
                    ],
                    '$headerRow' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the method will add the       data in a \'th\' cell instead of \'td\' cell. Default is false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the same instance at which the method is       called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'ul',
                'access-modifier' => 'public function',
                'summary' => 'Adds a list (&lt;ul&gt;) to the body of the node.',
                'description' => 'Adds a list (&lt;ul&gt;) to the body of the node. The method will create an object of type \'UnorderedList\' and add it as       a child. Note that if the node of type \'ul\' or \'ol\', nothing will be       added.',
                'params' => [
                    '$items' => [
                        'type' => 'array',
                        'description' => 'An array that contains list items. They can be a simple text,       objects of type \'ListItem\' or object of type \'HTMLNode\'. Note that if the       list item is a text, the item will be added without placing HTML entities in       the text if the text has HTMLCode.',
                        'optional' => false,
                    ],
                    '$attributes' => [
                        'type' => 'array',
                        'description' => 'An optional array of attributes to set for the       list.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will always return the same instance at       which the method is called on.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
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