
<?php include "models/PeriodicService.php"; ?>
<?php include "models/ClassAccessTemplate.php"; ?>
<?php include "models/Discount.php"; ?>
<?php include "models/PeriodicServiceHasDiscount.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $periodicService = new PeriodicService();

        $periodicService->name = $post["name"];
        $periodicService->description = $post["description"];
        $periodicService->price = $post["price"];
        $periodicService->renewal = $post["renewal"];
        $periodicService->class_access_template_id = $post["class_access_template_id"];
        
        
        $discount_id_array = $post['discount_id_array'];
        $children = [];
            

            foreach($discount_id_array as $key=>$value){
                $relation = new PeriodicServiceHasDiscount();
                $relation->discount_id = $value;
                $children[$key] = $relation ;
            }       
//        $discount->import($post);
        
        $errors = $periodicService->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("PeriodicService",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Periodic Service!!<br>";
//            $active= ($active=="on"?1:0);
            
            $periodicService->save();
            
            
            foreach($children as $child){
                $child->periodic_service_id = $periodicService->id;
            }
            
            PeriodicServiceHasDiscount::updateChildren($periodicService->id,$children);
            
           setSuccess("Created new Periodic Service Nº " . $periodicService->id); 
           send("periodic_service_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $periodicService = new PeriodicService();
        $children = [];
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

