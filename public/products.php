<?php

$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/functions.php';

$totalProducts=count($products);
$totalQuantity=getTotalQuantity($products);
$availableProducts=getAvailableProducts($products);
$outOfStockProducts=getOutOfStockProducts($products);
$availableCount=count($availableProducts);
$outOfStockCount=count($outOfStockProducts);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>All Products</title>
    </head>
    <body>
        <h1 style="text-align: center; color:darkcyan;"> Stationery Products </h1>
        <p><a href="/index.php">&larr; Back to Home</a></p>
        <h2>Statistics</h2>
        <ul>
            <li>Total Products: <?php echo $totalProducts;?></li>
            <li>Total Quantity: <?php echo $totalQuantity;?></li>
            <li>Available Products: <?php echo $availableCount;?></li>
            <li>Out Of Stock Product: <?php echo $outOfStockCount;?></li>
        </ul>
        <h2>Product Categories:</h2>
        <ul>
            <li><a href="/pens.php">Pen</a></li>
            <li><a href="/notebooks.php">Notebook</a></li>
            <li><a href="/stickynotes.php">Sticky Note</a></li>
        </ul>

        <h2>All Products List:</h2>
        <?php if(empty($products)):?>
            <p>We will update our products soon!</p>
        <?php else:?>
            <?php foreach($products as $product):?>
                <div style="margin-bottom:16px;padding:8px;border:1px solid #ccc;">
                    <p><strong>Name: </strong><?php echo $product['name'];?></p>
                    <p><strong>Brand: </strong><?php echo $product['brand'];?></p>
                    <p><strong>Category: </strong><?php echo $product['category'];?></p>
                    <p><strong>Quantity: </strong><?php echo $product['quantity'];?></p>
                    <p><strong>Status: </strong><?php echo getStockStatus($product['quantity']);?></p>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </body>
</html>