<?php
namespace docGenerator\webfiori\framework\cron;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\cron\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\cron');
        $nsObj = new NameSpaceAPI('\webfiori\framework\cron',[
        "AbstractJob" => [
            "access-modifier" => "abstract class",
            "summary" => "An abstract class that contains basic functionality for implementing cron   jobs."
        ],
        "Cron" => [
            "access-modifier" => "class",
            "summary" => "A class that is used to manage scheduled background jobs."
        ],
        "CronEmail" => [
            "access-modifier" => "class",
            "summary" => "A class which can be used to send an email regarding the status of   background job execution."
        ],
        "CronJob" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a cron job."
        ],
        "JobArgument" => [
            "access-modifier" => "class",
            "summary" => "A class that represents execution argument of a job."
        ],
        ], [
            'webfiori\framework\cron\webUI',
            'webfiori\framework\cron\webServices',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;