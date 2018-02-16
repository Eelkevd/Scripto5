<!-- Page to logout the user and send the user back to inlog page
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To inlog page
}
?>
