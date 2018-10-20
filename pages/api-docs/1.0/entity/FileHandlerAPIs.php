<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class FHandlerAPIs extends APIView{
    public function __construct() {
        parent::__construct('FileHandler','webfiori/entity');
        $this->getClassAPIObj()->setVersion('1.0');
        $this->getClassAPIObj()->setDescription('This class is used to write HTML or PHP files. It '
                . 'can be also used to write other text based files. '
                . 'The main aim of this class is to make the written files well formatted '
                . 'by adding tabs to them and new lines.');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'__construct',
            'short-desc'=>'Creates new instance of the class.',
            'long-desc'=>'Creates new instance of the class.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$absPath',
                    'type'=>'string',
                    'description'=>'The absolute path of the file such as '.$this->monoStr('C:\Users\ZX\Documents\log.txt').'.',
                ),
                array(
                    'name'=>'$mode',
                    'type'=>'string',
                    'description'=>'The mode at which the file will be opend with. '
                    . 'Default is '.$this->monoStr('w+').'. See \''.$this->monoLink('http://php.net/manual/en/function.fopen.php', 'fopen()').'\' for more info.',
                    'is-optional'=>TRUE
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'addTab',
            'short-desc'=>'Increase tab size by 1.',
            'long-desc'=>'Increase tab size by 1. One tab is 4 spaces.'
        ));
        $this->addFunctionDef(array(
            'name'=>'close',
            'short-desc'=>'Save the changes and close file handler.',
            'long-desc'=>'Save the changes and close file handler. Note that changeswon\'t be '
            . 'applied unless this function is called.',
            'access-modifier'=>'public'
        ));
        $this->addFunctionDef(array(
            'name'=>'closeTag',
            'short-desc'=>'Closes an open html tag.',
            'long-desc'=>'Closes an open html tag. After the tag is written to '
            . 'the file, the tab size will be reduced by 1 and the cursor will '
            . 'move to the next line.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$tagName',
                    'type'=>'string',
                    'description'=>'The name of the tag with any additional parameters (e.g. '.$this->monoStr('&lt;/div&gt;').'). '
                    . 'Default is '.$this->monoStr('&lt;/div&gt;').'.',
                    'is-optional'=>TRUE
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'getTabCount',
            'short-desc'=>'Returns the current size of the tab.',
            'long-desc'=>'Returns the current size of the tab. Initially, tab size will be 0. '
            . 'A call to the function '.$this->funcCall('FileHandler', 'entity', 'addTab').' '
            . 'will increase the size of tab by 1. One tab will have 4 spaces.',
            'access-modifier'=>'public'
        ));
        $this->addFunctionDef(array(
            'name'=>'newLine',
            'short-desc'=>'Adds new line character to the file.',
            'long-desc'=>'Adds new line character to the file. New line character is '
            . ''.$this->monoStr('\\n').'.',
            'access-modifier'=>'public'
        ));
        $this->addFunctionDef(array(
            'name'=>'openTag',
            'short-desc'=>'Opens new HTML tag.',
            'long-desc'=>'Opens new HTML tag. After the tag is written to the '
            . 'file, the tab size will be increased by 1 and the cursor will '
            . 'move to the next line.',
            'access-modifier'=>'public',
            'params'=>array(
                array('name'=>'$tagName',
                'type'=>'string',
                'description'=>'The name of the tag with any additional parameters (e.g. '.$this->monoStr('&lt;/div&gt;').'). '
                . 'Default is '.$this->monoStr('&lt;/div&gt;').'.',
                'is-optional'=>TRUE)
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'reduceTab',
            'short-desc'=>'Reduces tab size by 1.',
            'long-desc'=>'Reduces tab size by 1. If the tab size is 0, it will not reduce it more.',
            'access-modifier'=>'public'
        ));
        $this->addFunctionDef(array(
            'name'=>'write',
            'short-desc'=>'Writes new content to the file.',
            'long-desc'=>'Writes new content to the file.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$content',
                    'type'=>'string',
                    'description'=>'The content that will be written to the file.',
                ),
                array(
                    'name'=>'$incTab',
                    'type'=>'boolean',
                    'description'=>'If this parameter is set to '.$this->t().', '
                    . 'a tab will be added before the content. Default is '.$this->f().'.',
                    'is-optional'=>TRUE
                ),
                array(
                    'name'=>'$incNewLine',
                    'type'=>'boolean',
                    'description'=>'If this parameter is set to '.$this->t().', '
                    . ' the cursor will move to the next line.',
                    'is-optional'=>TRUE
                )
            )
        ));
    }

    public function defineClassAttributes() {

    }

}
new FHandlerAPIs();