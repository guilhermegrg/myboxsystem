
<?php include_once("../includes/functions.php") ?>

  <?php include "admin-header.php"; ?>



  <form action="discount_create.php" method="post" >
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter the name">
    </div>

    <div class="form-group">
        <label for="value">Value:</label>
        <input type="text" class="form-control" name="value" placeholder="Enter the value or percentage">
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="active" checked>
        <label for="active" class="form-check-label" >Active:</label>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="createDiscount" value="Create">
    </div>

    
</form>   
              
       
  
   
   
   
    
    
    
    
    
    
    
    
<?php include "admin-footer.php"; ?>