<?php
require_once("database.php");
$stmt = $conn->prepare(
  "SELECT  product.product_Name,pictures.picture, product.product_Description , product.product_Price ,product.product_ID
  FROM product
  JOIN product_Pictures
  ON product.product_ID = product_Pictures.product_ID
  JOIN pictures
  ON pictures.picture_ID = product_Pictures.picture_ID
  "
);
$stmt->execute();
$result = $stmt->fetchAll();

$card = "<div class ='row d-flex justify-content-center '>
<div class ='col-md-9 row row-cols-1 row-cols-md-2 row-cols-lg-5 row-cols-sm-1 g-5 ml-4 d-flex justify-content-center'>
 ";



foreach ($result as $key => $value) {


  $card .= "
    
    <div class ='col'>
        <div class='card' style='width: 20rem;height 18rem;'>
            <img src=images/$value[picture] class='card-img-top img-thumbnail'  alt='...'>
            <div class='card-body'>
            <p class = 'text-center'><button type='button' class='btn btn-danger disabled ml-2'>$value[product_Price] &dollar;</button></p>
            <h5 class='card-title text-center'>$value[product_Name]</h5>
            <p class='card-text text-center'>$value[product_Description]</p>

            <div class = 'text-center'>
            <a class='btn btn-warning' href='register.php?movie=$value[product_ID]'>Köp</a>
            </div>
        
      </div>
      </div>
      </div>
    
    ";
}


/**
 * 
 */





$card .= "
</div> </div>";
echo $card;
