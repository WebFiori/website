<?php
namespace docGenerator\app;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\app\'.');
        $this->setTitle('Namespace \\app');
        $nsObj = new NameSpaceAPI('\app',[
        "AppConfig" => [
            "access-modifier" => "class",
            "summary" => "Configuration class of the application"
        ],
        ], [
            'app\database',
            'app\apis',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;