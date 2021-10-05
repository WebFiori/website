<?php
namespace docGenerator\webfiori\framework\cron\webUI;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CronTasksViewView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A view to display information about CRON Jobs.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class CronTasksView');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'CronTasksView', '\webfiori\framework\cron\webUI', 'A view to display information about CRON Jobs. The view will show a table of all scheduled cron jobs. The table will include   the following information about each job:  <ul>  <li>The name of the job.</li>  <li>Its cron expression.</li>  <li>  5 columns that shows if it is time to execute the job or not   (Yes, No). The columns are:  <ul>  <li>Is Minute: Is it current minute in the hour to run the job.</li>  <li>Is Hour: Is it current hour in the day to run the job.</li>  <li>Is Day of Month: Is it the date in month to run the job.</li>  <li>Is month: Is it current month in year to run the job.</li>  <li>Is day of week: Is it current day of week to run the job.</li>  </ul>  </li>  </ul>  In addition to that, the view contains controls to make the page refresh   every one minute. Also, there is a section that shows execution logs   of cron jobs.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the view.',
                'description' => 'Creates new instance of the view. ',
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