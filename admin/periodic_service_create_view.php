
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "periodic_service_create_process.php";
                          

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
 
 <h4>Create Periodic Service</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//$val = $discount->getHTMLValidation("name");
//var_dump($val);

//->getHTMLValidation();

?>
  

  <form action="periodic_service_create_view.php" method="post" >
   
    
<div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control <?php echo isValid("PeriodicService","name")?"":"is-invalid";?>" name="name" placeholder="Enter the name" value="<?php echo $periodicService->name; ?>" <?php echo PeriodicService::getHTMLValidationRule("name"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","name"); ?>
        </div>
</div>
<div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control <?php echo isValid("PeriodicService","description")?"":"is-invalid";?>" name="description" placeholder="Enter the description" value="<?php echo $periodicService->description; ?>" <?php echo PeriodicService::getHTMLValidationRule("description"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","description"); ?>
        </div>
</div>

<div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control <?php echo isValid("PeriodicService","price")?"":"is-invalid";?>" name="price" placeholder="Enter the price" value="<?php echo $periodicService->price; ?>" <?php echo PeriodicService::getHTMLValidationRule("price"); ?> >
        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","price"); ?>
        </div>
</div>

<div class="form-group">
        <label for="classTemplate">Renewal:</label>
        <select class="form-control" id="classTemplate" name="renewal">
                <option value="MONTHLY" <?php echo $periodicService->renewal == "MONTHLY"?"selected":"";  ?>>MONTHLY</option>";
                <option value="YEARLY"  <?php echo $periodicService->renewal == "YEARLY"?"selected":"";  ?>>YEARLY</option>";
        </select>

        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","class_access_template_id"); ?>
        </div>
</div>


<div class="form-group">
        <label for="classTemplate">Class Access Template:</label>
        <select class="form-control" id="classTemplate" name="class_access_template_id">
        <?php $templates = ClassAccessTemplate::getAllObjects(); 
            
            foreach($templates as $template){
                $selected ="";
                if($template->id == $periodicService->class_access_template_id)
                    $selected = "selected";
                
                echo "<option $selected value={$template->id} >{$template->name}</option>";
            };
        ?>
        </select>

        <div class="invalid-feedback">
          <?php echo getFormValidationField("PeriodicService","class_access_template_id"); ?>
        </div>
</div>
    
     <div id="ruleForm" class="form-inline align-items-center mb-4">
    
       
            <label for="add_child_id_option" class="mr-1">Discount:</label>
            <select class="form-control  mr-sm-2" id="add_child_id_option">
            <?php  
                $discounts = Discount::getAllObjects(); 
                
                foreach($discounts as $discount){
                    echo "<option value={$discount->id} >{$discount->name}</option>";
                };
            ?>
            </select>

            <input type="button" class="btn btn-primary" name="add" id="addTableItem" value="Add Discount">
    
    </div>
<!--    </form>-->
  <table class="table" id="list">
       <thead>
           <tr>
               <th>Discount</th>
               <th>Action</th>
           </tr>
       </thead>

       <tbody>
           <?php
         $counter = 0;
           foreach($children as $discount){
               
              echo "<tr class='get-html-form' data-child-id='$discount->discount_id' ></tr>";
            ++$counter;          
           }
           
           ?>
       </tbody>
   </table>

    
    <div class="form-group">
        <a href="periodic_service_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="create" value="Create">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("PeriodicService"); ?>

    
     
          </div>
      </div>
      
  </div>
   
   
   <script src="../vendors/jquery-3.4.1.min.js"></script>
   <script src="../vendors/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
<script>

function getHTMLForm(discount_id){
        
//        var rowCount = $('#ruleList >tbody >tr').length;
        var discount_choices = <?php echo json_encode($discounts); ?>;
        
        var classHTML = "<select class='form-control  mr-sm-2' name='discount_id_array[]'>";
        for (let elem in discount_choices) {
            var discount = discount_choices[elem];
//            console.log(class_choices[elem].id + " - "  +  modality_class_id);
            classHTML+="<option value='"+discount.id+"' " + (discount.id == discount_id?"selected":"")+ ">"+ discount.name + "</option>";
        }
        classHTML+="</select>";

        var final = "<tr><td>"+classHTML+"</td><td><input type='button' class='btn btn-primary deleteListItem' value='Delete'></td></tr>";
        
        return final;
        
//        $("#ruleList > tbody:last-child").append();
}    
   
    
$(document).ready(function(){
    
    $("#addTableItem").click(function(){
        
        var rowCount = $('#list >tbody >tr').length;
        
        var discount_id = $("#add_child_id_option").val();
        
//        alert(discount_id);
        
        var html = getHTMLForm(discount_id);

//        alert(html);
        
        $("#list > tbody:last-child").append(html);
        
    });
    
    $( ".get-html-form" ).each(function( index ) {
//  console.log( index + ": " + $( this ).text() );
        var discount_id = $(this).attr("data-child-id");

        
        $(this).remove();
        
        var html = getHTMLForm(discount_id);
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