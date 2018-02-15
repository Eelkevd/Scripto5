<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="scripto5"; // Database name
$tbl_name="commentlogin"; // Table name
$hashpasw="";
    
// Connect to server and select databse.
$link = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");
// username and password sent from form
$myusername=$_POST['myusername'];
$pasw =$_POST['mypassword'];
//$mypasw = password_hash($pasw, PASSWORD_DEFAULT);

$sql="SELECT username, password FROM $tbl_name WHERE username='$myusername'";

$result=mysqli_query($link, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

while($row = $result->fetch_assoc()) { 
        $hashpasw = $row['password'];
}
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1 && password_verify($pasw, $hashpasw)){   
// Register $myusername, $mypassword and redirect to file "IndexAdmin5.php"
session_start();    
$_SESSION["username"] = $myusername;
//session_register("mypassword");
header("location:CommentUser5.php");
}
else {
echo "Wrong Username or Password";
}
?>