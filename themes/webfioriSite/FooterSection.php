<?php
namespace themes\webfioriSite;

use webfiori\framework\ui\WebPage;
use webfiori\ui\HTMLNode;
/**
  * This class represents footer section of the theme.
  */
class FooterSection extends HTMLNode {
    /**
     * Creates new instance of the class.
     */
    public function __construct(WebPage $page){
        parent::__construct('v-footer');
        //TODO: Add components to the footer.
    }
}
