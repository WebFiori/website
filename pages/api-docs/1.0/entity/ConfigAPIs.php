<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class ConfigAPIs extends APIView{
   public function __construct() {
        parent::__construct('Config','webfiori/entity');
        $this->getClassAPIObj()->setVersion('1.4');
        $this->getClassAPIObj()->setLongDescription('Global configuration class. Used by the server part and the presentation part. '
                . 'The most important thing about this class is that it contains '
                . 'the main database connection information if the system will '
                . 'use one. Also, it contains framework version information including '
                . 'releas date, version type and version number.');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'&get',
            'short-desc'=>'Returns an instance of the class '.$this->monoCL('entity', 'Config').'.',
            'long-desc'=>'Returns an instance of the class '.$this->monoCL('entity', 'Config').'. Consecutive calls to '
            . 'the function will result in returning the same instance every time.',
            'access-modifier'=>'public static',
            'return-types'=> $this->monoCL('entity', 'Config'),
            'return-desc'=>'An instance of the class '.$this->monoCL('entity', 'Config').'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getConfigVersion',
            'short-desc'=>'Returns version number of the configuration file.',
            'long-desc'=>'Returns version number of the configuration file. The only '
            . 'possible use for this function is to validate compatability.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'A string in the formate \'x.x.x\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getDBHost',
            'short-desc'=>'Returns the address of database host.',
            'long-desc'=>'Returns the address of database host. Most of the '
            . 'times, it will be \'localhost\'. But it can be something else if '
            . 'the database is not hosted in thesameserver.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'The address of database host.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getDBName',
            'short-desc'=>'Returns the name of the database.',
            'long-desc'=>'Returns the name of the database.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'Returns the name of the database.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getDBPassword',
            'short-desc'=>'Returns database user\'s password.',
            'long-desc'=>'Returns database user\'s password.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'Returns database user\'s password.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getDBPort',
            'short-desc'=>'Returns the port number that will be used to access server\'sdatabase.',
            'long-desc'=>'Returns the port number that will be used to access server\'sdatabase.',
            'access-modifier'=>'public static',
            'return-types'=>'int',
            'return-desc'=>'Returns the port number that will be used to access server\'sdatabase.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getDBUser',
            'short-desc'=>'Returns the name of the user that will be used to access the '
            . 'database.',
            'long-desc'=>'Returns the name of the user that will be used to access the '
            . 'database.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'Returns the name of the user that will be used to access the '
            . 'database.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getReleaseDate',
            'short-desc'=>'Returns the date at which the given framework version is released.',
            'long-desc'=>'Returns the date at which the given framework version is released.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'A string that looks like this: \'09-25-2018 (DD-MM-YYYY)\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getVersion',
            'short-desc'=>'Returns framework version number.',
            'long-desc'=>'Returns framework version number.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'A string in the formate \'x.x.x\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'getVersionType',
            'short-desc'=>'Returns framework version type.',
            'long-desc'=>'Returns framework version type. The type of '
            . 'the version can be \'Beta\', \'Alpha\', and \'Stable\'. '
            . 'The beta is a version which is still in development but '
            . 'not recommended for production use. The alpha is mostly used '
            . 'internally between framework developers. The stable is the one '
            . 'that can be used in production.',
            'access-modifier'=>'public static',
            'return-types'=>'string',
            'return-desc'=>'The string \'Beta\', \'Alpha\', or \'Stable\'.'
        ));
        $this->addFunctionDef(array(
            'name'=>'isConfig',
            'short-desc'=>'Checks if the system is configured or not.',
            'long-desc'=>'Checks if the system is configured or not. The '
            . 'function is used to validate system status for first timedeploy.',
            'access-modifier'=>'public static',
            'return-types'=>'boolean',
            'return-desc'=>'If the system is configured, the function '
            . 'will return '.$this->monoStr('TRUE').'.'
        ));
    }

    public function defineClassAttributes() {

    }

}
new ConfigAPIs();