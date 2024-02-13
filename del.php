<?php
require "connection.php";

if(isset($_SERVER['REQUEST_METHOD'])&&$_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $sql="DELETE FROM usernames WHERE name='$name'";
    $result=executeQuery($conn,$sql);
    if($result){
        header('Location:register.php');
    }
    else{
        echo "<script>alert('Please enter correct username');</script>";
    }
}

?>

<!Doctype html>

<html>
    <head><title>Delete ur account</title></head>
    <body>
          <form action="del.php" method="post">
            Enter your username to verify:<br><input type="text" name="name" required>
            <input type="submit" value="Delete">
</form>
</form>

    </body>
    </html>