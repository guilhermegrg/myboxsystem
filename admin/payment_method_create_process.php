
<?php include "models/PaymentMethod.php"; ?>


<?php

    
    if(isset($_POST["create"])){
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
        
        
                
//        $discount->import($post);
        
        $errors = $paymentMethod->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("PAYMENT_METHOD",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Payment Method!!<br>";
//            $active= ($active=="on"?1:0);
            
            $paymentMethod->save();
            
            
           setSuccess("Created new Payment Method Nº " . $id); 
           send("payment_method_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $paymentMethod = new PaymentMethod();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

