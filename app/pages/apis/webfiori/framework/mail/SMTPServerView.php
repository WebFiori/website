<?php
namespace docGenerator\webfiori\framework\mail;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SMTPServerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which can be used to connect to SMTP server and execute commands on it.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SMTPServer');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SMTPServer', '\webfiori\framework\mail', 'A class which can be used to connect to SMTP server and execute commands on it. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'NL',
            '',
            ' ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Initiates new instance of the class.',
                'description' => 'Initiates new instance of the class. ',
                'params' => [
                    '$serverAddress' => [
                        'type' => 'string',
                        'description' => 'SMTP Server address such as \'smtp.example.com\'.',
                        'optional' => false,
                    ],
                    '$port' => [
                        'type' => 'string',
                        'description' => 'SMTP server port such as 25, 465 or 587.',
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
                'name' => 'authLogin',
                'access-modifier' => 'public function',
                'summary' => 'Use plain authorization method to log in the user to SMTP server.',
                'description' => 'Use plain authorization method to log in the user to SMTP server. This method will attempt to establish a connection to SMTP server if       the method \'SMTPServer::connect()\' is called.',
                'params' => [
                    '$username' => [
                        'type' => 'string',
                        'description' => 'The username of SMTP server user.',
                        'optional' => false,
                    ],
                    '$pass' => [
                        'type' => 'string',
                        'description' => 'The password of the user.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the user is authenticated successfully, the method      will return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'connect',
                'access-modifier' => 'public function',
                'summary' => 'Connects to SMTP server.',
                'description' => 'Connects to SMTP server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the connection was established and the \'EHLO\' command       was successfully sent, the method will return true. Other than that, the       method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHost',
                'access-modifier' => 'public function',
                'summary' => 'Returns SMTP server host address.',
                'description' => 'Returns SMTP server host address. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string such as \'smtp.example.com\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastLogEntry',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains last log entry.',
                'description' => 'Returns an array that contains last log entry. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array will have 4 indices, \'command\', \'code\',      \'message\' and \'time\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastResponse',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last response message which was sent by the server.',
                'description' => 'Returns the last response message which was sent by the server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The last response message after executing some command. Default       value is empty string.',
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
                'name' => 'getLastSentCommand',
                'access-modifier' => 'public function',
                'summary' => 'Returns the last command which was sent to SMTP server.',
                'description' => 'Returns the last command which was sent to SMTP server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The last command which was sent to SMTP server.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLog',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains log messages for different events or       commands which was sent to the server.',
                'description' => 'Returns an array that contains log messages for different events or       commands which was sent to the server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array will hold sub-associative arrays. Each array       will have 4 indices, \'command\', \'code\', \'message\' and \'time\'',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPort',
                'access-modifier' => 'public function',
                'summary' => 'Returns SMTP server port number.',
                'description' => 'Returns SMTP server port number. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Common values are : 25, 465 (SSL) and 586 (TLS).',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getServerOptions',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains server supported commands.',
                'description' => 'Returns an array that contains server supported commands. The method will only be able to get the options after sending the       command \'EHLO\' to the server. The array will be empty if not       connected to SMTP server.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that holds supported SMTP server options.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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
                'summary' => 'Checks if the server is in message writing mode.',
                'description' => 'Checks if the server is in message writing mode. The server will be in writing mode if the command \'DATA\' was sent.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the server is in message writing mode, the method       will return true. False otherwise.',
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
                'name' => 'sendCommand',
                'access-modifier' => 'public function',
                'summary' => 'Sends a command to the mail server.',
                'description' => 'Sends a command to the mail server. ',
                'params' => [
                    '$command' => [
                        'type' => 'string',
                        'description' => 'Any SMTP command which is supported by the server.',
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
                'name' => 'sendHello',
                'access-modifier' => 'public function',
                'summary' => 'Sends \'EHLO\' command to SMTP server.',
                'description' => 'Sends \'EHLO\' command to SMTP server. The developer does not have to call this method manually as its       called when connecting to SMTP server.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the command was sent successfully, the method will       return true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
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
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;