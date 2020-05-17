<?php
namespace webfiori\views\learn\cli;

use webfiori\entity\Page;

class RunningCommands extends CLILearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Running Commands',
            'description' => 'Learn how to run CLI command in WebFiori Framework.',
            'active-aside' => 3
        ]);
        $this->setPrevTopicLink('learn/topics/cli/setup', 'Setup');
        $this->displayView();
    }
}
return __NAMESPACE__;