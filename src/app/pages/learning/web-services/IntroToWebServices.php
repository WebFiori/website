<?php
namespace webfiori\views\learn\webServices;

class IntroToWebServices extends WebAPIsLearnView {
    public function __construct() {
        parent::__construct([
            'title' => 'Introduction',
            'description' => '',
            'active-aside' => 1
        ]);
        $this->setNextTopicLink('learn/topics/web-services/main-classes', 'Main Classes');
        $this->displayView();
    }
}
return __NAMESPACE__;