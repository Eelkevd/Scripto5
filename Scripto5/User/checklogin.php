<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="scripto5"; // Database name
$tbl_name="commentlogin"; // Table name

// Connect to server and select databse.
$link = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");
// username and password sent from form
$myusername=$_POST['myusername'];
$pasw =$_POST['mypassword'];
//$mypasw = password_hash($pasw, PASSWORD_DEFAULT);

$sql="SELECT username, password FROM $tbl_name WHERE username='$myusername'";
//$result=mysqli_query($link, $sql);

// Mysql_num_row is counting table row
//$count=mysqli_num_rows($result);
$result = $link->query($sql);

// If result matched $myusername and $mypassword, table row must be 1 row
//if($count > 0){
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
        $hashpasw = $row['password'];
        if(password_verify($pasw, $hashpasw)){ 
            session_start();    
            $_SESSION["username"] = $myusername;
            header("location:CommentUser5.php");
        }
    }
}
else {
echo "Wrong Username or Password";
}
?>