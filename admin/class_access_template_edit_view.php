
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "class_access_template_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit Class Access Template</h4>

  <?php displayMessages(); ?>

    

  <form action="class_access_template_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo $classAccessTemplate->id; ?>" readonly>
    </div>
   
   
     
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("ClassAccessTemplate","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $classAccessTemplate->name; ?>" <?php echo ClassAccessTemplate::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("ClassAccessTemplate","name"); ?>
        </div>
</div>

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
           <?php
         $counter = 0;
           foreach($children as $rule){
               
              echo "<tr class='get-html-form' data-mod-class-id='$rule->modality_class_id' data-limited='$rule->limited' data-frequency='$rule->frequency' data-period='$rule->period' data-counter='$counter'></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>

    
    <div class="form-group">
       <a href="class_access_template_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
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

function getHTMLForm(modality_class_id,limited,frequency,period, count){
        
//        var rowCount = $('#ruleList >tbody >tr').length;
        var class_choices = <?php echo json_encode($mods); ?>;
        
        var classHTML = "<select class='form-control  mr-sm-2' name='modality_class_id_array[]'>";
        for (let elem in class_choices) {
//            console.log(class_choices[elem].id + " - "  +  modality_class_id);
            classHTML+="<option value='"+class_choices[elem].id+"' " + (class_choices[elem].id == modality_class_id?"selected":"")+ ">"+class_choices[elem].modality_name+" - " + class_choices[elem].name + "</option>";
        }
        classHTML+="</select>";
        
        
        var limitedHTML = "<input type='checkbox' class='form-check-input ml-4' name='limited_array["+count+"]' " +  (limited==1?"checked":"")+ ">";
        var freqHTML = "<input type='number' id='frequency' name='frequency_array[]' min='1' class='form-control' value="+frequency+" >";
        var selectPeriodHTML = "<select class='form-control  mr-4' id='period' name='period_array[]'><option value='WEEKLY' "+(period == "WEEKLY"?"selected":"")+" >WEEKLY</option>;<option value='MONTHLY' "+(period == "MONTHLY"?"selected":"")+">MONTHLY</option>;</select>";

        var final = "<tr><td>"+classHTML+"</td><td>"+limitedHTML+"</td><td>"+freqHTML+"</td><td>"+selectPeriodHTML+"</td><td><input type='button' class='btn btn-primary deleteRule' value='Delete'></td></tr>";
        
        return final;
        
//        $("#ruleList > tbody:last-child").append();
}    
   
    
$(document).ready(function(){
    
    $("#addRule").click(function(){
        
        var rowCount = $('#ruleList >tbody >tr').length;
        
        var modality_class_id = $("#modality_class").val();
        var limited = $("#limited").is(':checked');
        var frequency = $("#frequency").val();
        var period = $("#period").val();
        
        var html = getHTMLForm(modality_class_id,limited,frequency,period,rowCount);

//        alert(html);
        
        $("#ruleList > tbody:last-child").append(html);
        
    });
    
    $( ".get-html-form" ).each(function( index ) {
//  console.log( index + ": " + $( this ).text() );
        var modality_class_id = $(this).attr("data-mod-class-id");
        var limited = $(this).attr("data-limited");
//        alert("modality_class_id" + modality_class_id);
        var frequency = $(this).attr("data-frequency");
        var period = $(this).attr("data-period");
        var counter = $(this).attr("data-counter");
        
//         alert("Limited: " + limited);
        
        $(this).remove();
        
        var html = getHTMLForm(modality_class_id,limited,frequency,period,counter);
        
        
        
        $("#ruleList > tbody:last-child").append(html);
        
    });
    
   
    
});


$(document).on('click','.deleteRule',function(event){
//    var id = event.target.id;
    var row = $(this).closest("tr");
//    alert("Deleting rule!!! " + row);
    row.remove();
});



    
    
    

</script>
</body>
</html>