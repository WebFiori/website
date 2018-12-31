<?php
namespace webfiori\views\learn;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use phpStructs\html\LinkNode;
use phpStructs\html\HTMLNode;
class LearningAsideMenu {
    public static function createAsideNav() {
        $nav = new HTMLNode('nav');
        $ul = new UnorderedList();
        $nav->addChild($ul);
        $topic1Li = new ListItem(FALSE);
        $topic1Title = HTMLNode::createTextNode('Introductory Topics');
        $topic1Li->addChild($topic1Title);
        $ul->addChild($topic1Li);
        return $nav;
    }
}
