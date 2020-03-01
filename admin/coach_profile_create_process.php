
<?php include "models/CoachProfile.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $coachProfile = new CoachProfile();

        $coachProfile->name = $post["name"];
        
        
        
                
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
            
            
           setSuccess("Created new Coach Profile Nº " . $id); 
           send("coach_profile_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $coachProfile = new CoachProfile();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

