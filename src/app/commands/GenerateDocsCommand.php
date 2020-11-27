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
            'path'=>'C:\Server\apache2\htdocs\framework\src',
            'exclude-path'=>array(
                'C:\Server\apache2\htdocs\framework\src\pages',
                'C:\Server\apache2\htdocs\framework\src\apis',
                'C:\Server\apache2\htdocs\framework\src\themes',
                'C:\Server\apache2\htdocs\framework\src\app'
            ),
            'base-url'=> 'https://webfiori.com/docs',
            'theme'=>'WebFiori V108',
            'site-name'=>'WebFiori API Docs',
            'output-path'=>'C:\\Server\\apache2\\htdocs\\webfiori-docs\\src\\app\\pages\\apis',
            'route-root-folder'=>'apis',
            'is-dynamic'=>true
        ));
    }

}
