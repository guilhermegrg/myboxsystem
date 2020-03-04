<?php include "models/PeriodicService.php"; ?>
<?php include "models/ClassAccessTemplate.php"; ?>
<?php include "models/Discount.php"; ?>
<?php include "models/PeriodicServiceHasDiscount.php"; ?>


<?php
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $periodicService = new PeriodicService();
        
        $periodicService->name = $post["name"];
        $periodicService->description = $post["description"];
        $periodicService->price = $post["price"];
        $periodicService->renewal = $post["renewal"];
        $periodicService->class_access_template_id = $post["class_access_template_id"];
        $periodicService->class_access_template_name = $post["class_access_template_name"];
        $periodicService->id = $post["id"];
        
        
             $children = [];
        if(isset($post['discount_id_array'])){
        $discount_id_array = $post['discount_id_array'];
        
            

            foreach($discount_id_array as $key=>$value){
                $relation = new PeriodicServiceHasDiscount();
                $relation->discount_id = $value;
                $children[$key] = $relation ;
            }       
//        $discount->import($post);
        }
        $errors = $periodicService->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("PeriodicService",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $periodicService->save();
//           cleanFormValues("DISCOUNT");
            PeriodicServiceHasDiscount::updateChildren($periodicService->id,$children);
            
           setSuccess("Updated Periodic Service Nº " . $id); 
           send("periodic_service_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("periodic_service_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("periodic_service_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $periodicService = PeriodicService::get($id);
        $children = PeriodicServiceHasDiscount::getChildrenAsObjects($id);
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

