<?php include_once("../includes/db.php") ?>




<?php
    
    
    if(isset($_POST["createDiscount"])){
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        var_dump($post);
        $name = $post["name"];
        $value = $post["value"];
        $active = $post["active"];
        
        //todo check if name and valuea are not empty and valid
        //todo check for uniqueness of name
        
        
        
        
    }
    
    
    
    ?>

