<?php include "models/Discount.php"; ?>



<?php
    
    if(isset($_POST["editDiscount"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        $id = $post["id"];
        $name = $post["name"];
        $value = $post["value"];
        
        if(isset($post['active']))
            $active = $post["active"];
        else
            $active = "off";

        $discount = new Discount();
        $discount->id = $id;
        $discount->name = $name;
        $discount->value = $value;
        $discount->active = $active;
        
        
        $errors = $discount->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($error);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("DISCOUNT",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $discount->save();
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Updated discount Nº " . $id); 
           send("discount_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("discount_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("discount_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $discount = Discount::get($id);
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

