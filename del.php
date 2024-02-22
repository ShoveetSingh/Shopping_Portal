<?php
require "connection.php";

if(isset($_SERVER['REQUEST_METHOD'])&&$_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $sql="DELETE FROM usernames WHERE password='$name'";
    $result=executeQuery($conn,$sql); 
    if($result){
        if(mysqli_affected_rows($conn)>0){
            header('Location:register.php');
        }
       else{
              echo "<script>alert('Please enter correct password');</script>";
       }
    }
    else{
        echo "<script>alert('Error deleting username!');</script>";
    }
} 
?>

<!Doctype html>

<html>
    <head><title>Delete ur account</title></head>
    <body>
          <form action="del.php" method="post">
            Enter your password to verify:<br><input type="password" name="name" required>
            <input type="submit" value="Delete">
</form>

    </body>
    </html>