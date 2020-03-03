<?php include_once("Discount.php"); ?>
<?php include_once("User.php"); ?>
<?php include_once("PaymentMethod.php"); ?>
<?php include_once("Modality.php"); ?>
<?php include_once("ModalityClass.php"); ?>
<?php include_once("EmailMessageTemplate.php"); ?>
<?php include_once("SMSTemplate.php"); ?>
<?php include_once("ClassAccessTemplate.php"); ?>
<?php include_once("PeriodicService.php"); ?>
<?php include_once("CoachProfile.php"); ?>
<?php include_once("Membership.php"); ?>
<?php include_once("ClassAccessRule.php"); ?>
<?php include_once("PeriodicServiceHasDiscount.php"); ?>
<?php include_once("CoachProfileHasClass.php"); ?>
<?php include_once("Staff.php"); ?>
<?php include_once("StaffHasCoachProfile.php"); ?>




<?php


if(isset($_POST['generate'])){
      echo "<br>Generated table!<br><br>";
}



//Discount::create();
//User::create();
//PaymentMethod::create();
//Modality::create();
//ModalityClass::create();
//EmailMessageTemplate::create();
//SMSTemplate::create();
//ClassAccessTemplate::create();
//PeriodicService::create();
//CoachProfile::create();
//Membership::create();
//ClassAccessRule::create();
//PeriodicServiceHasDiscount::create();
//CoachProfileHasClass::create();
//Staff::create();
//StaffHasCoachProfile::create();

?>


<form action="" method="post" >
   
   
   <div class="form-group">
        <label for="name">Generate Database Tables:</label>
    </div>
   
   
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="generate" value="Generate">
    </div>

    
</form> 