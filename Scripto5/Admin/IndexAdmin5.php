<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (!isset( $_SESSION['username'] ) ){
header("location:index.html");
}
?>

<!DOCTYPE html>

<html>
    <head>
        <!-- The overview page of the Scripto blog application -->
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
    // Load all blogs automatically while loading the page    
    getmessages() ; 
        
    // Get all the posted blogs from the database to publish on the site
    function getmessages() {
        var xhr = new XMLHttpRequest();  
        xhr.open('GET', "http://localhost/Scripto5/Admin/Scripto5API.php", true); 
        xhr.onload = function (e) {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // The reponse contains all blogs in the databse with author, 
                    // title and blog and is ordered by descending ID numbers
                    document.output.outputtext.value =
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
            
            <!-- Outputbox: All the blogs with author, title & text ordered by descending ID numbers -->
            <form name="output" action="">  
              <div id="Outputbox">    
                <div class="column">
                  <h1>Lees hier de laatste blogs, wellicht van uw hand!</h1>
                  <textarea name="outputtext" cols="90" rows="20">
                  </textarea><br>
                <!-- Button to refresh the outputbox to include new posted blogs since page was loaded -->  
                <input type="button" name="ververs" onClick="getmessages();" value="Ververs blogs" />    
                </div>
              </div> 
            </form>
        </div>
      </div>      
    </body>
</html>