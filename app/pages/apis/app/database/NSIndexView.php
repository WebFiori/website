<?php
namespace docGenerator\app\database;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\app\\database\'.');
        $this->setTitle('Namespace \\app\\database');
        $nsObj = new NameSpaceAPI('\app\database',[
        "MainDatabase" => [
            "access-modifier" => "class",
            "summary" => "A sample database instance."
        ],
        "UsersTable" => [
            "access-modifier" => "class",
            "summary" => "A basic table which can be used to hold users information."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;