
<?php include_once("../includes/functions.php") ?>

<?php include "models/Modality.php"; ?>
<?php include "models/ModalityClass.php"; ?>

<?php include "admin-header.php"; ?>


   
   <?php 

    function getDates($date){
//        echo " Date: $date ";
        
        
        $time = strtotime($date);
        
//        echo " Time: $time ";
        
        $weekday = date('w', $time);
//        echo " Weekday: $weekday ";
        
        $sundayTime = mktime(0, 0, 0, date("m", $time)  , date("d", $time)-$weekday, date("Y", $time));
        
//        echo " Sunday Time: $sundayTime ";
        
        $sundayDate = date('d-m-Y',$sundayTime);
        
//        echo " Sunday Date: $sundayDate ";
        
        $dates["Sunday"] = $sundayDate;
        $dates["Monday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+1, date("Y", $sundayTime)));
        $dates["Tuesday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+2, date("Y", $sundayTime)));
        $dates["Wednesday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+3, date("Y", $sundayTime)));
        $dates["Thursday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+4, date("Y", $sundayTime)));
        $dates["Friday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+5, date("Y", $sundayTime)));
        $dates["Saturday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+6, date("Y", $sundayTime)));
        
//        var_dump($dates);
        return $dates;
    }

    function getPreviousWeek($date){
        $time = strtotime($date);
        
//        echo " Time: $time ";
        
//        $weekday = date('w', $time);
//        echo " Weekday: $weekday ";
        
        $prevWeekDayTime = mktime(0, 0, 0, date("m", $time)  , date("d", $time)-7, date("Y", $time));
        $prevWeekDayDate = date('d-m-Y',$prevWeekDayTime);
        
        
//                echo " Prev Date: $prevWeekDayDate ";
        
        return $prevWeekDayDate;
    }

    function getNextWeek($date){
        $time = strtotime($date);
        
//        echo " Time: $time ";
        
//        $weekday = date('w', $time);
//        echo " Weekday: $weekday ";
        
        $nextWeekDayTime = mktime(0, 0, 0, date("m", $time)  , date("d", $time)+7, date("Y", $time));
        $nextWeekDayDate = date('d-m-Y',$nextWeekDayTime);
        
//        echo " Next Date: $nextWeekDayDate ";
        
        return $nextWeekDayDate;
    }


    $modality_id = 0;
    $class_id = 0;

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

           echo "<a type='button' class='btn btn-secondary $active' href='?modality=$modality->id'>$modality->name</a>";
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

               echo "<a type='button' class='btn btn-secondary $active' href='?modality=$class->modality_id&class=$class->id'>$class->name</a>";
            }
        }

        ?>

    </div>  
</div>   
 
 
<div class="row mt-3">
    <div class="btn-group text-white" role="group" aria-label="Date Selector">
     
     <a type='button' class='btn ' href='<?php echo "?modality=$modality_id&class=$class_id&date=".getPreviousWeek($date); ?>'><i class='fas fa-chevron-left'></i> Previous</a>
     <a type='button' class='btn '   href='<?php echo "?modality=$modality_id&class=$class_id&date=".getNextWeek($date); ?>'> Next <i class='fas fa-chevron-right'></i></a>
     </div>  
</div>  
  
<div class="row">
    <div class="col border text-center">
    <h5>Sunday</h5>
    <p><?php echo $dates["Sunday"];?></p>      
    </div>
    <div class="col border text-center">
    <h5>Monday</h5>
    <p><?php echo $dates["Monday"];?></p>      
    </div>
    <div class="col border text-center">
    <h5>Tuesday</h5>
    <p><?php echo $dates["Tuesday"];?></p>      
    </div>
    <div class="col border text-center">
    <h5>Wednesday</h5>
    <p><?php echo $dates["Wednesday"];?></p>      
    </div>
    <div class="col border text-center">
    <h5>Thursday</h5>
    <p><?php echo $dates["Thursday"];?></p>      
    </div>   
    <div class="col border text-center">
    <h5>Friday</h5>
    <p><?php echo $dates["Friday"];?></p>      
    </div> 
    <div class="col border text-center">
    <h5>Saturday</h5>
    <p><?php echo $dates["Saturday"];?></p>      
    </div>
</div>  
   
     <?php displayMessages(); ?>
   
<?php include "admin-footer.php"; ?>