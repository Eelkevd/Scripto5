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
        <!-- The comment page of the Scripto blog application -->
        <title>	Scripto Blog application </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Link to css style file -->
        <link type="text/css" rel="stylesheet" href="CommentAdmin5.css" />
	    <meta charset="utf-8">  
     </head>
        
    <script>   
    // Global variable
    var listofblockedtitles = ["Openingsblog"];
        
    // add title to blockedtitleslist of blogs without comments
    function blockblogtitle(){
        listofblockedtitles.push(document.output.blog_titel.value);    
    }
        
    // Send written comment to database 
    function submitcomment() {
        var comment = document.bloginput.text.value;  
        var titel_blog= document.bloginput.title.value;
        var username = "<?php echo $_SESSION['username'] ?>";
        if ( $.inArray(titel_blog, listofblockedtitles) > -1 ) {
            alert("Not possible to comment on the selected blog");    
        }
        else{
            var xhr = new XMLHttpRequest();  
            var value = "mycomment=" + comment + "&titel_blog=" + titel_blog + "&username=" + username;
            xhr.open('POST', "http://localhost/Scripto5/Admin/Scripto5API.php", true); 
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');  
            console.log(value);
            xhr.send(value); 
            alert("Comment is succesfully published!")
        }
    }
        
    // Delete single comment of comment_id
    function deletecomment() {
        var comment_id = document.output.comment_id.value;  
        var xhr = new XMLHttpRequest();  
        var value = "comment_id=" +comment_id;
        xhr.open('POST', "http://localhost/Scripto5/Admin/Scripto5API.php", true); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');  
        console.log(value);
        xhr.send(value);          
    }   
        
    // Get comments from certain blog from database to publish on site
    function getblogcomments() {
        var xhr = new XMLHttpRequest();     
        var titel_blog = document.output.titelblog.value;
        console.log(titel_blog);
        var url = "http://localhost/Scripto5/Admin/Scripto5API.php?titel_blog="+titel_blog;
        xhr.open('GET', url, true);
        xhr.onload = function (e) {
            if (xhr.readyState === xhr.DONE) {
                if (xhr.status === 200) {
                    // The reponse contains all comments from a blog in the databse 
                    // with comment_id, username and comment (ordered by descending ID numbers)    
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
        
    // couple text area with shortcuts
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
      <!--Build-up of comment page -->
      <div id="Total">
        <div id="Menu">
            <div id="Welcome">
                <!-- Name and slogan of the blog app -->
                <p class="welcome"> <b> Scripto: jouw blog applicatie, jouw commentaar! </b></p>
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
            
            <!-- Inputbox: Write your comment with the title of the blog-->
            <div id="Inputbox"> 
             <h1>Schrijf hier je commentaar!</h1>
              <form name="bloginput" action="" method="post">  
                Titel van bijbehorende blog: <input type="text" name="title"><br><br>
                Jouw commentaar: <textarea id="text" name="text" rows="5" cols="90"></textarea>
                <!-- Button to submit the new written blog to the database -->
                <input type="button" name="publiceer" onClick="submitcomment();" value="Publiceer commentaar" />
              </form><br><br> 
            
            <!-- Outputbox: All the comments linked to a certain blog -->
            <form name="output" action="">  
              <div id="Outputbox">    
                <div class="column">
                <h1>Lees hier het laatste commentaar, wellicht van uw hand!</h1>
                Titel van bijbehorende blog: <input type="titelblog" name="titelblog"><br><br>     
                <textarea name="outputtext" cols="90" rows="12"></textarea>
                <!-- Button to refresh the outputbox to include new posted blogs since page was loaded --> 
                <input type="button" name="ververs" onClick="getblogcomments()" value="Ververs comments" /> 
                <br><br>    
                <!-- Remove comments or disable comment section -->
                ID van te verwijderen comment:  <input name="comment_id" placeholder="id nummer comment" type="text" />    
                <!-- Button to delete the comment with the selected id -->     
                <input type="button" name="delete" onClick="deletecomment()" value="Verwijder comment" /><br><br>  
                Titel van blog om commentaar uit te schakelen:  <input name="blog_titel" placeholder="titel blog" type="text" />    
                <!-- Button to delete the comment with the selected id -->     
                <input type="button" name="block" onClick="blockblogtitle()" value="Blokkeer commentaar bij deze blog" /><br><br>      
                </div>
              </div> 
            </form>    
            </div> 
        </div>
      </div>       
    </body>
</html>