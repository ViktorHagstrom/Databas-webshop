<!-- Modal -->
<div class='modal fade' id='exampleModalCenter$key' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
     <div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
       <div class='modal-content '>
         <div class='modal-header'>
           <h5 class='modal-title  ' id='exampleModalLongTitle'>Köp $value[product_Name]</h5>
           <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
           </button>
         </div>
         <div class='modal-body '>

         <div class='row'>
         
         <div class = 'col-8'>
         <h1 class='text-center'>Registrera köp </h1>

        <form action='register.php' method='post'>

        <div class='col'>
        <label for='name' class='form-label'>Ange namn</label>
        <input required type='text' name='name' class='form-control' placeholder='Namn' >

        </div>
        <div class='col'>
        <label for='email' class='form-label mt-1'>Ange E-post</label>
        <input required type='email' name='email' class='form-control mt-1' placeholder='E-post'>
        </div>
        <div class='col'>
        <label for='tel' class='form-label mt-1'>Ange telefonnummer</label>
        <input required type='text' name='tel' class='form-control mt-1' placeholder='Telefonnummer'>
        </div>
        <div class='col'>
        <label for='address' class='form-label mt-1'>Ange adress</label>
        <input required type='text' name='address' class='form-control mt-1' placeholder='Adress'>
        </div>
        
        <div class= 'row mt-5'>
        <div class ='col-4'></div>
        <div class='col-4 text-center'>
        <input type='submit' class='form-control mt-2 btn-warning' value='Köp'>
         </div>
         <div class ='col-4'></div>
         </div>

        
        </form>
         
         </div>

         <div class = 'col-4 text-center '>
         
         <div><img class='img-fluid' src='images/$value[picture]' alt='$value[product_Name]'></div>
         <div class='mt-3'>$value[product_Price]:-</div>
         <div class = 'mt-3'> <p style = 'font-size:16px'>
         $value[product_Description]
         </p></div>

         </div>

         </div>
         
         
         
         
            
         </div>
         