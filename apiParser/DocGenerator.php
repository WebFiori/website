<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\apiParser\ClassAPI;
use webfiori\entity\Util;
use webfiori\entity\Page;
use phpStructs\Stack;
use phpStructs\html\HTMLNode;
use phpStructs\html\UnorderedList;
use phpStructs\html\ListItem;
use Exception;
use webfiori\entity\File;
/**
 * Description of DocGenerator
 *
 * @author Ibrahim
 */
class DocGenerator {
    private $linksArr;
    private $classesLinksByNS;
    private $apiReadersArr;
    private $baseUrl;
    private $routerLinks;
    private $rootContainer;
    private $isDynamic;
    private $indexLinks;
    /**
     * 
     * @param type $options An array of options. The available options are:
     * <ul>
     * <li>path: The location at which the classes are exist.</li>
     * <li>output-to: The location at which the generated HTML files will 
     * be stored to.</li>
     * <li>base-url: A URL that will be used for the tag 'base' in the generated 
     * HTML File.</li>
     * <li>site-name: A name that will be used in the tag 'title'.</li>
     * <li>theme: A theme that can be used to customize the UI of generated 
     * HTML files.</li>
     * <li>inc-private-attrs: A boolean variable. Set to TRUE in order to include 
     * private attributes. Default is FALSE.</li>
     * <li>inc-private-funcs: A boolean variable. Set to TRUE in order to include 
     * private functions. Default is FALSE.</li>
     * * <li>inc-protected-attrs: A boolean variable. Set to TRUE in order to include 
     * protected attributes. Default is TRUE.</li>
     * <li>inc-private-funcs: A boolean variable. Set to TRUE in order to include 
     * protected functions. Default is TRUE.</li>
     * <li></li>
     * <li></li>
     * </ul>
     * @throws Exception
     */
    public function __construct($options=array()) {
        if(isset($options['path'])){
            $options['path'] = str_replace('/', '\\', $options['path']);
            $this->baseUrl = isset($options['base-url']) ? $options['base-url']:'';
            if(Util::isDirectory($options['path'])){
                if(Util::isDirectory($options['output-to'])){
                    $this->isDynamic = isset($options['is-dynamic']) && $options['is-dynamic'] === TRUE ? TRUE : FALSE;
                    $this->rootContainer = $options['route-root-folder'];
                    $classes = $this->_scanPathForFiles($options['path'],$options['exclude-path']);
                    $this->linksArr = array();
                    $this->classesLinksByNS = array();
                    $this->apiReadersArr = array();
                    $this->routerLinks = array();
                    $this->indexLinks = array();
                    foreach ($classes as $classPath){
                        $this->apiReadersArr[] = new APIReader($classPath);
                    }
                    $this->_buildLinks();
                    $siteName = isset($options['site-name']) && strlen($options['site-name']) > 0 ?
                            $options['site-name'] : 'Docs';
                    $this->createRoutesFile($options['output-to']);
                    
                    foreach ($this->apiReadersArr as $reader){
                        Page::lang('EN');
                        Page::dir('ltr');
                        $theme = Page::theme($options['theme']);
                        if($theme instanceof APITheme){
                            Page::siteName($siteName);
                            $classAPI = new ClassAPI($reader,$this->linksArr,$options);
                            $classAPI->setBaseURL($this->baseUrl);
                            $theme->setClass($classAPI);
                            Page::insert($theme->createBodyNode());
                            //$page = new APIPage($classAPI);
                            $canonical = $options['base-url']. str_replace('\\', '/', $classAPI->getNameSpace()).'/'.$classAPI->getName();
                            Page::canonical($canonical);
                            Page::description($classAPI->getShortDescription());
                            $this->_createAsideNav();
                            $this->createAPIPage($classAPI, $options);
                            Page::reset();
                        }
                        else{
                            throw new Exception('The selected theme is not a sub-class of \'APITheme\'.');
                        }
                    }
                }
                else{
                    throw new Exception('Given output path is invalid.');
                }
            }
            else{
                throw new Exception('Given classes path is invalid.');
            }
        }
        else{
            throw new Exception('Classes path is not set.');
        }
    }
    private function createAPIPage($classAPI,$options){
        if($this->isDynamicPage()){
            $this->createPHPFile($classAPI,$options['output-to'], $options);
        }
        else{
            $this->createHTMLFile($classAPI,$options['output-to']);
        }
    }
    private function isDynamicPage() {
        return $this->isDynamic;
    }
    public function createPHPFile($classAPI, $path,$options=array(
        
    )) {
        $savePath = $path.$classAPI->getNameSpace();
        if(Util::isDirectory($savePath, TRUE)){
            $file = new File();
            $file->setName($classAPI->getName().'View.php');
            $file->setPath($savePath);
            $ns = trim($classAPI->getNameSpace(),'\\');
            if(strlen($ns) != 0){
                $ns = '\\'.$ns;
            }
            $file->setRawData(
                    '<?php'."\r\n"
                    . 'namespace docGenerator'.$ns.";\r\n"
                    . 'use webfiori\entity\Page as P;'."\r\n"
                    . 'use phpStructs\html\HTMLNode;'."\r\n"
                    . 'class '.$classAPI->getName().'View{'."\r\n"
                    . '    public function __construct(){'."\r\n"
                    . '        P::theme(\''.$options['theme'].'\');'."\r\n"
                    . '        P::document()->getHeadNode()->setBase(\''.$options['base-url'].'\');'."\r\n"
                    . '        P::canonical(\''.Page::canonical().'\');'."\r\n"
                    . '        P::description(\''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::description())).'\');'."\r\n"
                    . '        P::siteName(\''.Page::siteName().'\');'."\r\n"
                    . '        P::title(\''.Page::title().'\');'."\r\n"
                    . '        $pageBody = new HTMLNode();'."\r\n"
                    . '        $pageBody->addTextNode(\''."\r\n"
                    . '        '. str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::document()->getChildByID('page-body')->toHTML(TRUE))).'\''."\r\n"
                    . '        );'."\r\n"
                    . '        P::insert($pageBody, \'page-body\');'."\r\n"
                    . '        P::render();'."\r\n"
                    . '    }'."\r\n"
                    . '}'."\r\n"
                    . 'new '.$classAPI->getName().'View();'
            );
            $file->write();
            return TRUE;
        }
        return FALSE;
    }
    public function createHTMLFile($class,$path) {
        $savePath = $path.$class->getNameSpace();
        if(Util::isDirectory($savePath, TRUE)){
            $file = new File();
            $file->setName($class->getName().'View.html');
            $file->setPath($savePath);
            $file->setRawData(Page::document()->toHTML());
            $file->write();
            return TRUE;
        }
        return FALSE;
    }
    public function getIndexLinks() {
        return $this->indexLinks;
    }
    public function getLinks() {
        return $this->linksArr;
    }
    public function getLinksByNameSpace() {
        return $this->classesLinksByNS;
    }
    public function getRouterLinks() {
        return $this->routerLinks;
    }
    private function _buildLinks() {
        foreach ($this->apiReadersArr as $apiReader){
            $namespaceLink = $apiReader->getNamespace();
            $packageLink2 = str_replace('.', '/', $namespaceLink);
            $cName = $apiReader->getClassName();
            $nsName = $apiReader->getNamespace();
            if($packageLink2 === ''){
                $classLink = $this->baseUrl.'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName).'/'.$cName] = '/'.$this->rootContainer.'/'.$cName;
            }
            else{
                $classLink = $this->baseUrl.$packageLink2.'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName).'/'.$cName] = '/'.$this->rootContainer.str_replace('\\', '/', $packageLink2).'/'.$cName;
            }
            $this->linksArr[$cName] = '<a class="mono" href="'.$classLink.'" target="_blank">'.$cName.'</a>';
            $this->classesLinksByNS[$nsName][] = '<a class="side-link" href="'.$classLink.'" target="_blank">'.$cName.'</a>';
            $this->indexLinks[$nsName][] = array(
                'class-link'=>'<a class="side-link" href="'.$classLink.'" target="_blank">'.$cName.'</a>',
                'class-description'=>$apiReader->getClassSummary(),
                'class-type'=>$apiReader->getClassAccessModifier()
            );
            foreach ($apiReader->getConstantsNames() as $name){
                $this->linksArr[$cName.'::'.$name] = '<a class="mono" href="'.$classLink.'#'.$name.'" target="_blank">'.$cName.'::'.$name.'</a>';
            }
            foreach ($apiReader->getFunctionsNames() as $name){
                $this->linksArr[$cName.'::'.$name.'()'] = '<a class="mono" href="'.$classLink.'#'.$name.'" target="_blank">'.$cName.'::'.$name.'()</a>';
            }
        }
    }
    /**
     * Creates aside navigation menu which contains 
     * all system classes along packages.
     */
    private function _createAsideNav(){
        $aside = &Page::document()->getChildByID('side-content-area');
        $aside->addTextNode('<p class="all-classes-label">All Classes:</p>');
        $nav = new HTMLNode('nav');
        $ul = new UnorderedList();
        $ul->setClassName('side-ul');
        $nav->addChild($ul);
        $aside->addChild($nav);
        foreach ($this->classesLinksByNS as $nsName => $nsClasses){
            $packageLi = new ListItem();
            $packageLi->setText($nsName);
            $packageUl = new UnorderedList();
            $packageLi->addChild($packageUl);
            foreach ($nsClasses as $classLink){
                $li = new ListItem();
                $li->addTextNode($classLink);
                $packageUl->addChild($li);
            }
            $ul->addChild($packageLi);
        }
    }
    private function createRoutesFile($path){
        $ext = $this->isDynamicPage() ? 'php' : 'html';
        $file = new File();
        $file->setPath($path);
        $file->setName('DocGeneratorRoutes.php');
        $routesStr = '<?php'."\r\n"
                .'namespace docGenerator;'."\r\n"
                .'use webfiori\entity\router\Router;'."\r\n"
                . 'class DocGeneratorRoutes{'."\r\n"
                    . '    public static function createRoutes(){'."\r\n";
            foreach ($this->routerLinks as $link => $routeTo){
                $routesStr .= '        Router::view(\'docs'.$link.'\',\''.$routeTo.'View.'.$ext.'\');'."\r\n";
            }
        $routesStr .= '    }'."\r\n}";
        $file->setRawData($routesStr);
        $file->write();
    }
    private function createNSIndexFile($ns){
        
        if(Util::isDirectory($savePath, TRUE)){
            $file = new File();
            $file->setName($classAPI->getName().'View.php');
            $file->setPath($savePath);
            $ns = trim($classAPI->getNameSpace(),'\\');
            if(strlen($ns) != 0){
                $ns = '\\'.$ns;
            }
            $file->setRawData(
                    '<?php'."\r\n"
                    . 'namespace docGenerator'.$ns.";\r\n"
                    . 'use webfiori\entity\Page as P;'."\r\n"
                    . 'use phpStructs\html\HTMLNode;'."\r\n"
                    . 'class '.$classAPI->getName().'View{'."\r\n"
                    . '    public function __construct(){'."\r\n"
                    . '        P::theme(\''.$options['theme'].'\');'."\r\n"
                    . '        P::document()->getHeadNode()->setBase(\''.$options['base-url'].'\');'."\r\n"
                    . '        P::canonical(\''.Page::canonical().'\');'."\r\n"
                    . '        P::description(\''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::description())).'\');'."\r\n"
                    . '        P::siteName(\''.Page::siteName().'\');'."\r\n"
                    . '        P::title(\''.Page::title().'\');'."\r\n"
                    . '        $pageBody = new HTMLNode();'."\r\n"
                    . '        $pageBody->addTextNode(\''."\r\n"
                    . '        '. str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::document()->getChildByID('page-body')->toHTML(TRUE))).'\''."\r\n"
                    . '        );'."\r\n"
                    . '        P::insert($pageBody, \'page-body\');'."\r\n"
                    . '        P::render();'."\r\n"
                    . '    }'."\r\n"
                    . '}'."\r\n"
                    . 'new '.$classAPI->getName().'View();'
            );
            $file->write();
            return TRUE;
        }
        return FALSE;
    }
    private function _scanPathForFiles($root,$excPath=array()){
        $dirsStack = new Stack();
        $dirsStack->push($root);
        $retVal = array();
        while($root = $dirsStack->pop()){
            if(!in_array($root, $excPath)){
                $subDirs = scandir($root);
                foreach ($subDirs as $subDir){
                    if($subDir != '.' && $subDir != '..'){
                        $xSubDir = $root.'\\'.$subDir;
                        if(Util::isDirectory($xSubDir)){
                            $dirsStack->push($xSubDir);
                        }
                        else{
                            if(strpos($subDir, '.php') !== FALSE){
                                $retVal[] = $xSubDir;
                            }
                        }
                    }
                }
            }
        }
        return $retVal;
    }
}
