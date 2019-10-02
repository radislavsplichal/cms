<?php 
require __DIR__ . "/vendor/autoload.php";
session_start();
if (isset($_GET["router"]) == false ){
$router = 0;
} else {
echo $router = $_GET["router"];
}
?>

<!DOCTYPE html>
    <head>
    	 
    	<meta charset="UTF-8">
    	
	    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="?router=0">Home</a></li>
          <li role="presentation"><a href="?router=1">Rodina</a></li>
          <li role="presentation"><a href="?router=2">Programovani</a></li>
		  <li role="presentation"><a href="?router=10">New Article</a></li>
		</ul>
    	<?php
    	include_once 'router.php';
    	echo $message = MessageViewCreator::createMessage("Hello World! This is a devloper preview version 0.1", "success");
    	
    	
    	?>
      <div class="container-fluid">
      
        <?php 
        
        //This section should contain a new entity - pageViewer
        $aviewer = new ArticleViewer($router, "user");
        $aviewer->displayOutput($router);
        
        echo $message = MessageViewCreator::createMessage("Nela Je Nejlepsi", "warning")
        ?>
      </div>
       
    </body>