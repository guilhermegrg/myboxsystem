
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "modality_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Modality</h4>

  <?php displayMessages(); ?>

    

  <form action="modality_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $modality->id; ?>" readonly>
    </div>
   
   
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("MODALITY","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $modality->name; ?>" <?php echo Modality::getHTMLValidationRule("name"); ?> >
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("MODALITY","name"); ?>
        </div>
    </div>

    
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php echo $modality->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    
    <div class="form-group">
       <a href="modality_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("MODALITY"); ?>
   

   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>