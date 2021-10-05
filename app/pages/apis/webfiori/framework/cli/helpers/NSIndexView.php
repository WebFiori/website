<?php
namespace docGenerator\webfiori\framework\cli\helpers;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\cli\\helpers\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\cli\\helpers');
        $nsObj = new NameSpaceAPI('\webfiori\framework\cli\helpers',[
        "CreateCLIClassHelper" => [
            "access-modifier" => "class",
            "summary" => "A helper class which is used to help in creating cron jobs classes using CLI."
        ],
        "CreateCronJob" => [
            "access-modifier" => "class",
            "summary" => "A helper class which is used to help in creating cron jobs classes using CLI."
        ],
        "CreateMiddleware" => [
            "access-modifier" => "class",
            "summary" => "A helper class that works with the create command to create a middleware."
        ],
        "CreateTable" => [
            "access-modifier" => "class",
            "summary" => "A helper class for creating database table class."
        ],
        "CreateTableObj" => [
            "access-modifier" => "class",
            "summary" => "A helper class for creating database tables classes."
        ],
        "CreateThemeHelper" => [
            "access-modifier" => "class",
            "summary" => "Description of CreateTheme"
        ],
        "CreateWebService" => [
            "access-modifier" => "class",
            "summary" => "A helper class for creating web services classes."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;