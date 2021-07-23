<?php
namespace docGenerator\webfiori\ini;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class InitCliCommandsView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that contains one method for registering custom CLI   commands.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class InitCliCommands');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'InitCliCommands', '\webfiori\ini', 'A class that contains one method for registering custom CLI   commands. '));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => 'init',
                'access-modifier' => 'public static function',
                'summary' => 'Register user defined CLI commands.',
                'description' => 'Register user defined CLI commands. This method can be used by the developers to add any custom       CLI command that they have created that does not exist in the folder       \'app/commands\'. Assuming that we have a       custom command with the name \'ProcessEmailCommand\', then it       can be registered as follows:<br/>      <code>      CLI::register(new ProcessEmailCommand());      </code>',
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