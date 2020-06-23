<?php

namespace webfiori\views\learn\webServices;

class Authorization extends WebAPIsLearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Using Authorization',
            'description' => '',
            'active-aside' => 4
        ]);
        $this->setPrevTopicLink('learn/topics/web-services/create-web-service', 'Creating a Simple Web Service');
        $this->setNextTopicLink('learn/topics/web-services/multiple-services', 'Dealing With Multiple Services');
        $this->displayView();
    }
}
return __NAMESPACE__;
