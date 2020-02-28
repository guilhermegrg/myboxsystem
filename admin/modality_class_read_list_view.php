
<?php include_once("../includes/functions.php") ?>

<?php include "models/ModalityClass.php"; ?>

<?php include "admin-header.php"; ?>


   
   <?php 

    
    if(isset($_GET["delete"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $deleteID = $get["delete"];
        
        if(is_numeric($deleteID))
        {
            ModalityClass::delete($deleteID);
            setSuccess("Deleted a Modality Class!");
//            echo "Deleted a discount!<br>";
            send("modality_class_read_list_view.php");
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
        Are you sure you want to delete this Modality Class? This is definitive and Errors may occur!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a id="deleteLink" class="btn btn-danger text-white" >Delete!</a>
      </div>
    </div>
  </div>
</div>
   
   
<h4>Classes</h4>
   
     <?php displayMessages(); ?>
   
   <?php  include "pagination.php"; ?>
<!--   <div class="container">-->
   <div class="row">
   <div class="col mr-auto">
   <?php   

        $totalPages = ModalityClass::getTotalPages();

        $page = Pagination::show("ModalityClass");

    ?>
    </div>
    <div class="col ml-auto text-right">
        <a href="modality_class_create_view.php" class="btn btn-primary text-white">Create new Class</a>
    </div>
    </div>
<!--   </div>-->
   
   
   
   
   
   <table class="table table-hover table-bordered table-striped">
       <thead class="thead-dark">
           <tr>
           <th>#</th>
           <th>Active</th>
           <th>Name</th>
           <th>Modality</th>
           <th>Independent</th>
           <th>Vis. Users</th>
           <th>Public</th>
           <th>URL Name</th>
           <th>Actions</th>
           </tr>
       </thead>
       <tbody>

           <?php 
           

           $classes = ModalityClass::getPageObjects($page);
           
           foreach($classes as $class): ?>
               
               <tr>
                   <td><?php echo  $class->id;?> </td>
                   <td><?php echo $class->active==1?"<i class='fas fa-check text-success'></i>":"<i class='fas fa-times text-danger'></i>";?></td>
                   <td><?php echo  $class->name;?></td>
                   <td><?php echo  $class->modality_id;?></td>
                   <td><?php echo  $class->independentSchedule;?></td>
                   <td><?php echo  $class->visibleToUsers;?></td>
                   <td><?php echo  $class->publicSchedule;?></td>
                   <td><?php echo  $class->urlName;?></td>
                   <td>
                      <a  class="btn btn-primary btn-sm" href="modality_class_edit_view.php?edit=<?php echo  $class->id;?>" >Edit</a>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop" data-id="<?php echo  $class->id;?>">
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
        Pagination::show("ModalityClass");
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