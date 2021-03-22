<?php
namespace webfiori\examples\views;

use webfiori\framework\Page;
use webfiori\ui\HTMLNode;
use Parsedown;
use webfiori\http\Response;
use webfiori\ui\CodeSnippet;
use webfiori\ui\Paragraph;
use webfiori\ui\Anchor;
use webfiori\views\WebFioriPage;
/**
 * Description of MdPage
 *
 * @author Ibrahim
 */
class MdPage extends WebFioriPage{
    public function __construct($username, $repo, $filePath, $branch = 'master') {
        parent::__construct();
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://raw.githubusercontent.com/$username/$repo/$branch/$filePath.md"
        ]);
        $exeResult = curl_exec($curl);
        if($exeResult === false){
            Response::append('False');
            Response::send();
        } else if ($exeResult == '404: Not Found') {
            Response::setCode(404);
            Response::append('Not found.');
            Response::send();
        } else {
            $parsedown = new Parsedown();
            $asTxt = $parsedown->text($exeResult);
            $node = HTMLNode::fromHTMLText($asTxt);
            $super = new HTMLNode();
            $this->insert($super);
            $base = $this->getCanonical();
            
            foreach ($node as $xNode) {
                if ($xNode->getNodeName() == 'h1') {
                    $title = $xNode->getChild(0) !== null ? $xNode->getChild(0)->getText() : 'Default';
                    $this->setTitle($title);
                }
                if (in_array($xNode->getNodeName(), ['h1','h2','h3','h4','h5','h6'])) {
                    $id = $this->getNodeBodyAsTxt($xNode);
                    $links = $this->getDocument()->getChildrenByAttributeValue('href', '#'.$id);
                    if ($links->size() == 1) {
                        $links->get(0)->setAttribute('href', $base.'#'.$id);
                    }
                    $xNode->setID($id);
                    $super->addChild($xNode);
                } else if ($xNode->getNodeName() == 'pre') {
                    if ($xNode->getChild(0)->getNodeName() == 'code') {
                        $codeSnippit = new CodeSnippet('Code', $xNode->getChild(0)->getChild(0)->getTextUnescaped());
                        $codeSnippit->getCodeElement()->setClassName($xNode->getChild(0)->getClassName());
                        $super->addChild($codeSnippit);
                    }
                } else if ($xNode->getNodeName() == 'img') {
                    $src = $xNode->getAttribute('src');
                    $xNode->setAttribute('src', "https://raw.githubusercontent.com/$username/$repo/$branch/$src");
                    $super->addChild($xNode);
                } else if ($xNode->getNodeName() == 'table') {
                    $xNode->setAttributes([
                        'border' => 1,
                    ]);
                    $xNode->setStyle([
                        'border-collapse' => 'collapse'
                    ]);
                    $super->addChild($xNode);
                } else {
                    $super->addChild($xNode);
                }
                
            }
            $paragraph = new Paragraph();
            $link = "https://github.com/$username/$repo/blob/$branch/$filePath.md";
            $anchor = new Anchor($link, 'GitHub', '_blank');
            $paragraph->text('<b>Found a mistake or want to contribute?</b> You can edit this '
                    . "page on $anchor.", false);
            $super->addChild($paragraph);
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
