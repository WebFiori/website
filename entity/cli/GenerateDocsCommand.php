<?php

namespace webfiori\entity\cli;
use webfiori\entity\Logger;
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
            'path'=>'C:\Server\apache2\htdocs\wfr',
            'exclude-path'=>array(
                'C:\Server\apache2\htdocs\wfr\pages',
                'C:\Server\apache2\htdocs\wfr\apis',
                'C:\Server\apache2\htdocs\wfr\themes'
            ),
            'base-url'=> 'https://webfiori.com/docs',
            'theme'=>'WebFiori V108',
            'site-name'=>'WebFiori API Docs',
            'output-path'=>'C:\\Server\\apache2\\htdocs\\webfiori-docs\\pages\\apis',
            'route-root-folder'=>'apis',
            'is-dynamic'=>true
        ));
    }

}
