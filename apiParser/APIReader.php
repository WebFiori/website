<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace webfiori\apiParser;
use webfiori\entity\Logger;
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
        $this->parsedClassInfo = array(
            'attributes'=>array(
                'class-constants'=>array(),
                'global-constants'=>array(),
                'class-attributes'=>array()
            ),
            'functions'=>array(),
            'class-def'=>array()
        );
        Logger::log('Starting API procesing of the file \''.$pathToClassFile.'\'.');
        Logger::log('Checking if file exist...');
        $insideClass = FALSE;
        if(file_exists($pathToClassFile)){
            Logger::log('Opening file in read only mode.');
            $h = fopen($pathToClassFile, 'r');
            if(is_resource($h)){
                Logger::log('File opend.');
                Logger::log('Reading file...');
                $this->asTxt = fread($h, filesize($pathToClassFile));
                Logger::log('Done. Closing the file...');
                fclose($h);
                Logger::log('Done.');
                Logger::log('File size: '.$this->getFileSize(), 'debug');
                $this->textLength = strlen($this->getFileText());
                $charIndex = 0;
                $str = '';
                Logger::log('Starting the process of parsing file...');
                while ($charIndex < $this->getFileSize()){
                    Logger::log('Character index: '.$charIndex, 'debug');
                    $char = $this->getFileText()[$charIndex];
                    Logger::log('Character: \''.$char.'\'', 'debug');
                    Logger::log('Constructed string = \''.$str.'\'.', 'debug');
                    Logger::log('Checking character type...');
                    if($char == "\n"){
                        Logger::log('New line character detected.');
                        Logger::log('Checking if constructed string is the start of a DocBlock...');
                        if($str == '/**'){
                            Logger::log('It is the start of DocBlock.');
                            $this->_parseDocBlock($charIndex);
                        }
                        $str = '';
                    }
                    else if($str == '/**'){
                        Logger::log('DocBlock start detected.');
                        $this->_parseDocBlock($charIndex);
                        $str = '';
                    }
                    else{
                        Logger::log('Checking constructed string type...');
                        $stmType = self::getStatementType($str);
                        switch ($stmType['type']){
                            case 'namespace':{
                                $namespace = $this->_extractNameSpace($charIndex);
                                $this->parsedClassInfo['class-def']['namespace'] = $namespace;
                                $str = '';
                                break;
                            }
                            case 'NONE':{
                                Logger::log('It does not mean any thing.');
                                if($char != "\r" && $char != "\n"){
                                    if(strlen($str) > 0 || $char != ' '){
                                        Logger::log('Appending character to the string...');
                                        $str = $str.$char;
                                    }
                                }
                                break;
                            }
                            case 'class-dec':{
                                Logger::log('It is class declaration.');
                                $r = $this->_extractClassInfo($charIndex);
                                if($this->lastParsedDocBlock !== NULL){
                                    foreach ($r as $k => $v){
                                        $this->lastParsedDocBlock[$k] = $v;
                                    }
                                    $this->lastParsedDocBlock['access-modifier'] = $str;
                                    $this->parsedClassInfo['class-def'] = $this->lastParsedDocBlock;
                                    $this->lastParsedDocBlock = NULL;
                                }
                                else{
                                    $r['access-modifier'] = $str;
                                    $this->parsedClassInfo['class-def'] = $r;
                                }
                                $str = '';
                                break;
                            }
                            case 'constant':{
                                Logger::log('It is constant declaration.');
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
                                Logger::log('It is class attribute.');
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
                            case 'function':{
                                Logger::log('It is a function.');
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
        Logger::logFuncCall(__METHOD__);
        $constName = '';
        $startedParsingName = FALSE;
        $nameExtracted = FALSE;
        while($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($startedParsingName){
                if($char == '\'' || $char == '"'){
                    Logger::log('Extracted name = \''.$constName.'\'.');
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
        Logger::logReturnValue($constName);
        Logger::logFuncReturn(__METHOD__);
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
        Logger::logFuncCall(__METHOD__);
        $retVal = array(
            'name'=>'',
            '@param'=>array()
        );
        $fName = '';
        $char = $this->getFileText()[$charIndex];
        Logger::log('Extracting function name...');
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
        Logger::log('Extracted name = \''.$fName.'\'.', 'debug');
        Logger::log('Extracting attributes...');
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
                Logger::log('Parameter found.');
                if(strlen(trim($attrNm)) > 0){
                    $retVal['@param'][] = array(
                        'name'=>$attrNm
                    );
                }
                $attrNm = '';
            }
            else if($char == '='){
                Logger::log('Optional parameter found.');
                if(strlen(trim($attrNm)) > 0){
                    $retVal['@param'][] = array(
                        'name'=>$attrNm,
                        'is-optional'=>TRUE
                    );
                }
                $attrNm = '';
                Logger::log('Skipping default value...');
                while ($charIndex < $this->getFileSize()){
                    $char = $this->getFileText()[$charIndex];
                    Logger::log('Character = \''.$char.'\'.','debug');
                    if($char == '\'' || $char == '"'){
                        $this->skipString($charIndex, $char);
                    }
                    if($char == ',' || $char == ')'){
                        break;
                    }
                    $charIndex++;
                }
                Logger::log('Skipped.');
            }
            else{
                Logger::log('Appending character to parameter name...');
                $attrNm .= $char;
                Logger::log('Constructed attribute name = \''.$attrNm.'\'.','debug');
            }
            if($char == ')'){
                Logger::log('Stopping the loop.');
                break;
            }
            $charIndex++;
        }
        Logger::log('Skipping till character \'{\'...');
        $string = '';
        while ($charIndex < $this->getFileSize() && $char != '{'){
            $char = $this->getFileText()[$charIndex];
            Logger::log('Character = \''.$char.'\'.','debug');
            $string .= $char;
            Logger::log($string);
            $charIndex++;
        }
        Logger::log('Done.');
        Logger::log('Skipping function code block...');
        $this->_skipFunctionBlock($charIndex);
        Logger::log('Done.');
        Logger::logReturnValue($retVal);
        Logger::logFuncReturn(__METHOD__);
        return $retVal;
    }

    private function _extractConstName(&$charIndex){
        Logger::logFuncCall(__METHOD__);
        $name = '';
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            Logger::log('Checking character if its equal sign...');
            Logger::log('Character = '.$char,'debug');
            if($char == '='){
                Logger::log('It is equal sign. Breaking the loop.');
                Logger::log('Skipping to the end of the statement...');
                while ($charIndex < $this->getFileSize() && $char != ';'){
                    $charIndex++;
                    $char = $this->getFileText()[$charIndex];
                    if($char == '\'' || $char == '"'){
                        $this->skipString($charIndex, $char);
                    }
                }
                break;
            }
            Logger::log('Not equal sign. Moving to next character.');
            $name.=$char;
            $charIndex++;
        }
        $toReturn = trim($name);
        Logger::logReturnValue($toReturn);
        Logger::logFuncReturn(__METHOD__);
        return $toReturn;
    }
    private function _extractAttrName(&$charIndex){
        Logger::logFuncCall(__METHOD__);
        $name = '';
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            Logger::log('Checking character if its space...');
            Logger::log('Character = '.$char,'debug');
            if($char == ' '){
                Logger::log('It is space. Breaking the loop.');
                Logger::log('Skipping to the end of the statement...');
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
            Logger::log('Not space. Moving to next character.');
            $name.=$char;
            $charIndex++;
        }
        $toReturn = trim($name);
        Logger::logReturnValue($toReturn);
        Logger::logFuncReturn(__METHOD__);
        return $toReturn;
    }
    /**
     * Extract class information.
     * This function will extract 
     * @param type $charIndex
     * @return type
     */
    private function _extractClassInfo(&$charIndex){
        Logger::logFuncCall(__METHOD__);
        $infoArr = array(
            'class-name'=>'',
            'extends'=>array(),
            'implements'=>array()
        );
        $char = $this->getFileText()[$charIndex];
        Logger::log('Extracting class name...');
        //class declaration. Extract class name.
        $classNm = '';
        $charIndex++;
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == ' ' || $char == '{'){
                break;
            }
            $classNm .= $char;
            $charIndex++;
        }
        Logger::log('Extracted name: \''.$classNm.'\'.','debug');
        $infoArr['class-name']=$classNm;
        $this->_skipSpaces($charIndex);
        $charIndex++;
        $str = '';
        Logger::log('Checking next keyword...');
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            if($char == ' ' || $char == '{'){
                break;
            }
            $str .= $char;
            $charIndex++;
        }
        Logger::log('Word = \''.$str.'\'.', 'debug');
        if($str == 'extends'){
            $str = '';
            Logger::log('Extracting extended class name...');
            while ($charIndex < $this->getFileSize()){
                Logger::log('Char index = '.$charIndex, 'debug');
                $char = $this->getFileText()[$charIndex];
                Logger::log('Character = '.$char, 'debug');
                if($char == ' '){
                    Logger::log('Space detected. Checking constructed string...');
                    Logger::log('String = \''.$str.'\'', 'debug');
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
                    Logger::log('\'{\' detected. Checking constructed string...');
                    Logger::log('String = \''.$str.'\'', 'debug');
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
            Logger::log('Extracting implemented interfaces...');
            $str = '';
            while ($charIndex < $this->getFileSize()){
                Logger::log('Char index = '.$charIndex, 'debug');
                $char = $this->getFileText()[$charIndex];
                Logger::log('Character = '.$char, 'debug');
                if($char == ' ' || $char == ','){
                    Logger::log('Space detected or comma. Checking constructed string...');
                    Logger::log('String = \''.$str.'\'', 'debug');
                    if(strlen(trim($str)) > 0){
                        $infoArr['implements'][] = $str;
                    }
                    $str = '';
                    $this->_skipSpaces($charIndex);
                }
                else if($char == '{'){
                    Logger::log('{ detected. Checking constructed string...');
                    Logger::log('String = \''.$str.'\'', 'debug');
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
        Logger::logReturnValue($infoArr);
        Logger::logFuncReturn(__METHOD__);
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
        Logger::logFuncCall(__METHOD__);
        if(isset($this->getFileText()[$charIndex])){
            $char = $this->getFileText()[$charIndex];
        }
        else{
            $char = '';
        }
        if($char == ' '){
            while ($charIndex < $this->getFileSize() && $this->getFileText()[$charIndex] == ' '){
                $charIndex++;
                Logger::log('Index = '.$charIndex, 'debug');
            }
            $charIndex--;
        }
        Logger::logReturnValue($charIndex);
        Logger::logFuncReturn(__METHOD__);
        return $charIndex;
    }
    private function _skipFunctionBlock(&$charIndex){
        Logger::logFuncCall(__METHOD__);
        $currentBlockNum = 0;
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            Logger::log('Character index = '.$charIndex, 'debug');
            Logger::log('Character = '.$char, 'debug');
            Logger::log('Checking character type...');
            if($char == '\'' || $char == '"'){
                Logger::log('String detected. Skipping it.');
                $this->skipString($charIndex, $char);
            }
            else if($char == '{'){
                Logger::log('Code block start detected. Incrementing block number.');
                $currentBlockNum++;
                Logger::log('New block number: '.$currentBlockNum, 'debug');
            }
            else if($char == '}'){
                Logger::log('Code block start detected. Incrementing block number.');
                Logger::log('Checking current block number...');
                Logger::log('Block number: '.$currentBlockNum, 'debug');
                if($currentBlockNum == 0){
                    Logger::log('It is zero. End of function block.');
                    break;
                }
                else{
                    Logger::log('It is not zero. Reducing it by 1.');
                    $currentBlockNum--;
                }
            }
            $charIndex++;
        }
        Logger::logFuncReturn(__METHOD__);
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
        Logger::logFuncCall(__METHOD__);
        $isNextEscaped = FALSE;
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            Logger::log('Index = '.$charIndex, 'debug');
            $char = $this->getFileText()[$charIndex];
            Logger::log('Character = '.$char,'debug');
            Logger::log('Checking if it is end of string...');
            if($this->getFileText()[$charIndex] == $stringChar){
                Logger::log('Might be end of string. Checking if character is escaped...');
                if(!$isNextEscaped){
                    Logger::log('End of string.');
                    break;
                }
                else{
                    Logger::log('Escaped.');
                }
            }
            
            Logger::log('Char index = '.$charIndex,'debug');
            Logger::log('Checking if escape character is found...');
            if($char == '\\' && !$isNextEscaped){
                Logger::log('It is escape character.');
                $isNextEscaped = TRUE;
            }
            else{
                Logger::log('It is not escape character.');
                $isNextEscaped = FALSE;
            }
        }
        Logger::logReturnValue($charIndex);
        Logger::logFuncReturn(__METHOD__);
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
        Logger::logFuncCall(__METHOD__);
        Logger::log('Skipping * and spaces...');
        $char = $this->getFileText()[$startCharIndex];
        while ($char == '*' || $char == ' ' || $char == "\n" || $char == "\r"){
            $startCharIndex++;
            $char = $this->getFileText()[$startCharIndex];
        }
        if($char != '@'){
            Logger::log('Last character: '.$char);
            Logger::log('Extracting summary...');
            $summary = $this->_extractSummary($startCharIndex);
            Logger::log('Summary: \''.$summary.'\'', 'debug');
            Logger::log('Character index after extracting summary: '.$startCharIndex, 'debug');
    //        Logger::log('Moving one character forward...');
    //        $startCharIndex++;
    //        Logger::log('Character index after moving forward: '.$startCharIndex, 'debug');
            Logger::log('Extracting description...');
            $description = $this->_extractDescription($startCharIndex);
            Logger::log('Description: \''.$description.'\'', 'debug');
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
        Logger::log('Extracting DocBlock tags and values (if any)...');
        $str = '';
        while ($startCharIndex < $this->getFileSize()){
            Logger::log('Character index: '.$startCharIndex, 'debug');
            $char = $this->asTxt[$startCharIndex];
            Logger::log('Character: '.$char, 'debug');
            Logger::log('Checking character type...');
            if($char == '*'){
                Logger::log('Astrics detected. Checking next character...');
                //Might be end of comment.
                $char2 = $this->asTxt[$startCharIndex + 1];
                Logger::log('Character: '.$char2, 'debug');
                if($char2 == '/'){
                    Logger::log('End of DocBlock.');
                    //end of comment.
                    break;
                }
            }
            else if($char == '@'){
                Logger::log('A tag is detected. Extracting its name...');
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
                Logger::log('Extracted tag = \''.$tag.'\'.','debug');
                $extracted = $this->_extractTagInfo($tag, $startCharIndex);
                if($tag == '@since' || $tag == '@version' || $tag == '@package' || $tag == '@var' || $tag == '@return'){
                    $parsed[$tag] = $extracted;
                }
                else{
                    $parsed[$tag][] = $extracted;
                }
                $str = '';
            }
            else{
                Logger::log('Nothing is detected.');
                $str .= $char;
                Logger::log('String = \''.$str.'\'.','debug');
            }
            Logger::log('Incrementing character index...');
            $startCharIndex++;
        }
        Logger::log('Cleaning up...');
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
        Logger::logFuncReturn(__METHOD__);
    }
    private function _extractSingleInfoTag(&$charIndex){
        Logger::logFuncCall(__METHOD__);
        Logger::log('Single info tag. Extracting info...');
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
        Logger::logReturnValue($vNum);
        Logger::logFuncReturn(__METHOD__);
        return $vNum;
    }
    private function _extractReturnOrThrowsTag($tag,&$charIndex){
        $retVal = array();
        Logger::logFuncCall(__METHOD__);
        Logger::log('Return tag. Extracting return type and description...');
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
        Logger::log('Return type: \''.$returnType.'\'', 'debug');
        Logger::log('Return description: \''.$returnDesc.'\'', 'debug');
        if($tag == '@throws'){
            $retVal['exception-types'] = explode('|', $returnType);
            $retVal['description'] = trim($returnDesc);
        }
        else if($tag == '@return'){
            $retVal['return-types'] = explode('|', $returnType);
            $retVal['description'] = trim($returnDesc);
        }
        Logger::logReturnValue($retVal);
        Logger::logFuncReturn(__METHOD__);
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
        Logger::logFuncCall(__METHOD__);
        Logger::log('@param tag. Extracting type, name and description.');
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
        Logger::logReturnValue($retVal);
        Logger::logFuncReturn(__METHOD__);
        return $retVal;
    }
    private function _extractTagInfo($tag,&$charIndex){
        Logger::logFuncCall(__METHOD__);
        $retVal = array();
        Logger::log('Tag = \''.$tag.'\'.','debug');
        Logger::log('Checking tag type...');
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
            Logger::log('Cannot extract tag info. Unknown tag type.','warning');
        }
        Logger::logReturnValue($retVal);
        Logger::logFuncReturn(__METHOD__);
        return $retVal;
    }
    /**
     * Extract the information from @var tag.
     * @param type $charIndex
     * @return type
     */
    private function _extractVarTagInfo(&$charIndex){
        $retVal = array();
        Logger::logFuncCall(__METHOD__);
        Logger::log('@var tag. Extracting type, name and description.');
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
        Logger::logReturnValue($retVal);
        Logger::logFuncReturn(__METHOD__);
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
        Logger::logFuncCall(__METHOD__);
        $description = '';
        while ($startIndex < $this->getFileSize()){
            Logger::log('Character index: '.$startIndex, 'debug');
            $char = $this->getFileText()[$startIndex];
            Logger::log('Checking character type...');
            if($char == '*'){
                Logger::log('Astric detected. Checking next character...');
                $ch2 = $this->getFileText()[$startIndex + 1];
                Logger::log('Next character: '.$ch2,'debug');
                if($ch2 == '/'){
                    Logger::log('End of DocBlock.');
                    break;
                }
            }
            else if($char == '@'){
                Logger::log('A tag is detected. End of description.');
                break;
            }
            else{
                if($char != "\n" && $char != "\r"){
                    Logger::log('Appending character to description...');
                    $description .= $char;
                }
            }
            Logger::log('Incrementing character index...');
            $startIndex++;
        }
        Logger::log('Description extracted.');
        Logger::logReturnValue($description);
        Logger::logFuncReturn(__METHOD__);
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
        Logger::logFuncCall(__METHOD__);
        $summary = '';
        Logger::log('Starting the process of extracting summary...');
        $mightBeDocBlockEnd = FALSE;
        while ($startIndex < $this->getFileSize()){
            Logger::log('Character index: '.$startIndex, 'debug');
            $char = $this->getFileText()[$startIndex];
            Logger::log('Character: '.$char, 'debug');
            Logger::log('Checking character type...');
            if($char == '/' && $mightBeDocBlockEnd){
                Logger::log('End of doc block.');
                $summary.= '.';
                break;
            }
            else if($char == '.' || $char == '@'){
                Logger::log('End of summary.');
                if($char == '.'){
                    $startIndex++;
                    $summary.= '.';
                }
                break;
            }
            else if($char == '*'){
                Logger::log('Might be end of doc block.');
                //just skip it. Or it is end of DocBlock.
                $mightBeDocBlockEnd = TRUE;
            }
            else{
                $mightBeDocBlockEnd = FALSE;
                if($char != "\n" && $char != "\r"){
                    Logger::log('Appending character to summary string...');
                    $summary .= $char;
                }
            }
            Logger::log('Incrementing character index...');
            $startIndex++;
        }
        Logger::log('Summary extracted.');
        Logger::logReturnValue($summary);
        Logger::logFuncReturn(__METHOD__);
        return trim($summary);
    }
}
