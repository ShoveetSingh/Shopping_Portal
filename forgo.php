<php
require 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_SERVER["REQUEST_METHOD"]) &&$_SERVER["REQUEST_METHOD" ] == "POST"){

$user=$_POST["name"] ;

$mail = new PHPMailer(true);
try{
 $mail->SMTP();
 $mail->HOST = "smtp.gmail.com";
 $mail->SMTPAuth=true;
 $mail->Username="shoveetsingh2002@gmail.com";
       $mail->Password="gzny aoxq zdhk avui";
       $mail->SMTPSecure="tls";//PHPMailer::ENCRYPTION_STARTTLS
       $mail->Port=587;
       $mail->setFrom("shoveetsingh2002@gmail.com","Shoveet");
       $mail->addAddress($username,"Batista");
       $mail->Subject="User id authentication";
       $mail->Body="hello bro!!!";
        $mail->send();
       echo "Mail Sent Successfully!";
}
catch(Exception $e){
  echo"MAil not sent!";
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