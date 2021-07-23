<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ThemeView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A base class that is used to construct web site UI.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class Theme');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'Theme', '\webfiori\framework', 'A base class that is used to construct web site UI. A theme is a way to change the look and feel of all pages in   a website. It can be used to unify all UI components and   change them later using themes. The developer can extend this   class and implement its abstract methods to create header section,   a footer section and aside section. In addition,   the developer can include custom head tags (like CSS files or   JS files) by implementing one of the abstract methods. Themes must exist in   the folder \'/themes\' of the framework.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class using default values.',
                'description' => 'Creates new instance of the class using default values. The default values will be set as follows:      <ul>      <li>Theme URL will be an empty string.</li>      <li>Author name will be an empty string.</li>      <li>Author URL will be an empty string.</li>      <li>Theme version will be set to \'1.0.0\'</li>      <li>Theme license will be an empty string.</li>      <li>License URL will be an empty string.</li>      <li>Theme description will be an empty string.</li>      <li>Theme directory name will be an empty string.</li>      <li>Theme CSS directory name will be set to \'css\'</li>      <li>Theme JS directory name will be set to \'js\'</li>      <li>Theme images directory name will be set to \'images\'</li>      </ul>',
                'params' => [
                    'The' => [
                        'type' => '$themeName',
                        'description' => 'name of the theme. The name is used to load the       theme. For that reason, it must be unique.',
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
                'name' => 'addComponent',
                'access-modifier' => 'public function',
                'summary' => 'Adds a single component to the set of theme components.',
                'description' => 'Adds a single component to the set of theme components. Theme components are a set of PHP files that must exist inside theme       directory.',
                'params' => [
                    '$componentName' => [
                        'type' => 'string',
                        'description' => 'The name of the component file (such as \'head.php\')',
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
                'name' => 'addComponents',
                'access-modifier' => 'public function',
                'summary' => 'Adds a set of theme components to the theme.',
                'description' => 'Adds a set of theme components to the theme. Theme components are a set of PHP files that must exist inside theme       directory. The developer can create any number of components and add       them to the theme.',
                'params' => [
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An array that contains the names of components files       (such as \'head.php\').',
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
                'name' => 'createHTMLNode',
                'access-modifier' => 'public function',
                'summary' => 'Creates an instance of \'HTMLNode\' given an array of options.',
                'description' => 'Creates an instance of \'HTMLNode\' given an array of options. The developer can override this method to make it create custom HTML       elements which can be re-used across web pages. By default, the method       will create a &lt;div&gt; element.      A use case for this method would be as       follows, the developer would like to create different type of input       elements. One possible option in the passed array would be \'input-type\'.       By checking this option in the body of the method, the developer can return       different types of input elements.',
                'params' => [
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An array of options that developer can specify. Default       implementation of the method accepts two options, the option \'name\'       which represents the name of HTML tag (such as \'div\') and the option       \'attributes\' which is a sub array that contains tag attributes.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The developer must implement this method in away that       makes it return an instance of the class \'HTMLNode\'.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAsideNode',
                'access-modifier' => 'public abstract function',
                'summary' => 'Returns an object of type \'HTMLNode\' that represents aside section of the page.',
                'description' => 'Returns an object of type \'HTMLNode\' that represents aside section of the page. The developer must implement this method such that it returns an       object of type \'HTMLNode\'. Aside section of the page will       contain advertisements most of the time. Sometimes, it can contain aside menu for       the web site or widgets.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'HTMLNode\'. If the theme has no aside       section, the method might return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAuthor',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of theme author.',
                'description' => 'Returns the name of theme author. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of theme author. If author name is not set, the       method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAuthorUrl',
                'access-modifier' => 'public function',
                'summary' => 'Returns the URL which takes the users to author\'s web site.',
                'description' => 'Returns the URL which takes the users to author\'s web site. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The URL which takes users to author\'s web site.       If author URL is not set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getBaseURL',
                'access-modifier' => 'public function',
                'summary' => 'Returns the base URL that will be used by the theme.',
                'description' => 'Returns the base URL that will be used by the theme. The URL is used by the HTML tag \'base\' to fetch page resources.       If the URL is not set by the developer, the method will return the       URL that is returned by the method SiteConfig::getBaseURL().',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The base URL that will be used by the theme.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getComponents',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array which contains the names of theme components files.',
                'description' => 'Returns an array which contains the names of theme components files. Theme components are a set of PHP files that must exist inside theme       directory.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An array which contains the names of theme components files.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getCssDirName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory where CSS files are kept.',
                'description' => 'Returns the name of the directory where CSS files are kept. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the directory where theme CSS files kept. If       the name of the directory was not set by the method Theme::setCssDirName(),       then the returned value will be \'css\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDescription',
                'access-modifier' => 'public function',
                'summary' => 'Returns the description of the theme.',
                'description' => 'Returns the description of the theme. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The description of the theme. If the description is not       set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDirecotry',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents the directory at which the theme exist       in the system.',
                'description' => 'Returns a string that represents the directory at which the theme exist       in the system. This method is useful if the developer would like to load HTML file which       is part of the theme using the method HTMLNode::loadComponent().',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The string will be something like \'C:\\Server\\apache\\htdocs\\my-site\\themes\\my-theme\\\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDirectoryName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory where all theme files are kept.',
                'description' => 'Returns the name of the directory where all theme files are kept. The directory of a theme is a folder which exist inside the directory       \'/themes\'.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the directory where all theme files are kept.       If it is not set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getFooterNode',
                'access-modifier' => 'public abstract function',
                'summary' => 'Returns an object of type \'HTMLNode\' that represents footer section of the page.',
                'description' => 'Returns an object of type \'HTMLNode\' that represents footer section of the page. The developer must implement this method such that it returns an       object of type \'HTMLNode\'. Footer section of the page usually include links       to social media profiles, about us page and site map. In addition,       it might contain copyright notice and contact information. More complex       layouts can have more items in the footer.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'HTMLNode\'. If the theme has no footer       section, the method might return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHeadNode',
                'access-modifier' => 'public abstract function',
                'summary' => 'Returns an object of type HeadNode that represents HTML &lt;head&gt; node.',
                'description' => 'Returns an object of type HeadNode that represents HTML &lt;head&gt; node. The developer must implement this method such that it returns an       object of type HeadNode. The developer can use this method to include       any JavaScript or CSS files that website pages needs. Also, it can be used to       add custom meta tags to &lt;head&gt; node or any tag that can be added       to the &lt;head&gt; HTML element.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type HeadNode.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HeadNode', 'HeadNode'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getHeadrNode',
                'access-modifier' => 'public abstract function',
                'summary' => 'Returns an object of type HTMLNode that represents header section of the page.',
                'description' => 'Returns an object of type HTMLNode that represents header section of the page. The developer must implement this method such that it returns an       object of type \'HTMLNode\'. Header section of the page usually include a       main navigation menu, web site name and web site logo. More complex       layout can include other things such as a search bar, notifications       area and user profile picture. If the page does not have a header       section, the developer can make this method return null.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'HTMLNode\'. If the theme has no header       section, the method might return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/ui/HTMLNode', 'HTMLNode'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getImagesDirName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory where theme images are kept.',
                'description' => 'Returns the name of the directory where theme images are kept. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the directory where theme images are kept. If       the name of the directory was not set by the method Theme::setImagesDirName(),       then the returned value will be \'images\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getJsDirName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the directory where JavaScript files are kept.',
                'description' => 'Returns the name of the directory where JavaScript files are kept. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the directory where theme JavaScript files kept. If       the name of the directory was not set by the method Theme::setJsDirName(),       then the returned value will be \'js\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLicenseName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of theme license.',
                'description' => 'Returns the name of theme license. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of theme license. If it is not set,       the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLicenseUrl',
                'access-modifier' => 'public function',
                'summary' => 'Returns a URL which should contain a full version of theme license.',
                'description' => 'Returns a URL which should contain a full version of theme license. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A URL which contain a full version of theme license.       If it is not set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the theme.',
                'description' => 'Returns the name of the theme. If the name is not set, the method will return empty string.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the theme.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPage',
                'access-modifier' => 'public function',
                'summary' => 'Returns the page at which the theme will be applied to.',
                'description' => 'Returns the page at which the theme will be applied to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the theme is applied to a page, the       method will return it as an object. If theme is not applied to       any page, the method will return null.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/framework/ui/WebPage', 'WebPage'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUrl',
                'access-modifier' => 'public function',
                'summary' => 'Returns A URL which should point to theme web site.',
                'description' => 'Returns A URL which should point to theme web site. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A URL which should point to theme web site. Usually,       this one is the same as author URL.If it is not set, the method will       return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getVersion',
                'access-modifier' => 'public function',
                'summary' => 'Returns theme version number.',
                'description' => 'Returns theme version number. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'theme version number. The format if the version number       is \'x.x.x\' where \'x\' can be any number. If it is not set, the       method will return \'1.0.0\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'invokeAfterLoaded',
                'access-modifier' => 'public function',
                'summary' => 'Fire the callback function which should be called after loading the theme.',
                'description' => 'Fire the callback function which should be called after loading the theme. This method must not be used by the developers. It is called automatically       when the theme is loaded.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'invokeBeforeLoaded',
                'access-modifier' => 'public function',
                'summary' => 'Fire the callback function which should be called before loading the theme.',
                'description' => 'Fire the callback function which should be called before loading the theme. This method must not be used by the developers. It is called automatically       when the theme is being loaded.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAfterLoaded',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the callback which will be called after theme is loaded.',
                'description' => 'Sets the value of the callback which will be called after theme is loaded. ',
                'params' => [
                    '$function' => [
                        'type' => 'callable',
                        'description' => 'The callback. The first parameter of the       callback will be always \'this\' theme. (e.g. function ($theme){}). The function       can have other parameters if they are provided.',
                        'optional' => false,
                    ],
                    '$params' => [
                        'type' => 'array',
                        'description' => 'An array of parameters which can be passed to the       callback.',
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
                'name' => 'setAuthor',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of theme author.',
                'description' => 'Sets the name of theme author. ',
                'params' => [
                    '$author' => [
                        'type' => 'string',
                        'description' => 'The name of theme author (such as \'Ibrahim BinAlshikh\').',
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
                'name' => 'setAuthorUrl',
                'access-modifier' => 'public function',
                'summary' => 'Sets the URL to the theme author.',
                'description' => 'Sets the URL to the theme author. It can be the same as Theme URL.',
                'params' => [
                    '$authorUrl' => [
                        'type' => 'string',
                        'description' => 'The URL to the author\'s web site.',
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
                'name' => 'setBaseURL',
                'access-modifier' => 'public function',
                'summary' => 'Sets The base URL that will be used by the theme.',
                'description' => 'Sets The base URL that will be used by the theme. This URL is used by the HTML tag \'base\' to fetch page resources. The       given string must be non-empty string in order to set.',
                'params' => [
                    '$url' => [
                        'type' => 'string',
                        'description' => 'The base URL that will be used by the theme.',
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
                'name' => 'setBeforeLoaded',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the callback which will be called before theme is loaded.',
                'description' => 'Sets the value of the callback which will be called before theme is loaded. ',
                'params' => [
                    '$function' => [
                        'type' => 'callback',
                        'description' => 'The callback. The first parameter of the       callback will be always \'this\' theme. (e.g. function ($theme){}). The function       can have other parameters if they are provided.',
                        'optional' => false,
                    ],
                    '$params' => [
                        'type' => 'array',
                        'description' => 'An array of parameters which can be passed to the       callback.',
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
                'name' => 'setCssDirName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the directory where theme CSS files are kept.',
                'description' => 'Sets the name of the directory where theme CSS files are kept. Note that it will be set only if the given name is not an empty string. In       addition, directory name must not include theme directory name. For example,       if your theme CSS files exist in the directory \'/themes/super-theme/css\',       the value that must be supplied to this method is \'css\'.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the directory where theme CSS files are kept.',
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
                'summary' => 'Sets the description of the theme.',
                'description' => 'Sets the description of the theme. ',
                'params' => [
                    '$desc' => [
                        'type' => 'string',
                        'description' => 'Theme description. Usually a short paragraph of two       or 3 sentences. It must be non-empty string in order to set.',
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
                'name' => 'setImagesDirName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the directory where theme images are kept.',
                'description' => 'Sets the name of the directory where theme images are kept. Note that it will be set only if the given name is not an empty string. In       addition, directory name must not include theme directory name. For example,       if your theme images exist in the directory \'/themes/super-theme/images\',       the value that must be supplied to this method is \'images\'.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the directory where theme images are kept.',
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
                'name' => 'setJsDirName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the directory where theme JavaScript files are kept.',
                'description' => 'Sets the name of the directory where theme JavaScript files are kept. Note that it will be set only if the given name is not an empty string. In       addition, directory name must not include theme directory name. For example,       if your theme JavaScript files exist in the directory \'/themes/super-theme/js\',       the value that must be supplied to this method is \'js\'.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the directory where theme JavaScript files are kept.',
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
                'name' => 'setLicenseName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of theme license.',
                'description' => 'Sets the name of theme license. ',
                'params' => [
                    '$text' => [
                        'type' => 'string',
                        'description' => 'The name of theme license. It must be non-empty       string in order to set.',
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
                'name' => 'setLicenseUrl',
                'access-modifier' => 'public function',
                'summary' => 'Sets a URL to the license where people can find more details about it.',
                'description' => 'Sets a URL to the license where people can find more details about it. ',
                'params' => [
                    '$url' => [
                        'type' => 'string',
                        'description' => 'A URL to the license.',
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
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the theme.',
                'description' => 'Sets the name of the theme. ',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the theme. It must be non-empty string       in order to set. Note that the name of the theme       acts as the unique identifier for the theme. It can be used to load the       theme later.',
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
                'name' => 'setPage',
                'access-modifier' => 'public function',
                'summary' => 'Sets the page at which the theme will be applied to.',
                'description' => 'Sets the page at which the theme will be applied to. ',
                'params' => [
                    '$page' => [
                        'type' => 'WebPage',
                        'description' => 'The page that the theme is applied to.',
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
                'name' => 'setUrl',
                'access-modifier' => 'public function',
                'summary' => 'Sets the URL of theme designer web site.',
                'description' => 'Sets the URL of theme designer web site. Theme URL can be the same as author URL.',
                'params' => [
                    '$url' => [
                        'type' => 'string',
                        'description' => 'The URL to theme designer web site.',
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
                'name' => 'setVersion',
                'access-modifier' => 'public function',
                'summary' => 'Sets the version number of the theme.',
                'description' => 'Sets the version number of the theme. ',
                'params' => [
                    '$vNum' => [
                        'type' => 'string',
                        'description' => 'Version number. The format of version number is       usually like \'X.X.X\' where the \'X\' can be any number.',
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
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns an object of type Json that represents the theme.',
                'description' => 'Returns an object of type Json that represents the theme. JSON string that will be generated by the Json instance will have       the following information:      <p>      {<br/>      &nbsp;&nbsp;"themesPath":""<br/>      &nbsp;&nbsp;"name":""<br/>      &nbsp;&nbsp;"version":""<br/>      &nbsp;&nbsp;"author":""<br/>      &nbsp;&nbsp;"imagesDirName":""<br/>      &nbsp;&nbsp;"themeDirName":""<br/>      &nbsp;&nbsp;"cssDirName":""<br/>      &nbsp;&nbsp;"jsDirName":""<br/>      &nbsp;&nbsp;"components":[]<br/>      }      </p>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type Json.',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
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