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
            $this->addJs('https://unpkg.com/vue@3.3.4/dist/vue.global.js', [
                'integrity' => "sha256-IXVQMd/RK00yn/mSOrq8ncqOYUMrEiMzjNY90HIyai0=",
                'crossorigin' => "anonymous"
            ]);
            
        } else {
            $this->addJs('https://unpkg.com/vue@3.3.4/dist/vue.global.prod.js', [
                'integrity' => "sha256-YoSXy2nfex0xI2R5ytaMm7PyZQYK/VUGoMAEs5TfpH4=",
                'crossorigin' => "anonymous"
            ]);
        }
        $this->addCSS('https://cdnjs.cloudflare.com/ajax/libs/vuetify/3.5.16/vuetify.min.css', [
            'integrity' => "sha256-Fq0iR1su3PRCTr3Np88PsQs1tZErJNI9SpDxlGOWJME=",
            'crossorigin' => "anonymous"
        ]);
        $this->addJs('https://cdnjs.cloudflare.com/ajax/libs/vuetify/3.5.16/vuetify.min.js', [
            'integrity' => "sha256-QuS+7+m1qkvSC3eZok8148QK0txPXziOxCcVVUKd4WI=",
            'crossorigin' => "anonymous"
        ]);
    }
}
