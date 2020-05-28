<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;
use phpStructs\html\CodeSnippet;
use phpStructs\html\UnorderedList;

class FormattingOutput extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Formatting Output',
            'description' => 'Learn how to format the output in the consoles that '
            . 'supports ANSI encoding.',
            'active-aside' => 7
        ]);
        Page::insert($this->createParagraph('One of the things that programmers like are the '
                . 'colors which appear in any terminal. In addition to making the output looks '
                . 'nice, colors can be used as an indicator for warnings or errors during '
                . 'execution. The framework supports output formatting usning colors if the method '
                . '<a href="docs/webfiori/entity/cli/CLICommand#println" target="_blank">CLICommand::println()</a> '
                . 'or the method <a href="docs/webfiori/entity/cli/CLICommand#print" target="_blank">CLICommand::print()</a>. In '
                . 'addition to that, it is possible to format a string using ANSI escape sequences using the '
                . 'static method <a href="docs/webfiori/entity/cli/CLICommand#formatOutput" target="_blank">CLICommand::formatOutput()</a>.'));
        $sec1 = $this->createSection('How to Use Formatting Options');
        Page::insert($sec1);
        $sec1->addChild($this->createParagraph('Formatting output is very simple. The method <a href="docs/webfiori/entity/cli/CLICommand#print" target="_blank">CLICommand::print()</a> '
                . 'takes two parameters, the first one is the output value and the second one is an associative array of formatting options. '
                . 'If the developer would like to output ANSI formatted text, simply he must supply the second argument. In order to change the color of the output, '
                . 'we must set the value of the index <code>color</code> to the color that we would like to use.' ));
        $code1 = new CodeSnippet();
        $code1->setTitle('PHP');
        $code1->setCode("\$this->print('This is a red text ', [\n"
                . "    'color' => 'red'\n"
                . "]);\n"
                . "\$this->print(', this is blue text ', [\n"
                . "    'color' => 'blue'\n"
                . "]);\n"
                . "\$this->print('and this is green text ', [\n"
                . "    'color' => 'green'\n"
                . "]);\n");
        $sec1->addChild($this->createImag('assets/images/cli02.png', 'Terminal Output'));
        $sec1->addChild($this->createParagraph('In addition to changing the color of the output, it is possible to set the '
                . 'background color of the text by adding the index <code>bg-color</code>. Also, the array can have the following '
                . 'text formatting options added as booleans:'));
        $ul = new UnorderedList([
            '<code>bold</code>: Make output bold.',
            '<code>underline</code>: Make output bold.',
            '<code>blink</code>: Make output bold.',
            '<code>reverse</code>: Make output bold.',
        ], false);
        $sec1->addChild($ul);
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP');
        $code2->setCode("");
        $this->setPrevTopicLink('learn/topics/cli/user-input', 'User Input');
        $this->setNextTopicLink('learn/topics/cli/commands-reference', 'Commands Reference');
        $this->displayView();
    }
}
return __NAMESPACE__;