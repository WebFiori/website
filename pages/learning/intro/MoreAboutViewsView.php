<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace webfiori\views\learn\intro;
use webfiori\entity\Page;

/**
 * Description of MoreAboutViewsView
 *
 * @author Ibrahim
 */
class MoreAboutViewsView extends IntroLearnView{
    public function __construct() {
        parent::__construct(array(
            'title'=>'More About Views',
            'description'=>'Learn more about views in WebFiori Framework and '
            . 'how to use the class \'Page\'.',
            'active-aside'=>3
        ));
        Page::insert($this->createParagraph(''
                . 'Views in WebFiori Framework can be more than just plain HTML. '
                . 'They can be dynamic PHP web pages. One of the grate features that '
                . 'the framework provides is the entity class \'<a href="docs/webfiori/entity/Page" target="_blank">Page</a>\'.'
                . ''));
        $sec1 = $this->createSection('The Class \'Page\'');
        $sec1->addChild($this->createParagraph(''
                . 'The class \'Page\' simply represents a dynamic PHP web page. '
                . 'The developer can use this class to change many attributes of a '
                . 'web page such as its title, description, canonical URL and more. '
                . 'You can learn more about this class in <a href="learn/topics/themes" target="_blank">'
                . 'Themes Lessons</a> under the section '
                . '<a href="learn/topics/themes/class-Page" target="_blank">The Class \'Page\'</a>.'
                . ''));
        $this->displayView();
    }
}
new MoreAboutViewsView();
