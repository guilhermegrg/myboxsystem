
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
            
            $id = $classAccessTemplate->save();
            
            $children = [];
            

            foreach($modality_class_id_array as $key=>$value){
                $rule = new ClassAccessRule();
                $rule->modality_class_id = $value;
                $rule->id = $key+1;
                $rule->limited = $limited_array[$key];
                $rule->frequency = $frequency_array[$key];
                $rule->period = $period_array[$key];
                $children[$key] = $rule ;
            }

            ClassAccessRule::updateChildren($id,$children);

            
            
           setSuccess("Created new Class Access Template Nº " . $id); 
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

