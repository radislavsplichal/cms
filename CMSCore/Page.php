<?php
namespace CMSCore;

class Page {

    private $pageTitle;
    private $content;
    

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getPageTitle() {
        return $pageTitle;
    }
    public function setPageTitle($title) {
        $this->pageTitle = $title; 
    }
    
    public function renderContent(){
        foreach ($content as $value) {
            echo $value.show();
            //needs to be edited to $value.show()
        }
    }
    
    

}


?>
