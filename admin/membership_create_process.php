
<?php include "models/Membership.php"; ?>
<?php include "models/Staff.php"; ?>
<?php include "models/MembershipHasRegisterManager.php"; ?>
<?php include "models/MembershipHasRegisterCreator.php"; ?>
<?php include "models/PeriodicService.php"; ?>
<?php include "models/MembershipHasEnrollmentService.php"; ?>
<?php include "models/MembershipHasMandatoryService.php"; ?>
<?php include "models/MembershipHasOptionalService.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $membership = new Membership();

        $membership->name = $post["name"];
        $membership->description = $post["description"];
        $membership->urlName = $post["urlName"];
        if(isset($post['active']))
            $membership->active = ($post["active"]=="on");
        else
            $membership->active = false;
        
//        registration managers
        $manager_id_array = $post['manager_id_array'];
        $children_managers = [];
            

            foreach($manager_id_array as $key=>$value){
                $relation = new MembershipHasRegisterManager();
                $relation->staff_id = $value;
                $children_managers[$key] = $relation ;
            }       

//        registration creators
        $creator_id_array = $post['creator_id_array'];
        $children_creators = [];
            

            foreach($creator_id_array as $key=>$value){
                $relation = new MembershipHasRegisterCreator();
                $relation->staff_id = $value;
                $children_creators[$key] = $relation ;
            }       
        

        $enroll_id_array = $post['enroll_id_array'];
        $children_enroll = [];
            

            foreach($enroll_id_array as $key=>$value){
                $relation = new MembershipHasEnrollmentService();
                $relation->service_id = $value;
                $children_enroll[$key] = $relation ;
            }       
        
        $mandatory_id_array = $post['mandatory_id_array'];
        $children_mandatory = [];
            

            foreach($mandatory_id_array as $key=>$value){
                $relation = new MembershipHasMandatoryService();
                $relation->service_id = $value;
                $children_mandatory[$key] = $relation ;
            }        

        
        $optional_id_array = $post['optional_id_array'];
        $children_optional = [];
            

            foreach($optional_id_array as $key=>$value){
                $relation = new MembershipHasOptionalService();
                $relation->service_id = $value;
                $children_optional[$key] = $relation ;
            }         
//        $discount->import($post);
        
        $errors = $membership->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("Membership",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Membership!!<br>";
//            $active= ($active=="on"?1:0);
            
           $id = $membership->save();
            
            foreach($children_managers as $child){
                $child->membership_id = $membership->id;
            }
            MembershipHasRegisterManager::updateChildren($membership->id,$children_managers);
            
            foreach($children_creators as $child){
                $child->membership_id = $membership->id;
            }
            MembershipHasRegisterCreator::updateChildren($membership->id,$children_managers);
            
            
            foreach($children_enroll as $child){
                $child->membership_id = $membership->id;
            }
            MembershipHasEnrollmentService::updateChildren($membership->id,$children_enroll);        
            
            foreach($children_mandatory as $child){
                $child->membership_id = $membership->id;
            }
            MembershipHasMandatoryService::updateChildren($membership->id,$children_mandatory);            
            
            
            foreach($children_optional as $child){
                $child->membership_id = $membership->id;
            }
            MembershipHasOptionalService::updateChildren($membership->id,$children_optional);            
            
           setSuccess("Created new Membership Nº " . $membership->id); 
           send("membership_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $membership = new Membership();
        $children_managers = [];
        $children_creators = [];
        
        $children_enroll = [];
        $children_mandatory = [];
        $children_optional = [];
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

