<?php 

use CMSCore\Article;

require __DIR__ . "/../vendor/autoload.php";
//require '../CMSCore/Article.php';

//ITEM ID SHOULD BE IN THE FORM HIDDEN FIELD
//use CMSCore\Article;
$adate = date('d.m.Y');
$cdate = date('d.m.Y');
$text = $_POST['articlebody'];
$title = $_POST['title'];
$author = 'Admin';
$category = $_POST['selecttopic'];
$article = new Article($cdate, $adate, $text, $title, $author,$category);
$article->save();

?>