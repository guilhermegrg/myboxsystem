<?php include "models/User.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $user = new User();
        
        $user->name = $post["name"];
        $user->email = $post["email"];
        $user->mobile = $post["mobile"];
        $user->birthday = $post["birthday"];
        
        if(isset($post['active']))
            $user->active = ($post["active"]=="on");
        else
            $user->active = false;
        
        
        
        
         $errors = $user->validate();

        
        //todo check for uniqueness of name
        
//        var_dump($errors);


        
        if(!empty($errors))
        {
        
//            echo "Error!<br>";
            
            setError("Please correct the form and submit again");
            setFormValidation("USER",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//        echo "No error!<br>";
//            $active= ($active=="on"?1:0);
            
           $id = $user->save();
            
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Created new user nº " . $id); 
           send("user_read_list_view.php"); 
           exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
        $user = new User();
//    $value="";
//    $active="off";
    }
    

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

