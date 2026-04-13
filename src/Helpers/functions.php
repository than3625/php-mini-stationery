<?php

function getStockStatus(int $quantity):string
{
    if($quantity<=0){
        return 'Out of stock';
    } else if ($quantity<=5){
        return 'Low stock';
    }
    return 'Available';
}

function getTotalQuantity(array $products):int
{
    return array_reduce($products,function($carry,$product){
        return $carry + $product['quantity'];
    },0);
}

function getProductsByCategory(array $products,string $category)
{
    return array_filter($products,function ($product) use($category) 
        {return $product['category']===$category;}
    );
}

function getAvailableProducts(array $products):array
{
    return array_values(array_filter($products, function($product){
        return $product['quantity']>0;
    }));
}

function getOutOfStockProducts(array $products): array
{
    return array_values(array_filter($products, function($product) {
        return $product['quantity'] <= 0;
    }));
}