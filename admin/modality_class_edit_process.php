<?php include "models/ModalityClass.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        
        $class = new ModalityClass();
        
        $class->id = $post["id"];
        $class->name = $post["name"];
        $class->urlName = $post["urlName"];
        
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
                
        
        
        $errors = $class->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("MODALITY_CLASS",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $class->save();
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Updated payment method Nº " . $id); 
           send("modality_class_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("modality_class_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("modality_class_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $class = ModalityClass::get($id);
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

