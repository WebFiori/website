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
            "summary" => "A class that represents an email account which is used to send or receive messages."
        ],
        "SocketMailer" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to send email messages using sockets."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;