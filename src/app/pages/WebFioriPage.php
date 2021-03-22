<?php
namespace webfiori\views;
use webfiori\framework\Page;
use webfiori\framework\Webfiori;
use webfiori\ui\ListItem;
use webfiori\ui\Anchor;
use webfiori\ui\HTMLNode;
use webfiori\ui\Paragraph;
use webfiori\framework\ui\WebPage;
use webfiori\json\Json;
use webfiori\ui\JsCode;
/**
 * Description of WebFioriPage
 *
 * @author Ibrahim
 */
class WebFioriPage extends WebPage{
    /**
     *
     * @var JsCode 
     */
    private $topInlineJs;
    /**
     * A json object that holds backend data. Used to send data to 
     * frontend.
     * 
     * @var Json 
     */
    private $jsonData;
    /**
     * Creates new instance of the class.
     * @param array $options An associative array of options. 
     * Available options are:
     * <ul>
     * <li><b>title</b>: The title of the page. If not provided, the value 
     * 'WebFiori Page' is used.</li>
     * <li><b>description</b>: The description of the page. If not provided, 
     * the global description which is stored in the class 'SiteConfig' is 
     * used.</li>
     * <li><b>site-name</b>: The name of the website. If not provided, 
     * the global website which is stored in the class 'SiteConfig' is 
     * used.</li>
     * <li><b>canonical</b>: The canonical link of the page.</li>
     * </ul>
     */
    public function __construct($options=array()) {
        parent::__construct();
        
        $this->setTheme();
        if(isset($options['title'])){
            $this->setTitle($options['title']);
        }
        if(isset($options['description'])){
            $this->setDescription($options['description']);
        }
        $this->jsonData = new Json([
            'snackbar' => new Json([
                'visible' => false,
                'color' => '',
                'text' => '',
            ]),
            'is_rtl' => $this->getTranslation()->getWritingDir() == 'rtl'
        ]);
        $this->topInlineJs = new JsCode();
    }
    /**
     * Creates HTML node of type 'img'
     * @param string $src The value of the attribute 'src'.
     * @param string $alt The value of the attribute 'alt'.
     * @return HTMLNode
     */
    public function createImag($src,$alt='') {
        $img = new HTMLNode('img', [
            'src' => $src,
            'alt' => $alt,
        ]);
        $img->setStyle([
            'height'=>'auto',
            'max-width'=>'100%',
            'border' => '1px solid'
        ]);
        return $img;
    }
    public function getWFBG() {
        $img = $this->createImag('assets/images/WFLogo512.png');
        $img->setStyle([
            'background-position' => 'left',
            'opacity' => '0.3',
            'position' => 'fixed',
            'top' => 0,
            'left' => '50px',
            'z-index' => -1,
            'border' => '0px solid'
        ],true);
        return $img;
    }
    /**
     * 
     * @param type $link
     * @param type $label
     * @return ListItem
     */
    public function createLinkListItem($link,$label,$target='_self') {
        $li00 = new ListItem();
        $link00 = new Anchor($link, $label,$target);
        $li00->addChild($link00);
        return $li00;
    }
    /**
     * Creates new paragraph node.
     * @param string $text The text that will be shown in the paragraph body.
     * @return Patagraph An object of type 'Paragraph'.
     */
    public function createParagraph($text) {
        $p = new Paragraph();
        $p->addText($text,array(
            'esc-entities'=>FALSE
        ));
        return $p;
    }
    /**
     * Creates HTMLNode of type 'section' with a heading.
     * @param string $title The title that will be in the heading node.
     * @param int $hLevel Heading level. The method will only accepts 
     * 1 up to 6 as value. If invalid value is provided, 1 is used as default.
     * @param string $secId The value of the attribute 'id' for the 
     * 'h' element. Default is null.
     * @return HTMLNode
     */
    public function createSection($title,$hLevel=3,$secId=null) {
        
        $sec = new HTMLNode('section');
        $hLevelX = $hLevel > 0 && $hLevel < 7 ? $hLevel : 1;
        $h = new HTMLNode('h'.$hLevelX);
        $h->addTextNode($title);
        $sec->addChild($h);
        if($secId !== null){
            $h->setID($secId);
        }
        return $sec;
    }
    /**
     * 
     * @param string $title
     * @param string $ans
     * @return HTMLNode
     */
    public function createQuestionBox($title, $ans) {
        $questionSec = $this->createSection($title, 4);
        $questionSec->setClassName('question-box', false);
        $questionSec->setAttributes([
            'itemscope', 
            'itemtype'=>"http://schema.org/Question"
        ]);
        $questionSec->getChild(0)->setAttribute('itemprop', 'name');
        $answerBox = new HTMLNode();
        $answerBox->setAttributes([
            'itemprop'=>"suggestedAnswer acceptedAnswer",
            'itemscope',
            'itemtype'=>"http://schema.org/Answer"
        ]);
        $answerBox->setClassName('answer-box');
        $answerTxt = new HTMLNode();
        $answerTxt->setClassName('answer-text');
        $answerTxt->setAttribute('itemprop',"text");
        $answerBox->addChild($answerTxt);
        $answerBox->addTextNode($ans, false);
        $questionSec->addChild($answerBox);
        return $questionSec;
    }
    /**
     * Adds an inline JavAscript code to the &gt;head&lt; tag of the page.
     * 
     * this is mainly used to initialize JavAscript variables that might be used 
     * in front-end.
     * 
     * @param string $code A valid JavaScript code as string.
     */
    public function addInlineJs($code) {
        $this->getTopInlineJs()->addCode($code."\n");
    }
    /**
     * Returns the object that holds the inline JavaScript code.
     * 
     * @return JsCode
     */
    public function getTopInlineJs() {
        return $this->topInlineJs;
    }
    /**
     * Returns an object of type Json that contains all JSON attributes.
     * 
     * Initially, the object will contain all common attributes for all pages.
     * 
     * @return Json
     * 
     */
    public function getJson() {
        return $this->jsonData;
    }
    /**
     * Adds a set of attributes to the json data.
     * 
     * @param array $arrOfAttrs An associative array. The indices of the array 
     * are attributes names and the value of each index is the value that will 
     * be passed.
     */
    public function addToJson($arrOfAttrs) {
        foreach ($arrOfAttrs as $attrKey => $attrVal) {
            $this->getJson()->add($attrKey, $attrVal);
        }
    }
}
