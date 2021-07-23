<?php
namespace docGenerator\webfiori\ui\exceptions;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\ui\\exceptions\'.');
        $this->setTitle('Namespace \\webfiori\\ui\\exceptions');
        $nsObj = new NameSpaceAPI('\webfiori\ui\exceptions',[
        "InvalidNodeNameException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown if HTML node has invalid name."
        ],
        "TemplateNotFoundException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown to indicate that a component file was not found."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;