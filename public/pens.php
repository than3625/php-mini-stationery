<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/functions.php';

$pens = getProductsByCategory($products,'pen');

$totalPens=count($pens);
$totalQuantity=getTotalQuantity($pens);
$availablePens=getAvailableProducts($pens);
$outOfStockPens=getOutOfStockProducts($pens);
$availableCount=count($availablePens);
$outOfStockCount=count($outOfStockPens);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pen List</title>
    </head>
    <body>
        <h1 style="text-align:center; color:darkcyan;">Product: Pen</h1>
        <p><a href="/products.php">&larr; Back to All Products</a></p>
        <h2>Statistics:</h2>
        <ul>
            <li>Total Pens: <?php echo $totalPens?></li>
            <li>Total Quantity: <?php echo $totalQuantity?></li>
            <li>Available Pens: <?php echo $availableCount?></li>
            <li> Out Of Stock Pens: <?php echo $outOfStockCount?></li>
        </ul>

        <h2>Pen List:</h2>
        <?php if(empty($pens)):?>
            <p>We will update our products soon!</p>
        <?php else:?>
            <?php foreach($pens as $pen):?>
                <div style="margin-bottom: 16px; padding: 8px; border: 1px solid #ccc;">
                    <p><strong>Name: </strong><?php echo $pen['name'];?></p>
                    <p><strong>Brand: </strong><?php echo $pen['brand'];?></p>
                    <p><strong>Category: </strong><?php echo $pen['category'];?></p>
                    <p><strong>Quantity: </strong><?php echo $pen['quantity'];?></p>
                    <p><strong>Status: </strong><?php echo getStockStatus($pen['quantity']);?></p>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </body>
</html>