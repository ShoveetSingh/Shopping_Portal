<?php

if(isset($_POST['clicked'])){
    $click = $_POST['product'];

    echo "<h1>see ur saved items<br></h1>";   
    if (!empty($click) && function_exists('json_last_error')) {
        
         $product = json_decode($click, true,2048); 
        
        
        // Check if $product is not null and has a 'title' key
        if ($product!= null && isset($product['category']['image'])) {
            print "<img src=" . $product['category']['image'] . " height=200px width=200px>";
            echo$product['title'];
            echo"<br>";
            echo$product['description'];
        } else {
            echo "  Product image could not be retrieved.";
        }
    } else {
        echo "Invalid product data.";
    }
}
?>