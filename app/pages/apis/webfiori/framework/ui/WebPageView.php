<?php
namespace docGenerator\webfiori\framework\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class WebPageView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A base class that can be used to implement web pages.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class WebPage');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'WebPage', '\webfiori\framework\ui', 'A base class that can be used to implement web pages. '));
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
                'name' => 'addBeforeRender',
                'access-modifier' => 'public function',
                'summary' => 'Adds a function which will be executed before the page is fully rendered.',
                'description' => 'Adds a function which will be executed before the page is fully rendered. The function will be executed when the method \'WebPage::render()\' is called.       One possible use is to do some modifications to the DOM before the       page is displayed. It is possible to have multiple callbacks.',
                'params' => [
                    '$callable' => [
                        'type' => 'callback',
                        'description' => 'A PHP function that will be get executed. before       the page is rendered. Note that the first argument of the function will       always be an object of type "WebPage".',
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
                'name' => 'addCSS',
                'access-modifier' => 'public function',
                'summary' => 'Adds new CSS source file.',
                'description' => 'Adds new CSS source file. ',
                'params' => [
                    '$href' => [
                        'type' => 'string',
                        'description' => 'The link to the file. Must be non empty string. It is       possible to append query string to the end of the link.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array',
                        'description' => 'An associative array of additional attributes       to set for the node. One special attribute has the name \'revision\'. If      set to true, a query string parameter in the form \'?cv=x.x\' is appended      to the \'href\' attribute value. The \'x.x\' represent application version      taken from the class \'AppConfig\' Default value of the attribute is true.',
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
                'name' => 'addJS',
                'access-modifier' => 'public function',
                'summary' => 'Adds new JavsScript source file.',
                'description' => 'Adds new JavsScript source file. ',
                'params' => [
                    '$src' => [
                        'type' => 'string',
                        'description' => 'The location of the file. Must be non-empty string. It       can have query string at the end.',
                        'optional' => false,
                    ],
                    '$attrs' => [
                        'type' => 'array',
                        'description' => 'An associative array of additional attributes       to set for the JavaScript node. One special attribute has the name \'revision\'. If      set to true, a query string parameter in the form \'?jv=x.x\' is appended      to the \'href\' attribute value. The \'x.x\' represent application version      taken from the class \'AppConfig\' Default value of the attribute is true.',
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
                'name' => 'addMeta',
                'access-modifier' => 'public function',
                'summary' => 'Adds new meta tag.',
                'description' => 'Adds new meta tag. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The value of the property \'name\'. Must be non empty       string.',
                        'optional' => false,
                    ],
                    '$content' => [
                        'type' => 'string',
                        'description' => 'The value of the property \'content\'.',
                        'optional' => false,
                    ],
                    '$override' => [
                        'type' => 'boolean',
                        'description' => 'A boolean parameter. If a meta node was found       which has the given name and this attribute is set to true,       the content of the meta will be overridden by the passed value.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the instance at which the method       is called on.',
                    'return-types' => [
                        'HeadNote',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'createHTMLNode',
                'access-modifier' => 'public function',
                'summary' => 'Create HTML node based on the method which exist on the applied theme.',
                'description' => 'Create HTML node based on the method which exist on the applied theme. This method can be only used if a theme is applied and the method       Theme::createHTMLNode() is implemented.',
                'params' => [
                    '$nodeInfo' => [
                        'type' => 'array',
                        'description' => 'An array that holds node information.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The returned HTML node will depend on how the       developer has implemented the method Theme::createHTMLNode(). If       no theme is applied, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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
                'name' => 'getActiveSession',
                'access-modifier' => 'public function',
                'summary' => 'Returns the session which is currently active.',
                'description' => 'Returns the session which is currently active. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If a session is active, the method will return its       data stored in an object. If no session is active, the method will return       null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/session/Session', 'Session'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBase',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of the attribute \'href\' of the node \'base\' of page document.',
                'description' => 'Returns the value of the attribute \'href\' of the node \'base\' of page document. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the base URL is set, the method will return its value.       If the value of the base URL is not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCanonical',
                'access-modifier' => 'public function',
                'summary' => 'Returns the canonical URL of the page.',
                'description' => 'Returns the canonical URL of the page. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the  canonical URL of the page       if set. If not, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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
                'name' => 'getDescription',
                'access-modifier' => 'public function',
                'summary' => 'Returns the description of the page.',
                'description' => 'Returns the description of the page. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The description of the page. If the description is not set,       the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
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
                'name' => 'getLangCode',
                'access-modifier' => 'public function',
                'summary' => 'Returns the language code of the page.',
                'description' => 'Returns the language code of the page. ',
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
                'name' => 'getTheme',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object which holds applied theme information.',
                'description' => 'Returns an object which holds applied theme information. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If no theme is applied, the method will return null.       Other than than, the method will return an object that holds applied       theme info.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/Theme', 'Theme'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getThemeCSSDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory at which CSS files of the applied theme exists.',
                'description' => 'Returns the name of the directory at which CSS files of the applied theme exists. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The directory at which CSS files of the theme exists       (e.g. \'assets/my-theme/css\' ). The folder will always exist inside the folder       \'public/assets\'.      If no theme is applied, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getThemeImagesDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory at which image files of the applied theme exists.',
                'description' => 'Returns the name of the directory at which image files of the applied theme exists. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The directory at which image files of the theme exists       (e.g. \'assets/my-theme/images\' ).      If no theme is applied, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getThemeJSDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory at which JavaScript files of the applied theme exists.',
                'description' => 'Returns the name of the directory at which JavaScript files of the applied theme exists. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The directory at which JavaScript files of the theme exists       (e.g. \'assets/my-theme/js\' ).       If no theme is applied, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitle',
                'access-modifier' => 'public function',
                'summary' => 'Returns the title of the page.',
                'description' => 'Returns the title of the page. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The title of the page. Default return value is       \'Default X\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getTitleSep',
                'access-modifier' => 'public function',
                'summary' => 'Returns the character or string that is used to separate web page title       and web site name.',
                'description' => 'Returns the character or string that is used to separate web page title       and web site name. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The character or string that is used to separate web page title       and web site name. If the separator was not set       using the method <b>WebPage::setTitleSep()</b>, the returned value will       be \' | \'.',
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
                    'description' => 'The returned object labels will be based on the       language of the page.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/i18n/Language', 'Language'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWebsiteName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the web site.',
                'description' => 'Returns the name of the web site. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the web site. If the name was not set       using the method WebPage::siteName(), the returned value will       be \'My X Website\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getWritingDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns the writing direction of the page.',
                'description' => 'Returns the writing direction of the page. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '\'ltr\' or \'rtl\'. If the writing direction is not set,       the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasAside',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the page will have an aside section or not.',
                'description' => 'Checks if the page will have an aside section or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the page has an aside section.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasFooter',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the page will have a footer section or not.',
                'description' => 'Checks if the page will have a footer section or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the page has a footer section.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasHeader',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the page will have a header section or not.',
                'description' => 'Checks if the page will have a header section or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if the page has a header section.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'includeI18nLables',
                'access-modifier' => 'public function',
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
                        'type' => 'string',
                        'description' => 'The ID of the node that the given node       will be inserted to. Default value is \'main-content-area\'.',
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
                'name' => 'isThemeLoaded',
                'access-modifier' => 'public function',
                'summary' => 'Checks if a theme is loaded or not.',
                'description' => 'Checks if a theme is loaded or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'true if loaded. false if not loaded.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeChild',
                'access-modifier' => 'public function',
                'summary' => 'Removes a child node from the document of the page.',
                'description' => 'Removes a child node from the document of the page. ',
                'params' => [
                    '$node' => [
                        'type' => 'HTMLNode|string',
                        'description' => 'The node that will be removed.  This also       can be the value of the attribute ID of the node that will be removed.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the node if removed.       If not removed, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'render',
                'access-modifier' => 'public function',
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
                'access-modifier' => 'public function',
                'summary' => 'Resets page attributes to default values.',
                'description' => 'Resets page attributes to default values. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setCanonical',
                'access-modifier' => 'public function',
                'summary' => 'Sets the canonical URL of the page.',
                'description' => 'Sets the canonical URL of the page. Note that if empty string is given, it       won\'t be set. To unset the canonical, use \'null\' as value.',
                'params' => [
                    '$url' => [
                        'type' => 'string',
                        'description' => 'The canonical URL of the page.',
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
                'name' => 'setDescription',
                'access-modifier' => 'public function',
                'summary' => 'Sets the description of the page.',
                'description' => 'Sets the description of the page. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The description of the page.       If null is given,       the description meta tag will be removed from the &lt;head&gt; node. If       empty string is given, nothing will change.',
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
                'name' => 'setHasAside',
                'access-modifier' => 'public function',
                'summary' => 'Sets the property that is used to check if page has an aside section or not.',
                'description' => 'Sets the property that is used to check if page has an aside section or not. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'true to include aside section. false if       not.',
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
                'name' => 'setHasFooter',
                'access-modifier' => 'public function',
                'summary' => 'Sets the property that is used to check if page has a footer section or not.',
                'description' => 'Sets the property that is used to check if page has a footer section or not. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'true to include the footer section. false if       not.',
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
                'name' => 'setHasHeader',
                'access-modifier' => 'public function',
                'summary' => 'Sets the property that is used to check if page has a header section or not.',
                'description' => 'Sets the property that is used to check if page has a header section or not. ',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'true to include the header section. false if       not.',
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
                'name' => 'setLang',
                'access-modifier' => 'public function',
                'summary' => 'Sets the display language of the page.',
                'description' => 'Sets the display language of the page. The length of the given string must be 2 characters in order to set the       language code.',
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
                'name' => 'setTheme',
                'access-modifier' => 'public function',
                'summary' => 'Loads a theme given its name.',
                'description' => 'Loads a theme given its name. ',
                'params' => [
                    '$themeNameOrClass' => [
                        'type' => 'string',
                        'description' => 'The name of the theme as specified by the       variable \'name\' in theme definition. If the given name is \'null\', the       method will load the default theme as specified by the method       \'AppConfig::getBaseThemeName()\'. Note that once the theme is updated,       the document content of the page will reset if it was set before calling this       method. This also can be the value which can be taken from \'ClassName::class\'.',
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
                'name' => 'setTitle',
                'access-modifier' => 'public function',
                'summary' => 'Sets the title of the page.',
                'description' => 'Sets the title of the page. ',
                'params' => [
                    '$val' => [
                        'type' => 'string',
                        'description' => 'The title of the page. If <b>null</b> is given,       the title will not updated. Also note that if page document was created,       calling this method will set the value of the &lt;titlt&gt; node.       The format of the title is <b>PAGE_NAME TITLE_SEP WEBSITE_NAME</b>.       for example, if the page name is \'Home\' and title separator is       \'|\' and the name of the website is \'Programming Academia\'. The title       of the page will be \'Home | Programming Academia\'.',
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
                'name' => 'setTitleSep',
                'access-modifier' => 'public function',
                'summary' => 'Sets the character or string that is used to separate web page title.',
                'description' => 'Sets the character or string that is used to separate web page title. The given character or string is used in setting the title of the page.       The format of the title is \'PAGE_NAME TITLE_SEP WEBSITE_NAME\'.       for example, if the page name is \'Home\' and title separator is       \'|\' and the name of the web site is \'Programming Academia\'. The title       of the page will be \'Home | Programming Academia\'.      The character be updated only if the given string is not empty.       Also note that if page document was created,       calling this method will set the value of the &lt;titlt&gt; node.',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'The new character or string that will be used to       separate page title and web site name.',
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
                'name' => 'setWebsiteName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the web site.',
                'description' => 'Sets the name of the web site. The name of the web site is used in setting the title of the page.       The format of the title is \'PAGE_NAME TITLE_SEP WEBSITE_NAME\'.       for example, if the page name is \'Home\' and title separator is       \'|\' and the name of the web site is \'Programming Academia\'. The title       of the page will be \'Home | Programming Academia\'.      The name will be updated only if the given string is not empty.       Also note that if page document was created,       calling this method will set the value of the &lt;titlt&gt; node.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the web site that will be appended with the title of       the page.',
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
                'summary' => 'Sets the writing direction of the page.',
                'description' => 'Sets the writing direction of the page. ',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'Language::DIR_LTR or Language::DIR_RTL.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'True if the direction was not set and its the first time to set.       if it was set before, the method will return false.',
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