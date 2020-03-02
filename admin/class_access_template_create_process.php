
<?php include "models/ClassAccessTemplate.php"; ?>
<?php include "models/ModalityClass.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
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
            
            $classAccessTemplate->save();
            
            
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

