<?php
require_once("database.php");
require_once("header.php");
require_once("navbar.php");

$movie = $_POST['movie'];

 $stmt = $conn->prepare(
    "SELECT  product.product_Name,pictures.picture, product.product_Description , product.product_Price 
    FROM product
    JOIN product_Pictures
    ON product.product_ID = product_Pictures.product_ID
    JOIN pictures
    ON pictures.picture_ID = product_Pictures.picture_ID
    WHERE product.product_ID = $movie;
    "
);
$stmt->execute();
$resultMovie = $stmt->fetchAll();

$stmt = $conn->prepare(
    "SELECT category.category
    FROM category
    JOIN product_category
    ON category.category_ID = product_category.category_ID
    JOIN product
    ON  product.product_ID = product_category.product_ID
    WHERE product.product_ID = $movie;
    "
);
$stmt->execute();
$resultCategory = $stmt->fetchAll();

$categories = array();
foreach ($resultCategory as $key => $value) {
    array_push($categories,ucfirst($value['category']));
}

?>
<h1 class="text-center">Your purchase has been registered</h1>
<?php
$view = "<div class=' row justify-content-center'>";

foreach ($resultMovie as $key => $value) {
    $view .="
    <div class='col-1'>
        <img class='img-fluid' style='width: 20rem;height: 18rem;' src='images/$value[picture]' alt='$value[product_Name]'>

    </div>
    <div class='col-2 text-center'>
        <h4> $value[product_Name] </h4>
        <div class ='text-center'>
        ";

        foreach ($categories as $key => $category)
        {
        $view .= "
        <button type='button' class='btn btn-warning disabled ml-2'>$category</button>";
        }
    $view .= "

    </div>
    
    <p class ='mt-2'>
    $value[product_Description]
    </p>

    <div class = 'text-center' >
    <button type='button' class='btn btn-danger disabled ml-2'>$value[product_Price] &dollar;</button>
    
    </div>

    </div>
    
    ";  
}
$view .= "</div>";
echo $view;
require_once("footer.php");

    

   

     
