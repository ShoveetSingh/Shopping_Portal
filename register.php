 <?php
 
require 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "INSERT INTO usernames (name, password) VALUES ('$username','$password')";
    if(mysqli_query($conn, $sql)){
        echo "Registration Successfull!";
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
</body>
</html>