<?php

namespace webfiori\views\learn\cli;

class QuestionsAndAnswers extends CLILearnView {
    public function __construct() {
        parent::__construct([
            'title' =>'Questions and Answers About Command Line Interface',
            'description' => '',
            'active-aside' => 9
        ]);
        $this->displayView();
    }
}
return __NAMESPACE__;
