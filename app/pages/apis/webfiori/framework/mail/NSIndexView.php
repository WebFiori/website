<?php
namespace docGenerator\webfiori\framework\mail;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\mail\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\mail');
        $nsObj = new NameSpaceAPI('\webfiori\framework\mail',[
        "EmailMessage" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to write HTML formatted Email messages."
        ],
        "SMTPAccount" => [
            "access-modifier" => "class",
            "summary" => "A class that represents an SMTP account which is used to connect to SMTP server."
        ],
        "SMTPServer" => [
            "access-modifier" => "class",
            "summary" => "A class which can be used to connect to SMTP server and execute commands on it."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;