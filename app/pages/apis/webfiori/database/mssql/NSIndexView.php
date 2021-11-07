<?php
namespace docGenerator\webfiori\database\mssql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\database\\mssql\'.');
        $this->setTitle('Namespace \\webfiori\\database\\mssql');
        $nsObj = new NameSpaceAPI('\webfiori\database\mssql',[
        "MSSQLColumn" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a column in MSSQL table."
        ],
        "MSSQLConnection" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a connection to MSSQL server."
        ],
        "MSSQLQuery" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to build MSSQL queries."
        ],
        "MSSQLTable" => [
            "access-modifier" => "class",
            "summary" => "A class that represents MSSQL table."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;