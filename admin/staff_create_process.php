<?php include "models/User.php"; ?>
<?php include "models/Staff.php"; ?>
<?php include "models/CoachProfile.php"; ?>
<?php include "models/StaffHasCoachProfile.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $staffMember = new Staff();

        $staffMember->user_id = $post["user_id"];
        $staffMember->session_price = $post["session_price"];
        
        $coach_profile_id_array = $post['coach_profile_id_array'];
        $children = [];
            

            foreach($coach_profile_id_array as $key=>$value){
                $relation = new StaffHasCoachProfile();
                $relation->coach_profile_id = $value;
                $children[$key] = $relation ;
            }       
        
        
                
//        $discount->import($post);
        
        $errors = $staffMember->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("Staff",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Staff!!<br>";
//            $active= ($active=="on"?1:0);
            
           $id = $staffMember->save();
           
            foreach($children as $child){
                $child->staff_id = $staffMember->id;
            }
            
            StaffHasCoachProfile::updateChildren($staffMember->id,$children);
            
           setSuccess("Created new Staff Nº " . $staffMember->id); 
           send("staff_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $staffMember = new Staff();
        $children = [];
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

