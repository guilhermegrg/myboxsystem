
<?php include "models/CoachProfile.php"; ?>
<?php include "models/Modality.php"; ?>
<?php include "models/ModalityClass.php"; ?>
<?php include "models/CoachProfileHasClass.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $coachProfile = new CoachProfile();

        $coachProfile->name = $post["name"];
        
        $class_id_array = $post['class_id_array'];
        $children = [];
            

            foreach($class_id_array as $key=>$value){
                $relation = new CoachProfileHasClass();
                $relation->modality_class_id = $value;
                $children[$key] = $relation ;
            }       
        
                
//        $discount->import($post);
        
        $errors = $coachProfile->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("CoachProfile",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Coach Profile!!<br>";
//            $active= ($active=="on"?1:0);
            
            $coachProfile->save();
            
            foreach($children as $child){
                $child->coach_profile_id = $coachProfile->id;
            }
            
            CoachProfileHasClass::updateChildren($coachProfile->id,$children);
            
           setSuccess("Created new Coach Profile Nº " . $coachProfile->$id); 
           send("coach_profile_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $coachProfile = new CoachProfile();
        $children = [];
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

