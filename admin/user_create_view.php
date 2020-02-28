
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "user_create_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

    <h4>Create User</h4>

  <?php displayMessages(); ?>
  
  

  <form action="user_create_view.php" method="post" >
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("USER","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $user->name; ?>" <?php echo User::getHTMLValidationRule("name"); ?>>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","name"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">Email:</label>
        <input type="email" class="form-control <?php echo isValid("USER","email")?"":"is-invalid";?>" name="email" placeholder="Enter the email"  value="<?php echo $user->email; ?>"  <?php echo User::getHTMLValidationRule("email"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","email"); ?>
        </div>
    </div>
    
    
    <div class="form-group">
        <label for="value">Mobile:</label>
        <input type="text" class="form-control <?php echo isValid("USER","mobile")?"":"is-invalid";?>" name="mobile" placeholder="Enter the mobile"  value="<?php echo $user->mobile; ?>"  <?php echo User::getHTMLValidationRule("mobile"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","mobile"); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="value">Birthday:</label>
        <input type="date" class="form-control <?php echo isValid("USER","birthday")?"":"is-invalid";?>" name="birthday" placeholder="Enter the birthdate" value="<?php echo $user->birthday; ?>"  <?php echo User::getHTMLValidationRule("birthday"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("USER","birthday"); ?>
        </div>
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $user->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active</label>
    </div>
    
    <div class="form-group">
       <a href="user_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("USER"); ?>
   

   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>