<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'connection.php';
 
$body = '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

';   


if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql_check_username_password = "SELECT * FROM usernames WHERE name = '$username' OR password = '$password'";
    $result_check_username_password = executeQuery($conn, $sql_check_username_password);
    if (mysqli_num_rows($result_check_username_password)==0){

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
       $mail->addAddress($username,"Batista");
       $mail->Subject="User id authentication";
       //$mail->Body="hello bro!!!";
       $mail->msgHTML($body);
        $mail->send();
       echo "Mail Sent Successfully!";

       $sql = "INSERT INTO usernames (name, password) VALUES ('$username','$password')";
     }
     catch(Exceptione  $e){
        echo "Mail not sent error!";
     }

    if(executeQuery($conn, $sql)){ 
        echo "Registration Successfull!";
        setcookie("username", $username, time() + (86400 * 30), "/");
        header('Location:details.php');
        $_SESSION['username'] = $username;
        //echo "Hello ".$_Cookies['username']."! You are signed up!";
        exit();
    } 
    else{
        echo "Registration failed!";
    }
}
else{
    echo "<p style='font-family:Lucida Handwriting,cursive; font-Size:30px; color:red;'>Username already exists! or Password already taken!!!</p>";
}
}
?>

<!DOCTYPE >
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    
    <audio autoplay loop>
                <source src = "Vande Mataram - (Raag.Fm).mp3" type ="audio/mpeg">
             </audio>
    <form method="post" action="register.php">
        User-mail: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Register">
</form>
<h2>Already a user? <a href="login.php">Login</a></h2>
</body>
</html>    