
<?php include_once("../includes/functions.php") ?>

<?php include "models/ClassSchedule.php"; ?>

<?php include "admin-header.php"; ?>


   
   <?php 

    
    if(isset($_GET["delete"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $deleteID = $get["delete"];
        
        if(is_numeric($deleteID))
        {
            ClassSchedule::delete($deleteID);
            setSuccess("Deleted an Class Schedule");
//            echo "Deleted a discount!<br>";
            send("schedule_read_list_view.php");
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
        Are you sure you want to delete this Class Schedule? This is definitive and Errors may occur!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a id="deleteLink" class="btn btn-danger text-white" >Delete!</a>
      </div>
    </div>
  </div>
</div>
   
   
<h4>Class Schedules</h4>
       
     <?php displayMessages(); ?>
   
   <?php  include "pagination.php"; ?>
<!--   <div class="container">-->
   <div class="row">
   <div class="col mr-auto">
   <?php   

        $totalPages = ClassSchedule::getTotalPages();

        $page = Pagination::show("ClassSchedule");

    ?>
    </div>
    <div class="col ml-auto text-right">
        <a href="schedule_create_view.php" class="btn btn-primary text-white">Create new Class Schedule</a>
    </div>
    </div>
<!--   </div>-->
   
   
   
   
   
   <table class="table table-hover table-bordered table-striped">
       <thead class="thead-dark">
           <tr>
                          <th>#</th>
                           <th>Active</th>
                           <th>Date</th>
                           <th>Class</th>
                           <th>Coach</th>
                           <th>Res</th>
                           <th>Vis</th>
                           <th>Bill</th>
                           <th>Claim</th>
                           <th>Limit</th>
                           <th>part</th>
                           <th>Dur</th>
                       
           <th>Actions</th>
           </tr>
       </thead>
       <tbody>

           <?php 
           

           $schedules = ClassSchedule::getPageObjects($page);
           
           foreach($schedules as $schedule): ?>
               
               <tr>
                  
                    <td><?php echo  $schedule->id;?></td>
                    <td><?php echo $schedule->active==1?"<i class='fas fa-check text-success'></i>":"<i class='fas fa-times text-danger'></i>";?></td>
                    <td><?php echo  $schedule->startDate;?></td>
                    <td><?php echo  $schedule->modality_class_name;?></td>
                    <td><?php echo  $schedule->coach_name;?></td>
                    <td><?php echo $schedule->reservable==1?"<i class='fas fa-check text-success'></i>":"<i class='fas fa-times text-danger'></i>";?></td>
                    <td><?php echo $schedule->visibleToUsers==1?"<i class='fas fa-check text-success'></i>":"<i class='fas fa-times text-danger'></i>";?></td>
                    <td><?php echo $schedule->billable==1?"<i class='fas fa-check text-success'></i>":"<i class='fas fa-times text-danger'></i>";?></td>
                    <td><?php echo $schedule->claimableByCoach==1?"<i class='fas fa-check text-success'></i>":"<i class='fas fa-times text-danger'></i>";?></td>
                    <td><?php echo $schedule->limitParticipants==1?"<i class='fas fa-check text-success'></i>":"<i class='fas fa-times text-danger'></i>";?></td>
                    <td><?php echo  $schedule->participantLimit;?></td>
                    <td><?php echo  $schedule->durationInMinutes;?></td>
                  
                  

                   
                   <td>
                      <a  class="btn btn-primary btn-sm" href="schedule_edit_view.php?edit=<?php echo  $schedule->id;?>" >Edit</a>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop" data-id="<?php echo  $schedule->id;?>">
                      Delete
                      </button>

                   </td>
               </tr>
               
               
               
               <?php
           endforeach;
           
           ?>
                     
                     
                     
           <?php ?>
                      
                                            
       </tbody>
   </table>
   
    <?php   
        Pagination::show("ClassSchedule");
    ?>
    
    
    
             </div>
      </div>
      
  </div>
    
    


 
   
   <script src="../vendors/jquery-3.4.1.min.js"></script>
    <script src="../vendors/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <script>

    $(document).ready(function(){
//        alert("Hell   o!!!");
        $('#staticBackdrop').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
//  alert("Hello!!!");
  var recipient = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//  alert(recipient);
  var modal = $(this)
  modal.find('#deleteLink').attr("href", "?delete="+recipient );
})
        
});
    
    

</script>

</body>
</html>