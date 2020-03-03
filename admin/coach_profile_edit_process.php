<?php include "models/CoachProfile.php"; ?>
<?php include "models/Modality.php"; ?>
<?php include "models/ModalityClass.php"; ?>
<?php include "models/CoachProfileHasClass.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $coachProfile = new CoachProfile();
        
        $coachProfile->name = $post["name"];
        $coachProfile->id = $post["id"];
        
        
        $class_id_array = $post['class_id_array'];
        $children = [];
            

        foreach($class_id_array as $key=>$value){
            $relation = new CoachProfileHasClass();
            $relation->coach_profile_id = $coachProfile->id;
            $relation->modality_class_id = $value;
            $children[$key] = $relation ;
        }
        
        
        $errors = $coachProfile->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("CoachProfile",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $coachProfile->save();
//           cleanFormValues("DISCOUNT");
            CoachProfileHasClass::updateChildren($coachProfile->id,$children);
            
           setSuccess("Updated Coach Profile Nº " . $coachProfile->$id); 
           send("coach_profile_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("coach_profile_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("coach_profile_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $coachProfile = CoachProfile::get($id);
        $children = CoachProfileHasClass::getChildrenAsObjects($id);
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

