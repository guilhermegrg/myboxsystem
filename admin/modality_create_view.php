
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "modality_create_process.php";
                          

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
 
 <h4>Create Modality</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>


  <form action="modality_create_view.php" method="post" >
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("MODALITY","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $modality->name; ?>" <?php echo Modality::getHTMLValidationRule("name"); ?> >
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("MODALITY","name"); ?>
        </div>
    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $modality->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    
    <div class="form-group">
        <a href="modality_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("MODALITY"); ?>

    
<?php include "admin-footer.php"; ?>