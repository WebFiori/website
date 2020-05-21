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
            'path'=>'test',
            'route-to'=>'TestView.php'
        ]);
        Router::view([
            'path'=>'/learn/video',
            'route-to'=>'/video-tutorials/IndexView.php'
        ]);
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
        if(class_exists('\docGenerator\DocGeneratorRoutes')){
            \docGenerator\DocGeneratorRoutes::createRoutes();
        }
        ViewRoutes::createVideoTutLinks();
        Router::incSiteMapRoute();
    }
    private static function createVideoTutLinks() {
        Router::closure([
            'path'=>'/learn/video/intro',
            'route-to'=> function (){
                $view = new VideoTut('rxfy1f0PGHw','WebFiori Framework - 1 Introduction',0);
                $view->setDescription('First video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('First video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('In this tutorial, we introduce WebFiori Framework. In '
                        . 'addition to that, we introduce you to the tools that you need '
                        . 'in order to get started with developing websites using '
                        . 'the framework.');
                $view->displayView();
            }
        ]);
        Router::closure([
            'path'=>'/learn/video/installing-wamp-stack',
            'route-to'=> function (){
                $view = new VideoTut('5JhFgz8Iycw','WebFiori Framework - 2 Installing WAMP Stack',1);
                $view->setDescription('Second video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('Second video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('');
                $view->displayView();
            }
        ]);
        Router::closure([
            'path'=>'/learn/video/creating-first-project',
            'route-to'=> function (){
                $view = new VideoTut('h7tCZLfSvmE','WebFiori Framework - 3 - Creating WebFiori Framwork Based PHP Project',2);
                $view->setDescription('Third video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('Third video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('');
                $view->displayView();
            }
        ]);
        Router::closure([
            'path'=>'/learn/video/routing-p1',
            'route-to'=>function(){
                $view = new VideoTut('n7ZC-ti5XkM','WebFiori Framework - 4 - Routing Part 1',3);
                $view->setDescription('Fourth video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('Fourth video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('In this tutorial, we explain the very basic feature '
                        . 'which allows the framework to process requests. The feature '
                        . 'is called <a href="learn/topics/routing">Routing</a>.');
                $view->displayView();
            }
        ]);
        Router::closure([
            'path'=>'/learn/video/routing-p2',
            'route-to'=>function(){
                $view = new VideoTut('UEQhVRVG7b4','WebFiori Framework - 5 - Routing Part 2',4);
                $view->setDescription('Fifth video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('Fifth video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('In this tutorial, we explain routing in more details. '
                        . 'In addition, we explain the diffrent types of routes that can '
                        . 'be created and how to create them.');
                $view->displayView();
            }
        ]);
        Router::closure([
            'path'=>'/learn/video/views-p1',
            'route-to'=>function(){
                $view = new VideoTut('ny1nz_zfUs4','WebFiori Framework - 6 - Views Part 1',5);
                $view->setDescription('Sixth video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('Sixth video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('In this tutorial, we explain the very basic components of '
                        . 'building views (HTML Pages) in WebFiori Framework.');
                $view->displayView();
            }
        ]);
        //i5p3h6ZAZIs
        Router::closure([
            'path'=>'/learn/video/views-p2',
            'route-to'=>function(){
                $view = new VideoTut('sFdRiokvThg','WebFiori Framework - 7 - Views Part 2',6);
                $view->setDescription('Seventh video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('Seventh video tutorial on how to use WebFiori Framework.');
                $view->addToDescription('In this tutorial, We will be introducing the class "Page". '
                        . 'This class is used to create web pages.');
                $view->displayView();
            }
        ]);
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
            'path'=>'/learn/topics/routing/variables',
            'route-to'=>'/learning/routing/VariablesInRoutes.php'
        ]);
        Router::view([
            'path'=>'/learn/topics/routing/examples', 
            'route-to'=>'/learning/routing/RoutingExamplesView.php'
        ]);
        Router::view([
            'path'=>'learn/topics/routing/questions-and-answers',
            'route-to'=>'learning/routing/RoutingQA.php'
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
        
        //sending emails
        Router::view([
            'path'=>'learn/topics/mailing',
            'route-to'=>'learning/send-email/Index.php'
        ]);
        Router::view([
            'path'=>'learn/topics/mailing/classes',
            'route-to'=>'learning/send-email/MailingClassesView.php'
        ]);
        Router::view([
            'path'=>'learn/topics/mailing/send-email',
            'route-to'=>'learning/send-email/SendEmailView.php'
        ]);
        Router::view([
            'path'=>'learn/topics/mailing/attachments',
            'route-to'=>'learning/send-email/EmailAttachmentsView.php'
        ]);
        //file upload
        Router::view([
            'path'=>'learn/topics/file-upload',
            'route-to'=>'learning/file-upload/Index.php'
        ]);
        Router::view([
            'path'=>'learn/topics/file-upload/class-Uploader',
            'route-to'=>'learning/file-upload/ClassUploaderView.php'
        ]);
        Router::view([
            'path'=>'learn/topics/file-upload/example',
            'route-to'=>'learning/file-upload/UploadExampleView.php'
        ]);
        
        //CLI
        Router::view([
            'path'=>'learn/topics/cli',
            'route-to'=>'learning/cli/IntroView.php'
        ]);
        Router::view([
            'path'=>'learn/topics/cli/setup',
            'route-to'=>'learning/cli/CliSetup.php'
        ]);
        Router::view([
            'path'=>'learn/topics/cli/running-commands',
            'route-to'=>'learning/cli/RunningCommands.php'
        ]);
        Router::view([
            'path'=>'learn/topics/cli/implementing-custom-commands',
            'route-to'=>'learning/cli/CustomCommand.php'
        ]);
        Router::view([
            'path'=>'learn/topics/cli/using-args',
            'route-to'=>'learning/cli/UsingArgs.php'
        ]);
        //cron and background jobs
        Router::view([
            'path'=>'learn/topics/jobs-scheduling',
            'route-to'=>'learning/cron/Index.php'
        ]);
        Router::view([
            'path'=>'learn/topics/jobs-scheduling/main-classes',
            'route-to'=>'learning/cron/CronClasses.php'
        ]);
        Router::view([
            'path'=>'learn/topics/jobs-scheduling/job-as-closure',
            'route-to'=>'learning/cron/JobAsClosure.php'
        ]);
        Router::view([
            'path'=>'learn/topics/jobs-scheduling/job-implementation',
            'route-to'=>'learning/cron/ImplementingJob.php'
        ]);
        Router::view([
            'path'=>'learn/topics/jobs-scheduling/executing-jobs',
            'route-to'=>'learning/cron/ExecutingJobs.php'
        ]);
        Router::view([
            'path'=>'learn/topics/jobs-scheduling/args',
            'route-to'=>'learning/cron/JobArgs.php'
        ]);
        Router::view([
            'path'=>'learn/topics/jobs-scheduling/questions-and-answers',
            'route-to'=>'learning/cron/QuestionsAndAnswers.php'
        ]);
    }
}
