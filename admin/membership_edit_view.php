
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "membership_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Membership</h4>

  <?php displayMessages(); ?>

    

  <form action="membership_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $membership->id; ?>" readonly>
    </div>
   
   
     
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("Membership","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $membership->name; ?>" <?php echo Membership::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Membership","name"); ?>
        </div>
</div>
<div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control <?php echo isValid("Membership","description")?"":"is-invalid";?>" name="description" placeholder="Enter the description" value="<?php echo $membership->description; ?>" <?php echo Membership::getHTMLValidationRule("description"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Membership","description"); ?>
        </div>
</div>
<div class="form-group">
        <label for="urlName">RegisterURL:</label>
        <input type="text" class="form-control <?php echo isValid("Membership","urlName")?"":"is-invalid";?>" name="urlName" placeholder="Enter the urlName" value="<?php echo $membership->urlName; ?>" <?php echo Membership::getHTMLValidationRule("urlName"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Membership","urlName"); ?>
        </div>
</div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" <?php  echo $membership->active? "checked":"";?>>
        <label for="active" class="form-check-label" >Active:</label>
    </div>

  
   <!--registration  creators-->
           
   <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Registration Creators:</label>
            <select class="form-control  mr-sm-2" id="add_creator_id_option">
            <?php  
                $staffMembers = Staff::getAllObjects(); 
                
                foreach($staffMembers as $staff){
                    echo "<option value={$staff->id} >{$staff->user_name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addTableItem2" data-child-array="creator_id_array" data-child-selector="add_creator_id_option" data-list-table="creator-list" value="Add Registration Creator">
    
    </div>
<!--    </form>-->
  <table class="table" id="creator-list">
       <thead>
           <tr>
               <th>Coach Profile</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children_creators as $relation){
               
              echo "<tr class='get-html-form' data-child-id='$relation->staff_id' data-list-table='creator-list'  data-child-array='creator_id_array'  data-choice-flag='staff' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table> 
   
   
<!--   registration managers-->
   
    <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Registration Managers:</label>
            <select class="form-control  mr-sm-2" id="add_manager_id_option">
            <?php  
                $staffMembers = Staff::getAllObjects(); 
                
                foreach($staffMembers as $staff){
                    echo "<option value={$staff->id} >{$staff->user_name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addTableItem" data-child-array="manager_id_array" data-child-selector="add_manager_id_option" data-list-table="manager-list" value="Add Registration Manager">
    
    </div>
<!--    </form>-->
  <table class="table" id="manager-list">
       <thead>
           <tr>
               <th>Coach Profile</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children_managers as $relation){
               
              echo "<tr class='get-html-form' data-child-id='$relation->staff_id' data-list-table='manager-list' data-child-array='manager_id_array'  data-choice-flag='staff' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>

    
 <!--   enrollment services-->
   
    <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Enrollment Services:</label>
            <select class="form-control  mr-sm-2" id="add_enroll_id_option">
            <?php  
                $services = PeriodicService::getAllObjects(); 
                
                foreach($services as $service){
                    echo "<option value={$service->id} >{$service->name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addEnroll" data-choice-flag="services" data-child-array="enroll_id_array" data-child-selector="add_enroll_id_option" data-list-table="enroll-list" value="Add Enrollment Service">
    
    </div>
<!--    </form>-->
  <table class="table" id="enroll-list">
       <thead>
           <tr>
               <th>Enrollment Service</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children_enroll as $relation){
               
              echo "<tr class='get-html-form' data-child-id='$relation->service_id' data-list-table='enroll-list' data-child-array='enroll_id_array'  data-choice-flag='services' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>


    <!--   mandatory services-->
   
    <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Mandatory Services:</label>
            <select class="form-control  mr-sm-2" id="add_mandatory_id_option">
            <?php  
                $services = PeriodicService::getAllObjects(); 
                
                foreach($services as $service){
                    echo "<option value={$service->id} >{$service->name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addMandatory" data-choice-flag="services" data-child-array="mandatory_id_array" data-child-selector="add_mandatory_id_option" data-list-table="mandatory-list" value="Add Mandatory Service">
    
    </div>
<!--    </form>-->
  <table class="table" id="mandatory-list">
       <thead>
           <tr>
               <th>Mandatory Service</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children_mandatory as $relation){
               
              echo "<tr class='get-html-form' data-child-id='$relation->service_id' data-list-table='mandatory-list' data-child-array='mandatory_id_array'    data-choice-flag='services'  ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>
   
      <!--   optional services-->
   
    <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Optional Services:</label>
            <select class="form-control  mr-sm-2" id="add_optional_id_option">
            <?php  
                $services = PeriodicService::getAllObjects(); 
                
                foreach($services as $service){
                    echo "<option value={$service->id} >{$service->name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addOptional" data-choice-flag="services" data-child-array="optional_id_array" data-child-selector="add_optional_id_option" data-list-table="optional-list" value="Add Optional Service">
    
    </div>
<!--    </form>-->
  <table class="table" id="optional-list">
       <thead>
           <tr>
               <th>Optional Service</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children_optional as $relation){
               
              echo "<tr class='get-html-form' data-child-id='$relation->service_id' data-list-table='optional-list' data-child-array='optional_id_array'   data-choice-flag='services' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table> 
   
   
 

    
    <div class="form-group">
       <a href="membership_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("Membership"); ?>
   

    
    
   

    
    
          </div>
      </div>
      
  </div>
   
   
   <script src="../vendors/jquery-3.4.1.min.js"></script>
   <script src="../vendors/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
<script>

function getHTMLForm(child_id, child_array, choice_flag="staff"){
        
//        var rowCount = $('#ruleList >tbody >tr').length;
        var staff_choices = <?php echo json_encode($staffMembers); ?>;
        var services_choices = <?php echo json_encode($services); ?>;
        
        var choices = (choice_flag == "staff"? staff_choices:services_choices);
    
//        alert(child_array);
        
        var classHTML = "<select class='form-control  mr-sm-2' name='"+child_array+"[]'>";
        for (let elem in choices) {
            var choice = choices[elem];
            
//            console.log(class_choices[elem].id + " - "  +  modality_class_id);
            classHTML+="<option value='"+choice.id+"' " + (choice.id == child_id?"selected":"")+ ">"+ (choice_flag == "staff"? choice.user_name:choice.name) + "</option>";
        }
        classHTML+="</select>";

        var final = "<tr><td>"+classHTML+"</td><td><input type='button' class='btn btn-primary deleteListItem' value='Delete'></td></tr>";
        
        return final;
        
//        $("#ruleList > tbody:last-child").append();
}    

var funct = function(){
        
//        var rowCount = $('#list >tbody >tr').length;
//        alert(choice_flag);
    
        var choice_flag = $(this).attr("data-choice-flag");
    
        var child_selector = $(this).attr("data-child-selector");
        var child_list_table = $(this).attr("data-list-table");
        
        var child_id = $("#"+child_selector).val();
        var child_array = $(this).attr("data-child-array");
//        alert(discount_id);
    
//        alert(choice_flag);
        var html = getHTMLForm(child_id,child_array,choice_flag);

    
//        alert(html);
        
        $("#"+child_list_table+" > tbody:last-child").append(html);
        
    };    
    
$(document).ready(function(){
    
    $("#addTableItem").click(funct);
    $("#addTableItem2").click(funct);
    $("#addEnroll").click(funct);
    $("#addMandatory").click(funct);
    $("#addOptional").click(funct);
    
    $( ".get-html-form" ).each(function( index ) {
//  console.log( index + ": " + $( this ).text() );
        var child_id = $(this).attr("data-child-id");
        var child_array = $(this).attr("data-child-array");
        var child_list_table = $(this).attr("data-list-table");
        var choice_flag = $(this).attr("data-choice-flag");
        
        $(this).remove();
        
        var html = getHTMLForm(child_id,child_array,choice_flag);
        $("#"+child_list_table+ " > tbody:last-child").append(html);
        
    });
    
   
    
});


$(document).on('click','.deleteListItem',function(event){
//    var id = event.target.id;
    var row = $(this).closest("tr");
//    alert("Deleting rule!!! " + row);
    row.remove();
});



    
    
    

</script>
</body>
</html>