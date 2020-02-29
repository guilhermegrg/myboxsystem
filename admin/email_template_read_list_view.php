
<?php include_once("../includes/functions.php") ?>

<?php include "models/EmailMessageTemplate.php"; ?>

<?php include "admin-header.php"; ?>


   
   <?php 

    
    if(isset($_GET["delete"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $deleteID = $get["delete"];
        
        if(is_numeric($deleteID))
        {
            EmailMessageTemplate::delete($deleteID);
            setSuccess("Deleted an Email Message Template!");
//            echo "Deleted a discount!<br>";
            send("email_template_read_list_view.php");
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
        Are you sure you want to delete this Email Message Template? This is definitive and Errors may occur!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a id="deleteLink" class="btn btn-danger text-white" >Delete!</a>
      </div>
    </div>
  </div>
</div>
   
   
<h4>Email Message Templates</h4>
   
     <?php displayMessages(); ?>
   
   <?php  include "pagination.php"; ?>
<!--   <div class="container">-->
   <div class="row">
   <div class="col mr-auto">
   <?php   

        $totalPages = EmailMessageTemplate::getTotalPages();

        $page = Pagination::show("EmailMessageTemplate");

    ?>
    </div>
    <div class="col ml-auto text-right">
        <a href="email_template_create_view.php" class="btn btn-primary text-white">Create new Email Message Template</a>
    </div>
    </div>
<!--   </div>-->
   
   
   
   
   
   <table class="table table-hover table-bordered table-striped">
       <thead class="thead-dark">
           <tr>
           <th>#</th>
           <th>Name</th>
           <th>Title</th>
           <th>Actions</th>
           </tr>
       </thead>
       <tbody>

           <?php 
           

           $emails = EmailMessageTemplate::getPageObjects($page);
           
           foreach($emails as $email): ?>
               
               <tr>
                   <td><?php echo  $email->id;?> </td>
                   <td><?php echo  $email->name;?></td>
                   <td><?php echo  $email->title;?></td>
                   <td>
                      <a  class="btn btn-primary btn-sm" href="email_template_edit_view.php?edit=<?php echo  $email->id;?>" >Edit</a>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop" data-id="<?php echo  $email->id;?>">
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
        Pagination::show("EmailMessageTemplate");
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