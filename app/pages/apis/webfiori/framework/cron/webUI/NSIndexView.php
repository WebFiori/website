<?php
namespace docGenerator\webfiori\framework\cron\webUI;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\framework\\cron\\webUI\'.');
        $this->setTitle('Namespace \\webfiori\\framework\\cron\\webUI');
        $nsObj = new NameSpaceAPI('\webfiori\framework\cron\webUI',[
        "CronLoginView" => [
            "access-modifier" => "class",
            "summary" => "A page which is used to show login form to enter login information to   access cron web interface."
        ],
        "CronTasksView" => [
            "access-modifier" => "class",
            "summary" => "A view to display information about CRON Jobs."
        ],
        "CronView" => [
            "access-modifier" => "class",
            "summary" => "A generic view for cron related operations."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;