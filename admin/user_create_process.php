<?php include_once("../includes/db.php") ?>




<?php
    $name="";
    $email="";
    $mobile="";
    $birthday="";
    $active="off";
    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        $name = $post["name"];
        $email = $post["email"];
        $mobile = $post["mobile"];
        $birthday = $post["birthday"];
        
        if(isset($post['active']))
            $active = $post["active"];
        

        
        
        
        
        $error = [];
        //todo check if name and valuea are not empty and valid
        if(empty($name) || $name=="")
        {
            $error["name"] = "Name cannot be empty!";
        }elseif(strlen($name)<=3){
            $error["name"] = "Name must have two or more names of at least 2 characters each";
        }elseif(!preg_match("/^([\p{L}]{2,})([ ]+([\p{L}]{2,}))+$/",$name))
        {
            $error["name"] = "Name must have two or more names of at least 2 characters each";
        }
        
        if(empty($email) || $email=="")
        {
            $error["email"] = "Email cannot be empty!";
        }elseif(strlen($email)<1){
            $error["email"] = "Email must have more than one character!";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error["email"] = "Format Error! Enter a valid email account!";
        }
        
        if(empty($mobile) || $mobile=="")
        {
            $error["mobile"] = "Mobile cannot be empty!";
        }elseif(strlen($mobile)<1){
            $error["mobile"] = "Mobile must have more than one character!";
        }elseif(!preg_match("/^[0-9]{9,}$/",$mobile))
        {
            $error["mobile"] = "Format Error! Enter a valid mobile phone number!";
        }
        
        
//        if(empty($birthday) || $birthday=="")
//        {
//            $error["birthday"] = "Birthday cannot be empty!";
//        }elseif(strlen($birthday)<1){
//            $error["birthday"] = "Birthday must have more than one character!";
//        }elseif(!preg_match("/^[0-9.%]{1,}$/",$birthday))
//        {
//            $error["birthday"] = "Format Error! A number or a percentage only!";
//        }

        
        //todo check for uniqueness of name
        
//        var_dump($error);


        
        if(!empty($error))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("USER",$error);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        
            $active= ($active=="on"?1:0);
            
            UserDAO::create($name,$value, $active);
            
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Created new user nº " . $id); 
           send("user_create_view.php"); 
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

