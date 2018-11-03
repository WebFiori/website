<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class JsonXAPIs extends APIView{
    public function __construct() {
        parent::__construct('JsonX','entity/jsonx');
        $this->setClassShortDesc('A helper class for creating JSON strings.');
        $this->setClassLongDesc('A helper class for creating JSON strings. '
                . 'The class follows the specifications found at '.$this->monoLink('https://www.json.org/index.html', 'https://www.json.org/index.html').'.');
        $this->setVNum('1.2');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'__toString',
            'short-desc'=>'Generates a JSON string using added attributes and return it.',
            'long-desc'=>'Generates a JSON string using added attributes and return it.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'A well-formatted JSON string.'
        ));
        $this->addFunctionDef(array(
            'name'=>'add',
            'short-desc'=>'Adds or updates a value.',
            'long-desc'=>'Adds or updates a value. If a value at the given key is set, the function will update it. Other than that, it will create new attribute in the JSON string.'
            . '',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The value of the key',
                )
            ),
            'params'=>array(
                array(
                    'name'=>'$value',
                    'type'=>'mixed',
                    'description'=>'The value of the key. It can be an integer, '
                    . 'a double, a string, an array or an object. If '.$this->n().' '
                    . 'is given, the method will set the value at the given key '
                    . 'to '.$this->monoStr('null').'.',
                )
            ),
            'params'=>array(
                array(
                    'name'=>'$options',
                    'type'=>'array',
                    'description'=>'An associative array of options. Currently, '
                    . 'the array has the following options: '
                    . '<ul>'
                    . '<li><b>'.$this->monoStr('string-as-boolean').'</b>: A boolean value. If set to '
                    . $this->t().' and the given string represents a boolean value '
                    . '(like \'yes\' or \'no\'), the string will be added as a'
                    . ' boolean value. Default is '.$this->f().'.</li>'
                    . '<li><b>'.$this->monoStr('array-as-object').'</b>: A boolean value. If set to '
                    . $this->t().', the array will be added as an object. '
                    . 'Default is '.$this->f().'.</li>/ul>',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>$this->t().' if the value is set. If the given value '
            . 'or key is invalid, the method will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'addArray',
            'short-desc'=>'Adds an array.',
            'long-desc'=>'Adds an array.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The name of the key.',
                ),
                array(
                    'name'=>'$value',
                    'type'=>'array',
                    'description'=>'The array that will be added. If the given '
                    . 'array is indexed array, all values will be added as '
                    . 'single entity (e.g. [1, 2, 3]). If the array is '
                    . 'associative, the values of the array will be '
                    . 'added as objects.',
                ),
                array(
                    'name'=>'$asObject',
                    'type'=>'boolean',
                    'description'=>'If this parameter is set to '.$this->t().', '
                    . 'the array will be added as an object in JSON string.'
                    . ' Default is '.$this->f().'.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>''.$this->f().' if the given key is invalid or the '
            . 'given value is not an array.'
        ));
        $this->addFunctionDef(array(
            'name'=>'addBoolean',
            'short-desc'=>'Adds a boolean value (true or false).',
            'long-desc'=>'Adds a boolean value (true or false).',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The name of the key.',
                ),
                array(
                    'name'=>'$val',
                    'type'=>'boolean',
                    'description'=>$this->t().' or '.$this->f().'. If not specified, '
                    . 'The default will be '.$this->t().'.',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>$this->t().' in case the value is set. If the given '
            . 'value is not a boolean or the key value is invalid string, '
            . 'the function will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'addNumber',
            'short-desc'=>'Adds a number.',
            'long-desc'=>'Adds a number.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The name of the key.',
                ),
                array(
                    'name'=>'$value',
                    'type'=>'int|double',
                    'description'=>'The value of the key. Note that if the '
                    . 'given number is <b>'.$this->monoStr('INF').'</b> or <b>'.$this->monoStr('NAN').'</b>, '
                    . 'The method will add them as a string.'
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>$this->t().' in case the number is added. If the '
            . 'given value is not a number or the key value is invalid '
            . 'string, the method will return '.$this->f().'. '
        ));
        $this->addFunctionDef(array(
            'name'=>'addObject',
            'short-desc'=>'Adds an object to the JSON string.',
            'long-desc'=>'Adds an object to the JSON string.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The name of the key.',
                ),
                array(
                    'name'=>'$value',
                    'type'=>'object|'.$this->monoCL('entity/jsonx', 'JsonI').'|'.$this->monoCL('entity/jsonx', 'JsonX'),
                    'description'=>'The object that will be added.'
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>$this->t().' if the object is added. If the given '
            . 'value is an object that does not implement the interface '
            . ''.$this->monoCL('entity/jsonx', 'JsonI').', The function will '
            . 'try to extract object information based on its public functions. '
            . 'In that case, the generated JSON will be on the formate '
            . '<b>'.$this->monoStr('{"prop-0":"prop-1","prop-n":"","":""}').'</b>. '
            . 'If the key value is invalid string, the method will '
            . 'return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'addString',
            'short-desc'=>'Adds a new key to the JSON data with its value as string.',
            'long-desc'=>'Adds a new key to the JSON data with its value as string.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The name of the key.',
                ),
                array(
                    'name'=>'$val',
                    'type'=>'string',
                    'description'=>'The value of the string. '
                    . 'Note that if the given string is one of the following '
                    . 'and the parameter '.$this->monoStr('$toBool').' is set to '.$this->t().', '
                    . 'it will be converted into boolean (case insensitive).'
                    . '<ul>'
                    . '<li>yes => '.$this->t().'</li>'
                    . '<li>no => '.$this->f().'</li>'
                    . '<li>y => '.$this->t().'</li>'
                    . '<li>n => '.$this->f().'</li>'
                    . '<li>t => '.$this->t().'</li>'
                    . '<li>f => '.$this->f().'</li>'
                    . '<li>true => '.$this->t().'</li>'
                    . '<li>false => '.$this->f().'</li>'
                    . '<li>on => '.$this->t().'</li>'
                    . '<li>off => '.$this->f().'</li>'
                    . '<li>ok => '.$this->t().''
                    . '</li></ul>',
                ),
                array(
                    'name'=>'$toBool',
                    'type'=>'boolean',
                    'description'=>'If set to '.$this->t().' and the string 
                        represents a boolean value, then the string will be 
                        added as a boolean. Default is '.$this->f().'.',
                    'is-optional'=>TRUE
                ),
            ),
            'return-types'=>'boolean',
            'return-desc'=>$this->t().' in case the string is added. If the given value is not a string or the given key is invalid, the method will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'escapeJSONSpecialChars',
            'short-desc'=>'Escape JSON special characters from string.',
            'long-desc'=>'Escape JSON special characters from string.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$string',
                    'type'=>'string',
                    'description'=>'A string to escape special JSON characters '
                    . 'from. If it is '.$this->n().',the method will return empty string.',
                )
            ),
            'return-types'=>'string',
            'return-desc'=>'A string which has JSON special characters escaped.'
        ));
        $this->addFunctionDef(array(
            'name'=>'get',
            'short-desc'=>'Returns a string that represents the value at the given key.',
            'long-desc'=>'Returns a string that represents the value at the given key.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The name of the key.',
                ),
            ),
            'return-types'=>'string|NULL',
            'return-desc'=>'The function will return a string that represents '
            . 'the value. If the key does not exists,  the function will '
            . 'return '.$this->n().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'hasKey',
            'short-desc'=>'Checks if the current JsonX instance has the given key or not.',
            'long-desc'=>'Checks if the current JsonX instance has the given key or not.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$key',
                    'type'=>'string',
                    'description'=>'The name of the key.',
                ),
            ),
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' '
            . 'if the key exists. '.$this->f().' if not.'
        ));
    }

    public function defineClassAttributes() {
        $this->addAttributeDef(array(
            'name'=>'SPECIAL_CHARS',
            'short-desc'=>'An array that contains JSON special characters.',
            'long-desc'=>'An array that contains JSON special characters. The array has '
            . 'the following characters: '.$this->monoStr('\,/,",\t,\r,\n').' and '.$this->monoStr('\f').'.',
            'access-modifier'=>'const',
        ));
        $this->addAttributeDef(array(
            'name'=>'SPECIAL_CHARS_ESC',
            'short-desc'=>'An array that contains escaped JSON special characters.',
            'long-desc'=>'An array that contains escaped JSON special characters.',
            'access-modifier'=>'const',
        ));
        $this->addAttributeDef(array(
            'name'=>'TYPES',
            'short-desc'=>'An array of supported types.',
            'long-desc'=>'An array of supported types. The typesthat can be '
            . 'added to an instance of the class are:'
            . '<ul>'
            . '<li>'.$this->monoStr('string').': A basic string.</li>'
            . '<li>'.$this->monoStr('integer').': An integer value such as 5.</li>'
            . '<li>'.$this->monoStr('boolean').': A boolean value. It can be '.$this->t().' or '.$this->f().'.</li>'
            . '<li>'.$this->monoStr('NULL').': PHP\'s '.$this->n().' value.</li>'
            . '<li>'.$this->monoStr('object').': Any PHP object.</li>'
            . '<li>'.$this->monoStr('double').': A float value such as 1.4.</li>'
            . '<li>'.$this->monoStr('array').': PHP array.</li>'
            . '</ul>',
            'access-modifier'=>'const',
        ));
    }
}
new JsonXAPIs();