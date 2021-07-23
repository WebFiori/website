<?php
namespace docGenerator\webfiori\examples\webApis;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\examples\\webApis\'.');
        $this->setTitle('Namespace \\webfiori\\examples\\webApis');
        $nsObj = new NameSpaceAPI('\webfiori\examples\webApis',[
        "ExampleAPI" => [
            "access-modifier" => "class",
            "summary" => "A sample manager which is used to mange services."
        ],
        "SampleService" => [
            "access-modifier" => "class",
            "summary" => "A sample service that can be used as a reference when creating web services."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;