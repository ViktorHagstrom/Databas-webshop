
<?php require_once('header.php');


require_once("database.php");
$stmt = $conn->prepare(
"SELECT  product.product_Name,pictures.picture, 
FROM product
JOIN product_Pictures
ON product.product_ID = product_Pictures.product_ID
JOIN pictures
ON pictures.picture_ID = product_Pictures.picture_ID
");
$stmt->execute();
$result = $stmt->fetchAll();

echo "<pre>";
print_r($result);
echo "</pre>";

require_once('footer.php');


/**
 * 
 * 
 * ,product_Pictures,product_Category,pictures,category
 * WHERE product.product_ID = 3 , pictures.picture_ID=2
 *GROUP BY product.product_ID
 */

?>


