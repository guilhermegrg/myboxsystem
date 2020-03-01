<?php include "models/PaymentMethod.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $paymentMethod = new PaymentMethod();
        
        $paymentMethod->name = $post["name"];
        $paymentMethod->instructions = $post["instructions"];
        if(isset($post['active']))
            $paymentMethod->active = ($post["active"]=="on");
        else
            $paymentMethod->active = false;
        $paymentMethod->id = $post["id"];
        
        
        $errors = $paymentMethod->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("PaymentMethod",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $paymentMethod->save();
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Updated Payment Method Nº " . $id); 
           send("test_payment_method_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("test_payment_method_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("test_payment_method_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $paymentMethod = PaymentMethod::get($id);
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

