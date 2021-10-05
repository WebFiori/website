<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ConfigControllerView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that can be used to modify basic configuration settings of   the web application.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ConfigController');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ConfigController', '\webfiori\framework', 'A class that can be used to modify basic configuration settings of   the web application. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'DB_NOT_EMPTY',
            'A constant that indicates the selected database schema has tables.',
            'A constant that indicates the selected database schema has tables. ',
            ),
            new AttributeDef(
            'const',
            '',
            'DEFAULT_APP_CONFIG',
            '',
            ' ',
            ),
            new AttributeDef(
            'const',
            '',
            'INV_CREDENTIALS',
            'A constant that indicates the given username or password        is invalid.',
            'A constant that indicates the given username or password        is invalid. ',
            ),
            new AttributeDef(
            'const',
            '',
            'INV_HOST_OR_PORT',
            'A constant that indicates a mail server address or its port       is invalid.',
            'A constant that indicates a mail server address or its port       is invalid. ',
            ),
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
                'name' => 'addOrUpdateDBConnection',
                'access-modifier' => 'public function',
                'summary' => 'Adds new database connections information or update existing connections.',
                'description' => 'Adds new database connections information or update existing connections. The information of the connections will be stored in the file \'AppConfig.php\'.',
                'params' => [
                    '$dbConnectionsInfo' => [
                        'type' => 'array',
                        'description' => 'An array that contains objects of type ConnectionInfo.',
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
                'name' => 'createAppConfigFile',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createConstClass',
                'access-modifier' => 'public function',
                'summary' => 'Creates the class \'GlobalConstants\'.',
                'description' => 'Creates the class \'GlobalConstants\'. By default, the class will be created inside the folder \'app/ini\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createIniClass',
                'access-modifier' => 'public function',
                'summary' => 'Creates initialization class.',
                'description' => 'Creates initialization class. Note that if routes class already exist, this method will override       existing file.',
                'params' => [
                    '$className' => [
                        'type' => 'string',
                        'description' => 'The name of the class.',
                        'optional' => false,
                    ],
                    '$comment' => [
                        'type' => 'string',
                        'description' => 'A PHPDoc comment for class method.',
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
                'name' => 'createRoutesClass',
                'access-modifier' => 'public function',
                'summary' => 'Creates a file that holds class information which is used to create       routes.',
                'description' => 'Creates a file that holds class information which is used to create       routes. Note that if routes class already exist, this method will override       existing file.',
                'params' => [
                    '$className' => [
                        'type' => 'string',
                        'description' => 'The name of the class.',
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
                'name' => 'get',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a single instance of the class.',
                'description' => 'Returns a single instance of the class. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'ConfigController
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAdminTheme',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the name of admin theme of the web       application.',
                'description' => 'Returns a string that represents the name of admin theme of the web       application. ',
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
                'name' => 'getAppVersionInfo',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that holds application version info.',
                'description' => 'Returns an associative array that holds application version info. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The array will have the following indices: \'version\',       \'version-type\' and \'release-date\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBase',
                'access-modifier' => 'public function',
                'summary' => 'Returns the base URL which is use as a value for the tag &gt;base&lt;.',
                'description' => 'Returns the base URL which is use as a value for the tag &gt;base&lt;. ',
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
                'name' => 'getBaseTheme',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the name of the base theme of the web       application.',
                'description' => 'Returns a string that represents the name of the base theme of the web       application. ',
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
                'name' => 'getCRONPassword',
                'access-modifier' => 'public function',
                'summary' => 'Returns password hash of the password which is used to protect background       jobs from unauthorized execution.',
                'description' => 'Returns password hash of the password which is used to protect background       jobs from unauthorized execution. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Password hash or the string \'NO_PASSWORD\' if there is no       password.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDatabaseConnections',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds database connections.',
                'description' => 'Returns an array that holds database connections. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The indices of the array are names of the connections and       the value of each index is an object of type \'ConnectionInfo\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDescriptions',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds different descriptions for the web application       on different languages.',
                'description' => 'Returns an array that holds different descriptions for the web application       on different languages. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The indices of the array are language codes such as \'AR\' and       the value of the index is the description.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHomePage',
                'access-modifier' => 'public function',
                'summary' => 'Returns a link that represents the home page of the web application.',
                'description' => 'Returns a link that represents the home page of the web application. ',
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
                'name' => 'getPrimaryLang',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents primary language of the web application.',
                'description' => 'Returns a string that represents primary language of the web application. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A two characters string such as \'EN\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSMTPAccounts',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds SMTP connections.',
                'description' => 'Returns an array that holds SMTP connections. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The indices of the array are names of the connections and       the value of each index is an object of type \'SMTPAccount\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSiteConfigVars',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains web site configuration       info.',
                'description' => 'Returns an associative array that contains web site configuration       info. The returned array will have the following indices:       <ul>      <li><b>website-names</b>: A sub associative array. The index of the       array will be language code (such as \'EN\') and the value       will be the name of the web site in the given language.</li>      <li><b>base-url</b>: The URL at which system pages will be served from.       usually, this URL is used in the tag \'base\' of the web page.</li>      <li><b>title-separator</b>: A character or a string that is used       to separate web site name from web page title.</li>      <li><b>home-page</b>: The URL of the home page of the web site.</li>      <li><b>base-theme</b>: The name of the theme that will be used to style       web site UI.</li>      <li><b>primary-language</b>: Primary language of the website.      <li><b>admin-theme</b>: The name of the theme that is used to style       admin web pages.</li>      <li><b>descriptions</b>: A sub associative array. The index of the       array will be language code (such as \'EN\') and the value       will be the general web site description in the given language.</li></li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains web site configuration       info.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSocketMailer',
                'access-modifier' => 'public function',
                'summary' => 'Returns a new instance of the class SocketMailer.',
                'description' => 'Returns a new instance of the class SocketMailer. The method will try to establish a connection to SMTP server using       the given SMTP account.',
                'params' => [
                    '$emailAcc' => [
                        'type' => 'SMTPAccount',
                        'description' => 'An account that is used to initiate       socket mailer.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an instance of SocketMailer      on successful connection. If no connection is established, the method will       return MailFunctions::INV_HOST_OR_PORT. If user authentication fails,       the method will return \'MailFunctions::INV_CREDENTIALS\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/mail/SocketMailer', 'SocketMailer'),
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitleSep',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the string that will be used to separate       website name from page title.',
                'description' => 'Returns a string that represents the string that will be used to separate       website name from page title. ',
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
                'name' => 'getTitles',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds different page titles for the web application       on different languages.',
                'description' => 'Returns an array that holds different page titles for the web application       on different languages. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The indices of the array are language codes such as \'AR\' and       the value of the index is the title.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWebsiteNames',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds different names for the web application       on different languages.',
                'description' => 'Returns an array that holds different names for the web application       on different languages. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The indices of the array are language codes such as \'AR\' and       the value of the index is the name.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeAccount',
                'access-modifier' => 'public function',
                'summary' => 'Removes SMTP email account if it is exist.',
                'description' => 'Removes SMTP email account if it is exist. ',
                'params' => [
                    '$accountName' => [
                        'type' => 'string',
                        'description' => 'The name of the email account (such as \'no-reply\').',
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
                'name' => 'removeDBConnection',
                'access-modifier' => 'public function',
                'summary' => 'Removes database connection given its name.',
                'description' => 'Removes database connection given its name. This method will search for a connection which has the given database       name. Once it found, it will remove the connection and save the updated       information to the file \'AppConfig.php\'.',
                'params' => [
                    '$connectionName' => [
                        'type' => 'string',
                        'description' => 'The name of the connection.',
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
                'name' => 'updateAppVersionInfo',
                'access-modifier' => 'public function',
                'summary' => 'Update application version information.',
                'description' => 'Update application version information. ',
                'params' => [
                    '$vNum' => [
                        'type' => 'string',
                        'description' => 'Version number such as 1.0.0.',
                        'optional' => false,
                    ],
                    '$vType' => [
                        'type' => 'string',
                        'description' => 'Version type such as \'Beta\', \'Alpha\' or \'RC\'.',
                        'optional' => false,
                    ],
                    '$releaseDate' => [
                        'type' => 'string',
                        'description' => 'The date at which the version was released on.',
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
                'name' => 'updateCronPassword',
                'access-modifier' => 'public function',
                'summary' => 'Updates the password which is used to protect cron jobs from unauthorized       execution.',
                'description' => 'Updates the password which is used to protect cron jobs from unauthorized       execution. ',
                'params' => [
                    '$newPass' => [
                        'type' => 'string',
                        'description' => 'The new password. If empty string is given, the password       will be set to the string \'NO_PASSWORD\'.',
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
                'name' => 'updateOrAddEmailAccount',
                'access-modifier' => 'public function',
                'summary' => 'Adds new SMTP account or Updates an existing one.',
                'description' => 'Adds new SMTP account or Updates an existing one. Note that the connection will be added or updated only if it       has correct information.',
                'params' => [
                    '$emailAccount' => [
                        'type' => 'SMTPAccount',
                        'description' => 'An instance of \'SMTPAccount\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the email       account was updated or added. If the email account contains wrong server       information, the method will return MailFunctions::INV_HOST_OR_PORT.       If the given email account contains wrong login info, the method will       return MailFunctions::INV_CREDENTIALS. Other than that, the method       will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'updateSiteInfo',
                'access-modifier' => 'public function',
                'summary' => 'Updates web site configuration based on some attributes.',
                'description' => 'Updates web site configuration based on some attributes. ',
                'params' => [
                    '$websiteInfoArr' => [
                        'type' => 'array',
                        'description' => 'an associative array. The array can       have the following indices:       <ul>      <li><b>primary-lang</b>: The main display language of the website.      <li><b>website-names</b>: A sub associative array. The index of the       array should be language code (such as \'EN\') and the value       should be the name of the web site in the given language.</li>      <li><b>title-sep</b>: A character or a string that is used       to separate web site name from web page title. Two common       values are \'-\' and \'|\'.</li>      <li><b>home-page</b>: The URL of the home page of the web site. For example,       If root URL of the web site is \'https://www.example.com\', This page is served       when the user visits this URL.</li>      <li><b>base-theme</b>: The name of the theme that will be used to style       web site UI.</li>      <li><b>admin-theme</b>: If the web site has two UIs (One for normal       users and another for admins), this one       can be used to serve the UI for web site admins.</li>      <li><b>descriptions</b>: A sub associative array. The index of the       array should be language code (such as \'EN\') and the value       should be the general web site description in the given language.</li></li>      </ul>',
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
                'name' => 'writeAppConfig',
                'access-modifier' => 'public function',
                'summary' => 'Stores configuration variables into the application configuration class.',
                'description' => 'Stores configuration variables into the application configuration class. ',
                'params' => [
                    '$appConfigArr' => [
                        'type' => 'array',
                        'description' => 'An array that holds configuration vatiables.       The array can have the following indices:      <ul>      <li><b>db-connections</b>: An array that holds objects of type       \'ConnectionInfo\'.</li>      <li><b>smtp</b>: An array that holds objects of type \'SMTPAccount\' that       holds SMTP connection information.</li>      <li><b>website-names</b>: An associative array that holds website names       in different display languages. The index should be language code such       as \'EN\' and the value of the index is website name in that language.</li>      <li><b>titles</b>: An associative array that holds default page titles       in different display languages. The index should be language code such       as \'EN\' and the value of the index is page title in that language.</li>      <li><b>descriptions</b>: An associative array that holds page descriptions       in different display languages. The index should be language code such       as \'EN\' and the value of the index is page description in that language.</li>      <li><b>home-page</b>: A link that represents home page of the website.</li>      <li><b>primary-lang</b>: The primary display language of the website.</li>      <li><b>base-theme</b>: The name of the theme that will be used in the       pages that will be shown to all users (public and private)</li>      <li><b>admin-theme</b>: The name of the theme that will be shown       in control pages of the system.</li>      <li><b>cron-pass</b>: The password which is used to protect cron jobs       fron unauthorized access. If empty string is given, the string       \'NO_PASSWORD\' is used.</li>      </ul>',
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