<?php
 
//require 'styles/font.php';

session_start();

require 'connection.php';

if(isset($_SESSION['username'])) { 
    echo "Hello ".$_SESSION['username']."! You are logged in!";
} else {
    echo "Hello guest! Please log in.";
    //header('Location:register.php ');
}
 

$api_url = ' https://api.escuelajs.co/api/v1/products';
 $data_json = file_get_contents($api_url);

$data_array = json_decode($data_json,true);

if($data_array!=null){ 
    foreach($data_array as $product){
    $image = mysqli_real_escape_string($conn,$product['image']);
    $name = mysqli_escape_string($conn,$product['title']);
    $price = mysqli_escape_string($conn,$product['price']);
    $description = mysqli_escape_string($conn,$product['description']) ;

    $sql = "INSERT INTO products (image,name, price ,description) VALUES ('$image','$name','$price','$description')";
    if(executeQuery($conn,$sql)){
        echo " ";
    }
    else{
        echo "Product details addition failed!";
    
    }
    }
}
else{ 
    echo"Data not found!";
}
?>

<!DOCTYPE html>
<html>   
    <head>
        <title>Product Details</title> 
        <link rel = "stylesheet" type = "text/css" href = "styles/font.php"> 
        </head>
        <body>
            <?php
         $api_url = 'https://api.escuelajs.co/api/v1/products';
         $data_json = file_get_contents($api_url);
         $data_array = json_decode($data_json,true);
         if($data_array!=null){  
                echo "<table border='2'>";
                echo "<tr>";
                echo "<th style='font-family:Oswald,sans-serif;font-Size:30px;color:Tomato font-style:italic'>Product_Image</th>";
                echo "<th style='font-family:Oswald,sans-serif;font-Size:30px;color:Orange'>Product Name</th>";
                echo "<th style='font-family:Oswald,sans-serif;font-Size:30px;color:violet'>Price($)</th>";
                echo "<th style='font-family:Oswald,sans-serif;font-Size:30px;color:green'>Description</th>";
                echo "<th style='font-family:Oswald,sans-serif;font-Size:30px;'>Wishlist</th>";
                echo "</tr>";
                foreach($data_array as $product){
                    echo "<tr>";
                    echo "<td><img src='" . $product['category']['image'] . "' alt='product image' width='300' height='300'></td>";
                    echo "<td style=\"font-family: 'Times New Roman', Times, serif;font-size:25px;\">" . $product['title'] . "</td>";
                    echo "<td style=\"font-family: 'Times New Roman', Times, serif;font-size:25px;\">" . $product['price'] . "</td>";
                    echo "<td style=\"font-family: 'Times New Roman', Times, serif;font-size:25px;\">" . $product['description'] . "</td>";
                    echo "<td>
                    <form method='post' action='wishlist.php'>
                    <input type='hidden' name='product' value='".json_encode($product)."'>
                    <input type='submit' name = 'clicked' value = 'Add'>
                    </form>
                    </td>";
                    echo "</tr>";
                }
                
                echo "</table>";
         }
         
         ?>   
        </body>  
</html>