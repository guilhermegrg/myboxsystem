
<?php include "models/UsageDiscount.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $usageDiscount = new UsageDiscount();

        $usageDiscount->name = $post["name"];
        $usageDiscount->value = $post["value"];
        if(isset($post['active']))
            $usageDiscount->active = ($post["active"]=="on");
        else
            $usageDiscount->active = false;
        
        
        
                
//        $discount->import($post);
        
        $errors = $usageDiscount->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("UsageDiscount",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Usage Discount!!<br>";
//            $active= ($active=="on"?1:0);
            
           $id = $usageDiscount->save();
            
            
           setSuccess("Created new Usage Discount Nº " . $usageDiscount->id); 
           send("usage_discount_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $usageDiscount = new UsageDiscount();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

