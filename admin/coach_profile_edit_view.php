
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "coach_profile_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Coach Profile</h4>

  <?php displayMessages(); ?>

    

  <form action="coach_profile_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $coachProfile->id; ?>" readonly>
    </div>
   
   
     
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("CoachProfile","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $coachProfile->name; ?>" <?php echo CoachProfile::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("CoachProfile","name"); ?>
        </div>
</div>



    
    <div class="form-group">
       <a href="coach_profile_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("CoachProfile"); ?>
   

    
    
<?php include "admin-footer.php"; ?>