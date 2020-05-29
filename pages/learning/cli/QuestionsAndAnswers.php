<?php

namespace webfiori\views\learn\cli;
use webfiori\entity\Page;

class QuestionsAndAnswers extends CLILearnView {
    public function __construct() {
        parent::__construct([
            'title' =>'Questions and Answers About Command Line Interface',
            'description' => 'Here you will find a list of some of the common '
                . 'questions about command line applications support and the answer to each one.',
            'active-aside' => 9
        ]);
        Page::insert($this->createParagraph('Here you will find a list of some of the common '
                . 'questions about command line applications support and the answer to each one.'));
        $question1 = $this->createQuestionBox('What do you mean by command line application?', ''
                . 'A command line application is a program that can be executed using terminal '
                . 'applications such as <code>bash</code>, <code>cmd</code> or <code>cygwin</code>.'
                . '');
        Page::insert($question1);
        $this->setPrevTopicLink('learn/topics/cli/commands-reference', 'Commands Reference');
        $this->displayView();
    }
}
return __NAMESPACE__;
