<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class HeadNodeView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents the tag &lt;head&lt; of a HTML document.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class HeadNode');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'HeadNode', '\webfiori\ui', 'A class that represents the tag &lt;head&lt; of a HTML document. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'ALLOWED_CHILDREN',
            'An array that contains the names of allowed child tags.',
            'An array that contains the names of allowed child tags. The array has the following values:      <ul>      <li>base</li>      <li>title</li>      <li>meta</li>      <li>link</li>      <li>script</li>      <li>noscript</li>      <li>#COMMENT</li>      <li>style</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new HTML node that represents head tag of HTML document.',
                'description' => 'Creates new HTML node that represents head tag of HTML document. Note that by default, the node will have the following nodes in       its body:      <ul>      <li>A meta tag with "name"="viewport" and "content"="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"</li>      <li>A title tag.</li>      </ul>',
                'params' => [
                    '$title' => [
                        'type' => 'string',
                        'description' => 'The value to set for the node \'title\'. Default       is \'Default\'.',
                        'optional' => false,
                    ],
                    '$canonical' => [
                        'type' => 'string',
                        'description' => 'The value to set for the link node       with attribute = \'canonical\'. Default is empty string.',
                        'optional' => false,
                    ],
                    '$base' => [
                        'type' => 'string',
                        'description' => 'The value to set for the node \'base\'. Default       is empty string.',
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
                'name' => 'addAlternate',
                'access-modifier' => 'public function',
                'summary' => 'Adds new alternate tag to the header.',
                'description' => 'Adds new alternate tag to the header. ',
                'params' => [
                    '$url' => [
                        'type' => 'string',
                        'description' => 'The link to the alternate page. Must be non-empty string.',
                        'optional' => false,
                    ],
                    '$lang' => [
                        'type' => 'string',
                        'description' => 'The language of the page. Must be non-empty string.',
                        'optional' => false,
                    ],
                    '$otherAttrs' => [
                        'type' => 'array',
                        'description' => 'An associative array of additional attributes       to set for the node. The indices are the names of attributes and the value       of each index is the value of the attribute. Also, the array can only       have attribute name if its empty attribute. Default is empty array.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addCSS',
                'access-modifier' => 'public function',
                'summary' => 'Adds new CSS source file.',
                'description' => 'Adds new CSS source file. ',
                'params' => [
                    '$href' => [
                        'type' => 'string',
                        'description' => 'The link to the file. Must be non empty string. It is       possible to append query string to the end of the link.',
                        'optional' => false,
                    ],
                    'An' => [
                        'type' => '$otherAttrs',
                        'description' => 'associative array of additional attributes       to set for the node. The indices are the names of attributes and the value       of each index is the value of the attribute. Also, the array can only       have attribute name if its empty attribute. One special attribute is       \'revision\'. If this attribute is set to true, a string in the form \'?cv=xxxxxxxxxx\' will       be appended to the \'href\' attribute value. It is used to invalidate browser cache.       This one can be also a string that represents the version of CSS file.      Default is false. \'cv\' = CSS Version. Default is empty array.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
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
                        'description' => 'The node that will be added. The node will be added       only if the following conditions are met:      <ul>      <li>It must be not a \'title\' or \'base\' node.</li>      <li>It is a \'link\' node but \'rel\' attribute is not \'canonical\'.</li>      <li>It is a \'script\' or \'noscript\' node.</li>      <li>It is a \'meta\' node which is not added before.</li>      <li>It is a \'#COMMENT\' node.</li>      </ul>      Other than that, the node will be not added.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array|boolean',
                        'description' => 'Not used if array is given. If boolean is       given, it will be treated as last method argument.',
                        'optional' => false,
                    ],
                    '$chainOnParent' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the method       will return the same instance at which the child node is added to. If       set to false, the method will return the child which have been added.       This can be useful if the developer would like to add a chain of elements       to the body of the parent or child. Default value is true. It means the       chaining will happen at parent level.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter <code>$chainOnParent</code> is set to true,       the method will return the \'$this\' instance. If set to false, it will       return the newly added child. Note that if no child is added, the method will       return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HeadNode', 'HeadNode'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addJs',
                'access-modifier' => 'public function',
                'summary' => 'Adds new JavsScript source file.',
                'description' => 'Adds new JavsScript source file. ',
                'params' => [
                    '$loc' => [
                        'type' => 'string',
                        'description' => 'The location of the file. Must be non-empty string. It       can have query string at the end.',
                        'optional' => false,
                    ],
                    'An' => [
                        'type' => '$otherAttrs',
                        'description' => 'associative array of additional attributes       to set for the node. The indices are the names of attributes and the value       of each index is the value of the attribute. Also, the array can only       have attribute name if its empty attribute. One special attribute is       \'revision\'. If the attribute is set to true, a string in the form \'?jv=xxxxxxxxxx\' will       be appended to the \'src\' attribute value. It is used to invalidate browser cache.       This also can be a string that represents the version of the file.      \'jv\' = JavaScript Version. Default is empty array.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addLink',
                'access-modifier' => 'public function',
                'summary' => 'Adds new \'link\' node.',
                'description' => 'Adds new \'link\' node. Note that if the \'rel\' attribute value is \'canonical\' or \'alternate\', no node will be       created.',
                'params' => [
                    '$rel' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute \'rel\'.',
                        'optional' => false,
                    ],
                    '$href' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute \'href\'.',
                        'optional' => false,
                    ],
                    '$otherAttrs' => [
                        'type' => 'array',
                        'description' => 'An associative array of keys and values.       The keys will be used as an attribute and the key value will be used       as attribute value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addMeta',
                'access-modifier' => 'public function',
                'summary' => 'Adds new meta tag.',
                'description' => 'Adds new meta tag. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The value of the property \'name\'. Must be non empty       string.',
                        'optional' => false,
                    ],
                    '$content' => [
                        'type' => 'string',
                        'description' => 'The value of the property \'content\'.',
                        'optional' => false,
                    ],
                    '$override' => [
                        'type' => 'boolean',
                        'description' => 'A boolean attribute. If a meta node was found       which has the given name and this attribute is set to true,       the content of the meta will be overridden by the passed value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAlternates',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list of all alternate nodes that was added to the header.',
                'description' => 'Returns a linked list of all alternate nodes that was added to the header. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'LinkedList
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBaseNode',
                'access-modifier' => 'public function',
                'summary' => 'Returns a node that represents the tag \'base\'.',
                'description' => 'Returns a node that represents the tag \'base\'. Note that the base note has a fixed position in the head node which is 0.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A node that represents the tag \'base\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBaseURL',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'href\' of the node \'base\'.',
                'description' => 'Returns the value of the attribute \'href\' of the node \'base\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The value of the attribute \'href\' of the node \'base\'.       if the value of the base URL is not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCSSNodes',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list of all link tags that link to a CSS file.',
                'description' => 'Returns a linked list of all link tags that link to a CSS file. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A linked list of all link tags that link to a CSS file. If       the node has no CSS link tags, the method will return an empty list.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCanonical',
                'access-modifier' => 'public function',
                'summary' => 'Returns the canonical URL if set.',
                'description' => 'Returns the canonical URL if set. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The canonical URL if set. If the URL is not set,       the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCanonicalNode',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type HTMLNode that represents the canonical URL.',
                'description' => 'Returns an object of type HTMLNode that represents the canonical URL. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the canonical URL is set, the method will return       an object of type HTMLNode. If not set, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCharSet',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'charset\' of the meta tag that is used       to specify character set of the document.',
                'description' => 'Returns the value of the attribute \'charset\' of the meta tag that is used       to specify character set of the document. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string such as \'UTF-8\'. If character set is not       set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCharsetNode',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type HTMLNode that represents the meta tag which       has the attribute \'charset\'.',
                'description' => 'Returns an object of type HTMLNode that represents the meta tag which       has the attribute \'charset\'. Note that the node that represents charset of the will always have a       position between 0 and 2 in the body of the head node.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type HTMLNode.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJSNodes',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list of all script tags that link to a JS file.',
                'description' => 'Returns a linked list of all script tags that link to a JS file. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A linked list of all script tags with type = "text/javascript".       If the node has no such nodes, the list will be empty.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLinkNodes',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list of all link tags which has the name \'link\'.',
                'description' => 'Returns a linked list of all link tags which has the name \'link\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A linked list of all link tags which has the name \'link\'.      the node has no link tags, the method will return an empty list.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMeta',
                'access-modifier' => 'public function',
                'summary' => 'Returns HTML node that represents a meta tag.',
                'description' => 'Returns HTML node that represents a meta tag. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute \'name\' of the meta       tag. Note that if the meta node that you would like to get is       the tag which has the attribute \'charset\', then the passed attribute       must have the value \'charset\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a meta tag which has the given name was found,       It will be returned. If no meta node was found, null is returned.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMetaNodes',
                'access-modifier' => 'public function',
                'summary' => 'Returns a linked list of all meta tags.',
                'description' => 'Returns a linked list of all meta tags. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A linked list of all meta tags. If the node       has no meta nodes, the list will be empty.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/collections/LinkedList', 'LinkedList'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitle',
                'access-modifier' => 'public function',
                'summary' => 'Returns the text that was set for the note \'title\'.',
                'description' => 'Returns the text that was set for the note \'title\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The text that was set for the note \'title\'. If it was not       set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitleNode',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type HTMLNode that represents the title node.',
                'description' => 'Returns an object of type HTMLNode that represents the title node. Note that the title node will be always in position 0 or 1 in the       body of the head node.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return       an object of type HTMLNode that represents title node.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasCss',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a CSS node with specific \'href\' does exist or not.',
                'description' => 'Checks if a CSS node with specific \'href\' does exist or not. Note that the method will not check for query string in the passed       value. It will simply ignore it.',
                'params' => [
                    '$loc' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute \'href\' of       the CSS node.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a link node with the given \'href\' value does       exist, the method will return true. Other than that, the method       will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasJs',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a JavaScript node with specific \'src\' value does exist or not.',
                'description' => 'Checks if a JavaScript node with specific \'src\' value does exist or not. Note that the method will not check for query string in the passed       value. It will simply ignore it.',
                'params' => [
                    '$src' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute \'src\' of       the script node.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a JavaScript node with the given \'src\' value does       exist, the method will return true. Other than that, the method       will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasMeta',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a meta tag which has the given name exist or not.',
                'description' => 'Checks if a meta tag which has the given name exist or not. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The value of the attribute \'name\' of the meta       tag. If the developer would like to check for the existence of the       node which has the attribute \'charset\', he can pass the value \'charset\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a meta tag which has the given name was found,       true is returned. false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setBase',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the attribute \'href\' for the \'base\' tag.',
                'description' => 'Sets the value of the attribute \'href\' for the \'base\' tag. ',
                'params' => [
                    '$url' => [
                        'type' => 'string|null',
                        'description' => 'The value to set. The base URL will be updated       only if the given parameter is a string and it is not empty. If null is       given, the node will be removed from the body of the head tag.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCanonical',
                'access-modifier' => 'public function',
                'summary' => 'Sets the canonical URL.',
                'description' => 'Sets the canonical URL. Note that the canonical URL will be set only if the given string is not       empty. Also, the node will always have a       position between 0 and 3 in the body of the head node.',
                'params' => [
                    '$link' => [
                        'type' => 'string|null',
                        'description' => 'The URL to set. If null is given, the link node       which represents the canonical URL will be removed from the body of the       head tag.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCharSet',
                'access-modifier' => 'public function',
                'summary' => 'Set the value of the meta tag which has the attribute \'charset\'.',
                'description' => 'Set the value of the meta tag which has the attribute \'charset\'. ',
                'params' => [
                    '$charset' => [
                        'type' => 'string|null',
                        'description' => 'The character set that will be used to       render the document (such as \'UTF-8\' or \'ISO-8859-8\'. If null is       given, the node will be removed from the head body.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setTitle',
                'access-modifier' => 'public function',
                'summary' => 'Sets the text value of the node \'title\'.',
                'description' => 'Sets the text value of the node \'title\'. ',
                'params' => [
                    '$title' => [
                        'type' => 'string|null',
                        'description' => 'The title to set. It must be non-empty string in       order to set. If null is given, \'title\' node will be omitted from the       body of the \'head\' tag.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
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