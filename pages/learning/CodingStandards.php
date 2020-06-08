<?php
namespace webfiori\views\learn;

use webfiori\views\WebFioriPage;
use phpStructs\html\UnorderedList;
use webfiori\entity\Page;

class CodingStandards extends WebFioriPage {
    public function __construct() {
        parent::__construct([
            'title' => 'Coding Standards of WebFiori Framework',
            'description' => 'The coding standards at which the framework was '
            . 'built in top of that developers must follow.'
        ]);
        $autoloadStandards = $this->createSection('Autoloading');
        Page::insert($autoloadStandards);
        $autoloadStandards->addChild($this->createParagraph('The framework has its owon autoloader implementation which '
                . 'follows <a href="https://www.php-fig.org/psr/psr-4/" target="_blank">PSR-4</a> in almost all aspects of '
                . 'autoloading. There are some differences which are:'));
        $autoloadStandards->addChild(new UnorderedList([
            'The autoloader will throw <code>ClassLoaderException</code> if a class was not found.',
            'It is recomended that a fully qualified class name to have the following form: <code>\&lt;vendorName>(\&lt;subNamespaceNames>)*\&lt;ClassName</code> (names uses camleCase).'
        ], false));
        $codingStyleSec = $this->createSection('Coding Style');
        Page::insert($codingStyleSec);
        $codingStyleSec->addChild(new UnorderedList([
            'Namespaces must be all <code>lower\case</code>.',
            'Class constants and global constants names must be decalred in <code>ALL_CAPS</code>',
            'Methods names, non-static class attributes must be decalred in <code>camelCase</code>.',
            'Classed names and static attributes names must be decalred in <code>PascalCase</code>.',
            'An opening braces \'{\' must be on the same line.',
            'Never use <code>elseif</code>. Always use <code>else if</code>.'
        ], false));
        Page::render();
    }
}
return __NAMESPACE__;