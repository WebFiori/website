<?php
/**
 * Extending language file by adding more labels.
 *
 * @author Ibrahim
 */
class LangExt {
    public static function extLang(){
        $trans = &Page::translation();
        $trans->createDirectory('menus/main-menu');
        $langCode = $trans->getCode();
        
        if($langCode == 'AR'){
            $trans->setMultiple('menus/main-menu', array(
                'menu-item-1'=>'عنصر قائمة 1',
                'menu-item-2'=>'عنصر قائمة 2',
                'menu-item-3'=>'عنصر قائمة 3',
                'menu-item-4'=>'عنصر قائمة 4'
            ));
        }
        else{
            $trans->setMultiple('menus/main-menu', array(
                'menu-item-1'=>'Download',
                'menu-item-2'=>'Getting Started',
                'menu-item-3'=>'API Docs',
                'menu-item-4'=>'Menu Item 4'
            ));
        }
    }
}
