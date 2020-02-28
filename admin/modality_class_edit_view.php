
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "modality_class_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Class</h4>

  <?php displayMessages(); ?>

    

  <form action="modality_class_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $class->id; ?>" readonly>
    </div>
   
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("MODALITY_CLASS","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $class->name; ?>" <?php echo ModalityClass::getHTMLValidationRule("name"); ?> >
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("MODALITY_CLASS","name"); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="modality">Modality:</label>
        <select class="form-control" id="modality" name="modality_id">
        <?php $mods = Modality::getPageObjects(1); 
            
            foreach($mods as $modality){
                $selected ="";
                if($modality->id == $class->modality_id)
                    $selected = "selected";
                
                echo "<option $selected value={$modality->id} >{$modality->name}</option>";
            };
        ?>
        </select>
<!--        <input type="text" class="form-control <?php echo isValid("MODALITY_CLASS","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $class->name; ?>" <?php echo ModalityClass::getHTMLValidationRule("name"); ?> >-->
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("MODALITY_CLASS","modality"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">URL Name:</label>
        <input type="text" class="form-control <?php echo isValid("MODALITY_CLASS","urlName")?"":"is-invalid";?>" name="urlName" placeholder="Enter a one word name to use in the URL for this schedule"  value="<?php echo $class->urlName; ?>" <?php echo ModalityClass::getHTMLValidationRule("urlName"); ?>>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("MODALITY_CLASS","urlName"); ?>
        </div>
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $class->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    
        <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="independentSchedule" <?php  echo $class->independentSchedule? "checked":"";?>>
        <label for="active" class="form-check-label" >Independent Schedule:</label>
    </div>
    
        <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="visibleToUsers" <?php  echo $class->visibleToUsers? "checked":"";?>>
        <label for="active" class="form-check-label" >Visible To Users:</label>
    </div>
    
        <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="publicSchedule" <?php  echo $class->publicSchedule? "checked":"";?>>
        <label for="active" class="form-check-label" >Public Schedule:</label>
    </div>
    
    <div class="form-group">
       <a href="modality_class_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("MODALITY_CLASS"); ?>
   

   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>