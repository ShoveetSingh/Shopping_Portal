<?php

if(isset($_POST['logout'])){
echo "<script>window.alert('Session destroyes')</script>";

session_start();
session_unset();
}
header('Location:login.php');
?>