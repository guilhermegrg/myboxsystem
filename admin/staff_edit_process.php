<?php include "models/User.php"; ?>
<?php include "models/Staff.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $staffMember = new Staff();
        
        $staffMember->user_id = $post["user_id"];
//        $staffMember->user_name = $post["user_name"];
        $staffMember->session_price = $post["session_price"];
        $staffMember->id = $post["id"];
        
        
        $errors = $staffMember->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("Staff",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $staffMember->save();
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Updated Staff Nº " . $staffMember->id); 
           send("staff_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("staff_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("staff_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $staffMember = Staff::get($id);
//        $name = $discount["name"];
//        $value = $discount["value"];
//        $active = $discount["active"];
//        
////         echo "active 2: $active<br>";
//        $active = ($active == 1?"on":"off");
//         echo "active 3: $active<br>";
    }
    

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

