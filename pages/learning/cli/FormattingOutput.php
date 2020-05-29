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
                . 'execution. The framework supports output formatting using colors if the method '
                . '<a href="docs/webfiori/entity/cli/CLICommand#println" target="_blank">CLICommand::println()</a> '
                . 'or the method <a href="docs/webfiori/entity/cli/CLICommand#print" target="_blank">CLICommand::print()</a>. In '
                . 'addition to that, it is possible to format a string using ANSI escape sequences using the '
                . 'static method <a href="docs/webfiori/entity/cli/CLICommand#formatOutput" target="_blank">CLICommand::formatOutput()</a>. The way '
                . 'to formate the output '
                . 'will be the same for the 3 methods.'));
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
        $sec1->addChild($code1);
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
        $sec1->addChild($this->createParagraph('The following code snippits uses the method <code>CLICommand::println()</code> to show the output. '
                . ''));
        $code2 = new CodeSnippet();
        $code2->setTitle('PHP');
        $code2->setCode("
\$this->println(\"Normal Text\");

\$this->println(\"Bold light blue text\", [
    'color' => 'light-blue',
    'bold' => true
]);

\$this->println(\"%s\", \"Underlined with green background.\", [
    'bg-color' => 'green',
    'underline' => true
]);

\$this->println(\"%s\", \"Blinking With Red Background\", [
    'bg-color' => 'red',
    'blink' => true
]);");
        $sec1->addChild($code2);
        $sec1->addChild($this->createParagraph('The output of the above code in the terminal would be similar to the '
                . 'following image:'));
        $sec1->addChild($this->createImag('assets/images/cli03.gif', 'Terminal Output'));
        $sec2 = $this->createSection('Pre-made Methods For Output Formatting');
        Page::insert($sec2);
        $sec2->addChild($this->createParagraph('The class <code>CLICommand</code> provides the developer with methods which '
                . 'can be used to display the output formatted without using formatting options. The methods can be used to '
                . 'show output for repeated tasks. The methods are:'));
        $ul2 = new UnorderedList([
            '<a href="docs/webfiori/entity/cli/CLICommand#error" target="_blank">CLICommand::error()</a>: Output a message that represents an error.',
            '<a href="docs/webfiori/entity/cli/CLICommand#info" target="_blank">CLICommand::info()</a>: Output a message that represents extra information().',
            '<a href="docs/webfiori/entity/cli/CLICommand#success" target="_blank">CLICommand::success()</a>: Output a message that represents success state.',
            '<a href="docs/webfiori/entity/cli/CLICommand#warning" target="_blank">CLICommand::warning()</a>: Output a message that represents a warning.'
        ], false);
        $sec2->addChild($ul2);
        $code3 = new CodeSnippet();
        $code3->setTitle('PHP');
        $code3->setCode("
    \$this->error('Unable to log in.');
\$this->warning('The connection was terminated and output might be not as expected.');
\$this->success('Connection was restored.');
\$this->info('Useful extra info.');");
        $sec2->addChild($code3);
        $sec2->addChild($this->createImag('assets/images/cli04.png', 'Terminal Output'));
        $this->setPrevTopicLink('learn/topics/cli/user-input', 'User Input');
        $this->setNextTopicLink('learn/topics/cli/commands-reference', 'Commands Reference');
        $this->displayView();
    }
}
return __NAMESPACE__;