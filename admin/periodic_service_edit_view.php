
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "periodic_service_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Periodic Service</h4>

  <?php displayMessages(); ?>

    

  <form action="periodic_service_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $periodicService->id; ?>" readonly>
    </div>
   
   
     
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("PeriodicService","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $periodicService->name; ?>" <?php echo PeriodicService::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","name"); ?>
        </div>
</div>
<div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control <?php echo isValid("PeriodicService","description")?"":"is-invalid";?>" name="description" placeholder="Enter the description" value="<?php echo $periodicService->description; ?>" <?php echo PeriodicService::getHTMLValidationRule("description"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","description"); ?>
        </div>
</div>
<div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control <?php echo isValid("PeriodicService","price")?"":"is-invalid";?>" name="price" placeholder="Enter the price" value="<?php echo $periodicService->price; ?>" <?php echo PeriodicService::getHTMLValidationRule("price"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","price"); ?>
        </div>
</div>
<div class="form-group">
        <label for="class_access_template_name">Class Access Template:</label>
        <input type="text" class="form-control <?php echo isValid("PeriodicService","class_access_template_name")?"":"is-invalid";?>" name="class_access_template_name" placeholder="Enter the class_access_template_name" value="<?php echo $periodicService->class_access_template_name; ?>" <?php echo PeriodicService::getHTMLValidationRule("class_access_template_name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","class_access_template_name"); ?>
        </div>
</div>



    
    <div class="form-group">
       <a href="periodic_service_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("PeriodicService"); ?>
   

    
    
<?php include "admin-footer.php"; ?>