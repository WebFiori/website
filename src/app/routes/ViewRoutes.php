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
namespace webfiori\framework\router;
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
            'path'=>'/learn/video',
            'route-to'=>'/video-tutorials/IndexView.php'
        ]);
        Router::view([
            'path'=>'/', 
            'route-to'=>'/WebFioriHome.php'
        ]);
        Router::view([
            'path'=>'/download', 
            'route-to'=>'/DownloadView.php'
        ]);
        Router::view([
            'path'=>'/webfiori', 
            'route-to'=>'/WebFioriHome.php'
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
            'path'=>'/contribute', 
            'route-to'=>'/ContributeView.php'
        ]);

        if(class_exists('\docGenerator\DocGeneratorRoutes')){
            \docGenerator\DocGeneratorRoutes::createRoutes();
        }
        Router::incSiteMapRoute();
    }
}
