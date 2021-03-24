<?php

namespace webfiori\framework\cli;
use webfiori\framework\Logger;
use webfiori\apiParser\DocGenerator;

class GenerateDocsCommand extends CLICommand{
    public function __construct() {
        parent::__construct('--generate-docs', [], '');
    }
    public function exec() {
        Logger::enabled(true);
        //    $r = new APIReader(ROOT_DIR.'/entity/jsonx/JsonI.php');
        //    Util::print_r($r->getParsedInfo());
        $reader = new DocGenerator(array(
            'path'=>'C:\Server\apache2\htdocs\webfiori\src',
            'exclude-path'=>array(
                'C:\Server\apache2\htdocs\webfiori\src\app\pages',
                'C:\Server\apache2\htdocs\webfiori\src\app\apis',
                'C:\Server\apache2\htdocs\webfiori\src\themes',
                //'C:\Server\apache2\htdocs\webfiori\src\app'
            ),
            'base-url'=> 'https://webfiori.com/docs',
            'theme'=>'New Fiori API',
            'site-name'=>'WebFiori API Docs',
            'output-path'=>'C:\\Server\\apache2\\htdocs\\website\\src\\app\\pages\\apis',
            'route-root-folder'=>'apis',
            'is-dynamic'=>true
        ));
    }

}
return __NAMESPACE__;