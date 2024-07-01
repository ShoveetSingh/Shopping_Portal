<?php
require 'connection.php';

if(isset($_POST['clicked'])){
    $click = $_POST["product"];
    
    // Check if $click is not empty and is a valid JSON string
    if (!empty($click) && function_exists('json_last_error')) {
        $product = json_decode($click, true);
        var_dump($product);
        
        // Check if $product is not null and has a 'title' key
        if ($product!== null && isset($product['image'])) {
            echo $product['image'];
        } else {
            echo "Product title could not be retrieved.";
        }
    } else {
        echo "Invalid product data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ur wishlist</title>
    <link rel="stylesheet" type="text/css" href="styles/font.php">
    <h1>See your saved items</h1>
</head>
<body>
    <!-- Your HTML content here -->
</body>
</html> 