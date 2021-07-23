<?php
namespace docGenerator\webfiori\framework\exceptions;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class ClassLoaderExceptionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An exception which is thrown in case there was an exception in   initializing the autoloader or while trying to load a class.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class ClassLoaderException');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'ClassLoaderException', '\webfiori\framework\exceptions', 'An exception which is thrown in case there was an exception in   initializing the autoloader or while trying to load a class. '));
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