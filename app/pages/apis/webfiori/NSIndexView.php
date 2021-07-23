<?php
namespace docGenerator\webfiori;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\'.');
        $this->setTitle('Namespace \\webfiori');
        $nsObj = new NameSpaceAPI('\webfiori',[
        "Index" => [
            "access-modifier" => "class",
            "summary" => "The entry point of all requests."
        ],
        ], [
            'webfiori\ui',
            'webfiori\ui\exceptions',
            'webfiori\json',
            'webfiori\http',
            'webfiori\database',
            'webfiori\database\mysql',
            'webfiori\collections',
            'webfiori\framework',
            'webfiori\framework\i18n',
            'webfiori\framework\ui',
            'webfiori\framework\session',
            'webfiori\framework\router',
            'webfiori\framework\middleware',
            'webfiori\framework\mail',
            'webfiori\framework\exceptions',
            'webfiori\framework\cron',
            'webfiori\framework\cron\webServices',
            'webfiori\framework\cli',
            'webfiori\examples',
            'webfiori\jobs',
            'webfiori\ini',
            'webfiori\examples\webApis',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;