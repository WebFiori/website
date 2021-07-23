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
        "Json" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to create well formatted JSON strings."
        ],
        "JsonTypes" => [
            "access-modifier" => "abstract class",
            "summary" => "A class that contains constants which represents supported JSON datatypes."
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