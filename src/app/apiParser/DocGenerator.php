<?php
namespace webfiori\apiParser;
use webfiori\apiParser\APITheme;
use webfiori\apiParser\ClassAPI;
use webfiori\framework\Util;
use webfiori\framework\Logger;
use webfiori\framework\cli\CLI;
use webfiori\collections\Stack;
use webfiori\ui\HTMLNode;
use Exception;
use webfiori\framework\File;
use webfiori\framework\ui\WebPage;
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
     * @var HTMLNode 
     */
    private $asideNavNode;
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
                    self::logMessage('Classes Path: '.$options['path']);
                    self::logMessage('Output Path: '.$options['output-path']);
                    $this->isDynamic = isset($options['is-dynamic']) && $options['is-dynamic'] === true ? true : false;
                    if ($this->isDynamicPage()) {
                        self::logMessage('Dynamic: true');
                    } else {
                        self::logMessage('Dynamic: false');
                    }
                    $this->routRootFolder = $options['route-root-folder'];
                    self::logMessage('Root Routing Folder: '.$options['route-root-folder']);
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
                    $this->logMessage('Creating web pages for classes...');
                    $this->_generateClassesAPIPages();
                    $this->logMessage('Creating web pages for namespaces...');
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
        $page = new WebPage();
        foreach ($this->getNSAPIObjcts() as $nsObj){
            
            $page->setTheme($themeName);
            $theme = $page->getTheme();
            if($theme instanceof APITheme){
                $theme->setBaseURL($this->getBaseURL());
                $page->setWebsiteName($siteName);
                $page->insert($theme->createNamespaceContentBlock($nsObj));
                //$page = new APIPage($classAPI);
                $canonical = trim($base,'/'). str_replace('\\', '/', $nsObj->getName());
                $page->setCanonical($canonical);
                $page->setDescription('All classes and sub-namespaces in the namespace \''.$nsObj->getName().'\'.');
                $page->setTitle('Namespace '.$nsObj->getName());
                $this->_createAsideNav($page);
                $this->createNSIndexFile($outputPath,$nsObj->getName(), $options, $page);
                $page->reset();
            }
        }
    }

    /**
     * Generate all views for parsed classes.
     * @throws Exception
     */
    private function _generateClassesAPIPages() {
        $themeName = $this->getThemeName();
        $this->logMessage('Theme To Use: '.$themeName);
        $siteName = $this->getSiteName();
        $this->logMessage('Website Name: '.$siteName);
        $base = $this->getBaseURL();
        $this->logMessage('Base: '.$base);
        $options = $this->getOptions();
        $count = 1;
        $page = new WebPage();
        $this->logMessage('Processing pages...');
        foreach ($this->apiReadersArr as $reader){
            $page->setLang('EN');
            $page->setTheme($themeName);
            $theme = $page->getTheme();
            
            if($theme instanceof APITheme){
                
                $theme->setBaseURL($this->getBaseURL());
                $page->setWebsiteName($siteName);
                
                $classAPI = new ClassAPI($reader,$this->getLinks(),$options);
                
                $classAPI->setBaseURL($base);
                $theme->setClass($classAPI);
                $page->insert($theme->createBodyNode());
                //$page = new APIPage($classAPI);
                $canonical = $base. str_replace('\\', '/', $classAPI->getNameSpace()).'/'.$classAPI->getName();
                $page->setCanonical($canonical);
                $page->setDescription($classAPI->getSummary());
                $this->_createAsideNav($page);
                $this->_createAPIPage($classAPI, $options, $page);
                self::logMessage($count.' Page Created.');
                $count++;
                $page->reset();
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
            $reader = new APIReader($classPath);
            if (count($reader->getParsedInfo()['class-def'])) {
                $this->apiReadersArr[] = $reader;
            } else {
                self::logMessage('The file "'.$classPath.'" is not a PHP class.');
            }
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
    private function _createAPIPage($classAPI,$options, WebPage $p){
        if($this->isDynamicPage()){
            $this->createPHPFile($classAPI,$options['output-path'], $options, $p);
        }
        else{
            $this->createHTMLFile($classAPI,$options['output-path'], $p);
        }
    }
    private function isDynamicPage() {
        return $this->isDynamic;
    }
    public function createPHPFile($classAPI, $path,$options, WebPage $page) {
        $savePath = $path.$classAPI->getNameSpace();
        if(Util::isDirectory($savePath, true)){
            $file = new File();
            $file->setName($classAPI->getName().'View.php');
            $file->setPath($savePath);
            $file->remove();
            $ns = trim($classAPI->getNameSpace(),'\\');
            if(strlen($ns) != 0){
                $ns = '\\'.$ns;
            }
            $html = '';
            $body = $page->getChildByID('main-content-area');
            foreach ($body->children() as $node) {
                $html.=$node;
            }
            $rawData = 
                    '<?php'."\r\n"
                    . 'namespace docGenerator'.$ns.";\r\n"
                    . 'use webfiori\framework\ui\WebPage as P;'."\r\n"
                    . 'use webfiori\ui\HTMLNode;'."\r\n"
                    . 'class '.$classAPI->getName().'View extends P {'."\r\n"
                    . '    public function __construct(){'."\r\n"
                    . '        parent::__construct();'."\r\n"
                    . '        $this->setTheme(\''.$options['theme'].'\');'."\r\n"
                    . '        $this->getDocument()->getHeadNode()->setBase(\''.$options['base-url'].'\');'."\r\n"
                    . '        $this->setDescription(\''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', $page->getDescription())).'\');'."\r\n"
                    . '        $this->setWebsiteName(\''.$page->getWebsiteName().'\');'."\r\n"
                    . '        $this->setTitle(\''.$page->getTitle().'\');'."\r\n";
            foreach ($page->getChildByID('main-content-area')->children() as $node) {
                $rawData .= $this->toPHPCode($node);
            }
            $rawData .= '    }'."\r\n"
                    . '}'."\r\n"
                    . 'return __NAMESPACE__;';
            $file->setRawData($rawData);
            $file->write(false, true);
            return TRUE;
        }
        return FALSE;
    }
    public function createHTMLFile($class,$path, WebPage $p) {
        $savePath = $path.$class->getNameSpace();
        if(Util::isDirectory($savePath, true)){
            $file = new File();
            $file->setName($class->getName().'View.html');
            $file->setPath($savePath);
            $file->remove();
            $doc = $p->render(true, true);
            $file->setRawData($doc->toHTML());
            $file->write(false, true);
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
    public static function logMessage($message,$type='i') {
        Logger::log($message);
        if(CLI::isCLI()){
            if($type == 'e'){
                fprintf(STDERR, date('Y-m-d H:i:s').': '. $message."\n");
            }
            else{
                fprintf(STDOUT, date('Y-m-d H:i:s').': '.$message."\n");
            }
        }
    }
    /**
     * Initialize the array which contains links to all 
     * detected classes.
     */
    private function _buildLinks() {
        $nsClasses = array();
        $this->linksArr['boolean'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.boolean.php" target="_blank">boolean</a>';
        $this->linksArr['null'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.null.php" target="_blank">null</a>';
        $this->linksArr['true'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.boolean.php" target="_blank">true</a>';
        $this->linksArr['false'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.boolean.php" target="_blank">false</a>';
        $this->linksArr['NULL'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.null.php" target="_blank">NULL</a>';
        $this->linksArr['TRUE'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.boolean.php" target="_blank">TRUE</a>';
        $this->linksArr['FALSE'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.boolean.php" target="_blank">FALSE</a>';
        $this->linksArr['int'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.integer.php" target="_blank">int</a>';
        $this->linksArr['array'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.array.php" target="_blank">array</a>';
        $this->linksArr['string'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.string.php" target="_blank">string</a>';
        $this->linksArr['callable'] = '<aclass="datatype-name" href="http://php.net/manual/en/language.types.callable.php" target="_blank">callable</a>';
        $this->linksArr['float'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.float.php" target="_blank">float</a>';
        $this->linksArr['double'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.float.php" target="_blank">double</a>';
        $this->linksArr['resource'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.resource.php" target="_blank">resource</a>';
        $this->linksArr['Iterable'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.iterable.php" target="_blank">iterable</a>';
        $this->linksArr['object'] = '<a class="datatype-name" href="http://php.net/manual/en/language.types.object.php" target="_blank">object</a>';
        $this->linksArr['Iterator'] = '<a class="datatype-name" href="https://www.php.net/manual/en/class.iterator.php">Iterator</a>';
        $this->linksArr['Countable'] = '<a class="datatype-name" href="https://www.php.net/manual/en/class.countable.php">Countable</a>';
        $this->linksArr['Exception'] = '<a class="datatype-name" href="https://www.php.net/manual/en/class.exception.php">Exception</a>';
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
            $this->linksArr[$cName] = '<a class="datatype-name" href="'.$classLink.'">'.$cName.'</a>';
            $this->classesLinksByNS[$nsName][] = [
                'label'=>$cName,
                'link'=>$classLink
            ];
            $nsClasses[$nsName][] = new ClassAPI($apiReader);
            foreach ($apiReader->getConstantsNames() as $name){
                $this->linksArr[$cName.'::'.$name] = '<a class="datatype-name" href="'.$classLink.'#'.$name.'">'.$cName.'::'.$name.'</a>';
            }
            foreach ($apiReader->getMethodsNames() as $name){
                $this->linksArr[$cName.'::'.$name.'()'] = '<a class="datatype-name" href="'.$classLink.'#'.$name.'">'.$cName.'::'.$name.'()</a>';
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
    private function _createAsideNav(WebPage $page){
        if($this->asideNavNode === null){
            $linksArr = [];
            $base = trim($this->getBaseURL(),'/');
            foreach ($this->classesLinksByNS as $nsName => $nsClasses){
                $subList = [
                    'label'=>$nsName,
                    'link'=>$base.str_replace('\\','/',$nsName),
                    'list-items'=>$nsClasses
                ];
                $linksArr[] = $subList;
            }
            $this->asideNavNode = $page->getTheme()->createNSAside($linksArr);
        }
        $aside = $page->getChildByID('side-content-area');
        $aside->addChild($this->asideNavNode);
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
        $file->remove();
        $routesStr = '<?php'."\r\n"
                .'namespace docGenerator;'."\r\n"
                .'use webfiori\framework\router\Router;'."\r\n"
                . 'class DocGeneratorRoutes{'."\r\n"
                    . '    public static function createRoutes(){'."\r\n";
            foreach ($this->routerLinks as $link => $routeTo){
                $routesStr .= '        Router::view(['."\n"
                        . '            \'path\' => \'docs'.$link.'\','."\n"
                        . '            \'route-to\' => \''.$routeTo.'View.'.$ext.'\','."\n"
                        . '            \'in-sitemap\' => true'."\n"
                        . '        ]);'."\r\n";
            }
        $routesStr .= '    }'."\r\n}";
        $file->setRawData($routesStr);
        $file->write(false, true);
    }
    /**
     * 
     * @param type $path
     * @param type $ns
     * @param type $options
     * @return boolean
     */
    private function createNSIndexFile($path,$ns,$options, WebPage $p){
        $ns = trim($ns,'\\');
        if(strlen($ns) != 0){
            $ns = '\\'.$ns;
        }
        $savePath = $path.$ns;
        if(Util::isDirectory($savePath, TRUE)){
            $file = new File();
            $file->setPath($savePath);
            if($this->isDynamicPage()){
                $file->setName('NSIndexView.php');
                $file->remove();
                $rawData = '<?php'."\r\n"
                        . 'namespace docGenerator'.$ns.";\r\n"
                        . 'use webfiori\framework\ui\WebPage as P;'."\r\n"
                        . 'use webfiori\ui\HTMLNode;'."\r\n"
                        . 'class NSIndexView extends P {'."\r\n"
                        . '    public function __construct(){'."\r\n"
                        . '        parent::__construct();'."\r\n"
                        . '        $this->setTheme(\''.$options['theme'].'\');'."\r\n"
                        . '        $this->getDocument()->getHeadNode()->setBase(\''.$options['base-url'].'\');'."\r\n"
                        . '        $this->setDescription(\''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', $p->getDescription())).'\');'."\r\n"
                        . '        $this->setWebsiteName(\''.$p->getWebsiteName().'\');'."\r\n"
                        . '        $this->setTitle(\''. str_replace('\\', '\\\\', $p->getTitle()).'\');'."\r\n";
                $index = 0;
                foreach ($p->getChildByID('main-content-area')->children() as $node) {
                    $rawData .= $this->toPHPCode($node, $index);
                    $index++;
                }
                $rawData .=  '    }'."\r\n"
                        . '}'."\r\n"
                        . 'return __NAMESPACE__;';
                $file->setRawData($rawData);
            } else {
                $file->setName('NSIndexView.html');
                $doc = $p->render(true, true);
                $file->setRawData($doc->toHTML());
            }
            $file->write(false, true);
            return true;
        }
        return false;
    }
    private function toPHPCode(HTMLNode $node, $suffex = 0, $parentSuffex = null) {
        if ($parentSuffex !== null) {
            $code = "        \$el".$parentSuffex."->addChiled('".$node->getNodeName()."'".$this->getAttrsStr($node).");\r\n";
        } else {
            $code = "        \$el$suffex = new HTMLNode('".$node->getNodeName()."'".$this->getAttrsStr($node).");"."\r\n";
            $code .= "       \$this->insert(\$el$suffex);"."\r\n";
            foreach ($node->children() as $child) {
                $code .= $this->toPHPCode($child, 0, $suffex);
            }
        }
        return $code;
    }
    private function getAttrsStr(HTMLNode $node) {
        if (!$node->isComment() && !$node->isTextNode()) {
            if (count($node->getAttributes()) != 0) {
                $retVal = ', ['."\r\n";
                foreach ($node->getAttributes() as $attrName => $attrVal) {
                    if (gettype($attrName) == 'integer') {
                        $retVal .= "            '".$attrVal."',\r\n";
                    } else {
                        $retVal .= "            '".$attrName."' => '".$attrVal."',\r\n";
                    }
                }
                return $retVal.'        ]';
            }
        }
    }
    /**
     * Scan a specific path for all .php files.
     * @param string $root The folder that will be scanned.
     * @param array $excPath An array that contains a set of paths which 
     * will be execluded from the scan.
     */
    private function _scanPathForFiles($root,$excPath=array()){
        self::logMessage('Scanning Started.');
        $dirsStack = new Stack();
        $dirsStack->push($root);
        $retVal = array();
        while($root = $dirsStack->pop()){
            self::logMessage('Scanning "'.$root."...");
            if(!in_array($root, $excPath)){
                //AutoLoader::newSearchFolder($root, true);
                $subDirs = scandir($root);
                foreach ($subDirs as $subDir){
                    if($subDir != '.' && $subDir != '..'){
                        $xSubDir = $root.'\\'.$subDir;
                        if(Util::isDirectory($xSubDir)){
                            self::logMessage('Sub-directory found. Push to stack.');
                            $dirsStack->push($xSubDir);
                        }
                        else{
                            if(strpos($subDir, '.php') !== FALSE){
                                self::logMessage('PHP file found. File name: "'.$xSubDir.'".');
                                $retVal[] = $xSubDir;
                            }
                        }
                    }
                }
            } else {
                self::logMessage('Excelusing path from scan.');
            }
        }
        self::logMessage('Scan finished.');
        $this->files = $retVal;
    }
    /**
     * 
     * @param type $path
     * @return string
     */
    private function getClassName($path) {
        self::logMessage('Extracting class name from the path "'.$path.'"...');
        $trimmed = trim($path,'.php');
        $split = explode(DIRECTORY_SEPARATOR, $trimmed);
        if (count($split) != 0) {
            $cName = $split[count($split) - 1];
            self::logMessage("Extracted name: '$cName'.");
            return $cName;
        }
        self::logMessage("No name was extracted.", 'warning');
        return '';
    }
}
