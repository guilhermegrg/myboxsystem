
<?php include "models/Discount.php"; ?>


<?php

    
    if(isset($_POST["createDiscount"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $discount = new Discount();
        $discount->name = $post["name"];
        $discount->value = $post["value"];
        
        if(isset($post['active']))
            $discount->active = ($post["active"]=="on");
        else
            $discount->active = false;
        
        
                
//        $discount->import($post);
        
        $errors = $discount->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("DISCOUNT",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Discount!!<br>";
//            $active= ($active=="on"?1:0);
            
            $discount->save();
            
            
           setSuccess("Created new Discount Nº " . $id); 
           send("discount_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $discount = new Discount();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

