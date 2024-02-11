<?php

require 'connection.php';

$api_url = 'https://fakestoreapi.com/products/9';
$data_json = file_get_contents($api_url);

$data_array = json_decode($data_json,true);

if($data_array!=null){
    $name = $data_array['title'];
    $price = $data_array['price'];
    $description = $data_array['description'];

    $sql = "INSERT INTO products (name, price ,description) VALUES ('$name','$price','$description')";
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
                echo "<th>Product Name</th>";
                echo "<th>Price</th>";
                echo "<th>Description</th>";
                echo "</tr>";
                foreach($data_array as $product){
                    echo "<tr>";
                    echo "<td>".$product['title']."</td>";
                    echo "<td>".$product['price']."</td>";
                    echo "<td>".$product['description']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
         }
         
         ?>   
        </body>
    </head>  
</html>