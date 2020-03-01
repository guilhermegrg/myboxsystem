
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
   
    {{ include('htmlFormTemplate.php') }}
    
    <div class="form-group">
        <a href="{{ filePrefix }}_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("{{ validationTAG }}"); ?>

    
<?php include "admin-footer.php"; ?>