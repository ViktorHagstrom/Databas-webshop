<?php

require_once("database.php");
require_once("Product.php");


/* $stmt = $conn->prepare("SELECT product_name,product_Description FROM product WHERE product_ID = ca");
$stmt->execute();

$result = $stmt->fetchAll();

echo "<pre>";
print_r($result);
echo "</pre>";  */


/*  $keys = array();
foreach ($result as $key => $value) {
    array_push($keys, $value);
}  */


/*
$stmt = $conn->prepare("SELECT * FROM product");
$stmt->execute();

$result = $stmt->fetchAll();

echo "<pre>";
print_r($result);
echo "</pre>"; */

$stmt = $conn->prepare("SELECT product_ID FROM product_Category WHERE category_ID = 1");

$stmt->execute();

$result = $stmt->fetchAll();

$test = array();

$products = array();

 foreach ($result as $key => $value) {


    $stmt = $conn->prepare("SELECT * FROM product");
    $stmt->execute();
    array_push($test, $stmt->fetchAll());
    /*    $productObject = new Product($value[0]['product_Name']);
    $product = $productObject->toArray();
    array_push($products,$product); */
} 
/* echo "<pre>";
    print_r($test);
    echo "</pre>"; 

    foreach ($test as $key => $value) {
        echo $value[$key]['product_Name'];
        echo $value[$key]['product_ID'];
    } */



foreach ($test as $key => $value) {
    $index = $value[$key]['product_ID'];

    $stmt = $conn->prepare("SELECT picture FROM product_pictures WHERE product_ID = $index");
    $stmt->execute();
    $result = $stmt->fetchAll();
    

    $imageId = array_values_recursive($result);
    

    $stmt = $conn->prepare("SELECT category_ID FROM product_category WHERE product_ID = $index");
    $stmt->execute();
    $result = $stmt->fetchAll();

    $categoryId = array_values_recursive($result);
    $categoryId = array_values($categoryId);
   

    /* echo "<pre>";
    print_r(array_values($ID));
    echo "</pre>";
echo $ID[0]; 
*/
    

     $productObject = new Product($value[$key]['product_Name'], $value[$key]['product_ID'], $value[$key]['product_Description'], $value[$key]['product_Price'],$imageId,$categoryId);
    $product = $productObject->toArray();
    array_push($products, $product);

    

    

    
    
}
echo "<pre>";
print_r($products);
echo "</pre>";


/**
 * Jag vet inte vad den gör men den fungerar nästan 
 * från: https://www.php.net/manual/en/function.array-values.php#56381
 */
function array_values_recursive($array)
{
    $arrayValues = array();

    foreach ($array as $value)
    {
        if (is_scalar($value) OR is_resource($value))
        {
             $arrayValues[] = $value;
        }
        elseif (is_array($value))
        {
             $arrayValues = array_merge($arrayValues, array_values_recursive($value));
        }
    }

    return $arrayValues;
}


/* $imageArray = array();
foreach ($test as $key => $value) {
    $index = $value[$key]['product_ID'];

    $stmt = $conn->prepare("SELECT picture_ID FROM product_pictures WHERE product_ID = $index");
    $stmt->execute();
    $result = $stmt->fetchAll();


    $imageId = array_push($result);

    

     echo "<br>";
    echo "TEST";
    echo "<pre>";
    print_r($imageId);
    echo "</pre>"; 
    echo $imageId[$key]['picture_ID'];} */
 
