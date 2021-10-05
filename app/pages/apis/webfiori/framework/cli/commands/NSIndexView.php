<?php
namespace docGenerator\webfiori\framework\cli\commands;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\cli\\commands\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\cli\\commands');
        $nsObj = new NameSpaceAPI('\webfiori\framework\cli\commands',[
        "AddCommand" => [
            "access-modifier" => "class",
            "summary" => "A command which is used to add a database connection or SMTP account."
        ],
        "CreateCommand" => [
            "access-modifier" => "class",
            "summary" => "A command which is used to automate some of the common tasks such as   creating table classes or controllers."
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
        "RunSQLQueryCommand" => [
            "access-modifier" => "class",
            "summary" => "A command which can be used to execute SQL queries on   specific database."
        ],
        "SettingsCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI command which is used to show framework configuration."
        ],
        "TestRouteCommand" => [
            "access-modifier" => "class",
            "summary" => "A CLI Command which is used to test the result of routing to a specific   route."
        ],
        "UpdateSettingsCommand" => [
            "access-modifier" => "class",
            "summary" => "This class implements a CLI command which is used to update the settings which are   stored in the class 'AppConfing' of the application."
        ],
        "UpdateTableCommand" => [
            "access-modifier" => "class",
            "summary" => "Description of UpdateTableCommand"
        ],
        "VersionCommand" => [
            "access-modifier" => "class",
            "summary" => "Description of VersionCommand"
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;