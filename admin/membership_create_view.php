
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "membership_create_process.php";
                          

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
 
 <h4>Create Membership</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="membership_create_view.php" method="post" >
   
    
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("Membership","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $membership->name; ?>" <?php echo Membership::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Membership","name"); ?>
        </div>
</div>
<div class="form-group">
        <label for="urlName">RegisterURL:</label>
        <input type="text" class="form-control <?php echo isValid("Membership","urlName")?"":"is-invalid";?>" name="urlName" placeholder="Enter the urlName" value="<?php echo $membership->urlName; ?>" <?php echo Membership::getHTMLValidationRule("urlName"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Membership","urlName"); ?>
        </div>
</div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $membership->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>



    
    <div class="form-group">
        <a href="membership_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("Membership"); ?>

    
<?php include "admin-footer.php"; ?>