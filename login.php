<?php

require 'connection.php'; 

if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "SELECT name,password FROM usernames WHERE name = '$username' AND password = '$password'";
    $result = executeQuery($conn,$sql);
    if($result->num_rows>0 && $result!=null){
        echo "Login Successfull!";
        header('Location:details.php');
        exit();
    }
    else{
        echo "<script>alert('Username or password unsuccessfull!');</script>";
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
        <!-- <input type="submit" value="Delete" > -->
    </body>