
<?php include "models/ClassAccessTemplate.php"; ?>

<?php include "models/ClassAccessRule.php"; ?>
<?php include "models/ModalityClass.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
//        exit;
        
        $modality_class_id_array = $post['modality_class_id_array'];
        $limited_array = $post['limited_array'];
        $frequency_array = $post['frequency_array'];
        $period_array = $post['period_array'];
        
        $classAccessTemplate = new ClassAccessTemplate();

        $classAccessTemplate->name = $post["name"];
        
        
//         var_dump($limited_array);
//        exit;
                
//        $discount->import($post);
        
        $errors = $classAccessTemplate->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("ClassAccessTemplate",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Class Access Template!!<br>";
//            $active= ($active=="on"?1:0);
            
            $classAccessTemplate->save();
            
            echo "New id:" . $classAccessTemplate->id . "<br>";
//            exit;
            
            $children = [];
            

            foreach($modality_class_id_array as $key=>$value){
                $rule = new ClassAccessRule();
                $rule->class_access_template_id = $classAccessTemplate->id;
                $rule->id = $key+1;
                $rule->modality_class_id = $value;
                
                $isLimited = $limited_array[$key];
                if(!isset($isLimited) || $isLimited ==  null)
                    $limited = false;
                else
                    $limited = true;
                
                $rule->limited = $limited;
                
                $rule->frequency = $frequency_array[$key];
                $rule->period = $period_array[$key];
                $children[$key] = $rule ;
            }

            ClassAccessRule::updateChildren($classAccessTemplate->id,$children);

            
            
           setSuccess("Created new Class Access Template Nº " . $classAccessTemplate->id); 
           send("class_access_template_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $classAccessTemplate = new ClassAccessTemplate();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

