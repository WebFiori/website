<?php
namespace docGenerator\webfiori\framework\session;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\session\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\session');
        $nsObj = new NameSpaceAPI('\webfiori\framework\session',[
        "DatabaseSessionStorage" => [
            "access-modifier" => "class",
            "summary" => "A session storage engine which uses database to store session state."
        ],
        "DefaultSessionStorage" => [
            "access-modifier" => "class",
            "summary" => "The default sessions storage engine."
        ],
        "Session" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a session."
        ],
        "SessionOperations" => [
            "access-modifier" => "class",
            "summary" => "A class which includes all database related operations to add, update,   and delete sessions from a database."
        ],
        "SessionsManager" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to manage user sessions."
        ],
        "SessionsTable" => [
            "access-modifier" => "class",
            "summary" => "A class which represents the database table '`sessions`'."
        ],
        "SessionStorage" => [
            "access-modifier" => "interface",
            "summary" => "An interface which can be used to implement different types of sessions storage."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;