<?php

namespace app\ini\routes;

use webfiori\framework\router\Router;
use webfiori\examples\views\MdPage;
/**
 * A class that only has one method to initiate some of system routes.
 * The class is meant to only initiate the routes which uses the method 
 * Router::view().
 * @author Ibrahim
 * @version 1.0
 */

class ViewRoutes {
    /**
     * Create all views routes. Include your own here.
     * @since 1.0
     */
    public static function create(){
        
        Router::view([
            'path'=> '/', 
            'route-to' => \webfiori\views\WebFioriHome::class
        ]);
        Router::view([
            'path' => '/download', 
            'route-to' => \webfiori\views\DownloadView::class
        ]);
        Router::view([
            'path' => '/webfiori', 
            'route-to' => \webfiori\views\WebFioriHome::class
        ]);
        Router::closure([
            'path'=>'/learn', 
            'route-to'=>function () {
                $mdPage = new MdPage('WebFiori', 'docs', 'index');
                $mdPage->render();
            }
        ]);
        Router::closure([
            'path'=>'/learn/{path}', 
            'route-to'=>function () {
                $mdPage = new MdPage('WebFiori', 'docs', Router::getVarValue('path'));
                $mdPage->render();
            }
        ]);
        Router::view([
            'path' => '/contribute', 
            'route-to' => \webfiori\views\ContributeView::class
        ]);

        if(class_exists('\docGenerator\DocGeneratorRoutes')){
            Router::redirect('docs', 'docs/webfiori');
            Router::page([
                'path' => 'docs/webfiori',
                'route-to' => \docGenerator\webfiori\framework\NSIndexView::class
            ]);
            \docGenerator\DocGeneratorRoutes::createRoutes();
        }
        Router::incSiteMapRoute();
    }
}
