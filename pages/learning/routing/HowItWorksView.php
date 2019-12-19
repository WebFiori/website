<?php
namespace webfiori\views\learn\routing;
use phpStructs\html\CodeSnippet;
use webfiori\entity\Page;
class HowItWorksView extends RoutingLearnView{
    public function __construct() {
        parent::__construct(
                array(
                    'title'=>'How Routing System Works',
                    'description'=>'A guide that will let you '
                    . 'know how routing sub-system works in '
                    . 'WebFiori Framework.',
                    'active-aside'=>2
                )
        );
        Page::document()->getHeadNode()->addCSS('themes/webfiori/css/code-theme.css');
        $sec = $this->createSection('Life Cycle of Request');
        Page::insert($sec);
        $sec->addChild($this->createParagraph('Every request is made to a website that '
                . 'uses Apache Server must go through a .htaccess file. '
                . 'it is simply the entry point of all incoming requests. ' ));
        $sec->addChild($this->createParagraph('WebFiori Framework uses a custom .htaccess file that '
                . 'has a rule to re-write the requested URL and '
                . 'redirect every request to the root framework class '
                . 'which is <a href="docs/webfiori/WebFiori" target="_blank">WebFiori</a>. '
                . 'If the content of the root .htaccess file is viewed, '
                . 'the re-write rule will look like the folowing:'));
        $code = new CodeSnippet();
        $code->setTitle('.htaccess Code');
        $code->setCode("\n"
                . 'ReWriteRule ^(.*)$ WebFiori.php [L,QSA]'
                . '');
        $sec->addChild($code);
        $sec->addChild($this->createParagraph('Once the request reaches the class <a href="docs/webfiori/WebFiori" target="_blank">WebFiori</a>, '
                . 'The initialization process of the framework will start. '
                . 'After the initialization is completed without any errors, '
                . 'the final stage is to route the request to its '
                . 'final destination.'));
        $sec->addChild($this->createParagraph('The routing process is completed by '
                . 'the class <a href="docs/webfiori/entity/router/Router" target="_blank">Router</a> '
                . 'The whole magic of routing is completed by sending the '
                . 'requested URL as a parameter to the method <a href="docs/webfiori/entity/router/Router#route" target="_blank">Router::route()</a>. '
                . 'If a route was created for the given URL, the request will be sent to it. '
                . 'If no route is found, a 404 error is generated.'));
        $sec->addChild($this->createParagraph('The following image summerize the whole routing process.'));
        $sec->addChild(($this->createImag('res/images/WebFioriRequestProcess.png', 'Routing Process.')));
        $this->setPrevTopicLink('learn/topics/routing', 'Routing');
        $this->setNextTopicLink('learn/topics/routing/class-Router', 'The Class \'Router\'');
        $this->displayView();
    }
}
new HowItWorksView();
