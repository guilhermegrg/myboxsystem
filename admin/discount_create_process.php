<?php include_once("../includes/db.php") ?>

<?php include "../includes/daos/discountsDAO.php"; ?>


<?php
    $name="";
    $value="";
    $active="off";
    
    if(isset($_POST["createDiscount"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        $name = $post["name"];
        $value = $post["value"];
        
        if(isset($post['active']))
            $active = $post["active"];
        

        
        
        
        
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


        
        if(!empty($error))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("DISCOUNT",$error);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        
            $active= ($active=="on"?1:0);
            
            DiscountsDAO::create($name,$value, $active);
            
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Created new Discount Nº " . $id); 
           send("discount_read_list_view.php"); 
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
    }
    

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

