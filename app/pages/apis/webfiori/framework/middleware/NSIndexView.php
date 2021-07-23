<?php
namespace docGenerator\webfiori\framework\middleware;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\middleware\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\middleware');
        $nsObj = new NameSpaceAPI('\webfiori\framework\middleware',[
        "AbstractMiddleware" => [
            "access-modifier" => "abstract class",
            "summary" => "An abstract class that can be used to implement custom middleware."
        ],
        "MiddlewareManager" => [
            "access-modifier" => "class",
            "summary" => "This class is used to manage the operations which are related to middleware."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;