    <!-- Send email with link to passwordchange page to emailaddres -->
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if(isset($_POST['submit'])){
    $mail = new PHPMailer(true);                          // Passing `true` enables exceptions
    try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.wijzijncodegorilla.nl';           // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tomklru270';                       // SMTP username
    $mail->Password = 'p8znwji8';                         // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@wijzijncodegorilla.nl', 'Mailer');
    $mail->addAddress('JdeB112154@gmail.com', 'User');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New password link Scripto';
    $mail->Body    = 'The link to make a new password: http://wijzijncodegorilla.nl/jorik/Scripto5/User/Newpassword.html';
    $mail->AltBody = 'The link to make a new password: http://wijzijncodegorilla.nl/jorik/Scripto5/User/Newpassword.html';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- The inlog page for the comment section for users of the Scripto blog application -->
        <title>	Scripto Blog application </title>
        <!-- Link to css style file -->
        <link type="text/css" rel="stylesheet" href="index.css" />
	    <meta charset="utf-8">    
     </head>
        
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
                <a href="IndexUser5.html">Blogs</a>
                <a href="CategoryUser5.html">Categorieën</a>
                <a href="index.php">Commentaar</a>
                <a href="SearchUser5.html">Zoek blog</a>
                <a href="RegisterUser5.html">Maak account om commentaar te geven!</a>
                <div style="clear:both"></div>  
            </div><br>
            
            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                <tr>
                <form name="form1" method="post" action="checklogin.php">
                <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                        <tr>
                        <td colspan="3">Log in om commentaar te geven!</td>
                        </tr>
                    <tr>
                        <!-- Input of username user -->
                        <td width="78">Username</td>
                        <td width="6">:</td>
                        <td width="294"><input name="myusername" type="text" id="myusername"></td>
                    </tr>
                    <tr>
                        <!-- Input of password user -->
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="mypassword" type="text" id="mypassword"></td>
                    </tr>
                    <tr>
                        <!-- Submit username and password to checklogin.php for approval -->
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Login"></td>
                    </tr>
                </table>
                </td>
                </form>
                </tr>
            </table><br><br>
            
            Wachtwoord vergeten? Vraag nieuw wachtwoord aan met je mail!:<br><br>
             <form name="emailinput" action="" method="post">  
                Jouw email: <input type="text" name="email"><br>
                <!-- Button to send password change link to mail -->
             <input type="submit" name="submit" value="Vraag wachtwoord aan">
             </form><br><br>
            
        </div>
      </div>  
    </body>
</html>