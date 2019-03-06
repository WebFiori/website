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
    header("HTTP/1.1 403 Forbidden");
    die(''
        . '<!DOCTYPE html>'
        . '<html>'
        . '<head>'
        . '<title>Forbidden</title>'
        . '</head>'
        . '<body>'
        . '<h1>403 - Forbidden</h1>'
        . '<hr>'
        . '<p>'
        . 'Direct access not allowed.'
        . '</p>'
        . '</body>'
        . '</html>');
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
        Router::view('/', '/WebFioriHome.php');
        Router::view('/404', '/NotFound.php');
        Router::view('/test-theme', '/ThemeTestPage.php');
        Router::view('/webfiori', '/WebFioriHome.php');
        Router::view('/docs', '/apis-1.0.0/webfiori/NSIndexView.php');
        Router::view('/learn', '/learning/Index.php');
        Router::view('/download', '/DownloadView.php');
        Router::view('/learn/topics/cron', '/learning/cron/Index.php');
        Router::view('/contribute', '/ContributeView.php');
        self::createHelpTopicsRoutes();
        //\docGenerator\DocGeneratorRoutes::createRoutes();
    }
    public static function createHelpTopicsRoutes() {
        //intro topics
        Router::view('/learn/topics/introduction', '/learning/intro/Index.php');
        Router::view('/learn/topics/architecture', '/learning/intro/FrameworkStructureView.php');
        Router::view('/learn/topics/basic-usage', '/learning/intro/BasicUsageView.php');
        Router::view('/learn/topics/more-about-views', '/learning/intro/MoreAboutViewsView.php');
        //routing
        Router::view('/learn/topics/routing', '/learning/routing/Index.php');
        Router::view('/learn/topics/routing/how-it-works', '/learning/routing/HowItWorksView.php');
        Router::view('/learn/topics/routing/class-Router', '/learning/routing/ClassRouterView.php');
        Router::view('/learn/topics/routing/types-of-routes', '/learning/routing/TypesOfRoutesView.php');
        Router::view('/learn/topics/routing/examples', '/learning/routing/RoutingExamplesView.php');
        //theme creation tutorials
        Router::view('/learn/topics/themes', '/learning/themes/Index.php');
        Router::view('/learn/topics/themes/class-Theme', '/learning/themes/ClassThemeView.php');
        Router::view('/learn/topics/themes/class-HTMLDoc', '/learning/themes/ClassHTMLDocView.php');
        Router::view('/learn/topics/themes/class-Page', '/learning/themes/ClassPageView.php');
        Router::view('/learn/topics/themes/class-HTMLNode', '/learning/themes/ClassHTMLNodeView.php');
        Router::view('/learn/topics/themes/class-HeadNode', '/learning/themes/ClassHeadNodeView.php');
        Router::view('/learn/topics/themes/create-simple-theme', '/learning/themes/CreateSimpleThemeView.php');
    }
    /**
     * A test for creating a site map from views URIs
     * @return string An XML string.
     * @since 1.0
     */
    public static function createSiteMap() {
        $urlSet = new HTMLNode('urlset');
        $urlSet->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $urlSet->setAttribute('xmlns:xhtml', 'http://www.w3.org/1999/xhtml');
        $routes = Router::get()->getRoutes();
        foreach ($routes as $route){
            if($route->getType() == Router::VIEW_ROUTE){
                $url = new HTMLNode('url');
                $loc = new HTMLNode('loc');
                $loc->addChild(HTMLNode::createTextNode($route->getUri()));
                $url->addChild($loc);
                $urlSet->addChild($url);
            }
        }
        $retVal = '<?xml version="1.0" encoding="UTF-8"?>';
        $retVal .= $urlSet->toHTML();
        return $retVal;
    }
}
