<?php
namespace docGenerator\webfiori\ini;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\ini\'.');
        $this->setTitle('Namespace \\webfiori\\ini');
        $nsObj = new NameSpaceAPI('\webfiori\ini',[
        "GlobalConstants" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to initialize global constants."
        ],
        "InitAutoLoad" => [
            "access-modifier" => "class",
            "summary" => "A class that has one method to initialize user-defined autoload directories."
        ],
        "InitCliCommands" => [
            "access-modifier" => "class",
            "summary" => "A class that contains one method for registering custom CLI   commands."
        ],
        "InitCron" => [
            "access-modifier" => "class",
            "summary" => "A class that has one method to initialize cron jobs."
        ],
        "InitMiddleware" => [
            "access-modifier" => "class",
            "summary" => "Register middleware which are created outside the folder 'app/middleware'."
        ],
        "InitPrivileges" => [
            "access-modifier" => "class",
            "summary" => "A class that has one method which is used to initialize privileges."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;