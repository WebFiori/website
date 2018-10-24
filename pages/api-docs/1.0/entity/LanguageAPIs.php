<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';
class LanguageAPIs extends APIView{
   public function __construct() {
        parent::__construct('Language','webfiori/entity');
        $this->getClassAPIObj()->setVersion('1.2');
        $this->getClassAPIObj()->setDescription('A class that is used to define language variables. '
                . 'The developer can use this class to create his own custom '
                . 'language variables. It is usefule in case of multi-language '
                . 'websites. A language file can be defined in the directory '
                . '\'/entity/langs\' of the framework. The name of the file must be \'Language_XX.php\' '
                . 'where \'XX\' is the language code of the language that the '
                . 'file represents.');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'__construct',
            'short-desc'=>'Creates new instance of the class '.$this->monoCL('entity', 'Language'),
            'long-desc'=>'Creates new instance of the class '.$this->monoCL('entity', 'Language'),
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$dir',
                    'type'=>'string',
                    'description'=>''.$this->monoStr('ltr').' or '.$this->monoStr('rtl').'. Default is '.$this->monoStr('ltr').'.',
                    'is-optional'=>true
                ),
                array(
                    'name'=>'$code',
                    'type'=>'string',
                    'description'=>'Language code (such as \''.$this->monoStr('AR').'\'). Default is \''.$this->monoStr('XX').'\'',
                    'is-optional'=>true
                ),
                array(
                    'name'=>'$initials',
                    'type'=>'array',
                    'description'=>'An initial array of directories.',
                    'is-optional'=>true
                ),
                array(
                    'name'=>'$addtoLoadedAfterCreate',
                    'type'=>'boolean',
                    'description'=>'If set to '.$this->t().', the language object that '
                    . 'will be created will be added to the set of loaded '
                    . 'languages after initialization. Default is '.$this->t().'.',
                    'is-optional'=>true
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'createDirectory',
            'short-desc'=>'Creates a sub array to define language variables.',
            'long-desc'=>'Creates a sub array to define language variables.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$param',
                    'type'=>'string',
                    'description'=>'A string that looks like a directory. For '
                    . 'example, if the given string is \''.$this->monoStr('/general').'\', '
                    . 'an array with key name \''.$this->monoStr('general').'\' '
                    . 'will be created. Another example is if the given string is '
                    . '\''.$this->monoStr('pages/login').'\', two arrays will be '
                    . 'created. The top one will have the key value '
                    . '\''.$this->monoStr('pages').'\' and another one inside '
                    . 'the pages array with key value \''.$this->monoStr('login').'\'.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'get',
            'short-desc'=>'Returns the value of a language variable.',
            'long-desc'=>'Returns the value of a language variable.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$name',
                    'type'=>'string',
                    'description'=>'A directory to the language variable (such as \''.$this->monoStr('/pages/login/login-label').'\').',
                )
            ),
            'return-types'=>'string|array',
            'return-desc'=>'If the given directory represents a label, the function will return its value. If it represents an array, the array will be returned. If nothing was found, the returned value will be the passed value to the function.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getCode',
            'short-desc'=>'Returns the language code that the object represents.',
            'long-desc'=>'Returns the language code that the object represents. It is a two '
            . 'characters string such as \''.$this->monoStr('AR').'\'',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'Language code in upper case (such as \''.$this->monoStr('AR').'\'). If language code is not set, default is returned which is \''.$this->monoStr('XX').'\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getLanguageVars',
            'short-desc'=>'Returns an associative array that contains language variables definition.',
            'long-desc'=>'Returns an associative array that contains language variables definition. The '
            . 'array will have the following, writing direction of the language, the code of the language '
            . 'in addition to user defined variables.',
            'access-modifier'=>'public',
            'return-types'=>'array',
            'return-desc'=>'Returns an associative array that contains language variables definition.'
        ));
        $this->addFunctionDef(array(
            'name'=>'&getLoadedLangs',
            'short-desc'=>'Returns a reference to an associative array that contains an objects of type \''.$this->monoCL('entity', 'Language').'\'.',
            'long-desc'=>'Returns a reference to an associative array that contains an objects of type \''.$this->monoCL('entity', 'Language').'\'. '
            . '',
            'access-modifier'=>'public static',
            'return-types'=>'array',
            'return-desc'=>'A reference to an associative array that contains an objects of type \''.$this->monoCL('entity', 'Language').'\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getWritingDir',
            'short-desc'=>'Returns language writing direction.',
            'long-desc'=>'Returns language writing direction. It can be only one '
            . 'of two values, \''.$this->monoStr('rtl').'\' or \''.$this->monoStr('ltr').'\'.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'The value \''.$this->monoStr('rtl').'\' or \''.$this->monoStr('ltr').'\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'isLoaded',
            'short-desc'=>'Checks if the language is added to the set of loaded languages or not.',
            'long-desc'=>'Checks if the language is added to the set of loaded languages or not.',
            'access-modifier'=>'public',
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' if the language is added to the set of loaded languages.'
        ));
        $this->addFunctionDef(array(
            'name'=>'&loadTranslation',
            'short-desc'=>'Loads a language file based on language code.',
            'long-desc'=>'Loads a language file based on language code. '
            . 'A language file is a file that has the name \''.$this->monoStr('Language_XX.php').'\' which is created '
            . 'in the directory \''.$this->monoStr('/entity/langs').'\' of the framework. '
            . 'The \''.$this->monoStr('XX').'\' in file name represents language code. '
            . 'Note that An exception will be thrown if no language file was '
            . 'found that matches the given language code. '
            . 'Also the function will throw an exception when the translation '
            . 'file is loaded but no object of type '.$this->monoCL('entity', 'Language').' was '
            . 'loaded in the set of loaded translations.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$langCode',
                    'type'=>'string',
                    'description'=>'A two digits language code (such as \'ar\').',
                )
            ),
            'return-types'=>$this->monoCL('entity', 'Language'),
            'return-desc'=>'Language an object of type '.$this->monoCL('entity', 'Language').' is returned if the language was loaded.'
        ));
        $this->addFunctionDef(array(
            'name'=>'set',
            'short-desc'=>'Sets or updates a language variable.',
            'long-desc'=>'Sets or updates a language variable.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$dir',
                    'type'=>'string',
                    'description'=>'A string that looks like a directory. '
                    . 'It issimply the array that will contain the variable.',
                ),
                array(
                    'name'=>'$varName',
                    'type'=>'string',
                    'description'=>'The name of the variable.',
                ),
                array(
                    'name'=>'$varVal',
                    'type'=>'string',
                    'description'=>'The value of the variable.',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' '
            . 'if the variable is set. Other than that, the function '
            . 'will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'setCode',
            'short-desc'=>'Language code (such as \'AR\').',
            'long-desc'=>'Sets the code of the language.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$code',
                    'type'=>'string',
                    'description'=>'Language code (such as \'AR\').',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'The function will return '.$this->t().' if the '
            . 'language code is set. If not set, the function will return '.$this->f().'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'setMultiple',
            'short-desc'=>'Sets multiple language variables.',
            'long-desc'=>'Sets multiple language variables.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$dir',
                    'type'=>'string',
                    'description'=>'A string that looks like a directory. It is simply '
                    . 'the array the that wil contain the language varaiables',
                ),
                array(
                    'name'=>'$arr',
                    'type'=>'array',
                    'description'=>'An associative array. The key will act as '
                    . 'the variable name and the value of the key will act as '
                    . 'the variable value.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'unloadTranslation',
            'short-desc'=>'Unload translation based on its language code.',
            'long-desc'=>'Unload translation based on its language code.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$langCode',
                    'type'=>'string',
                    'description'=>'A two digits language code (such as \'ar\').',
                )
            )
        ));
    }

    public function defineClassAttributes() {
        $this->addAttributeDef(array(
            'name'=>'DIR_LTR',
            'short-desc'=>'A constant that represents left to right writing direction.',
            'long-desc'=>'A constant that represents left to right writing direction..',
            'access-modifier'=>'const'
        ));
        $this->addAttributeDef(array(
            'name'=>'DIR_RTL',
            'short-desc'=>'A constant that represents right to left writing direction.',
            'long-desc'=>'A constant that represents right to left writing direction.',
            'access-modifier'=>'const'
        ));
    }
}
new LanguageAPIs();