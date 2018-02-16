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
        <!-- The writing a blog page of the Scripto blog application -->
        <title>	Scripto Blog application </title>
        
        <!-- Link to css style file -->
        <link type="text/css" rel="stylesheet" href="ScriptoAdmin5.css" />
	    <meta charset="utf-8">    
     </head>
        
    <script>              
    // Send written blog message to database 
    function submitmessage() {
        var author = document.bloginput.author.value; 
        var title = document.bloginput.title.value;  
        var blog = document.bloginput.text.value;  
        var category = document.bloginput.categories.value; 
        var extracategory = document.bloginput.extracategories.value;
        var xhr = new XMLHttpRequest();  
        var value = "myblog=" + blog + "&author=" + author + "&title=" + title + "&category=" + category + "&extracategory=" + extracategory;
        xhr.open('POST', "http://wijzijncodegorilla.nl/jorik/Scripto5/Admin/Scripto5API.php", true); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');  
        console.log(value);
        xhr.send(value);
        alert("Blog is succesfully published!")
    }
        
    // Make autocomplete text epander possible
    // self defined shortcuts list    
    shortcuts = {
        "ivm" : "in verband met",
        "tov" : "ten opzichte van",
        "muv" : "met uitzondering van", 
        "cg"  : "CodeGorilla",
        "gn"  : "Groningen",
        "ioc" : "Internationaal Olympisch Comité",
        "jan" : "januari",
        "feb" : "februari",
        "mrt" : "maart",
        "apr" : "april",
        "jun" : "juni",
        "jul" : "juli",
        "aug" : "augustus",
        "sep" : "september",
        "okt" : "oktober",
        "nov" : "november",
        "dec" : "december"   
    }
        
    // Couple input textarea with shortcuts
    window.onload = function() {
        var ta = document.getElementById("text");
        var timer = 0;
        var re = new RegExp("\\b(" + Object.keys(shortcuts).join("|") + ")\\b", "g");

        update = function() {
            ta.value = ta.value.replace(re, function($0, $1) {
            return shortcuts[$1.toLowerCase()];
            });
        }
        // Text checked for shortcuts per time interval
        ta.onkeydown = function() {
        clearTimeout(timer);
        timer = setTimeout(update, 200);
        }
    }           
    </script>  
    
    <!-- Insert background with clouds -->
    <body background="achtergrond.jpg"> 
      <!--Build-up of submit page -->
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
            
            <!-- Inputbox: Your written blog with author, title, category & text-->
            <div id="Inputbox"> <br> 
              <h1>Schrijf hier je blog!</h1>    
              <form name="bloginput" action="" method="post">
                Auteur: <input type="text" name="author"><br><br>
                Titel: <input type="text" name="title"><br><br>
                Categorie:     
                <select id="categories">
                <option style="display:none;" value="" selected disabled hidden>Kies categorie</option>
                </select>
                <script>   
                // Select first category
                var select = document.getElementById("categories");  
                select.options[select.options.length] = new Option('vurige verhalen', 'vuur');
                select.options[select.options.length] = new Option('kabbelende verhalen', 'water');
                select.options[select.options.length] = new Option('aardige verhalen', 'aarde');
                select.options[select.options.length] = new Option('luchtige verhalen', 'lucht');
                select.options[select.options.length] = new Option('Informatie over de blog', 'Bloginfo');
                </script> 
                <br><br>    
                Extra categorie: 
                <!--<input type="text" name="extracategorie"><br><br> -->
                <select id="extracategories">
                <option style="display:none;" value="" selected disabled hidden>Kies 2de categorie</option> 
                </select>  
                <script> 
                // Select optional second category
                var select = document.getElementById("extracategories");
                select.options[select.options.length] = new Option('vurige verhalen', 'vuur');
                select.options[select.options.length] = new Option('kabbelende verhalen', 'water');
                select.options[select.options.length] = new Option('aardige verhalen', 'aarde');
                select.options[select.options.length] = new Option('luchtige verhalen', 'lucht');
                select.options[select.options.length] = new Option('Informatie over de blog', 'Bloginfo');
                </script><br><br>      
                Tekst: <textarea id="text" name="text" rows="20" cols="90"></textarea>
                <!-- Button to submit the new written blog to the database -->
                <input type="button" name="publiceer" onClick="submitmessage();" value="Publiceer" /><br><br>  
              </form>
            </div> 
        </div>
      </div>       
    </body>
</html>