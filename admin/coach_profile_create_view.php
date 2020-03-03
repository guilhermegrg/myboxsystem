
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "coach_profile_create_process.php";
                          

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
 
 <h4>Create Coach Profile</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="coach_profile_create_view.php" method="post" >
   
    
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("CoachProfile","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $coachProfile->name; ?>" <?php echo CoachProfile::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("CoachProfile","name"); ?>
        </div>
</div>

     <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Modality Class:</label>
            <select class="form-control  mr-sm-2" id="add_child_id_option">
            <?php  
                $classes = ModalityClass::getAllObjects(); 
                
                foreach($classes as $class){
                    echo "<option value={$class->id} >{$class->modality_name} - {$class->name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addTableItem" value="Add Discount">
    
    </div>
<!--    </form>-->
  <table class="table" id="list">
       <thead>
           <tr>
               <th>Modality Class</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children as $class){
               
              echo "<tr class='get-html-form' data-child-id='$class->modality_class_id' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>


    
    <div class="form-group">
        <a href="coach_profile_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("CoachProfile"); ?>


    
     
          </div>
      </div>
      
  </div>
   
   
   <script src="../vendors/jquery-3.4.1.min.js"></script>
   <script src="../vendors/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
<script>

function getHTMLForm(mod_class_id){
        
//        var rowCount = $('#ruleList >tbody >tr').length;
        var class_choices = <?php echo json_encode($classes); ?>;
        
        var classHTML = "<select class='form-control  mr-sm-2' name='class_id_array[]'>";
        for (let elem in class_choices) {
            var modClass = class_choices[elem];
//            console.log(class_choices[elem].id + " - "  +  modality_class_id);
            classHTML+="<option value='"+modClass.id+"' " + (modClass.id == mod_class_id?"selected":"")+ ">"+ modClass.modality_name + " - " + modClass.name + "</option>";
        }
        classHTML+="</select>";

        var final = "<tr><td>"+classHTML+"</td><td><input type='button' class='btn btn-primary deleteListItem' value='Delete'></td></tr>";
        
        return final;
        
//        $("#ruleList > tbody:last-child").append();
}    
   
    
$(document).ready(function(){
    
    $("#addTableItem").click(function(){
        
        var rowCount = $('#list >tbody >tr').length;
        
        var mod_class_id = $("#add_child_id_option").val();
        
//        alert(discount_id);
        
        var html = getHTMLForm(mod_class_id);

//        alert(html);
        
        $("#list > tbody:last-child").append(html);
        
    });
    
    $( ".get-html-form" ).each(function( index ) {
//  console.log( index + ": " + $( this ).text() );
        var mod_class_id = $(this).attr("data-child-id");

        
        $(this).remove();
        
        var html = getHTMLForm(mod_class_id);
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