<?php
namespace docGenerator\webfiori\framework\i18n;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\i18n\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\i18n');
        $nsObj = new NameSpaceAPI('\webfiori\framework\i18n',[
        "Language" => [
            "access-modifier" => "class",
            "summary" => "A class that is can be used to make the application ready for   Internationalization (i18n)."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;