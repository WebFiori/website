<?php
use Parsedown;
use webfiori\json\Json;
use webfiori\framework\File;

class MDIndexBuilder {
    private $uName;
    private $repo;
    private $branch;
    private $files;
    private $infoArr;


    public function __construct($username, $repo, $filesArr, $branch = 'master') {
        $this->uName = $username;
        $this->repo = $repo;
        $this->files = $filesArr;
        $this->branch = $branch;
        $this->infoArr = [];
        
        $this->build();
    }
    public function getInfoArray() {
        return $this->infoArr;
    }
    private function build() {
        $parsedown = new Parsedown();
        
        foreach ($this->getFiles() as $fPath) {
            $this->infoArr[$fPath] = [
                'main-title' => '',
                'link' => 'learn/'.$fPath,
                'titles' => [],
            ];
            $data = $this->_getMdFileContent($fPath);
            $asHtml = $parsedown->text($data);
            $mainTitleArr = [];
            preg_match_all('#(?<=h1\>)(?!\<)(.*)(?=\<)(?<!\>)#', $asHtml, $mainTitleArr);
            $this->infoArr[$fPath]['main-title'] = $mainTitleArr[0][0];
            $this->infoArr[$fPath]['link'] = 'learn/'.$fPath.'/'. strtolower(str_replace(' ', '-', $mainTitleArr[0][0]));
            $titlesArr = [];
            preg_match_all('#(?<=h2\>|h3\>|h4\>|h5\>|h6\>)(?!\<)(.*)(?=\<)(?<!\>)#', $asHtml, $titlesArr);
            $this->infoArr[$fPath]['titles'] = $titlesArr[0];
        }
    }
    
    public function createJson($loc = ROOT_DIR) {
        $file = new File($loc.DS.'docs-index.json');
        $file->remove();
        $file->append("[\n");
        $comma = '';
        foreach ($this->getInfoArray() as $name => $subArr) {
            $j = new Json([
                'title' => $subArr['main-title'],
                'link' => $subArr['link'],
                'keywords' => [],
                'parent_page' => null,
            ]);
            $file->append($comma.$j);
            $comma = ',';
            foreach ($subArr['titles'] as $t) {
                $j = new Json([
                    'title' => $t,
                    'link' => 'learn/'.$name.'#'. strtolower(str_replace(' ', '-', $t)),
                    'keywords' => [],
                    'parent_page' => $subArr['main-title']
                ]);
                $file->append($comma.$j);
                
            }
        }
        $file->append("]\n");
        $file->write(false, true);
    }
    public function getFiles() {
        return $this->files;
    }
    private function _getMdFileContent($fPath) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->_getFileUrl($fPath)
        ]);
        $exeResult = curl_exec($curl);
        if($exeResult === false){
            Response::append('False');
            Response::send();
        } else if ($exeResult == '404: Not Found') {
            Response::setCode(404);
            Response::append('Not found.');
            Response::send();
        }
        return $exeResult;
    }
    private function _getFileUrl($fPath) {
        $username = $this->getUsername();
        $repo = $this->getRepoName();
        $branch = $this->getBranch();
        return "https://raw.githubusercontent.com/$username/$repo/$branch/$fPath.md";
    }
    public function getRepoName() {
        return $this->repo;
    }
    public function getBranch() {
        return $this->branch;
    }
    public function getUsername() {
        return $this->uName;
    }
}