
<?php include "models/PeriodicService.php"; ?>


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
            
            
           setSuccess("Created new Periodic Service Nº " . $id); 
           send("periodic_service_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $periodicService = new PeriodicService();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

