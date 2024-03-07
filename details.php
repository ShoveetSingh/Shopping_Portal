<?php

session_start();

if(isset($_SESSION['username'])) {
    echo "Hello ".$_SESSION['username']."! You are logged in!";
} else {
    echo "Hello guest! Please log in.";
    //header('Location:register.php');
}

  require 'connection.php';

$api_url = 'https://fakestoreapi.com/products/9';
$data_json = file_get_contents($api_url);

$data_array = json_decode($data_json,true);

if($data_array!=null){
    $image = $data_array['image'];
    $name = $data_array['title'];
    $price = $data_array['price'];
    $description = $data_array['description'];

    $sql = "INSERT INTO products (image,name, price ,description) VALUES (' $image','$name','$price','$description')";
    if(executeQuery($conn,$sql)){
        echo "Product details added successfully!";
    }
    else{
        echo "Product details addition failed!";
    
    }
}
else{
    echo"Data not found!";
}

if(isset($_SERVER['REQUEST_METHOD'])){
    // $sql = "INSERT INTO wishlist (name, price ,description) VALUES ('$name','$price','$description')";
    // if(executeQuery($conn,$sql)){
    //     echo "Product added to wishlist!";
    // }
    // else{
    //     echo "Product addition to wishlist failed!";
    
    // }
      echo "<script>alert('Products added to ur wishlist!')</script>";
}
?>

<!DOCTYPE html>
<html>   
    <head>
        <title>Product Details</title>  
        <body>
            <?php
         $api_url = 'https://fakestoreapi.com/products';
         $data_json = file_get_contents($api_url);
         $data_array = json_decode($data_json,true);
         if($data_array!=null){
                echo "<table border='2'>";
                echo "<tr>";
                echo "<th style='font-family:Lucida Roboto,sans-serif;font-Size:30px;color:Tomato'>Product_Image</th>";
                echo "<th style='font-family:Lucida Roboto,sans-serif;font-Size:30px;color:Orange'>Product Name</th>";
                echo "<th style='font-family:Lucida Roboto,sans-serif;font-Size:30px;color:violet'>Price($)</th>";
                echo "<th style='font-family:Lucida Roboto,sans-serif;font-Size:30px;color:green'>Description</th>";
                echo "<th style='font-family:Lucida Roboto,sans-serif;font-Size:30px;'>Wishlist</th>";
                echo "</tr>";
                foreach($data_array as $product){
                    echo "<tr>";
                    echo "<td><img src='" . $product['image'] . "' alt='product image' width='300' height='300'></td>";
                    echo "<td style=\"font-family: 'Times New Roman', Times, serif;font-Size:25px;\">" . $product['title'] . "</td>";
                    echo "<td style=\"font-family: 'Times New Roman', Times, serif;font-Size:25px;\">" . $product['price'] . "</td>";
                    echo "<td style=\"font-family: 'Times New Roman', Times, serif;font-Size:25px;\">" . $product['description'] . "</td>";
                    echo "<td>
                    <form method='post' action='details.php'>
                    <input type='submit' name = 'clicked' value = 'add'></td>;
                    <form>";
                    echo "</tr>";
                }
                
                echo "</table>";
         }
         
         ?>   
        </body>
    </head>  
</html>