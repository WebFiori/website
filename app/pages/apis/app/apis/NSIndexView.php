<?php
namespace docGenerator\app\apis;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\app\\apis\'.');
        $this->setTitle('Namespace \\app\\apis');
        $nsObj = new NameSpaceAPI('\app\apis',[
        "AddUserService" => [
            "access-modifier" => "class",
            "summary" => "A class that contains the implementation of the web service 'add-user'."
        ],
        "UserServicesManager" => [
            "access-modifier" => "class",
            "summary" => "A services manager which is used to manage user related APIs."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;