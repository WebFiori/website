<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class FileView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a file.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class File');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'File', '\webfiori\framework', 'A class that represents a file. This class can be used to read and write files in binary. In addition to that,   it can be used to view files in web browsers.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'MIME_TYPES',
            'An associative array that contains MIME types of common files.',
            'An associative array that contains MIME types of common files. As of version 1.1.2 of the class, the array contains the       following MIME types:      <ul>      <li><b>Audio and Video Formats:</b>      <ul>      <li>avi: video/avi</li>      <li>3gp: video/3gpp</li>      <li>ogv: video/ogg</li>      <li>mp4: video/mp4</li>      <li>mov: video/quicktime</li>      <li>wmv: video/x-ms-wmv</li>      <li>flv: video/x-flv</li>      <li>mpeg: video/mpeg</li>      <li>midi: audio/midi</li>      <li>oga: audio/ogg</li>      <li>mp3: audio/mpeg</li>      <li>mid: audio/midi</li>      <li>wav: audio/aac</li>      <li>acc: audio/aac</li>      </ul></li>      <li><b>Image Formats:</b>      <ul>      <li>jpeg: image/jpeg</li>      <li>jpg: image/jpeg</li>      <li>png: image/png</li>      <li>bmp: image/bmp</li>      <li>ico: image/x-icon</li>      <li>tiff: image/tiff</li>      <li>svg: image/svg+xml</li>      <li>psd: image/vnd.adobe.photoshop</li>      <li>gif: image/gif</li>      </ul></li>      <li><b>Documents Formats:</b>      <ul>      <li>pdf: application/pdf</li>      <li>rtf: application/rtf</li>      <li>doc: application/msword</li>      <li>docx: application/vnd.openxmlformats-officedocument.wordprocessingml.document</li>      <li>ppt: application/vnd.ms-powerpoint</li>      <li>pptx: application/vnd.openxmlformats-officedocument.presentationml.presentation</li>      <li>xls: application/vnd.ms-excel</li>      <li>xlsx: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet</li>      </ul></li>      <li><b>Text Based Formats:</b>      <ul>      <li>txt: text/plain</li>      <li>php: text/plain</li>      <li>log: text/plain</li>      <li>ini: text/plain</li>      <li>css: text/css</li>      <li>js: application/javascript</li>      <li>asm: text/x-asm</li>      <li>java: text/x-java-source</li>      <li>htaccess: application/x-extension-htaccess</li>      <li>asp: text/asp</li>      <li>c: text/x-c</li>      <li>cpp: text/x-c</li>      <li>csv: text/csv</li>      <li>htm: text/html</li>      <li>html: text/html</li>      </ul></li>      <li><b>Other Formats:</b>      <ul>      <li>sql: application/sql</li>      <li>jar: application/java-archive</li>      <li>zip: application/zip</li>      <li>rar: application/x-rar-compressed</li>      <li>tar: application/x-tar</li>      <li>7z: application/x-7z-compressed</li>      <li>exe: application/vnd.microsoft.portable-executable</li>      <li>bin: application/octet-stream</li>      <li>woff: font/woff</li>      <li>woff2: font/woff2</li>      <li>otf: font/otf</li>      <li>ttf: font/ttf</li>      <li>ai: application/postscript</li>      <li>swf: application/x-shockwave-flash</li>      <li>ogx: application/ogg</li>      </ul>',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. This method will set the path and name to empty string. Also, it will       set the size to 0 and ID to -1. Finally, it will set MIME type to       "application/octet-stream"',
                'params' => [
                    '$fNameOrAbsPath' => [
                        'type' => 'string',
                        'description' => 'The name of the file such as \'my-file.png\'.       This also can be the absolute path of the file (such as \'home/usr/ibrahim/my-file.png\').',
                        'optional' => false,
                    ],
                    '$fPath' => [
                        'type' => 'string|null',
                        'description' => 'The path of the file such as \'C:/Images/Test\'. This can       be null if absolute path of the file was provided for the first parameter.',
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
                'name' => '__toString',
                'access-modifier' => 'public function',
                'summary' => 'Returns JSON string that represents basic file info.',
                'description' => 'Returns JSON string that represents basic file info. ',
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
                'name' => 'append',
                'access-modifier' => 'public function',
                'summary' => 'Appends a string of data to the already existing data.',
                'description' => 'Appends a string of data to the already existing data. ',
                'params' => [
                    '$data' => [
                        'type' => 'string',
                        'description' => 'A string that represents the extra data.',
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
                'name' => 'getAbsolutePath',
                'access-modifier' => 'public function',
                'summary' => 'Returns the full path to the file.',
                'description' => 'Returns the full path to the file. The full path of the file is a string that contains the path of the       file alongside its name. Assuming that the path is set to "C:/Users/Me/Documents"       and file name is set to "my-doc.docx", This method will return something like       "C:\\Users\\Me\\Documents\\my-do.docx".',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Full path to the file (e.g. \'root\\images\\hello.png\').      If the name of the file is not set or the path is not set, the method       will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getChunks',
                'access-modifier' => 'public function',
                'summary' => 'Split file raw data into chunks of fixed size.',
                'description' => 'Split file raw data into chunks of fixed size. ',
                'params' => [
                    '$chunkSize' => [
                        'type' => 'int',
                        'description' => 'The number of bytes in every chunk. If a negative       number is given, default value is used which is 1000.',
                        'optional' => false,
                    ],
                    '$encodeOrDecode' => [
                        'type' => 'string',
                        'description' => 'This parameter is used to base-64 decode or       encode file data. The parameter can have one of 3 values:      <ul>      <li>e: Encode the raw data of the file.</li>      <li>d: Decode the raw data of the file.</li>      <li>none: Return the raw data of the file as it is. This is the default value.</li>      </ul>      If any other value is given, the method will use \'e\' since data is mostly       will be moved ss chunks.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an array that holds file data as       chunks.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns the directory at which the file exist on.',
                'description' => 'Returns the directory at which the file exist on. The directory is simply the folder that contains the file. For example,       the directory can be something like "C:\\Users\\Me\\Documents". Note that the       returned directory will be using backward slashes "\\".',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The directory at which the file exist on.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getExtension',
                'access-modifier' => 'public function',
                'summary' => 'Extract file extension from file name and return it.',
                'description' => 'Extract file extension from file name and return it. File extension will depend on one of two things. If MIME of the file is      set, then the extension of the file will depend on it. For example, if      MIME of the file is \'video/mp4\', the method will return the value \'mp4\'.      The other thing that will be checked is file name. If the extension is      included in file name, it will be returned.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string such as \'mp3\' or \'jpeg\'. Default return value is      \'bin\' which stands for binary file.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getFileMIMEType',
                'access-modifier' => 'public function',
                'summary' => 'Returns MIME type of the file.',
                'description' => 'Returns MIME type of the file. Note that if the file is specified by its path and name, the method       File::read() must be called before calling this method to update its       MIME type.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'MIME type of the file. If MIME type of the file is not set       or not detected, the method will return \'application/octet-stream\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getID',
                'access-modifier' => 'public function',
                'summary' => 'Returns the ID of the file.',
                'description' => 'Returns the ID of the file. This method is helpful in case the file is stored in database.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The ID of the file. If the ID is not set, the method       will return -1.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getLastModified',
                'access-modifier' => 'public function',
                'summary' => 'Returns the time at which the file was last modified.',
                'description' => 'Returns the time at which the file was last modified. Note that this method will work only if the file exist in the file system.',
                'params' => [
                    '$format' => [
                        'type' => 'string',
                        'description' => 'An optional format. The supported formats are the       same formats which are supported by the function <code>date()</code>.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If no format is provided, the method will return the       time as integer. If a format is given, the method will return the time as       specified by the format. If the file does not exist, the method will return       0.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getMIMEType',
                'access-modifier' => 'public static function',
                'summary' => 'Returns MIME type of a file type.',
                'description' => 'Returns MIME type of a file type. The method will try to find MIME type based on its extension. The method       will look for MIME in the constant File::MIME_TYPES.',
                'params' => [
                    '$ext' => [
                        'type' => 'string',
                        'description' => 'File extension without the suffix (such as \'jpg\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the extension MIME type is found, it will be       returned. If not, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the file.',
                'description' => 'Returns the name of the file. The name is used to construct the absolute path of the file in addition       to its path.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the file. If the name is not set, the method       will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getPath',
                'access-modifier' => 'public function',
                'summary' => 'Returns the path of the file.',
                'description' => 'Returns the path of the file. The path is simply the folder that contains the file. For example,       the path can be something like "C:\\Users\\Me\\Documents". Note that the       returned path will be using backward slashes "\\".',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The path to the file (such as "C:\\Users\\Me\\Documents"). If       the path is not set, the method will return empty string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getRawData',
                'access-modifier' => 'public function',
                'summary' => 'Returns the raw data of the file.',
                'description' => 'Returns the raw data of the file. The raw data is simply a string. It can be binary string or any basic       string.',
                'params' => [
                    '$encodeOrDecode' => [
                        'type' => 'string',
                        'description' => 'This parameter is used to base-64 decode or       encode file data. The parameter can have one of 3 values:      <ul>      <li>e: Encode the raw data of the file.</li>      <li>d: Decode the raw data of the file.</li>      <li>none: Return the raw data of the file as it is. This is the default value.</li>      </ul>      If any other value is given, the method will use \'none\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'Raw data of the file. If no data is set, the method       will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSize',
                'access-modifier' => 'public function',
                'summary' => 'Returns the size of the file in bytes.',
                'description' => 'Returns the size of the file in bytes. Note that if the file is specified by its path and name, the method       File::read() must be called before calling this method to update its       size.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'Size of the file in bytes.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isExist',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the file exist or not.',
                'description' => 'Checks if the file exist or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the file exist, the method will return true. Other than       that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isFileExist',
                'access-modifier' => 'public static function',
                'summary' => 'Checks if file exist or not without throwing errors.',
                'description' => 'Checks if file exist or not without throwing errors. This method uses the function \'file_exists()\' to check if a file is exist       or not given its path. The only difference is that it will not       throw an error if path is invalid.',
                'params' => [
                    '$path' => [
                        'type' => 'string',
                        'description' => 'File path.',
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
                'name' => 'read',
                'access-modifier' => 'public function',
                'summary' => 'Reads the file in binary mode.',
                'description' => 'Reads the file in binary mode. First of all, this method checks the existence of the file. If it       is exist, it tries to open the file in binary mode \'rb\'. If a resource       is created, it is used to read the content of the file. Also, the method       will try to set MIME type of the file. If MIME type was not detected,       it will set to \'application/octet-stream\'. If the method is unable to       read the file, it will throw an exception.',
                'params' => [
                    '$from' => [
                        'type' => 'int',
                        'description' => 'The byte at which the method will start reading from. If -1       is given, then the method will start reading from byte 0.',
                        'optional' => false,
                    ],
                    '$to' => [
                        'type' => 'int',
                        'description' => 'The byte at which the method will read data to. If -1       is given, then the method will read till last byte. Default is       -1.',
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
                'name' => 'remove',
                'access-modifier' => 'public function',
                'summary' => 'Removes a file given its name and path.',
                'description' => 'Removes a file given its name and path. Before calling this method, the name of the file and its path must       be specified.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the file was removed, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDir',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the directory at which the file exist on.',
                'description' => 'Sets the name of the directory at which the file exist on. The directory is simply the folder that contains the file. For example,       the directory can be something like "C:/Users/Me/Documents". The directory can       use forward slashes or backward slashes.',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'The directory which will contain the file. It must       be non-empty string in order to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the directory is set. Other       than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setId',
                'access-modifier' => 'public function',
                'summary' => 'Sets the ID of the file.',
                'description' => 'Sets the ID of the file. This method is helpful in case the file is stored in database.',
                'params' => [
                    '$id' => [
                        'type' => 'string',
                        'description' => 'The unique ID of the file.',
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
                'name' => 'setMIMEType',
                'access-modifier' => 'public function',
                'summary' => 'Sets the MIME type of the file.',
                'description' => 'Sets the MIME type of the file. It is not recommended to update MIME type of the file manually. Only       use this method for custom file types. MIME type will be set only       if its non-empty string.',
                'params' => [
                    '$type' => [
                        'type' => 'string',
                        'description' => 'MIME type (such as \'application/pdf\')',
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
                'summary' => 'Sets the name of the file (such as \'my-image.',
                'description' => 'Sets the name of the file (such as \'my-image. png\')            The name is used to construct the absolute path of the file in addition       to its path. The name of the file must include its extension (or suffix).',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the file.',
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
                'name' => 'setPath',
                'access-modifier' => 'public function',
                'summary' => 'Sets the path of the file.',
                'description' => 'Sets the path of the file. The path is simply the folder that contains the file. For example,       the path can be something like "C:/Users/Me/Documents". The path can       use forward slashes or backward slashes.',
                'params' => [
                    '$fPath' => [
                        'type' => 'string',
                        'description' => 'The folder which will contain the file. It must       be non-empty string in order to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return true if the path is set. Other       than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setRawData',
                'access-modifier' => 'public function',
                'summary' => 'Sets the binary representation of the file.',
                'description' => 'Sets the binary representation of the file. The raw data is simply a string. It can be binary string or any basic       string. Also, it can be a blob which was retrieved from a database.',
                'params' => [
                    '$raw' => [
                        'type' => 'string',
                        'description' => 'Binary raw data of the file.',
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
                'summary' => 'Returns a JSON string that represents the file.',
                'description' => 'Returns a JSON string that represents the file. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An object of type \'Json\' that contains file information.       The object will have the following information:<br/>      <b>{<br/>&nbsp;&nbsp;"id":"",<br/>&nbsp;&nbsp;"mime":"",<br/>&nbsp;&nbsp;"name":"",<br/>      &nbsp;&nbsp;"path":"",<br/>&nbsp;&nbsp;"sizeInBytes":"",<br/>&nbsp;&nbsp;"sizeInKBytes":"",<br/>      &nbsp;&nbsp;"sizeInMBytes":""<br/>}</b>',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'view',
                'access-modifier' => 'public function',
                'summary' => 'Display the file.',
                'description' => 'Display the file. If the raw data of the file is null, the method will       try to read the file that was specified by the name and its path. If       the method is unable to read the file, an exception is thrown.',
                'params' => [
                    '$asAttachment' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to       true, the header \'content-disposition\' will have the attribute \'attachment\'       set instead of \'inline\'. This will trigger \'save as\' dialog to appear.',
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
                'name' => 'write',
                'access-modifier' => 'public function',
                'summary' => 'Write raw binary data into a file.',
                'description' => 'Write raw binary data into a file. The method will write the data using the binary write mode.       If it fails, It will throw an exception.',
                'params' => [
                    '$append' => [
                        'type' => 'boolean',
                        'description' => 'If the file already exist in the file system and       this attribute is set to true, the new raw data will be appended to the       file. Default is true.',
                        'optional' => false,
                    ],
                    '$create' => [
                        'type' => 'boolean',
                        'description' => 'If the file does not exist and this attribute is set       to true, the method will attempt to create the file. Default is false.',
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