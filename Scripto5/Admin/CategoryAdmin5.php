<?php
// Check if session is not registered, redirect back to login page.
session_start();
if (!isset( $_SESSION['username'] ) ){
header("location:index.html");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- The category page of the Scripto blog application -->
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
    // Categories      
    var water = "water";
    var earth = "aarde";
    var fire = "vuur";       
    var air = "lucht";
    var info = "Bloginfo";
              
    // Get blogs from certain category from database to publish on site
    function getcategorymessages(input) {
        var xhr = new XMLHttpRequest();     
        var cat = input;
        console.log(cat);
        var url = "http://localhost/Scripto5/Admin/Scripto5API.php?category="+cat;
        xhr.open('GET', url, true);
        xhr.onload = function (e) {
            if (xhr.readyState === xhr.DONE) {
                if (xhr.status === 200) {
                    // The reponse contains all blogs from the input category in the databse 
                    // with author, title and blog (ordered by descending ID numbers)    
                    document.output.outputtext.value =
                    xhr.response;
                    console.log(xhr.responseText);
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
      <!--Build-up of category page -->     
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
            <!-- Outputbox: All the blogs of the chosen category with author, title & text ordered by descending ID numbers -->
            <form name="output" action="">  
            <div id="Outputbox">    
              <div class="column">
                <h1>Lees hier alle blogs per categorie!</h1>
                <!-- Buttons to select the category of the blogs that the reader wants to see -->  
                <input type="button" name="getwatermessages" onClick="getcategorymessages(water);" value="Waterig" /> 
                <input type="button" name="getearthmessages" onClick="getcategorymessages(earth);" value="Aardig" />
                <input type="button" name="getfiremessages" onClick="getcategorymessages(fire);" value="Vurig" /> 
                <input type="button" name="getairmessages" onClick="getcategorymessages(air);" value="Luchtig" /> 
                <input type="button" name="getbloginfomessages" onClick="getcategorymessages(info);" value="Bloginfo" />   
                <textarea name="outputtext" cols="90" rows="20">
                </textarea>  
              </div>
            </div> 
            </form>
        </div>
      </div>      
    </body>
</html>