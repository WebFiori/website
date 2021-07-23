<?php
namespace docGenerator\webfiori\ini;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InitCronView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that has one method to initialize cron jobs.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class InitCron');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'InitCron', '\webfiori\ini', 'A class that has one method to initialize cron jobs. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'init',
                'access-modifier' => 'public static function',
                'summary' => 'A method that can be used to initialize cron jobs.',
                'description' => 'A method that can be used to initialize cron jobs. The main aim of this method is to give the developer a way to register       the jobs which are created outside the folder \'app/jobs\'. To register       any job, use the method Cron::scheduleJob().',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;