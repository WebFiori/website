<?php
namespace docGenerator\webfiori\framework;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\'.');
        $this->setTitle('Namespace \\webfiori\\framework');
        $nsObj = new NameSpaceAPI('\webfiori\framework',[
        "Access" => [
            "access-modifier" => "class",
            "summary" => "A class to manage user groups and privileges."
        ],
        "AutoLoader" => [
            "access-modifier" => "class",
            "summary" => "An autoloader class to load classes as needed during runtime."
        ],
        "ConfigController" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to modify basic configuration settings of   the web application."
        ],
        "DB" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to represent system database."
        ],
        "ExtendedWebServicesManager" => [
            "access-modifier" => "abstract class",
            "summary" => "An extension for the class 'WebServicesManager' that adds support for multi-language   response messages."
        ],
        "File" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a file."
        ],
        "Logger" => [
            "access-modifier" => "class",
            "summary" => "A class that is used to log messages to a file."
        ],
        "Page" => [
            "access-modifier" => "class",
            "summary" => "A class used to initialize view components."
        ],
        "Privilege" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a privilege."
        ],
        "PrivilegesGroup" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a set of privileges."
        ],
        "Theme" => [
            "access-modifier" => "abstract class",
            "summary" => "A base class that is used to construct web site UI."
        ],
        "ThemeLoader" => [
            "access-modifier" => "class",
            "summary" => "A class which has utility methods which are related to themes loading."
        ],
        "UploadFile" => [
            "access-modifier" => "class",
            "summary" => "A class which is used by the class 'Uploader' to represents uploaded files."
        ],
        "Uploader" => [
            "access-modifier" => "class",
            "summary" => "A helper class that is used to upload most types of files to the server's file system."
        ],
        "User" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a system user."
        ],
        "Util" => [
            "access-modifier" => "class",
            "summary" => "Framework utility class."
        ],
        "WebFioriApp" => [
            "access-modifier" => "class",
            "summary" => "The instance of this class is used to control basic settings of   the framework."
        ],
        "Config" => [
            "access-modifier" => "interface",
            "summary" => "An interface which holds basic methods that any application configuration   class must have."
        ],
        ], [
            'webfiori\framework\i18n',
            'webfiori\framework\ui',
            'webfiori\framework\session',
            'webfiori\framework\router',
            'webfiori\framework\middleware',
            'webfiori\framework\mail',
            'webfiori\framework\exceptions',
            'webfiori\framework\cron',
            'webfiori\framework\cron\webUI',
            'webfiori\framework\cron\webServices',
            'webfiori\framework\cli',
            'webfiori\framework\cli\writers',
            'webfiori\framework\cli\helpers',
            'webfiori\framework\cli\commands',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;