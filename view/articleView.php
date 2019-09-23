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
        $sql = "SELECT * FROM ARTICLES WHERE Articles.category ='".$page."'";
        //echo $sql;
        $bot = new DatabaseConnector();
        $container = $this->articlesToShow = $bot->readObject($sql);
        $bot = null;
        
        foreach ($container as $value){
           // print_r($value);
           
           echo "<div class='row'><div class='mainPage col-xs-12 col-sm-6 col-md-8'>";
           echo '<h2>'.$value['title'].'</h2>';
           echo '<p>'.$value['user'].'</p>';
           echo '<h2>'.$value['text'].'</h2>';
           echo "</div> <div class='col-xs-6 col-md-4'> </div></div>";
        }
    }
    
}
?>