<?php
namespace docGenerator\webfiori\framework\mail;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SMTPAccountView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents an email account which is used to send or receive messages.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SMTPAccount');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SMTPAccount', '\webfiori\framework\mail', 'A class that represents an email account which is used to send or receive messages. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An optional array that contains connection info. The array       can have the following indices:      <ul>      <li><b>port</b>: SMTP server port address. usually 25 or 465.</li>      <li><b>server-address</b>: SMTP server address.</li>      <li><b>user</b>: The username at which it is used to login to SMTP server.</li>      <li><b>pass</b>: The password of the user</li>      <li><b>sender-name</b>: The name of the sender that will appear when the       message is sent.</li>      <li><b>sender-address</b>: The address that will appear when the       message is sent. Usually, it is the same as the username.</li>      <li><b>account-name</b>: A unique name for the account. Used when creating       new email message. If not provided, \'sender-name\' is used.</li>      </ul>',
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
                'name' => 'getAccountName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the account.',
                'description' => 'Returns the name of the account. The name of the account is used by the class \'EmailMessage\' when creating       new instance of the class. Also, the name is used when storing the account       programatically.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that represents the name of the account.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAddress',
                'access-modifier' => 'public function',
                'summary' => 'Returns the email address.',
                'description' => 'Returns the email address. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The email address which will be used in the header       \'FROM\' when sending an email. Default is empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPassword',
                'access-modifier' => 'public function',
                'summary' => 'Returns the password of the user account that is used to access email server.',
                'description' => 'Returns the password of the user account that is used to access email server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The password of the user account that is used to access email server.       default is empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPort',
                'access-modifier' => 'public function',
                'summary' => 'Returns the port number of email server.',
                'description' => 'Returns the port number of email server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The port number of email server. Default is 465.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSenderName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of sender.',
                'description' => 'Returns the name of sender. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the email sender. The name will be used in the header       \'FROM\' when sending an email. Default is empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getServerAddress',
                'access-modifier' => 'public function',
                'summary' => 'Returns The address of the email server.',
                'description' => 'Returns The address of the email server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The address of the email server (such as \'mail.example.com\').       Default is empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUsername',
                'access-modifier' => 'public function',
                'summary' => 'Returns the username that is used to access email server.',
                'description' => 'Returns the username that is used to access email server. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The username that is used to access email server. Default       is empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAccountName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the account.',
                'description' => 'Sets the name of the account. The name of the account is used by the class \'EmailMessage\' when creating       new instance of the class. Also, the name is used when storing the account       programatically.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the account.',
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
                'name' => 'setAddress',
                'access-modifier' => 'public function',
                'summary' => 'Sets the email address.',
                'description' => 'Sets the email address. ',
                'params' => [
                    '$address' => [
                        'type' => 'string',
                        'description' => 'An email address.',
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
                'name' => 'setPassword',
                'access-modifier' => 'public function',
                'summary' => 'Sets the password of the user account that is used to access email server.',
                'description' => 'Sets the password of the user account that is used to access email server. ',
                'params' => [
                    '$pass' => [
                        'type' => 'string',
                        'description' => 'The password of the user account that is used to access email server.',
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
                'summary' => 'Sets the port number of email server.',
                'description' => 'Sets the port number of email server. ',
                'params' => [
                    '$port' => [
                        'type' => 'int',
                        'description' => 'The port number of email server such as 25. It will       be only set if the given value is an integer and it is greater than 0.',
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
                'name' => 'setSenderName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the email account.',
                'description' => 'Sets the name of the email account. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the account (such as \'Programming Team\').       The name is used when sending an email message using the given SMTP account.       The name will be used in the header       \'FROM\' when sending an email',
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
                'name' => 'setServerAddress',
                'access-modifier' => 'public function',
                'summary' => 'Sets the address of the email server.',
                'description' => 'Sets the address of the email server. ',
                'params' => [
                    '$addr' => [
                        'type' => 'string',
                        'description' => 'The address of the email server (such as \'mail.example.com\').',
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
                'name' => 'setUsername',
                'access-modifier' => 'public function',
                'summary' => 'Sets the username that is used to access email server.',
                'description' => 'Sets the username that is used to access email server. ',
                'params' => [
                    '$u' => [
                        'type' => 'string',
                        'description' => 'The username that is used to access email server.',
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