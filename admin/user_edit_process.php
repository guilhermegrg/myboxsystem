<?php include "models/User.php"; ?>


<?php
//    $name="";
//    $value="";
//    $active="off";
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
         $user = new User();
        
        $user->id = $post["id"];
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
        
//        var_dump($error);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("USER",$errors);
//            exit;
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//            $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $user->save();
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Updated User nº " . $user->id); 
           send("user_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id))
            send("user_read_list_view.php");
        else
        if($id<=0)
            send("user_read_list_view.php");
        
        
        //load values from db
        $user = User::get($id);
//         echo "active 3: $active<br>";
    }
    

//echo "name: " . $name;
//echo "Email: " . $email;
//echo "active: ". $active;
    
    
    ?>

