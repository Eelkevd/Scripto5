<?php
// Check if session is not registered, redirect back to Login page.
session_start();
if (!isset( $_SESSION['username'] ) ){
header("location:index.html");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- The correction page of the Scripto blog application -->
        <title>	Scripto Blog application </title>
        
        <!-- Link to css style file -->
        <link type="text/css" rel="stylesheet" href="IndexAdmin5.css" />
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        * {
            box-sizing: border-box;
        }
        </style>   
     </head>
        
    <script>     
    // Get old blog that the admin wants to correct/improve
    function getblogtocorrect(){
        var xhr = new XMLHttpRequest();  
        var correctblog =document.output.verbeterblog.value;   
        var url = "http://wijzijncodegorilla.nl/jorik/Scripto5/Admin/Scripto5API.php?correctblog="+correctblog;    
        xhr.open('GET', url, true); 
        xhr.onload = function (e) {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // The reponse contains the old blog from the databse
                    document.output.correctblogarea.value =
                    xhr.response; 
                    console.log(xhr.response);
                } 
                else {
                    console.error(xhr.statusText);
                }
            }
        }; 
        xhr.onerror = function (e) {
              console.error(xhr.statusText);
        };
        xhr.send(null);  
    }   
        
    // Send the corrected/improved blog back to the database to replace the old blog    
    function correctblog(){
        var xhr = new XMLHttpRequest();  
        var improvedblog = document.output.correctblogarea.value;
        var improvedblogtitle = document.output.verbeterblog.value
        var value = "improvedblog=" + improvedblog + "&improvedblogtitle=" + improvedblogtitle;   
        xhr.open('POST', "http://wijzijncodegorilla.nl/jorik/Scripto5/Admin/Scripto5API.php", true); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');  
        console.log(value);
        xhr.send(value);
        alert("Blog is succesfully improved!")
    }   
    </script>
    
    <!-- Insert background with clouds -->
    <body background="achtergrond.jpg"> 
      <!--Build-up of index page -->        
      <div id="Total">
        <div id="Menu">
            <div id="Welcome">
                <!-- Name and slogan of the blog app -->
                <p class="welcome"> <b> Scripto: jouw blog applicatie, jouw geschriften! </b></p>
                <div style="clear:both"></div>  
            </div>     

            <!-- Navigation bar links -->
            <div class="topnav">
                <a href="IndexAdmin5.php">Blogs</a>
                <a href="CategoryAdmin5.php">Categorieën</a>
                <a href="ScriptoAdmin5.php">Schrijf zelf!</a>
                <a href="CommentAdmin5.php">Commentaar</a>
                <a href="SearchAdmin5.php">Zoek blog</a>
                <a href="ImproveblogAdmin5.php">Verbeter blog</a>
                <a href="logout.php">Log uit</a>
                <div style="clear:both"></div>  
            </div>
            
            <!-- Outputbox: Put in the blog to correct, then submit the changes to update database -->
            <form name="output" action="">  
              <div id="Outputbox">    
                <div class="column">
                  <h1>Verbeter je oude blog</h1>
                  Titel van blog om te verbeteren:  <input name="verbeterblog" placeholder="verbeterblog" type="text" />    
                  <!-- Button to put old text of blog in textarea -->     
                  <input type="button" name="getoldblog" onClick="getblogtocorrect()" value="Roep oude blog op" /><br><br>  
                  <textarea name="correctblogarea" cols="90" rows="20">
                  </textarea><br>
                  <!-- Button to send corrected blog back to database to replace old blog -->
                  <input type="button" name="sendnewblog" onClick="correctblog()" value="Verstuur verbeterde blog" /><br><br>      
                </div>
              </div> 
            </form>
        </div>
      </div>      
    </body>
</html>