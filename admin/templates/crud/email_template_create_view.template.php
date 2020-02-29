
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "{{ filePrefix }}_create_process.php";
                          

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
 
 <h4>Create {{ nameForMessages }}</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>


  <form action="{{ filePrefix }}_create_view.php" method="post" >
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("{{ validationTAG }}","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo ${{ singleObjectVariableName }}->name; ?>" <?php echo {{ className }}::getHTMLValidationRule("name"); ?> >
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("{{ validationTAG }}","name"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">Title:</label>
        <input type="text" class="form-control <?php echo isValid("{{ validationTAG }}","title")?"":"is-invalid";?>" name="title" placeholder="Enter the title"  value="<?php echo ${{ singleObjectVariableName }}->title; ?>" <?php echo {{ className }}::getHTMLValidationRule("title"); ?>>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("{{ validationTAG }}","title"); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="value">Content:</label>
        <input type="text" class="form-control <?php echo isValid("{{ validationTAG }}","content")?"":"is-invalid";?>" name="content" placeholder="Enter the content"  value="<?php echo ${{ singleObjectVariableName }}->content; ?>" <?php echo {{ className }}::getHTMLValidationRule("content"); ?>>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("{{ validationTAG }}","content"); ?>
        </div>
    </div>
<!--
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo ${{ singleObjectVariableName }}->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
-->
    
    <div class="form-group">
        <a href="{{ filePrefix }}_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("{{ validationTAG }}"); ?>

    
<?php include "admin-footer.php"; ?>