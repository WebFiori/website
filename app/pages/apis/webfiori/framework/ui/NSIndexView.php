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
        "MessageBox" => [
            "access-modifier" => "class",
            "summary" => "A generic class for showing a floating box in web pages that can have any content   in its body."
        ],
        "NotFoundView" => [
            "access-modifier" => "class",
            "summary" => "A basic view which is used to display 404 HTTP error code and   messages."
        ],
        "ServerErrView" => [
            "access-modifier" => "class",
            "summary" => "A page which is used to display exception information when it is thrown or   any other errors."
        ],
        "ServiceUnavailableView" => [
            "access-modifier" => "class",
            "summary" => "A view which is show to tell the user that the framework isn't configured   yet."
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