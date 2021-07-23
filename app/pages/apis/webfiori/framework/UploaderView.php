<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class UploaderView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A helper class that is used to upload most types of files to the server\'s file system.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class Uploader');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'Uploader', '\webfiori\framework', 'A helper class that is used to upload most types of files to the server\'s file system. The main aim of this class is to allow the developer to upload files   without having to deal directly with the array $_FILES. It can be used to   perform the following tasks:  <ul>  <li>Upload one or multiple files.</li>  <li>Restrict the types of files which can be uploaded.</li>  <li>Store the uploaded file(s) to a specific location on the server.</li>  <li>View upload status of each file.</li>  <li>The ability to get MIME type of most file types using file extension only.<li>  </ul>  A basic example on how to use this class:  <pre>  $uploader = new Uploader();  //allow png only  $uploader->addExt(\'png\');  $uploader->setUploadDir(\'\\home\\my-site\\uploads\');  //the value of the attribute \'name\' of file input  $uploader->setAssociatedFileName(\'user-files\');  //upload files  $files = $uploader->upload();  //now we can check upload status of each file.  foreach($files as $fileArr){  //...  }  </pre>'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'NOT_ALLOWED',
            'A constant that is used to indicates uploaded file type is not allowed.',
            'A constant that is used to indicates uploaded file type is not allowed. ',
            ),
            new AttributeDef(
            'const',
            '',
            'NO_SUCH_DIR',
            'A constant that is used to indicates upload directory does not exists.',
            'A constant that is used to indicates upload directory does not exists. It usually returned by some methods as error code.',
            ),
            new AttributeDef(
            'const',
            '',
            'NO_SUCH_FILE',
            'A constant that is used to indicates that a file does not exists.',
            'A constant that is used to indicates that a file does not exists. ',
            ),
            new AttributeDef(
            'const',
            '',
            'UPLOAD_ERR_EXT_NOT_ALLOWED',
            'A constant to indicate that a file type is not allowed to be uploaded.',
            'A constant to indicate that a file type is not allowed to be uploaded. ',
            ),
            new AttributeDef(
            'const',
            '',
            'UPLOAD_ERR_FILE_ALREADY_EXIST',
            'A constant to indicate that a file already exist in upload directory.',
            'A constant to indicate that a file already exist in upload directory. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$uploadPath' => [
                        'type' => 'string',
                        'description' => 'A string that represents the location at       which files will be uploaded to. Default value is \'app/storage/uploads\'.',
                        'optional' => false,
                    ],
                    '$allowedTypes' => [
                        'type' => 'array',
                        'description' => 'An array that contains allowed files types.',
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
                'summary' => 'Returns a JSON string that represents the object.',
                'description' => 'Returns a JSON string that represents the object. The string will be something the the following:      <pre>      {      &nbsp&nbsp"upload-directory":"",      &nbsp&nbsp"allowed-types":[],      &nbsp&nbsp"files":[],      &nbsp&nbsp"associated-file-name":""      }      </pre>',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A JSON string.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addExt',
                'access-modifier' => 'public function',
                'summary' => 'Adds new extension to the array of allowed files types.',
                'description' => 'Adds new extension to the array of allowed files types. ',
                'params' => [
                    '$ext' => [
                        'type' => 'string',
                        'description' => 'File extension (e.g. jpg, png, pdf).',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the extension is added, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addExts',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple extensions at once to the set of allowed files types.',
                'description' => 'Adds multiple extensions at once to the set of allowed files types. ',
                'params' => [
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An array of strings. Each string represents a file type.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return an associative array of booleans.       The key value will be the extension name and the value represents the status       of the addition. If added, it well be set to true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getAssociatedFileName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the index at which the uploaded files will exist on in the array $_FILES.',
                'description' => 'Returns the name of the index at which the uploaded files will exist on in the array $_FILES. This value represents the value of the attribute \'name\' of the files input       in case of HTML forms.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'the name of the index at which the uploaded files will exist on in the array $_FILES.      Default value is \'files\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getExts',
                'access-modifier' => 'public function',
                'summary' => 'Returns the array that contains all allowed file types.',
                'description' => 'Returns the array that contains all allowed file types. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        'array
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getFiles',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array which contains all information about the uploaded files.',
                'description' => 'Returns an array which contains all information about the uploaded files. The returned array will be indexed. At each index, a sub associative array       that holds uploaded file information. Each array will have the following       indices:      <ul>      <li><b>name</b>: The name of the uploaded file.</li>      <li><b>size</b>: The size of the uploaded file in bytes.</li>      <li><b>upload-path</b>: The location at which the file was uploaded to in the server.</li>      <li><b>upload-error</b>: Any error which has happend during upload.</li>      <li><b>is-exist</b>: A boolean. Set to true if the file does exist in the server.</li>      <li><b>is-replace</b>: A boolean. Set to true if the file was already uploaded and replaced.</li>      <li><b>mime</b>: MIME type of the file.</li>      <li><b>uploaded</b>: A boolean. Set to true if the file was uploaded.</li>      </ul>',
                'params' => [
                    '$asObj' => [
                        'type' => 'boolean',
                        'description' => 'If this parameter is set to true, the returned array       will contain objects of type \'UploadedFile\' instead of sub associative arrays.       Default value is true.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An indexed array that contains sub associative arrays or       objects of type \'UploadFile\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getUploadDir',
                'access-modifier' => 'public function',
                'summary' => 'Returns the directory at which the file or files will be uploaded to.',
                'description' => 'Returns the directory at which the file or files will be uploaded to. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'upload directory.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'removeExt',
                'access-modifier' => 'public function',
                'summary' => 'Removes an extension from the array of allowed files types.',
                'description' => 'Removes an extension from the array of allowed files types. ',
                'params' => [
                    '$ext' => [
                        'type' => 'string',
                        'description' => 'File extension= (e.g. jpg, png, pdf,...).',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the extension was removed, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setAssociatedFileName',
                'access-modifier' => 'public function',
                'summary' => 'Sets The name of the index at which the file is stored in the array $_FILES.',
                'description' => 'Sets The name of the index at which the file is stored in the array $_FILES. This value is the value of the attribute \'name\' in case of HTML file. The       developer can set the value of the propery in the front end by using a       hidden input field with name = \'file-input-name\' and the value of that input       field must be the value of the attribute \'name\' of the original file input.       In case of API call, it can be supplied as a POST parameter with name       \'file-input-name\'.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the index at which the file is stored in the array $_FILES.      input element.',
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
                'name' => 'setUploadDir',
                'access-modifier' => 'public function',
                'summary' => 'Sets the directory at which the file will be uploaded to.',
                'description' => 'Sets the directory at which the file will be uploaded to. This method does not check whether the directory is exist or not. It       just validate that the structure of the path is valid by replacing       forward slashes with backward slashes. The directory will never update       if the given string is empty.',
                'params' => [
                    '$dir' => [
                        'type' => 'string',
                        'description' => 'Upload Directory (such as \'/files/uploads\' or       \'C:/Server/uploads\').',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If upload directory was updated, the method will       return true. If not updated, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'toJSON',
                'access-modifier' => 'public function',
                'summary' => 'Returns a JSON representation of the object.',
                'description' => 'Returns a JSON representation of the object. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'an object of type <b>Json</b>',
                    'return-types' => [
                        new Anchor('https://webfiori.com/docs/webfiori/json/Json', 'Json'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'upload',
                'access-modifier' => 'public function',
                'summary' => 'Upload the file to the server.',
                'description' => 'Upload the file to the server. ',
                'params' => [
                    '$replaceIfExist' => [
                        'type' => 'bolean',
                        'description' => 'If a file with the given name found       and this parameter is set to true, the file will be replaced.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An array which contains uploaded files info. Each index       will contain an associative array which has the following info:      <ul>      <li><b>name</b>: The name of uploaded file.</li>      <li><b>size</b>: The size of uploaded file in bytes.</li>      <li><b>upload-path</b>: The location at which the file was uploaded to in the server.</li>      <li><b>upload-error</b>: A string that represents upload error.</li>      <li><b>is-exist</b>: A boolean. Set to true if the file was found in the       server.</li>      <li><b>is-replace</b>: A boolean. Set to true if the file was exist and replaced.</li>      <li><b>mime</b>: MIME type of the file.</li>      <li><b>uploaded</b>: A boolean. Set to true if the file was uploaded.</li>      </ul>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'uploadAsFileObj',
                'access-modifier' => 'public function',
                'summary' => 'Returns an array that contains objects of type \'UploadedFile\'.',
                'description' => 'Returns an array that contains objects of type \'UploadedFile\'. ',
                'params' => [
                    '$replaceIfExist' => [
                        'type' => 'bolean',
                        'description' => 'If a file with the given name found       and this parameter is set to true, the file will be replaced.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'An array that contains objects of type \'UploadedFile\'.',
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