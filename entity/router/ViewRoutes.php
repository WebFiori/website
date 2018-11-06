<?php

/*
 * The MIT License
 *
 * Copyright 2018 ibrah.
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

/**
 * A class that only has a function to create views routes.
 *
 * @author Ibrahim
 * @version 1.0
 */
class ViewRoutes {
    /**
     * Create all views routes. Include your own here.
     * @since 1.0
     */
    public static function create(){
        Router::view('/', '/default.html');
        Router::view('/example', '/example-page.php');
        Router::view('/api', '/api.php');
        $apiHelpRoutes = self::getAPIViewsRoutes();
        foreach ($apiHelpRoutes['class'] as $route){
            Router::closure($route['requested-url'], function ($route){
                require ROOT_DIR.'/pages'.$route['file'];
                new $route['class-name']();
            },$route);
        }
    }
    public static function getAPIViewsRoutes() {
        $base = '/docs/1.0';
        $routesArr = array(
            'package-index'=>array(),
            'class'=>array()
        );
        $dirsStack = new Stack();
        $root = array(
            'long-name'=>ROOT_DIR.'/pages/api-docs/1.0',
            'parent'=>'',
            'package'=>''
        );
        $dirsStack->push($root);
        while($root = $dirsStack->pop()){
            $subDirs = scandir($root['long-name']);
            foreach ($subDirs as $subDir){
                if($subDir != '.' && $subDir != '..'){
                    $dirLongName = $root['long-name'].'/'.$subDir;
                    if(Util::isDirectory($dirLongName)){
                        if(strlen($root['parent']) > 0){
                            $toPush = array(
                                'long-name'=>$dirLongName,
                                'parent'=>$root['parent'].'/'.$subDir,
                                'package'=>$root['parent'].'/'.$subDir
                            );
                        }
                        else{
                            $toPush = array(
                                'long-name'=>$dirLongName,
                                'parent'=>$subDir,
                                'package'=>$subDir
                            );
                        }
                        $dirsStack->push($toPush);
                    }
                    else{
                        if(strlen($root['parent']) > 0){
                            $cName = str_replace('.php','',$subDir);
                            if($cName == 'pIndex'){
                                $routesArr['package-index'][] = array(
                                    'file'=>'/api-docs/1.0/'.$root['parent'].'/'.$subDir,
                                    'requested-url'=>$base.'/'.$root['parent'],
                                    'package'=>$root['package'],
                                    'class-name'=>$cName
                                );
                            }
                            else{
                                $routesArr['class'][] = array(
                                    'file'=>'/api-docs/1.0/'.$root['parent'].'/'.$subDir,
                                    'requested-url'=>$base.'/'.$root['parent'].'/'.str_replace('APIs.php','',$subDir),
                                    'package'=>$root['package'],
                                    'class-name'=>$cName
                                );
                            }
                        }
                        else{
                            $cName = str_replace('.php','',$subDir);
                            if($cName == 'pIndex'){
                                $routesArr['package-index'][] = array(
                                    'file'=>'/api-docs/1.0/'.$subDir,
                                    'requested-url'=>$base,
                                    'package'=>$root['package'],
                                    'class-name'=>$cName
                                );
                            }
                            else{
                                $routesArr['class'][] = array(
                                    'file'=>'/api-docs/1.0/'.$subDir,
                                    'requested-url'=>$base.'/'.str_replace('APIs.php','',$subDir),
                                    'package'=>$root['package'],
                                    'class-name'=>$cName
                                );
                            }
                        }
                    }
                }
            }
        }
        return $routesArr;
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
