
<?php include "models/Membership.php"; ?>
<?php include "models/Staff.php"; ?>
<?php include "models/MembershipHasRegisterManager.php"; ?>
<?php include "models/MembershipHasRegisterCreator.php"; ?>
<?php include "models/PeriodicService.php"; ?>
<?php include "models/MembershipHasEnrollmentService.php"; ?>
<?php include "models/MembershipHasMandatoryService.php"; ?>
<?php include "models/MembershipHasOptionalService.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
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
        $membership->id = $post["id"];

        

//        registration creators

        $children_creators = [];
        if(isset($post['creator_id_array'])){    
        $creator_id_array = $post['creator_id_array'];
            foreach($creator_id_array as $key=>$value){
                $relation = new MembershipHasRegisterCreator();
                $relation->staff_id = $value;
                $relation->membership_id = $membership->id;
                $children_creators[$key] = $relation ;
            }       
        }
//        registration managers
        
        $children_managers = [];
            
        if(isset($post['manager_id_array'])){
        $manager_id_array = $post['manager_id_array'];
        foreach($manager_id_array as $key=>$value){
                $relation = new MembershipHasRegisterManager();
                $relation->staff_id = $value;
                $relation->membership_id = $membership->id;
                $children_managers[$key] = $relation ;
            }       
        }

        $children_enroll = [];
        if(isset($post['enroll_id_array'])){    
        $enroll_id_array = $post['enroll_id_array'];
            foreach($enroll_id_array as $key=>$value){
                $relation = new MembershipHasEnrollmentService();
                $relation->service_id = $value;
                $relation->membership_id = $membership->id;
                $children_enroll[$key] = $relation ;
            }       
        }
        
        $children_mandatory = [];
        if(isset($post['mandatory_id_array'])){    
            $mandatory_id_array = $post['mandatory_id_array'];
            foreach($mandatory_id_array as $key=>$value){
                $relation = new MembershipHasMandatoryService();
                $relation->service_id = $value;
                $relation->membership_id = $membership->id;
                $children_mandatory[$key] = $relation ;
            }        
        }
        
        
        $children_optional = [];
        if(isset($post['optional_id_array'])){    
            $optional_id_array = $post['optional_id_array'];
            
            foreach($optional_id_array as $key=>$value){
                $relation = new MembershipHasOptionalService();
                $relation->service_id = $value;
                $relation->membership_id = $membership->id;
                $children_optional[$key] = $relation ;
            }         
//        $discount->import($post);
        }       
        
        
        $errors = $membership->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("Membership",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $membership->save();
//           cleanFormValues("DISCOUNT");
            MembershipHasRegisterManager::updateChildren($membership->id,$children_managers);
            MembershipHasRegisterCreator::updateChildren($membership->id,$children_creators);
            MembershipHasEnrollmentService::updateChildren($membership->id,$children_enroll);
            MembershipHasMandatoryService::updateChildren($membership->id,$children_mandatory);
            MembershipHasOptionalService::updateChildren($membership->id,$children_optional);
            
           setSuccess("Updated Membership Nº " . $membership->id); 
           send("membership_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("membership_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("membership_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $membership = Membership::get($id);
        $children_managers = MembershipHasRegisterManager::getChildrenAsObjects($id);
        $children_creators = MembershipHasRegisterCreator::getChildrenAsObjects($id);
        
        $children_enroll = MembershipHasEnrollmentService::getChildrenAsObjects($id);
        $children_mandatory = MembershipHasMandatoryService::getChildrenAsObjects($id);
        $children_optional = MembershipHasOptionalService::getChildrenAsObjects($id);
        
     
        
        
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

