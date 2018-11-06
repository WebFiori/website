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
    public function __construct($pathToClassFile) {
        if(file_exists($pathToClassFile)){
            $h = fopen($pathToClassFile, 'r');
            $this->asTxt = fread($h, filesize($pathToClassFile));
            fclose($h);
            echo '<pre>'. str_replace('<', '&lt', str_replace('>', '&gt', $this->asTxt)).'</pre>';
        }
    }
    private function parseAPIComment(&$startCharIndex){
        $startCharIndex++;
        $comment = '';
        while (TRUE){
            $char = $this->asTxt[$startCharIndex];
            if($char == '*'){
                $startCharIndex++;
                $char2 = $this->asTxt[$startCharIndex];
                if($char2 == '/'){
                    break;
                }
                $startCharIndex--;
            }
            $comment.= $char;
        }
        echo '<pre>'.$comment.'</pre>';
    }
}
