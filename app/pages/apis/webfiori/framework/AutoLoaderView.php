<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AutoLoaderView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An autoloader class to load classes as needed during runtime.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class AutoLoader');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'AutoLoader', '\webfiori\framework', 'An autoloader class to load classes as needed during runtime. The class aims to provide all needed utilities to autoload any classes   which are within the scope of the framework. In addition, the developer   can add his own custom folders to the autoloader. More to that, the autoloder   will load any class which exist in the folder \'vendor\' if composer   is used to collect the dependencies. To activate this feature, the constant   \'LOAD_COMPOSER_PACKAGES\' must be defined and set to true. The class can be used independent of   any other component to load classes.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'CACHE_NAME',
            'The name of the file that represents autoloder\'s cache.',
            'The name of the file that represents autoloder\'s cache. ',
            ),
            new AttributeDef(
            'const',
            '',
            'ON_FAIL_ACTIONS',
            'An array that contains the possible things that can be performed       if a class has failed to load.',
            'An array that contains the possible things that can be performed       if a class has failed to load. The array has the following values:      <ul>      <li>throw-exception</li>,      <li>do-nothing</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'get',
                'access-modifier' => 'public static function',
                'summary' => 'Returns a single instance of the class \'AutoLoader\'.',
                'description' => 'Returns a single instance of the class \'AutoLoader\'. ',
                'params' => [
                    'An' => [
                        'type' => '$options',
                        'description' => 'associative array of options that is used to initialize       the autoloader. The available options are:      <ul>      <li><b>root</b>: A directory that can be used as a base search folder.       Default is empty string. Ignored if the constant ROOT_DIR is defined.</li>      <li><b>search-folders</b>: An array which contains a set of folders to search       on. Default is an empty array.</li>      <li><b>define-root</b>: If set to true, The autoloader will try to define       the constant \'ROOT_DIR\' based on the autoload folders.       Default is false. Ignored if the constant ROOT_DIR is defined.</li>,      <li>      <b>on-load-failure</b>: An attribute that will be used if the       loader is unable to load the class. Possible values are:      <ul>      <li>\'do-nothing\'</li>      <li>\'throw-exception\'</li>      <li>A callable that will be called when the class loader is unable       to load the class.</li>      </ul>      </li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'AutoLoader
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCasheArray',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains all cashed classes information.',
                'description' => 'Returns an array that contains all cashed classes information. The returned array will be associative. The keys of the array are the       names of the classes and the value of each key is a sub-indexed array.       The indexed array will contains the paths at which the class was found in.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array that contains all cashed classes information.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getClassPath',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains the paths to all files which has a class       with the given name.',
                'description' => 'Returns an array that contains the paths to all files which has a class       with the given name. Note that the method will only return the path to a loaded class only.',
                'params' => [
                    '$className' => [
                        'type' => 'string',
                        'description' => 'The name of the class.',
                        'optional' => false,
                    ],
                    '$namespace' => [
                        'type' => 'string|null',
                        'description' => 'If specified, the search will only be specific       to the given namespace. This means the array will have one path most       probably. Default is null.',
                        'optional' => false,
                    ],
                    '$load' => [
                        'type' => 'boolean',
                        'description' => 'If the class is not loaded and this parameter is set       to true, the method will attempt to load the class. Default is false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An array that contains all paths to the files which have       a definition for the given class.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getFolders',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array of all added search folders.',
                'description' => 'Returns an array of all added search folders. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array of all added search folders.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLoadedClasses',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an indexed array of all loaded classes.',
                'description' => 'Returns an indexed array of all loaded classes. At each index, there will be an associative array.       Each sub array will have the following indices:      <ul>      <li><b>class-name</b>: The actual name of the class.</li>      <li><b>namespace</b>: The namespace at which the class belongs to.</li>      <li><b>path</b>: The location of the file that represents the class.</li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains loaded classes info.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'newSearchFolder',
                'access-modifier' => 'public static function',
                'summary' => 'Adds new folder to the set folder at which the autoloader will try to search       on for classes.',
                'description' => 'Adds new folder to the set folder at which the autoloader will try to search       on for classes. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'A string that represents a directory. The directory       must be inside the scope of the framework.',
                        'optional' => false,
                    ],
                    '$incSubFolders' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, even sub-directories which       are inside the given directory will be included in the search.',
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
                'name' => 'root',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the root directory that is used to search inside.',
                'description' => 'Returns the root directory that is used to search inside. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The root directory that is used to search inside.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setOnFail',
                'access-modifier' => 'public static function',
                'summary' => 'Sets what will happen in case a class was failed to load.',
                'description' => 'Sets what will happen in case a class was failed to load. ',
                'params' => [
                    '$onFail' => [
                        'type' => 'Closure|string',
                        'description' => 'It can be a PHP function or one of       the following values:      <ul>      <li>do-nothing</li>      <li>throw-exception</li>      </ul>',
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