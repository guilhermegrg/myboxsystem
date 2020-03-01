
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "class_access_template_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Class Access Template</h4>

  <?php displayMessages(); ?>

    

  <form action="class_access_template_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $classAccessTemplate->id; ?>" readonly>
    </div>
   
   
     
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("ClassAccessTemplate","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $classAccessTemplate->name; ?>" <?php echo ClassAccessTemplate::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassAccessTemplate","name"); ?>
        </div>
</div>



    
    <div class="form-group">
       <a href="class_access_template_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("ClassAccessTemplate"); ?>
   

    
    
<?php include "admin-footer.php"; ?>