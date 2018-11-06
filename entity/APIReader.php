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
    const ACCESS_MODIFERS = array(
        'public','protected','private'
    );
    const TAGS = array(
        '@return','@param','@author','@since','@version','@throws','@depricated', 
        '@see'
    );
    public function __construct($pathToClassFile) {
        if(file_exists($pathToClassFile)){
            $h = fopen($pathToClassFile, 'r');
            $this->asTxt = fread($h, filesize($pathToClassFile));
            fclose($h);
            echo '<pre>'. str_replace('<', '&lt', str_replace('>', '&gt', $this->asTxt)).'</pre>';
            $fLength = strlen($this->getFileText());
            $charIndex = 0;
            $str = '';
            while ($charIndex != $fLength){
                $char = $this->getFileText()[$charIndex];
                if($char == "\n"){
                    if($str == '/**'){
                        $this->parseAPIComment($charIndex);
                    }
                    $str = '';
                }
                else{
                    $str = $str.$char;
                }
                Util::print_r('Str = \''.$str.'\'');
                $charIndex++;
            }
        }
    }
    public function getFileText() {
        return $this->asTxt;
    }
    /**
     * @deprecated since version number
     * @param type $startCharIndex
     */
    private function parseAPIComment(&$startCharIndex){
        $parsed = array(
            'summary'=>'',
            'description'=>'',
            '@version'=>'',
            '@since'=>'',
            '@author'=>array(),
            '@see'=>array(),
            '@param'=>array(),
            '@throws'=>array(),
            '@depricated'=>array(),
            '@return'=>array()
        );
        $startCharIndex++;
        $comment = '';
        
        while (TRUE){
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
                //a tag detected.
            }
            $comment.= $char;
            $startCharIndex++;
        }
        echo '<pre>'.$comment.'</pre>';
    }
}
