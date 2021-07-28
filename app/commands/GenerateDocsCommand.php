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
        //    $r = new APIReader(ROOT_DIR.'/entity/jsonx/JsonI.php');
        //    Util::print_r($r->getParsedInfo());
        $reader = new DocGenerator(array(
            'path'=>'C:\Server\apache2\htdocs\website\vendor',
            'exclude-path'=>array(
                'C:\Server\apache2\htdocs\website\app',
                'C:\Server\apache2\htdocs\website\themes',
                'C:\Server\apache2\htdocs\website\vendor\erusev',
                'C:\Server\apache2\htdocs\website\vendor\composer',
            ),
            'base-url'=> 'https://webfiori.com/docs',
            'theme'=> NewFioriAPI::class,
            'site-name'=>'WebFiori API Docs',
            'output-path'=>'C:\\Server\\apache2\\htdocs\\website\\app\\pages\\apis',
            'route-root-folder'=>'apis',
            'is-dynamic'=>true
        ));
    }

}
return __NAMESPACE__;