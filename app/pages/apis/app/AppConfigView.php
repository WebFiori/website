<?php
namespace docGenerator\app;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AppConfigView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('Configuration class of the application');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class AppConfig');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'AppConfig', '\app', 'Configuration class of the application '));
        $classAttrsArr = [
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
                'name' => 'addAccount',
                'access-modifier' => 'public function',
                'summary' => 'Adds an email account.',
                'description' => 'Adds an email account. The developer can use this method to add new account during runtime.      The account will be removed once the program finishes.',
                'params' => [
                    '$acc' => [
                        'type' => 'SMTPAccount',
                        'description' => 'an object of type SMTPAccount.',
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
                'name' => 'addDbConnection',
                'access-modifier' => 'public function',
                'summary' => 'Adds new database connection or updates an existing one.',
                'description' => 'Adds new database connection or updates an existing one. ',
                'params' => [
                    '$connectionInfo' => [
                        'type' => 'ConnectionInfo',
                        'description' => 'an object of type \'ConnectionInfo\'      that will contain connection information.',
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
                'name' => 'getAccount',
                'access-modifier' => 'public function',
                'summary' => 'Returns SMTP account given its name.',
                'description' => 'Returns SMTP account given its name. The method will search for an account with the given name in the set      of added accounts. If no account was found, null is returned.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the account.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the account is found, The method      will return an object of type SMTPAccount. Else, the      method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/mail/SMTPAccount', 'SMTPAccount'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAccounts',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains all email accounts.',
                'description' => 'Returns an associative array that contains all email accounts. The indices of the array will act as the names of the accounts.      The value of the index will be an object of type SMTPAccount.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains all email accounts.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAdminThemeName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the theme that is used in admin control pages.',
                'description' => 'Returns the name of the theme that is used in admin control pages. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the theme that is used in admin control pages.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBaseThemeName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of base theme that is used in website pages.',
                'description' => 'Returns the name of base theme that is used in website pages. Usually, this theme is used for the normally visitors of the web site.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of base theme that is used in website pages.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBaseURL',
                'access-modifier' => 'public function',
                'summary' => 'Returns the base URL that is used to fetch resources.',
                'description' => 'Returns the base URL that is used to fetch resources. The return value of this method is usually used by the tag \'base\'      of web site pages.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'the base URL.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getConfigVersion',
                'access-modifier' => 'public function',
                'summary' => 'Returns version number of the configuration file.',
                'description' => 'Returns version number of the configuration file. This value can be used to check for the compatability of configuration file',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The version number of the configuration file.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDBConnection',
                'access-modifier' => 'public function',
                'summary' => 'Returns database connection information given connection name.',
                'description' => 'Returns database connection information given connection name. ',
                'params' => [
                    '$conName' => [
                        'type' => 'string',
                        'description' => 'The name of the connection.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type      ConnectionInfo if a connection info was found for the given connection name.      Other than that, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/database/ConnectionInfo', 'ConnectionInfo'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDBConnections',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contain the information of database connections.',
                'description' => 'Returns an associative array that contain the information of database connections. The keys of the array will be the name of database connection and the      value of each key will be an object of type ConnectionInfo.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDefaultTitle',
                'access-modifier' => 'public function',
                'summary' => 'Returns the global title of the web site that will be      used as default page title.',
                'description' => 'Returns the global title of the web site that will be      used as default page title. ',
                'params' => [
                    '$langCode' => [
                        'type' => 'string',
                        'description' => 'Language code such as \'AR\' or \'EN\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the title of the page      does exist in the given language, the method will return it.      If no such title, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDefaultTitles',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds the default pages titles for different languages.',
                'description' => 'Returns an array that holds the default pages titles for different languages. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The indices of the array will be languages codes such as      \'AR\' and the value at each index will be page title in that language.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDescription',
                'access-modifier' => 'public function',
                'summary' => 'Returns the global description of the web site that will be      used as default page description.',
                'description' => 'Returns the global description of the web site that will be      used as default page description. ',
                'params' => [
                    '$langCode' => [
                        'type' => 'string',
                        'description' => 'Language code such as \'AR\' or \'EN\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the description for the given language      does exist, the method will return it. If no such description, the      method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDescriptions',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array which contains different website descriptions      in different languages.',
                'description' => 'Returns an associative array which contains different website descriptions      in different languages. Each index will contain a language code and the value will be the description      of the website in the given language.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array which contains different website descriptions      in different languages.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHomePage',
                'access-modifier' => 'public function',
                'summary' => 'Returns the home page URL of the website.',
                'description' => 'Returns the home page URL of the website. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The home page URL of the website.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPrimaryLanguage',
                'access-modifier' => 'public function',
                'summary' => 'Returns the primary language of the website.',
                'description' => 'Returns the primary language of the website. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Language code of the primary language such as \'EN\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getReleaseDate',
                'access-modifier' => 'public function',
                'summary' => 'Returns the date at which the application was released at.',
                'description' => 'Returns the date at which the application was released at. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string in the format      \'YYYY-MM-DD\' that represents application release date.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitleSep',
                'access-modifier' => 'public function',
                'summary' => 'Returns the character (or string) that is used to separate page title from website name.',
                'description' => 'Returns the character (or string) that is used to separate page title from website name. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string such as \' - \' or \' | \'. Note that the method      will add the two spaces by default.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitles',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that holds the default page title for different display      languages.',
                'description' => 'Returns an array that holds the default page title for different display      languages. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The indices of the array are language codes      and the values are pages titles.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getVersion',
                'access-modifier' => 'public function',
                'summary' => 'Returns version number of the application.',
                'description' => 'Returns version number of the application. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method should return a string in the      form \'x.x.x.x\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getVersionType',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents application release type.',
                'description' => 'Returns a string that represents application release type. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return a string such as      \'Stable\', \'Alpha\', \'Beta\' and so on.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWebsiteName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the global website name.',
                'description' => 'Returns the global website name. ',
                'params' => [
                    '$langCode' => [
                        'type' => 'string',
                        'description' => 'Language code such as \'AR\' or \'EN\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the name of the website for the given language      does exist, the method will return it. If no such name, the      method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWebsiteNames',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array which contains different website names in different languages.',
                'description' => 'Returns an array which contains different website names in different languages. Each index will contain a language code and the value will be the name      of the website in the given language.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array which contains different website names in different languages.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
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