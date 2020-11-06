<?php

namespace webfiori\views\learn\webServices;

class MultipleServices extends WebAPIsLearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Working With Multiple Services',
            'description' => '',
            'active-aside' => 5
        ]);
        $this->setPrevTopicLink('learn/topics/web-services/authorization', 'Using Authorization');
        $this->displayView();
    }
}
return __NAMESPACE__;