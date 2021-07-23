<?php
namespace docGenerator\webfiori\ini;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InitPrivilegesView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that has one method which is used to initialize privileges.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class InitPrivileges');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'InitPrivileges', '\webfiori\ini', 'A class that has one method which is used to initialize privileges. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'init',
                'access-modifier' => 'public static function',
                'summary' => 'Initialize user groups and privileges.',
                'description' => 'Initialize user groups and privileges. The developer can modify the body of this method to create user groups       and assign privileges to each group. To create new group, use the       method Access::newGroup(). To create a privilege in a group, use the       method Access::newPrivilege().',
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