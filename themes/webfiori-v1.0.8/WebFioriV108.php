<?php
namespace webfiori\theme;
use webfiori\entity\Theme;
use phpStructs\html\HTMLNode;
use phpStructs\html\HeadNode;
/**
 * Description of WebFioriV108
 *
 * @author Ibrahim
 */
class WebFioriV108 extends Theme{
    public function __construct() {
        parent::__construct();
        $this->setVersion('1.0');
        $this->setAuthor('Ibrahim');
        $this->setName('WebFiori V108');
    }
    
    public function createHTMLNode($options = array()){
        $node = new HTMLNode();
        return $node;
    }

    public function getAsideNode(){
        $aside = new HTMLNode();
        return $aside;
    }

    public function getFooterNode(){
        $footer = new HTMLNode();
        return $footer;
    }
    public function getHeadNode(){
        $head = new HeadNode();
        $head->addCSS('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', [
            'integrity'=>'sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T',
            'crossorigin'=>'anonymous'
        ], false);
        $head->addJs('https://code.jquery.com/jquery-3.3.1.slim.min.js', [
            'integrity'=>'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo',
            'crossorigin'=>'anonymous'
        ], false);
        $head->addJs('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', [
            'integrity'=>'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1',
            'crossorigin'=>'anonymous'
        ], false);
        $head->addJs('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', [
            'integrity'=>'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM',
            'crossorigin'=>'anonymous'
        ], false);
        return $head;
    }

    public function getHeadrNode() {
        $header = new HTMLNode();
        return $header;
    }

}
return __NAMESPACE__;
