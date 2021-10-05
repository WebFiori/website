<?php
namespace docGenerator\webfiori\framework\mail;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class EmailMessageView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to write HTML formatted Email messages.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class EmailMessage');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'EmailMessage', '\webfiori\framework\mail', 'A class that can be used to write HTML formatted Email messages. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$sendAccountName' => [
                        'type' => 'type',
                        'description' => '',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'type
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addReceiver',
                'access-modifier' => 'public function',
                'summary' => 'Adds new receiver address to the list of message receivers.',
                'description' => 'Adds new receiver address to the list of message receivers. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the email receiver (such as \'Ibrahim\').',
                        'optional' => false,
                    ],
                    '$email' => [
                        'type' => 'string',
                        'description' => 'The email address of the receiver (such as \'example',
                        'optional' => false,
                    ],
                    '$isCC' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the receiver will receive       a carbon copy of the message (CC).',
                        'optional' => false,
                    ],
                    '$isBcc' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the receiver will receive       a blind carbon copy of the message (Bcc).',
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
                'name' => 'attach',
                'access-modifier' => 'public function',
                'summary' => 'Adds a file to the email message as an attachment.',
                'description' => 'Adds a file to the email message as an attachment. ',
                'params' => [
                    '$file' => [
                        'type' => 'File',
                        'description' => 'The file that will be added. It will be added only if the file       exist in the path or the raw data of the file is set.',
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
                'name' => 'document',
                'access-modifier' => 'public function',
                'summary' => 'Sets or returns the HTML document that is associated with the email       message.',
                'description' => 'Sets or returns the HTML document that is associated with the email       message. ',
                'params' => [
                    '$new' => [
                        'type' => 'HTMLDoc',
                        'description' => 'If it is not null, the HTML document       that is associated with the message will be set to the given one.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The document that is associated with the email message.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLDoc', 'HTMLDoc'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBCC',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains the names and the addresses       of people who will receive a blind carbon copy of the message.',
                'description' => 'Returns an associative array that contains the names and the addresses       of people who will receive a blind carbon copy of the message. The indices of the array will act as the addresses of the receivers and       the value of each index will contain the name of the receiver.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains receivers information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBCCStr',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that contains the names and the addresses       of people who will receive a blind carbon copy of the message.',
                'description' => 'Returns a string that contains the names and the addresses       of people who will receive a blind carbon copy of the message. The format of the string will be as follows:      <p>NAME_1 &lt;ADDRESS_1&gt;, NAME_2 &lt;ADDRESS_2&gt; ...</p>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that contains receivers information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCC',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains the names and the addresses       of people who will receive a carbon copy of the message.',
                'description' => 'Returns an associative array that contains the names and the addresses       of people who will receive a carbon copy of the message. The indices of the array will act as the addresses of the receivers and       the value of each index will contain the name of the receiver.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains receivers information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCCStr',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that contains the names and the addresses       of people who will receive a carbon copy of the message.',
                'description' => 'Returns a string that contains the names and the addresses       of people who will receive a carbon copy of the message. The format of the string will be as follows:      <p>NAME_1 &lt;ADDRESS_1&gt;, NAME_2 &lt;ADDRESS_2&gt; ...</p>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that contains receivers information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
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
                'name' => 'getLog',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains log messages which are generated       from sending SMTP commands.',
                'description' => 'Returns an array that contains log messages which are generated       from sending SMTP commands. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array will be indexed. In every index, there       will be a sub-associative array with the following indices:      <ul>      <li>command</li>      <li>response-code</li>      <li>response-message</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getReceivers',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains the names and the addresses       of people who will receive an original copy of the message.',
                'description' => 'Returns an associative array that contains the names and the addresses       of people who will receive an original copy of the message. The indices of the array will act as the addresses of the receivers and       the value of each index will contain the name of the receiver.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains receivers information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getReceiversStr',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that contains the names and the addresses       of people who will receive an original copy of the message.',
                'description' => 'Returns a string that contains the names and the addresses       of people who will receive an original copy of the message. The format of the string will be as follows:      <p>NAME_1 &lt;ADDRESS_1&gt;, NAME_2 &lt;ADDRESS_2&gt; ...</p>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that contains receivers information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'importance',
                'access-modifier' => 'public function',
                'summary' => 'Sets or gets the importance level of email message.',
                'description' => 'Sets or gets the importance level of email message. ',
                'params' => [
                    '$imp' => [
                        'type' => 'int',
                        'description' => 'The importance level of the message. -1 for not urgent, 0       for normal and 1 for urgent.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The importance level of the message.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insert',
                'access-modifier' => 'public function',
                'summary' => 'Adds a child node inside the body of a node given its ID.',
                'description' => 'Adds a child node inside the body of a node given its ID. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be inserted. Also,       this can be the tag name of the node such as \'div\'.',
                        'optional' => false,
                    ],
                    '$parentNodeId' => [
                        'type' => 'string|null',
                        'description' => 'The ID of the node that the given node       will be inserted to. If null is given, the node will be added directly inside       the element &lt;body&gt;. Default value is null.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the inserted       node if it was inserted. If it is not, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insertNode',
                'access-modifier' => 'public function',
                'summary' => 'Adds a child HTML node to the body of the message.',
                'description' => 'Adds a child HTML node to the body of the message. ',
                'params' => [
                    '$htmlNode' => [
                        'type' => 'HTMLNode',
                        'description' => 'An instance of \'HTMLNode\'.',
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
                'name' => 'send',
                'access-modifier' => 'public function',
                'summary' => 'Sends the message and set message instance to null.',
                'description' => 'Sends the message and set message instance to null. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDocument',
                'access-modifier' => 'public function',
                'summary' => 'Sets the document at which the message will use.',
                'description' => 'Sets the document at which the message will use. ',
                'params' => [
                    '$doc' => [
                        'type' => 'HTMLDoc',
                        'description' => 'An HTML document.',
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
                'name' => 'subject',
                'access-modifier' => 'public function',
                'summary' => 'Sets the subject of the email message.',
                'description' => 'Sets the subject of the email message. ',
                'params' => [
                    '$subject' => [
                        'type' => 'string',
                        'description' => 'The subject of the email message.',
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
                'name' => 'write',
                'access-modifier' => 'public function',
                'summary' => 'Adds a text node to the body of the message.',
                'description' => 'Adds a text node to the body of the message. ',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The text that will be in the body of the node.',
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