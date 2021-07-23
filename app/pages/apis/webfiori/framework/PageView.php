<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class PageView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class used to initialize view components.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Page');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Page', '\webfiori\framework', 'A class used to initialize view components. This class is one of the core components for creating web pages. It is simply   represents a web page. By default class has a HTML document that contains   the following basic elements:  <ul>  <li>Head tag that contains CSS, JS and other meta and link tags.</li>  <li>A div element which has the ID \'page-body\' that represents the body   of the page.</li>  <li>A div element which has the ID \'page-header\' that represents the header   section of the page.</li>  <li>A div element which has the ID \'page-footer\' that represents the footer   section of the page.</li>  <li>A div element which has the ID \'main-content-area\' that represents the area   at which user content will be added to.</li>  <li>A div element which has the ID \'side-content-area\' that represents the side   section of the page.</li>  </ul>  In addition to that, this class can be used to set some of the basic attributes   of the page including page language, title, description, writing direction   and canonical URL. Also, this class can be used to load a specific theme   and use it to change the look and feel of the web site.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'MAIN_ELEMENTS',
            'An array that contains the IDs of the 3 main page elements.',
            'An array that contains the IDs of the 3 main page elements. The array has the following values:      <ul>      <li>page-body</li>      <li>page-header</li>      <li>main-content-area</li>      <li>side-content-area</li>      <li>page-footer</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'aside',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or checks if the page will have aside area or not.',
                'description' => 'Sets or checks if the page will have aside area or not. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean|null',
                        'description' => 'If set to true, the generated page       will have a \'div\' element with ID = \'side-content-area\'. If set to       false, the generated page will have no such element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the page will have       aside area.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'beforeRender',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a function which will be executed before the page is fully rendered.',
                'description' => 'Adds a function which will be executed before the page is fully rendered. The function will be executed when the method \'Page::render()\' is called.       One possible use is to do some modifications to the DOM before the       page is displayed. It is possible to have multiple callbacks.',
                'params' => [
                    '$callable' => [
                        'type' => 'callback',
                        'description' => 'A PHP function that will be get executed. before       the page is rendered.',
                        'optional' => false,
                    ],
                    '$params' => [
                        'type' => 'array',
                        'description' => 'An array of parameters which will be passed to the       callback. The parameters can be accessed in the callback in the       same order at which they appear in the array.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the callable is added, the method will return a       number that represents its ID. If not added, the method will return       null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'canonical',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or gets the canonical URL of the page.',
                'description' => 'Sets or gets the canonical URL of the page. Note that it will be set automatically but the developer can change       it if he would like to.',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'The new canonical URL. If null is given, the       method will not update the canonical URL.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The canonical URL of the page.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'cssDir',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the directory at which CSS files of loaded theme exists.',
                'description' => 'Returns the directory at which CSS files of loaded theme exists. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The directory at which CSS files of the theme exists       (e.g. \'themes/my-theme/css\' ).       If the theme is not loaded, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'description',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or gets the description of the page.',
                'description' => 'Sets or gets the description of the page. ',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'The description of the page. If <b>empty string</b> is given,       the description meta tag will be removed from the &lt;head&gt; element. If       null is given, nothing will change. Default value is null.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The description of the page. If it is not set, the method       will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'dir',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or gets page writing direction.',
                'description' => 'Sets or gets page writing direction. Note that the writing direction of the page might change depending       on loaded translation file.',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => '\'ltr\' or \'rtl\'. If something else is given, nothing       will change.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'ltr\' or \'rtl\'. Default return value is null',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'document',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the document that is linked with the page.',
                'description' => 'Returns the document that is linked with the page. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The document that is linked with the page.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLDoc', 'HTMLDoc'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'footer',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or checks if the page will have footer area or not.',
                'description' => 'Sets or checks if the page will have footer area or not. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean|null',
                        'description' => 'If set to true, the generated page       will have a \'div\' element with ID = \'page-footer\'. If set to       false, the generated page will have no such element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the page will have       footer area.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'header',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or checks if the page will have header area or not.',
                'description' => 'Sets or checks if the page will have header area or not. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean|null',
                        'description' => 'If set to true, the generated page       will have a \'div\' element with ID = \'page-header\'. If set to       false, the generated page will have no such element.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the page will have       header area.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'imagesDir',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the directory at which image files of loaded theme exists.',
                'description' => 'Returns the directory at which image files of loaded theme exists. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The directory at which image files of the theme exists       (e.g. \'themes/my-theme/images\' ).       If the theme is not loaded, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'includeI18nLables',
                'access-modifier' => 'public static function',
                'summary' => 'Sets the value of the property which is used to determine if the       JavaScript variable \'window.',
                'description' => 'Sets the value of the property which is used to determine if the       JavaScript variable \'window. i18n\' will be included or not.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean|null',
                        'description' => 'true to include it. False to not. Passing null       will cause no change.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the variable will be included.       False if not. Default return value is true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'insert',
                'access-modifier' => 'public static function',
                'summary' => 'Adds a child node inside the body of a node given its ID.',
                'description' => 'Adds a child node inside the body of a node given its ID. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be inserted. Also,       this can be the tag name of the node such as \'div\'.',
                        'optional' => false,
                    ],
                    '$parentNodeId' => [
                        'type' => 'string',
                        'description' => 'The ID of the node that the given node       will be inserted to.',
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
                'name' => 'jsDir',
                'access-modifier' => 'public static function',
                'summary' => 'Returns the directory at which JavaScript files of the theme exists.',
                'description' => 'Returns the directory at which JavaScript files of the theme exists. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The directory at which JavaScript files of the theme exists       (e.g. \'themes/my-theme/js\' ).       If the theme is not loaded, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'lang',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or gets language code of the page.',
                'description' => 'Sets or gets language code of the page. ',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'A two digit language code such as AR or EN.',
                        'optional' => false,
                    ],
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
                'name' => 'render',
                'access-modifier' => 'public static function',
                'summary' => 'Display the page in the web browser or gets the rendered document as string.',
                'description' => 'Display the page in the web browser or gets the rendered document as string. ',
                'params' => [
                    '$formatted' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the rendered       HTML document will be well formatted and readable. Note that by adding       formatting to the page, the size of rendered HTML document       will increase. The document will be compressed if this       parameter is set to false. Default is false.',
                        'optional' => false,
                    ],
                    '$returnResult' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the method       will return the rendered HTML document as string. Default value is       false.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the parameter <b>$returnResult</b> is set to true,       the method will return an object of type \'HTMLDoc\' that represents the rendered page. Other       than that, it will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLDoc', 'HTMLDoc'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'reset',
                'access-modifier' => 'public static function',
                'summary' => 'Reset the page to its defaults.',
                'description' => 'Reset the page to its defaults. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'separator',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or returns the string that is used to separate web site name from       the title of the page.',
                'description' => 'Sets or returns the string that is used to separate web site name from       the title of the page. ',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'The new title separator.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The string that is used to separate web site name from       the title of the page. Note that a space will be appended to the start       and to the end of the returned value. For example, if separator is set       to the character \'|\', then the method will return the string \' | \'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'siteName',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or returns the name of page web site.',
                'description' => 'Sets or returns the name of page web site. ',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'The new name to set. It must be non-empty       string in order to update.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The name of page web site. Default is \'Hello Website\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'theme',
                'access-modifier' => 'public static function',
                'summary' => 'Loads or returns page theme.',
                'description' => 'Loads or returns page theme. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the theme which will be       loaded. If null is given, the method will get theme name from the       class \'SiteConfig\' and try to load it. If empty string is given,       nothing will be loaded.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If a theme is loaded, the method will       return it contained in an object of type \'Theme\'. If no       theme is loaded, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/Theme', 'Theme'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'title',
                'access-modifier' => 'public static function',
                'summary' => 'Sets or gets the title of the page.',
                'description' => 'Sets or gets the title of the page. The format of the title is <b>PAGE_NAME TITLE_SEP WEBSITE_NAME</b>.       for example, if the page name is \'Home\' and title separator is       \'|\' and the name of the website is \'Programming Academia\'. The title       of the page will be \'Home | Programming Academia\'. In this case, the value       that must be supplied to this method is \'Home\'.',
                'params' => [
                    '$new' => [
                        'type' => 'string',
                        'description' => 'The title of the page.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The title of the page. Default return value is \'Hello World\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'translation',
                'access-modifier' => 'public static function',
                'summary' => 'Loads and returns translation based on page language code.',
                'description' => 'Loads and returns translation based on page language code. Note that page language must be set before calling this method in       order to load a translation file. Translations can be found in       the folder \'/app/lang\'. Also, the method will throw an exception       in case language file is not found or not initialized correctly.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type Language is returned       if the language is loaded. Other than that, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/i18n/Language', 'Language'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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