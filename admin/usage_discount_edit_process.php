<?php include "models/UsageDiscount.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
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
        $usageDiscount->id = $post["id"];
        
        
        $errors = $usageDiscount->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("UsageDiscount",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $usageDiscount->save();
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Updated Usage Discount Nº " . $usageDiscount->id); 
           send("usage_discount_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("usage_discount_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("usage_discount_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $usageDiscount = UsageDiscount::get($id);
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

