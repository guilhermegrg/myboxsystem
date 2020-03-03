
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "staff_create_process.php";
                          

//var_dump($discount);

//var_dump($_SESSION);
//echo "active: " . $active;

//echo "Errors: " . getFormValidationField("DISCOUNT","name"); 

//$vals = Discount::getValidations();
//var_dump($vals);
//
//$rule = Discount::getHTMLValidationRule("name");
//var_dump($rule);
?>
 
 <h4>Create Staff</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="staff_create_view.php" method="post" >
   

       <div class="form-group">
        <label for="modality">User:</label>
        <select class="form-control" id="user" name="user_id">
        <?php $users = User::getAllObjects(); 
            
            foreach($users as $user){
                $selected ="";
                if($user->id == $staffMember->user_id)
                    $selected = "selected";
                
                echo "<option $selected value={$user->id} >{$user->name}</option>";
            };
        ?>
        </select>
<!--        <input type="text" class="form-control <?php echo isValid("Staff","user_id")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $class->name; ?>" <?php echo Staff::getHTMLValidationRule("user_id"); ?> >-->
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Staff","modality"); ?>
        </div>
    </div>    
        
                
<div class="form-group">
        <label for="session_price">Session Price:</label>
        <input type="text" class="form-control <?php echo isValid("Staff","session_price")?"":"is-invalid";?>" name="session_price" placeholder="Enter the session_price" value="<?php echo $staffMember->session_price; ?>" <?php echo Staff::getHTMLValidationRule("session_price"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Staff","session_price"); ?>
        </div>
</div>



    
    <div class="form-group">
        <a href="staff_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("Staff"); ?>

    
<?php include "admin-footer.php"; ?>