<?php
namespace docGenerator\webfiori\framework\session;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class SessionsTableView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class which represents the database table \'`sessions`\'.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class SessionsTable');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'SessionsTable', '\webfiori\framework\session', 'A class which represents the database table \'`sessions`\'. The table which is associated with this class will have the following columns:  <ul>  <li><b>s-id</b>: Name in database: \'`s_id`\'. Data type: \'varchar\'.</li>  <li><b>started-at</b>: Name in database: \'`started_at`\'. Data type: \'timestamp\'.</li>  <li><b>last-used</b>: Name in database: \'`last_used`\'. Data type: \'datetime\'.</li>  <li><b>session-data</b>: Name in database: \'`session_data`\'. Data type: \'mediumtext\'.</li>  </ul>'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
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