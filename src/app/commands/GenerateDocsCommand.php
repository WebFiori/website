<?php

namespace webfiori\framework\cli;
use webfiori\framework\Logger;
use webfiori\apiParser\DocGenerator;
use webfiori\theme\NewFioriAPI;
class GenerateDocsCommand extends CLICommand{
    public function __construct() {
        parent::__construct('--generate-docs', [], '');
    }
    public function exec() {
        Logger::enabled(true);
        //    $r = new APIReader(ROOT_DIR.'/entity/jsonx/JsonI.php');
        //    Util::print_r($r->getParsedInfo());
        $reader = new DocGenerator(array(
            'path'=>'C:\Server2\apache2\htdocs\webfiori\src',
            'exclude-path'=>array(
                'C:\Server2\apache2\htdocs\webfiori\src\app\pages',
                'C:\Server2\apache2\htdocs\webfiori\src\app\apis',
                'C:\Server2\apache2\htdocs\webfiori\src\themes',
                'C:\Server2\apache2\htdocs\webfiori\src\app\database',
                'C:\Server2\apache2\htdocs\webfiori\src\app\middleware',
                'C:\Server2\apache2\htdocs\webfiori\src\app\storage',
                
            ),
            'base-url'=> 'http://localhost:8989/docs',
            'theme'=> NewFioriAPI::class,
            'site-name'=>'WebFiori API Docs',
            'output-path'=>'C:\\Server2\\apache2\\htdocs\\webfiori-docs\\src\\app\\pages\\apis',
            'route-root-folder'=>'apis',
            'is-dynamic'=>true
        ));
    }

}
return __NAMESPACE__;