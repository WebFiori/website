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
        $sec->addChild($this->createParagraph('Every web server must have some kind of a '
                . 'configuration file. In Apache server, the configuration files have '
                . 'the name "<a href="https://httpd.apache.org/docs/current/howto/htaccess.html" target="_blank">.htaccess</a>" '
                . 'and in IIS has the name "web.config". '
                . 'Usually, the configuration files will get executed before the actual code.' ));
        $sec->addChild($this->createParagraph('WebFiori Framework uses a custom .htaccess  file that '
                . 'has a rule to re-write the requested URL and '
                . 'redirect every request to the root framework class which is the class '
                . '"<a href="docs/webfiori/WebFiori" target="_blank">'
                . 'WebFiori</a>" which exist inside the file "WebFiori.php".'
                . 'If the content of the root .htaccess file is viewed, '
                . 'the re-write rule will look like the folowing:'));
        $code = new CodeSnippet();
        $code->setTitle('.htaccess Code');
        $code->setCode("\n"
                . 'ReWriteRule ^(.*)$ WebFiori.php [L,QSA]'
                . '');
        $sec->addChild($code);
        $sec->addChild($this->createParagraph(''
                . 'Also, the framework has its own custom web.config file that has a '
                . 'rule which is used to send requests to the class "WebFiori". If the content of '
                . 'the file web.config is viewed, it will look like the following:'
                . ''));
        $code2 = new CodeSnippet();
        $code2->setTitle('XML Code');
        $code2->setCode("<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<configuration>
    <system.webServer>
        <directoryBrowse enabled=\"true\" />
        <rewrite>
            <rules>
                <rule name=\"Imported Rule 2\" stopProcessing=\"true\">
                    <match url=\"^(.*)$\" ignoreCase=\"false\" />
                    <conditions>
                        <!--#send all trafic to the root framework file-->
                        <add input=\"{REQUEST_FILENAME}\" matchType=\"IsFile\" ignoreCase=\"false\" negate=\"true\" />
                    </conditions>
                    <action type=\"Rewrite\" url=\"WebFiori.php\" appendQueryString=\"true\" />
                </rule>
            </rules>
        </rewrite>
    </system.webServer>
</configuration>
");
        $sec->addChild($code2);
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
