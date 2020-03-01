
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "class_access_template_create_process.php";
                          

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
 
 <h4>Create Class Access Template</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="class_access_template_create_view.php" method="post" >
   
    
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("ClassAccessTemplate","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $classAccessTemplate->name; ?>" <?php echo ClassAccessTemplate::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassAccessTemplate","name"); ?>
        </div>
</div>



    
    <div class="form-group">
        <a href="class_access_template_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("ClassAccessTemplate"); ?>

    
<?php include "admin-footer.php"; ?>