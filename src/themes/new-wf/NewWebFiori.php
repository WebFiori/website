<?php
namespace webfiori\theme;

use webfiori\framework\Theme;
use webfiori\framework\ui\WebPage;
use webfiori\ui\HTMLNode;
use webfiori\ui\HeadNode;
use webfiori\ui\Anchor;

/**
 * The new WebFiori framework website theme.
 *
 * @author Ibrahim
 */
class NewWebFiori extends Theme {
    public function __construct() {
        parent::__construct('New WebFiori');
        $this->setVersion('1.0');
        $this->setLicenseName('MIT');
        $this->setDescription('The new WebFiori framework website theme.');
        
        $this->setAfterLoaded(function (Theme $theme) {
            $page = $theme->getPage();
            $appDiv = new HTMLNode('div', [
                'id' => 'app'
            ]);
            $vApp = new HTMLNode('v-app');
            $appDiv->addChild($vApp);
            $appDiv->addChild($appDiv);
            $body = $page->getChildByID('page-body');
            $body->setNodeName('v-main');
            
            $header = $page->getChildByID('page-header');
            $footer = $page->getChildByID('page-footer');
            $vApp->addChild($header);
            $vApp->addChild($body);
            $sideMenu = $body->getChildByID('side-content-area');
            $body->removeChild($sideMenu);
            $vApp->addChild($sideMenu);
            $vApp->addChild($footer);
            $page->removeChild($header);
            $page->removeChild($body);
            $page->removeChild($footer);
            $page->getDocument()->addChild($appDiv);
            $page->getChildByID('main-content-area')->setClassName('container');
            $page->addBeforeRender(function (WebPage $page) {
                $page->getDocument()->getBody()->addChild('script', [
                    'type' => 'text/javascript',
                    'src' => 'assets/new-wf/default.js',
                    'id' => 'default-vue-init'
                ]);
            });
        });
    }
    public function getAsideNode() {
        $page = $this->getPage();
        $right = $page->getWritingDir() == 'rtl' ? 'right' : '';
        $sideDrawer = new HTMLNode('v-navigation-drawer', [
            'v-model' => "drawer",
            'app', $right,
            'width' => '250px',
            'app', 'temporary',
        ]);
        $sideDrawer->addChild('v-divider');
        $itemsPanel = new HTMLNode('template');
        $sideDrawer->addChild($itemsPanel);
        $itemsPanel->addChild('v-expansion-panels', [], false)
        ->addChild(
                $this->createDrawerMenuItem(
                $this->createButton([
                    'text', 'block', 
                    'href' => $this->getBaseURL().'/about-me'
                    ], $page->get('main-menu/about-me'), 'mdi-information-variant')));
        return $sideDrawer;
    }

    public function getFooterNode() {
        $page = $this->getPage();
        $footer = new HTMLNode('v-footer', [
            'padless',
        ]);
        $card = new HTMLNode('v-card', [
            'flat', 'tile', 'class' => 'flex text-center', 'dark']);
        $footer->addChild($card);
        $card->addChild('v-card-text', [], false)
                ->addChild($this->createButton([
                    'text', 
                    'fab', 
                    'x-small',
                    'target' => '_blank',
                    'href' => 'https://www.linkedin.com/in/ibrahim-binalshikh/'], null, 'mdi-linkedin'))
                ->addChild($this->createButton([
                    'text', 
                    'fab', 
                    'x-small',
                    'target' => '_blank',
                    'href' => 'https://t.me/WarriorVx'], null, 'mdi-telegram'))
                ->addChild($this->createButton([
                    'text', 
                    'fab', 
                    'x-small',
                    'target' => '_blank',
                    'href' => 'https://github.com/usernane'], null, 'mdi-github'));
        
        //
        $card->addChild('v-card-text', [], false)
        ->addChild('small', [], false)
        ->text($page->get('footer/built-with'))
         ->addChild(new Anchor('https://webfiori.com', $page->get('general/framework-name')));
        
        $card->addChild('v-divider')
        ->addChild('v-card-text', ['flat'], false)
        ->addChild('small', [], false)->text($page->get('footer/all-rights').' '.date('Y'));
        return $footer;
    }

    public function getHeadNode() {
        $head = new HeadNode();
        $head->addJs('https://unpkg.com/vue@2.x.x');
        $head->addCSS('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');
        $head->addCSS('https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css');
        $head->addCSS('https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css');
        $head->addJs('https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js');
        $head->addJs('https://cdn.jsdelivr.net/gh/usernane/AJAXRequestJs@1.x.x/AJAXRequest.js',[
            'revision' => true
        ]);
        return $head;
    }

    public function getHeadrNode() {
        $page = $this->getPage();
        
        $vAppBar = new HTMLNode('v-app-bar', [
            'app',
            //'color' => 'green',
            //'src' => $this->getBaseURL().'/assets/images/WFLogo512.png',
            //'hide-on-scroll',
            //'elevate-on-scroll',
            'fixed',
            'height' => '80px',
            'flat'
        ]);
        
        $vAppBar->addChild('v-app-bar-nav-icon', [
                    'class' => 'd-sm-flex d-md-none',
                    '@click' => "drawer = !drawer",
                ])->addChild('v-toolbar-title', [
                    'style' => [
                        'min-width' => '250px'
                    ]
                ], false)
                ->addChild(new Anchor($this->getBaseURL(), 
                        //$page->getWebsiteName()
                        ''
                        ), [
                    'style' => [
                        'color' => 'white',
                        'text-decoration' => 'none',
                        'font-weight' => 'bold'
                    ],
                    'class' => 'site-name'
                ], false)->addChild('img', [
                    'src' => 'assets/images/WFLogo512.png',
                    'style' => [
                        'width' => '80px'
                    ]
                ]);
        $vAppBar->addChild('v-spacer');
        $navLinksContainer = new HTMLNode('v-container', [
            'class' => 'd-none d-md-flex'
        ]);
        $vAppBar->addChild($navLinksContainer);
        $navLinksContainer->addChild(
                self::createButton(['text', 
                    'href' => $this->getBaseURL().'/docs/webfiori'], 'API Reference'))
                ->addChild(
                self::createButton(['text', 'href' => $this->getBaseURL().'/learn'], 'Learn'))
                ->getParent()->addChild('v-spacer');
        $searchContainer = new HTMLNode('v-container');
        $vAppBar->addChild($searchContainer);
        $searchContainer->addChild('v-text-field', [
            'outlined', 'prepend-inner-icon' => 'mdi-magnify',
            'dense', 'rounded'
        ]);
        return $vAppBar;
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
    private function createDrawerMenuItem($listTitle) {
        $item = new HTMLNode('v-list-item');
        $last = $item->addChild('v-list-item-content', [], false)
             ->addChild('v-list-item-title', [], false);
        if ($listTitle instanceof HTMLNode) {
            $last->addChild($listTitle);
        } else {
            $last->text($listTitle);
        }
        return $item;
    }
}
