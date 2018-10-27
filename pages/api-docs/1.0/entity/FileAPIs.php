<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class FileAPIs extends APIView{
    public function __construct() {
        parent::__construct('File','webfiori/entity');
        $this->getClassAPIObj()->setVersion('1.1.1');
        $this->getClassAPIObj()->setLongDescription(''
                . 'A class that can be used to open, store and view files. '
                . 'Also it can be used to view any type of raw binary data. For '
                . 'example, if you fetch a blob from a database, this class can '
                . 'be used to view its data and send it back to client.'
                . '');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'__construct',
            'short-desc'=>'Creates new instance.',
            'long-desc'=>'Creates new instance. The instance will have the following values as '
            . 'default:'
            . '<ul>'
            . '<li>-1 as file ID</li>'
            . '<li>Empty string for the name of the file.</li>'
            . '<li>Empty string for the path of the file</li>'
            . '<li>"'.$this->monoStr('application/octet-stream').'" for MIME type.</li>'
            . '<li>0 for the size of the file.</li>'
            . '<li>'.$this->n().' for the binary raw file data.</li>'
            . '</ul>',
            'access-modifier'=>'public'
        ));
        $this->addFunctionDef(array(
            'name'=>'__toString',
            'short-desc'=>'Returns a well formatted JSON string that contains file info.',
            'long-desc'=>'Returns a well formatted JSON string that contains file info. '
            . 'The JSON string will have the following formate:'
            . "<pre style=\"font-family:monospace\" >{\n"
            . "    \"id\":0\n"
            . "    \"mime\":\"file_mime_type\"\n"
            . "    \"name\":\"file_name.png\"\n"
            . "    \"path\":\"upload_path\"\n"
            . "    \"size-in-bytes\":\"10485760\"\n"
            . "    \"size-in-kbytes\":10240\n"
            . "    \"size-in-mbytes\":10\n"
            . "}</pre>",
            'access-modifier'=>'public'
        ));
        $this->addFunctionDef(array(
            'name'=>'getAbsolutePath',
            'short-desc'=>'Returns the full path to the file.',
            'long-desc'=>'Returns the full path to the file.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'Full path to the file (e.g. \''.$this->monoStr('root/images/hello.png').'\'). '
            . 'The returned value will depend on the name of the file and its '
            . 'path. If one of the two is not set, the function will return empty string.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getFileMIMEType',
            'short-desc'=>'Returns MIME type of the file.',
            'long-desc'=>'Returns MIME type of the file.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'MIME type of the file. If MIME type of the file is '
            . 'not set or not detected, the function will return \''.$this->monoStr('application/octet-stream').'\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getID',
            'short-desc'=>'Returns the ID of the file.',
            'long-desc'=>'Returns the ID of the file.',
            'access-modifier'=>'public',
            'return-types'=>'mixed',
            'return-desc'=>'The ID of the file. If the ID is not set, the function will return -1.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getMIMEType',
            'short-desc'=>'Returns MIME type of a file type.',
            'long-desc'=>'Returns MIME type of a file type.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$ext',
                    'type'=>'string',
                    'description'=>'File extension without the suffix (such as \'jpg\').',
                )
            ),
            'return-types'=>'string|NULL',
            'return-desc'=>'If the extension MIME type is found, it will be returned. If not, the function will return NULL.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getName',
            'short-desc'=>'Returns the name of the file.',
            'long-desc'=>'Returns the name of the file.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'Returns the name of the file. If the name is not set, the function '
            . 'will return empty string.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getPath',
            'short-desc'=>'Returns the path of the file.',
            'long-desc'=>'Returns the path of the file.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'Returns the path of the file. If the path is not set, the function '
            . 'will return empty string.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getRawData',
            'short-desc'=>'Returns the binary raw data of the file.',
            'long-desc'=>'Returns the binary raw data of the file.',
            'access-modifier'=>'public',
            'return-types'=>'string|NULL',
            'return-desc'=>'A string that represents raw binary data. If the file '
            . 'is not opened or the raw data is not set, the function will return '.$this->n()
        ));
        $this->addFunctionDef(array(
            'name'=>'getSize',
            'short-desc'=>'Returns the size of the file in bytes.',
            'long-desc'=>'Returns the size of the file in bytes.',
            'access-modifier'=>'public',
            'return-types'=>'int',
            'return-desc'=>'Returns the size of the file in bytes.'
        ));
        $this->addFunctionDef(array(
            'name'=>'read',
            'short-desc'=>'Reads the file in binary.',
            'long-desc'=>'Reads the file in binary. First of all, the function '
            . 'will check if absolute path is valid or not. If it is invalid, '
            . 'an exception with the message \''.$this->monoStr('File absolute path is invalid.').'\' '
            . 'is thrown. After that, function first check for '
            . 'file existance. If it does not exist, an exception with the '
            . 'message \''.$this->monoStr('File not found: \'file_abs_path\'').'\' will be thrown. '
            . 'Finally, the function will open the file in binary read mode. If the '
            . 'function was unable to open the file, an exception with the message '
            . '\''.$this->monoStr('Unable to open the file \'file_abs_path\'.').'\' will be thrown.',
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().'. Once it finishes reading the file.'
        ));
        $this->addFunctionDef(array(
            'name'=>'setID',
            'short-desc'=>'Sets the ID of the file.',
            'long-desc'=>'Sets the ID of the file.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$id',
                    'type'=>'mixed',
                    'description'=>'The ID to set.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'setMIMEType',
            'short-desc'=>'Sets the MIME type of the file.',
            'long-desc'=>'Sets the MIME type of the file.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$type',
                    'type'=>'string',
                    'description'=>'MIME type of the file such as \''.$this->monoStr('application/pdf').'\'. '
                    . 'If the given value is empty string, it will not set.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'setName',
            'short-desc'=>'Sets the name of the file.',
            'long-desc'=>'Sets the name of the file.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$name',
                    'type'=>'string',
                    'description'=>'The name of the file (such as \''.$this->monoStr('my-image.png').'\'). '
                    . 'Note that the suffix must be a part of the name.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'setPath',
            'short-desc'=>'Sets file path.',
            'long-desc'=>'Sets file path.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$path',
                    'type'=>'string',
                    'description'=>'File path such as \''.$this->monoStr('C:\Users\Me\Downloads').'\'.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'setRawData',
            'short-desc'=>'Sets the raw binary data of the file.',
            'long-desc'=>'Sets the raw binary data of the file.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$raw',
                    'type'=>'string',
                    'description'=>'A string that represents file data.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'toJSON',
            'short-desc'=>'Returns an object of type '.$this->monoCL('entity/jsonx', 'JsonX').'.',
            'long-desc'=>'Returns an object of type '.$this->monoCL('entity/jsonx', 'JsonX').'. '
            . 'The object can be used to get basic file info.',
            'access-modifier'=>'public',
            'return-types'=>$this->monoCL('entity/jsonx', 'JsonX'),
            'return-desc'=>'An object of type '.$this->monoCL('entity/jsonx', 'JsonX').'.'
            . 'The JSON string that will be generated by the object will have the following formate:'
            . "<pre style=\"font-family:monospace\" >{\n"
            . "    \"id\":0\n"
            . "    \"mime\":\"file_mime_type\"\n"
            . "    \"name\":\"file_name.png\"\n"
            . "    \"path\":\"upload_path\"\n"
            . "    \"size-in-bytes\":\"10485760\"\n"
            . "    \"size-in-kbytes\":10240\n"
            . "    \"size-in-mbytes\":10\n"
            . "}</pre>",
        ));
        $this->addFunctionDef(array(
            'name'=>'view',
            'short-desc'=>'Sends the file in responce body to the client.',
            'long-desc'=>'Sends the file in responce body to the client. '
            . 'If the raw data of the file is '.$this->n().', the function will try '
            . 'to read the file that was specified by its name and its path. '
            . 'If the function is unable to read the file, an exception is '
            . 'thrown. Also, an exception will be thrown in case of unknown file MIME type.',
            'params'=>array(
                array(
                    'name'=>'$asAttachment',
                    'type'=>'boolean',
                    'description'=>'If this parameter is set to '.$this->t().', the header \'content-disposition\' will have the attribute \'attachmen\' set instead of \'inline\'. This will trigger \'save as\' dialog to appear.',
                    'is-optional'=>TRUE
                )
            ),
        ));
        $this->addFunctionDef(array(
            'name'=>'write',
            'short-desc'=>'Write raw binary data into a file.',
            'long-desc'=>'Write raw binary data into a file.'
            . 'the function will throw an exception in the following cases:  '
            . '<ul><li>If the function is unable to open the file for writing.</li>'
            . '<li>If given file path is invalid.</li><li>If file absolute path is invalid.</li>'
            . '<li>If file name is invalid.</li> </ul>'
            
            ,
            'params'=>array(
                array(
                    'name'=>'$path',
                    'type'=>'string',
                    'description'=>'An optional file path. If not provided, '
                    . 'the path that is returned by '.$this->classFuncCall('File', 'entity', 'getPath').' will be used.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'If the file is stored the function will return '.$this->t().'.'
        ));
    }
    
    public function defineClassAttributes() {
        $this->addAttributeDef(array(
            'name'=>'MIME_TYPES',
            'short-desc'=>'An associative array that contains MIME types of common files.',
            'long-desc'=>'An associative array that contains MIME types of common files. '
            . 'Currently, the array has the following values:'
            . '<ul>'
            . '<li>Audio and Video:'
            . '<ul>'
            . '<li>avi => video/avi</li>'
            . '<li>mp3 => audio/mpeg</li>'
            . '<li>3gp => video/3gpp</li>'
            . '<li>mp4 => video/mp4</li>'
            . '<li>mov => video/quicktime</li>'
            . '<li>wmv => video/x-ms-wmv</li>'
            . '<li>flv => video/x-flv</li>'
            . '<li>midi => audio/midi</li>'
            . '</ul>'
            . '</li>'
            . '<li>Images:</li>'
            . '<ul>'
            . '<li>jpeg => image/jpeg</li>'
            . '<li>jpg => image/jpeg</li>'
            . '<li>png => image/png</li>'
            . '<li>bmp => image/bmp</li>'
            . '<li>ico => image/x-icon</li>'
            . '</ul>'
            . '<li>Documents:</li>'
            . '<ul>'
            . '<li>pdf => application/pdf</li>'
            . '<li>doc => application/msword</li>'
            . '<li>docx => application/vnd.openxmlformats-officedocument.wordprocessingml.document</li>'
            . '<li>xls => application/vnd.ms-excel</li>'
            . '<li>xlsx => application/vnd.openxmlformats-officedocument.spreadsheetml.sheet</li>'
            . '<li>ppt => application/vnd.ms-powerpoint</li>'
            . '<li>pptx => application/vnd.openxmlformats-officedocument.presentationml.presentation</li>'
            . '</ul>'
            . '<li>Text based files:</li>'
            . '<ul>'
            . '<li>txt => text/plain</li>'
            . '<li>php => text/plain</li>'
            . '<li>css => text/css</li>'
            . '<li>js => text/javascribt</li>'
            . '<li>asm => text/x-asm</li>'
            . '<li>java => text/x-java-source</li>'
            . '<li>log => text/plain</li>'
            . '<li>ini => text/plain</li>'
            . '<li>htaccess => application/x-extension-htaccess</li>'
            . '<li>asp => text/asp</li>'
            . '</ul>'
            . '<li>Other files:</li>'
            . '<ul>'
            . '<li>exe => application/vnd.microsoft.portable-executable</li>'
            . '<li>zip => application/zip</li>'
            . '<li>psd => application/octet-stream</li>'
            . '<li>ai => application/postscript</li>'
            . '</ul>'
            . '<ul>',
            'access-modifier'=>'const'
        ));
    }
}
new FileAPIs();