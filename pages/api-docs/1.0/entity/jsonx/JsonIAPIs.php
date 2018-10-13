<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class JsonIAPIs extends APIView{
    private $class;
    public function __construct() {
        parent::__construct();
        $this->class = new ClassAPI();
        $this->class->setPackage('webfiori/entity/jsonx');
        $this->class->setName('JsonI');
        $this->defineClassAttributes();
        $this->defineClassFunctions();
        new APIPage($this->class);
    }

    public function defineClassFunctions() {
        $f1 = new FunctionDef();
        $f1->setName('');
        $f1->setAccessModifier('');
        $f1->setShortDescription('');
        $f1->setLongDescription('');
        $this->class->addFunction($f1);
        
        $f2 = new FunctionDef();
        $f2->setName('');
        $f2->setAccessModifier('');
        $f2->setShortDescription('');
        $f2->setLongDescription('');
        $this->class->addFunction($f2);
        
        $f3 = new FunctionDef();
        $f3->setName('');
        $f3->setAccessModifier('');
        $this->class->addFunction($f3);
        
        $f4 = new FunctionDef();
        $f4->setName('');
        $f4->setAccessModifier('');
        $this->class->addFunction($f4);
        
        $f5 = new FunctionDef();
        $f5->setName('');
        $f5->setAccessModifier('');
        $this->class->addFunction($f5);
        
        $f6 = new FunctionDef();
        $f6->setName('');
        $f6->setAccessModifier('');
        $this->class->addFunction($f6);
        
        $f7 = new FunctionDef();
        $f7->setName('');
        $f7->setAccessModifier('');
        $this->class->addFunction($f7);
        
        $f8 = new FunctionDef();
        $f8->setName('');
        $f8->setAccessModifier('');
        $this->class->addFunction($f8);
        
        $f9 = new FunctionDef();
        $f9->setName('');
        $f9->setAccessModifier('');
        $this->class->addFunction($f9);
        
        $f10 = new FunctionDef();
        $f10->setName('');
        $f10->setAccessModifier('');
        $this->class->addFunction($f10);
        
        $f11 = new FunctionDef();
        $f11->setName('');
        $f11->setAccessModifier('');
        $this->class->addFunction($f11);
        
        $f12 = new FunctionDef();
        $f12->setName('');
        $f12->setAccessModifier('');
        $this->class->addFunction($f12);
        
        $f13 = new FunctionDef();
        $f13->setName('');
        $f13->setAccessModifier('');
        $this->class->addFunction($f13);
        
        $f14 = new FunctionDef();
        $f14->setName('');
        $f14->setAccessModifier('');
        $this->class->addFunction($f14);
        
        $f15 = new FunctionDef();
        $f15->setName('');
        $f15->setAccessModifier('');
        $this->class->addFunction($f15);
        
        $f16 = new FunctionDef();
        $f16->setName('');
        $f16->setAccessModifier('');
        $this->class->addFunction($f16);
        
        $f17 = new FunctionDef();
        $f17->setName('');
        $f17->setAccessModifier('');
        $this->class->addFunction($f17);
        
        $f18 = new FunctionDef();
        $f18->setName('');
        $f18->setAccessModifier('');
        $this->class->addFunction($f18);
        
        $f19 = new FunctionDef();
        $f19->setName('');
        $f19->setAccessModifier('');
        $this->class->addFunction($f19);
        
        $f20 = new FunctionDef();
        $f20->setName('');
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
new JsonIAPIs();