<?php
namespace docGenerator\webfiori\json;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class JsonTypesView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that contains constants which represents supported JSON datatypes.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class JsonTypes');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'JsonTypes', '\webfiori\json', 'A class that contains constants which represents supported JSON datatypes. '));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'ARR',
            'A constant that indicates that given datatype is of type array.',
            'A constant that indicates that given datatype is of type array. ',
            ),
            new AttributeDef(
            'const',
            '',
            'BOOL',
            'A constant that indicates that given datatype is of type boolean.',
            'A constant that indicates that given datatype is of type boolean. ',
            ),
            new AttributeDef(
            'const',
            '',
            'DOUBLE',
            'A constant that indicates that given datatype is of type double (or float).',
            'A constant that indicates that given datatype is of type double (or float). ',
            ),
            new AttributeDef(
            'const',
            '',
            'INT',
            'A constant that indicates that given datatype is of type integer.',
            'A constant that indicates that given datatype is of type integer. ',
            ),
            new AttributeDef(
            'const',
            '',
            'NUL',
            'A constant that indicates that given datatype is null.',
            'A constant that indicates that given datatype is null. ',
            ),
            new AttributeDef(
            'const',
            '',
            'OBJ',
            'A constant that indicates that given datatype is an object.',
            'A constant that indicates that given datatype is an object. ',
            ),
            new AttributeDef(
            'const',
            '',
            'STRING',
            'A constant that indicates that given datatype is of type string.',
            'A constant that indicates that given datatype is of type string. ',
            ),
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