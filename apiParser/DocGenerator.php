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
 * A PHPDoc parser class which is used to generate API docs for PHP classes.
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
    private $files;
    private $themeName;
    private $siteName;
    private $outputPath;
    private $options;
    /**
     * 
     * @param type $options An array of options. The available options are:
     * <ul>
     * <li>path: The location at which the classes are exist.</li>
     * <li>output-path: The location at which the generated HTML files will 
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
        $this->options = $options;
        if(isset($options['path'])){
            $options['path'] = str_replace('/', '\\', $options['path']);
            $this->baseUrl = isset($options['base-url']) ? $options['base-url']:'';
            if($this->baseUrl[strlen($this->baseUrl) - 1] != '/'){
                $this->baseUrl = $this->baseUrl.'/';
            }
            if(Util::isDirectory($options['path'])){
                $this->outputPath = isset($options['output-path']) ? $options['output-path'] : '';
                if(Util::isDirectory($this->getOutputPath(),true)){
                    $this->isDynamic = isset($options['is-dynamic']) && $options['is-dynamic'] === true ? true : false;
                    $this->routRootFolder = $options['route-root-folder'];
                    $this->themeName = isset($options['theme']) ? $options['theme'] : '';
                    $this->logMessage('Scanning path \''.$options['path'].'\' for php files...');
                    $this->_scanPathForFiles($options['path'],$options['exclude-path']);
                    $this->linksArr = [];
                    $this->classesLinksByNS = [];
                    $this->apiReadersArr = [];
                    $this->routerLinks = [];
                    $this->nsApiObjecsArr = [];
                    $this->logMessage('Parsing API Docs from files...');
                    $this->_readAndrocessFiles();
                    $this->logMessage('Building links...');
                    $this->_buildLinks();
                    $this->siteName = isset($options['site-name']) && strlen($options['site-name']) > 0 ?
                            $options['site-name'] : 'Docs';
                    $this->logMessage('Generating routes class...');
                    $this->_createRoutesFile();
                    $this->logMessage('Creating web pages...');
                    $this->_generateClassesAPIPages();
                    $this->_generateNamespacesPages();
                    $this->logMessage('Process completed.');
                }
                else{
                    throw new Exception('Given output path is invalid.');
                }
            }
            else{
                throw new Exception('The value of the index \'path\' is not valid.');
            }
        }
        else{
            throw new Exception('The index \'path\' is missing.');
        }
    }
    /**
     * Returns the path to the folder which will be used to store all generated 
     * pages
     * @return string
     */
    public function getOutputPath() {
        return $this->outputPath;
    }
    /**
     * Returns the name of the theme that will be used in generated views.
     * @return string The name of the theme that will be used in generated views.
     */
    public function getThemeName() {
        return $this->themeName;
    }
    /**
     * Returns the name of the website that well be set for every generated view.
     * @return string The name of the website that well be set for every generated view.
     * Default return value is 'Docs'.
     */
    public function getSiteName() {
        return $this->siteName;
    }
    private function getOptions() {
        return $this->options;
    }
    private function _generateNamespacesPages(){
        $themeName = $this->getThemeName();
        $siteName = $this->getSiteName();
        $base = $this->getBaseURL();
        $outputPath = $this->getOutputPath();
        $options = $this->getOptions();
        foreach ($this->getNSAPIObjcts() as $nsObj){
            $theme = Page::theme($themeName);
            if($theme instanceof APITheme){
                $theme->setBaseURL($this->getBaseURL());
                Page::siteName($siteName);
                Page::insert($theme->createNamespaceContentBlock($nsObj));
                //$page = new APIPage($classAPI);
                $canonical = trim($base,'/'). str_replace('\\', '/', $nsObj->getName());
                Page::canonical($canonical);
                Page::description('All classes and sub-namespaces in the namespace '.$nsObj->getName().'.');
                Page::title('Namespace '.$nsObj->getName());
                $this->_createAsideNav();
                $this->createNSIndexFile($outputPath,$nsObj->getName(), $options);
                Page::reset();
            }
        }
    }

    /**
     * Generate all views for parsed classes.
     * @throws Exception
     */
    private function _generateClassesAPIPages() {
        $themeName = $this->getThemeName();
        $siteName = $this->getSiteName();
        $base = $this->getBaseURL();
        $options = $this->getOptions();
        foreach ($this->apiReadersArr as $reader){
            Page::lang('EN');
            Page::dir('ltr');
            $theme = Page::theme($themeName);
            if($theme instanceof APITheme){
                $theme->setBaseURL($this->getBaseURL());
                Page::siteName($siteName);
                $classAPI = new ClassAPI($reader,$this->getLinks(),$options);
                $classAPI->setBaseURL($base);
                $theme->setClass($classAPI);
                Page::insert($theme->createBodyNode());
                //$page = new APIPage($classAPI);
                $canonical = $base. str_replace('\\', '/', $classAPI->getNameSpace()).'/'.$classAPI->getName();
                Page::canonical($canonical);
                Page::description($classAPI->getSummary());
                $this->_createAsideNav();
                $this->_createAPIPage($classAPI, $options);
                Page::reset();
            }
            else{
                throw new Exception('The selected theme is not a sub-class of \'APITheme\'.');
            }

        }
    }
    /**
     * Go through all detected php files and parse classes.
     */
    private function _readAndrocessFiles() {
        foreach ($this->getFiles() as $classPath){
            $this->apiReadersArr[] = new APIReader($classPath);
        }
    }
    /**
     * Returns an array which contains paths to all detected files.
     * The files are the ones that API docs will be generated for.
     * @return array An array which contains paths to all detected files.
     */
    public function getFiles() {
        return $this->files;
    }
    /**
     * Creates a web page that represents specific API page.
     * @param type $classAPI
     * @param type $options
     */
    private function _createAPIPage($classAPI,$options){
        if($this->isDynamicPage()){
            $this->createPHPFile($classAPI,$options['output-path'], $options);
        }
        else{
            $this->createHTMLFile($classAPI,$options['output-path']);
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
                    . '        ,false);'."\r\n"
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
    /**
     * Returns an associative array of all classes inside namespaces.
     * @return array An associative array. The indices are namespaces and 
     * the values are sub-arrays which contains links to classes inside each 
     * namespace.
     */
    public function getLinksByNameSpace() {
        return $this->classesLinksByNS;
    }
    public function getRouterLinks() {
        return $this->routerLinks;
    }
    public function logMessage($message,$type='i') {
        if(php_sapi_name() == 'cli'){
            if($type == 'e'){
                fprintf(STDERR, date('Y-m-d H:i:s').': '. $message."\n");
            }
            else{
                fprintf(STDOUT, date('Y-m-d H:i:s').': '.$message."\n");
            }
        }
        else{
            echo date('Y-m-d H:i:s').': '. $message."<br/>";
        }
    }
    /**
     * Initialize the array which contains links to all 
     * detected classes.
     */
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
        $base = $this->getBaseURL();
        foreach ($this->apiReadersArr as $apiReader){
            $namespaceLink = $apiReader->getNamespace();
            $packageLink2 = str_replace('.', '/', $namespaceLink);
            $cName = $apiReader->getClassName();
            $nsName = $apiReader->getNamespace();
            if($packageLink2 === ''){
                $classLink = trim($base,'/').'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName).'/'.$cName] = '/'.$this->routRootFolder.'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName)] = '/'.$this->routRootFolder.'NSIndex';
            }
            else{
                $classLink = trim($base,'/').$packageLink2.'/'.$cName;
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
        $namespacesNames = array_keys($nsClasses);
        foreach ($nsClasses as $nsName => $classes){
            $ns = new NameSpaceAPI();
            $ns->setName($nsName);
            foreach ($classes as $class){
                $ns->addClass($class);
            }
            $len = strlen($nsName);
            foreach ($namespacesNames as $nsXName){
                $subNs = substr($nsXName, 0, $len);
                if($subNs == $nsName && $nsXName != $nsName){
                    $ns->addSubNamespace(substr($nsXName, 1));
                }
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
        $aside->addTextNode('<p class="all-classes-label">All Classes:</p>',FALSE);
        $nav = new HTMLNode('nav');
        $ul = new UnorderedList();
        $ul->setClassName('side-ul');
        $nav->addChild($ul);
        $aside->addChild($nav);
        $base = trim($this->getBaseURL(),'/');
        foreach ($this->classesLinksByNS as $nsName => $nsClasses){
            $packageLi = new ListItem();
            $packageLi->addTextNode('<a href="'.$base.str_replace('\\','/',$nsName).'">'.$nsName.'</a>',FALSE);
            $packageUl = new UnorderedList();
            $packageLi->addChild($packageUl);
            foreach ($nsClasses as $classLink){
                $packageUl->addListItem($classLink,FALSE);
            }
            $ul->addChild($packageLi);
        }
    }
    /**
     * Returns a string which represents the base URL which used inside the 
     * 'base' tag of the 'head' tag in a page.
     * @return string
     */
    public function getBaseURL(){
        return $this->baseUrl;
    }
    /**
     * Generates the class which will contains all routes to generated views.
     */
    private function _createRoutesFile(){
        $ext = $this->isDynamicPage() ? 'php' : 'html';
        $file = new File();
        $file->setPath($this->getOutputPath());
        $file->setName('DocGeneratorRoutes.php');
        $routesStr = '<?php'."\r\n"
                .'namespace docGenerator;'."\r\n"
                .'use webfiori\entity\router\Router;'."\r\n"
                . 'class DocGeneratorRoutes{'."\r\n"
                    . '    public static function createRoutes(){'."\r\n";
            foreach ($this->routerLinks as $link => $routeTo){
                $routesStr .= '        Router::view(['."\n"
                        . '            \'path\'=>\'docs'.$link.'\','."\n"
                        . '            \'route-to\'=>\''.$routeTo.'View.'.$ext.'\','."\n"
                        . '            \'in-sitemap\'=>true'."\n"
                        . '        ]);'."\r\n";
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
                    . '        ,false);'."\r\n"
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
    /**
     * Scan a specific path for all .php files.
     * @param string $root The folder that will be scanned.
     * @param array $excPath An array that contains a set of paths which 
     * will be execluded from the scan.
     */
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
        $this->files = $retVal;
    }
}
