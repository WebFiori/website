<?php
namespace webfiori\examples\views;

use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
use phpStructs\html\CodeSnippet;
use webfiori\entity\router\Router;
use Parsedown;

/**
 * Description of MdPage
 *
 * @author Ibrahim
 */
class MdPage {
    public function __construct($username, $repo, $filePath, $branch = 'master') {
        Page::theme('WebFiori V108');
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://raw.githubusercontent.com/$username/$repo/$branch/$filePath.md"
        ]);
        $exeResult = curl_exec($curl);
        if($exeResult === false){
            echo 'False';
            die();
        } else if ($exeResult == '404: Not Found') {
            http_response_code(404);
            echo 'Not found.';
            die();
        } else {
            $parsedown = new Parsedown();
            $asTxt = $parsedown->text($exeResult);
            $node = HTMLNode::fromHTMLText($asTxt);
            $super = new HTMLNode();
            Page::insert($super);
            $base = Page::canonical();
            
            foreach ($node as $xNode) {
                if ($xNode->getNodeName() == 'h1') {
                    $title = $xNode->getChild(0) !== null ? $xNode->getChild(0)->getText() : 'Default';
                    Page::title($title);
                }
                if (in_array($xNode->getNodeName(), ['h1','h2','h3','h4','h5','h6'])) {
                    $id = $this->getNodeBodyAsTxt($xNode);
                    $links = Page::document()->getChildrenByAttributeValue('href', '#'.$id);
                    if ($links->size() == 1) {
                        $links->get(0)->setAttribute('href', $base.'#'.$id);
                    }
                    $xNode->setID($id);
                } else if ($xNode->getNodeName() == 'pre') {
                    if ($xNode->getChild(0)->getNodeName() == 'code') {
                        $codeSnippit = new \phpStructs\html\CodeSnippet('Code', $xNode->getChild(0)->getChild(0)->getTextUnescaped());
                        $codeSnippit->getCodeElement()->setClassName($xNode->getChild(0)->getClassName());
                        $super->addChild($codeSnippit);
                    }
                } else {
                    $super->addChild($xNode);
                }
                
            }
            
        }
    }
    /**
     * 
     * @param HTMLNode $heading
     */
    private function getNodeBodyAsTxt($heading) {
        $txt = '';
        foreach ($heading->children() as $child) {
            if ($child->getNodeName() == '#TEXT') {
                $txt .= $child->getText();
            } else {
                $txt .= $this->getNodeBodyAsTxt($child);
            }
        }
        return strtolower(str_replace(' ', '-', str_replace('(', '', str_replace(')', '', $txt))));
    }
}
