<?php
// Check login input from admin, start session
$host="localhost"; // Host name
$username="tomklru270_Scripto5user"; // Mysql username
$password="wachtwoord"; // Mysql password
$db_name="tomklru270_Scripto5"; // Database name
$tbl_name="login"; // Table name

// Connect to server and select databse.
$link = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");

// Username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// Get username and password from database
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($link, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){   
    // Register $myusername, $mypassword and redirect to file "IndexAdmin5.php"
    session_start();    
    $_SESSION["username"] = $myusername;
    //session_register("mypassword");
    header("location:IndexAdmin5.php");
}
else {
    echo "Wrong Username or Password";
}
?>