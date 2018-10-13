<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class DBConnFactoryAPIs extends APIView{
    public function __construct() {
        parent::__construct('DBConnectionFactory','webfiori/entity');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'mysqlLink',
            'short-desc'=>'Create a link to MySQL database.',
            'long-desc'=>'Create a link to MySQL database. The link can be '
            . 'used to execute MySQL queries which is constructed using '
            . 'an instance of '.$this->monoCL('entity/ph-mysql', 'MySQLQuery').'.',
            'access-modifier'=>'public',
            'params'=>array(
                array(
                    'name'=>'$connectionParams',
                    'type'=>'array',
                    'description'=>'An associative array that contains database '
                    . 'connection parameters. The indices are: '
                    . '<ul><li><b>'.$this->monoStr('host').'</b>: Database host address.'
                    . '</li><li><b>'.$this->monoStr('user').'</b>: Database username.</li>'
                    . '<li><b>'.$this->monoStr('pass').'</b>: Database user\'s password.</li>'
                    . '<li><b>'.$this->monoStr('db-name').'</b>: The name of the database (Schema name).</li>'
                    . '</ul>',
                )
            ),
            'return-types'=> $this->monoCL('entity/ph-mysql', 'DatabaseLink').'|array',
            'return-desc'=>'If the connection to the database was established, '
            . 'the function will return an instance of '
            . ''.$this->monoCL('entity/ph-mysql', 'DatabaseLink').'. '
            . 'If something went wrong while attempting to connect, an '
            . 'associative array is returned which contains error details. '
            . 'The array has two indices: '
            . '<ul>'
            . '<li><b>'.$this->monoStr('error-code').'</b>: Error code. It can be MySQL error code.</li>'
            . '<li><b>'.$this->monoStr('error-code').'</b>: A message that tels more information about '
            . 'the error.</li></ul>'
        ));
    }

    public function defineClassAttributes() {
        $this->addAttributeDef(array(
            'name'=>'DB_CONNECTION_ERR',
            'access-modifier'=>'const',
            'short-desc'=>'A constant that indicates a database connection error has occur.',
            'long-desc'=>'A constant that indicates a database connection error has occur.'
        ));
        $this->addAttributeDef(array(
            'name'=>'MISSING_DB_HOST',
            'access-modifier'=>'const',
            'short-desc'=>'A constant that indicates the name of database host is missing.',
            'long-desc'=>'A constant that indicates the name of database host is missing.'
        ));
        $this->addAttributeDef(array(
            'name'=>'MISSING_DB_NAME',
            'access-modifier'=>'const',
            'short-desc'=>'A constant that indicates the name of the database is missing.',
            'long-desc'=>'A constant that indicates the name of the database is missing.'
        ));
        $this->addAttributeDef(array(
            'name'=>'MISSING_DB_PASS',
            'access-modifier'=>'const',
            'short-desc'=>'A constant that indicates the user password of the database is missing.',
            'long-desc'=>'A constant that indicates the user password of the database is missing.'
        ));
        $this->addAttributeDef(array(
            'name'=>'MISSING_DB_USER',
            'access-modifier'=>'const',
            'short-desc'=>'A constant that indicates the username that is used to access the database is missing.',
            'long-desc'=>'A constant that indicates the username that is used to access the database is missing.'
        ));
    }
}
new DBConnFactoryAPIs();