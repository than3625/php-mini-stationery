<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/functions.php';

$notebooks = getProductsByCategory($products,'notebook');

$totalNotebooks=count($notebooks);
$totalQuantity=getTotalQuantity($notebooks);
$availableNotebooks=getAvailableProducts($notebooks);
$outOfStockNotebooks=getOutOfStockProducts($notebooks);
$availableCount=count($availableNotebooks);
$outOfStockCount=count($outOfStockNotebooks);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notebook List</title>
    </head>
    <body>
        <h1 style="text-align:center; color:darkcyan;">Product: Notebook</h1>
        <p><a href="/products.php">&larr; Back to All Products</a></p>
        <h2>Statistics:</h2>
        <ul>
            <li>Total Notebooks: <?php echo $totalNotebooks?></li>
            <li>Total Quantity: <?php echo $totalQuantity?></li>
            <li>Available Notebooks: <?php echo $availableCount?></li>
            <li> Out Of Stock Notebooks: <?php echo $outOfStockCount?></li>
        </ul>

        <h2>Pen List:</h2>
        <?php if(empty($notebooks)):?>
            <p> We will update our products soon!</p>
        <?php else:?>
            <?php foreach($notebooks as $notebook):?>
                <div style="margin-bottom: 16px; padding: 8px; border: 1px solid #ccc;">
                    <p><strong>Name: </strong><?php echo $notebook['name'];?></p>
                    <p><strong>Brand: </strong><?php echo $notebook['brand'];?></p>
                    <p><strong>Category: </strong><?php echo $notebook['category'];?></p>
                    <p><strong>Quantity: </strong><?php echo $notebook['quantity'];?></p>
                    <p><strong>Status: </strong><?php echo getStockStatus($notebook['quantity']);?></p>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </body>
</html>