<?php
namespace docGenerator\webfiori\examples;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\examples\'.');
        $this->setTitle('Namespace \\webfiori\\examples');
        $nsObj = new NameSpaceAPI('\webfiori\examples',[
        "SampleMiddleware" => [
            "access-modifier" => "class",
            "summary" => "A sample middleware implementation."
        ],
        ], [
            'webfiori\examples\webApis',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;