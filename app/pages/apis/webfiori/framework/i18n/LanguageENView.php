<?php
namespace docGenerator\webfiori\framework\i18n;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class LanguageENView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that contain some of the common language labels in Arabic.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class LanguageEN');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'LanguageEN', '\webfiori\framework\i18n', 'A class that contain some of the common language labels in Arabic. So far, the class has the following variables:  <ul>  <li>general/week-day: The names of week days. \'d1\' for Monday to \'d7\' for Sunday.</li>  <li>general/g-month: Names of months in Gregorian calendar. \'m1\' for January   up to \'m12\' for December.</li>  <li>general/action: A set of common actions that are usually performed   by users. The actions are:  <ul>  <li>cancel</li>  <li>back</li>  <li>save</li>  <li>remove</li>  <li>delete</li>  <li>print</li>  <li>next</li>  <li>previous</li>  <li>skip</li>  <li>connect</li>  <li>finish</li>  </ul>  </li>  <li>general/status: A set of common statuses for application elements   after performing specific action. The actions are:  <ul>  <li>wait</li>  <li>loading</li>  <li>checking</li>  <li>validating</li>  <li>loaded</li>  <li>saving</li>  <li>saved</li>  <li>removing</li>  <li>removed</li>  <li>deleting</li>  <li>deleted</li>  <li>printing</li>  <li>printed</li>  <li>connecting</li>  <li>connected</li>  <li>disconnected</li>  </ul>  </li>  <li>general/error: A set of common error messages The errors are:  <ul>  <li>dbError</li>  <li>dbConnectErr</li>  <li>save</li>  <li>remove</li>  <li>delete</li>  <li>print</li>  <li>connect</li>  </ul>  </li>  <li>general/http-codes: A set that contains most common HTTP codes.   inside each code, there are 3 items:  <ul>  <li>code: The actual code such as 200 or 404 as an integer.</li>  <li>type: The type of the code such as \'Ok\' or \'Not Authorized\'.</li>  <li>message: The meaning of the code in more details.</li>  </ul>  So far, the available codes are:  <ul>  <li>200</li>  <li>201</li>  <li>400</li>  <li>401</li>  <li>403</li>  <li>404</li>  <li>405</li>  <li>408</li>  <li>415</li>  <li>500</li>  <li>501</li>  <li>505</li>  </ul>  </li>  <ul>'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => '',
                'description' => ' ',
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