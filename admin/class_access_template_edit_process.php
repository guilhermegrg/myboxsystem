
<?php include "models/ClassAccessTemplate.php"; ?>

<?php include "models/ClassAccessRule.php"; ?>
<?php include "models/ModalityClass.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $classAccessTemplate = new ClassAccessTemplate();
        
        $classAccessTemplate->name = $post["name"];
        $classAccessTemplate->id = $post["id"];
        
        $children = [];
        
        if(isset($post['modality_class_id_array'])){
            $modality_class_id_array = $post['modality_class_id_array'];
            $limited_array = $post['limited_array'];
            $frequency_array = $post['frequency_array'];
            $period_array = $post['period_array'];
 
    
            

            foreach($modality_class_id_array as $key=>$value){
                $rule = new ClassAccessRule();
                $rule->class_access_template_id = $classAccessTemplate->id;
                $rule->id = $key+1;
                $rule->modality_class_id = $value;
                
               if(array_key_exists($key,$limited_array)){
                   $limited = true;
               }else
                   $limited = false;
               
                
                $rule->limited = $limited;
                
                $rule->frequency = $frequency_array[$key];
                $rule->period = $period_array[$key];
                $children[$key] = $rule ;
            }                      
        }
        
        $errors = $classAccessTemplate->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("ClassAccessTemplate",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $classAccessTemplate->save();
//           cleanFormValues("DISCOUNT");
            
//               $children = [];
//            
//
//            foreach($modality_class_id_array as $key=>$value){
//                $rule = new ClassAccessRule();
//                $rule->class_access_template_id = $classAccessTemplate->id;
//                $rule->id = $key+1;
//                $rule->modality_class_id = $value;
//                
//                $isLimited = $limited_array[$key];
//                if(!isset($isLimited) || $isLimited ==  null)
//                    $limited = false;
//                else
//                    $limited = true;
//                
//                $rule->limited = $limited;
//                
//                $rule->frequency = $frequency_array[$key];
//                $rule->period = $period_array[$key];
//                $children[$key] = $rule ;
//            }

            ClassAccessRule::updateChildren($classAccessTemplate->id,$children);
            
           setSuccess("Updated Class Access Template Nº " . $classAccessTemplate->id); 
           send("class_access_template_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("class_access_template_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("class_access_template_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $classAccessTemplate = ClassAccessTemplate::get($id);
        $children = ClassAccessRule::getChildrenAsObjects($id);
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

