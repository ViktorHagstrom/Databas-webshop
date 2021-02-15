
<?php require_once('header.php');


require_once("database.php");
$stmt = $conn->prepare(
"SELECT  product.product_Name,pictures.picture, product.product_Description , product.product_Price ,product.product_ID
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



require_once('footer.php');


/**
 * 
 * 
 * ,product_Pictures,product_Category,pictures,category
 * WHERE product.product_ID = 3 , pictures.picture_ID=2
 *GROUP BY product.product_ID
 */

?>


