<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class WebFioriAPIs extends ClassAPIView{
    private $class;
    public function __construct() {
        parent::__construct();
        $this->class = new ClassAPI();
        $this->class->setPackage('webfiori');
        $this->class->setName('WebFiori');
        $this->defineClassAttributes();
        $this->defineClassFunctions();
        new APIPage($this->class);
    }

    public function defineClassFunctions() {
        $f1 = new FunctionDef();
        $f1->setName('__construct');
        $f1->setAccessModifier('private');
        $f1->setShortDescription('The entry point for initiating the system.');
        $f1->setLongDescription('The entry point for initiating the system. '
                . 'The process of initializing the system involevs '
                . 'the following:'
                . '<ul>'
                . '<li>Initializing system constants.</li>'
                . '<li>Setting memory limit to 2GB. Can be changed manually.</li>'
                . '<li>Loading the class <a href="docs/1.0/entity/AutoLoader" style="font-family:monospace">AutoLoader</a> '
                . 'which is used to load all other '
                . 'system components.</li>'
                . '<li>The initialization of the 3 core logic classes: <a href="docs/1.0/functions/SystemFunctions" style="font-family:monospace">SystemFunctions</a>,'
                . ' <a href="docs/1.0/functions/WebsiteFunctions" style="font-family:monospace">WebsiteFunctions</a> and <a href="docs/1.0/functions/BasicMailFunctions" style="font-family:monospace">BasicMailFunctions</a>.</li>'
                . '<li>Initialization of routes.</li>'
                . '<li>Creating configuration files (if missing).</li>'
                . '<li>Check for system configuration status.</li>'
                . '</ul>');
        $this->class->addFunction($f1);
        
        $f2 = new FunctionDef();
        $f2->setName('configErr');
        $f2->setAccessModifier('public static');
        $f2->setShortDescription('Show an error message that tells the user about system status and how to configure it.');
        $f2->setLongDescription('Show an error message that tells the user about system status and how to configure it.');
        $this->class->addFunction($f2);
        
        $f3 = new FunctionDef();
        $f3->setName('firstUse');
        $f3->setAccessModifier('');
        $this->class->addFunction($f3);
        
        $f4 = new FunctionDef();
        $f4->setName('getAndStart');
        $f4->setAccessModifier('');
        $this->class->addFunction($f4);
        
        $f5 = new FunctionDef();
        $f5->setName('getAutoloader');
        $f5->setAccessModifier('');
        $this->class->addFunction($f5);
        
        $f6 = new FunctionDef();
        $f6->setName('getBasicMailFunctions');
        $f6->setAccessModifier('');
        $this->class->addFunction($f6);
        
        $f7 = new FunctionDef();
        $f7->setName('getClassStatus');
        $f7->setAccessModifier('');
        $this->class->addFunction($f7);
        
        $f8 = new FunctionDef();
        $f8->setName('&getSysFunctions');
        $f8->setAccessModifier('');
        $this->class->addFunction($f8);
        
        $f9 = new FunctionDef();
        $f9->setName('getSystemStatus');
        $f9->setAccessModifier('');
        $this->class->addFunction($f9);
        
        $f10 = new FunctionDef();
        $f10->setName('&getWebsiteFunctions');
        $f10->setAccessModifier('');
        $this->class->addFunction($f10);
        
        $f11 = new FunctionDef();
        $f11->setName('initCron');
        $f11->setAccessModifier('');
        $this->class->addFunction($f11);
        
        $f12 = new FunctionDef();
        $f12->setName('initPermissions');
        $f12->setAccessModifier('');
        $this->class->addFunction($f12);
        
        $f13 = new FunctionDef();
        $f13->setName('initRoutes');
        $f13->setAccessModifier('');
        $this->class->addFunction($f13);
        
        $f14 = new FunctionDef();
        $f14->setName('needConfigration');
        $f14->setAccessModifier('');
        $this->class->addFunction($f14);
        
        $f15 = new FunctionDef();
        $f15->setName('setAutoloadDirectories');
        $f15->setAccessModifier('');
        $this->class->addFunction($f15);
        
        $f16 = new FunctionDef();
        $f16->setName('setDatabaseConnection');
        $f16->setAccessModifier('');
        $this->class->addFunction($f16);
        
        $f17 = new FunctionDef();
        $f17->setName('setWebsiteAttributes');
        $f17->setAccessModifier('');
        $this->class->addFunction($f17);
        
        $f18 = new FunctionDef();
        $f18->setName('sysStatus');
        $f18->setAccessModifier('');
        $this->class->addFunction($f18);
        
        $f19 = new FunctionDef();
        $f19->setName('sysStatus');
        $f19->setAccessModifier('');
        $this->class->addFunction($f19);
        
        $f20 = new FunctionDef();
        $f20->setName('sysStatus');
        $f20->setAccessModifier('');
        $this->class->addFunction($f20);
    }

    public function defineClassAttributes() {
        $a1 = new AttributeDef();
        $a1->setName('');
        $a1->setAccessModifier('');
        $a1->setShortDescription('');
        $a1->setLongDescription('');
        $this->class->addAttribute($a1);
        
        $a2 = new AttributeDef();
        $a2->setName('');
        $a2->setAccessModifier('');
        $a2->setShortDescription('');
        $a2->setLongDescription('');
        $this->class->addAttribute($a2);
        
        $a3 = new AttributeDef();
        $a3->setName('');
        $a3->setAccessModifier('');
        $this->class->addAttribute($a3);
        
        $a4 = new AttributeDef();
        $a4->setName('');
        $a4->setAccessModifier('');
        $this->class->addAttribute($a4);
        
        $a5 = new AttributeDef();
        $a5->setName('');
        $a5->setAccessModifier('');
        $this->class->addAttribute($a5);
        
        $a6 = new AttributeDef();
        $a6->setName('');
        $a6->setAccessModifier('');
        $this->class->addAttribute($a6);
        
        $a7 = new AttributeDef();
        $a7->setName('');
        $a7->setAccessModifier('');
        $this->class->addAttribute($a7);
        
        $a8 = new AttributeDef();
        $a8->setName('');
        $a8->setAccessModifier('');
        $this->class->addAttribute($a8);
        
        $a9 = new AttributeDef();
        $a9->setName('');
        $a9->setAccessModifier('');
        $this->class->addAttribute($a9);
        
        $a10 = new AttributeDef();
        $a10->setName('');
        $a10->setAccessModifier('');
        $this->class->addAttribute($a10);
    }

}
new WebFioriAPIs();