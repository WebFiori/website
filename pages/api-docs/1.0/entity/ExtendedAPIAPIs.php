<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class ExtAPIAPIs extends APIView{
    public function __construct() {
        parent::__construct('ExtendedAPI','webfiori/entity');
        $this->getClassAPIObj()->extendClass('API','entity/rest-easy/API');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'__construct',
            'short-desc'=>'Creates new instance of the class '.$this->monoCL('entity', 'ExdendedAPI').'.',
            'long-desc'=>'Creates new instance of the class '.$this->monoCL('entity', 'ExdendedAPI').'.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$version',
                    'type'=>'string',
                    'description'=>'Version number of the API. Default is \'1.0.0\'.',
                    'is-optional'=>TRUE
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'actionNotImpl',
            'short-desc'=>'Sends a response message to indicate that the action that is used to '
            . 'fetch the API is not implemented yet.',
            'long-desc'=>'Sends a response message to indicate that the action that is used to '
            . 'fetch the API is not implemented yet. It is useful in the stage of API design. '
            . 'the response that will be send will have the following JSON format:'
            . "<pre style=\"font-family:monospace\">{\n    \"message\":\"a_message\",\n    \"type\":\"error\"\n}</pre>"
            . '<p>Where the value of \''.$this->monoStr('a_message').'\' will depended on the value that will be returned '
            . 'by the call '.$this->monoCL('webfiori/entity', 'ExtendedAPI').$this->monoStr('::').$this->monoLink($this->getBaseURL().'entity/ExtendedAPI#get','get(\'general/action-not-impl\')').'. '
            . 'The response code will be \''.$this->monoStr('404 Not Found').'\'.',
            'access-modifier'=>'public',
        ));
        $this->addFunctionDef(array(
            'name'=>'actionNotSupported',
            'short-desc'=>'Sends a response message to indicate that the action that is used to fetch the '
            . 'API is not supported.',
            'long-desc'=>'Sends a response message to indicate that the action that is used to fetch the '
            . 'API is not supported. This function is called automatically if the action is not '
            . 'supported. '
            . 'the response that will be send will have the following JSON format:'
            . "<pre style=\"font-family:monospace\">{\n    \"message\":\"a_message\",\n    \"type\":\"error\"\n}</pre>"
            . '<p>Where the value of \''.$this->monoStr('a_message').'\' will depended on the value that will be returned '
            . 'by the call '.$this->monoCL('webfiori/entity', 'ExtendedAPI').$this->monoStr('::').$this->monoLink($this->getBaseURL().'entity/ExtendedAPI#get','get(\'general/action-not-supported\')').'. '
            . 'The response code will be \''.$this->monoStr('404 Not Found').'\'.',
            'access-modifier'=>'public',
        ));
        $this->addFunctionDef(array(
            'name'=>'addAction',
            'short-desc'=>'Adds new action to the set of API actions.',
            'long-desc'=>'Adds new action to the set of API actions.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$action',
                    'type'=> $this->monoCL('entity/rest-easy', 'APIAction'),
                    'description'=>'An object of type '.$this->monoCL('entity/rest-easy', 'APIAction').'. '
                    . 'The object will contain all required parameters for the action.',
                ),
                array(
                    'name'=>'$reqPermission',
                    'type'=>'boolean',
                    'description'=>'If this parameter is set to '.$this->monoStr('TRUE').', a call to the '
                    . 'function '.$this->monoCL('webfiori/entity', 'ExtendedAPI').$this->monoStr('::').$this->monoLink($this->getBaseURL().'entity/ExtendedAPI#isAuthorized','isAuthorized()').''
                    . ' will be made during request processing to check if the call is valid or not. If the call is not authorized, '
                    . 'a 401 response code is sent to the client.',
                    'is-optional'=>TRUE
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'contentTypeNotSupported',
            'short-desc'=>'Sends a response message to indicate that request content type is not supported by the API.',
            'long-desc'=>'Sends a response message to indicate that request content type is not supported by the API. '
            . 'the response that will be send will have the following JSON format:'
            . "<pre style=\"font-family:monospace\">{\n    \"message\":\"a_message\",\n    \"type\":\"error\"\n    \"request-content-type\":\"c_type\"\n}</pre>"
            . '<p>Where the value of \''.$this->monoStr('a_message').'\' will depended on the value that will be returned '
            . 'by the call '.$this->monoCL('webfiori/entity', 'ExtendedAPI').$this->monoStr('::').$this->monoLink($this->getBaseURL().'entity/ExtendedAPI#get','get(\'general/content-not-supported\')').' '
            . 'and the value of \''.$this->monoStr('a_message').'\' will be the value of request header \''.$this->monoStr('content-type').'\'. '
            . 'The response code will be \''.$this->monoStr('404 Not Found').'\'.',
            'access-modifier'=>'public',
        ));
        $this->addFunctionDef(array(
            'name'=>'createLangDir',
            'short-desc'=>'Creates a sub array to define language variables.',
            'long-desc'=>'Creates a sub array to define language variables.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$dir',
                    'type'=>'string',
                    'description'=>'A string that looks like a directory. For example, if the given string is \'general\', 
                        an array with key name \'general\' will be created. Another example is 
                        if the given string is \'pages/login\', two arrays will be created. The 
                        top one will have the key value \'pages\' and another one inside 
                        the pages array with key value \'login\'.',
                )
            )
        ));
        $this->addFunctionDef(array(
            'name'=>'databaseErr',
            'short-desc'=>'Sends a response message to indicate that a database error has occur.',
            'long-desc'=>'Sends a response message to indicate that a database error has occur.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$errInfo',
                    'type'=>$this->monoCL('entity/jsonx', 'JsonX').'|'.
                    $this->monoCL('entity/jsonx', 'JsonI').'|string',
                    'description'=>'An object of type '.$this->monoCL('entity/jsonx', 'JsonX').' 
                        or '.$this->monoCL('entity/jsonx', 'JsonI').' that describe the error in more details. Also it can be a simple string.',
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
                    'name'=>'$dir',
                    'type'=>'string',
                    'description'=>'A directory to the language variable (such as \'pages/login/login-label\').',
                )
            ),
            'return-types'=>'string|array',
            'return-desc'=>'If the given directory represents a label, the 
                function will return its value. If it represents an array, the array will 
                be returned. If nothing was found, the returned value will be the passed 
                value to the function.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getAuthorizationHeader',
            'short-desc'=>'Returns an associative array that contains HTTP authorization header content.',
            'long-desc'=>'Returns an associative array that contains HTTP authorization header content.',
            'access-modifier'=>'public',
            'return-types'=>'array',
            'return-desc'=>'An associative array that has two indices: <ul>'
            . '<li><b>'.$this->monoStr('type').'</b>: Type of authorization (e.g. basic, bearer )</li>'
            . '<li><b>'.$this->monoStr('credentials').'</b>: Depending on authorization type, this field will have different values.</li>'
            . '</ul><p>If no authorization header is sent, The two indices will be empty.</p>'
        ));
        $this->addFunctionDef(array(
            'name'=>'&getTranslation',
            'short-desc'=>'Returns the language instance which is linked with the class.',
            'long-desc'=>'Returns the language instance which is linked with the ',
            'access-modifier'=>'public',
            'return-types'=> $this->monoCL('entity', 'Language'),
            'return-desc'=>'An instance of the class '.$this->monoCL('entity', 'Language').'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'invParams',
            'short-desc'=>'Sends a response message to indicate that a request parameter(s) have invalid values.',
            'long-desc'=>'Sends a response message to indicate that a request parameter(s) have invalid values.',
            'access-modifier'=>'public',
        ));
        $this->addFunctionDef(array(
            'name'=>'missingParams',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'',
                    'type'=>'',
                    'description'=>'',
                )
            ),
            'return-types'=>'',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'notAuth',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'',
                    'type'=>'',
                    'description'=>'',
                )
            ),
            'return-types'=>'',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'requMethNotAllowed',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'',
                    'type'=>'',
                    'description'=>'',
                )
            ),
            'return-types'=>'',
            'return-desc'=>''
        ));
        $this->addFunctionDef(array(
            'name'=>'setLangVars',
            'short-desc'=>'',
            'long-desc'=>'',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'',
                    'type'=>'',
                    'description'=>'',
                )
            ),
            'return-types'=>'',
            'return-desc'=>''
        ));
    }

    public function defineClassAttributes() {

    }
}
new ExtAPIAPIs();