
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "discount_create_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

  <form action="discount_create_view.php" method="post" >
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("DISCOUNT","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $name; ?>" pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("DISCOUNT","name"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">Value:</label>
        <input type="text" class="form-control <?php echo isValid("DISCOUNT","value")?"":"is-invalid";?>" name="value" placeholder="Enter the value or percentage"  value="<?php echo $value; ?>" pattern="[0-9.%]{1,}" title="A number or a percentage" required>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("DISCOUNT","value"); ?>
        </div>
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $active == "on"? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="createDiscount" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("DISCOUNT"); ?>
   

   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>