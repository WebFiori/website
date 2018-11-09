<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    const ACCESS_MODIFERS = array(
        'public','protected','private'
    );
    const TAGS = array(
        '@return','@param','@author','@since','@version','@throws','@depricated', 
        '@see'
    );
    public function __construct($pathToClassFile) {
        $this->parsedClassInfo = array(
            'attributes'=>array(),
            'functions'=>array()
        );
        Logger::logName('api-extractor-log');
        Logger::enabled(TRUE);
        Logger::clear();
        Logger::log('Starting API procesing of the file \''.$pathToClassFile.'\'.');
        Logger::log('Checking if file exist...');
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
                    Logger::log('Character: '.$char, 'debug');
                    Logger::log('Constructed string = \''.$str.'\'.', 'debug');
                    Logger::log('Checking character type...');
                    $str = trim($str);
                    if($char == "\n"){
                        Logger::log('New line character detected.');
                        Logger::log('Checking if constructed string is the start of a DocBlock...');
                        if($str == '/**'){
                            Logger::log('It is the start of DocBlock.');
                            $this->parseDocBlock($charIndex);
                        }
                        $str = '';
                    }
                    else if($str == '/**'){
                        $this->parseDocBlock($charIndex);
                        $str = '';
                    }
                    else if($str == 'class' || $str == 'abstract class' || $str == 'final class'){
                        $this->parsedClassInfo['access-modifier'] = $str;
                        $classInfo = $this->extractClassInfo($charIndex);
                        foreach ($classInfo as $k=>$v){
                            $this->parsedClassInfo[$k] = $v;
                        }
                        if($this->lastParsedDocBlock != NULL){
                            $this->parsedClassInfo['doc-block'] = $this->lastParsedDocBlock;
                            $this->lastParsedDocBlock = NULL;
                        }
                        $str = '';
                    }
                    else if($str == 'public' || 
                            $str == 'private' || 
                            $str == 'protected' || 
                            $str == 'abstract' || 
                            $str == 'static'){
                        //function or attribute
                        
                    }
                    else if($str == 'const'){
                        //a constant
                        $constName = $this->extractConstName($charIndex);
                        if($this->lastParsedDocBlock != NULL){
                            $this->lastParsedDocBlock['name'] = $constName;
                            $this->lastParsedDocBlock['access-modifier'] = 'const';
                            $this->parsedClassInfo['attributes'] = $this->lastParsedDocBlock;
                            $this->lastParsedDocBlock = NULL;
                        }
                        else{
                            $this->parsedClassInfo['attributes'][] = array(
                                'access-modifier'=>'const',
                                'name'=>$constName
                            );
                        }
                        $str = '';
                    }
                    else{
                        if($char != "\r" && $char != "\n"){
                            $str = $str.$char;
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
        Util::print_r($this->parsedClassInfo);
    }
    private function extractConstName(&$charIndex){
        Logger::logFuncCall(__METHOD__);
        $name = '';
        while ($charIndex < $this->getFileSize()){
            $char = $this->getFileText()[$charIndex];
            Logger::log('Checking character if its equal sign...');
            Logger::log('Character = '.$char,'debug');
            if($char == '='){
                Logger::log('It is equal sign. Breaking the loop.');
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
    
    /**
     * Extract class information.
     * This function will extract 
     * @param type $charIndex
     * @return type
     */
    private function extractClassInfo(&$charIndex){
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
            if($char == ' '){
                break;
            }
            $classNm .= $char;
            $charIndex++;
        }
        Logger::log('Extracted name: \''.$classNm.'\'.','debug');
        $infoArr['class-name']=$classNm;
        $this->skipSpaces($charIndex);
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
                    $this->skipSpaces($charIndex);
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
                if($char == ' '){
                    Logger::log('Space detected. Checking constructed string...');
                    Logger::log('String = \''.$str.'\'', 'debug');
                    if(strlen(trim($str)) > 0){
                        $infoArr['implements'][] = $str;
                    }
                    $str = '';
                    $this->skipSpaces($charIndex);
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
    private function skipSpaces(&$charIndex) {
        Logger::logFuncCall(__METHOD__);
        while ($charIndex < $this->getFileSize() && $this->getFileText()[$charIndex] == ' '){
            $charIndex++;
            Logger::log('Index = '.$charIndex, 'debug');
        }
        $charIndex--;
        Logger::logReturnValue($charIndex);
        Logger::logFuncReturn(__METHOD__);
        return $charIndex;
    }
    private function skipFunctionBlock(&$charIndex){
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
    private function skipString(&$charIndex,$stringChar) {
        Logger::logFuncCall(__METHOD__);
        $isEsc = FALSE;
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            Logger::log('Index = '.$charIndex, 'debug');
            Logger::log('Checking if it is end of string...');
            if($this->getFileText()[$charIndex] != $stringChar && !$isEsc){
                Logger::log('End of string.');
                break;
            }
            $char = $this->getFileText()[$charIndex];
            Logger::log('Character = '.$char,'debug');
            Logger::log('Char index = '.$charIndex,'debug');
            Logger::log('Checking if escape character is found...');
            if($char == '\\'){
                Logger::log('It is escape character.');
                $isEsc = TRUE;
            }
            else{
                Logger::log('It is not escape character.');
                $isEsc = FALSE;
            }
        }
        $charIndex--;
        Logger::logReturnValue($charIndex);
        Logger::logFuncReturn(__METHOD__);
        return $charIndex;
    }
    public function getFileSize() {
        return $this->textLength;
    }
    public function getFileText() {
        return $this->asTxt;
    }
    /**
     * @param type $startCharIndex
     */
    private function parseDocBlock(&$startCharIndex){
        Logger::logFuncCall(__METHOD__);
        Logger::log('Skipping * and spaces...');
        $char = $this->getFileText()[$startCharIndex];
        while ($char == '*' || $char == ' ' || $char == "\n" || $char == "\r"){
            $startCharIndex++;
            $char = $this->getFileText()[$startCharIndex];
        }
        Logger::log('Extracting summary...');
        $summary = $this->extractSummary($startCharIndex);
        Logger::log('Summary: \''.$summary.'\'', 'debug');
        Logger::log('Character index after extracting summary: '.$startCharIndex, 'debug');
//        Logger::log('Moving one character forward...');
//        $startCharIndex++;
//        Logger::log('Character index after moving forward: '.$startCharIndex, 'debug');
        Logger::log('Extracting description...');
        $description = $this->extractDescription($startCharIndex);
        Logger::log('Description: \''.$description.'\'', 'debug');
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
                $extracted = $this->extractTagInfo($tag, $startCharIndex);
                if($tag == '@since' || $tag == '@version'){
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
            Util::print_r($str);
            Logger::log('Incrementing character index...');
            $startCharIndex++;
        }
        Logger::logFuncReturn(__METHOD__);
        $this->lastParsedDocBlock = $parsed;
    }
    private function _extractSingleInfoTag(&$charIndex){
        Logger::logFuncCall(__METHOD__);
        Logger::log('@Since tag. Extracting return type and description...');
        $vNum = '';
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
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
                $vNum .= $char;
            }
        }
        $charIndex--;
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
            $retVal['exception-type'] = $returnType;
            $retVal['description'] = trim($returnDesc);
        }
        else if($tag == '@return'){
            $retVal['return-type'] = $returnType;
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
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($char == ' '){
                break;
            }
            $name .= $char;
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
    private function extractTagInfo($tag,&$charIndex){
        Logger::logFuncCall(__METHOD__);
        $retVal = array();
        Logger::log('Checking tag type...');
        if($tag == '@return' || $tag == '@throws'){
            $retVal = $this->_extractReturnOrThrowsTag($tag,$charIndex);
        }
        else if($tag == '@param'){
            $retVal = $this->_extractParamTag($charIndex);
        }
        else if($tag == '@since' || $tag == '@version' || $tag == '@author'){
            $retVal = $this->_extractSingleInfoTag($charIndex);
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
    private function extractDescription(&$startIndex){
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
    private function extractSummary(&$startIndex){
        Logger::logFuncCall(__METHOD__);
        $summary = '';
        Logger::log('Starting the process of extracting summary...');
        while ($startIndex < $this->getFileSize()){
            Logger::log('Character index: '.$startIndex, 'debug');
            $char = $this->getFileText()[$startIndex];
            Logger::log('Character: '.$char, 'debug');
            Logger::log('Checking character type...');
            if($char == '*' || $char == '.'){
                Logger::log('End of summary.');
                if($char == '.'){
                    $startIndex++;
                    $summary.= '.';
                }
                break;
            }
            else{
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
