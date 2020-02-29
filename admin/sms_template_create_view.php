
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "sms_template_create_process.php";
                          

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
 
 <h4>Create SMS Template</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>


  <form action="sms_template_create_view.php" method="post" >
   
    

<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("SMS_TEMPLATE","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $sms->name; ?>" <?php echo SMSTemplate::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("SMS_TEMPLATE","name"); ?>
        </div>
</div>


<div class="form-group">
        <label for="content">Content:</label>
        <input type="text" class="form-control <?php echo isValid("SMS_TEMPLATE","content")?"":"is-invalid";?>" name="content" placeholder="Enter the content" value="<?php echo $sms->content; ?>" <?php echo SMSTemplate::getHTMLValidationRule("content"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("SMS_TEMPLATE","content"); ?>
        </div>
</div>









    
    <div class="form-group">
        <a href="sms_template_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("SMS_TEMPLATE"); ?>

    
<?php include "admin-footer.php"; ?>