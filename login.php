<?php

require 'connection.php'; 

if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "SELECT * FROM usernames WHERE name = '$username' AND password = '$password'";
    if(executeQuery($conn,$sql)){
        echo "Login Successfull!";
        header('Location:details.php');
        exit();
    }
    else{
        echo "Username or password incorrect!";
    }
}

?>


<!Doctype html>
<html>
    <head><title>Login?</title></head>
    <body>
        <form method="post" action="login.php">
            Username:<input type="text" required><br><br>
            Password:<input type="password" required><br><br>
            <input type="submit" value="Login">
</form>
        <!-- <input type="submit" value="Delete" > -->
    </body>