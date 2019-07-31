<?php 

require __DIR__ . "/vendor/autoload.php";
$aviewer = new ArticleViewer("Rodina", "user");
$aviewer->displayOutput("Rodina");
?>

<!DOCTYPE html>
    <head>
    	<meta charset="UTF-8">
    </head>
    <body>
      
        
        
        <h1>Nový článek</h1>


        <!-- This is a New Article Form -->
        <form  class="form-horizontal" action="operations/save.php" enctype="multipart/form-data" method="post" >
    
            
        <div class="form-group">
     <label for="rubrika" class="col-sm-2 control-label">Rubrika:</label>
        <div class="col-sm-5">      
            <select id="rubrika" class="form-control" class="col-sm-5" name="selecttopic">
					<option  value="rodina">Rodina</option>
                    <option  value="home">Domů</option>
					 
                </select>
            </div>
        </div>
            

     
        
            <div class="form-group">
     <label for="nazevclanku" class="col-sm-2 control-label">Název článku:</label>
        <div class="col-sm-5">      
            <input id="nazevclanku" class="form-control" placeholder="Název" type="text" name="title" value=""> 

            </div>
        </div>


            <div class="form-group">
     <label for="nazevclanku" class="col-sm-2 control-label">Text článku:</label>
        <div class="col-sm-5">      
           <textarea class="form-control" name="articlebody" rows="10" cols="3" ></textarea>
            </div>
        </div>
          
       
       
            
<!--          <div class="form-group"> -->
<!--      <label for="obrazek" class="col-sm-2 control-label">Obrazek:</label> -->
<!--         <div class="col-sm-5">       -->
<!--            <input id="obrazek" class="form-control" type="file" name="fileimg" > -->

<!--             </div> -->
<!--         </div> -->

       
            <div class="form-group">
     <label for="odeslat" class="col-sm-2 control-label"></label>
        <div class="col-sm-5">  
         
       <button id="odeslat" type="submit" class="btn btn-primary btn-lg" name="submit">Odeslat</button>


             </div>
        </div>
        
        </form>
    </body>