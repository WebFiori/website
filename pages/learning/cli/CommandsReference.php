<?php

namespace webfiori\views\learn\cli;

use webfiori\entity\cli\CLICommand;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
use phpStructs\html\TableRow;
use phpStructs\html\UnorderedList;
use webfiori\entity\cli\CLI;
class CommandsReference extends CLILearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Framework Commands Reference',
            'description' => 'A list of the commands which are bundeled with the framework '
            . 'by default.',
            'active-aside' => 8
        ]);
        Page::insert($this->createParagraph('The framework comes with a commands that '
                . 'can be used to perform some of the tasks which are provided by the '
                . 'framework. Here, you can find all needed information about every '
                . 'command.'));
        $this->createTable();
        $this->setPrevTopicLink('learn/topics/cli/formatting-output', 'Formatting Output');
        $this->setNextTopicLink('learn/topics/cli/questions-and-answers', 'Questions and And Answers');
        $this->displayView();
    }
    private function createTable() {
        $table = new HTMLNode('table');
        Page::insert($table);
        $table->setAttribute('border', 1);
        $table->setStyle([
            'border-collapse' => 'collapse'
        ]);
        $headerRow = new TableRow();
        $headerRow->addCell('Command Number', 'th');
        $headerRow->addCell('Command Details', 'th');
        $table->addChild($headerRow);
        $number = 1;
        
        CLI::registerCommands();
        foreach (CLI::getRegisteredCommands() as $command) {
            $table->addChild($this->createCommandRow($command, $number));
            $number++;
        }
    }
    /**
     * 
     * @param CLICommand $cliCommand
     */
    private function createCommandRow($cliCommand) {
        $row = new TableRow();
        $topTable = new HTMLNode('table');
        //$topTable->setAttribute('border', 1);
        $topTable->setStyle([
            'border-collapse' => 'collapse'
        ]);
        $row->addCell('<code>'.$cliCommand->getName().'</code>');
        $descRow = new TableRow();
        $descRow->addCell('Description:');
        $descRow->addCell($cliCommand->getDescription());
        $topTable->addChild($descRow);
        $argsRow = new TableRow();
        $argsRow->addCell('Arguments:');
        $args = $cliCommand->getArgs();
        if (count($args) != 0) {
            $argsUl = new UnorderedList();
            foreach ($args as $argName => $argArr) {
                $subUl = new UnorderedList();
                if (isset($argArr['default'])) {
                    $subUl->addListItem('Default Value: '.$argArr['default']);
                }
                if (isset($argArr['values']) && count($argArr['values']) != 0) {
                    $allowed = '';
                    $comma = '';
                    for ($x = 0 ; $x < count($argArr['values']) ; $x++) {
                        $allowed .= $comma.$argArr['values'][$x];
                        $comma = ', ';
                    }
                    $subUl->addListItem('Allowed Value(s): '.$allowed);
                }
                $argsUl->addListItem('<code>'.$argName.'</code>: '.$argArr['description'].$subUl, false);
            }
            $argsRow->addCell($argsUl.'');
        } else {
            $argsRow->addCell('NO ARGUMENTS');
        }
        $topTable->addChild($argsRow);
        $row->addCell($topTable.'');
        return $row;
    }
}
return __NAMESPACE__;
