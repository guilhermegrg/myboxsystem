
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "class_access_template_create_process.php";
                          

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
 
 <h4>Create Class Access Template</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="class_access_template_create_view.php" method="post" >
   
    
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("ClassAccessTemplate","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $classAccessTemplate->name; ?>" <?php echo ClassAccessTemplate::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassAccessTemplate","name"); ?>
        </div>
</div>

<!--    <form action="" method="post">-->
   
 
    <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="modality_class" class="mr-1">Class:</label>
            <select class="form-control  mr-sm-2" id="modality_class" name="modality_class">
            <?php $mods = ModalityClass::getAllObjects(); 

                foreach($mods as $class){
                    echo "<option value={$class->id} >{$class->modality_name} - {$class->name}</option>";
                };
            ?>
            </select>

            <input type="checkbox" class="form-check-input ml-4" name="limited" id="limited" checked>
            <label for="limited" class="form-check-label mr-4" >Limited</label>

            <label for="price" class="mr-1">Frequency:</label>
            <input type="number" id="frequency" name="frequency" min="1" class="form-control col-1 mr-4" value="3" >


            <label for="period" class="mr-1">Period:</label>
            <select class="form-control  mr-4" id="period" name="period">
                    <option value="WEEKLY">WEEKLY</option>";
                    <option value="MONTHLY">MONTHLY</option>";
            </select>
    

            <input type="button" class="btn btn-primary" name="addRule" id="addRule" value="Add Rule">
    
    </div>
<!--    </form>-->
  <table class="table" id="ruleList">
       <thead>
           <tr>
               <th>Class</th>
               <th>Limited</th>
               <th>Frequency</th>
               <th>Period</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           
       </tbody>
   </table>
    
    
    <div class="form-group">
        <a href="class_access_template_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("ClassAccessTemplate"); ?>

    
<!--<?php include "admin-footer.php"; ?>-->
     
          </div>
      </div>
      
  </div>
   
   
   <script src="../vendors/jquery-3.4.1.min.js"></script>
   <script src="../vendors/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
<script>

$(document).ready(function(){
    
    $("#addRule").click(function(){
//        event.preventDefault();
        
        var modality_class_id = $("#modality_class").val();
        var limited = $("#limited").is(':checked');
        var frequency = $("#frequency").val();
        var period = $("#period").val();
        
        
        var class_choices = <?php echo json_encode($mods); ?>;
        
        var classHTML = "<select class='form-control  mr-sm-2' id='modality_class' name='modality_class[]'>";
        for (let elem in class_choices) {
            console.log(elem + " - "  +  class_choices[elem]);
            classHTML+="<option value='"+elem+"' >"+class_choices[elem].modality_name+" - " + class_choices[elem].name + "</option>";
        }
        classHTML+="</select>";
        
        
        var limitedHTML = "<input type='checkbox' class='form-check-input ml-4' name='limited' id='limited' checked>";
        var freqHTML = "<input type='number' id='frequency' name='frequency[]' min='1' class='form-control col-1 mr-4' value='"+frequency+"' >";
        var selectPeriodHTML = "<select class='form-control  mr-4' id='period' name='period[]'><option value='WEEKLY'>WEEKLY</option>;<option value='MONTHLY'>MONTHLY</option>;</select>";
//        alert(class_choices);
        

        
        
        
        var rowCount = $('#ruleList >tbody >tr').length;
//        alert("Limited: " + limited + " freq: " + frequency + " period:" + period);
//        $("#limited");
//        $("#frequency");
//        $("#period");
        $("#ruleList > tbody:last-child").append("<tr id='row"+rowCount+"'><td>"+classHTML+"</td><td>"+limitedHTML+"</td><td>"+freqHTML+"</td><td>"+selectPeriodHTML+"</td><td><input type='button' class='btn btn-primary deleteRule' name='' id='" +rowCount+"' value='Delete'></td></tr>");
        
//        var form = $(this);
//        
//        $("#name_error").html("");
//        $("#description_error").html("");
//        
//        $.ajax({
//            url:"create.php",
//            method: 'POST',
//            data: formData,
//            dataType: 'json',
//            encode: true,
//            success: function(data){
//                
////                alert(data.message.name);
//               
//                if(data.success = 'false'){
//                    
//                    if(data.message.name != ""){
//                        $("#name_error").css("display","block").html(data.message.name);
////                        alert("Error name!");
//                    }
//                    
//                    if(data.message.description != ""){
//                         $("#description_error").css("display","block").html(data.message.description);
////                        alert("Error description!");
//                    }
//                }else{
//                    $("#ajax_msg").css("display","block").delay(3000).slideUp(300).html(data.message);
//                    document.getElementById("create-task").reset();
//                }
//            }
//            
//        });
        
        
        
        
//        var name = $("#name").val();
//        var description = $("#description").val();
        
        
//        console.log(name + " - " + description);
        
        
        
    });
    
   
    
//    $("#task-list").load('read.php');
    
});


$(document).on('click','.deleteRule',function(event){
    var id = event.target.id;
//    alert("Deleting rule!!!" + id);
    $("#row"+id).remove();
});

function deleteTask(taskid){
    if(confirm("Do you rally want to delete this task?")){
        
        $.ajax({
            url:"delete.php",
            method: 'POST',
            data: {id: taskid},
            success: function(data){
                $("#ajax_msg").css("display","block").delay(3000).slideUp(300).html(data);
                
                
                
            }
            
        });
        
//        $("#task-list").load("read.php");
        window.location.replace('tasks.php?p=1');
    
        
        
    }
    
    return false;
}


</script>
</body>
</html>