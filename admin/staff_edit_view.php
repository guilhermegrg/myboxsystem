
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "staff_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Staff</h4>

  <?php displayMessages(); ?>

    

  <form action="staff_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $staffMember->id; ?>" readonly>
    </div>
   
         <div class="form-group">
        <label for="modality">User:</label>
        <select class="form-control" id="user" name="user_id">
        <?php $users = User::getAllObjects(); 
            
            foreach($users as $user){
                $selected ="";
                if($user->id == $staffMember->user_id)
                    $selected = "selected";
                
                echo "<option $selected value={$user->id} >{$user->name}</option>";
            };
        ?>
        </select>
<!--        <input type="text" class="form-control <?php echo isValid("Staff","user_id")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $class->name; ?>" <?php echo Staff::getHTMLValidationRule("user_id"); ?> >-->
<!--        pattern="[A-Za-z]{4,}"  title="More than 3 letters. No spaces!" required-->
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Staff","modality"); ?>
        </div>
    </div>
     
<div class="form-group">
        <label for="session_price">Session Price:</label>
        <input type="text" class="form-control <?php echo isValid("Staff","session_price")?"":"is-invalid";?>" name="session_price" placeholder="Enter the session_price" value="<?php echo $staffMember->session_price; ?>" <?php echo Staff::getHTMLValidationRule("session_price"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Staff","session_price"); ?>
        </div>
</div>



    
    <div class="form-group">
       <a href="staff_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("Staff"); ?>
   

    
    
<?php include "admin-footer.php"; ?>