
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "discount_create_process.php";
                          

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
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>

<h4>Create Discount</h4>
 
  <form action="discount_create_view.php" method="post" >
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("DISCOUNT","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $discount->name; ?>" <?php echo Discount::getHTMLValidationRule("name"); ?> >
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("DISCOUNT","name"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">Value:</label>
        <input type="text" class="form-control <?php echo isValid("DISCOUNT","value")?"":"is-invalid";?>" name="value" placeholder="Enter the value or percentage"  value="<?php echo $discount->value; ?>" <?php echo Discount::getHTMLValidationRule("value"); ?>>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("DISCOUNT","value"); ?>
        </div>
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $discount->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    
    <div class="form-group">
        <a href="discount_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="createDiscount" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("DISCOUNT"); ?>

    
<?php include "admin-footer.php"; ?>