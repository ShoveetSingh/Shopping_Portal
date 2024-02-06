<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = `shop`;


$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn){
    die("Connection failure");
}
else{
    echo "Connection Successsfull!";
}

?>