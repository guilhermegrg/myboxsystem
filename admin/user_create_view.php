
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "user_create_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

  <?php displayMessages(); ?>

  <form action="user_create_view.php" method="post" >
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("USER","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $name; ?>" pattern="([\p{L}]{2,})([ ]+([\p{L}]{2,}))+"  title="More than 3 letters. No spaces!" required>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","name"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">Email:</label>
        <input type="email" class="form-control <?php echo isValid("USER","email")?"":"is-invalid";?>" name="email" placeholder="Enter the email"  value="<?php echo $email; ?>" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|'(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*')@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" title="A valid email account" required>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","email"); ?>
        </div>
    </div>
    
    
    <div class="form-group">
        <label for="value">Mobile:</label>
        <input type="text" class="form-control <?php echo isValid("USER","mobile")?"":"is-invalid";?>" name="mobile" placeholder="Enter the mobile"  value="<?php echo $mobile; ?>" pattern="[0-9]{9,}" title="a valid mobile phone number" required>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","mobile"); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="value">Birthday:</label>
        <input type="date" class="form-control <?php echo isValid("USER","birthday")?"":"is-invalid";?>" name="birthday" placeholder="Enter the birthdate" value="<?php echo $birthday; ?>" required>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","birthday"); ?>
        </div>
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $active == "on"? "checked":"";?>>
        <label for="active" class="form-check-label" >Active</label>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("USER"); ?>
   

   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>