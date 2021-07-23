<?php
namespace docGenerator\webfiori\framework\cron;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CronEmailView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which can be used to send an email regarding the status of   background job execution.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CronEmail');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CronEmail', '\webfiori\framework\cron', 'A class which can be used to send an email regarding the status of   background job execution. This class must be only used in one of the abstract methods of a   background job since using it while no job is active will have no   effect.    The email that will be sent will contain technical information about   the job in addition to a basic log file that shows execution steps. Also,   it will contain any log messages which was added by using the method   \'Cron::log()\'.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$sendAccName' => [
                        'type' => 'string',
                        'description' => 'The name of SMTP account that will be       used to send the message. Note that it must be exist in the class       \'MailConfig\'.',
                        'optional' => false,
                    ],
                    '$receivers' => [
                        'type' => 'array',
                        'description' => 'An associative array of receivers. The       indices are the addresses of the receivers and the values are the       names of the receivers (e.g. \'xy',
                        'optional' => false,
                    ],
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