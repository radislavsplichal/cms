<?php
namespace CMSCore;
// This class is responsible for all actions regarding the articles in the app.
// create, edit, update, delete
//include ('databaseConnection.php');
//include ('Lilly.php');
use CMSCore\;
class Article implements cmsItem{
  // core properties

  private $articleId;
  private $articleDateCreated;
  private $articleDateUpdated;
  private $articleText;
  private $articleTitle;
  private $articleAuthor;
  
  // utility properties
  private $querry;

  function __construct($cdate,$adate,$text,$title,$author){
      $this->articleAuthor = $author;
      $this->articleDateCreated = $cdate;
      $this->articleDateUpdated = $adate;
      $this->articleText = $text;
      $this->articleTitle = $title;
  }
  
public function insertArticle ($title, $text) {
	$date = date('d.m.Y');
	$author = "Admin";
	$type = "articles";
	//$arguments ="author, article, dateCreated, title";
	$values = $author."','".$text."','".$date."','".$title;


	$bot = new Lilly;
	$bot->saveObject($type,$arguments,$values);
	echo 'Article Saved';
}
  //$sql = "INSERT INTO articles (author, article, dateCreated, title) VALUES ('$author', '$text', '$date', '$title');";



public function displayArticle () {
  echo '<div id="'.$this->id.'" class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="panel panel-default">
        <div style="display: inline;" class="administration button-group pull-right" role="group" aria-label="...">
        <form method="POST" action="deleteArticle.php">
          <input type="hidden" name="id" value='.$this->id.'></input>
          <button type="button" title="Odstranit článek" onClick="this.parentNode.submit();" class="glyphicon glyphicon-remove" aria-hidden="true"></button>
        </form><form method="POST" action="editArticle.php">
          <input type="hidden" name="id" value='.$this->id.'></input>
          <button type="button" title="Upravit článek" onClick="this.parentNode.submit();" class="glyphicon glyphicon-pencil" aria-hidden="true"></button>
        </form>
        </div>
        <div class="panel-heading"><b>'.$this->title.'</b></br>
        Author: <i>'.$this->author.'</i></br>
        Created: '.$this->dateCreated.'

          </div>
        <div class="panel-body">
        '.$this->article.'
        </div>
        </div>
        </div>
        <div class="col-md-1"></div>
        </div>';
}

public function deleteArticle($id){
$type = 'articles';
$bot = new Lilly;
$bot->deleteObject($id,$type);

 }


public function editArticle($conn, $id, $article, $title){
$date = date('d.m.Y');
$sql = "UPDATE articles
SET article='$article', dateUpdated='$date', title ='$title' WHERE id ='$id'";

if ($conn->query($sql) === TRUE){
                      echo "Success! Article Updated!";
                  } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                  }

                }
public function read($sql)
    {}

public function edit($id, $type, $values)
    {}

public function show()
    {}

public function save($type, $values)
    {}

public function delete($id, $type)
    {}




}



?>
