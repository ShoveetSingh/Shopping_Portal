<?php
session_start();

require 'connection.php'; 

if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  
    $username=$_POST['username'];
    $password=$_POST['password'];
    

    $sql = "SELECT name,password FROM usernames WHERE name = '$username' AND password = '$password'";
    $result = executeQuery($conn,$sql);
    if(mysqli_num_rows($result)>0 && $result!=null){
        //echo "Login Successfull!";
        $_SESSION['username'] = $username;
        header('Location:details.php');
        exit();
    }
    else{
        //header('Location:login.php');
        echo "<p style='font-size:30px; font-family:Lucida Handwriting,cursive; color:red;'> Username or password unsuccessfull!</p>";
        exit();
    }
}


?>


<!Doctype html>
<html>
    <head><title>Login?</title></head>
    <body>
        <form method="post" action="login.php">
            Username:<input type="text" name="username" required><br><br>
            Password:<input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <!-- <form method="get" action="login.php">
        <input type="submit" value="Delete ur id" > 
        </form> -->
        <div style=" display:flex; justify-content:center;  align-items:left;">
        <a style="color:green;" href="forgo.php">forget password!</a><br><br>
</div>

        <a href="del.php">Delete account!!!</a>
    </body>