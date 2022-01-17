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
            new AttributeDef(
            'const',
            '',
            'PRIORITIES',
            'A constant that colds the possible values for the header \'Priority\'.',
            'A constant that colds the possible values for the header \'Priority\'. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$sendAccountName' => [
                        'type' => 'string',
                        'description' => 'The name of SMTP connection that will be       used to send the message. It must exist in the class \'AppConfig\'. Default       value is \'no-reply\'.',
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
                'name' => 'addAttachment',
                'access-modifier' => 'public function',
                'summary' => 'Adds a file as email attachment.',
                'description' => 'Adds a file as email attachment. ',
                'params' => [
                    '$fileObjOrFilePath' => [
                        'type' => 'File|string',
                        'description' => 'An object of type \'File\'. This also can       be the absolute path to a file in the file system.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the file is added, the method will return true.       Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addBCC',
                'access-modifier' => 'public function',
                'summary' => 'Adds new receiver address to the list of \'bcc\' receivers.',
                'description' => 'Adds new receiver address to the list of \'bcc\' receivers. ',
                'params' => [
                    '$address' => [
                        'type' => 'string',
                        'description' => 'The email address of the receiver (such as \'example',
                        'optional' => false,
                    ],
                    '$name' => [
                        'type' => 'string',
                        'description' => 'An optional receiver name. If not provided, the       email address is used as name.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the address is added, the method will return       true. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addBeforeSend',
                'access-modifier' => 'public function',
                'summary' => 'Adds a callback to execute before the message is sent.',
                'description' => 'Adds a callback to execute before the message is sent. ',
                'params' => [
                    '$callback' => [
                        'type' => 'Callable',
                        'description' => 'A function that will get executed before sending      the message. Note that the first parameter of the callback will be always      the message (e.g. function (EmailMessage $message) {})',
                        'optional' => false,
                    ],
                    '$extraParams' => [
                        'type' => 'array',
                        'description' => 'An optional array of extra parameters that will      be passed to the callback.',
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
                'name' => 'addCC',
                'access-modifier' => 'public function',
                'summary' => 'Adds new receiver address to the list of \'cc\' receivers.',
                'description' => 'Adds new receiver address to the list of \'cc\' receivers. ',
                'params' => [
                    '$address' => [
                        'type' => 'string',
                        'description' => 'The email address of the receiver (such as \'example',
                        'optional' => false,
                    ],
                    '$name' => [
                        'type' => 'string',
                        'description' => 'An optional receiver name. If not provided, the       email address is used as name.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the address is added, the method will return       true. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addTo',
                'access-modifier' => 'public function',
                'summary' => 'Adds new receiver address to the list of \'to\' receivers.',
                'description' => 'Adds new receiver address to the list of \'to\' receivers. ',
                'params' => [
                    '$address' => [
                        'type' => 'string',
                        'description' => 'The email address of the receiver (such as \'example',
                        'optional' => false,
                    ],
                    '$name' => [
                        'type' => 'string',
                        'description' => 'An optional receiver name. If not provided, the       email address is used as name.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the address is added, the method will return       true. False otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'get',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of a language label.',
                'description' => 'Returns the value of a language label. ',
                'params' => [
                    '$label' => [
                        'type' => 'string',
                        'description' => 'A directory to the language variable       (such as \'pages/login/login-label\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given directory represents a label, the       method will return its value. If it represents an array, the array will       be returned. If nothing was found, the returned value will be the passed       value to the method.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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
                'name' => 'getDocument',
                'access-modifier' => 'public function',
                'summary' => 'Returns the document that is associated with the page.',
                'description' => 'Returns the document that is associated with the page. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'HTMLDoc\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLDoc', 'HTMLDoc'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLang',
                'access-modifier' => 'public function',
                'summary' => 'Returns the language code of the email.',
                'description' => 'Returns the language code of the email. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Two digit language code. In case language is not set, the       method will return null',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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
                'name' => 'getPriority',
                'access-modifier' => 'public function',
                'summary' => 'Returns the priority of the message.',
                'description' => 'Returns the priority of the message. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The priority of the message. -1 for non-urgent, 0       for normal and 1 for urgent. Default value is 0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSMTPAccount',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'SMTPAccount
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSMTPServer',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object that holds SMTP server information.',
                'description' => 'Returns an object that holds SMTP server information. The returned instance can be used to access SMTP server messages log       to see if the message was transfered or not. Note that the       connection to the server will only be established once the       method \'EmailMessage::send()\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An instance which represents SMTP server.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/mail/SMTPServer', 'SMTPServer'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSubject',
                'access-modifier' => 'public function',
                'summary' => 'Returns the subject of the email.',
                'description' => 'Returns the subject of the email. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The subject of the email. Default return value is       \'Hello From WebFiori Framework\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTo',
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
                'name' => 'getToStr',
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
                'name' => 'getTranslation',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object which holds i18n labels.',
                'description' => 'Returns an object which holds i18n labels. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The returned object labels will be based on the       language of the email. If no translation is loaded, the method will       return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/i18n/Language', 'Language'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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
                'name' => 'setLang',
                'access-modifier' => 'public function',
                'summary' => 'Sets the display language of the email.',
                'description' => 'Sets the display language of the email. The length of the given string must be 2 characters in order to set the       language code.',
                'params' => [
                    '$lang' => [
                        'type' => 'string',
                        'description' => 'a two digit language code such as AR or EN. Default       value is \'EN\'.',
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
                'name' => 'setPriority',
                'access-modifier' => 'public function',
                'summary' => 'Sets the priority of the message.',
                'description' => 'Sets the priority of the message. ',
                'params' => [
                    '$priority' => [
                        'type' => 'int',
                        'description' => 'The priority of the message. -1 for non-urgent, 0       for normal and 1 for urgent. If the passed value is greater than 1,       then 1 will be used. If the passed value is less than -1, then -1 is       used. Other than that, 0 will be used.',
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
                'name' => 'setSubject',
                'access-modifier' => 'public function',
                'summary' => 'Sets the subject of the message.',
                'description' => 'Sets the subject of the message. ',
                'params' => [
                    '$subject' => [
                        'type' => 'string',
                        'description' => 'Email subject.',
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