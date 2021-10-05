<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\cli\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\cli');
        $nsObj = new NameSpaceAPI('\webfiori\framework\cli',[
        "CLI" => [
            "access-modifier" => "class",
            "summary" => "A class which adds basic support for running the framework through   command line interface (CLI)."
        ],
        "CLICommand" => [
            "access-modifier" => "abstract class",
            "summary" => "An abstract class that can be used to create new CLI command."
        ],
        "StdIn" => [
            "access-modifier" => "class",
            "summary" => "A class that implements default standard output for command line interface."
        ],
        "StdOut" => [
            "access-modifier" => "class",
            "summary" => "A class that implements default standard output for command line interface."
        ],
        "InputStream" => [
            "access-modifier" => "interface",
            "summary" => "An interface that can be used to implement input streams at which CLI  can read input from."
        ],
        "OutputStream" => [
            "access-modifier" => "interface",
            "summary" => "An interface that can be used to implement output streams at which CLI  can send output to."
        ],
        ], [
            'webfiori\framework\cli\writers',
            'webfiori\framework\cli\helpers',
            'webfiori\framework\cli\commands',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;