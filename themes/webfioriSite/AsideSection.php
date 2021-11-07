<?php
namespace themes\webfioriSite;

use webfiori\framework\ui\WebPage;
use webfiori\ui\HTMLNode;
/**
  * This class represents side section of the theme.
  */
class AsideSection extends HTMLNode {
    /**
     * Creates new instance of the class.
     */
    public function __construct(WebPage $page){
        parent::__construct('v-navigation-drawer', [
            'app', 'v-model' => 'drawer'
        ]);
        //TODO: Add components to the footer.
    }
}
