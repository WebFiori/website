<?php
namespace docGenerator\webfiori\framework\exceptions;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\exceptions\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\exceptions');
        $nsObj = new NameSpaceAPI('\webfiori\framework\exceptions',[
        "ClassLoaderException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown in case there was an exception in   initializing the autoloader or while trying to load a class."
        ],
        "FileException" => [
            "access-modifier" => "class",
            "summary" => "An exception that is thrown if one of file operations did not   go well"
        ],
        "InitializationException" => [
            "access-modifier" => "class",
            "summary" => "An exception that might be thrown during initialization stage."
        ],
        "InvalidCRONExprException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown in case of invalid CRON expression was provided   when initializing CRON job."
        ],
        "MissingLangException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown when a translation was not found or no object   of type 'Language' was found for a language."
        ],
        "NoSuchThemeException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown to indicate that a theme was   not found when trying to load it."
        ],
        "RoutingException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown to indicate that something went wrong when   sending user request to a specific route."
        ],
        "SMTPException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown to indicate that something went wrong when   sending an email message using SMTP."
        ],
        "SessionException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown by the sessions manager to indicate   that something went wrong during sessions management."
        ],
        "UIException" => [
            "access-modifier" => "class",
            "summary" => "An exception which is thrown if anything went wrong during the   process of loading a theme or doing any UI related operation."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;