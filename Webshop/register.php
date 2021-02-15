<?php
require_once("database.php");
require_once("header.php");
require_once("navbar.php");

$movie = $_GET['movie'];

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

/* echo "<pre>";
print_r($resultMovie);
echo "</pre>"; */

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

/* echo "<pre>";
print_r($categories);
echo "</pre>"; */

?>

<h1 class="text-center">Register Order</a> </h1>


<?php

$view = "<div class='row justify-content-center '> <div class = col-1></div> ";

foreach ($resultMovie as $key => $value) {
   
    $view .= 
    " 
    <form action='confirmation.php' method='post' class='col-4 '>

        <div class='col'>
            <label for='name' class='form-label'>Submit name</label>
            <input required type='text' name='name' class='form-control' placeholder='Namn' >
        </div>

        <div class='col'>
            <label for='email' class='form-label mt-1'>Submit E-mail</label>
            <input required type='email' name='email' class='form-control mt-1' placeholder='E-post'>
        </div>

        <div class='col'>
            <label for='tel' class='form-label mt-1'>Submit phone number</label>
            <input required type='text' name='tel' class='form-control mt-1' placeholder='Telefonnummer'>
        </div>

        <div class='col'>
            <label for='address' class='form-label mt-1'>Submit address</label>
            <input required type='text' name='address' class='form-control mt-1' placeholder='Adress'>
        </div>
        
        <div class= 'row mt-5'>
            <div class ='col-4'></div>
                <div class='col-4 text-center'>
                <input type='submit' class='form-control btn btn-warning' value='Register'>
                </div>
            <div class ='col-4'></div>
        </div>
        
        <div class='col'>
        
            <input required type='hidden' name='movie' class='form-control mt-1' value = '$movie'>
        </div>

    </form>

    <div class = 'col-1'>
        <img class ='img-fluid' style='width: 20rem;height: 18rem;' src='images/$value[picture]' alt='$value[product_Name]'>
        
    </div>
    <div class = 'col-2 text-center'>
        <h4>$value[product_Name] </h4> 
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

$view .= "</div></div>";
echo $view;

?>



<?php

$errMessage = "<div class = 'row'>
<div class='col-md-1'></div>
 <div class='alert-danger text-center col-10 ' role='alert'><p class = 'mt-3'style = 'color:white; font-size:20px;'><b>Felaktig inmatning!</b></p></div>
 <div class='col-md-1'></div>
 </div> ";

$succesMessage = "
<div class = 'row'>
<div class='col-md-1'></div> 
<div class='alert-success text-center col-10' role='alert'><p class = 'mt-3'style = 'color:white; font-size:20px;'><b>Din beställning har registrerats!</b></p></div>
<div class='col-md-1'></div>
</div> ";


require_once("footer.php");
?>
