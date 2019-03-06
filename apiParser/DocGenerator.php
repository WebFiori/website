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
    private $routRootFolder;
    private $isDynamic;
    private $nsApiObjecsArr;
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
            if($this->baseUrl[strlen($this->baseUrl) - 1] != '/'){
                $this->baseUrl = $this->baseUrl.'/';
            }
            if(Util::isDirectory($options['path'])){
                if(Util::isDirectory($options['output-to'])){
                    $this->isDynamic = isset($options['is-dynamic']) && $options['is-dynamic'] === TRUE ? TRUE : FALSE;
                    $this->routRootFolder = $options['route-root-folder'];
                    $classes = $this->_scanPathForFiles($options['path'],$options['exclude-path']);
                    $this->linksArr = array();
                    $this->classesLinksByNS = array();
                    $this->apiReadersArr = array();
                    $this->routerLinks = array();
                    $this->nsApiObjecsArr = array();
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
                            $theme->setBaseURL($this->getBaseURL());
                            Page::siteName($siteName);
                            $classAPI = new ClassAPI($reader,$this->linksArr,$options);
                            $classAPI->setBaseURL($this->baseUrl);
                            $theme->setClass($classAPI);
                            Page::insert($theme->createBodyNode());
                            //$page = new APIPage($classAPI);
                            $canonical = $options['base-url']. str_replace('\\', '/', $classAPI->getNameSpace()).'/'.$classAPI->getName();
                            Page::canonical($canonical);
                            Page::description($classAPI->getSummary());
                            $this->_createAsideNav();
                            $this->createAPIPage($classAPI, $options);
                            Page::reset();
                        }
                        else{
                            throw new Exception('The selected theme is not a sub-class of \'APITheme\'.');
                        }
                        
                    }
                    foreach ($this->getNSAPIObjcts() as $nsObj){
                        $theme = Page::theme($options['theme']);
                        if($theme instanceof APITheme){
                            $theme->setBaseURL($this->getBaseURL());
                            Page::siteName($siteName);
                            Page::insert($theme->createNamespaceContentBlock($nsObj));
                            //$page = new APIPage($classAPI);
                            $canonical = trim($options['base-url'],'/'). str_replace('\\', '/', $nsObj->getName());
                            Page::canonical($canonical);
                            Page::description('All classes in the namespace '.$nsObj->getName().'.');
                            Page::title('Namespace '.$nsObj->getName());
                            $this->_createAsideNav();
                            $this->createNSIndexFile($options['output-to'],$nsObj->getName(), $options);
                            Page::reset();
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
                    . '        P::description(\''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::description())).'\');'."\r\n"
                    . '        P::siteName(\''.Page::siteName().'\');'."\r\n"
                    . '        P::title(\''.Page::title().'\');'."\r\n"
                    . '        $pageBody = new HTMLNode();'."\r\n"
                    . '        $pageBody->addTextNode(\''."\r\n"
                    . '        '. str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::document()->getChildByID('page-body')->toHTML(TRUE))).'\''."\r\n"
                    . '        );'."\r\n"
                    . '        $body = P::document()->getChildByID(\'page-body\');'."\r\n"
                    . '        P::document()->getBody()->replaceChild($body, $pageBody);'."\r\n"
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
    public function getNSAPIObjcts() {
        return $this->nsApiObjecsArr;
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
        $nsClasses = array();
        $this->linksArr['NULL'] = '<a class="mono" href="http://php.net/manual/en/language.types.null.php" target="_blank">NULL</a>';
        $this->linksArr['TRUE'] = '<a class="mono" href="http://php.net/manual/en/language.types.boolean.php" target="_blank">TRUE</a>';
        $this->linksArr['FALSE'] = '<a class="mono" href="http://php.net/manual/en/language.types.boolean.php" target="_blank">FALSE</a>';
        $this->linksArr['int'] = '<a class="mono" href="http://php.net/manual/en/language.types.integer.php" target="_blank">int</a>';
        $this->linksArr['array'] = '<a class="mono" href="http://php.net/manual/en/language.types.array.php" target="_blank">array</a>';
        $this->linksArr['string'] = '<a class="mono" href="http://php.net/manual/en/language.types.string.php" target="_blank">string</a>';
        $this->linksArr['callable'] = '<aclass="mono" href="http://php.net/manual/en/language.types.callable.php" target="_blank">callable</a>';
        $this->linksArr['float'] = '<a class="mono" href="http://php.net/manual/en/language.types.float.php" target="_blank">float</a>';
        $this->linksArr['double'] = '<a class="mono" href="http://php.net/manual/en/language.types.float.php" target="_blank">double</a>';
        $this->linksArr['resource'] = '<a class="mono" href="http://php.net/manual/en/language.types.resource.php" target="_blank">resource</a>';
        $this->linksArr['iterable'] = '<a class="mono" href="http://php.net/manual/en/language.types.iterable.php" target="_blank">iterable</a>';
        $this->linksArr['object'] = '<a class="mono" href="http://php.net/manual/en/language.types.object.php" target="_blank">object</a>';
        foreach ($this->apiReadersArr as $apiReader){
            $namespaceLink = $apiReader->getNamespace();
            $packageLink2 = str_replace('.', '/', $namespaceLink);
            $cName = $apiReader->getClassName();
            $nsName = $apiReader->getNamespace();
            if($packageLink2 === ''){
                $classLink = trim($this->baseUrl,'/').'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName).'/'.$cName] = '/'.$this->routRootFolder.'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName)] = '/'.$this->routRootFolder.'NSIndex';
            }
            else{
                $classLink = trim($this->baseUrl,'/').$packageLink2.'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName).'/'.$cName] = '/'.$this->routRootFolder.str_replace('\\', '/', $packageLink2).'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName)] = '/'.$this->routRootFolder.str_replace('\\', '/', $packageLink2).'/NSIndex';
            }
            $this->linksArr[$cName] = '<a class="mono" href="'.$classLink.'">'.$cName.'</a>';
            $this->classesLinksByNS[$nsName][] = '<a class="mono" href="'.$classLink.'">'.$cName.'</a>';
            $nsClasses[$nsName][] = new ClassAPI($apiReader);
            foreach ($apiReader->getConstantsNames() as $name){
                $this->linksArr[$cName.'::'.$name] = '<a class="mono" href="'.$classLink.'#'.$name.'">'.$cName.'::'.$name.'</a>';
            }
            foreach ($apiReader->getMethodsNames() as $name){
                $this->linksArr[$cName.'::'.$name.'()'] = '<a class="mono" href="'.$classLink.'#'.$name.'">'.$cName.'::'.$name.'()</a>';
            }
        }
        foreach ($nsClasses as $nsName => $classes){
            $ns = new NameSpaceAPI();
            $ns->setName($nsName);
            foreach ($classes as $class){
                $ns->addClass($class);
            }
            $this->nsApiObjecsArr[] = $ns;
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
            $packageLi->addTextNode('<a href="'.trim($this->getBaseURL(),'/').str_replace('\\','/',$nsName).'">'.$nsName.'</a>');
            $packageUl = new UnorderedList();
            $packageLi->addChild($packageUl);
            foreach ($nsClasses as $classLink){
                $packageUl->addListItem($classLink);
            }
            $ul->addChild($packageLi);
        }
    }
    public function getBaseURL(){
        return $this->baseUrl;
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
    /**
     * 
     * @param type $path
     * @param type $ns
     * @param type $options
     * @return boolean
     */
    private function createNSIndexFile($path,$ns,$options){
        $ns = trim($ns,'\\');
        if(strlen($ns) != 0){
            $ns = '\\'.$ns;
        }
        $savePath = $path.$ns;
        if(Util::isDirectory($savePath, TRUE)){
            $file = new File();
            $file->setName('NSIndexView.php');
            $file->setPath($savePath);
            $file->setRawData(
                    '<?php'."\r\n"
                    . 'namespace docGenerator'.$ns.";\r\n"
                    . 'use webfiori\entity\Page as P;'."\r\n"
                    . 'use phpStructs\html\HTMLNode;'."\r\n"
                    . 'class NSIndexView{'."\r\n"
                    . '    public function __construct(){'."\r\n"
                    . '        P::theme(\''.$options['theme'].'\');'."\r\n"
                    . '        P::document()->getHeadNode()->setBase(\''.$options['base-url'].'\');'."\r\n"
                    . '        P::description(\''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::description())).'\');'."\r\n"
                    . '        P::siteName(\''.Page::siteName().'\');'."\r\n"
                    . '        P::title(\''.Page::title().'\');'."\r\n"
                    . '        $pageBody = new HTMLNode();'."\r\n"
                    . '        $pageBody->addTextNode(\''."\r\n"
                    . '        '. str_replace('\'', '\\\'', str_replace('\\', '\\\\', Page::document()->getChildByID('page-body')->toHTML(TRUE))).'\''."\r\n"
                    . '        );'."\r\n"
                    . '        $body = P::document()->getChildByID(\'page-body\');'."\r\n"
                    . '        P::document()->getBody()->replaceChild($body, $pageBody);'."\r\n"
                    . '        P::render();'."\r\n"
                    . '    }'."\r\n"
                    . '}'."\r\n"
                    . 'new NSIndexView();'
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
