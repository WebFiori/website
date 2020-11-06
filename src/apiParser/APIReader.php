<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
/**
 * Description of APIReader
 *
 * @author Eng.Ibrahim
 */
class APIReader {
    private $asTxt;
    private $textLength;
    private $parsedClassInfo;
    private $lastParsedDocBlock;
    private $lastStmType;

    const DEFS = array(
        'function'=>array(
            'function',
            'public function',
            'private function',
            'protected function',
            'public static function',
            'protected static function',
            'private static function'
        ),
        'abstract function'=>array(
            'abstract function',
            'public abstract function',
            'abstract public function',
            'protected abstract function',
            'abstract protected function',
        ),
        'class-attribute'=>array(
            'public $',
            'private $',
            'protected $',
            'public static $',
            'private static $',
            'protected static $'
        ),
        'class-dec'=>array(
            'class',
            'abstract class',
            'final class',
            'interface'
        ),
        'constant'=>array(
            'const'
        ),
        'global-constant'=>array(
            'define'
        ),
        'namespace'=>array(
            'namespace'
        )
    );
    /**
     * Returns the type of a statement (e.g. function, constant or class declaration).
     * @param string $stm The statement that will be checked.
     * @return array The function will return an associative array that 
     * has two indices:
     * <ul>
     * <li>type: The type of the statement. If it is unknown, the value will 
     * be set to 'NONE'.</li>
     * <li>statement: The original statement.</li>
     * </ul>
     */
    public static function getStatementType($stm) {
        foreach (self::DEFS as $k => $v){
            foreach ($v as $v1){
                if($stm == $v1){
                    return array(
                        'type'=>$k,
                        'statement'=>$stm
                    );
                }
            }
        }
        return array(
            'type'=>'NONE',
            'statement'=>$stm
        );
    }
    private function _extractNameSpace(&$charIndex){
        $ns = '';
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($char == ";"){
                break;
            }
            $ns = $ns.$char;
        }
        return $ns;
    }
    public function __construct($pathToClassFile) {
        DocGenerator::logMessage("Reading API Docs from the file '$pathToClassFile'...");
        $this->parsedClassInfo = array(
            'attributes'=>array(
                'class-constants'=>array(),
                'global-constants'=>array(),
                'class-attributes'=>array()
            ),
            'functions'=>array(),
            'class-def'=>array()
        );
        $insideClass = FALSE;
        if(file_exists($pathToClassFile)){
            $h = fopen($pathToClassFile, 'r');
            if(is_resource($h)){
                $this->asTxt = fread($h, filesize($pathToClassFile));
                fclose($h);
                $this->textLength = strlen($this->getFileText());
                $charIndex = 0;
                $str = '';
                while ($charIndex < $this->getFileSize()){
                    $char = $this->getFileText()[$charIndex];
                    if($char == "\n"){
                        if($str == '/**'){
                            $this->_parseDocBlock($charIndex);
                        }
                        $str = '';
                    }
                    else if($str == '/**'){
                        $this->_parseDocBlock($charIndex);
                        $str = '';
                    }
                    else{
                        $stmType = self::getStatementType($str);
                        $this->lastStmType = $stmType;
                        switch ($stmType['type']){
                            case 'namespace':{
                                $namespace = $this->_extractNameSpace($charIndex);
                                $this->parsedClassInfo['class-def']['namespace'] = $namespace;
                                $str = '';
                                break;
                            }
                            case 'NONE':{
                                if($char != "\r" && $char != "\n"){
                                    if(strlen($str) > 0 || $char != ' '){
                                        $str = $str.$char;
                                    }
                                }
                                break;
                            }
                            case 'class-dec':{
                                $r = $this->_extractClassInfo($charIndex);
                                if($this->lastParsedDocBlock !== null){
                                    foreach ($r as $k => $v){
                                        $this->lastParsedDocBlock[$k] = $v;
                                    }
                                    $this->lastParsedDocBlock['access-modifier'] = $str;
                                    $this->parsedClassInfo['class-def'] = $this->lastParsedDocBlock;
                                    $this->lastParsedDocBlock = null;
                                }
                                else{
                                    $r['access-modifier'] = $str;
                                    $this->parsedClassInfo['class-def'] = $r;
                                }
                                $str = '';
                                break;
                            }
                            case 'constant':{
                                $constNm = $this->_extractConstName($charIndex);
                                if($this->lastParsedDocBlock != NULL){
                                    $this->lastParsedDocBlock['name'] = $constNm;
                                    $this->lastParsedDocBlock['access-modifier'] = $stmType['statement'];
                                    $this->parsedClassInfo['attributes']['class-constants'][] = $this->lastParsedDocBlock;
                                    $this->lastParsedDocBlock = NULL;
                                }
                                else{
                                    $this->parsedClassInfo['attributes']['class-constants'][] = array(
                                        'name'=>$constNm,
                                        'access-modifier'=>$stmType['statement']
                                    );
                                }
                                
                                $str = '';
                                break;
                            }
                            case 'class-attribute':{
                                $name = $this->_extractAttrName($charIndex);
                                if($this->lastParsedDocBlock != NULL){
                                    $this->lastParsedDocBlock['name'] = $name;
                                    $this->lastParsedDocBlock['access-modifier'] = substr($stmType['statement'], 0, strlen($stmType['statement']) - 1);
                                    $this->parsedClassInfo['attributes']['class-attributes'][] = $this->lastParsedDocBlock;
                                    $this->lastParsedDocBlock = NULL;
                                }
                                else{
                                    $this->parsedClassInfo['attributes']['class-attributes'][] = array(
                                        'name'=>$name,
                                        'access-modifier'=>substr($stmType['statement'], 0, strlen($stmType['statement']) - 1)
                                    );
                                }
                                $str = '';
                                break;
                            }
                            case 'function' || 'abstract function':{
                                $fAttrs = $this->_extractFunctionAttrs($charIndex);
                                $fAttrs['access-modifier'] = $stmType['statement'];
                                if($this->lastParsedDocBlock !== NULL){
                                    $this->lastParsedDocBlock['name'] = $fAttrs['name'];
                                    $this->lastParsedDocBlock['access-modifier'] = $fAttrs['access-modifier'];
                                    if(isset($this->lastParsedDocBlock['@param'])){
                                        foreach ($fAttrs['@param'] as $param){
                                            for($x = 0 ; $x < count($this->lastParsedDocBlock['@param']); $x++){
                                                $param2 = $this->lastParsedDocBlock['@param'][$x];
                                                if($param['name'] == $param2['name']){
                                                    if(isset($param['is-optional'])){
                                                        $param2['is-optional'] = $param['is-optional'];
                                                    }
                                                    $this->lastParsedDocBlock['@param'][$x] = $param2;
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        $this->lastParsedDocBlock['@param'] = $fAttrs['@param'];
                                    }
                                    $this->parsedClassInfo['functions'][] = $this->lastParsedDocBlock;
                                    $this->lastParsedDocBlock = NULL;
                                }
                                else{
                                    $this->parsedClassInfo['functions'][] = $fAttrs;
                                }
                                $str = '';
                                break;
                            }
//                            case 'global-constant':{
//                                Logger::log('Global Constan.');
//                                $constNm = $this->_extractGlobalConstant($charIndex);
//                                if($this->lastParsedDocBlock !== NULL){
//                                    $this->lastParsedDocBlock['name'] = $constNm;
//                                    $this->parsedClassInfo['global-constants'][] = $this->lastParsedDocBlock;
//                                    $this->lastParsedDocBlock = NULL;
//                                }
//                                else{
//                                    $this->parsedClassInfo['global-constants'][] = array(
//                                        'name'=>$constNm
//                                    );
//                                }
//                                $str = '';
//                                break;
//                            }
                        }
                    }
                    $charIndex++;
                }
            }
            else{
                
            }
        }
        else{
            echo 'File not found: '.$pathToClassFile.'<br/>';
        }
    }
    public function getClassSummary() {
        $summary = '';
        if(isset($this->parsedClassInfo['class-def']['summary'])){
            $summary = $this->parsedClassInfo['class-def']['summary'];
        }
        return $summary;
    }
    public function getClassDescription() {
        $desc = '';
        if(isset($this->parsedClassInfo['class-def']['description'])){
            $desc = $this->parsedClassInfo['class-def']['description'];
        }
        return $desc;
    }
    /**
     * 
     * @return type
     */
    public function getClassAccessModifier() {
        return $this->parsedClassInfo['class-def']['access-modifier'];
    }
    /**
     * 
     * @return type
     */
    public function getClassName() {
        if(isset($this->parsedClassInfo['class-def']['class-name'])){
            return $this->parsedClassInfo['class-def']['class-name'];
        }
        return 'CLASS_NAME';
    }
    /**
     * Returns the package that the class belongs to.
     * The return value of the function will depend on the tag @package which 
     * can be set for each class. If the tag is not set, the function will 
     * return empty string.
     * @return string The name of the package that the class belongs to.
     * @since 1.0
     */
    public function getPackage() {
        if(isset($this->parsedClassInfo['class-def']['@package'])){
            return $this->parsedClassInfo['class-def']['@package'];
        }
        return '';
    }
    public function getNamespace() {
        if(isset($this->parsedClassInfo['class-def']['namespace'])){
            return '\\'.$this->parsedClassInfo['class-def']['namespace'];
        }
        return '\\';
    }
    private function _extractGlobalConstant(&$charIndex){
        $constName = '';
        $startedParsingName = FALSE;
        $nameExtracted = FALSE;
        while($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($startedParsingName){
                if($char == '\'' || $char == '"'){
                    $nameExtracted = TRUE;
                    $charIndex++;
                    while($charIndex < $this->getFileSize()){
                        $char = $this->getFileText()[$charIndex];
                        if($char == '"' || $char == '\''){
                            $this->skipString($charIndex, $char);
                        }
                        else if($char == ';'){
                            break;
                        }
                    }
                }
                else{
                    $constName .= $char;
                }
            }
            else{
                if(($char == '"' || $char == '\'') && !$startedParsingName){
                    $startedParsingName = TRUE;
                }
            }
            if($nameExtracted){
                break;
            }
            $charIndex++;
        }
        return $constName;
    }
    /**
     * Returns an array that contains the names of class attributes.
     * The Items in the array will be sorted according to the name. If 
     * the class has no attributes, the array will be empty.
     * @return array An array that contains the names of class attributes.
     * @since 1.0
     */
    public function getAttributesNames(){
        $retVal = array();
        foreach ($this->parsedClassInfo['attributes']['class-attributes'] as $attr){
            $retVal[] = trim($attr['name']);
        }
        sort($retVal );
        return $retVal;
    }
    public function getParsedInfo() {
        return $this->parsedClassInfo;
    }
    /**
     * Returns an array that contains the names of class constants.
     * The Items in the array will be sorted according to the name. If 
     * the class has no constants, the array will be empty.
     * @return array An array that contains the names of class constants.
     * @since 1.0
     */
    public function getConstantsNames(){
        $retVal = array();
        foreach ($this->parsedClassInfo['attributes']['class-constants'] as $attr){
            $retVal[] = trim($attr['name']);
        }
        sort($retVal);
        return $retVal;
    }
    /**
     * Returns an array that contains the names of class functions.
     * The Items in the array will be sorted according to the name. If 
     * the class has no functions, the array will be empty.
     * @return array An array that contains the names of class function.
     * @since 1.0
     */
    public function getMethodsNames(){
        $retVal = array();
        foreach ($this->parsedClassInfo['functions'] as $func){
            $retVal[] = trim($func['name']);
        }
        sort($retVal);
        return $retVal;
    }
    /**
     * Returns a DocBlock of class attribute given its name.
     * The array will perform leaner search on the array of class attributes 
     * DocBlocks. If a match is found, the function will return it.
     * @param string $name The name of the attribute.
     * @return array|NULL If a matching DocBlock is found, it is returned. If 
     * no match is found, NULL is returned.
     * @since 1.0
     */
    public function getAttributeDocBlock($name) {
        foreach ($this->parsedClassInfo['attributes']['class-attributes'] as $docBlock){
            if($docBlock['name'] == $name){
                return $docBlock;
            }
        }
        return NULL;
    }
    /**
     * Returns a DocBlock of class constant given its name.
     * The array will perform leaner search on the array of class constants 
     * DocBlocks. If a match is found, the function will return it.
     * @param string $name The name of the constant.
     * @return array|NULL If a matching DocBlock is found, it is returned. If 
     * no match is found, NULL is returned.
     * @since 1.0
     */
    public function getConstDocBlock($name) {
        foreach ($this->parsedClassInfo['attributes']['class-constants'] as $docBlock){
            if($docBlock['name'] == $name){
                return $docBlock;
            }
        }
        return NULL;
    }
    /**
     * Returns a DocBlock of class function given its name.
     * The array will perform leaner search on the array of class functions 
     * DocBlocks. If a match is found, the function will return it.
     * @param string $name The name of the attribute.
     * @return array|NULL If a matching DocBlock is found, it is returned. If 
     * no match is found, NULL is returned.
     * @since 1.0
     */
    public function getFunctionDocBlock($name) {
        foreach ($this->parsedClassInfo['functions'] as $docBlock){
            if(trim($docBlock['name']) == $name){
                return $docBlock;
            }
        }
        return NULL;
    }
    private function _extractFunctionAttrs(&$charIndex){
        $retVal = array(
            'name'=>'',
            '@param'=>array()
        );
        $fName = '';
        $char = $this->getFileText()[$charIndex];
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char != '('){
                $fName .= $char;
            }
            else{
                break;
            }
            $charIndex++;
        }
        $retVal['name'] = $fName;
        $charIndex++;
        $attrNm = '';
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == ')'){
                if(strlen(trim($attrNm)) > 0){
                    $retVal['@param'][] = array(
                        'name'=>$attrNm
                    );
                }
                break;
            }
            else if($char == ','){
                if(strlen(trim($attrNm)) > 0){
                    $retVal['@param'][] = array(
                        'name'=>$attrNm
                    );
                }
                $attrNm = '';
            }
            else if($char == '='){
                if(strlen(trim($attrNm)) > 0){
                    $retVal['@param'][] = array(
                        'name'=>$attrNm,
                        'is-optional'=>TRUE
                    );
                }
                $attrNm = '';
                while ($charIndex < $this->getFileSize()){
                    $char = $this->getFileText()[$charIndex];
                    if($char == '\'' || $char == '"'){
                        $this->skipString($charIndex, $char);
                    }
                    if($char == ',' || $char == ')'){
                        break;
                    }
                    $charIndex++;
                }
            }
            else{
                $attrNm .= $char;
            }
            if($char == ')'){
                break;
            }
            $charIndex++;
        }
        if($this->lastStmType['type'] == 'function'){
            $string = '';
            while ($charIndex < $this->getFileSize() && $char != '{'){
                $char = $this->getFileText()[$charIndex];
                $string .= $char;
                $charIndex++;
            }
            $this->_skipFunctionBlock($charIndex);
        }
        return $retVal;
    }

    private function _extractConstName(&$charIndex){
        $name = '';
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == '='){
                while ($charIndex < $this->getFileSize() && $char != ';'){
                    $charIndex++;
                    $char = $this->getFileText()[$charIndex];
                    if($char == '\'' || $char == '"'){
                        $this->skipString($charIndex, $char);
                    }
                }
                break;
            }
            $name.=$char;
            $charIndex++;
        }
        $toReturn = trim($name);
        return $toReturn;
    }
    private function _extractAttrName(&$charIndex){
        $name = '';
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == ' '){
                while ($charIndex < $this->getFileSize() && $char != ';'){
                    $charIndex++;
                    $char = $this->getFileText()[$charIndex];
                    if($char == '\'' || $char == '"'){
                        $this->skipString($charIndex, $char);
                    }
                }
                break;
            }
            else if($char == ';'){
                break;
            }
            $name.=$char;
            $charIndex++;
        }
        $toReturn = trim($name);
        return $toReturn;
    }
    /**
     * Extract class information.
     * This function will extract the name of the class, the class that this 
     * class is extending (if any) and the interfaces which this class implements 
     * (if any).
     * @param int $charIndex The position of the character at which class name 
     * starts
     * @return array The method will return an associative array which has the 
     * following indices:
     * <ul>
     * <li>class-name: The parsed name of the class.</li>
     * <li>extends: An array that contains the names of 
     * the classes at which this class is extending.</li>
     * <li>implements: An array that contains the names of the interfaces 
     * at which the class implements.</li>
     * </ul>
     */
    private function _extractClassInfo(&$charIndex){
        $infoArr = array(
            'class-name'=>'',
            'extends'=>[],
            'implements'=>[]
        );
        $char = $this->getFileText()[$charIndex];
        //class declaration. Extract class name.
        $classNm = '';
        $charIndex++;
        while ($charIndex < $this->getFileSize()){
            //extract class name
            $char = $this->getFileText()[$charIndex];
            if($char == ' ' || $char == '{'){
                break;
            }
            $classNm .= $char;
            $charIndex++;
        }
        $infoArr['class-name']=$classNm;
        $this->_skipSpaces($charIndex);
        $charIndex++;
        $str = '';
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == ' ' || $char == '{'){
                break;
            }
            $str .= $char;
            $charIndex++;
        }
        if($str == 'extends'){
            $str = '';
            while ($charIndex < $this->getFileSize()){
                $char = $this->getFileText()[$charIndex];
                if($char == ' '){
                    if($str == 'implements'){
                        break;
                    }
                    if(strlen(trim($str)) > 0){
                        $infoArr['extends'][] = $str;
                    }
                    $str = '';
                    $this->_skipSpaces($charIndex);
                }
                else if($char == '{'){
                    if(strlen(trim($str)) > 0){
                        $infoArr['extends'][] = $str;
                    }
                    $str = '';
                    break;
                }
                else{
                    $str .= $char;
                }
                $charIndex++;
            }
        }
        if($str == 'implements'){
            $str = '';
            while ($charIndex < $this->getFileSize()){
                $char = $this->getFileText()[$charIndex];
                if($char == ' ' || $char == ','){
                    if(strlen(trim($str)) > 0){
                        $infoArr['implements'][] = $str;
                    }
                    $str = '';
                    $this->_skipSpaces($charIndex);
                }
                else if($char == '{'){
                    if(strlen(trim($str)) > 0){
                        $infoArr['implements'][] = $str;
                    }
                    $str = '';
                    break;
                }
                else{
                    $str .= $char;
                }
                $charIndex++;
            }
        }
        $charIndex--;
        if(isset($this->parsedClassInfo['class-def']['namespace'])){
            $infoArr['namespace'] = $this->parsedClassInfo['class-def']['namespace'];
        }
        return $infoArr;
    }
    /**
     * Skip spaces between words.
     * The character that the index will be pointing to is the index of 
     * the last detected space.
     * @param type $charIndex
     * @return type
     */
    private function _skipSpaces(&$charIndex) {
        if(isset($this->getFileText()[$charIndex])){
            $char = $this->getFileText()[$charIndex];
        }
        else{
            $char = '';
        }
        if($char == ' '){
            while ($charIndex < $this->getFileSize() && $this->getFileText()[$charIndex] == ' '){
                $charIndex++;
            }
            $charIndex--;
        }
        return $charIndex;
    }
    private function _skipFunctionBlock(&$charIndex){
        $currentBlockNum = 0;
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == '\'' || $char == '"'){
                $this->skipString($charIndex, $char);
            }
            else if($char == '{'){
                $currentBlockNum++;
            }
            else if($char == '}'){
                if($currentBlockNum == 0){
                    break;
                }
                else{
                    $currentBlockNum--;
                }
            }
            $charIndex++;
        }
    }
    /**
     * Skip string.
     * The index at the end of escaping will point to the 
     * character that represents the end of the string (" or ').
     * @param type $charIndex
     * @param type $stringChar
     * @return type
     */
    private function skipString(&$charIndex,$stringChar) {
        $isNextEscaped = FALSE;
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($this->getFileText()[$charIndex] == $stringChar){
                if(!$isNextEscaped){
                    break;
                }
                else{
                    
                }
            }
            if($char == '\\' && !$isNextEscaped){
                $isNextEscaped = TRUE;
            }
            else{
                $isNextEscaped = FALSE;
            }
        }
        return $charIndex;
    }
    /**
     * Returns the size of the file in bytes.
     * It can be the number of characters in the file.
     * @return int Size of the file.
     * @since 1.0
     */
    public function getFileSize() {
        return $this->textLength;
    }
    /**
     * Returns a string that represents the file.
     * @return string The content of the file.
     * @since 1.0
     */
    public function getFileText() {
        return $this->asTxt;
    }
    /**
     * @param type $startCharIndex
     */
    private function _parseDocBlock(&$startCharIndex){
        $char = $this->getFileText()[$startCharIndex];
        while ($char == '*' || $char == ' ' || $char == "\n" || $char == "\r"){
            $startCharIndex++;
            $char = $this->getFileText()[$startCharIndex];
        }
        if($char != '@'){
            $summary = $this->_extractSummary($startCharIndex);
    //        Logger::log('Moving one character forward...');
    //        $startCharIndex++;
    //        Logger::log('Character index after moving forward: '.$startCharIndex, 'debug');
            $description = $this->_extractDescription($startCharIndex);
        }
        else{
            $summary = '';
            $description = '';
        }
        $parsed = array(
            'summary'=> $summary,
            'description'=>$description,
            '@version'=>'',
            '@since'=>'',
            '@author'=>array(),
            '@see'=>array(),
            '@param'=>array(),
            '@throws'=>array(),
            '@depricated'=>array(),
            '@package'=>'',
            '@return'=>array()
        );
        $str = '';
        while ($startCharIndex < $this->getFileSize()){
            $char = $this->asTxt[$startCharIndex];
            if($char == '*'){
                //Might be end of comment.
                $char2 = $this->asTxt[$startCharIndex + 1];
                if($char2 == '/'){
                    //end of comment.
                    break;
                }
            }
            else if($char == '@'){
                $tag = $char;
                $startCharIndex++;
                while ($char != ' ' && ($startCharIndex < $this->getFileSize())){
                    $tagChar = $this->getFileText()[$startCharIndex];
                    if($tagChar == ' '){
                        break;
                    }
                    else{
                        $tag .= $this->getFileText()[$startCharIndex];
                    }
                    $startCharIndex++;
                }
                $extracted = $this->_extractTagInfo($tag, $startCharIndex);
                if($tag == '@since' || $tag == '@version' || $tag == '@package' || $tag == '@var' || $tag == '@return' || $tag == '@throws'){
                    $parsed[$tag] = $extracted;
                }
                else{
                    $parsed[$tag][] = $extracted;
                }
                $str = '';
            }
            else{
                $str .= $char;
            }
            $startCharIndex++;
        }
        $this->lastParsedDocBlock = array();
        foreach ($parsed as $k => $v){
            if(gettype($v) == 'array'){
                if(count($v) > 0){
                    $this->lastParsedDocBlock[$k] = $v;
                }
            }
            else{
                if(strlen($v) > 0){
                    $this->lastParsedDocBlock[$k] = $v;
                }
            }
        }
    }
    private function _extractSingleInfoTag(&$charIndex){
        $vNum = '';
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($char == "\n" || $char == "\r"){
                break;
            }
            else if($char == '*'){
                $char2 = $this->getFileText()[$charIndex+1];
                if($char2 == '/'){
                    break;
                }
            }
            if($char != "\n" && $char != "\r" && $char != '*'){
                $vNum .= $char;
            }
        }
        $charIndex--;
        $vNum = str_replace('<', '&lt;', str_replace('>', '&gt;', $vNum));
        return $vNum;
    }
    private function _extractReturnOrThrowsTag($tag,&$charIndex){
        $retVal = array();
        $returnType = '';
        $returnDesc = '';
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($char == ' '){
                break;
            }
            $returnType .= $char;
        }
        $charIndex++;
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == '@'){
                break;
            }
            else if($char == '*'){
                $char2 = $this->getFileText()[$charIndex+1];
                if($char2 == '/'){
                    break;
                }
            }
            if($char != "\n" && $char != "\r" && $char != '*'){
                $returnDesc .= $char;
            }
            $charIndex++;
        }
        $charIndex--;
        if($tag == '@throws'){
            $retVal['exception-types'] = explode('|', $returnType);
            $retVal['description'] = trim($returnDesc);
        }
        else if($tag == '@return'){
            $retVal['return-types'] = explode('|', $returnType);
            $retVal['description'] = trim($returnDesc);
        }
        return $retVal;
    }
    /**
     * Extract 'param' tag information.
     * The index that the function will start extracting the info from must be 
     * the first character after the space that comes after the 'param' tag. The 
     * string that the character belongs to is the datatype of the parameter. 
     * The function will extract 3 info, the type of the parameter, its name and 
     * description. The function will parse the 'param' tag till it detects 
     * '@' character or the string '*\/'. At the end of function execution, 
     * The index of the character will be pointing to the character before last 
     * detected character.
     * @param type $charIndex
     * @return array 
     */
    private function _extractParamTag(&$charIndex){
        $retVal = array();
        $type = '';
        $name = '';
        $description = '';
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($char == ' '){
                break;
            }
            $type .= $char;
        }
        $charIndex++;
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == ' '){
                break;
            }
            if($char != "\n" && $char != "\r"){
                $name .= $char;
            }
            $charIndex++;
        }
        $charIndex++;
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == '@'){
                break;
            }
            else if($char == '*'){
                $char2 = $this->getFileText()[$charIndex+1];
                if($char2 == '/'){
                    break;
                }
            }
            if($char != "\n" && $char != "\r" && $char != '*'){
                $description .= $char;
            }
            $charIndex++;
        }
        $charIndex--;
        $retVal['type'] = $type;
        $retVal['name'] = $name;
        $retVal['description'] = trim($description);
        return $retVal;
    }
    private function _extractTagInfo($tag,&$charIndex){
        $retVal = array();
        if($tag == '@return' || $tag == '@throws'){
            $retVal = $this->_extractReturnOrThrowsTag($tag,$charIndex);
        }
        else if($tag == '@param'){
            $retVal = $this->_extractParamTag($charIndex);
        }
        else if($tag == '@var'){
            $retVal = $this->_extractVarTagInfo($charIndex);
        }
        else if($tag == '@package' || $tag == '@since' || $tag == '@version' || $tag == '@author'){
            $retVal = $this->_extractSingleInfoTag($charIndex);
        }
        else{
            
        }
        return $retVal;
    }
    /**
     * Extract the information from @var tag.
     * @param type $charIndex
     * @return type
     */
    private function _extractVarTagInfo(&$charIndex){
        $retVal = array();
        $type = '';
        $nameOrDesc = '';
        $description = '';
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($char == ' '){
                break;
            }
            $type .= $char;
        }
        $charIndex++;
        $this->_skipSpaces($charIndex);
        $isName = FALSE;
        $firstLoopRun = TRUE;
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($isName || $firstLoopRun){
                if($char == ' '){
                    break;
                }
                if($char != "\n" && $char != "\r"){
                    $nameOrDesc .= $char;
                }
                if($char == '$' && $firstLoopRun){
                    $isName = TRUE;
                }
                $firstLoopRun = FALSE;
            }
            else{
                $char = $this->getFileText()[$charIndex];
                if($char == '@'){
                    break;
                }
                else if($char == '*'){
                    $char2 = $this->getFileText()[$charIndex+1];
                    if($char2 == '/'){
                        break;
                    }
                }
                if($char != "\n" && $char != "\r" && $char != '*'){
                    $nameOrDesc .= $char;
                }
            }
            $charIndex++;
        }
        if($isName){
            $charIndex++;
            while ($charIndex < $this->getFileSize()){
                $char = $this->getFileText()[$charIndex];
                if($char == '@'){
                    break;
                }
                else if($char == '*'){
                    $char2 = $this->getFileText()[$charIndex+1];
                    if($char2 == '/'){
                        break;
                    }
                }
                if($char != "\n" && $char != "\r" && $char != '*'){
                    $description .= $char;
                }
                $charIndex++;
            }
        }
        $charIndex--;
        $retVal['type'] = $type;
        if($isName){
            $retVal['name'] = $nameOrDesc;
            $retVal['description'] = trim($description);
        }
        else{
            $retVal['description'] = trim($nameOrDesc);
        }
        return $retVal;
    }
    /**
     * Extract description text from DocBlock.
     * A description is the second thing that appears in DocBlock. It is 
     * an optional text.
     * The function will stop parsing the description text if one of the 
     * following conditions is met:
     * <ul>
     * <li>If last detected character is '*' followed by '/'.</li>
     * <li>If last detected character is '@'.</li>
     * </ul>
     * The value of the index will be the index of last character detected.
     * @param int $startIndex The index at which the description of DocBlock 
     * starts.
     * @return string The parsed description.
     */
    private function _extractDescription(&$startIndex){
        $description = '';
        while ($startIndex < $this->getFileSize()){
            $char = $this->getFileText()[$startIndex];
            if($char == '*'){
                $ch2 = $this->getFileText()[$startIndex + 1];
                if($ch2 == '/'){
                    break;
                }
            }
            else if($char == '@'){
                break;
            }
            else{
                if($char != "\n" && $char != "\r"){
                    $description .= $char;
                }
            }
            $startIndex++;
        }
        return trim($description);
    }
    /**
     * Extract summary text from DocBlock.
     * A summary is the first thing that appears in DocBlock.
     * The function will stop parsing the summary text if one of the 
     * following conditions is met:
     * <ul>
     * <li>If last detected character is '*'.</li>
     * <li>If last detected character is '.'.</li>
     * <li>If last detected character is '\n'.</li>
     * </ul>
     * The value of the index will be the index of last character detected.
     * @param int $startIndex The index at which the summary of DocBlock 
     * starts.
     * @return string The parsed summary.
     */
    private function _extractSummary(&$startIndex){
        $summary = '';
        $mightBeDocBlockEnd = FALSE;
        while ($startIndex < $this->getFileSize()){
            $char = $this->getFileText()[$startIndex];
            if($char == '/' && $mightBeDocBlockEnd){
                $summary.= '.';
                break;
            }
            else if($char == '.' || $char == '@'){
                if($char == '.'){
                    $startIndex++;
                    $summary.= '.';
                }
                break;
            }
            else if($char == '*'){
                //just skip it. Or it is end of DocBlock.
                $mightBeDocBlockEnd = TRUE;
            }
            else{
                $mightBeDocBlockEnd = FALSE;
                if($char != "\n" && $char != "\r"){
                    $summary .= $char;
                }
            }
            $startIndex++;
        }
        return trim($summary);
    }
}
