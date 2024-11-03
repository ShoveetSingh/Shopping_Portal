<?php

require "connection.php";

if(isset($_SERVER["REQUEST_METHOD"])&&$_SERVER["REQUEST_METHOD"]=="POST"){
$mail=$_POST["mail"];
$password=$_POST["password"];

$sql_check_username = "SELECT * FROM usernames WHERE name = '$mail'";
    $result_check_username = executeQuery($conn, $sql_check_username);
    $sql_check_password = "SELECT * FROM usernames WHERE password = '$password'";
    $result_check_password = executeQuery($conn, $sql_check_password);
    if(mysqli_num_rows($result_check_username)==0)
    echo"User does not exist";
    else if(mysqli_num_rows($result_check_password)>0){
        echo "password already taken";
    }
    else
    {
        $sql_update = "UPDATE usernames SET password='$password' WHERE name='$mail'";
        $result_update = executeQuery($conn, $sql_update);
        echo "$result_update";
    }
}

?>
<html>
   <body>
    <script>
   function myfunction(){
    var id =document.getElementById("pass");
    if(id.type=="password")
    id.type="text";
else
id.type="password";
   }
</script>
    <form action="" method="post">
        <label>Enter your registered user id:<br>
            <input type="text" name="mail"/><br><br>
        <label>Change password:<br>
            <input type="password" name="password"  id="pass"/>
            <input type="checkbox" name="check" onclick="myfunction()"/><br>
            <input type="submit" value="submit"/>
</form>
   </body>
    </html>