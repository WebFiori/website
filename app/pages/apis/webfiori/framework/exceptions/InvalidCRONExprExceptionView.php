<?php
namespace docGenerator\webfiori\framework\exceptions;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InvalidCRONExprExceptionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An exception which is thrown in case of invalid CRON expression was provided   when initializing CRON job.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class InvalidCRONExprException');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'InvalidCRONExprException', '\webfiori\framework\exceptions', 'An exception which is thrown in case of invalid CRON expression was provided   when initializing CRON job. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;