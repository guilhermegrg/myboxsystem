
<?php include_once("../includes/functions.php") ?>

<?php include_once("../includes/schedule-functions.php") ?>

<?php include "models/Modality.php"; ?>
<?php include "models/ModalityClass.php"; ?>

<?php include "admin-header.php"; ?>


   
   <?php 




    $modality_id = 0;
    $class_id = 0;

    $today=date('d-m-Y');
    $date = date('d-m-Y');
    $dates = getDates($date);

//    var_dump($dates);
    getPreviousWeek($date);
    getNextWeek($date);

    if(isset($_GET["date"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $date = $get["date"];
        $dates = getDates($date);
        
    }

    if(isset($_GET["modality"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $modality_id = $get["modality"];
        
    }

    if(isset($_GET["class"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $class_id = $get["class"];
        
    }


    if(isset($_GET["delete"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $deleteID = $get["delete"];
        
        if(is_numeric($deleteID))
        {
            Discount::delete($deleteID);
            setSuccess("Deleted a discount!");
            echo "Deleted a discount!<br>";
            send("discount_read_list_view.php");
        }
    }
    

?>
   
   
   <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirm delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Discount? This is definitive and Errors may occur!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a id="deleteLink" class="btn btn-danger text-white" >Delete!</a>
      </div>
    </div>
  </div>
</div>
   
   
<h4>Schedule</h4>


<div class="row">
    <div class="btn-group text-white" role="group" aria-label="Modality Selector">
     <?php 


        $list = Modality::getAllObjects();
        foreach($list as $modality){
            $active = "";

            if($modality_id == 0 )
                $modality_id = $modality->id;

            if($modality_id == $modality->id)
                $active="active";

           echo "<a type='button' class='btn btn-secondary $active' href='?modality=$modality->id&date=$date'>$modality->name</a>";
        }

        ?>

    </div>                
</div>

<div class="row mt-3">
    <div class="btn-group text-white" role="group" aria-label="Class Selector">
     <?php 

        if($modality_id > 0){
            $list = ModalityClass::getModalityClasses($modality_id);
            foreach($list as $class){
                $active = "";

                if($class_id == 0 )
                    $class_id = $class->id;

                if($class_id == $class->id)
                    $active="active";

               echo "<a type='button' class='btn btn-secondary $active' href='?modality=$class->modality_id&class=$class->id&date=$date'>$class->name</a>";
            }
        }

        ?>

    </div>  
</div>   
 
 
<div class="row mt-3">
    <div class="btn-group text-white" role="group" aria-label="Date Selector">
     
         <a type='button' class='btn ' href='<?php echo "?modality=$modality_id&class=$class_id&date=".getPreviousWeek($date); ?>'><i class='fas fa-chevron-left'></i> Previous</a>
         <a type='button' class='btn ' href='<?php echo "?modality=$modality_id&class=$class_id&date=".$today; ?>'>This Week</a>
         <a type='button' class='btn '   href='<?php echo "?modality=$modality_id&class=$class_id&date=".getNextWeek($date); ?>'> Next <i class='fas fa-chevron-right'></i></a>
     </div>  
     <div>
         <a type='button' class='btn btn-primary '   href='schedule_create_view.php?date=<?php echo getAmericanFormat($date);?>'> New Schedule </a>
         <a type='button' class='btn btn-primary '   href=''> New Major Exception </a>
     </div>
</div>  
  
<div class="row mt-3">
    <div class="col border text-center <?php echo $today==$dates["a"]? "border-success":""; ?>">
    <h5>Sunday</h5>
    <p><?php echo $dates["Sunday"];?></p>      
    </div>
    <div class="col border text-center <?php echo $today==$dates["Monday"]? "border-success":""; ?>">
    <h5>Monday</h5>
    <p><?php echo $dates["Monday"];?></p>      
    </div>
    <div class="col border text-center <?php echo $today==$dates["Tuesday"]? "border-success":""; ?>">
    <h5>Tuesday</h5>
    <p><?php echo $dates["Tuesday"];?></p>      
    </div>
    <div class="col border text-center <?php echo $today==$dates["Wednesday"]? "border-success":""; ?>">
    <h5>Wednesday</h5>
    <p><?php echo $dates["Wednesday"];?></p>      
    </div>
    <div class="col border text-center <?php echo $today==$dates["Thursday"]? "border-success":""; ?>">
    <h5>Thursday</h5>
    <p><?php echo $dates["Thursday"];?></p>      
    </div>   
    <div class="col border text-center <?php echo $today==$dates["Friday"]? "border-success":""; ?>">
    <h5>Friday</h5>
    <p><?php echo $dates["Friday"];?></p>      
    </div> 
    <div class="col border text-center <?php echo $today==$dates["Saturday"]? "border-success":""; ?>">
    <h5>Saturday</h5>
    <p><?php echo $dates["Saturday"];?></p>      
    </div>
</div>  
   
     <?php displayMessages(); ?>
   
<?php include "admin-footer.php"; ?>