<?php

namespace app\ini\routes;

use webfiori\framework\router\RouteOption;
use webfiori\framework\router\Router;
use webfiori\views\WebFioriHome;

class PagesRoutes {
    /**
     * Initialize system routes.
     * 
     * @since 1.0
     */
    public static function create() {
        Router::page([
            RouteOption::PATH => '/',
            RouteOption::TO => WebFioriHome::class
        ]);
        Router::page([
            RouteOption::PATH => '/download',
            RouteOption::TO => \webfiori\views\DownloadView::class
        ]);
        Router::page([
            RouteOption::PATH => '/contribute',
            RouteOption::TO => \webfiori\views\ContributeView::class
        ]);
    }
}
