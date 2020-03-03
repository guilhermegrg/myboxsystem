
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
        <select class="form-control <?php echo isValid("Staff","user_id")?"":"is-invalid";?>" id="user" name="user_id">
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
          <?php echo getFormValidationField("Staff","user_id"); ?>
        </div>
    </div>
     
<div class="form-group">
        <label for="session_price">Session Price:</label>
        <input type="text" class="form-control <?php echo isValid("Staff","session_price")?"":"is-invalid";?>" name="session_price" placeholder="Enter the session_price" value="<?php echo $staffMember->session_price; ?>" <?php echo Staff::getHTMLValidationRule("session_price"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("Staff","session_price"); ?>
        </div>
</div>

   <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Coach Profile:</label>
            <select class="form-control  mr-sm-2" id="add_child_id_option">
            <?php  
                $profiles = CoachProfile::getAllObjects(); 
                
                foreach($profiles as $profile){
                    echo "<option value={$profile->id} >{$profile->name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addTableItem" value="Add Coach Profile">
    
    </div>
<!--    </form>-->
  <table class="table" id="list">
       <thead>
           <tr>
               <th>Coach Profile</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children as $relation){
               
              echo "<tr class='get-html-form' data-child-id='$relation->coach_profile_id' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>

    
    <div class="form-group">
       <a href="staff_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("Staff"); ?>

    
    
          </div>
      </div>
      
  </div>
   
   
   <script src="../vendors/jquery-3.4.1.min.js"></script>
   <script src="../vendors/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
<script>

function getHTMLForm(child_id){
        
//        var rowCount = $('#ruleList >tbody >tr').length;
        var choices = <?php echo json_encode($profiles); ?>;
        
        var classHTML = "<select class='form-control  mr-sm-2' name='coach_profile_id_array[]'>";
        for (let elem in choices) {
            var choice = choices[elem];
//            console.log(class_choices[elem].id + " - "  +  modality_class_id);
            classHTML+="<option value='"+choice.id+"' " + (choice.id == child_id?"selected":"")+ ">"+ choice.name + "</option>";
        }
        classHTML+="</select>";

        var final = "<tr><td>"+classHTML+"</td><td><input type='button' class='btn btn-primary deleteListItem' value='Delete'></td></tr>";
        
        return final;
        
//        $("#ruleList > tbody:last-child").append();
}    
   
    
$(document).ready(function(){
    
    $("#addTableItem").click(function(){
        
        var rowCount = $('#list >tbody >tr').length;
        
        var child_id = $("#add_child_id_option").val();
        
//        alert(discount_id);
        
        var html = getHTMLForm(child_id);

//        alert(html);
        
        $("#list > tbody:last-child").append(html);
        
    });
    
    $( ".get-html-form" ).each(function( index ) {
//  console.log( index + ": " + $( this ).text() );
        var child_id = $(this).attr("data-child-id");

        
        $(this).remove();
        
        var html = getHTMLForm(child_id);
        $("#list > tbody:last-child").append(html);
        
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