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
use webfiori\ui\Anchor;
use webfiori\apiParser\NameSpaceAPI;
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
    private $classesJsonIndexData;
    private $methodsJsonIndexData;
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
        $this->classesJsonIndexData = [];
        $this->methodsJsonIndexData = [];
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
                    $this->logMessage('Creating base view...');
                    $this->writeBasePage($this->getOutputPath(), $this->getThemeName(), $this->getBaseURL(), $this->getLinks(), $this->getSiteName(), $this->getLinksByNameSpace());
                    $this->logMessage('Creating web pages for classes...');
                    $this->_generateClassesAPIPages();
                    $this->logMessage('Creating web pages for namespaces...');
                    $this->_generateNamespacesPages();
                    $this->logMessage('Creating index json file...');
                    $this->createJsonIndex();
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
            $nsObj instanceof NameSpaceAPI;
            $page->setTheme($themeName);
            $theme = $page->getTheme();
            if(is_subclass_of($theme, APITheme::class)){
                $theme->setBaseURL($this->getBaseURL());
                $page->setWebsiteName($siteName);
                $page->insert($theme->createNamespaceContentBlock($nsObj));
                //$page = new APIPage($classAPI);
                $canonical = trim($base,'/'). str_replace('\\', '/', $nsObj->getName());
                $page->setCanonical($canonical);
                $page->setDescription('All classes and sub-namespaces in the namespace \''.$nsObj->getName().'\'.');
                $page->setTitle('Namespace '.$nsObj->getName());
                //$this->_createAsideNav($page);
                $this->createNSIndexFile($outputPath,$nsObj, $options, $page);
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
            
            if(is_subclass_of($theme, APITheme::class)){
                
                $theme->setBaseURL($this->getBaseURL());
                $page->setWebsiteName($siteName);
                
                try {
                    $classAPI = new ClassAPI($reader,$this->getLinks(),$options);
                } catch (\Exception $ex) {
                    DocGenerator::logMessage($ex->getMessage(),'e');
                    continue;
                }
                
                $classAPI->setBaseURL($base);
                $theme->setClass($classAPI);
                //$page->insert($theme->createBodyNode());
                //$page = new APIPage($classAPI);
                $canonical = $base. str_replace('\\', '/', $classAPI->getNameSpace()).'/'.$classAPI->getName();
                $page->setCanonical($canonical);
                $page->setTitle($classAPI->getAccessModifier().' '.$classAPI->getName());
                $page->setDescription($classAPI->getSummary());
                //$this->_createAsideNav($page);
                $this->_createAPIPage($classAPI, $options, $page);
                self::logMessage($count.' Page Created.');
                $count++;
                $page->reset();
            }
            else{
                throw new Exception('The selected themedoes not implement \'APITheme\'.');
            }

        }
    }
    /**
     * Go through all detected php files and parse classes.
     */
    private function _readAndrocessFiles() {
        foreach ($this->getFiles() as $classPath){
            $reader = new APIReader($classPath);
            if ($reader->getClassName() != 'CLASS_NAME') {
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
    public function escStr($str) {
        $retVal = str_replace('\\', '\\\\', $str);
        $retVal2 = str_replace("'", "\'", $retVal);
        
        
        return $retVal2;
    }
    public function createPHPFile(ClassAPI $classAPI, $path,$options, WebPage $page) {
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
            $this->classesJsonIndexData[] = new \webfiori\json\Json([
                'class_name' => $classAPI->getName(),
                'summary' => $classAPI->getSummary(),
                'link' => $this->getBaseURL(). str_replace('\\', '/', $ns).'/'.$classAPI->getName(),
                'namespace' => $ns,
                'objectID' => hash('sha256',$ns.$classAPI->getName())
            ]);
            $rawData = 
                    '<?php'."\r\n"
                    . 'namespace docGenerator'.$ns.";\r\n"
                    . 'use webfiori\docs\apiParser\DocsWebPage as P;'."\r\n"
                    . 'use webfiori\ui\HTMLNode;'."\r\n"
                    . 'use webfiori\apiParser\FunctionDef;'."\r\n"
                    . 'use webfiori\apiParser\AttributeDef;'."\r\n"
                    . 'use webfiori\apiParser\MethodParameter;'."\r\n"
                    . 'use webfiori\ui\Anchor;'."\r\n"
                    . 'use webfiori\apiParser\ParameterType;'."\r\n"
                    . "\r\n"
                    . 'class '.$classAPI->getName().'View extends P {'."\r\n"
                    . '    public function __construct(){'."\r\n"
                    . '        parent::__construct();'."\r\n"
                    . '        $this->setTheme(\''.$options['theme'].'\');'."\r\n"
                    . '        $this->getTheme()->setBaseURL(\''.$options['base-url'].'\');'."\r\n"
                    . '        $this->setDescription(\''.$this->escStr($page->getDescription()).'\');'."\r\n"
                    . '        $this->setWebsiteName(\''.$page->getWebsiteName().'\');'."\r\n"
                    . '        $this->setTitle(\''.$page->getTitle().'\');'."\r\n"
                    . '        $this->insert($this->getTheme()->createClassDescriptionNode(\''.$classAPI->getAccessModifier().'\', \''.$classAPI->getName().'\', \''.$classAPI->getNameSpace().'\', \''. $this->escStr($classAPI->getDescription()).'\'));'."\r\n"
                    . $this->createAttrsArrStr($classAPI)
                    . $this->createMethodsArrStr($classAPI)
                    . '        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));'."\r\n"
                    . '        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));'."\r\n"
                    . '        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));'."\r\n"
                    . '        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));'."\r\n";
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
    /**
     * Returns an associative array that holds all generated links for all classes 
     * and types.
     * 
     * @return array The indices will be datatypes such as 'int' and the 
     * values are objects of type 'Anchor'.
     */
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
    /**
     * Logs and shows a message to the user.
     * 
     * @param string $message The message to show and log.
     * 
     * @param string $type Message type. Can be 'i' for info or 'e' for 
     * error.
     */
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
    private function writeBasePage($path, $theme, $base, $linksArr, $wName, $classesLinks) {
        $file = new File($path.DS.'DocsWebPage.php');
        $file->remove();
        $rawData = "<?php\r\n"
                . "\r\n"
                . "namespace webfiori\\docs\\apiParser;\r\n\r\n"
                . "use webfiori\\framework\\ui\\WebPage;\r\n"
                . 'use webfiori\\ui\\Anchor;'."\r\n"
                . "use webfiori\\apiParser\\NameSpaceAPI;\r\n"
                . "use webfiori\\apiParser\\FunctionDef;\r\n"
                . "use webfiori\\apiParser\\AttributeDef;\r\n"
                . ""
                . "\r\n"
                . "class DocsWebPage extends WebPage {\r\n"
                . "    /**\r\n"
                . "     * An array that holds all detected class attributes.\r\n"
                . "     */\r\n"
                . "    private \$attrsArr;\r\n"
                . "    /**\r\n"
                . "     * An array that holds all detected class methods.\r\n"
                . "     */\r\n"
                . "    private \$methodsArr;\r\n"
                . "    /**\r\n"
                . "     * An array that holds links to classes and methods.\r\n"
                . "     */\r\n"
                . "    private \$linksArr;\r\n"
                . "    /**\r\n"
                . "     * An array that holds all parsed classes acording to namespaces.\r\n"
                . "     */\r\n"
                . "    private \$classesArr;\r\n"
                . "    /**\r\n"
                . "     * An objects that holds namespace information.\r\n"
                . "     */\r\n"
                . "    private \$nsObj;\r\n"
                . "    /**\r\n"
                . "     * Creates new instance of the class.\r\n"
                . "     */\r\n"
                . "    public function __construct() {\r\n"
                . "        parent::__construct();\r\n"
                . "        \$this->setTheme('$theme');\r\n"
                . "        \$this->getTheme()->setBaseURL('$base');\r\n"
                . "        \$this->setWebsiteName('$wName');\r\n"
                . "        \$this->addBeforeRender(function(DocsWebPage \$page) {\r\n"
                . "            if (\$page->getNSObj() !== null) {\r\n"
                . "                \$page->insert(\$page->getTheme()->createNamespaceContentBlock(\$page->getNSObj()));\r\n"
                . "            } else {\r\n"
                . "                \$page->insert(\$page->getTheme()->createAttrsSummaryBlock(\$page->getAttributes()));\r\n"
                . "                \$page->insert(\$page->getTheme()->createMethodsSummaryBlock(\$page->getMethods()));\r\n"
                . "                \$page->insert(\$page->getTheme()->createAttrsDetailsBlock(\$page->getAttributes()));\r\n"
                . "                \$page->insert(\$page->getTheme()->createMethodsDetailsBlock(\$page->getMethods()));\r\n"
                . "            }\r\n"
                . "            \$aside = \$page->getChildByID('side-content-area');\r\n"
                . "            \$page->getChildByID('page-body')->addChild(\$page->getTheme()->createNSAside([]));\r\n"
                . "        });\r\n" 
                . "        \$this->attrsArr = [];\r\n"
                . "        \$this->methodsArr = [];\r\n"
                . "        \$this->classesArr = [\r\n";
        foreach ($classesLinks as $ns => $classesArr) {
            $rawData .= "            '$ns' => [\r\n";
            foreach ($classesArr as $subArr) {
                $cName = $subArr['label'];
                $rawData .= "                '$cName',\r\n";
            }
            $rawData .= "           ],\r\n";
        }
        $rawData .= "        ];\r\n";
        $rawData .= "        \$this->linksArr = [\r\n";
        foreach ($linksArr as $index => $anchor) {
            $anchor instanceof Anchor;
            $href = $anchor->getAttribute('href');
            $text = $anchor->getChild(0)->getText();
            $rawData .= "        '$index' => new Anchor('$href', '$text'),\r\n";
        }
        $rawData .= "        ];\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Returns an object that holds namespace information\r\n"
                . "     * \r\n"
                . "     * @return NameSpaceAPI|null\r\n"
                . "     */\r\n"
                . "    public function getNSObj() {\r\n"
                . "        return \$this->nsObj;\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Sets the object which is used to display namespace information.\r\n"
                . "     * \r\n"
                . "     * @param NameSpaceAPI \$c An object that holds namespace information.\r\n"
                . "     * \r\n"
                . "     */\r\n"
                . "    public function setNSObj(NameSpaceAPI \$c) {\r\n"
                . "        \$this->nsObj = \$c;\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Returns an object that holds link information of a class or\r\r"
                . "     * a class method.\r\n"
                . "     * \r\n"
                . "     * @param string \$c Class name with or without method name or attribute.\r\n"
                . "     * \r\n"
                . "     * @return Anchor|null If a link exist, it is returned as an object of\r\n"
                . "     * type 'Anchor'. Other than that, null is returned.\r\n"
                . "     */\r\n"
                . "    public function getLink(\$c) {\r\n"
                . "        if (isset(\$this->linksArr[\$c])) {\r\n"
                . "            return \$this->linksArr[\$c];\r\n"
                . "        }\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Returns an array that holds all added methods definitions\r\r"
                . "     * of the class.\r\n"
                . "     * \r\n"
                . "     * @return array An array that holds objects which holds methods\r\n"
                . "     * Definitions.\r\n"
                . "     */\r\n"
                . "    public function getMethods() {\r\n"
                . "        return \$this->methodsArr;\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Returns an array that holds all added attributes definitions\r\r"
                . "     * of the class.\r\n"
                . "     * \r\n"
                . "     * @return array An array that holds objects which holds attributes\r\n"
                . "     * Definitions.\r\n"
                . "     */\r\n"
                . "    public function getAttributes() {\r\n"
                . "        return \$this->attrsArr;\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Adds a method definition to the set of methods of the class\r\r"
                . "     * \r\n"
                . "     * @param FunctionDef \$meth An object that holds method definition.\r\n"
                . "     */\r\n"
                . "    public function addMethod(FunctionDef \$meth) {\r\n"
                . "        \$this->methodsArr[] = \$meth;\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Adds attributte definition to the set of attributes of the class\r\r"
                . "     * \r\n"
                . "     * @param AttributeDef \$meth An object that holds attribute definition.\r\n"
                . "     */\r\n"
                . "    public function addAttribute(AttributeDef \$attr) {\r\n"
                . "        \$this->attrsArr[] = \$attr;\r\n"
                . "    }\r\n"
                . "    /**\r\n"
                . "     * Returns an array that holds all classes which are included in\r\n"
                . "     * the generated docs.\r\n"
                . "     * \r\n"
                . "     * @return array The indices of the array will be the namespaces and in\r\n"
                . "     * each index is a sub array that holds the names of the classes at which they\r\n"
                . "     * belongs to the namespace.\r\n"
                . "     */\r\n"
                . "    public function getClasses() {\r\n"
                . "        return \$this->classesArr;\r\n"
                . "    }\r\n";
        $rawData .= '}';
        $file->setRawData($rawData);
        $file->write(false, true);
    }
    /**
     * Initialize the array which contains links to all 
     * detected classes.
     */
    private function _buildLinks() {
        $nsClasses = array();
        $this->linksArr['boolean'] = new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean', '_blank');
        $this->linksArr['null'] = new Anchor('http://php.net/manual/en/language.types.null.php', 'null', '_blank');
        $this->linksArr['true'] = new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean', '_blank');
        $this->linksArr['false'] = new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean', '_blank');
        $this->linksArr['NULL'] = new Anchor('http://php.net/manual/en/language.types.null.php', 'null', '_blank');
        $this->linksArr['TRUE'] = new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean', '_blank');
        $this->linksArr['FALSE'] = new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean', '_blank');
        $this->linksArr['int'] = new Anchor('http://php.net/manual/en/language.types.integer.php', 'int', '_blank');
        $this->linksArr['array'] = new Anchor('http://php.net/manual/en/language.types.array.php', 'array', '_blank');
        $this->linksArr['string'] = new Anchor('http://php.net/manual/en/language.types.string.php', 'string', '_blank');
        $this->linksArr['callable'] = new Anchor('http://php.net/manual/en/language.types.callable.php', 'callable', '_blank');
        $this->linksArr['float'] = new Anchor('http://php.net/manual/en/language.types.float.php', 'float', '_blank');
        $this->linksArr['double'] = new Anchor('http://php.net/manual/en/language.types.float.php', 'double', '_blank');
        $this->linksArr['resource'] = new Anchor('http://php.net/manual/en/language.types.resource.php', 'resource', '_blank');
        $this->linksArr['Iterable'] = new Anchor('http://php.net/manual/en/language.types.iterable.php', 'Iterable', '_blank');
        $this->linksArr['boolean'] = new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean', '_blank');
        $this->linksArr['Iterator'] = new Anchor('https://www.php.net/manual/en/class.iterator.php', 'Iterator', '_blank');
        $this->linksArr['Countable'] = new Anchor('https://www.php.net/manual/en/class.countable.php', 'Countable', '_blank');
        $this->linksArr['Exception'] = new Anchor('https://www.php.net/manual/en/class.exception.php', 'Exception', '_blank');
        
        foreach ($this->apiReadersArr as $apiReader){
            $namespaceLink = $apiReader->getNamespace();
            $packageLink2 = str_replace('.', '/', $namespaceLink);
            $cName = $apiReader->getClassName();
            $nsName = $apiReader->getNamespace();
            if($packageLink2 === ''){
                $classLink = $cName;
                $this->routerLinks[str_replace('\\', '/', $nsName).'/'.$cName] = '/'.$this->routRootFolder.'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName)] = '/'.$this->routRootFolder.'NSIndex';
            }
            else{
                $classLink = $packageLink2.'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName).'/'.$cName] = '/'.$this->routRootFolder.str_replace('\\', '/', $packageLink2).'/'.$cName;
                $this->routerLinks[str_replace('\\', '/', $nsName)] = '/'.$this->routRootFolder.str_replace('\\', '/', $packageLink2).'/NSIndex';
            }
            $classLink = trim($this->getBaseURL(),'/').'/'.trim(str_replace('\\', '/', $classLink), '/');
            $this->linksArr[$cName] = new Anchor($classLink, $cName);
            $this->classesLinksByNS[$nsName][] = [
                'label'=>$cName,
                'link'=> $classLink,
                'description' => $apiReader->getClassSummary()
            ];
            try {
                $nsClasses[$nsName][] = new ClassAPI($apiReader);
                foreach ($apiReader->getConstantsNames() as $name){
                    $this->linksArr[$cName.'::'.$name] = new Anchor($classLink.'#'.$name, $cName.'::'.$name);
                }
                foreach ($apiReader->getMethodsNames() as $name){
                    $this->linksArr[$cName.'::'.$name.'()'] = new Anchor($classLink.'#'.$name, $cName.'::'.$name.'()');
                }
            } catch (\Exception $ex) {
                DocGenerator::logMessage($ex->getMessage(), 'e');
            }
        }
        $namespacesNames = array_keys($nsClasses);
        foreach ($nsClasses as $nsName => $classes){
            $ns = new NameSpaceAPI();
            $ns->setName($nsName);
            foreach ($classes as $class){
                $ns->add($class->getName(), [
                    'access-modifier' => $class->getAccessModifier(),
                    'summary' => $class->getSummary()
                ]);
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
                $routesStr .= '        Router::page(['."\n"
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
     * @param NameSpaceAPI $nsObj
     * @param type $options
     * @return boolean
     */
    private function createNSIndexFile($path,$nsObj,$options, WebPage $p){

        $savePath = $path.$nsObj->getName();
        if(Util::isDirectory($savePath, TRUE)){
            $file = new File();
            $file->setPath($savePath);
            if($this->isDynamicPage()){
                $file->setName('NSIndexView.php');
                $file->remove();
                $rawData = '<?php'."\r\n"
                        . 'namespace docGenerator'.$nsObj->getName().";\r\n"
                        . 'use webfiori\docs\apiParser\DocsWebPage as P;'."\r\n"
                        . 'use webfiori\apiParser\NameSpaceAPI;'."\r\n"
                        . "\r\n"
                        . 'class NSIndexView extends P {'."\r\n"
                        . '    public function __construct(){'."\r\n"
                        . '        parent::__construct();'."\r\n"
                        . '        $this->setDescription(\''.$this->escStr($p->getDescription()).'\');'."\r\n"
                        . '        $this->setTitle(\''. $this->escStr($p->getTitle()).'\');'."\r\n";
                $rawData .= '        $nsObj = new NameSpaceAPI(\''.$nsObj->getName().'\',['."\r\n";
                foreach ($nsObj->getAll() as $name => $info) {
                    $rawData .= '        "'.$name.'" => ['."\r\n"
                            . '            "access-modifier" => "'.$info['access-modifier'].'",'."\r\n"
                            . '            "summary" => "'.$info['summary'].'"'."\r\n"
                            . '        ],'."\r\n";
                }
                $rawData .= '        ], ['."\r\n";
                foreach ($nsObj->getSubNamespaces() as $subNs) {
                    $rawData .= "            '$subNs',\r\n";
                }
                $rawData .= '        ]);'."\r\n";
                $rawData .= '        $this->setNSObj($nsObj);'."\r\n";
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
            if ($node->isTextNode()) {
                $code = "        \$el".$parentSuffex."->text('". htmlspecialchars($this->escStr($node->getText()))."');\r\n";
            } else {
                if ($node->childrenCount() != 0) {
                    $code = "        \$el".$parentSuffex."Ch = \$el".$parentSuffex."->addChild('".$node->getNodeName()."'".$this->getAttrsStr($node).", false);\r\n";
                    foreach ($node->children() as $child) {
                        $code .= $this->toPHPCode($child, 0, $parentSuffex);
                    }
                } else {
                    $code = "        \$el".$parentSuffex."->addChild('".$node->getNodeName()."'".$this->getAttrsStr($node).");\r\n";
                }
            }
        } else {
            $code = "        \$el$suffex = new HTMLNode('".$node->getNodeName()."'".$this->getAttrsStr($node).");"."\r\n";
            $code .= "        \$this->insert(\$el$suffex);"."\r\n";
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
            return ', []';
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
    private function createAttrsArrStr(ClassAPI $classAPi) {
        $arr = '        $classAttrsArr = ['."\r\n";
        $attrsJsonArr = [];
        foreach ($classAPi->getClassAttributes() as $attr) {
            $attr instanceof AttributeDef;
            $arr .= "            new AttributeDef(\r\n"
                    . "            '".$attr->getAccessModofier()."',\r\n"
                    . "            '".$attr->getType()."',\r\n"
                    . "            '".$attr->getName()."',\r\n"
                    . "            '". $this->escStr($attr->getSummary())."',\r\n"
                    . "            '". $this->escStr($attr->getDescription())."',\r\n"
                    . "            ),\r\n";
            $attrsJsonArr[] = new \webfiori\json\Json([
                'name' => $attr->getName(),
                'summary' => $attr->getSummary()
            ]);
        }
        
        return $arr.'        ];'."\r\n";
    }
    /**
     * 
     * @param ClassAPI $classAPi
     */
    private function createMethodsArrStr($classAPi) {
        $arr = '        $classMethodsArr = ['."\r\n";
        foreach ($classAPi->getClassMethods() as $meth) {
            $meth instanceof FunctionDef;
            $arr .= '            new FunctionDef(['."\r\n"
                    . "                'name' => '".$meth->getName()."',"."\r\n"
                    . "                'access-modifier' => '".$meth->getAccessModofier()."',"."\r\n"
                    . "                'summary' => '". $this->escStr($meth->getSummary())."',"."\r\n"
                    . "                'description' => '".$this->escStr($meth->getDescription())."',"."\r\n"
                    . "                'params' => ".$this->createParamsArr($meth).","."\r\n"
                    . "                'returns' => ".$this->createMethodReturnArr($meth).""."\r\n"
                    . "            ]),\r\n";
            
            $this->methodsJsonIndexData[] = new \webfiori\json\Json([
                'name' => $classAPi->getName().'::'.$meth->getName().'()',
                'summary' => $meth->getSummary(),
                'link' => $this->getBaseURL(). str_replace('\\', '/', $classAPi->getNameSpace()).'/'.$classAPi->getName().'#'.$meth->getName(),
                'objectID' => hash('sha256',$classAPi->getNameSpace().$classAPi->getName().$meth->getName())
            ]);
        }
        return $arr.'        ];'."\r\n";
    }
    public function createMethodReturnArr(FunctionDef $meth) {
        $retArr = $meth->getReturnTypes();
        $retVal = "[\r\n"
                . "                    'description' => '".$this->escStr($retArr['description'])."',\r\n"
                . "                    'return-types' => [\r\n";
        foreach ($retArr['return-types'] as $retType) {
            if ($retType instanceof Anchor) {
                $link = $retType->getAttribute('href');
                $label = $retType->getChild(0)->getText();
                $retVal .= "                        new Anchor('$link', '$label'),\r\n";
            } else {
                if (strlen($retType) > 0) {
                    $retVal .= "                        '$retType',\r\n";
                }
            }
        }
        
        $retVal .= "                    ]\r\n";       
        $retVal .= "                ]\r\n";
        return $retVal;
    }
    private function createParamsArr(FunctionDef $def) {
        $arr = '['."\r\n";
        foreach ($def->getParameters() as $p) {
            $p instanceof MethodParameter;
            $arr .= "                    '".$p->getName()."' => [\r\n";
            $typeStr = '';
            foreach ($p->getType()->children() as $node) {
                $node instanceof \webfiori\ui\HTMLNode;
                if ($node->getNodeName() != HTMLNode::TEXT_NODE) {
                    $typeStr .= $node->getChild(0)->getText();
                } else {
                    $typeStr .= $node->getText();
                }
            }
            
            $arr .= "                        'type' => '$typeStr',\r\n";
            $arr        .= "                        'description' => '". $this->escStr($p->getDescription())."',\r\n"
                    . "                        'optional' => ".($p->isOptional() === true ? 'true' : 'false').",\r\n";
            $arr .= '                    ],'."\r\n";
        }
        return $arr .= '                ]';
    }
    private function createJsonIndex() {
        $this->createMethodsIndexFile();
        $this->createClassesIndexFile();
        //$this->createAttrsIndexFile();
    }
    public function createMethodsIndexFile() {
        $methFiles = new File($this->getOutputPath().DS.'methods-index.json');
        $methFiles->append('[');
        $comma = '';
        foreach ($this->methodsJsonIndexData as $jObj) {
            $methFiles->append($comma.$jObj);
            $comma = ',';
        }
        $methFiles->append(']');
        $methFiles->write(false, true);
    }
//    private function createAttrsIndexFile() {
//        $methFiles = new File($this->getOutputPath().DS.'attributes-index.json');
//        $methFiles->append('[');
//        $comma = '';
//        foreach ($this->methodsJsonIndexData as $jObj) {
//            $methFiles->append($comma.$jObj);
//            $comma = ',';
//        }
//        $methFiles->append(']');
//        $methFiles->write(false, true);
//    }
    private function createClassesIndexFile() {
        $file = new File($this->getOutputPath().DS.'classes-index.json');
        $file->append('[');
        $comma = '';
        foreach ($this->classesJsonIndexData as $jObj) {
            $file->append($comma.$jObj);
            $comma = ',';
        }
        $file->append(']');
        $file->write(false, true);
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
