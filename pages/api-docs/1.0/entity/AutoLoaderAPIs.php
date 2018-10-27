<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class AutoLoaderAPIs extends APIView{
    public function __construct() {
        parent::__construct('AutoLoader','webfiori/entity','1.1.1');
        $this->getClassAPIObj()->setLongDescription('An autoloader class to load classes as needed during runtime.');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'addSearchDirectory',
            'short-desc'=>'Adds new search directory to the array of search folders.',
            'long-desc'=>'Adds new search directory to the array of search folders. '
            . 'The autoloader will search in a set of folders for classes to load '
            . 'them automatically during runtime.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$dir',
                    'type'=>'string',
                    'description'=>'A new directory (such as \'/entity/html-php-structs-1.6/html\').',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'&get',
            'short-desc'=>'Returns a single instance of the class '.$this->monoCL('entity', 'AutoLoader').'.',
            'long-desc'=>'Returns a single instance of the class '.$this->monoCL('entity', 'AutoLoader').'.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$options',
                    'type'=>'array',
                    'description'=>'An associative array of options that is used to initialize 
                        the autoloader. The available options are:
                        <ul>
                        <li><b>'.$this->monoStr('root').'</b>: A directory that can be used as a base search folder. 
                        Default is empty string. Ignored if the constant '.$this->monoStr('ROOT_DIR').' is defined.</li>
                        <li><b>'.$this->monoStr('search-folders').'</b>: An array which contains a set of folders to search 
                        on. Default is an empty array.</li>
                        <li><b>'.$this->monoStr('define-root').'</b>: If set to TRUE, The autoloader will try to define 
                        the constant '.$this->monoStr('ROOT_DIR').' based on the autoload folders. 
                        Default is FALSE. Ignored if the constant '.$this->monoStr('ROOT_DIR').' is defined.</li>
                        </ul>',
                    'is-optional'=>TRUE
                )
            ),
            'return-types'=>$this->monoCL('entity', 'AutoLoader'),
            'return-desc'=>'An instance of the class '.$this->monoCL('entity', 'AutoLoader').'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getFolders',
            'short-desc'=>'Returns an array of all added search folders.',
            'long-desc'=>'Returns an array of all added search folders.',
            'access-modifier'=>'public static',
            'return-types'=>'array',
            'return-desc'=>'Returns an array of all added search folders. '
            . 'If the user did not add any, the array will only contain '
            . 'the default search folders.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getRoot',
            'short-desc'=>'Returns the root search directory.',
            'long-desc'=>'Returns the root search directory.',
            'access-modifier'=>'public',
            'return-types'=>'string',
            'return-desc'=>'Returns the root search directory.'
        ));
    }

    public function defineClassAttributes() {

    }

}
new AutoLoaderAPIs();