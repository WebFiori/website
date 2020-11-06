<?php
namespace webfiori\views\learn\webServices;

class MainClasses extends WebAPIsLearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Main Classes',
            'description' => '',
            'active-aside' => 2
        ]);
        $this->setPrevTopicLink('learn/topics/web-services/intro', 'Introduction');
        $this->setNextTopicLink('learn/topics/web-services/create-web-service', 'Creating a Simple Service');
        $this->displayView();
    }
}
return __NAMESPACE__;
