<?php

namespace app\ini\routes;

use webfiori\http\Response;
use webfiori\framework\Util;
use webfiori\framework\router\Router;
/**
 * A class that only has one method to initiate some of system routes.
 * The class is meant to only initiate the routes which uses the method 
 * Router::closure().
 * @author Ibrahim
 * @version 1.0
 */
class ClosureRoutes {
    /**
     * Create all closure routes. Include your own here.
     * @since 1.0
     */
    public static function create() {
        $arrayOfParams = ['WebFiori Framework'];
        Router::closure([
            'path' => '/closure',
            'closure-params' => $arrayOfParams,
            'route-to' => function($params)
            {
                $b = new \MDIndexBuilder('webfiori', 'docs', [
                    'introduction',
                    
                    'installation',
                    'folder-structure',
                    'basic-usage',
                    'routing',
                    'class-response',
                    'web-pages',
                    'ui-package',
                    'themes',
                    'uploading-files',
                    'sending-emails',
                    'command-line-interface',
                    'sessions-management',
                    'webfiori-json',
                    'database',
                    'web-services',
                    'middleware',
                    'background-tasks',
                    'i18n',
                    'global-constants',
                    'coding-standards'
                ]);
                $b->createJson();
                Util::print_r($b->getInfoArray(), false);
            }
        ]);
    }
}
