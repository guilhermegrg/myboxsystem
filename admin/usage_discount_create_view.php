
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "usage_discount_create_process.php";
                          

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
 
 <h4>Create Usage Discount</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="usage_discount_create_view.php" method="post" >
   
    
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("UsageDiscount","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $usageDiscount->name; ?>" <?php echo UsageDiscount::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("UsageDiscount","name"); ?>
        </div>
</div>
<div class="form-group">
        <label for="value">Value:</label>
        <input type="text" class="form-control <?php echo isValid("UsageDiscount","value")?"":"is-invalid";?>" name="value" placeholder="Enter the value" value="<?php echo $usageDiscount->value; ?>" <?php echo UsageDiscount::getHTMLValidationRule("value"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("UsageDiscount","value"); ?>
        </div>
</div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $usageDiscount->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>



    
    <div class="form-group">
        <a href="usage_discount_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("UsageDiscount"); ?>

    
<?php include "admin-footer.php"; ?>