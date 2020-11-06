<?php
namespace webfiori\views\learn\webServices;

class CreateAService extends WebAPIsLearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Creating a Simple Web Service',
            'description' => '',
            'active-aside' => 3
        ]);
        $this->setPrevTopicLink('learn/topics/web-services/main-classes', 'Main Classes');
        $this->setNextTopicLink('learn/topics/web-services/authorization', 'Using Authorization');
        $this->displayView();
    }
}
return __NAMESPACE__;
