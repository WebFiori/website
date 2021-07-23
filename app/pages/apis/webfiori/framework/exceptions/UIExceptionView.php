<?php
namespace docGenerator\webfiori\framework\exceptions;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class UIExceptionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An exception which is thrown if anything went wrong during the   process of loading a theme or doing any UI related operation.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class UIException');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'UIException', '\webfiori\framework\exceptions', 'An exception which is thrown if anything went wrong during the   process of loading a theme or doing any UI related operation. '));
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