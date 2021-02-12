<?php
require_once("database.php");
$stmt = $conn->prepare("SELECT * FROM product");
$stmt->execute();
$result =$stmt->fetchAll();

$card ="<div class ='row row-cols-1 row-cols-md-2 g-4 '>
 ";

foreach ($result as $key => $value) {
 

    $card.="
    
    <div class ='col'>
    <div class='card' style='width: 20rem;height 18rem;'>
      <img src=images/420.jpg class='card-img-top img-thumbnail'  alt='...'>
      <div class='card-body'>
        <h5 class='card-title text-center'>$value[product_Name]</h5>
        <p class='card-text text-center'>$value[product_Description]</p>
        <p class = 'text-center'>$value[product_Price]:-</p>
      </div>
      </div>
      </div>
    
    ";
}

$card .= "</div>";
echo $card;

