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
        if (WF_VERBOSE) {
            $this->addJs('https://unpkg.com/vue@3.4.27/dist/vue.global.js', [
                'integrity' => "sha256-d09wonkltrn1LAGlnp51fLmy7GR7Jaa3IqluC/fm2RU=",
                'crossorigin' => "anonymous"
            ]);
            
        } else {
            $this->addJs('https://unpkg.com/vue@3.4.27/dist/vue.global.prod.js', [
                'integrity' => "sha256-VMrHpvwhhCKPXCaAPunCoWMozbWKGCjzejy8voYbGOs=",
                'crossorigin' => "anonymous"
            ]);
        }
        $this->addCSS('https://cdnjs.cloudflare.com/ajax/libs/vuetify/3.6.7/vuetify.min.css', [
            'integrity' => "sha256-4h4WRH7WZsB2rGHy2M0sqw8WPgBbDf6o98AIKlj4BLA=",
            'crossorigin' => "anonymous"
        ]);
        $this->addJs('https://cdnjs.cloudflare.com/ajax/libs/vuetify/3.6.7/vuetify.min.js', [
            'integrity' => "sha256-j5bE4uJLR9t3bborIzr5kAEQFl6IosF2W128boYg9Ok=",
            'crossorigin' => "anonymous"
        ]);
        
        $this->addJs('https://cdnjs.cloudflare.com/ajax/libs/vuetify/3.6.7/vuetify-labs.min.js', [
            'integrity' => 'sha512-r+tZE8gjA2PRsJLcQAO8t3PDux5pOTgT/nIc/nzfLhAeoCQZO4lAPSTo5hJqrv8bxehDOrn/TCXl8J5yO+Y7GQ==',
            'crossorigin' => "anonymous"
        ]);
        
        $this->addCSS('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');
        $this->addCSS('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css', [
            'integrity' => "sha256-A/48q6BeZbFOQDUTnu6JsSvofNC880KsOIZ3Duw6mWI=",
            'crossorigin' => "anonymous"
        ]);
        $this->addJs('https://cdn.jsdelivr.net/npm/algoliasearch@4.23.3/dist/algoliasearch.umd.min.js');
        $page->addBeforeRender(function (WebPage $p) {
            $p->getDocument()->getBody()->addChild('script', [
                'type' => 'text/javascript',
                'src' => 'assets/js/algolia.js'
            ]);
        });
    }
}
