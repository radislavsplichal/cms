<?php 

use CMSCore\Article;




require __DIR__ . "/../vendor/autoload.php";
//require '../CMSCore/Article.php';


// New Theory
//$type = $_GET['cmsItemObject'];
$type = Article::class;
$saveObject = new $type ();

$saveObject->show();
    
//Can we check for key values from the form and then based on the object we want to find we create the constructor?    




//ITEM ID SHOULD BE IN THE FORM HIDDEN FIELD
//use CMSCore\Article;
$adate = date('d.m.Y');
$cdate = date('d.m.Y');
$text = $_POST['articlebody'];
$title = $_POST['title'];
$author = 'Admin';
$category = $_POST['selecttopic'];
$article = new Article($cdate, $adate, $text, $title, $author,$category);
$article->newArticle();

echo $message = MessageViewCreator::createMessage("Article Created!", "success");

sleep(3);

header('\\');
?>