<?php
namespace docGenerator\webfiori\framework\cli\commands;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CronCommandView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A CLI command which is related to executing   background jobs or performing operations on them.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CronCommand');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CronCommand', '\webfiori\framework\cli\commands', 'A CLI command which is related to executing   background jobs or performing operations on them. .'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. The command will have name \'--cron\'. This command is used to       perform operations on background jobs. In addition to that,       it will have the following arguments:      <ul>      <li><b>p</b>: Cron password.</li>      <li><b>check</b>: Run check if it is time to execute a job.</li>      <li><b>force</b>: Force execution of a job given its name.</li>      <li><b>job-name</b>: The job that will be forced to execute or       its arguments will be shown.</li>      <li><b>show-job-args</b>: Show arguments of a job.</li>      <li><b>show-log</b>: Display execution log after execution is finished.</li>      </ul>',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'exec',
                'access-modifier' => 'public function',
                'summary' => 'Execute the command.',
                'description' => 'Execute the command. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the command executed without any errors, the       method will return 0. Other than that, it will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
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