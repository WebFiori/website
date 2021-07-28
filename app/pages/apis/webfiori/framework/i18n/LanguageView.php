<?php
namespace docGenerator\webfiori\framework\i18n;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class LanguageView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that is can be used to make the application ready for   Internationalization (i18n).');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Language');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Language', '\webfiori\framework\i18n', 'A class that is can be used to make the application ready for   Internationalization (i18n). In order to create a language file, the developer must extend this class.   The language class must be added to the namespace \'app/langs\' and the name   of language file must be \'LanguageXX.php\' where \'XX\' are two characters that   represents language code. The directory at which the language file must exist in   is not important but it is recommended to add them to the folder \'app/langs\'   of the framework.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'DIR_LTR',
            'A constant for left to right writing direction.',
            'A constant for left to right writing direction. ',
            ),
            new AttributeDef(
            'const',
            '',
            'DIR_RTL',
            'A constant for right to left writing direction.',
            'A constant for right to left writing direction. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '&getLoadedLangs',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a reference to an associative array that contains an objects of       type \'Language\'.',
                'description' => 'Returns a reference to an associative array that contains an objects of       type \'Language\'. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The key of the array represents two       characters language code. The index will contain an object of type \'Language\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => '\'ltr\' or \'rtl\'. Default is \'ltr\'.',
                        'optional' => false,
                    ],
                    '$code' => [
                        'type' => 'string',
                        'description' => 'Language code (such as \'AR\'). Default is \'XX\'',
                        'optional' => false,
                    ],
                    '$initials' => [
                        'type' => 'array',
                        'description' => 'An initial array of directories.',
                        'optional' => false,
                    ],
                    '$addtoLoadedAfterCreate' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the language object that       will be created will be added to the set of loaded languages. Default is true.',
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
                'name' => 'createAndSet',
                'access-modifier' => 'public function',
                'summary' => 'Creates a sub-array for defining language variables given initial set       of variables.',
                'description' => 'Creates a sub-array for defining language variables given initial set       of variables. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A string that looks like a       directory.',
                        'optional' => false,
                    ],
                    '$labels' => [
                        'type' => 'array',
                        'description' => 'An associative array. The key will act as the variable       name and the value of the key will act as the variable value.',
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
                'name' => 'createDirectory',
                'access-modifier' => 'public function',
                'summary' => 'Creates a sub array to define language variables.',
                'description' => 'Creates a sub array to define language variables. ',
                'params' => [
                    '$param' => [
                        'type' => 'string',
                        'description' => 'A string that looks like a       directory. For example, if the given string is \'general\',       an array with key name \'general\' will be created. Another example is       if the given string is \'pages/login\', two arrays will be created. The       top one will have the key value \'pages\' and another one inside       the pages array with key value \'login\'.',
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
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of a language variable.',
                'description' => 'Returns the value of a language variable. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'A directory to the language variable (such as \'pages/login/login-label\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the given directory represents a label, the       function will return its value. If it represents an array, the array will       be returned. If nothing was found, the returned value will be the passed       value to the function.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns the language code that the object represents.',
                'description' => 'Returns the language code that the object represents. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Language code in upper case (such as \'AR\'). If language       code is not set, default is returned which is \'XX\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLanguageVars',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains language variables definition.',
                'description' => 'Returns an associative array that contains language variables definition. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains language variables definition.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWritingDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns language writing direction.',
                'description' => 'Returns language writing direction. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '\'ltr\' or \'rtl\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isLoaded',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the language is added to the set of loaded languages or not.',
                'description' => 'Checks if the language is added to the set of loaded languages or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The function will return true if the language is added to       the set of loaded languages.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'loadTranslation',
                'access-modifier' => 'public static function',
                'summary' => 'Loads a language file based on language code.',
                'description' => 'Loads a language file based on language code. ',
                'params' => [
                    '$langCode' => [
                        'type' => 'string',
                        'description' => 'A two digits language code (such as \'ar\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'an object of type \'Language\' is returned if       the language was loaded.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/i18n/Language', 'Language'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'reset',
                'access-modifier' => 'public static function',
                'summary' => 'Removes all loaded languages.',
                'description' => 'Removes all loaded languages. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'set',
                'access-modifier' => 'public function',
                'summary' => 'Sets or updates a language variable.',
                'description' => 'Sets or updates a language variable. Note that the variable will be set only if the directory does exist.',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A string that looks like a       directory.',
                        'optional' => false,
                    ],
                    '$varName' => [
                        'type' => 'string',
                        'description' => 'The name of the variable. Note that if the name       of the variable is set and it was an array, it will become a string       which has the given name and value.',
                        'optional' => false,
                    ],
                    '$varValue' => [
                        'type' => 'string',
                        'description' => 'The value of the variable.',
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
                'name' => 'setCode',
                'access-modifier' => 'public function',
                'summary' => 'Sets the code of the language.',
                'description' => 'Sets the code of the language. ',
                'params' => [
                    '$code' => [
                        'type' => 'string',
                        'description' => 'Language code (such as \'AR\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The function will return true if the language       code is set. If not set, the function will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setMultiple',
                'access-modifier' => 'public function',
                'summary' => 'Sets multiple language variables.',
                'description' => 'Sets multiple language variables. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A string that looks like a       directory.',
                        'optional' => false,
                    ],
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An associative array. The key will act as the variable       name and the value of the key will act as the variable value. The value       can be a sub associative array of labels or simple strings.',
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
                'summary' => 'Sets language writing direction.',
                'description' => 'Sets language writing direction. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => '\'ltr\' or \'rtl\'. Letters case does not matter.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The function will return <b>true</b> if the language       writing direction is updated. The only case that the function       will return <b>false</b> is when the writing direction is invalid (      Any value other than \'ltr\' and \'rtl\').',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'unloadTranslation',
                'access-modifier' => 'public static function',
                'summary' => 'Unload translation based on its language code.',
                'description' => 'Unload translation based on its language code. ',
                'params' => [
                    '$langCode' => [
                        'type' => 'string',
                        'description' => 'A two digits language code (such as \'ar\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the translation file was unloaded, the method will       return true. If not, the method will return false.',
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