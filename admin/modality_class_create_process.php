
<?php include "models/ModalityClass.php"; ?>
<?php include "models/Modality.php"; ?>

<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $class = new ModalityClass();
        $class->name = $post["name"];
        $class->urlName = $post["urlName"];
        $class->modality_id = $post["modality_id"];
        
        if(isset($post['active']))
            $class->active = ($post["active"]=="on");
        else
            $class->active = false;

        
        if(isset($post['independentSchedule']))
            $class->independentSchedule = ($post["independentSchedule"]=="on");
        else
            $class->independentSchedule = false;


        if(isset($post['visibleToUsers']))
            $class->visibleToUsers = ($post["visibleToUsers"]=="on");
        else
            $class->visibleToUsers = false;

        if(isset($post['publicSchedule']))
            $class->publicSchedule = ($post["publicSchedule"]=="on");
        else
            $class->publicSchedule = false;     
                
//        $discount->import($post);
        
        $errors = $class->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("MODALITY_CLASS",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//        echo "Creating Class!!<br>";
//            $active= ($active=="on"?1:0);
            
            $class->save();
            
            
           setSuccess("Created new Class Nº " . $id); 
           send("modality_class_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $class = new ModalityClass();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

