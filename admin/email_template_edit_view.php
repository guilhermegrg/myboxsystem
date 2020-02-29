
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "email_template_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Email Template</h4>

  <?php displayMessages(); ?>

    

  <form action="email_template_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $email->id; ?>" readonly>
    </div>
   
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("EMAIL_TEMPLATE","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $email->name; ?>" <?php echo EmailMessageTemplate::getHTMLValidationRule("name"); ?> >
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("EMAIL_TEMPLATE","name"); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="value">Title:</label>
        <input type="text" class="form-control <?php echo isValid("EMAIL_TEMPLATE","title")?"":"is-invalid";?>" name="title" placeholder="Enter the title"  value="<?php echo $email->title; ?>" <?php echo EmailMessageTemplate::getHTMLValidationRule("title"); ?>>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("EMAIL_TEMPLATE","title"); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="value">Content:</label>
        <input type="text" class="form-control <?php echo isValid("EMAIL_TEMPLATE","content")?"":"is-invalid";?>" name="content" placeholder="Enter the content"  value="<?php echo $email->content; ?>" <?php echo EmailMessageTemplate::getHTMLValidationRule("content"); ?>>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("EMAIL_TEMPLATE","content"); ?>
        </div>
    </div>
    
    <div class="form-group">
       <a href="email_template_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("EMAIL_TEMPLATE"); ?>
   

   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>