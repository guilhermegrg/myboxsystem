
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "schedule_create_process.php";
                          

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
 
 <h4>Create Class Schedule</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

echo "Start Date: " . $schedule->startDate;

?>
  

  <form action="schedule_create_view.php" method="post" >
   
   
    <div class="form-inline align-items-center mb-4">
   
    <div class="form-group">
        <label for="value" class="mr-2">Date:</label>
        <input type="date" class="form-control <?php echo isValid("ClassSchedule","startDate")?"":"is-invalid";?>" name="startDate" placeholder="Enter the date" value="<?php echo $schedule->startDate; ?>"  <?php echo ClassSchedule::getHTMLValidationRule("startDate"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassSchedule","startDate"); ?>
        </div>
    </div>
    
        <div class="form-group form-check mr-4 ml-4">
        <input type="checkbox" class="form-check-input" name="timeLimited" <?php  echo $schedule->timeLimited? "checked":"";?>>
        <label for="timeLimited" class="form-check-label" >Time Limited</label>
    </div>
    
    <div class="form-group">
        <label for="value" class="mr-2">Finish Date:</label>
        <input type="date" class="form-control <?php echo isValid("ClassSchedule","finishDate")?"":"is-invalid";?>" name="finishDate" placeholder="Enter the finish date" value="<?php echo $schedule->finishDate; ?>"  <?php echo ClassSchedule::getHTMLValidationRule("finishDate"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassSchedule","finishDate"); ?>
        </div>
    </div>

    
    </div>
    
    
    
<div class="form-inline align-items-center mb-4">     
    <div class="form-group form-check">                
         <label for="price" class="mr-1">Duration (mns)</label>
        <input type="number" id="frequency" name="durationInMinutes" min="1" class="form-control mr-4" value="<?php  echo $schedule->durationInMinutes;?>" >
    </div>
    
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $schedule->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
</div>
     
     
<div class="form-inline align-items-center mb-4">      
<div class="form-group">
        <label for="modality" class="mr-4">Class</label>
        <select class="form-control <?php echo isValid("ClassSchedule","modality_class_id")?"":"is-invalid";?>" name="modality_class_id">
        <?php $mods = ModalityClass::getAllObjects(); 
            
            foreach($mods as $class){
                $selected ="";
                if($class->id == $schedule->modality_class_id)
                    $selected = "selected";
                
                echo "<option $selected value={$class->id} >{$class->modality_name} - {$class->name}</option>";
            };
        ?>
        </select>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassSchedule","modality_class_id"); ?>
        </div>
    </div>     
      </div>     
     
<div class="form-inline align-items-center mb-4">      
<div class="form-group">
        <label for="modality" class="mr-2">Coach:</label>
        <select class="form-control <?php echo isValid("ClassSchedule","coach_id")?"":"is-invalid";?>" name="coach_id">
        <?php $mods = Staff::getAllObjects(); 
            
            foreach($mods as $class){
                $selected ="";
                if($class->id == $schedule->coach_id)
                    $selected = "selected";
                
                echo "<option $selected value={$class->id} >{$class->user_name}</option>";
            };
        ?>
        </select>
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassSchedule","coach_id"); ?>
        </div>
    </div>  
     
<div class="form-group ml-4">
        <label for="price" class="mr-2">Price:</label>
        <input type="text" class="form-control <?php echo isValid("ClassSchedule","session_price")?"":"is-invalid";?>" name="session_price" placeholder="Enter the price" value="<?php echo $schedule->session_price; ?>" <?php echo ClassSchedule::getHTMLValidationRule("session_price"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassSchedule","session_price"); ?>
        </div>
</div>        
           
                 
      </div>  
      
                  
<div class="form-inline align-items-center mb-4">   
   
   
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="reservable" <?php  echo $schedule->reservable? "checked":"";?>>
        <label for="reservable" class="form-check-label" >Reservable</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="visibleToUsers" <?php  echo $schedule->visibleToUsers? "checked":"";?>>
        <label for="visibleToUsers" class="form-check-label" >Visible to Users</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="billable" <?php  echo $schedule->billable? "checked":"";?>>
        <label for="billable" class="form-check-label" >Billable</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="claimableByCoach" <?php  echo $schedule->claimableByCoach? "checked":"";?>>
        <label for="claimableByCoach" class="form-check-label" >Claimable by Coach</label>
    </div>
    
</div>   
    
<div class="form-inline align-items-center mb-4">    
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="limitParticipants" <?php  echo $schedule->limitParticipants? "checked":"";?>>
        <label for="limitParticipants" class="form-check-label" >Limit Participants</label>
    </div>
    
    <div class="form-group form-check">                
         <label for="price" class="mr-1">Max Number:</label>
        <input type="number" id="frequency" name="participantLimit" min="1" class="form-control mr-4" value="<?php  echo $schedule->participantLimit;?>" >
    </div>
        
</div>

<div class="form-inline align-items-center mb-4">  
       
<div class="form-group">
            <label for="period" class="mr-2">Repetition:</label>
            <select class="form-control  mr-4" id="period" name="repetition">
                    <option value="NONE">NONE</option>";
                    <option value="WEEKLY">WEEKLY</option>";
            </select>
    </div>          
       
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="sunday" <?php  echo $schedule->sunday? "checked":"";?>>
        <label for="sunday" class="form-check-label" >Sunday</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="monday" <?php  echo $schedule->monday? "checked":"";?>>
        <label for="monday" class="form-check-label" >Monday</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="tuesday" <?php  echo $schedule->tuesday? "checked":"";?>>
        <label for="tuesday" class="form-check-label" >Tuesday</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="wednesday" <?php  echo $schedule->wednesday? "checked":"";?>>
        <label for="wednesday" class="form-check-label" >Wednesday</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="thursday" <?php  echo $schedule->thursday? "checked":"";?>>
        <label for="thursday" class="form-check-label" >Thursday</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="friday" <?php  echo $schedule->friday? "checked":"";?>>
        <label for="friday" class="form-check-label" >Friday</label>
    </div>
    <div class="form-group form-check mr-4">
        <input type="checkbox" class="form-check-input" name="saturday" <?php  echo $schedule->saturday? "checked":"";?>>
        <label for="saturday" class="form-check-label" >Saturday</label>
    </div>

</div>

    
    <div class="form-group">
        <a href="schedule_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("ClassSchedule"); ?>

    
<?php include "admin-footer.php"; ?>