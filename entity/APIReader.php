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
    const ACCESS_MODIFERS = array(
        'public','protected','private'
    );
    const TAGS = array(
        '@return','@param','@author','@since','@version','@throws','@depricated', 
        '@see'
    );
    public function __construct($pathToClassFile) {
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
                    if($char == "\n"){
                        Logger::log('New line character detected.');
                        Logger::log('Checking if constructed string is the start of a DocBlock...');
                        if($str == '/**'){
                            Logger::log('It is the start of DocBlock.');
                            $this->parseAPIComment($charIndex);
                        }
                        $str = '';
                    }
                    else if($str == '/**'){
                        $this->parseAPIComment($charIndex);
                        $str = '';
                    }
                    else{
                        if(strlen(trim($char)) != 0){
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
    private function parseAPIComment(&$startCharIndex){
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
                $parsed[$tag][] = $extracted;
                $str = '';
            }
            else{
                Logger::log('Nothing is detected.');
                $str .= $char;
            }
            Util::print_r($str);
            Logger::log('Incrementing character index...');
            $startCharIndex++;
        }
        Logger::logFuncReturn(__METHOD__);
        echo Util::print_r($parsed);
    }
    private function _extractSinceTag(&$charIndex){
        $retVal = array();
        Logger::logFuncCall(__METHOD__);
        Logger::log('@Since tag. Extracting return type and description...');
        $vNum = '';
        while ($charIndex < $this->getFileSize()){
            $charIndex++;
            $char = $this->getFileText()[$charIndex];
            if($char == '@'){
                $charIndex--;
                break;
            }
            else if($char == '*'){
                $char2 = $this->getFileText()[$charIndex+1];
                if($char2 == '/'){
                    break;
                }
            }
            $vNum .= $char;
        }
        Logger::log('Since: \''.$vNum.'\'', 'debug');
        $retVal['version-number'] = $vNum;
        Logger::logReturnValue($retVal);
        Logger::logFuncReturn(__METHOD__);
        return $retVal;
    }
    private function _extractReturnTag(&$charIndex){
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
                $charIndex--;
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
        Logger::log('Return type: \''.$returnType.'\'', 'debug');
        Logger::log('Return description: \''.$returnDesc.'\'', 'debug');
        $retVal['return-type'] = $returnType;
        $retVal['description'] = trim($returnDesc);
        Logger::logReturnValue($retVal);
        Logger::logFuncReturn(__METHOD__);
        return $retVal;
    }
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
                $charIndex--;
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
        if($tag == '@return'){
            $retVal = $this->_extractReturnTag($charIndex);
        }
        else if($tag == '@param'){
            $retVal = $this->_extractParamTag($charIndex);
        }
        else if($tag == '@since'){
            $retVal = $this->_extractSinceTag($charIndex);
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
