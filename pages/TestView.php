<?php
use webfiori\entity\Page;

class TestView {
    public function __construct() {
        Page::theme('WebFiori V108');
        Page::render();
    }
}
return __NAMESPACE__;
