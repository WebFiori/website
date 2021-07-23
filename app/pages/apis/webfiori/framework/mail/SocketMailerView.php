<?php
namespace docGenerator\webfiori\framework\mail;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SocketMailerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to send email messages using sockets.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SocketMailer');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SocketMailer', '\webfiori\framework\mail', 'A class that can be used to send email messages using sockets. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'NL',
            '',
            ' ',
            ),
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
                'summary' => 'Adds new attachment to the message.',
                'description' => 'Adds new attachment to the message. ',
                'params' => [
                    '$attachment' => [
                        'type' => 'File',
                        'description' => 'An object of type \'File\' which contains all       needed information about the file. It will be added only if the file       exist in the path or the raw data of the file is set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the attachment is added, the method will return true.       false otherwise.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addReceiver',
                'access-modifier' => 'public function',
                'summary' => 'Adds new receiver or updates an existing one.',
                'description' => 'Adds new receiver or updates an existing one. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the email receiver (such as \'Ibrahim\'). It       must be non-empty string.',
                        'optional' => false,
                    ],
                    '$address' => [
                        'type' => 'string',
                        'description' => 'The email address of the receiver. It must be       non-empty string. It will act as the identifier for the address.',
                        'optional' => false,
                    ],
                    '$isCC' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the receiver will receive       a carbon copy (CC) of the message. Default is false.',
                        'optional' => false,
                    ],
                    '$isBcc' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the receiver will receive       a blind carbon copy (BCC) of the message. This will override the option $isCC. Default       is false.',
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
                'name' => 'connect',
                'access-modifier' => 'public function',
                'summary' => 'Connect to the mail server.',
                'description' => 'Connect to the mail server. Before calling this method, the developer must make sure that he set       connection information correctly (server address and port number).',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the connection established or already       connected. false if not. Once the connection is established, the       method will send the command \'EHLO\' to the server.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
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
                'name' => 'getLastLogMessage',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last logged message after executing some command.',
                'description' => 'Returns the last logged message after executing some command. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The last logged message after executing some command. Default       value is empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastResponseCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns last response code that was sent by SMTP server after executing       specific command.',
                'description' => 'Returns last response code that was sent by SMTP server after executing       specific command. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The last response code that was sent by SMTP server after executing       specific command. Default return value is 0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
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
                'name' => 'getReceivers',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains the names and the addresses       of message receivers.',
                'description' => 'Returns an associative array that contains the names and the addresses       of message receivers. The indices of the array will act as the addresses of the receivers and       the value of each index will contain the name of the receiver. The array       will only contain the addresses of the people who will receive an original       copy of the message.',
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
                'name' => 'getResponsesLog',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains log messages for any SMTP command       which was sent,',
                'description' => 'Returns an array that contains log messages for any SMTP command       which was sent, ',
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
                'name' => 'getSenderAddress',
                'access-modifier' => 'public function',
                'summary' => 'Returns the email address of the sender.',
                'description' => 'Returns the email address of the sender. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The email address of the sender.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSenderName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of message sender.',
                'description' => 'Returns the name of message sender. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the sender.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTimeout',
                'access-modifier' => 'public function',
                'summary' => 'Returns the time at which the connection will timeout if no response       was received in minutes.',
                'description' => 'Returns the time at which the connection will timeout if no response       was received in minutes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Timeout time in minutes.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isConnected',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the connection is still open or is it closed.',
                'description' => 'Checks if the connection is still open or is it closed. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the connection is open.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isInWritingMode',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the mailer is in message writing mode or not.',
                'description' => 'Checks if the mailer is in message writing mode or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the mailer is in writing mode. The       mailer will only switch to writing mode after sending the command \'DATA\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isLoggedIn',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the user is logged in to mail server or not.',
                'description' => 'Checks if the user is logged in to mail server or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return true if the user is       logged in to the mail server. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isSSL',
                'access-modifier' => 'public function',
                'summary' => 'Sets or gets the value of the property \'useSsl\'.',
                'description' => 'Sets or gets the value of the property \'useSsl\'. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean|null',
                        'description' => 'true if the connection to the server will use SSL.       false if not. If null is given, the property will not updated. Default       is null.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '$bool true if the connection to the server will use SSL.       false if not. Default return value is false',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isTLS',
                'access-modifier' => 'public function',
                'summary' => 'Sets or gets the value of the property \'useTls\'.',
                'description' => 'Sets or gets the value of the property \'useTls\'. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean|null',
                        'description' => 'true if the connection to the server will use TLS.       false if not. If null is given, the property will not updated. Default       is null.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '$bool true if the connection to the server will use TLS.       false if not. Default return value is false',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'login',
                'access-modifier' => 'public function',
                'summary' => 'Authenticate the user given email server username and password.',
                'description' => 'Authenticate the user given email server username and password. Note that Authentication       must be done after connecting to the server.       The user might not be logged       in in 3 cases:      <ul>      <li>If the mailer is not connected to the email server.</li>      <li>If the sender address is not set.</li>      <li>If the given username and password are incorrect.</li>      </ul>',
                'params' => [
                    '$username' => [
                        'type' => 'string',
                        'description' => 'The email server username.',
                        'optional' => false,
                    ],
                    '$password' => [
                        'type' => 'string',
                        'description' => 'The user password.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the user is       logged in to the mail server. false if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'read',
                'access-modifier' => 'public function',
                'summary' => 'Read server response after sending a command to the server.',
                'description' => 'Read server response after sending a command to the server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'string
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'sendC',
                'access-modifier' => 'public function',
                'summary' => 'Sends a command to the mail server.',
                'description' => 'Sends a command to the mail server. ',
                'params' => [
                    '$command' => [
                        'type' => 'string',
                        'description' => 'Any SMTP command.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return always true if the command was       sent. The only case that the method will return false is when it is not       connected to the server.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setHost',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of mail server host.',
                'description' => 'Sets the name of mail server host. ',
                'params' => [
                    '$host' => [
                        'type' => 'string',
                        'description' => 'The name of the host (such as mail.mysite.com).',
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
                'name' => 'setPort',
                'access-modifier' => 'public function',
                'summary' => 'Sets the connection port.',
                'description' => 'Sets the connection port. ',
                'params' => [
                    '$port' => [
                        'type' => 'int',
                        'description' => 'The port number to set.',
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
                'name' => 'setSender',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name and the address of the sender.',
                'description' => 'Sets the name and the address of the sender. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the sender.',
                        'optional' => false,
                    ],
                    '$address' => [
                        'type' => 'string',
                        'description' => 'The email address of the sender.',
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
            new FunctionDef([
                'name' => 'setTimeout',
                'access-modifier' => 'public function',
                'summary' => 'Sets the timeout time of the connection.',
                'description' => 'Sets the timeout time of the connection. ',
                'params' => [
                    '$val' => [
                        'type' => 'int',
                        'description' => 'The value of timeout (in minutes). The timeout will be updated       only if the connection is not yet established and the given value is grater       than 0.',
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
                'summary' => 'Write a message to the buffer.',
                'description' => 'Write a message to the buffer. Note that this method will trim the following character from the string       if they are found in the message: \'\\t\\n\\r\\0\\x0B\\0x1B\\0x0C\'.',
                'params' => [
                    '$msg' => [
                        'type' => 'string',
                        'description' => 'The message to write.',
                        'optional' => false,
                    ],
                    '$sendMessage' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, The connection will be closed and the       message will be sent.',
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