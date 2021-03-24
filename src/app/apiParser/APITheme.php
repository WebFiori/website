<?php
namespace webfiori\apiParser;

use webfiori\framework\Theme;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\ClassAPI;
/**
 * A class which can be used to build themes which can be used to show 
 * PHP docs.
 * 
 * @author Ibrahim
 */
abstract class APITheme extends Theme{
    /**
     * The class that the theme will use to create APIs description page.
     * 
     * @var ClassAPI 
     */
    private $class;
    public function __construct() {
        parent::__construct();
    }
    /**
     * Sets the class that the theme will use to create APIs description page.
     * 
     * This function will also set the title of the page to the name of the 
     * given class.
     * 
     * @param ClassAPI $class
     */
    public function setClass($class) {
        if($class instanceof ClassAPI){
            $this->class = $class;
            $this->getPage()->setTitle($class->getAccessModifier().' '.$class->getName());
        }
    }
    /**
     * Creates HTML div node that contains the body of the page.
     * 
     * The node will have the following sub-nodes:
     * <ul>
     * <li>Class description node.</li>
     * <li>Class attributes summary node.</li>
     * <li>Class functions summary node.</li>
     * <li>Class attributes details node.</li>
     * <li>Class functions details node.</li>
     * </ul>
     * 
     * @return HTMLNode
     */
    public function createBodyNode() {
        $body = new HTMLNode();
        $body->setID('api-page-body');
        $body->addChild($this->createClassDescriptionNode());
        $body->addChild($this->createAttrsSummaryBlock());
        $body->addChild($this->createMethodsSummaryBlock());
        $body->addChild($this->createAttrsDetailsBlock());
        $body->addChild($this->createMethodsDetailsBlock());
        return $body;
    }
    /**
     * Returns the class that the theme will use to create APIs description page.
     * 
     * @return ClassAPI|NULL The class that the theme will use to create APIs description page. 
     * if no class is set, the function will return NULL.
     * 
     */
    public function getClass() {
        return $this->class;
    }
    /**
     * Creates an object of type HTMLNode that represents the part of the page 
     * that will contain the summary of class functions.
     * 
     * @param string $nodeName The name of the tag that will hold the summary.
     * 
     * @return HTMLNode|NULL If the class has functions, the function will return 
     * an object of type HTMLNode that contains all functions summary. 
     * If the class has no functions, the function will return NULL.
     * 
     */
    public function createMethodsSummaryBlock($nodeName = 'div'){
        $class = $this->getClass();
        if($class !== null){
            $funcs = $class->getClassMethods();
            if(count($funcs) > 0){
                $summaryNode = new HTMLNode($nodeName, [
                    'class' => 'summary-block methods-summary-block',
                    'id' => 'methods-summary'
                ]);
                $titleNode = new HTMLNode('h3', [
                    'class' => 'block-title methods-block-title'
                ]);
                $titleNode->text('Class Methods Summary');
                $summaryNode->addChild($titleNode);
                foreach ($class->getClassMethods() as $method){
                    $summaryNode->addChild($this->createMethodSummaryBlock($method));
                }
                return $summaryNode;
            }
        }
        return null;
    }
    /**
     * Creates an object of type HTMLNode that represents the part of the page 
     * that will contain the details of class functions.
     * 
     * @param string $nodeName The name of the tag that will hold the summary.
     * 
     * @return HTMLNode|NULL If the class has functions, the function will return 
     * an object of type HTMLNode that contains all functions details. 
     * If the class has no functions, the function will return NULL.
     */
    public function createMethodsDetailsBlock($nodeName = 'div'){
        $class = $this->getClass();
        if($class !== NULL){
            $funcs = $class->getClassMethods();
            if(count($funcs) > 0){
                $detailsNode = new HTMLNode($nodeName, [
                    'class' => 'details-block methods-details-block '
                ]);
                $titleNode = new HTMLNode('h3', [
                    'class' => 'block-title methods-details-block-title'
                ]);
                $titleNode->text('Class Methods Details');
                $detailsNode->addChild($titleNode);
                foreach ($class->getClassMethods() as $method){
                    $detailsNode->addChild($this->createMethodDetailsBlock($method));
                }
                return $detailsNode;
            }
        }
        return NULL;
    }
    /**
     * Creates an object of type HTMLNode that represents the part of the page 
     * that will contain the summary of class attributes.
     * 
     * @param string $nodeName The name of the tag that will hold the summary.
     * 
     * @return HTMLNode|NULL If the class has attributes, the function will return 
     * an object of type HTMLNode that contains all attributes summary. 
     * If the class has no attributes, the function will return NULL.
     * 
     */
    public function createAttrsSummaryBlock($nodeName = 'div'){
        $class = $this->getClass();
        if($class !== null){
            $attrs = $class->getClassAttributes();
            if(count($attrs) > 0){
                $summaryNode = new HTMLNode($nodeName, [
                    'class' => 'summary-block attrs-summary-block',
                    'id' => 'attrs-summary'
                ]);
                $titleNode = new HTMLNode('h3', [
                    'class' => 'block-title attrs-summary-block-title'
                ]);
                $titleNode->text('Class Attributes Summary');
                $summaryNode->addChild($titleNode);
                foreach ($class->getClassAttributes() as $attr){
                        $summaryNode->addChild($this->createAttributeSummaryBlock($attr));
                }
                return $summaryNode;
            }
        }
        return NULL;
    }
    /**
     * Creates an object of type HTMLNode that represents the part of the page 
     * that will contain the details of class attributes.
     * 
     * @return HTMLNode|NULL If the class has attributes, the function will return 
     * an object of type HTMLNode that contains all details. If the class has 
     * no attributes, the function will return NULL.
     * 
     */
    public function createAttrsDetailsBlock($nodeName = 'div'){
        $class = $this->getClass();
        $attrs = $class->getClassAttributes();
        if($class !== NULL){
            if(count($attrs) > 0){
                $detailsNode = new HTMLNode($nodeName, [
                    'class' => 'details-block attrs-details-block',
                    'id' => 'attrs-details'
                ]);
                $titleNode = new HTMLNode('h3', [
                    'class' => 'block-title'
                ]);
                $titleNode->addTextNode('Class Attributes Details');
                $detailsNode->addChild($titleNode);
                foreach ($class->getClassAttributes() as $attr){
                     $detailsNode->addChild($this->createAttributeDetailsBlock($attr));
                }
                return $detailsNode;
            }
        }
        return NULL;
    }
    /**
     * Creates HTMLNode object that contains class function summary.
     * 
     * @param FunctionDef $func An object of type FunctionDef.
     * 
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents summary block of the 
     * function.
     */
    abstract public function createMethodSummaryBlock(FunctionDef $func);
    /**
     * Creates HTMLNode object that contains class function details.
     * 
     * @param FunctionDef $func An object of type FunctionDef.
     * 
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents details block of the 
     * function.
     */
    abstract public function createMethodDetailsBlock(FunctionDef $func);
    /**
     * Creates HTMLNode object that contains class attribute summary.
     * 
     * @param AttributeDef $attr An object of type AttributeDef.
     * 
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents summary block of the 
     * attribute.
     */
    abstract public function createAttributeSummaryBlock(AttributeDef $attr);
    /**
     * Creates HTMLNode object that contains class attribute details.
     * 
     * @param AttributeDef $attr An object of type AttributeDef.
     * 
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents details block of the 
     * attribute.
     */
    abstract public function createAttributeDetailsBlock(AttributeDef $attr);
    /**
     * Creates HTMLNode object that contains class description.
     * 
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents class description block.
     * 
     */
    abstract public function createClassDescriptionNode();
    /**
     * Creates HTMLNode object that contains namespace index file content.
     * 
     * @param NameSpaceAPI $nsObj An object of type NameSpaceAPI.
     * @return HTMLNode The function must be implemented in a way that it returns 
     * an object of type HTMLNode which represents namespace index file content.
     */
    abstract public function createNamespaceContentBlock(NameSpaceAPI $nsObj);
    abstract public function createNSAside($links);
}
