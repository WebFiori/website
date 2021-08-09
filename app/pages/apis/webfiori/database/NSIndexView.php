<?php
namespace docGenerator\webfiori\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\database\'.');
        $this->setTitle('Namespace \\webfiori\\database');
        $nsObj = new NameSpaceAPI('\webfiori\database',[
        "AbstractQuery" => [
            "access-modifier" => "abstract class",
            "summary" => "A base class that can be used to build SQL queries."
        ],
        "Column" => [
            "access-modifier" => "abstract class",
            "summary" => "A class which represents a column in a database table."
        ],
        "Condition" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a binary conditional statement."
        ],
        "Connection" => [
            "access-modifier" => "abstract class",
            "summary" => "A class that represents a connection to a database."
        ],
        "ConnectionInfo" => [
            "access-modifier" => "class",
            "summary" => "An entity that can be used to store database connection information."
        ],
        "Database" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to represents the structure of the database   (database schema)."
        ],
        "DatabaseException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown to indicate that an error which is related to   database happened."
        ],
        "EntityMapper" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to map a 'Table' object to an entity class."
        ],
        "Expression" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to represent any SQL expression."
        ],
        "ForeignKey" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a foreign key."
        ],
        "JoinTable" => [
            "access-modifier" => "class",
            "summary" => "A class that represents two joined tables."
        ],
        "ResultSet" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to represent a data set which was fetched from the   database after executing a query like a 'select' query."
        ],
        "SelectExpression" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to build the select expression of a select query."
        ],
        "Table" => [
            "access-modifier" => "abstract class",
            "summary" => "A class that can be used to represents database tables."
        ],
        "WhereExpression" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to build 'where' expressions."
        ],
        ], [
            'webfiori\database\mysql',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;