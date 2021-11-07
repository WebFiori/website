<?php
namespace themes\webfioriSite;

use webfiori\framework\ui\WebPage;
use webfiori\ui\HeadNode;
/**
  * This class represents head section the theme.
  */
class HeadSection extends HeadNode {
    /**
     * Creates new instance of the class.
     */
    public function __construct(WebPage $page){
        parent::__construct();
        $this->addJs('https://unpkg.com/vue@2.x.x');
        $this->addCSS('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');
        $this->addCSS('https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css');
        $this->addCSS('https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css');
        $this->addJs('https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js');
        //TODO: Add any extra JS or Css files here in addition to meta tags.
    }
}
