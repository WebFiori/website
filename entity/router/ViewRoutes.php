<?php
/*
 * The MIT License
 *
 * Copyright 2019 Ibrahim, WebFiori Framework.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace webfiori\entity\router;
if(!defined('ROOT_DIR')){
    header("HTTP/1.1 404 Not Found");
    die('<!DOCTYPE html><html><head><title>Not Found</title></head><body>'
    . '<h1>404 - Not Found</h1><hr><p>The requested resource was not found on the server.</p></body></html>');
}
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
            'path'=>'/', 
            'route-to'=>'/WebFioriHome.php'
        ]);
        Router::view([
            'path'=>'/404', 
            'route-to'=>'/NotFound.php'
        ]);
        Router::view([
            'path'=>'/webfiori', 
            'route-to'=>'/WebFioriHome.php'
        ]);
        //Router::view('/docs', '/apis-1.0.0/webfiori/NSIndexView.php');
        Router::view([
            'path'=>'/learn', 
            'route-to'=>'/learning/Index.php'
        ]);
        Router::view([
            'path'=>'/download', 
            'route-to'=>'/DownloadView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/cron', 
            'route-to'=>'/learning/cron/Index.php'
        ]);
        Router::view([
            'path'=>'/contribute', 
            'route-to'=>'/ContributeView.php'
        ]);
        self::createHelpTopicsRoutes();
        \docGenerator\DocGeneratorRoutes::createRoutes();
        Router::incSiteMapRoute();
    }
    public static function createHelpTopicsRoutes() {
        //intro topics
        Router::view([
            'path'=>'/learn/topics/introduction', 
            'route-to'=>'/learning/intro/Index.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/architecture', 
            'route-to'=>'/learning/intro/FrameworkStructureView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/basic-usage', 
            'route-to'=>'/learning/intro/BasicUsageView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/more-about-views', 
            'route-to'=>'/learning/intro/MoreAboutViewsView.php'
        ]);
        //routing
        Router::view([
            'path'=>'/learn/topics/routing', 
            'route-to'=>'/learning/routing/Index.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/routing/how-it-works', 
            'route-to'=>'/learning/routing/HowItWorksView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/routing/class-Router', 
            'route-to'=>'/learning/routing/ClassRouterView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/routing/types-of-routes', 
            'route-to'=>'/learning/routing/TypesOfRoutesView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/routing/examples', 
            'route-to'=>'/learning/routing/RoutingExamplesView.php'
        ]);
        //theme creation tutorials
        Router::view([
            'path'=>'/learn/topics/themes', 
            'route-to'=>'/learning/themes/Index.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/class-Theme', 
            'route-to'=>'/learning/themes/ClassThemeView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/class-HTMLDoc', 
            'route-to'=>'/learning/themes/ClassHTMLDocView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/class-Page', 
            'route-to'=>'/learning/themes/ClassPageView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/class-HTMLNode', 
            'route-to'=>'/learning/themes/ClassHTMLNodeView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/class-HeadNode', 
            'route-to'=>'/learning/themes/ClassHeadNodeView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/create-simple-theme', 
            'route-to'=>'/learning/themes/CreateSimpleThemeView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/before-after-loaded', 
            'route-to'=>'/learning/themes/BeforeAfterEventsView.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/themes/the-method-createHTMLNode', 
            'route-to'=>'/learning/themes/MethodCreateNodeView.php'
        ]);
    }
}
