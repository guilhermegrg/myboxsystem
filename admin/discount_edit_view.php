
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "discount_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

  <?php displayMessages(); ?>

    <h4>Edit Discount</h4>

  <form action="discount_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $discount->id; ?>" readonly>
    </div>
   
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("DISCOUNT","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $discount->name; ?>" >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("DISCOUNT","name"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">Value:</label>
        <input type="text" class="form-control <?php echo isValid("DISCOUNT","value")?"":"is-invalid";?>" name="value" placeholder="Enter the value or percentage"  value="<?php echo $discount->value; ?>" >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("DISCOUNT","value"); ?>
        </div>
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php echo $discount->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    
    <div class="form-group">
       <a href="discount_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="editDiscount" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("DISCOUNT"); ?>
   

   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>