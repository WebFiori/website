<?php
namespace docGenerator\app\apis;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class AddUserServiceView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that contains the implementation of the web service \'add-user\'.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class AddUserService');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'AddUserService', '\app\apis', 'A class that contains the implementation of the web service \'add-user\'. This service has the following parameters:  <ul>  <li><b>username</b>: Data type: string.</li>  <li><b>email</b>: Data type: email.</li>  <li><b>password</b>: Data type: string.</li>  </ul>'));
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
            new FunctionDef([
                'name' => 'isAuthorized',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the client is authorized to call a service or not.',
                'description' => 'Checks if the client is authorized to call a service or not. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the client is authorized, the method will return true.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'processRequest',
                'access-modifier' => 'public function',
                'summary' => 'Process the request.',
                'description' => 'Process the request. ',
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