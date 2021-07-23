<?php
namespace docGenerator\webfiori\http;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\http\'.');
        $this->setTitle('Namespace \\webfiori\\http');
        $nsObj = new NameSpaceAPI('\webfiori\http',[
        "APIFilter" => [
            "access-modifier" => "class",
            "summary" => "A class used to validate and sanitize request parameters."
        ],
        "AbstractWebService" => [
            "access-modifier" => "abstract class",
            "summary" => "A class that represents one web service."
        ],
        "ManagerInfoService" => [
            "access-modifier" => "abstract class",
            "summary" => "A service which can be used to display information about services manager."
        ],
        "ParamTypes" => [
            "access-modifier" => "class",
            "summary" => "A class that contains constants for representing request parameters types."
        ],
        "Request" => [
            "access-modifier" => "class",
            "summary" => "A class that represents HTTP client request."
        ],
        "RequestParameter" => [
            "access-modifier" => "class",
            "summary" => "A class that represents request parameter."
        ],
        "Response" => [
            "access-modifier" => "class",
            "summary" => "A class that represents HTTP response."
        ],
        "Uri" => [
            "access-modifier" => "class",
            "summary" => "A class that is used to split URIs and get their parameters."
        ],
        "WebServicesManager" => [
            "access-modifier" => "class",
            "summary" => "A class that is used to manage multiple web services."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;