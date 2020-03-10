
<?php include_once("../includes/functions.php") ?>

<?php include "models/Modality.php"; ?>
<?php include "models/ModalityClass.php"; ?>

<?php include "admin-header.php"; ?>


   
   <?php 


    $modality_id = 0;
    $class_id = 0;

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
   
     <?php displayMessages(); ?>
   
<?php include "admin-footer.php"; ?>