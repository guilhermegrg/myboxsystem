<?php include_once("../includes/db.php") ?>




<?php
    
    
    if(isset($_POST["createDiscount"])){
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        var_dump($post);
        $name = $post["name"];
        $value = $post["value"];
        
        $active="off";
        if(isset($post['active']))
            $active = $post["active"];
        
        $active= ($active=="on"?1:0);
        
        //todo check if name and valuea are not empty and valid
        //todo check for uniqueness of name
        
        
        $query = "INSERT INTO discounts(name,value,active) VALUES (:name, :value, :active)";
        $stmt = $conn->prepare($query);
        $stmt->bindValue("name",$name);
        $stmt->bindValue("value",$value);
        $stmt->bindValue("active",$active);
        
        $stmt->execute();
        
        $id = $conn->lastInsertId();
        
    }
    
    
    
    ?>

