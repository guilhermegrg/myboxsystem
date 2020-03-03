
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "membership_create_process.php";
                          

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
 
 <h4>Create Membership</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="membership_create_view.php" method="post" >
   
    
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
               
              echo "<tr class='get-html-form' data-child-id='$relation->staff_id' data-list-table='creator-list' ></tr>";
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
               
              echo "<tr class='get-html-form' data-child-id='$relation->staff_id' data-list-table='manager-list' ></tr>";
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
               <th>Periodic Service</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children_enroll as $relation){
               
              echo "<tr class='get-html-form' data-child-id='$relation->service_id' data-list-table='enroll-list' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>


    
    <div class="form-group">
        <a href="membership_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
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
        var services_choices = <?php echo json_encode($staffMembers); ?>;
        
        var choices = (choice_flag == "staff"? staff_choices:services_choices);
        
        var classHTML = "<select class='form-control  mr-sm-2' name='"+child_array+"[]'>";
        for (let elem in choices) {
            var choice = choices[elem];
//            console.log(class_choices[elem].id + " - "  +  modality_class_id);
            classHTML+="<option value='"+choice.id+"' " + (choice.id == child_id?"selected":"")+ ">"+ choice.user_name + "</option>";
        }
        classHTML+="</select>";

        var final = "<tr><td>"+classHTML+"</td><td><input type='button' class='btn btn-primary deleteListItem' value='Delete'></td></tr>";
        
        return final;
        
//        $("#ruleList > tbody:last-child").append();
}    

var funct = function(choice_flag="staff"){
        
//        var rowCount = $('#list >tbody >tr').length;
        alert(choice_flag);
    
        var choice_flag = $(this).attr("data-choice-flag");
    
        var child_selector = $(this).attr("data-child-selector");
        var child_list_table = $(this).attr("data-list-table");
        
        var child_id = $("#"+child_selector).val();
        var child_array = $(this).attr("data-child-array");
//        alert(discount_id);
        
        var html = getHTMLForm(child_id,child_array,choice_flag);

//        alert(html);
        
        $("#"+child_list_table+" > tbody:last-child").append(html);
        
    };    
    
$(document).ready(function(){
    
    $("#addTableItem").click(funct);
    $("#addTableItem2").click(funct);
    $("#addEnroll").click(funct);
    
    $( ".get-html-form" ).each(function( index ) {
//  console.log( index + ": " + $( this ).text() );
        var child_id = $(this).attr("data-child-id");
        var child_array = $(this).attr("data-child-array");
        var child_list_table = $(this).attr("data-list-table");
        
        $(this).remove();
        
        var html = getHTMLForm(child_id,child_array);
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