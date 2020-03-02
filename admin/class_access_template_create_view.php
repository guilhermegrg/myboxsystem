
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

<!--    <form action="" method="post">-->
    <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="modality_class" class="mr-1">Class:</label>
            <select class="form-control  mr-sm-2" id="modality_class" name="modality_class">
            <?php $mods = ModalityClass::getAllObjects(); 

                foreach($mods as $class){
                    echo "<option value={$class->id} >{$class->modality_name} - {$class->name}</option>";
                };
            ?>
            </select>

            <input type="checkbox" class="form-check-input ml-4" name="limited" id="limited" checked>
            <label for="limited" class="form-check-label mr-4" >Limited</label>

            <label for="price" class="mr-1">Frequency:</label>
            <input type="number" id="frequency" name="frequency" min="1" class="form-control col-1 mr-4" value="3" >


            <label for="period" class="mr-1">Period:</label>
            <select class="form-control  mr-4" id="period" name="period">
                    <option value="WEEKLY">WEEKLY</option>";
                    <option value="MONTHLY">MONTHLY</option>";
            </select>
    

            <input type="button" class="btn btn-primary" name="addRule" id="addRule" value="Add Rule">
    
    </div>
<!--    </form>-->
    <div id="ruleList">
        
    </div>
    
    
    <div class="form-group">
        <a href="class_access_template_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("ClassAccessTemplate"); ?>

    
<?php include "admin-footer.php"; ?>