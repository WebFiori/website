<?php
namespace docGenerator\webfiori\jobs;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\jobs\'.');
        $this->setTitle('Namespace \\webfiori\\jobs');
        $nsObj = new NameSpaceAPI('\webfiori\jobs',[
        "SampleJob" => [
            "access-modifier" => "class",
            "summary" => "A sample job that shows how to create jobs and make them schedule automatically."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;