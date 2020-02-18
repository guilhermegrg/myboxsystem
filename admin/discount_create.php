<?php session_start(); ?>
<?php include_once("../includes/db.php") ?>




<?php
    
    
    if(isset($_POST["createDiscount"])){
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        $name = $post["name"];
        $value = $post["value"];
        
        $active="off";
        if(isset($post['active']))
            $active = $post["active"];
        

        
        
        $active= ($active=="on"?1:0);
        
        $error = [];
        //todo check if name and valuea are not empty and valid
        if(empty($name) || $name=="")
        {
            $error["name"] = "Name cannot be empty!";
        }elseif(strlen($name)<=3){
            $error["name"] = "Name must have more than 3 characters!";
        }elseif(!preg_match("/^[A-Za-z]{4,}$/",$name))
        {
            $error["name"] = "Format Error! More than 3 letters. No spaces!";
        }
        
        if(empty($value) || $value=="")
        {
            $error["value"] = "Value cannot be empty!";
        }elseif(strlen($name)<1){
            $error["value"] = "Value must have more than one character!";
        }elseif(!preg_match("/^[0-9.%]{1,}$/",$value))
        {
            $error["name"] = "Format Error! A number or a percentage only!";
        }

        
        //todo check for uniqueness of name
        
//        var_dump($error);

        setFormValue("DISCOUNT","name",$name);
        setFormValue("DISCOUNT","value",$value);
        setFormValue("DISCOUNT","active",$active);
        
        if(!empty($error))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("DISCOUNT",$error);
            
            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        
        $query = "INSERT INTO discounts(name,value,active) VALUES (:name, :value, :active)";
        $stmt = $conn->prepare($query);
        $stmt->bindValue("name",$name);
        $stmt->bindValue("value",$value);
        $stmt->bindValue("active",$active);
        
        $stmt->execute();
        
        $id = $conn->lastInsertId();
            
           cleanFormValues("DISCOUNT");
            
           setSuccess("Created new Discount Nº " . $id); 
           send("discount_create_view.php"); 
        }
        
    }
    
    
    
    ?>

