
<?php include_once("../includes/functions.php") ?>

<?php include "admin-header.php"; ?>

<?php

include "{{ filePrefix }}_edit_process.php";
                          

//var_dump($_SESSION);
//echo "active: " . $active;
?>

<h4>Edit {{ nameForMessages }}</h4>

  <?php displayMessages(); ?>

    

  <form action="{{ filePrefix }}_edit_view.php" method="post" >
   
   
   <div class="form-group">
        <label for="name">Id:</label>
        <input type="text" class="form-control" name="id" value="<?php echo ${{ singleObjectVariableName }}->id; ?>" readonly>
    </div>
   
   
     {{ include('htmlFormTemplate.php') }}
    
    <div class="form-group">
       <a href="{{ filePrefix }}_read_list_view.php" class="btn btn-secondary text-white">Cancel</a>
        <input type="submit" class="btn btn-primary" name="edit" value="Save">
    </div>

    
</form>   
              
       
<?php cleanFormValidation("{{ validationTAG }}"); ?>
   

    
    
<?php include "admin-footer.php"; ?>