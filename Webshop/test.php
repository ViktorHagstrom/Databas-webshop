<?php

require_once("database.php");


$stmt = $conn->prepare("SELECT category_ID FROM category WHERE category = 'Skor'");
$stmt->execute();

$result=$stmt->fetchAll();



foreach ($result as $key => $value) {
    $catID = $value['category_ID'];

}

 echo "<pre>";
print_r($result);
echo "</pre>"; 

$stmt = $conn->prepare("SELECT product_ID FROM product_Category WHERE category_ID = $catID");
$stmt->execute();
$result=$stmt->fetchAll();

$shoes = count($result);
echo $shoes;




$stmt = $conn->prepare("SELECT product_Name FROM product WHERE product_ID = 1 ");
$stmt->execute();
$result=$stmt->fetchAll();




 echo "<pre>";
print_r($result);
echo "</pre>"; 