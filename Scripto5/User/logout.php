<!-- Page to logout the user and send the user back to inlog page
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.html"); // Redirecting To inlog page
}
?>
