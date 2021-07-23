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
        "CreateCommand" => [
            "access-modifier" => "class",
            "summary" => "A command which is used to automate some of the common tasks such as   creating table classes or controllers."
        ],
        "CreateCronJob" => [
            "access-modifier" => "class",
            "summary" => "A helper class which is used to help in creating cron jobs classes using CLI."
        ],
        "CreateMiddleware" => [
            "access-modifier" => "class",
            "summary" => "A helper class that works with the create command to create a middleware."
        ],
        "CreateTable" => [
            "access-modifier" => "class",
            "summary" => "A helper class for creating database table class."
        ],
        "CreateTableObj" => [
            "access-modifier" => "class",
            "summary" => "A helper class for creating database tables classes."
        ],
        "CreateWebService" => [
            "access-modifier" => "class",
            "summary" => "A helper class for creating web services classes."
        ],
        "CronCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI command which is related to executing   background jobs or performing operations on them."
        ],
        "HelpCommand" => [
            "access-modifier" => "class",
            "summary" => "A class that represents help command of framework's CLI."
        ],
        "ListCronCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI command which is used to list all scheduled cron jobs."
        ],
        "ListRoutesCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI command which is used to show a list of all added routes."
        ],
        "ListThemesCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI command which is used to list all registered themes."
        ],
        "SettingsCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI command which is used to show framework configuration."
        ],
        "TestRouteCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI Command which is used to test the result of routing to a specific   route."
        ],
        "UpdateTableCommand" => [
            "access-modifier" => "class",
            "summary" => "Description of UpdateTableCommand"
        ],
        "VersionCommand" => [
            "access-modifier" => "class",
            "summary" => "Description of VersionCommand"
        ],
        "AddCommand" => [
            "access-modifier" => "class",
            "summary" => "A command which is used to add a database connection or SMTP account."
        ],
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