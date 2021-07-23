<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ThemeLoaderView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which has utility methods which are related to themes loading.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ThemeLoader');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ThemeLoader', '\webfiori\framework', 'A class which has utility methods which are related to themes loading. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'THEMES_DIR',
            'The directory where themes are located in.',
            'The directory where themes are located in. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'getAvailableThemes',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array that contains the meta data of all available themes.',
                'description' => 'Returns an array that contains the meta data of all available themes. This method will return an associative array. The key is the theme       name and the value is an object of type Theme that contains theme info.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array that contains all themes information. The name       of the theme will be the key and the value is an object of type \'Theme\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLoadedThemes',
                'access-modifier' => 'public static function',
                'summary' => 'Returns an array which contains all loaded themes.',
                'description' => 'Returns an array which contains all loaded themes. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array which contains all loaded themes.       The index will be theme name and the value is an object of type \'Theme\'       which contains theme info.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isThemeLoaded',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if a theme is loaded or not given its name.',
                'description' => 'Checks if a theme is loaded or not given its name. ',
                'params' => [
                    '$themeName' => [
                        'type' => 'string',
                        'description' => 'The name of the theme.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if       the theme was found in the array of loaded themes. false      if not.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'registerResourcesRoutes',
                'access-modifier' => 'public static function',
                'summary' => 'Adds routes to all themes resource files (JavaSecript, CSS and images).',
                'description' => 'Adds routes to all themes resource files (JavaSecript, CSS and images). The method will check for themes resources directories if set or not.       If set, it will scan each directory and add a route to it. For CSS and       JavaScript files, the routes will depend on the directory at which the       files are placed on. Assuming that the domain is \'example.com\' and the       name of theme directory is \'my-theme\' and the directory at which CSS       files are placed on is CSS, then any CSS file can be accessed using       \'https://example.com/my-theme/css/my-file.css\'. For any other resources,       they can be accessed directly. Assuming that we have an       image file somewhere in images directory of the theme. The       image can be accessed as follows: \'https://example.com/my-image.png\'. Note that       CSS, JS and images directories of the theme must be set to correctly create       the routes.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'resetLoaded',
                'access-modifier' => 'public static function',
                'summary' => 'Reset the array which contains all loaded themes.',
                'description' => 'Reset the array which contains all loaded themes. By calling this method, all loaded themes will be unloaded.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'usingTheme',
                'access-modifier' => 'public static function',
                'summary' => 'Loads a theme given its name or class name.',
                'description' => 'Loads a theme given its name or class name. If the given name is null or empty string, the method will load the default theme as       specified by the method AppConfig::getBaseThemeName().',
                'params' => [
                    '$themeName' => [
                        'type' => 'string',
                        'description' => 'The name of the theme. This also can be the name of       theme class including its namespace (e.g. Theme::class).',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an object of type Theme once the       theme is loaded. The object will contain all theme information. If provided       theme name is empty string, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/Theme', 'Theme'),
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