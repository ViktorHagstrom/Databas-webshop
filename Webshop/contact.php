<?php 
require_once('database.php');
require_once('header.php');
require_once('navbar.php');
?>

<?php
require_once("database.php");

$errMessage = "<div class = 'row'>
<div class='col-md-1'></div>
 <div class='alert-danger text-center col-10 ' role='alert'><p class = 'mt-3'style = 'color:white; font-size:20px;'><b>Felaktig inmatning!</b></p></div>
 <div class='col-md-1'></div>
 </div> ";
$succesMessage = "<div class='alert-success text-center' role='alert'><p>Tack för visat intresse</p></div> ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (empty($name) == 1 || empty($email) == 1 || empty($message) == 1) {
        echo $errMessage;
    }else{
        $stmt = $conn->prepare("INSERT INTO contact (name,email,message)
        VALUES (:name, :email, :message)");
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':message',$message);
        $stmt->bindParam(':name',$name);
        $stmt->execute();
        echo $succesMessage; 
    }
   
}
?>

<h1 class="text-center">Kontaktformulär</a> </h1>


<div class="row">

<div class ="d-flex justify-content-center">

<form action="#" method="post" class="col-4">


    <div  >
        <input required type="text" name="name" class="form-control" placeholder="Namn" maxlength="50" >

    </div>
    <div >
        <input required type="email" name="email" class="form-control" placeholder="E-post" maxlength="50">
    </div>
    <div >
        <textarea type="text" required name="message" cols="30" rows="5" class="form-control" maxlength="200" placeholder="Skriv ett meddelande"></textarea>
    </div>
    <div class="row">
    
    <div class="col-5"></div>

    <div class=" col-2">
        <input type="submit" class="form-control mt-2 btn-warning" value="Skicka">

    </div>
    
    </div>
   


</form>

</div>


</div>


<?php
require_once("footer.php")
?>