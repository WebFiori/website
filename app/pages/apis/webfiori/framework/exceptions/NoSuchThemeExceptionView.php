<?php
namespace docGenerator\webfiori\framework\exceptions;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class NoSuchThemeExceptionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An exception which is thrown to indicate that a theme was   not found when trying to load it.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class NoSuchThemeException');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'NoSuchThemeException', '\webfiori\framework\exceptions', 'An exception which is thrown to indicate that a theme was   not found when trying to load it. '));
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