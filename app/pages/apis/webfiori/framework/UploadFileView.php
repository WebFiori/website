<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class UploadFileView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which is used by the class \'Uploader\' to represents uploaded files.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class UploadFile');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'UploadFile', '\webfiori\framework', 'A class which is used by the class \'Uploader\' to represents uploaded files. The class is used by the method \'Uploader::uploadAsFileObj()\' to upload files   as objects of type \'File\'.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. This method will set the path and name to empty string. Also, it will       set the size to 0 and ID to -1. Finally, it will set MIME type to       "application/octet-stream"',
                'params' => [
                    '$fName' => [
                        'type' => 'string',
                        'description' => 'The name of the file such as \'my-file.png\'.',
                        'optional' => false,
                    ],
                    '$fPath' => [
                        'type' => 'string',
                        'description' => 'The path of the file such as \'C:/Images/Test\'.',
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
                'name' => 'getUploadError',
                'access-modifier' => 'public function',
                'summary' => 'Returns a string that represents upload error.',
                'description' => 'Returns a string that represents upload error. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'A string that can be used to identify the cause of upload       failure.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isReplace',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the file was replaced by another uploaded file.',
                'description' => 'Checks if the file was replaced by another uploaded file. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the file was already exist in the server and a one       which has the same name was uploaded, the method will return true. Default       return value is false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'isUploaded',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the file was uploaded successfully or not.',
                'description' => 'Checks if the file was uploaded successfully or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the file was uploaded to the server without any errors,       the method will return true. Default return value is false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setIsReplace',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'$isReplace\'.',
                'description' => 'Sets the value of the property \'$isReplace\'. The property is used to check if the file was already exist in the server and       was replaced by another uploaded file.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'A boolen. If true is passed, it means the file was replaced       by new one with the same name.',
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
                'name' => 'setIsUploaded',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of the property \'$isUploaded\'.',
                'description' => 'Sets the value of the property \'$isUploaded\'. The property is used to check if the file was successfully uploaded to the server.',
                'params' => [
                    '$bool' => [
                        'type' => 'boolean',
                        'description' => 'A boolen. If true is passed, it means the file was uploaded       without any errors.',
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
                'name' => 'setUploadErr',
                'access-modifier' => 'public function',
                'summary' => 'Sets an error message that indicates the cause of upload failure.',
                'description' => 'Sets an error message that indicates the cause of upload failure. ',
                'params' => [
                    '$err' => [
                        'type' => 'string',
                        'description' => 'Error message.',
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
                    'description' => 'An object of type \'Json\' that contains file information.       The object will have the following information:<br/>      <b>{<br/>&nbsp;&nbsp;"id":"",<br/>      &nbsp;&nbsp;"mime":"",<br/>      &nbsp;&nbsp;"name":"",<br/>      &nbsp;&nbsp;"path":"",<br/>      &nbsp;&nbsp;"sizeInBytes":"",<br/>      &nbsp;&nbsp;"sizeInKBytes":"",<br/>      &nbsp;&nbsp;"sizeInMBytes":"",<br/>&nbsp;&nbsp;"uploaded":"",<br/>      &nbsp;&nbsp;"isReplace":"",<br/>&nbsp;&nbsp;"uploadError":"",<br/>}</b>',
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