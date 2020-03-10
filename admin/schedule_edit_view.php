
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "schedule_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Class Schedule</h4>

  <?php displayMessages(); ?>

    

  <form action="schedule_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $schedule->id; ?>" readonly>
    </div>
   
   
     
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $schedule->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="timeLimited" <?php  echo $schedule->timeLimited? "checked":"";?>>
        <label for="timeLimited" class="form-check-label" >Time Limited:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="reservable" <?php  echo $schedule->reservable? "checked":"";?>>
        <label for="reservable" class="form-check-label" >Reservable:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="visibleToUsers" <?php  echo $schedule->visibleToUsers? "checked":"";?>>
        <label for="visibleToUsers" class="form-check-label" >Visible to Users:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="billable" <?php  echo $schedule->billable? "checked":"";?>>
        <label for="billable" class="form-check-label" >Billable:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="claimableByCoach" <?php  echo $schedule->claimableByCoach? "checked":"";?>>
        <label for="claimableByCoach" class="form-check-label" >Claimable by Coach:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="limitParticipants" <?php  echo $schedule->limitParticipants? "checked":"";?>>
        <label for="limitParticipants" class="form-check-label" >Limit Participants:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="sunday" <?php  echo $schedule->sunday? "checked":"";?>>
        <label for="sunday" class="form-check-label" >sunday:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="monday" <?php  echo $schedule->monday? "checked":"";?>>
        <label for="monday" class="form-check-label" >Monday:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="tuesday" <?php  echo $schedule->tuesday? "checked":"";?>>
        <label for="tuesday" class="form-check-label" >Tuesday:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="wednesday" <?php  echo $schedule->wednesday? "checked":"";?>>
        <label for="wednesday" class="form-check-label" >Wednesday:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="thursday" <?php  echo $schedule->thursday? "checked":"";?>>
        <label for="thursday" class="form-check-label" >Thursday:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="friday" <?php  echo $schedule->friday? "checked":"";?>>
        <label for="friday" class="form-check-label" >Friday:</label>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="saturday" <?php  echo $schedule->saturday? "checked":"";?>>
        <label for="saturday" class="form-check-label" >Saturday:</label>
    </div>



    
    <div class="form-group">
       <a href="schedule_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("ClassSchedule"); ?>
   

    
    
<?php include "admin-footer.php"; ?>