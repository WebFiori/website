<?php
namespace docGenerator\webfiori\framework\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\ui\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\ui');
        $nsObj = new NameSpaceAPI('\webfiori\framework\ui',[
        "ErrorBox" => [
            "access-modifier" => "class",
            "summary" => "A fixed box which is used to show PHP warnings and notices."
        ],
        "HTTPCodeView" => [
            "access-modifier" => "class",
            "summary" => "A basic view which is used to display HTTP error codes taken from   language file."
        ],
        "MessageBox" => [
            "access-modifier" => "class",
            "summary" => "A generic class for showing a floating box in web pages that can have any content   in its body."
        ],
        "ServerErrView" => [
            "access-modifier" => "class",
            "summary" => "A page which is used to display exception information when it is thrown or   any other errors."
        ],
        "StarterPage" => [
            "access-modifier" => "class",
            "summary" => "A page which is shown to the framework users when the developer has not   configured any routes."
        ],
        "WebPage" => [
            "access-modifier" => "class",
            "summary" => "A base class that can be used to implement web pages."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;