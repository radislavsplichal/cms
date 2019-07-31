<?php
//namespace CMSCore

use CMSCore\DatabaseConnector;


class ArticleViewer {
    
    private $page;
    private $userPermissions;
    private $articlesToShow;
    
    function __construct($page,$userPermissions){
        
        $this->page = $page;
        $this->userPermisions = $userPermissions;
        
    }
    public function displayOutput($page){
        $sql = "SELECT * FROM ARTICLES WHERE category =".$page;
        $bot = new DatabaseConnector();
        $container = $this->articlesToShow = $bot->readObject($sql);
        $bot = null;
        
        foreach ($container as $values){
            echo $value;
        }
    }
    
}
?>