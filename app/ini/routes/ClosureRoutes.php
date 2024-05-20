<?php

namespace app\ini\routes;

use webfiori\examples\views\MdPage;
use webfiori\framework\router\RouteOption;
use webfiori\framework\router\Router;

class ClosureRoutes {
    /**
     * Initialize system routes.
     * 
     * @since 1.0
     */
    public static function create() {
        Router::closure([
            RouteOption::PATH => 'learn',
            RouteOption::TO => function () {
                $p = new MdPage('webfiori', 'docs', 'index', 'main');
                $p->render();
            },
        ]);
        Router::closure([
            RouteOption::PATH => 'learn/{file}',
            RouteOption::TO => function () {
                $p = new MdPage('webfiori', 'docs', Router::getParameterValue('file'), 'main');
                $p->render();
            }
        ]);
    }
}
