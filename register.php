<?php
  
require 'connection.php';

if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "INSERT INTO usernames (name, password) VALUES ('$username','$password')";
    if(executeQuery($conn, $sql)){
        echo "Registration Successfull!"; 
        header('Location:details.php');
        exit();
    }
    else{
        echo "Registration failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="register.php">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Register">
</form>
<h2>Already a user? <a href="login.php">Login</a></h2>
</body>
</html>  