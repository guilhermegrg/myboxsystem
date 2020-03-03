
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "membership_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Membership</h4>

  <?php displayMessages(); ?>

    

  <form action="membership_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $membership->id; ?>" readonly>
    </div>
   
   
     
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("Membership","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $membership->name; ?>" <?php echo Membership::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Membership","name"); ?>
        </div>
</div>
<div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control <?php echo isValid("Membership","description")?"":"is-invalid";?>" name="description" placeholder="Enter the description" value="<?php echo $membership->description; ?>" <?php echo Membership::getHTMLValidationRule("description"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Membership","description"); ?>
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
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("Membership"); ?>
   

    
    
<?php include "admin-footer.php"; ?>