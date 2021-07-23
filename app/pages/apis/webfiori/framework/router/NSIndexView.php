<?php
namespace docGenerator\webfiori\framework\router;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\router\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\router');
        $nsObj = new NameSpaceAPI('\webfiori\framework\router',[
        "Router" => [
            "access-modifier" => "class",
            "summary" => "The basic class that is used to route user requests to the correct   location."
        ],
        "RouterUri" => [
            "access-modifier" => "class",
            "summary" => "A class that is used to split URIs and get their parameters."
        ],
        "APIRoutes" => [
            "access-modifier" => "class",
            "summary" => "A class that only has one method to initiate some of system routes."
        ],
        "ClosureRoutes" => [
            "access-modifier" => "class",
            "summary" => "A class that only has one method to initiate some of system routes."
        ],
        "OtherRoutes" => [
            "access-modifier" => "class",
            "summary" => "A class that only has one method to initiate some of system routes."
        ],
        "ViewRoutes" => [
            "access-modifier" => "class",
            "summary" => "A class that only has one method to initiate some of system routes."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;