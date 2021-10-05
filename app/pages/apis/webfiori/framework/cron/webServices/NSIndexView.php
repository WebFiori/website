<?php
namespace docGenerator\webfiori\framework\cron\webServices;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\cron\\webServices\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\cron\\webServices');
        $nsObj = new NameSpaceAPI('\webfiori\framework\cron\webServices',[
        "CronLoginService" => [
            "access-modifier" => "class",
            "summary" => "An API which is used to authenticate users to access CRON web interface."
        ],
        "CronLogoutService" => [
            "access-modifier" => "class",
            "summary" => "A service which is used to logout user in CRON web interface."
        ],
        "CronServicesManager" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to manage CRON jobs related services."
        ],
        "ForceCronExecutionService" => [
            "access-modifier" => "class",
            "summary" => "A web service which is used to force job execution using web interface."
        ],
        "GetJobsService" => [
            "access-modifier" => "class",
            "summary" => "A web service which is used to fetch a list of all scheduled jobs."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;