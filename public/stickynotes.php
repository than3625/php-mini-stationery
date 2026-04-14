<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/functions.php';

$stickynotes = getProductsByCategory($products,'stickynote');

$totalStickyNotes=count($stickynotes);
$totalQuantity=getTotalQuantity($stickynotes);
$availableStickyNotes=getAvailableProducts($stickynotes);
$outOfStockStickyNotes=getOutOfStockProducts($stickynotes);
$availableCount=count($availableStickyNotes);
$outOfStockCount=count($outOfStockStickyNotes);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sticky Note List</title>
    </head>
    <body>
        <h1 style="text-align:center; color:darkcyan;">Product: Sticky Note</h1>
        <p><a href="/products.php">&larr; Back to All Products</a></p>
        <h2>Statistics:</h2>
        <ul>
            <li>Total Sticky Notes: <?php echo $totalStickyNotes?></li>
            <li>Total Quantity: <?php echo $totalQuantity?></li>
            <li>Available Sticky Notes: <?php echo $availableCount?></li>
            <li> Out Of Stock Sticky Notes: <?php echo $outOfStockCount?></li>
        </ul>

        <h2>Pen List:</h2>
        <?php if(empty($stickynotes)):?>
            <p>We will update our products soon!</p>
        <?php else:?>
            <?php foreach($stickynotes as $stickynote):?>
                <div style="margin-bottom: 16px; padding: 8px; border: 1px solid #ccc;">
                    <p><strong>Name: </strong><?php echo $stickynote['name'];?></p>
                    <p><strong>Brand: </strong><?php echo $stickynote['brand'];?></p>
                    <p><strong>Category: </strong><?php echo $stickynote['category'];?></p>
                    <p><strong>Quantity: </strong><?php echo $stickynote['quantity'];?></p>
                    <p><strong>Price: </strong><?php echo formatPrice($stickynote['price']);?></p>
                    <p><strong>Status: </strong><?php echo getStockStatus($stickynote['quantity']);?></p>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
    </body>
</html>