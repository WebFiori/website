<?php
namespace docGenerator\webfiori\framework\cli\writers;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\cli\\writers\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\cli\\writers');
        $nsObj = new NameSpaceAPI('\webfiori\framework\cli\writers',[
        "ClassWriter" => [
            "access-modifier" => "class",
            "summary" => "A utility class which is used as a helper class with the command 'create'."
        ],
        "LangClassWriter" => [
            "access-modifier" => "class",
            "summary" => "A writer which is used to write any class that represents a language class."
        ],
        "QueryClassWriter" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to write query class from an instance of the class   'MySQLQuery'."
        ],
        "ServiceHolder" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to hold CLI created services temporary."
        ],
        "ThemeClassWriter" => [
            "access-modifier" => "class",
            "summary" => "Description of ThemeClassWriter"
        ],
        "WebServiceWriter" => [
            "access-modifier" => "class",
            "summary" => "A writer class which is used to create new web service class."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;