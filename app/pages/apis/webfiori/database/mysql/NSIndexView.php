<?php
namespace docGenerator\webfiori\database\mysql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\database\\mysql\'.');
        $this->setTitle('Namespace \\webfiori\\database\\mysql');
        $nsObj = new NameSpaceAPI('\webfiori\database\mysql',[
        "MySQLColumn" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a column in MySQL table."
        ],
        "MySQLConnection" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a connection to MySQL server."
        ],
        "MySQLQuery" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to build MySQL queries."
        ],
        "MySQLTable" => [
            "access-modifier" => "class",
            "summary" => "A class that represents MySQL table."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;