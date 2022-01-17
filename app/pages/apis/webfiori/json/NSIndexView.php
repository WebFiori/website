<?php
namespace docGenerator\webfiori\json;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\json\'.');
        $this->setTitle('Namespace \\webfiori\\json');
        $nsObj = new NameSpaceAPI('\webfiori\json',[
        "CaseConverter" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to convert string case from one to another (e."
        ],
        "Json" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to create well formatted JSON strings."
        ],
        "JsonConverter" => [
            "access-modifier" => "class",
            "summary" => "A class to convert Json instance to it's JSON string representation."
        ],
        "JsonTypes" => [
            "access-modifier" => "abstract class",
            "summary" => "A class that contains constants which represents supported JSON datatypes."
        ],
        "Property" => [
            "access-modifier" => "class",
            "summary" => "An entity that represents an attribute in Json object."
        ],
        "JsonI" => [
            "access-modifier" => "interface",
            "summary" => "An interface for the objects that can be added to an instance of JsonX."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;