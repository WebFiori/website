<?php
namespace themes\webfioriSite;

use webfiori\framework\ui\WebPage;
use webfiori\ui\Anchor;
use webfiori\ui\HTMLNode;

/**
  * This class represents header section the theme.
  */
class HeaderSection extends HTMLNode {
    /**
     * Creates new instance of the class.
     */
    public function __construct(WebPage $page){
        parent::__construct('v-app-bar', [
            'app',
            'color' => 'primary',
            'dense'
        ]);
        $prepend = $this->addChild('template', [
            'v-slot:prepend'
        ]);
        $prepend->addChild('v-app-bar-title', [
            'style' => [
                'width' => '400px'
            ]
        ])->addChild(new Anchor('/', $page->getWebsiteName()), [
            'style' => [
                'color' => 'white',
                'text-decoration' => 'none'
            ]
        ]);
        $navLinksContainer = $this->addChild('template', [
            'v-slot:append'
        ]);
        
        
        
        
        $navLinksContainer
                ->addChild(self::createButton(['text','href' => '/docs/webfiori'], 'API Reference'), true)
                ->addChild(self::createButton(['text', 'href' => '/learn'], 'Learn'), true)
                ->addChild(self::createButton(['text', 'href' => '/download'], 'Download'), true)
                ->addChild(self::createButton(['text', 'href' => '/contribute'], 'Contribute'), true)
                ->getParent()->addChild('v-spacer');
        
        $prepend->addChild($this->createTopSearchBar());
    }
    
    public static function createButton($props = [], $text = null, $icon = null, $iconProps = []) {
        $btn = new HTMLNode('v-btn', $props);
        
        if ($text !== null) {
            $btn->text($text);
        }
        if ($icon !== null) {
            $btn->addChild('v-icon', $iconProps, false)->text($icon);
        }
        return $btn;
    }
    
    private function createTopSearchBar() {
        
        
        $row = new HTMLNode('v-row', [
            'no-gutters'
        ]);

        $vList = $row->addChild('v-col', [
            'cols' => 12,
            'no-gutters',
            
            ])->addChild('v-menu', [
            'relative','overflow',
            'v-model'=>"show_search_menu",
                'offset-y',
                'bottom'
        ])->addChild('template', [
            'v-slot:activator'=>"{ props }",
            
        ])
        ->addChild('v-text-field', [
            'outlined', 
            'append-inner-icon' => 'mdi-magnify',
            'density' => 'compact',
            'rounded', 
            'hide-details',
            'id' => 'search-box',
            'v-model' => 'search_val',
            '@input' => 'search',
            'v-bind'=>"props",
        ], true)->getParent()
        ->addChild('v-list');
        
        $vList->addChild('v-list-subheader', [
            'style' => 'font-weight: bold;'
        ])
        ->text('Learn')
        ->getParent()
        ->addChild('v-list-item', [
            'v-for' => 'result in docs_search_results'
        ])->addChild('v-list-item-title', [], false)
        ->addChild('a', [
            ':href' => 'result.link',
            'style' => [
                'font-size' => '9pt',
                'font-weight' => 'bold'
            ]
        ])->addChild('span', [
            'v-if' => 'result.parent_page !== null'
        ])->text('{{result.parent_page}} > {{result.title}}')
        ->getParent()
        ->addChild('span', [
            'v-else' => 'result.parent_page'
        ])->text('{{result.title}}');
        
        $vList->addChild('v-list-subheader', [
            'style' => 'font-weight: bold;'
        ])
        ->text('Classes')
        ->getParent()
        ->addChild('v-list-item', [
            'v-for' => 'result in search_results'
        ])->addChild('v-list-item-title', [], false)
        ->addChild('a', [
            ':href' => 'result.link',
            'style' => [
                'font-size' => '9pt',
                'font-weight' => 'bold'
            ]
        ])->text('{{result.class_name}}')
        ->getParent()
                ->addChild('v-list-item-subtitle',[
                    'style' => [
                        'font-size' => '9pt'
                    ]
                ])
                ->text('{{result.summary}}');
        $vList->addChild('v-list-subheader', [
            'style' => 'font-weight: bold;'
        ])
        ->text('Methods')
        ->getParent()
        ->addChild('v-list-item', [
            'v-for' => 'result in methods_search_results'
        ])->addChild('v-list-item-title')
        ->addChild('a', [
            ':href' => 'result.link',
            'style' => [
                'font-size' => '9pt',
                'font-weight' => 'bold'
            ]
        ])->text('{{result.name}}')
        ->getParent()
                ->addChild('v-list-item-subtitle',[
                    'style' => [
                        'font-size' => '9pt'
                    ]
                ])
                ->text('{{result.summary}}')
        ->getParent()->getParent()->getParent()
        ->addChild('a', [
            'href' => 'https://www.algolia.com/',
            'target' => '_blank',
            'class' => 'd-flex',
            'style' => 'border-top: 1px solid;'
        ])
        ->img([
            'src' => 'assets/images/search-by-algolia-light-background.webp',
            'style'=> ['width' => '130px']
        ]);
        return $row;
    }
}
