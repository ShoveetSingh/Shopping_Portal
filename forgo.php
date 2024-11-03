<?php
require 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_SERVER["REQUEST_METHOD"]) &&$_SERVER["REQUEST_METHOD" ] == "POST"){

$body='
<html>
<head>
<title>pasword reset</title>
</head>
<body>
<h1> Click on the below link to reset password</h1>
<a href="https://localhost/My_PHP_Project/mail.php">Click on me</a>
</body>
</html>
';

$user=$_POST["mail"] ;

$mail = new PHPMailer(true);
try{
 $mail->isSMTP();
 $mail->Host = "smtp.gmail.com";
 $mail->SMTPAuth=true;
 $mail->Username="shoveetsingh2002@gmail.com";
       $mail->Password="almi wrxo nrbz ncgu";
       $mail->SMTPSecure="tls";//PHPMailer::ENCRYPTION_STARTTLS
       $mail->Port=587;
       $mail->setFrom("shoveetsingh2002@gmail.com","Shoveet");
       $mail->addAddress($user,"user");
       $mail->Subject="User account recovery.";
       $mail->msgHTML($body);
      // $mail->body=' Click on the below link to change password.' ;
        $mail->send();
      // echo "Mail Sent Successfully!";
      header("Location:login.php");
}
catch(Exception $e){
  echo "MAil not sent!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget password!</title>
</head>
<body>
    
<form action="forgo.php" method="post">
    <label>Enter the  mail id and we will send u an email with instruction to reset ur password: </label>
    <br><br><input type="text" name="mail" placeholder="abc@gmail.com">
   <br> <input type="submit" value="Submit">
</form>

</body>
</html>